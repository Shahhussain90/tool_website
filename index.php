<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- SEO Meta -->
  <title>ToolNova - Free Online Trading, AI & Utility Tools</title>
  <meta name="description" content="Discover powerful free online tools including trading calculators, AI content generators, QR generators, hashtag tools, image utilities, and more." />
  <meta name="keywords" content="free online tools, trading calculator, qr generator, hashtag generator, compound calculator, utility tools, creator tools" />
  <meta name="author" content="ToolNova" />

  <!-- Open Graph -->
  <meta property="og:title" content="ToolNova - Free Online Tools" />
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
        <h2>Explore Free Utility Tools</h2>
        <p>
          Discover modern online tools designed for creators, developers, traders, marketers, and students.
        </p>
      </div>

      <div class="tools-grid">

        <div class="tool-card">
          <div class="tool-icon">📊</div>
          <h3>Compound Calculator</h3>
          <p>Calculate compounded profits for trading and investing strategies.</p>
          <a href="<?php echo BASE_URL ?>tools/compound_calculator.ph">Open Tool →</a>
        </div>

        <div class="tool-card">
          <div class="tool-icon">💰</div>
          <h3>Position Size Calculator</h3>
          <p>Manage risk properly with accurate position sizing.</p>
          <a href="#">Open Tool →</a>
        </div>

        <div class="tool-card">
          <div class="tool-icon">🔥</div>
          <h3>Hashtag Generator</h3>
          <p>Generate viral hashtags for Instagram, TikTok, and YouTube.</p>
          <a href="#">Open Tool →</a>
        </div>

         <div class="tool-card">
          <div class="tool-icon">🎨</div>
          <h3>Gradient Generator</h3>
          <p>Create beautiful CSS gradients for websites and apps.</p>
          <a href="#">Open Tool →</a>
        </div>
<!--
        <div class="tool-card">
          <div class="tool-icon">🔳</div>
          <h3>QR Code Generator</h3>
          <p>Create QR codes instantly for URLs, text, and business cards.</p>
          <a href="#">Open Tool →</a>
        </div>

        <div class="tool-card">
          <div class="tool-icon">📝</div>
          <h3>AI Hook Generator</h3>
          <p>Create engaging social media hooks and captions instantly.</p>
          <a href="#">Open Tool →</a>
        </div>

        <div class="tool-card">
          <div class="tool-icon">📷</div>
          <h3>Image Compressor</h3>
          <p>Compress images without losing visual quality.</p>
          <a href="#">Open Tool →</a>
        </div>

        <div class="tool-card">
          <div class="tool-icon">⚡</div>
          <h3>Meta Tag Generator</h3>
          <p>Generate SEO meta tags for websites and blogs.</p>
          <a href="#">Open Tool →</a>
        </div> -->

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
        <span>Why Choose ToolNova</span>
        <h2>Fast, Free & SEO-Friendly Online Tools</h2>
        <p>
          ToolNova provides modern online tools optimized for performance, accessibility, and ease of use.
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
          <h3>📱 Mobile Optimized</h3>
          <p>
            Every page is fully responsive and designed to work seamlessly across smartphones, tablets, and desktops.
          </p>
        </div>

        <div class="content-card">
          <h3>🔍 Search Engine Friendly</h3>
          <p>
            Structured SEO content, internal linking, fast page speed, and optimized metadata help improve discoverability.
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
  <h3>Are these tools SEO friendly?</h3>
  <p>
    Yes, our tools are built with clean URLs, fast loading performance, proper meta structures, and search engine optimized pages.
  </p>
</div>

<div class="content-card">
  <h3>Do these tools help improve website SEO?</h3>
  <p>
    Many of our utilities help with SEO tasks such as meta tag generation, keyword formatting, text optimization, and performance improvements.
  </p>
</div>

<div class="content-card">
  <h3>Are your tool pages indexed on Google?</h3>
  <p>
    Yes, our pages are optimized for search engine indexing to help users easily discover tools through Google and other search engines.
  </p>
</div>

<div class="content-card">
  <h3>Is page speed optimized for SEO?</h3>
  <p>
    Absolutely. Fast loading speeds, responsive layouts, and optimized code help improve both user experience and search rankings.
  </p>
</div>

<div class="content-card">
  <h3>Do I need to create an account?</h3>
  <p>
    No signup is required. You can instantly access and use all tools without creating an account.
  </p>
</div>

<div class="content-card">
  <h3>Are the tools mobile optimized?</h3>
  <p>
    Yes, every tool is fully responsive and designed to work smoothly on smartphones, tablets, and desktops.
  </p>
</div>

      </div>

    </div>
  </section>

  <!-- Footer -->
  <?php include 'layout/footer.php'; ?>
 

</body>
</html>