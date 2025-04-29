<?php session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUTTLEMARKETING AI - Campaign Generator</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0e0e0e, #1a1a1a);
      color: #fff;
      display: flex;
      height: 100vh;
      overflow: hidden;
    }
    .sidebar {
      width: 220px;
      background-color: #111;
      border-right: 1px solid #2c2c2c;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    .sidebar h2 {
      color: peachpuff;
      font-size: 20px;
      margin-bottom: 10px;
    }
    .sidebar a {
      text-decoration: none;
      color: #ccc;
      font-weight: 500;
      transition: 0.3s;
    }
    .sidebar a:hover {
      color: peachpuff;
    }
    .main {
      flex: 1;
      padding: 60px;
      overflow-y: auto;
    }
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }
    .topbar h1 {
      font-size: 32px;
      color: peachpuff;
    }
    .input-form {
      background-color: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(14px);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 0 30px rgba(255, 218, 185, 0.15);
      max-width: 1000px;
      margin-bottom: 40px;
    }
    label {
      font-weight: 500;
      margin-top: 30px;
      display: block;
    }
    .radio-group, .objective-group {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 10px;
    }
    .radio-group label, .objective-group label {
      background: #222;
      padding: 12px 20px;
      border-radius: 10px;
      border: 1px solid #444;
      cursor: pointer;
      color: #fff;
      transition: all 0.3s;
    }
    .radio-group input[type="radio"],
    .objective-group input[type="radio"] {
      display: none;
    }
    .radio-group input[type="radio"]:checked + label,
    .objective-group input[type="radio"]:checked + label {
      background: linear-gradient(to right, peachpuff, #f9c9a8);
      color: #111;
    }
    input[type="text"], select {
      width: 100%;
      padding: 14px;
      margin-top: 10px;
      background-color: #222;
      color: #fff;
      font-size: 16px;
      border-radius: 10px;
      border: none;
    }
    button {
      margin-top: 30px;
      padding: 14px 30px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      background: linear-gradient(to right, peachpuff, #f9c9a8);
      color: #111;
      transition: 0.3s;
    }
    button:hover {
      transform: scale(1.05);
    }
    .preview-panel {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }
    .card {
      background: rgba(255, 255, 255, 0.05);
      border-left: 5px solid peachpuff;
      border-radius: 12px;
      padding: 20px;
      flex: 1;
      min-width: 300px;
    }
    .editable {
      background: #1e1e1e;
      padding: 16px;
      border-radius: 10px;
      border: 1px dashed #444;
      color: #f0f0f0;
      min-height: 200px;
    }
    .export-btn {
      margin-top: 15px;
      background: #222;
      color: peachpuff;
      padding: 8px 16px;
      border: 1px solid peachpuff;
      border-radius: 6px;
      font-size: 14px;
      cursor: pointer;
    }
    #loader {
      display: none;
      margin-top: 20px;
    }
    .spinner {
      width: 40px;
      height: 40px;
      border: 5px solid peachpuff;
      border-top: 5px solid transparent;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
      margin: auto;
    }
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }










    .radio-group input[type="radio"] {
  display: none;
}

.radio-group label {
  background: #1e1e1e;
  padding: 12px 20px;
  border-radius: 30px;
  border: 2px solid #333;
  color: peachpuff;
  font-weight: 500;
  cursor: pointer;
  transition: 0.3s ease;
}

.radio-group input[type="radio"]:checked + label {
  border-color: peachpuff;
  background: lightsalmon;
}

  </style>
</head>
<body>
  <div class="sidebar">
    <h2>📊 Dashboard</h2>
    <a href="index.php">Generate</a>
    <a href="campaigns.php">My Campaigns</a>
    <a href="setting.php">Settings</a>
  </div>

  <div class="main">
    <div class="topbar">
      <h1>AI Campaign Generator</h1>
      <div><button class="export-btn" onclick="location.reload()">🔄 Refresh</button></div>
    </div>

    <div class="input-form">
      <form onsubmit="fetchCampaign(); return false;">
        <label>Industry</label>
        <div class="radio-group" style="display: flex; flex-wrap: wrap; gap: 16px;">
  <input type="radio" name="industry" id="ind1" value="E-commerce" checked>
  <label for="ind1">🛒 E-commerce</label>

  <input type="radio" name="industry" id="ind2" value="Fitness">
  <label for="ind2">💪 Fitness</label>

  <input type="radio" name="industry" id="ind3" value="FinTech">
  <label for="ind3">💼 FinTech</label>

  <input type="radio" name="industry" id="ind4" value="Travel">
  <label for="ind4">✈️ Travel</label>

  <input type="radio" name="industry" id="ind5" value="Luxury Fashion">
  <label for="ind5">👗 Luxury Fashion</label>

  <input type="radio" name="industry" id="ind6" value="Education">
  <label for="ind6">🎓 Education</label>

  <input type="radio" name="industry" id="ind7" value="Healthcare">
  <label for="ind7">🩺 Healthcare</label>

  <input type="radio" name="industry" id="ind8" value="Food & Beverage">
  <label for="ind8">🍔 Food & Beverage</label>

  <input type="radio" name="industry" id="ind9" value="Technology / SaaS">
  <label for="ind9">💻 Technology / SaaS</label>

  <input type="radio" name="industry" id="ind10" value="Entertainment">
  <label for="ind10">🎬 Entertainment</label>

  <input type="radio" name="industry" id="ind11" value="Real Estate">
  <label for="ind11">🏡 Real Estate</label>

  <input type="radio" name="industry" id="ind12" value="Automotive">
  <label for="ind12">🚗 Automotive</label>

  <input type="radio" name="industry" id="ind13" value="Marketing & Digital Media">
  <label for="ind13">📣 Marketing</label>

  <input type="radio" name="industry" id="ind14" value="Beauty & Skincare">
  <label for="ind14">💄 Beauty</label>

  <input type="radio" name="industry" id="ind15" value="Photography">
  <label for="ind15">📸 Photography</label>
</div>

        <label>Company Name</label>
        <input type="text" id="company" placeholder="e.g. Travelease" required />

        <label>Campaign Objective</label>
        <div class="objective-group">
          <input type="radio" name="objective" id="obj1" value="Brand Awareness" checked>
          <label for="obj1">📢 Brand Awareness</label>

          <input type="radio" name="objective" id="obj2" value="Lead Generation">
          <label for="obj2">📋 Lead Generation</label>

          <input type="radio" name="objective" id="obj3" value="Sales Conversion">
          <label for="obj3">💰 Sales Conversion</label>
        </div>

        <label>AI Model</label>
        <select id="model">
          <option value="openai/gpt-3.5-turbo">GPT-3.5 Turbo</option>
          <option value="mistralai/mixtral">Mixtral</option>
          <option value="meta-llama/llama-3">LLaMA 3</option>
        </select>

        <button type="submit">🚀 Generate</button>
        <div id="loader"><div class="spinner"></div></div>
      </form>
    </div>

    <div class="preview-panel" id="outputContainer"></div>
  </div>

  <script>
    async function fetchCampaign() {
      const industry = document.querySelector('input[name="industry"]:checked').value;
      const company = document.getElementById('company').value;
      const objective = document.querySelector('input[name="objective"]:checked').value;
      const model = document.getElementById('model').value;
      const loader = document.getElementById('loader');
      const outputContainer = document.getElementById('outputContainer');

      if (!company.trim()) {
        alert("Please enter your company name.");
        return;
      }

      loader.style.display = 'block';

      try {
        const res = await fetch('generate.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ industry, company, objective, model })
        });
        const data = await res.json();

        const card = document.createElement('div');
        card.className = 'card';
        const uid = `pdf-${Math.random().toString(36).substring(2, 10)}`;

        card.innerHTML = `
          <div id="${uid}" class="editable" contenteditable="true">
            ${data.full}
          </div>
          <button class="export-btn" onclick="exportToPDF('${uid}')">📄 Export to PDF</button>
        `;

        outputContainer.appendChild(card);
      } catch (err) {
        alert("Something went wrong. Try again.");
        console.error(err);
      } finally {
        loader.style.display = 'none';
      }
    }

    function exportToPDF(id) {
      const target = document.getElementById(id);
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();

      let y = 10;
      doc.setFont("helvetica", "bold");
      doc.setTextColor(30, 30, 30);
      doc.setFontSize(16);
      doc.text("AI Campaign Overview", 10, y);
      y += 10;

      const content = target.innerText.split("\n");
      doc.setFontSize(12);
      content.forEach(line => {
        doc.text(line, 10, y);
        y += 8;
      });

      doc.save("campaign-plan.pdf");
    }
  </script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
</body>
</html>
