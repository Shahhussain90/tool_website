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
              placeholder="Enter text or website URL"
            >
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
              oninput="updateSizeValue()"
            >
          </div>

          <div class="divider"></div>

          <button
            class="freq-tab active"
            style="width:100%;"
            onclick="generateQR()"
          >
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
            "
          ></div>

        </div>

      </div>

    </div>

  </div>

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

    if(qrText === '') {

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
      colorDark : "#ffffff",
      colorLight : "transparent",
      correctLevel : QRCode.CorrectLevel.H
    });

    document.getElementById('charCount').textContent = qrText.length;

    document.getElementById('statusText').textContent = 'Generated';
  }

  generateQR();

</script>

</body>
</html>