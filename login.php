<?php include "util/config.php";?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- <link href="tailwind.css" rel="stylesheet"> -->
        <meta name="description" content="A minimalist and focused to-do app for human."/>
        <meta name=”robots” content="index, follow">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
            }

            body {
                
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
                /* background-color: #f5f5f5; */
                font-family: 'Inter', sans-serif;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
            }

            .form-signin .form-floating:focus-within {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }

        </style>
    </head>
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $conn = $connection;
            $sql = "SELECT * FROM User WHERE Email='$email'";
            $user = $conn->query($sql);
            if($user->num_rows>0){
                $result = $user->fetch_assoc();
                $pin = $result['Password'];
                $id = $result["User_id"];
                if($pin==$password){
                    $stm = "SELECT * FROM Manager WHERE User_id='$id'";
                    $manager = $conn->query($stm);
                    if($manager->num_rows>0){
                        setcookie('client', "false");
                    }
                    else{
                        setcookie('client', "true");
                    }
                    header("Location: ./");
                }
                else{
                    echo "<script>alert('Password incorrect');</script>";
                }
            }
            else{
                echo "<script>alert('Email is not registered');</script>";
            }
        }
        
    ?>
    <body class="text-center bg-dark">
        <main class="form-signin w-100 m-auto text-white">
            <form action="login.php" method="POST">
                <h1 class="h3 mb-3 fw-normal">Sign in to Wine Travels</h1>

                <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                </div>

                <!-- <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                </div> -->
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="mt-5 mb-3">© Practical Assignment 5</p>
                <!-- <a href="./">Return to Home</a> -->
            </form>
        </main>
        <?php include "footer.php";?>
    </body>
</html>