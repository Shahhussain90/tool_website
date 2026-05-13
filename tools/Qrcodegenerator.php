<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>QR Code Generator</title>

  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/tools.css">

  <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>

</head>

<body>

  <div class="page">

    <?php
    include_once '../files/connection.php';
    include '../layout/header.php';
    ?>

    <div class="layout">

      <!-- LEFT PANEL -->
      <div>

        <div class="panel">

          <div class="panel-header">
            <span class="panel-title">QR Settings</span>
          </div>

          <div class="panel-body">

            <div class="field">
              <div class="field-header">
                <span class="field-label">Text / URL</span>
              </div>

              <input
                type="text"
                id="qrText"
                class="number-input"
                placeholder="Enter text or website URL">
            </div>

            <div class="field">
              <div class="field-header">
                <span class="field-label">QR Size</span>
                <span class="field-value" id="sizeOutput">250px</span>
              </div>

              <input
                type="range"
                id="qrSize"
                min="150"
                max="500"
                value="250"
                oninput="updateSizeValue()">
            </div>

            <div class="divider"></div>

            <button
              class="freq-tab active"
              style="width:100%;"
              onclick="generateQR()">
              Generate QR Code
            </button>

          </div>

        </div>

      </div>

      <!-- RIGHT PANEL -->
      <div>

        <!-- METRICS -->
        <div class="metrics-grid" style="grid-template-columns:repeat(3,1fr);">

          <div class="metric-card blue">
            <div class="metric-label">Characters</div>
            <div class="metric-value blue" id="charCount">0</div>
          </div>

          <div class="metric-card green">
            <div class="metric-label">QR Size</div>
            <div class="metric-value green" id="metricSize">250px</div>
          </div>

          <div class="metric-card neutral">
            <div class="metric-label">Status</div>
            <div class="metric-value neutral" id="statusText">Ready</div>
          </div>

        </div>

        <!-- QR PANEL -->
        <div class="panel">

          <div class="panel-header">
            <span class="panel-title">Generated QR Code</span>
          </div>

          <div class="panel-body">

            <div
              id="qrcode"
              style="
              display:flex;
              justify-content:center;
              align-items:center;
              min-height:350px;
            "></div>

          </div>

        </div>

      </div>

    </div>
    <section class="tool-blog-section">
      <div class="container">

        <div class="section-header">
          <span>Trading Education</span>
          <h2>Compound Interest & Trading Growth Calculator</h2>
          <p>
            Understand how compounding works in trading, investing, crypto, forex, and long-term portfolio growth using our advanced compound calculator.
          </p>
        </div>

        <div class="panel">
          <div class="panel-body tool-blog-content">

            <h3>What Is a Compound Calculator?</h3>
            <p>
              A compound calculator helps traders and investors estimate how their capital can grow over time when profits are continuously reinvested. Instead of calculating growth manually, this tool automatically projects future account balances based on percentage returns, compounding frequency, risk management, and reinvestment settings.
            </p>

            <p>
              This calculator is especially useful for forex traders, crypto traders, stock investors, and anyone using a compounding strategy to grow their portfolio consistently.
            </p>

            <h3>How Compounding Works in Trading</h3>

            <p>
              Compounding means earning profits on both your original capital and previous profits. As your balance increases, the size of each future gain also increases, leading to exponential account growth over time.
            </p>

            <p>
              For example, if you start with $10,000 and earn 2% per trade while reinvesting profits, your account grows faster after every successful period because your position size becomes larger.
            </p>

            <h3>Features of This Compound Trading Calculator</h3>

            <ul>
              <li>Calculate compound growth for daily, weekly, or monthly periods</li>
              <li>Estimate trading account growth over time</li>
              <li>Analyze risk-to-reward ratios and win rates</li>
              <li>Visualize capital growth with interactive charts</li>
              <li>Measure drawdown and ruin probability</li>
              <li>Test reinvestment strategies for trading accounts</li>
              <li>Use realistic risk management simulations</li>
            </ul>

            <h3>Why Traders Use Compound Calculators</h3>

            <p>
              Professional traders use compound calculators to build realistic expectations and create long-term trading plans. The tool helps evaluate whether a trading strategy is sustainable based on win rate, risk percentage, and average returns.
            </p>

            <p>
              Instead of focusing only on single trades, compounding calculators show the bigger picture of account growth and consistency.
            </p>

            <h3>Risk Management Matters</h3>

            <p>
              Even profitable trading systems can fail without proper risk management. This calculator includes important metrics such as maximum drawdown, expectancy, Kelly Criterion, and risk of ruin to help traders understand the downside of aggressive compounding.
            </p>

            <p>
              Managing risk per trade and maintaining a healthy reward-to-risk ratio are essential for long-term survival in forex, crypto, and stock trading.
            </p>

            <h3>Best Uses for This Tool</h3>

            <ul>
              <li>Forex trading account growth simulation</li>
              <li>Crypto portfolio compounding calculations</li>
              <li>Stock investment projections</li>
              <li>Day trading risk analysis</li>
              <li>Position sizing strategy planning</li>
              <li>Long-term wealth growth estimation</li>
            </ul>

            <h3>Frequently Asked Questions</h3>

            <h4>Is this compound calculator free?</h4>
            <p>
              Yes, the calculator is completely free and works directly in your browser without signup.
            </p>

            <h4>Can I use this calculator for forex trading?</h4>
            <p>
              Absolutely. The calculator is designed for forex, crypto, stocks, indices, and general investing strategies.
            </p>

            <h4>What is the best reinvestment percentage?</h4>
            <p>
              The ideal reinvestment percentage depends on your risk tolerance. Higher reinvestment increases growth potential but also increases volatility and drawdown risk.
            </p>

            <h4>Does this tool calculate realistic trading growth?</h4>
            <p>
              The calculator provides estimated projections based on the values you enter. Real market performance may vary depending on trading conditions and strategy consistency.
            </p>

          </div>
        </div>

      </div>
    </section>
  </div>

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