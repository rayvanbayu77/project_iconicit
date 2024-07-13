<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start(); 

if (isset($_SESSION['login'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['password'] = md5($row['$password']);
        $_SESSION['email'] = $row['email'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }

}
 
?>

<form action="" method="POST" class="login-email">
        <h4>Login</h4>
        <hr style="margin:10px">
            <div>
                <input type="email" class="form-control-sm" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div>
                <input type="password" class="form-control-sm" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div>
                <button name="submit">Login</button>
            </div>
            <p>Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>