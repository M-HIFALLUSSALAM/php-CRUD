<?php 

session_start();

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $_COOKIE['id'];
    $_SESSION['key'];

    $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE id = $id");

    $row = mysqli_fetch_assoc($result);

    // cek cookie user
    if( $key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"]) ) {
    header("location: index.php");
    exit;
}

require 'function.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

    

	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            if( isset($_POST['remember'])) {
                // buat cookie

                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60 );
            }


			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="masuk.css">
    <title>halaman login</title>
</head>
<body>

<div class="container-fluid text-center">
    <div class="row">
        <div class="col mt-5 p-3 pe-5 shadow bg-body rounded col-md-4 offset-md-4">

            <h1 class="text-center">LOGIN</h1>

            <img src="../img/bus.png" class="img-fluid " alt="">
 <!-- php -->
            <?php if( isset($error) ) : ?>
                <p>username / password salah</p>
            <?php endif; ?>

            <form action="" method="post">
                <ul>
                    <li>
                        <label class="mb-2" for="username">Username :</label>
                        <input class="form-control mb-3" type="text" name="username" id="username" placeholder="masukan username">
                    </li>
                    <li>
                        <label class="mb-2" for="password">Password :</label>
                        <input class="form-control mb-3" type="password" name="password" id="password" placeholder="masukan password">
                    </li>
                    <li>
                        <label for="remember">Remember Me</label>
                        <input class="mb-3 ms-2 form-check-input" type="checkbox" name="remember" id="remember">
                    </li>
                    <li>
                        <button class="btn btn-primary form-control" type="submit" name="login">Log In</button>
                    </li>
                </ul>
            </form>

        </div>

        
        

    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>