<?php
include '../db/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $stmt = $conn->prepare("SELECT * FROM login WHERE username=? AND password=?");

    // Periksa kesalahan pada pernyataan prepare
    if (!$stmt) {
        die("Pemersiapkan gagal: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $password);

    // Periksa kesalahan pada bind_param
    if (!$stmt) {
        die("Binding parameter gagal: " . $stmt->error);
    }

    $result = $stmt->execute();

    if ($result) {
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            header("location: ../dashboard/beasinfo/index.php");
        } else {
            $error = "Username atau password salah. Silahkan coba lagi!!";
        }

        $stmt->close();
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    
</head>

<body>
    <style>
        .login-container {
        width: 380px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        margin-top: 230px;
    }
        .button-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
        .button {
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
    }
    </style>
    <div class="login-container">
        <h2>Silahkan Login!</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <input type="submit" value="Login">
        </form>
        <div class="button-container">
            <a href="../index.php" class="button">Kembali</a>
            <a href="sign.php" class="button">Sign Up</a>
        </div>

        <?php
        
        if (isset($error)) {
            echo "<p class='error-message'>$error</p>";
        }
        ?>
    </div>
    <script  src="login.js"></script>
</body>

</html>
