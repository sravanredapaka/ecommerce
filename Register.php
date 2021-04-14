<html>
    <head>
        <title>E-commerce</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <style>
        .container{
            width:fit-content;
            height:fit-content;
            background-color: whitesmoke;
            padding: 20px;
            align-items: center;
            border-radius: 8px;
            margin-top: 15%;
        }
    </style>
    <body>
        <form method="POST" action="">
                <div class="container">
                    <div class="form-group">
                        <label for="usr">User Name:</label>
                        <input type="text" name="username" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password" class="form-control" id="pwd">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            
        </form>
        <?php
        if(isset($_POST['submit'])){
            $userName=$_POST['username'];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $conn=mysqli_connect("localhost","root","","ecommerce");
            if(!$conn){
                die("Connection Failed");
            }
            $sql="insert into users(user_name,email,password) values('$userName','$email','$password')";
            if(mysqli_query($conn,$sql)){
                echo "successfully registered";
                header("Location: Login.php");
            }
            else{
                echo "Couldn't register";
            }
        }
        ?>


    </body>
</html>