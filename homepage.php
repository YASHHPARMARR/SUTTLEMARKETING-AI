<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUTTLEMARKETING AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <style>
    :root {
      --primary: #000000;
      --highlight: peachpuff;
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background: var(--primary);
      color: #fff;
      scroll-behavior: smooth;
      font-size: 18px;
    }
    header {
      background: rgba(0,0,0,0.7);
      padding: 24px 48px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    nav a {
      color: peachpuff;
      margin: 0 16px;
      text-decoration: none;
      font-weight: 500;
      font-size: 18px;
    }
    .btn-primary {
      background: linear-gradient(to right, peachpuff, #f9c9a8);
      color: #000;
      padding: 16px 32px;
      border-radius: 30px;
      font-weight: bold;
      border: none;
      font-size: 18px;
      cursor: pointer;
    }
    .hero {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: start;
      padding: 120px 80px;
      background: url('https://images.unsplash.com/photo-1604020123129-02e11c7a0869?auto=format&fit=crop&w=1500&q=80') no-repeat center/cover;
      color: #fff;
    }
    .hero h1 {
      font-size: 64px;
      max-width: 800px;
      background: linear-gradient(to right, peachpuff, white);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .hero p {
      font-size: 22px;
      max-width: 700px;
      margin: 24px 0 36px;
    }
    .tags {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    }
    .tag {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid peachpuff;
      padding: 10px 20px;
      border-radius: 25px;
      font-size: 16px;
      color: peachpuff;
    }
    .section {
      padding: 100px 40px;
      text-align: center;
    }
    .section h2 {
      font-size: 42px;
      color: peachpuff;
      margin-bottom: 30px;
    }
    .features, .pricing, .outputs {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 40px;
      max-width: 1200px;
      margin: auto;
    }
    .feature-box, .plan, .output-box {
      background: rgba(255,255,255,0.08);
      padding: 40px;
      border-radius: 20px;
      border-left: 6px solid peachpuff;
      transition: 0.3s;
      font-size: 18px;
    }
    .feature-box:hover, .plan:hover, .output-box:hover {
      transform: translateY(-6px);
      box-shadow: 0 6px 18px rgba(255,218,185,0.1);
    }
    .output-box img {
      width: 100%;
      border-radius: 12px;
      margin-bottom: 16px;
    }
    footer {
      background: #000;
      text-align: center;
      padding: 60px 30px;
      color: #aaa;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <header>
    <h2>SUTTLEMARKETING AI</h2>
    <nav>
      <a href="#home">Home</a>
      <a href="#features">Features</a>
      <a href="#outputs">Outputs</a>
    
      <a href="#overview">Overview</a>
      <a href="#contact">Contact</a>
      <button class="btn-primary" onclick="location.href='signup.php'">Get Started</button>
    </nav>
  </header>

  <section class="hero" id="home">
    <h1>Elevate Your Experience With Best AI Campaign Generator</h1>
    <p>Your One-Stop Solution for Content Creation, Marketing Ideas, And all...</p>
    <button class="btn-primary">Start Generating</button>
    
  </section>

  <section class="section" id="features">
    <h2>Core Features</h2>
    <div class="features">
      <div class="feature-box" data-aos="fade-up">
        <h3>🎨 High Quality Campaign plans</h3>
        <p>Feugiat non in potenti velit proin semper.</p>
      </div>
      <div class="feature-box" data-aos="fade-up">
        <h3>🤖 Advanced AI Algorithms</h3>
        <p>Nec pulvinar morbi eget justo amet elementum volutpat est arcu.</p>
      </div>
      <div class="feature-box" data-aos="fade-up">
        <h3>📐 Multiple Output Supported</h3>
        <p>Consectetur tellus scelerisque sagittis est sit.</p>
      </div>
      <div class="feature-box" data-aos="fade-up">
        <h3>⚙️ User-Friendly Interface</h3>
        <p>Feugiat non in potenti velit proin semper.</p>
      </div>
      <div class="feature-box" data-aos="fade-up">
        <h3>💾 Output Saving</h3>
        <p>Libero viverra pellentesque faucibus dignissim.</p>
      </div>
      <div class="feature-box" data-aos="fade-up">
        <h3>💰 Flexible Pricing</h3>
        <p>Elit sit urna volutpat eu non lorem eu.</p>
      </div>
    </div>
  </section>


  <section class="section" id="overview">
    <h2>What we have</h2>
    <div class="features">
      <div class="feature-box" data-aos="fade-up">
        <h3>🎯 Intelligent Campaign Builder</h3>
        <p>Input your industry, brand, and campaign goals to generate tailor-made content in seconds using AI.</p>
      </div>
      <div class="feature-box" data-aos="fade-up" data-aos-delay="100">
        <h3>🧠 Multi-Model AI Engine</h3>
        <p>Choose from GPT-3.5 Turbo, Mixtral, or LLaMA 3 to match your desired tone and marketing approach.</p>
      </div>
      <div class="feature-box" data-aos="fade-up" data-aos-delay="200">
        <h3>⚡ Real-Time Campaign Output</h3>
        <p>Preview your AI-generated campaign instantly in an editable format with smooth layout transitions.</p>
      </div>
      <div class="feature-box" data-aos="fade-up" data-aos-delay="300">
        <h3>📄 One-Click PDF Export</h3>
        <p>Download high-quality, branded PDF versions of your campaigns ready to pitch or publish.</p>
      </div>
      <div class="feature-box" data-aos="fade-up" data-aos-delay="400">
        <h3>📂 Save & Reuse Campaigns</h3>
        <p>Access previously created campaigns and templates anytime for consistency and speed.</p>
      </div>
      <div class="feature-box" data-aos="fade-up" data-aos-delay="500">
        <h3>🚀 Smart UI with Backend Power</h3>
        <p>Powered by PHP + AI API backend, our platform features editable blocks, animations, and seamless integration with jsPDF.</p>
      </div>
    </div>
  </section>

  <section class="section" id="outputs">
    <h2>Sample Outputs</h2>
    <div class="outputs">
      <div class="output-box" data-aos="zoom-in">
        <img src="https://source.unsplash.com/400x300/?ai,technology" alt="output1">
        <p>Instagram-style ad generated by AI</p>
      </div>
      <div class="output-box" data-aos="zoom-in" data-aos-delay="100">
        <img src="https://source.unsplash.com/400x300/?creative,design" alt="output2">
        <p>Poster concept for marketing campaign</p>
      </div>
      <div class="output-box" data-aos="zoom-in" data-aos-delay="200">
        <img src="https://source.unsplash.com/400x300/?digital,art" alt="output3">
        <p>Branding banner for product launch</p>
      </div>
    </div>
  </section>

  <section class="section" id="why-us">
  <h2>Why Choose Us</h2>
  <div class="features">
    <div class="feature-box" data-aos="fade-up">
      <h3>✅ Trusted by 10,000+ Creators</h3>
      <p>Our platform powers campaigns for startups, agencies, and global brands alike — because results matter.</p>
    </div>
    <div class="feature-box" data-aos="fade-up" data-aos-delay="100">
      <h3>🧠 Cutting-Edge AI Technology</h3>
      <p>Utilizing top-tier AI models like GPT-3.5, Mixtral, and LLaMA for smarter and faster content generation.</p>
    </div>
    <div class="feature-box" data-aos="fade-up" data-aos-delay="200">
      <h3>⚙️ Seamless User Experience</h3>
      <p>From onboarding to exporting, our interface is designed for speed, clarity, and creative control.</p>
    </div>
    <div class="feature-box" data-aos="fade-up" data-aos-delay="300">
      <h3>🔐 Secure & Scalable Infrastructure</h3>
      <p>Built on reliable PHP + MySQL backend with scalable cloud integration and safe data handling.</p>
    </div>
    <div class="feature-box" data-aos="fade-up" data-aos-delay="400">
      <h3>📈 Campaign Performance Focused</h3>
      <p>Generate marketing materials with real impact — from awareness to conversions, fast.</p>
    </div>
    <div class="feature-box" data-aos="fade-up" data-aos-delay="500">
      <h3>💬 Responsive Support</h3>
      <p>We’re here for you 24/7 with priority email, live chat, and a growing help center.</p>
    </div>
  </div>
</section>
<center><button class="btn-primary">Generate Now!!</button></center>

<section class="section" id="contact">
  <h2>Contact Us</h2>
  <p style="max-width: 700px; margin: 0 auto 40px;">Have questions, feature suggestions, or need support? Our team is here to help — just drop us a message and we’ll get back to you shortly.</p>
  <form style="max-width: 700px; margin: auto; display: flex; flex-direction: column; gap: 24px;">
    <input type="text" name="name" placeholder="Your Name" required style="padding: 16px; font-size: 18px; border-radius: 10px; background: #111; border: 1px solid #444; color: #fff;">
    <input type="email" name="email" placeholder="Your Email" required style="padding: 16px; font-size: 18px; border-radius: 10px; background: #111; border: 1px solid #444; color: #fff;">
    <textarea name="message" rows="5" placeholder="Your Message" required style="padding: 16px; font-size: 18px; border-radius: 10px; background: #111; border: 1px solid #444; color: #fff;"></textarea>
    <button type="submit" class="btn-primary" style="align-self: flex-start;">📩 Send Message</button>
  </form>
</section>

  
  <footer>
    <p>&copy; 2025 SUTTLEMARKETING AI — All rights reserved.</p>
  </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
</body>
</html>
