<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
<?php


            $conn=mysqli_connect("localhost","root","","ecommerce");
            if(!$conn){
                die("Connection Failed");
            }
            $user=$_SESSION["login_user"];
            print_r($_SESSION);
            $sql="select * from cart where user_name='$user'";
            $result=mysqli_query($conn,$sql);
            $products=array();
            while($row=mysqli_fetch_array($result)){
                array_push($products,$row);
            }

            ?>  
</script>
<style>
       body{
           background-color: rgb(187, 187, 187);
       }
       img{
           width:250px;
           height:200px;
           margin-left:15px;
       }
       .card-title{
           font-weight:bold;
       }
       .card{
           height:360px;
           background-color:white;
           padding:20px;
           margin-top:10px;
           margin-bottom:10px;
           box-shadow: 0 5px 10px rgba(154, 160, 185, 0.05),
		0 15px 40px rgba(166, 173, 201, 0.2);
	border-radius: 20px;
       }
       .card-text{
           color:red;
       }
       .grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
 margin-left:20px;
  padding: 10px;
}
       </style>
</head>
<body>
<nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="Home.php">E-Commerce</a>
                    </div>
                
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </nav>
  <div class="grid-container"> 
    <?php foreach ($products as $item): ?>
        <div class="grid-item">
    <div class="card" style="width: 35rem">
  <img class="card-img-top" src=<?= stripslashes(json_encode($item['image_url'])) ?> alt="Card image cap">
  <div class="card-body">
  <h4 id="name"class="card-title"><?= trim(json_encode($item['product_name']),'"') ?></h4>
    <h4 class="card-text"><span>&#8377;</span>
<?= trim(json_encode($item['price']),'"') ?></h5>
<button class="btn btn-primary btn-block">Buy Now</button>
  </div>
</div>
    </div>
    <?php endforeach; ?>
    </div>
</body>
</html>
