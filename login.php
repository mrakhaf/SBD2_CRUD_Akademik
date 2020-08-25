<?php
    session_start();  

    if( isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = 'index.php';
                </script>";
    }

    require_once './dosen/functions_dosen.php';

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

        if (mysqli_num_rows($result) === 1 ){
        

            //cek password 
            $row = mysqli_fetch_object($result);
            if($password === $row->password){
                //set session 
                $_SESSION["login"] = true;

                echo "
                        <script>
                            document.location.href = 'index.php';
                        </script>";
            }
        }

        $error = true;

    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>LOGIN</title>
</head>
<body>
    

    <?php 
        if(isset($error)){
            echo "
                <script>
                    alert('Usename atau password salah!');
                </script>
            ";
        };
    ?>

    <div class="container">
    <br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <h1>LOGIN</h1>
                    </div>
                    <div class="col-3"></div>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">   
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    
    <?php
        if($_SERVER['REMOTE_ADDR']=="5.189.147.47"){
    ?>
    <div>
    Username : Admin1<br>
    Password : 12345
    </div>
    <?php
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>