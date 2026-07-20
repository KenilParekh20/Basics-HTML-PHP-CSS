<!-- create or design any web page which will replicate any e-commerce webpage with products. -->
<?php
    $products = array(
        array("id"=>1,"name"=>"Laptop","price"=>50000,"img"=>"https://www.google.com/imgres?q=laptop%20images%20for%20e%20comm&imgurl=https%3A%2F%2Fmedia.istockphoto.com%2Fid%2F1157329704%2Fphoto%2Fflying-tablet-laptop-and-mobile-phone-showing-online-shop-website.jpg%3Fs%3D612x612%26w%3D0%26k%3D20%26c%3DjdX1yWsNUiTsvHvC0y0OIM-OOFjqQwlcUy_x114HtLQ%3D&imgrefurl=https%3A%2F%2Fwww.istockphoto.com%2Fphotos%2Fecommerce-laptop&docid=EkY9Aurr5Z8hMM&tbnid=oN8otan21Ev01M&vet=12ahUKEwjkw96xteKSAxXfyDgGHdBSOAYQnPAOegQIHxAB..i&w=612&h=344&hcb=2&ved=2ahUKEwjkw96xteKSAxXfyDgGHdBSOAYQnPAOegQIHxAB"),
        array("id"=>2,"name"=>"Mobile","price"=>20000,"img"=>"https://www.google.com/imgres?q=smartphone%20background%20image%20mobile%20images%20for%20e%20commerce%20shopping&imgurl=https%3A%2F%2Fpng.pngtree.com%2Fthumb_back%2Ffh260%2Fbackground%2F20230704%2Fpngtree-smartphone-shopping-3d-render-of-a-shopping-cart-in-mobile-app-image_3761588.jpg&imgrefurl=https%3A%2F%2Fpngtree.com%2Ffree-backgrounds-photos%2Fsmartphone-and-shopping-cart&docid=8cekYf4ai_ohRM&tbnid=BOo_8VKfyOOgZM&vet=12ahUKEwji1oLrt-KSAxWizDgGHfqJInMQnPAOegQIHRAB..i&w=640&h=359&hcb=2&ved=2ahUKEwji1oLrt-KSAxWizDgGHfqJInMQnPAOegQIHRAB"),
        array("id"=>3,"name"=>"Tablet","price"=>30000,"img"=>"https://media.istockphoto.com/id/477596053/photo/samsung-galaxy-tab-3.jpg?s=612x612&w=0&k=20&c=3pQRcqxNy9Tn7M1QIi9Or5wkkdyBdcaobAofsp_xK28=")
    );
    foreach($products as $product){
        echo "<div style='border:1px solid black;
        display:inline-block;margin:5px;padding:10px;
        height:150px;width:100px;'>
        <img src='".$product['img']."' style='height:50px;width:100px;'/><br/>
        <h2>".$product['name']."</h2>
        <p style='color:grey;'>".$product['price']."</p>
        </div>";
    }
?>