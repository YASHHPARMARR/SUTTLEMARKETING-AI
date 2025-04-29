<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Features - SUTTLEMARKETING AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #0e0e0e;
      color: #fff;
      scroll-behavior: smooth;
    }
    header {
      padding: 40px 20px 20px;
      text-align: center;
    }
    header h1 {
      font-size: 36px;
      color: peachpuff;
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      padding: 40px;
      max-width: 1200px;
      margin: auto;
    }
    .card {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border-radius: 16px;
      padding: 30px;
      transition: transform 0.3s;
      box-shadow: 0 8px 30px rgba(255, 218, 185, 0.05);
    }
    .card:hover {
      transform: translateY(-8px);
    }
    .card h3 {
      color: peachpuff;
      margin-bottom: 10px;
    }
    .card p {
      color: #ccc;
    }
    .cta {
      text-align: center;
      margin: 60px 0 40px;
    }
    .cta a {
      text-decoration: none;
      background: linear-gradient(to right, peachpuff, #f9c9a8);
      color: #000;
      padding: 15px 30px;
      border-radius: 30px;
      font-weight: bold;
      transition: 0.3s;
    }
    .cta a:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <header data-aos="fade-down">
    <h1>🚀 Our Powerful Features</h1>
  </header>

  <section class="grid">
    <div class="card" data-aos="fade-up">
      <h3>🧠 AI-Powered Copy</h3>
      <p>Generate compelling slogans, descriptions, and content in seconds using smart AI models.</p>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="100">
      <h3>🎨 Visual Editor</h3>
      <p>Customize ad layouts with a clean drag-and-drop editor and ready-to-use templates.</p>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="200">
      <h3>📊 Market Insights</h3>
      <p>Understand your audience and competitors before launching campaigns.</p>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="300">
      <h3>📥 One-Click Export</h3>
      <p>Download your campaign as PDF, GIF, or PNG with your branding included.</p>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="400">
      <h3>⚙️ Advanced Settings</h3>
      <p>Select AI model, tone, and theme to control the voice and vibe of your content.</p>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="500">
      <h3>💾 Save & Share</h3>
      <p>Save campaigns, get shareable links, and access your full history anytime.</p>
    </div>
  </section>

  <div class="cta">
    <a href="index.html">🎯 Start Generating Now</a>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
</body>
</html>
