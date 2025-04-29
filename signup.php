<?php
session_start();
include 'db.php'; // your db file should define $pdo
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Check if email already exists
  $check = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $check->execute([$email]);

  if ($check->rowCount() > 0) {
    $msg = "⚠️ Email already registered.";
  } else {
    // Insert new user
    $insert = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $insert->execute([$name, $email, $password]);

    // Auto-login after signup
    $userId = $pdo->lastInsertId();
    $user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $user->execute([$userId]);
    $userData = $user->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user'] = $userData;
    header("Location: index.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Signup - SUTTLEMARKETING AI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <style>
    body {
      background: linear-gradient(135deg, #0e0e0e, #1a1a1a);
      font-family: 'Poppins', sans-serif;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }
    .signup-box {
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(14px);
      padding: 50px 40px;
      border-radius: 20px;
      box-shadow: 0 0 30px rgba(255, 218, 185, 0.1);
      width: 100%;
      max-width: 420px;
      animation: fadeIn 1s ease-in-out;
    }
    h2 {
      color: peachpuff;
      text-align: center;
      margin-bottom: 30px;
      font-size: 28px;
    }
    input {
      width: 100%;
      padding: 14px;
      margin: 12px 0;
      background: #1f1f1f;
      border: 1px solid #444;
      border-radius: 10px;
      font-size: 16px;
      color: #fff;
      transition: 0.3s;
    }
    input:focus {
      border-color: peachpuff;
      outline: none;
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
      margin-top: 15px;
      transition: 0.3s;
    }
    button:hover {
      transform: scale(1.03);
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
      text-align: center;
      margin-top: 25px;
      display: block;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="signup-box" data-aos="zoom-in">
    <h2>Join SUTTLEMARKETING AI</h2>
    <form method="POST" data-aos="fade-up" data-aos-delay="100">
      <input type="text" name="name" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email Address" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">🚀 Create Account</button>
    </form>
    <?php if ($msg): ?>
      <div class="msg" data-aos="fade-up" data-aos-delay="200"><?= $msg ?></div>
    <?php endif; ?>
    <div class="link" data-aos="fade-up" data-aos-delay="300">
      Already a user? <a href="login.php" style="color: peachpuff;">Login here</a>
    </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
</body>
</html>
