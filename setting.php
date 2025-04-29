<?php
session_start();
require 'db.php'; // Make sure this contains the $pdo connection

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$userId = $_SESSION['user']['id'];
$msg = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $model = $_POST['model'] ?? '';
  $theme = $_POST['theme'] ?? 'dark';

  $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, model = ?, theme = ? WHERE id = ?");
  if ($stmt->execute([$name, $email, $model, $theme, $userId])) {
    $msg = "✅ Settings updated successfully!";
    // Update session values
    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;
  } else {
    $msg = "❌ Failed to update settings.";
  }
}

// Fetch current user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  echo "<p style='color: red;'>❌ User not found. Please check if your users table has an entry for ID = $userId</p>";
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Settings - SUTTLEMARKETING AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #0e0e0e;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      display: flex;
    }
    .sidebar { width: 240px; background: #111; padding: 30px 20px; height: 100vh; }
    .sidebar h2 { color: peachpuff; margin-bottom: 30px; }
    .sidebar a { color: #ccc; display: block; margin: 12px 0; text-decoration: none; }
    .sidebar a:hover { color: peachpuff; }
    .main { flex: 1; padding: 40px; }
    label {
      display: block;
      margin-top: 20px;
      color: peachpuff;
      font-weight: 500;
    }
    input, select {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      border-radius: 8px;
      background-color: #1a1a1a;
      border: 1px solid #333;
      color: #fff;
      font-size: 16px;
    }
    button {
      margin-top: 30px;
      padding: 12px 24px;
      background: peachpuff;
      border: none;
      border-radius: 10px;
      font-weight: bold;
      color: #111;
      cursor: pointer;
    }
    .msg {
      margin-top: 20px;
      color: peachpuff;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>⚙️ Settings</h2>
    <a href="index.php">← Back to Dashboard</a>
  </div>
  <div class="main">
    <h1>⚙️ User Settings</h1>
    <?php if ($msg): ?>
      <p class="msg"><?= $msg ?></p>
    <?php endif; ?>
    <form method="POST">
      <label>Your Name</label>
      <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required />

      <label>Email</label>
      <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required />

      <label>Preferred AI Model</label>
      <select name="model">
        <option value="gpt-3.5" <?= $user['model'] === 'gpt-3.5' ? 'selected' : '' ?>>GPT-3.5 Turbo</option>
        <option value="mixtral" <?= $user['model'] === 'mixtral' ? 'selected' : '' ?>>Mixtral</option>
        <option value="llama3" <?= $user['model'] === 'llama3' ? 'selected' : '' ?>>LLaMA 3</option>
      </select>

      <label>Preferred Theme</label>
      <select name="theme">
        <option value="dark" <?= $user['theme'] === 'dark' ? 'selected' : '' ?>>Dark</option>
        <option value="light" <?= $user['theme'] === 'light' ? 'selected' : '' ?>>Light</option>
        <option value="glass" <?= $user['theme'] === 'glass' ? 'selected' : '' ?>>Glassmorphism</option>
      </select>

      <button type="submit">💾 Save Settings</button>
    </form>
  </div>
</body>
</html>
