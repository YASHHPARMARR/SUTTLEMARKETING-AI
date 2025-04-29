<?php
session_start();
include 'db.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      header("Location: index.php");
      exit;
    } else {
      $msg = "❌ Incorrect password.";
    }
  } else {
    $msg = "❌ No account found with that email.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - SUTTLEMARKETING AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <style>
    body {
      background: #0e0e0e;
      font-family: 'Poppins', sans-serif;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: #111;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 0 20px rgba(255, 218, 185, 0.1);
      width: 100%;
      max-width: 400px;
    }
    h2 {
      color: peachpuff;
      text-align: center;
      margin-bottom: 30px;
    }
    input {
      width: 100%;
      padding: 14px;
      margin: 12px 0;
      background: #1e1e1e;
      border: 1px solid #444;
      border-radius: 10px;
      font-size: 16px;
      color: #fff;
    }
    button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(to right, peachpuff, #f9c9a8);
      border: none;
      border-radius: 30px;
      font-weight: bold;
      font-size: 16px;
      color: #000;
      cursor: pointer;
      margin-top: 10px;
    }
    .msg {
      text-align: center;
      margin-top: 15px;
      color: peachpuff;
      font-size: 14px;
    }
    .link {
      color: peachpuff;
      font-size: 14px;
      display: block;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="login-box" data-aos="zoom-in">
    <h2>Welcome Back</h2>
    <form method="POST">
      <input type="email" name="email" placeholder="Email Address" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
    <?php if ($msg): ?>
      <div class="msg"><?= $msg ?></div>
    <?php endif; ?>
    <div class="link">Don't have an account? <a href="signup.php" style="color: peachpuff;">Sign up</a></div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
</body>
</html>
