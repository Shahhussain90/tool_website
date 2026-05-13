<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Keyword Density Checker</title>

<link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@400;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/tools.css">

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
        <span class="panel-title">Keyword Analyzer</span>
      </div>

      <div class="panel-body">

        <!-- TEXT INPUT -->
        <div class="field">

          <div class="field-header">
            <span class="field-label">Paste Your Content</span>
          </div>

          <textarea
            id="content"
            class="number-input"
            rows="12"
            placeholder="Paste your article, blog post, or SEO content here..."
            style="resize:none;"
          ></textarea>

        </div>

        <!-- KEYWORD INPUT -->
        <div class="field">

          <div class="field-header">
            <span class="field-label">Target Keyword</span>
          </div>

          <input
            type="text"
            id="keyword"
            class="number-input"
            placeholder="Enter keyword"
          >

        </div>

        <div class="divider"></div>

        <button
          class="freq-tab active"
          style="width:100%;"
          onclick="analyzeKeywords()"
        >
          Analyze Keywords
        </button>

      </div>

    </div>

  </div>

  <!-- RIGHT PANEL -->
  <div>

    <!-- METRICS -->
    <div
      class="metrics-grid"
      style="grid-template-columns:repeat(4,1fr);"
    >

      <div class="metric-card blue">
        <div class="metric-label">Word Count</div>
        <div class="metric-value blue" id="wordCount">0</div>
      </div>

      <div class="metric-card green">
        <div class="metric-label">Keyword Count</div>
        <div class="metric-value green" id="keywordCount">0</div>
      </div>

      <div class="metric-card neutral">
        <div class="metric-label">Density</div>
        <div class="metric-value neutral" id="density">0%</div>
      </div>

      <div class="metric-card red">
        <div class="metric-label">Characters</div>
        <div class="metric-value red" id="charCount">0</div>
      </div>

    </div>

    <!-- RESULTS -->
    <div class="panel" style="margin-bottom:1rem;">

      <div class="panel-header">
        <span class="panel-title">Analysis Result</span>
      </div>

      <div class="panel-body">

        <div class="stat-row">
          <span class="stat-name">SEO Status</span>
          <span class="stat-val" id="seoStatus">—</span>
        </div>

        <div class="stat-row">
          <span class="stat-name">Recommended Density</span>
          <span class="stat-val">1% - 2%</span>
        </div>

        <div class="stat-row">
          <span class="stat-name">Keyword Used</span>
          <span class="stat-val" id="keywordUsed">—</span>
        </div>

        <div class="risk-bar-wrap">
          <div
            class="risk-bar"
            id="densityBar"
            style="width:0%;"
          ></div>
        </div>

      </div>

    </div>

    <!-- TOP WORDS -->
    <div class="panel">

      <div class="panel-header">
        <span class="panel-title">Top Keywords</span>
      </div>

      <div
        class="panel-body"
        style="padding:0; overflow-x:auto;"
      >

        <table>

          <thead>
            <tr>
              <th>Keyword</th>
              <th>Count</th>
              <th>Density</th>
            </tr>
          </thead>

          <tbody id="keywordsTable"></tbody>

        </table>

      </div>

    </div>

  </div>

</div>

</div>

<script>

function analyzeKeywords() {

  const content = document
    .getElementById('content')
    .value
    .toLowerCase();

  const keyword = document
    .getElementById('keyword')
    .value
    .toLowerCase()
    .trim();

  // CLEAN TEXT
  const cleanText = content.replace(/[^\w\s]/gi, ' ');

  const words = cleanText
    .split(/\s+/)
    .filter(word => word.length > 0);

  const totalWords = words.length;

  const charCount = content.length;

  // KEYWORD COUNT
  let keywordCount = 0;

  if(keyword !== '') {

    const regex = new RegExp(`\\b${keyword}\\b`, 'gi');

    const matches = cleanText.match(regex);

    keywordCount = matches ? matches.length : 0;
  }

  // DENSITY
  const density = totalWords > 0
    ? ((keywordCount / totalWords) * 100).toFixed(2)
    : 0;

  // UPDATE METRICS
  document.getElementById('wordCount').textContent = totalWords;

  document.getElementById('keywordCount').textContent = keywordCount;

  document.getElementById('density').textContent =
    density + '%';

  document.getElementById('charCount').textContent =
    charCount.toLocaleString();

  document.getElementById('keywordUsed').textContent =
    keyword || '—';

  // SEO STATUS
  let seoStatus = 'Poor';

  if(density >= 1 && density <= 2) {
    seoStatus = 'Perfect';
  }
  else if(density > 2 && density <= 3) {
    seoStatus = 'Good';
  }
  else if(density > 3) {
    seoStatus = 'Over Optimized';
  }

  document.getElementById('seoStatus').textContent =
    seoStatus;

  // BAR WIDTH
  const bar = document.getElementById('densityBar');

  const width = Math.min(density * 20, 100);

  bar.style.width = width + '%';

  // TOP WORDS
  const ignoreWords = [
    'the','and','is','in','to','of','a','for',
    'on','that','with','as','it','this','at',
    'by','an','be','are','from','or','was'
  ];

  const frequency = {};

  words.forEach(word => {

    if(word.length > 2 && !ignoreWords.includes(word)) {

      frequency[word] = (frequency[word] || 0) + 1;
    }

  });

  const sortedWords = Object.entries(frequency)
    .sort((a,b) => b[1] - a[1])
    .slice(0,10);

  const table = document.getElementById('keywordsTable');

  table.innerHTML = '';

  sortedWords.forEach(item => {

    const word = item[0];

    const count = item[1];

    const wordDensity =
      ((count / totalWords) * 100).toFixed(2);

    const row = document.createElement('tr');

    row.innerHTML = `
      <td>${word}</td>
      <td class="green">${count}</td>
      <td class="blue">${wordDensity}%</td>
    `;

    table.appendChild(row);

  });

}

</script>

</body>
</html>