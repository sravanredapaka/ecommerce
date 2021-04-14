<?php 
session_start();
?>
<?php
$name=$_GET['name'];
$price=$_GET['price'];
$url=$_GET['url'];
            $conn=mysqli_connect("localhost","root","","ecommerce");
            if(!$conn){
                die("Connection Failed");
            }
            $user=$_SESSION["login_user"];
            $sql="insert into cart(product_name,price,image_url,user_name) values('$name',$price,'$url','$user')";
            if(mysqli_query($conn,$sql)){
                header("Location:Home.php");
            }
            else{
                echo "unsuccess";
            }
?>