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

<title>Login</title>

<form action="" method="POST">
        <h4>Login</h4>
        <hr style="margin:10px">
            <div>
                <input type="text" placeholder="Username" name="username" value="<?php echo $email; ?>" required>
            </div>
            <div>
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div>
                <button name="submit">Login</button>
            </div>
            <p>Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
</html>