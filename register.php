<?php 
 
include 'config.php';


error_reporting(0);
 
session_start();
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, password)
                    VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!'); document.location.href = 'login.php';</script>" ;
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('username sudah terdaftar. harap pilih username lainnya')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
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
<title>Register</title>
</head>


<div class="register-box">
<form action="" method="POST">
    <div class="register-header">
        <h4>Register</h4>
    </div>
        <hr style="margin: 10px;">
            <div class="input-field">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button class="submit" name="submit">Register</button>
            </div>
            <hr style="margin: 10px;">
            <p style="color: black;">Anda sudah punya akun? <a href="login.php">Login </a></p>
    </form>
</div>
</html>