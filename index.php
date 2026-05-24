<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- SEO Meta -->
  <title>VoltTools - Free Online Trading, AI & Utility Tools</title>
  <meta name="description" content="Discover powerful free online tools including trading calculators, AI content generators, QR generators, hashtag tools, image utilities, and more." />
  <meta name="keywords" content="free online tools, trading calculator, qr generator, hashtag generator, compound calculator, utility tools, creator tools" />
  <meta name="author" content="VoltTools" />

  <link rel="apple-touch-icon" sizes="180x180" href="files/images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="files/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="files/images/favicon-16x16.png">
  <link rel="manifest" href="files/images/site.webmanifest">

  <!-- Open Graph -->
  <meta property="og:title" content="VoltTools - Free Online Tools" />
  <meta property="og:description" content="Modern online tools for creators, traders, developers, and students." />
  <meta property="og:type" content="website" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
/>
  


  <link rel="stylesheet" href="css/style.css" />

  
</head>
<body>

 <?php
    include_once 'files/connection.php';
    include 'layout/header.php'; ?>

  <!-- Hero -->
  <section class="hero">
    <div class="container hero-grid">

      <div>
        <div class="hero-badge">
          🚀 25+ Free Online Tools
        </div>

        <h1>
          Powerful Online Tools for Traders, Creators & Students
        </h1>

        <p>
          Access free calculators, AI generators, utility tools, QR creators, hashtag generators, finance tools, and productivity resources built for speed and simplicity.
        </p>

        <!-- <div class="hero-actions">
          <a href="#tools" class="btn-primary">Browse Tools</a>
          <a href="#guides" class="btn-secondary">Learn More</a>
        </div> -->

        <div class="search-box">
          <input type="text" placeholder="Search tools, calculators, generators...">
          <button>Search</button>
        </div>
      </div>

      <div class="hero-card">
       
       <img src="<?php echo BASE_URL ?>files/images/hero-1.jpg" alt="Hero Image">

      </div>

    </div>
  </section>

  <!-- Stats -->
  <section class="stats">
    <div class="container stats-grid">

      <div class="stat">
        <h3>25+</h3>
        <p>Free Online Tools</p>
      </div>

      <div class="stat">
        <h3>1M+</h3>
        <p>Tool Calculations Processed</p>
      </div>

      <div class="stat">
        <h3>Fast</h3>
        <p>Lightning Quick Results</p>
      </div>

      <div class="stat">
        <h3>24/7</h3>
        <p>Accessible Anytime, Anywher</p>
      </div>

    </div>
  </section>

  <!-- Tools -->
  <section id="tools">
    <div class="container">

      <div class="section-header">
        <span>Popular Tools</span>
        <h2>Explore most popular Free Utility Tools</h2>
        <p>
          Discover modern online tools designed for creators, developers, traders, marketers, and students.
        </p>
      </div>

      <div class="tools-grid">

        <div class="tool-card">
          <div class="tool-icon">📊</div>
          <h3>Compound Calculator</h3>
          <p>Calculate compounded profits for trading and investing strategies.</p>
          <a href="<?php echo BASE_URL ?>tools/compound_calculator.php">Open Tool →</a>
        </div>

        <div class="tool-card">
          <div class="tool-icon">💰</div>
          <h3>Seo Keyword density checker</h3>
          <p>Check the density of keywords in your content for better SEO.</p>
          <a href="<?php echo BASE_URL ?>tools/keywordchecker.php">Open Tool →</a>
        </div>

        <div class="tool-card">
          <div class="tool-icon">🔥</div>
          <h3>Trading Risk Reward Calculator</h3>
          <p>Calculate Risk and Reward based on your trading parameters.</p>
          <a href="<?php echo BASE_URL ?>tools/riskreward.php">Open Tool →</a>
        </div>

         <div class="tool-card">
          <div class="tool-icon">🎨</div>
          <h3>Pomodoro Timer</h3>
          <p>The tool include everything you require to lock in</p>
          <a href="<?php echo BASE_URL ?>tools/time.php">Open Tool →</a>
        </div>

      </div>
    </div>
  </section>

  <!-- Categories -->
  <!-- <section id="categories">
    <div class="container">

      <div class="section-header">
        <span>Tool Categories</span>
        <h2>Built For Multiple Use Cases</h2>
        <p>
          Whether you're a creator, trader, developer, or student, our platform offers free online utilities tailored to your workflow.
        </p>
      </div>

      <div class="content-grid">

        <div class="content-card">
          <h3>📈 Trading Tools</h3>
          <p>
            Access leverage calculators, compound growth tools, position size calculators, risk reward calculators, and forex utilities.
          </p>
        </div>

        <div class="content-card">
          <h3>🎬 Creator Tools</h3>
          <p>
            Generate captions, hashtags, social media hooks, bios, and content ideas for Instagram, TikTok, YouTube, and LinkedIn.
          </p>
        </div>

        <div class="content-card">
          <h3>🛠 Utility Tools</h3>
          <p>
            Compress images, generate QR codes, create gradients, optimize SEO tags, and use productivity-focused utilities.
          </p>
        </div>

      </div>

    </div>
  </section> -->

  <!-- SEO Content -->
  <section id="guides">
    <div class="container">

      <div class="section-header">
        <span>Why Choose VoltTools</span>
        <h2>🆓 Free to Use</h2>
        <p>
          All core tools are accessible without any cost, making powerful utilities available to everyone.
        </p>
      </div>

      <div class="content-grid">

        <div class="content-card">
          <h3>⚡ Fast Performance</h3>
          <p>
            All tools are optimized for speed with lightweight code and fast-loading pages for desktop and mobile users.
          </p>
        </div>

        <div class="content-card">
          <h3>🛠️ Wide Range of To</h3>
          <p>
           From calculators to converters and productivity utilities, everything you need is available in one centralized platform.
          </p>
        </div>

        <div class="content-card">
          <h3>🌐 No Installation Required</h3>
          <p>
            Use all tools directly in your browser without downloading or installing any software.
          </p>
        </div>

      </div>

    </div>
  </section>

  <!-- FAQ -->
  <section id="faq">
    <div class="container">

      <div class="section-header">
        <span>FAQ</span>
        <h2>Frequently Asked Questions</h2>
      </div>

      <div class="content-grid">

        <div class="content-card">
  <h3>What is this website used for?</h3>
  <p>
    This platform provides a collection of online tools designed to help with calculations, conversions, productivity, and daily digital tasks—all in one place.
  </p>
</div>

<div class="content-card">
  <h3>Are the tools free to use?</h3>
  <p>
    Yes, all core tools are completely free to use with no hidden charges or subscription requirements.
  </p>
</div>

<div class="content-card">
  <h3>Is my data safe while using these tools?</h3>
  <p>
    Yes, most tools run directly in your browser and we do not store any sensitive user data.
  </p>
</div>

<div class="content-card">
  <h3>What types of tools are available?</h3>
  <p>
    The platform includes calculators, converters, utility tools, and productivity helpers for everyday use.
  </p>
</div>

<div class="content-card">
  <h3>Do I need to create an account?</h3>
  <p>
    No signup is required. You can instantly access and use all tools without creating an account.
  </p>
</div>

<div class="content-card">
  <h3>Can I suggest a new tool?</h3>
  <p>
   Yes, user suggestions are welcome and can be added to future updates based on demand and usefulness.
  </p>
</div>

      </div>

    </div>
  </section>

  <!-- Footer -->
  <?php include 'layout/footer.php'; ?>
 

</body>
</html>