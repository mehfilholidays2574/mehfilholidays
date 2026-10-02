<?php

session_start();

include '../includes/db.php';

$error = "";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query =
    mysqli_query(
    $conn,
    "SELECT * FROM admin_users
     WHERE username='$username'
     AND password='$password'"
    );

    if(mysqli_num_rows($query) > 0)
    {
        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");
        exit;
    }
    else
    {
        $error = "Invalid Login";
    }
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="login-box">

<h2>Admin Login</h2>

<?php if($error!=""){ ?>

<p style="color:red;">
<?php echo $error; ?>
</p>

<?php } ?>

<form method="POST">

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="login">

Login

</button>

</form>

</div>

</body>

</html>