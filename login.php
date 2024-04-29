<?php
    include("connection/connection.php");

    error_reporting(0); 
    session_start(); 

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];  
        $password = $_POST['password'];
        
        if(!empty($_POST["submit"])) {
            $loginquery = "SELECT * FROM users WHERE username = '$username' && password = '".md5($password)."'";
            $result = mysqli_query($db, $loginquery); 
            $row = mysqli_fetch_array($result);
        
            if(is_array($row)) {
                $_SESSION["user_id"] = $row['user_id']; 
                header("refresh:1;url=index.php"); 
            } else {
                $message = "Invalid Username or Password!"; 
            }
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="./css/login.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/animsition.min.css" rel="stylesheet">
    <link href="./css/animate.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> 
                    <span><span class="text-danger navbar-logo">Fast</span>Food</span>
                </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> 
                            <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> 
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> 
                        </li>
                        <?php
                            if(empty($_SESSION["user_id"])) {
                                echo '
                                    <li class="nav-item">
                                        <a href="login.php" class="nav-link active">Login</a> 
                                    </li>
                                    <li class="nav-item">
                                        <a href="register.php" class="nav-link active">Register</a> 
                                    </li>
                                ';
                            } else {    
                                echo  '
                                    <li class="nav-item">
                                        <a href="orders.php" class="nav-link active">My Orders</a> 
                                    </li>
                                    <li class="nav-item">
                                        <a href="logout.php" class="nav-link active">Logout</a> 
                                    </li>
                                ';
                            }
						?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div style=" background-image: url('./images/background/pimg.jpg');">
        <div class="pen-title"></div>
        <div class="module form-module">
            <div class="toggle">
            </div>
            <div class="form">
                <h2>Login</h2>
                <span style="color:red;"><?php echo $message; ?></span>
                <span style="color:green;"><?php echo $success; ?></span>
                <form action="" method="post">
                    <input type="text" placeholder="Username" name="username" />
                    <input type="password" placeholder="Password" name="password" />
                    <input type="submit" id="buttn" name="submit" value="Login" />
                </form>
            </div>
            <div class="cta">Not registered?<a href="register.php" style="color: #d9534f;"> Create an account</a></div>
        </div>
        <div class="container-fluid pt-3">
            <p></p>
        </div>
    </div>

    <?php include "./include/footer.php" ?>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>