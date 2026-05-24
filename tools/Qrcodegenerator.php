<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- SEO -->
  <title>QR Code Generator - Free Online QR Creator | VoltTools</title>
 <link rel="apple-touch-icon" sizes="180x180" href="../files/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../files/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../files/images/favicon-16x16.png">
    <link rel="manifest" href="../files/images/site.webmanifest">
  <meta
    name="description"
    content="Generate free QR codes instantly for URLs, text, social media links, contact details, and websites with our modern QR code generator tool.">

  <meta
    name="keywords"
    content="qr code generator, free qr code creator, qr maker, url qr code generator, online qr generator">

  <meta name="author" content="VoltTools">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
/>

  <!-- CSS -->
  <link rel="stylesheet" href="../css/style.css">

  <!-- QR -->
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>

  <style>

    /* =========================================
       TOOL HERO
    ========================================= */

    .tool-hero{
      padding:80px 0 30px;
    }

    .tool-hero-content{
      text-align:center;
      max-width:850px;
      margin-inline:auto;
    }

    .tool-badge{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding:10px 18px;
      border-radius:999px;
      background:rgba(99,102,241,0.12);
      border:1px solid rgba(99,102,241,0.25);
      color:#c7d2fe;
      margin-bottom:24px;
      font-size:0.9rem;
      font-weight:600;
    }

    .tool-hero h1{
      font-size:clamp(2.4rem,5vw,4rem);
      line-height:1.1;
      margin-bottom:20px;
    }

    .tool-hero p{
      color:var(--muted);
      font-size:1.05rem;
      max-width:760px;
      margin-inline:auto;
    }

    /* =========================================
       TOOL LAYOUT
    ========================================= */

    .tool-layout{
      display:grid;
      grid-template-columns:340px 1fr;
      gap:28px;
      align-items:start;
      margin-top:40px;
    }

    /* =========================================
       PANELS
    ========================================= */

    .tool-panel{
      background:var(--card);
      border:1px solid var(--border);
      border-radius:24px;
      overflow:hidden;
    }

    .tool-panel-header{
      padding:22px 24px;
      border-bottom:1px solid var(--border);
    }

    .tool-panel-title{
      font-size:1rem;
      font-weight:700;
    }

    .tool-panel-body{
      padding:24px;
    }

    /* =========================================
       FIELDS
    ========================================= */

    .tool-field{
      margin-bottom:24px;
    }

    .tool-field-header{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:16px;
      margin-bottom:12px;
    }

    .tool-label{
      font-size:0.95rem;
      font-weight:600;
      color:#e2e8f0;
    }

    .tool-value{
      color:var(--muted);
      font-size:0.9rem;
    }

    .tool-input{
      width:100%;
      background:rgba(255,255,255,0.04);
      border:1px solid var(--border);
      border-radius:18px;
      padding:16px;
      color:white;
      font-family:inherit;
      font-size:0.95rem;
      outline:none;
      transition:0.25s ease;
    }

    .tool-input:focus{
      border-color:rgba(99,102,241,0.6);
      box-shadow:0 0 0 4px rgba(99,102,241,0.12);
    }

    input[type="range"]{
      width:100%;
      cursor:pointer;
    }

    .tool-btn{
      width:100%;
      border:none;
      cursor:pointer;
      padding:16px 20px;
      border-radius:18px;
      font-weight:700;
      color:white;
      background:linear-gradient(
        135deg,
        var(--primary),
        var(--secondary)
      );
      transition:0.3s ease;
    }

    .tool-btn:hover{
      transform:translateY(-3px);
    }

    /* =========================================
       METRICS
    ========================================= */

    .metrics-grid{
      display:grid;
      grid-template-columns:repeat(3,1fr);
      gap:20px;
      margin-bottom:24px;
    }

    .metric-card{
      background:var(--card);
      border:1px solid var(--border);
      padding:24px;
      border-radius:22px;
    }

    .metric-label{
      color:var(--muted);
      font-size:0.9rem;
      margin-bottom:10px;
    }

    .metric-value{
      font-size:2rem;
      font-weight:800;
    }

    .blue{
      color:#60a5fa;
    }

    .green{
      color:#4ade80;
    }

    .neutral{
      color:#f8fafc;
    }

    /* =========================================
       QR CONTAINER
    ========================================= */

    .qr-wrap{
      display:flex;
      align-items:center;
      justify-content:center;
      min-height:360px;
    }

    #qrcode{
      display:flex;
      justify-content:center;
      align-items:center;
    }

    /* =========================================
       BLOG SECTION
    ========================================= */

    .tool-blog{
      margin-top:80px;
    }

    .tool-blog-content h3{
      margin-top:34px;
      margin-bottom:14px;
      font-size:1.5rem;
    }

    .tool-blog-content h4{
      margin-top:24px;
      margin-bottom:10px;
    }

    .tool-blog-content p{
      color:var(--muted);
      margin-bottom:18px;
    }

    .tool-blog-content ul{
      padding-left:22px;
      color:var(--muted);
    }

    .tool-blog-content li{
      margin-bottom:12px;
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width:900px){

      .tool-layout{
        grid-template-columns:1fr;
      }

    }

    @media (max-width:768px){

      .tool-hero{
        padding-top:50px;
      }

      .metrics-grid{
        grid-template-columns:1fr;
      }

      .metric-value{
        font-size:1.7rem;
      }

    }

  </style>

</head>

<body>

<?php
include_once '../files/connection.php';
include '../layout/header.php';
?>

<!-- HERO -->
<section class="tool-hero">

  <div class="container">

    <div class="tool-hero-content">

      <div class="tool-badge">
        🔳 Free QR Generator
      </div>

      <h1>
        QR Code Generator
      </h1>

      <p>
        Create modern QR codes instantly for website URLs, text, social media profiles, contact information, and business links.
      </p>

    </div>

  </div>

</section>

<!-- TOOL -->
<section>

  <div class="container">

    <div class="tool-layout">

      <!-- LEFT -->
      <div>

        <div class="tool-panel">

          <div class="tool-panel-header">

            <div class="tool-panel-title">
              QR Settings
            </div>

          </div>

          <div class="tool-panel-body">

            <div class="tool-field">

              <div class="tool-field-header">

                <span class="tool-label">
                  Text / URL
                </span>

              </div>

              <input
                type="text"
                id="qrText"
                class="tool-input"
                placeholder="Enter text or website URL">

            </div>

            <div class="tool-field">

              <div class="tool-field-header">

                <span class="tool-label">
                  QR Size
                </span>

                <span
                  class="tool-value"
                  id="sizeOutput">

                  250px

                </span>

              </div>

              <input
                type="range"
                id="qrSize"
                min="150"
                max="500"
                value="250"
                oninput="updateSizeValue()">

            </div>

            <button
              class="tool-btn"
              onclick="generateQR()">

              Generate QR Code

            </button>

          </div>

        </div>

      </div>

      <!-- RIGHT -->
      <div>

        <!-- METRICS -->
        <div class="metrics-grid">

          <div class="metric-card">

            <div class="metric-label">
              Characters
            </div>

            <div
              class="metric-value blue"
              id="charCount">

              0

            </div>

          </div>

          <div class="metric-card">

            <div class="metric-label">
              QR Size
            </div>

            <div
              class="metric-value green"
              id="metricSize">

              250px

            </div>

          </div>

          <div class="metric-card">

            <div class="metric-label">
              Status
            </div>

            <div
              class="metric-value neutral"
              id="statusText">

              Ready

            </div>

          </div>

        </div>

        <!-- QR PANEL -->
        <div class="tool-panel">

          <div class="tool-panel-header">

            <div class="tool-panel-title">
              Generated QR Code
            </div>

          </div>

          <div class="tool-panel-body">

            <div class="qr-wrap">

              <div id="qrcode"></div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- BLOG -->
<section class="tool-blog">

  <div class="container">

    <div class="section-header">

      <span>QR Technology</span>

      <h2>
        Create QR Codes for Websites, Businesses & Social Media
      </h2>

      <p>
        Learn how QR codes improve accessibility, marketing campaigns, payments, and digital sharing experiences.
      </p>

    </div>

    <div class="tool-panel">

      <div class="tool-panel-body tool-blog-content">

        <h3>What Is a QR Code?</h3>

        <p>
          A QR code is a machine-readable barcode that stores information such as URLs, contact details, WiFi credentials, or text content. Users can scan QR codes instantly using smartphones and mobile devices.
        </p>

        <h3>Why Use QR Codes?</h3>

        <p>
          QR codes make it easy to share links, menus, payment information, event details, and social media profiles without manually typing long URLs.
        </p>

        <h3>Benefits of This QR Generator</h3>

        <ul>

          <li>Create QR codes instantly online</li>

          <li>Generate QR codes for websites and URLs</li>

          <li>Customize QR size for different uses</li>

          <li>Works on desktop and mobile devices</li>

          <li>No signup or installation required</li>

          <li>Completely free QR code creator</li>

        </ul>

        <h3>Best Uses for QR Codes</h3>

        <ul>

          <li>Business cards and portfolios</li>

          <li>Restaurant menus</li>

          <li>Social media profile sharing</li>

          <li>Website and landing page links</li>

          <li>Digital payments and promotions</li>

          <li>Marketing campaigns and posters</li>

        </ul>

        <h3>Frequently Asked Questions</h3>

        <h4>Is this QR generator free?</h4>

        <p>
          Yes, the QR code generator is completely free and works instantly in your browser.
        </p>

        <h4>Can I generate QR codes for URLs?</h4>

        <p>
          Absolutely. You can create QR codes for websites, landing pages, portfolios, and social profiles.
        </p>

        <h4>Do QR codes work on mobile phones?</h4>

        <p>
          Yes, most modern smartphones can scan QR codes directly using the camera app.
        </p>

      </div>

    </div>

  </div>

</section>

<?php include '../layout/footer.php'; ?>

<script>

  function updateSizeValue() {

    const size = document.getElementById('qrSize').value;

    document.getElementById('sizeOutput').textContent = size + 'px';
    document.getElementById('metricSize').textContent = size + 'px';
  }

  function generateQR() {

    const qrContainer = document.getElementById('qrcode');

    const qrText = document.getElementById('qrText').value.trim();

    const qrSize = parseInt(document.getElementById('qrSize').value);

    qrContainer.innerHTML = '';

    if (qrText === '') {

      document.getElementById('statusText').textContent = 'Empty';

      qrContainer.innerHTML = `
        <div style="
          color:var(--muted);
          font-size:0.95rem;
        ">
          Please enter text or URL
        </div>
      `;

      return;
    }

    new QRCode(qrContainer, {
      text: qrText,
      width: qrSize,
      height: qrSize,
      colorDark: "#ffffff",
      colorLight: "transparent",
      correctLevel: QRCode.CorrectLevel.H
    });

    document.getElementById('charCount').textContent = qrText.length;

    document.getElementById('statusText').textContent = 'Generated';
  }

  generateQR();

</script>

</body>
</html>