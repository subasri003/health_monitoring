<?php
include("db.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check email already exists
    $check = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0)
    {
        echo "<script>
        alert('Email already registered. Please login.');
        window.location='login.php';
        </script>";
    }
    else
    {
        // Insert user details
        $sql = "INSERT INTO users(name,email,password)
                VALUES('$name','$email','$password')";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>
            alert('Registration Successful');
            window.location='login.php';
            </script>";
        }
        else
        {
            echo "Error: ".mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h2>User Registration</h2>

<form method="POST">

<input type="text" 
name="name" 
placeholder="Enter Name" 
required>

<input type="email" 
name="email" 
placeholder="Enter Email" 
required>

<input type="password" 
name="password" 
placeholder="Enter Password" 
required>

<button type="submit" name="register">
Register
</button>

</form>

<br>

<center>
Already have an account?
<a href="login.php">Login</a>
</center>

</div>

</body>
</html>