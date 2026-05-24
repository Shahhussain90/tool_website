<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- SEO -->
  <title>Keyword Density Checker - Free SEO Keyword Analyzer | VoltTools</title>

  <meta
    name="description"
    content="Free keyword density checker tool to analyze keyword frequency, SEO density percentage, word count, and top keywords for blog posts and website content.">

  <meta
    name="keywords"
    content="keyword density checker, seo keyword analyzer, keyword frequency checker, seo content tool, keyword counter, free seo tools">

  <meta name="author" content="VoltTools">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
/>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- <link rel="stylesheet" href="../css/tools.css"> -->

  <style>

    /* =========================================
       TOOL PAGE
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
       FORM
    ========================================= */

    .tool-field{
      margin-bottom:22px;
    }

    .tool-field label{
      display:block;
      margin-bottom:10px;
      font-size:0.95rem;
      font-weight:600;
      color:#e2e8f0;
    }

    .tool-input,
    .tool-textarea{
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

    .tool-input:focus,
    .tool-textarea:focus{
      border-color:rgba(99,102,241,0.6);
      box-shadow:0 0 0 4px rgba(99,102,241,0.12);
    }

    .tool-textarea{
      resize:none;
      min-height:260px;
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
      grid-template-columns:repeat(4,1fr);
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

    .red{
      color:#f87171;
    }

    /* =========================================
       STATS
    ========================================= */

    .stat-row{
      display:flex;
      justify-content:space-between;
      gap:20px;
      padding:14px 0;
      border-bottom:1px solid rgba(255,255,255,0.06);
    }

    .stat-row:last-child{
      border-bottom:none;
    }

    .stat-name{
      color:var(--muted);
    }

    .stat-val{
      font-weight:700;
    }

    /* =========================================
       BAR
    ========================================= */

    .density-wrap{
      width:100%;
      height:14px;
      background:rgba(255,255,255,0.06);
      border-radius:999px;
      overflow:hidden;
      margin-top:24px;
    }

    .density-bar{
      height:100%;
      width:0%;
      border-radius:999px;
      background:linear-gradient(
        90deg,
        var(--primary),
        var(--secondary)
      );
      transition:0.4s ease;
    }

    /* =========================================
       TABLE
    ========================================= */

    .table-wrap{
      overflow-x:auto;
    }

    table{
      width:100%;
      border-collapse:collapse;
    }

    th,
    td{
      padding:18px 20px;
      text-align:left;
    }

    th{
      font-size:0.9rem;
      color:#cbd5e1;
      border-bottom:1px solid var(--border);
    }

    td{
      border-bottom:1px solid rgba(255,255,255,0.05);
      color:#e2e8f0;
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

    @media (max-width:1100px){

      .metrics-grid{
        grid-template-columns:repeat(2,1fr);
      }

    }

    @media (max-width:900px){

      .tool-layout{
        grid-template-columns:1fr;
      }

    }

    @media (max-width:768px){

      .tool-hero{
        padding-top:50px;
        /* border:1px solid red; */
        /* width:100vw !important; */
      }

      .metrics-grid{
        grid-template-columns:1fr;
      }

      .metric-value{
        font-size:1.7rem;
      }

      th,
      td{
        padding:16px;
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
        🔍 Free SEO Analyzer Tool
      </div>

      <h1>
        Keyword Density Checker
      </h1>

      <p>
        Analyze keyword frequency, SEO density percentage, word count, and top keyword usage for blog posts, landing pages, and website content instantly.
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
              Keyword Analyzer
            </div>
          </div>

          <div class="tool-panel-body">

            <div class="tool-field">

              <label for="content">
                Paste Your Content
              </label>

              <textarea
                id="content"
                class="tool-textarea"
                placeholder="Paste your blog post, article, or SEO content here..."></textarea>

            </div>

            <div class="tool-field">

              <label for="keyword">
                Target Keyword
              </label>

              <input
                type="text"
                id="keyword"
                class="tool-input"
                placeholder="Enter target keyword">

            </div>

            <button
              class="tool-btn"
              onclick="analyzeKeywords()">

              Analyze Keywords

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
              Word Count
            </div>

            <div
              class="metric-value blue"
              id="wordCount">

              0

            </div>

          </div>

          <div class="metric-card">

            <div class="metric-label">
              Keyword Count
            </div>

            <div
              class="metric-value green"
              id="keywordCount">

              0

            </div>

          </div>

          <div class="metric-card">

            <div class="metric-label">
              Density
            </div>

            <div
              class="metric-value neutral"
              id="density">

              0%

            </div>

          </div>

          <div class="metric-card">

            <div class="metric-label">
              Characters
            </div>

            <div
              class="metric-value red"
              id="charCount">

              0

            </div>

          </div>

        </div>

        <!-- ANALYSIS -->
        <div class="tool-panel" style="margin-bottom:24px;">

          <div class="tool-panel-header">
            <div class="tool-panel-title">
              SEO Analysis
            </div>
          </div>

          <div class="tool-panel-body">

            <div class="stat-row">

              <span class="stat-name">
                SEO Status
              </span>

              <span
                class="stat-val"
                id="seoStatus">

                —

              </span>

            </div>

            <div class="stat-row">

              <span class="stat-name">
                Recommended Density
              </span>

              <span class="stat-val">
                1% - 2%
              </span>

            </div>

            <div class="stat-row">

              <span class="stat-name">
                Keyword Used
              </span>

              <span
                class="stat-val"
                id="keywordUsed">

                —

              </span>

            </div>

            <div class="density-wrap">

              <div
                class="density-bar"
                id="densityBar"></div>

            </div>

          </div>

        </div>

        <!-- TABLE -->
        <div class="tool-panel">

          <div class="tool-panel-header">

            <div class="tool-panel-title">
              Top Keywords
            </div>

          </div>

          <div class="table-wrap">

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

</section>

<!-- BLOG -->
<section class="tool-blog">

  <div class="container">

    <div class="section-header">

      <span>SEO Optimization</span>

      <h2>
        Why Keyword Density Matters for SEO
      </h2>

      <p>
        Learn how keyword optimization improves search rankings, content quality, and on-page SEO performance.
      </p>

    </div>

    <div class="tool-panel">

      <div class="tool-panel-body tool-blog-content">

        <h3>What Is Keyword Density?</h3>

        <p>
          Keyword density refers to the percentage of times a target keyword appears compared to the total number of words in your content. Search engines use keyword relevance signals to better understand the topic of a page.
        </p>

        <p>
          Maintaining a balanced keyword density helps improve SEO while avoiding keyword stuffing penalties.
        </p>

        <h3>How This Tool Works</h3>

        <p>
          Our keyword density checker scans your content, calculates total words, keyword frequency, character count, and keyword percentage instantly.
        </p>

        <p>
          The tool also identifies top repeated words to help optimize your content structure and SEO strategy.
        </p>

        <h3>Best Keyword Density Percentage</h3>

        <p>
          Most SEO experts recommend keeping keyword density between 1% and 2%. Excessive repetition may look unnatural and could negatively affect rankings.
        </p>

        <h3>Benefits of Using a Keyword Density Checker</h3>

        <ul>

          <li>Improve on-page SEO optimization</li>

          <li>Detect keyword stuffing issues</li>

          <li>Optimize blog posts and landing pages</li>

          <li>Analyze competitor content strategies</li>

          <li>Improve readability and content structure</li>

          <li>Track important SEO keyword usage</li>

        </ul>

        <h3>Frequently Asked Questions</h3>

        <h4>Is this keyword density checker free?</h4>

        <p>
          Yes, the tool is completely free and works instantly in your browser.
        </p>

        <h4>What is considered good keyword density?</h4>

        <p>
          Generally, 1% to 2% keyword density is considered healthy for SEO content.
        </p>

        <h4>Can I analyze long blog posts?</h4>

        <p>
          Absolutely. You can paste large articles, website content, product descriptions, and landing page copy.
        </p>

      </div>

    </div>

  </div>

</section>

<?php include '../layout/footer.php'; ?>

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

    if (keyword !== '') {

      const regex = new RegExp(`\\b${keyword}\\b`, 'gi');

      const matches = cleanText.match(regex);

      keywordCount = matches ? matches.length : 0;
    }

    // DENSITY
    const density = totalWords > 0 ?
      ((keywordCount / totalWords) * 100).toFixed(2) :
      0;

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

    if (density >= 1 && density <= 2) {
      seoStatus = 'Perfect';
    } else if (density > 2 && density <= 3) {
      seoStatus = 'Good';
    } else if (density > 3) {
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
      'the', 'and', 'is', 'in', 'to', 'of', 'a', 'for',
      'on', 'that', 'with', 'as', 'it', 'this', 'at',
      'by', 'an', 'be', 'are', 'from', 'or', 'was'
    ];

    const frequency = {};

    words.forEach(word => {

      if (word.length > 2 && !ignoreWords.includes(word)) {

        frequency[word] = (frequency[word] || 0) + 1;
      }

    });

    const sortedWords = Object.entries(frequency)
      .sort((a, b) => b[1] - a[1])
      .slice(0, 10);

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