<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start(); 

if (isset($_SESSION['login'])) {
    header("Location: home.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['password'] = md5($row['$password']);
        header("Location: home.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }

}
 
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Anek Kannada' rel='stylesheet'>
<link rel="stylesheet" href="style.css">
<title>Login</title>
</head>

<div class="register-box">
<form action="" method="POST">
    <div class="register-header">
        <h4>Login</h4>
        </div>
        <hr style="margin:10px">
            <div class="input-field">
                <input type="text" placeholder="Username" name="username" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button class="submit" name="submit">Login</button>
            </div>
            <hr style="margin: 10px;">
            <p style="color: black;">Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
        </div>
</html>