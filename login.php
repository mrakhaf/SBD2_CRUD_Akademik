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
    <title>LOGIN</title>
</head>
<body>
    <h1>LOGIN</h1>

    <?php 
        if(isset($error)){
            echo "
                <script>
                    alert('Usename atau password salah!');
                </script>
            ";
        };
    ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>