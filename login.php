<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login form submission
    require_once "includes/config.php"; // Database connection

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password are valid
    $query = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: includes/dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>
<?php include 'header.php'; ?>
<h2>Login</h2>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>email:</label>
        <input type="text" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
<?php include 'footer.php'; ?>

