<?php
$host="localhost";
$dbname="clipboard_db";
$user="root";
$pass="kenilsql#2026";
$conn=new mysqli($host,$user,$pass);
if($conn->connect_error){die("Connect Error: ".$conn->connect_error);}
$conn->query("CREATE DATABASE IF NOT EXISTS clipboard_db");
$conn->select_db("clipboard_db");
$conn->query("CREATE TABLE IF NOT EXISTS clipboard (id INT AUTO_INCREMENT PRIMARY KEY,code CHAR(4) NOT NULL UNIQUE,content TEXT NOT NULL,created TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
function generateCode($conn){do{$code=str_pad(rand(1000,9999),4,'0',STR_PAD_LEFT);$res=$conn->query("SELECT id FROM clipboard WHERE code='$code'");}while($res->num_rows>0);return $code;}
$message="";
$found=null;
if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['action'])&&$_POST['action']==='save'){$text=$conn->real_escape_string(trim($_POST['text']));if($text===''){$message=['type'=>'error','text'=>'Please enter some text before saving.'];}else{$code=generateCode($conn);$conn->query("INSERT INTO clipboard (code,content) VALUES ('$code','$text')");$message=['type'=>'success','text'=>"Your text is saved! Share this code: <strong>$code</strong>"];}}
if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['action'])&&$_POST['action']==='retrieve'){$code=$conn->real_escape_string(trim($_POST['code']));$res=$conn->query("SELECT content,created FROM clipboard WHERE code='$code'");if($res->num_rows>0){$found=$res->fetch_assoc();$message=['type'=>'success','text'=>"Text found for code: <strong>$code</strong>"];}else{$message=['type'=>'error','text'=>"No text found for code: <strong>$code</strong>"];}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Online Clipboard - Text Sharing</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:Arial,sans-serif;background:#f0f4f8;min-height:100vh;padding:30px 20px}
h1{text-align:center;color:#2c3e50;margin-bottom:6px;font-size:2rem}
.subtitle{text-align:center;color:#7f8c8d;margin-bottom:30px;font-size:.95rem}
.container{max-width:700px;margin:0 auto;display:flex;flex-direction:column;gap:24px}
.card{background:#fff;border-radius:12px;padding:28px;box-shadow:0 2px 16px rgba(0,0,0,.1)}
.card h2{margin-bottom:16px;color:#2c3e50;font-size:1.2rem;border-left:4px solid #3498db;padding-left:10px}
textarea{width:100%;height:130px;border:2px solid #dde1e7;border-radius:8px;padding:12px;font-size:.95rem;resize:vertical;margin-bottom:12px;font-family:monospace}
textarea:focus{outline:none;border-color:#3498db}
input[type="text"]{width:100%;padding:11px 14px;border:2px solid #dde1e7;border-radius:8px;font-size:1.1rem;margin-bottom:12px;text-align:center;letter-spacing:8px;font-weight:bold}
input[type="text"]:focus{outline:none;border-color:#3498db}
.btn{display:inline-block;padding:11px 30px;border:none;border-radius:8px;font-size:1rem;cursor:pointer;font-weight:bold;transition:opacity .2s}
.btn:hover{opacity:.85}
.btn-blue{background:#3498db;color:#fff}
.btn-green{background:#27ae60;color:#fff}
.alert{padding:12px 16px;border-radius:8px;margin-bottom:14px;font-size:.95rem}
.alert-success{background:#d5f5e3;color:#1a7a40;border-left:4px solid #27ae60}
.alert-error{background:#fde8e8;color:#a93226;border-left:4px solid #e74c3c}
.result-box{background:#f8f9fa;border:2px dashed #3498db;border-radius:8px;padding:16px;font-family:monospace;font-size:.95rem;white-space:pre-wrap;color:#2c3e50;margin-top:10px}
.meta{font-size:.8rem;color:#aaa;margin-top:8px}
footer{text-align:center;margin-top:30px;color:#aaa;font-size:.85rem}
</style>
</head>
<body>
<h1>📋 Online Clipboard</h1>
<p class="subtitle">Share text using a 4-digit code – IWT Task 4</p>
<div class="container">
<div class="card">
<h2>📝 Save Text</h2>
<?php if(!empty($message)&&isset($_POST['action'])&&$_POST['action']==='save'): ?>
<div class="alert alert-<?=$message['type']?>"><?=$message['text']?></div>
<?php endif; ?>
<form method="POST">
<input type="hidden" name="action" value="save">
<textarea name="text" placeholder="Type or paste your text here..."><?=isset($_POST['action'])&&$_POST['action']==='save'?htmlspecialchars($_POST['text']??''):''?></textarea>
<button type="submit" class="btn btn-blue">💾 Save & Get Code</button>
</form>
</div>
<div class="card">
<h2>🔍 Retrieve Text</h2>
<?php if(!empty($message)&&isset($_POST['action'])&&$_POST['action']==='retrieve'): ?>
<div class="alert alert-<?=$message['type']?>"><?=$message['text']?></div>
<?php endif; ?>
<form method="POST">
<input type="hidden" name="action" value="retrieve">
<input type="text" name="code" maxlength="4" placeholder="Enter 4-digit code" value="<?=htmlspecialchars($_POST['code']??'')?>">
<button type="submit" class="btn btn-green">🔓 Get Text</button>
</form>
<?php if($found): ?>
<div class="result-box"><?=htmlspecialchars($found['content'])?></div>
<div class="meta">Saved on: <?=$found['created']?></div>
<?php endif; ?>
</div>
</div>
<footer>IWT Assignment – Task 4 | Marwadi University | AY 2025-26</footer>
</body>
</html>