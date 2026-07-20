<?php

$host = "localhost";
$user = "root";
$password = "kenil#sql2026";
$dbname = "text_sharing_db";

/* DATABASE CONNECTION */
$conn = mysqli_connect($host, $user, $password);

if(!$conn){
    die("Connection Failed : " . mysqli_connect_error());
}

/* CREATE DATABASE */
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
mysqli_query($conn, $sql);

/* CONNECT DATABASE */
$conn = mysqli_connect($host, $user, $password, $dbname);

if(!$conn){
    die("Database Selection Failed : " . mysqli_connect_error());
}

/* CREATE TABLE */
$createTable = "
CREATE TABLE IF NOT EXISTS shared_texts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(4) NOT NULL UNIQUE,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
";

mysqli_query($conn, $createTable);


/* SAVE TEXT */
$message = "";
$generatedCode = "";
$viewText = "";
$error = "";

if(isset($_POST["save"])){

    $content = mysqli_real_escape_string(
        $conn,
        $_POST["content"]
    );

    do{

        $code = rand(1000,9999);

        $check = mysqli_query(
            $conn,
            "SELECT * FROM shared_texts WHERE code='$code'"
        );

    }while(mysqli_num_rows($check) > 0);

    $insert = "
    INSERT INTO shared_texts(code,content)
    VALUES('$code','$content')
    ";

    if(mysqli_query($conn,$insert)){
        $generatedCode = $code;
        $message = "Text Saved Successfully";
    }
}


/* VIEW TEXT */
if(isset($_GET["view"])){

    $code = mysqli_real_escape_string(
        $conn,
        $_GET["code"]
    );

    $sql = "
    SELECT * FROM shared_texts
    WHERE code='$code'
    ";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        $viewText = htmlspecialchars($row["content"]);

    }else{
        $error = "Invalid Code. No Text Found.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Online Text Sharing App</title>

    <style>

        body{
            font-family:Arial, sans-serif;
            background:#eef3f8;
            padding:30px;
        }

        .box{
            width:650px;
            margin:auto;
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 0 12px #aaa;
        }

        h1{
            text-align:center;
            color:#164863;
        }

        textarea,input{
            width:100%;
            padding:12px;
            margin-top:10px;
            box-sizing:border-box;
        }

        textarea{
            height:130px;
        }

        button{
            padding:10px 20px;
            background:#164863;
            color:white;
            border:none;
            margin-top:10px;
            border-radius:5px;
            cursor:pointer;
        }

        .section{
            margin-top:25px;
            padding:15px;
            background:#f7fbff;
            border-radius:8px;
        }

        .success{
            color:green;
            font-weight:bold;
            text-align:center;
        }

        .code{
            text-align:center;
            font-size:35px;
            font-weight:bold;
            color:#164863;
            letter-spacing:5px;
        }

        .text{
            background:#ffffff;
            padding:15px;
            border-radius:8px;
            margin-top:15px;
            border:1px solid #ccc;
            white-space:pre-wrap;
        }

        .error{
            color:red;
            font-weight:bold;
            text-align:center;
        }

    </style>

</head>

<body>

<div class="box">

    <h1>Online Text Sharing App</h1>

    <!-- SHARE TEXT -->

    <div class="section">

        <h3>Share Text</h3>

        <form method="POST">

            <textarea
                name="content"
                placeholder="Enter text to share"
                required></textarea>

            <button type="submit" name="save">
                Generate 4 Digit Code
            </button>

        </form>

        <?php
        if($message != ""){
            echo "<p class='success'>$message</p>";
            echo "<div class='code'>$generatedCode</div>";
        }
        ?>

    </div>


    <!-- VIEW TEXT -->

    <div class="section">

        <h3>Get Shared Text</h3>

        <form method="GET">

            <input
                type="text"
                name="code"
                maxlength="4"
                placeholder="Enter 4 Digit Code"
                required>

            <button type="submit" name="view">
                View Text
            </button>

        </form>

        <?php

        if($viewText != ""){
            echo "<div class='text'>$viewText</div>";
        }

        if($error != ""){
            echo "<p class='error'>$error</p>";
        }

        ?>

    </div>

</div>

</body>
</html>