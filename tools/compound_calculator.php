<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- SEO -->
<title>Compound Calculator - Trading & Investment Growth Tool | VoltTools</title>

<meta
  name="description"
  content="Free compound calculator for trading, forex, crypto, and investing. Calculate compounded growth, risk management, drawdown, expectancy, and profit projections.">

<meta
  name="keywords"
  content="compound calculator, trading calculator, forex compound calculator, crypto calculator, investment growth calculator, compounding tool">

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

<!-- Chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="../css/style.css">
<!-- <link rel="stylesheet" href="../css/tools.css"> -->

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
   
  }

  .tool-panel-header{
    padding:22px 24px;
    border-bottom:1px solid var(--border);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
  }

  .tool-panel-title{
    font-size:1rem;
    font-weight:700;
  }

  .tool-panel-body{
    padding:24px;
  }

  /* =========================================
     TABS
  ========================================= */

  .freq-tabs{
    display:flex;
    gap:12px;
    margin-bottom:26px;
  }

  .freq-tab{
    flex:1;
    border:none;
    background:rgba(255,255,255,0.04);
    border:1px solid var(--border);
    color:var(--muted);
    padding:14px;
    border-radius:16px;
    cursor:pointer;
    font-weight:600;
    transition:0.25s ease;
  }

  .freq-tab.active{
    background:linear-gradient(
      135deg,
      var(--primary),
      var(--secondary)
    );
    color:white;
    border-color:transparent;
  }

  /* =========================================
     FIELDS
  ========================================= */

  .field{
    margin-bottom:24px;
  }

  .field-header{
    display:flex;
    justify-content:space-between;
    gap:16px;
    margin-bottom:12px;
  }

  .field-label{
    font-size:0.95rem;
    font-weight:600;
    color:#e2e8f0;
  }

  .field-value{
    color:var(--muted);
    font-size:0.9rem;
  }

  input[type="range"]{
    width:100%;
    cursor:pointer;
  }

  .divider{
    height:1px;
    background:rgba(255,255,255,0.08);
    margin:28px 0;
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
     RISK BAR
  ========================================= */

  .risk-bar-wrap{
    width:100%;
    height:14px;
    background:rgba(255,255,255,0.06);
    border-radius:999px;
    overflow:hidden;
  }

  .risk-bar{
    height:100%;
    border-radius:999px;
    transition:0.35s ease;
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

  .green{
    color:#4ade80;
  }

  .blue{
    color:#60a5fa;
  }

  .red{
    color:#f87171;
  }

  .muted{
    color:var(--muted);
  }

  /* =========================================
     CHART
  ========================================= */

  .chart-wrap{
    height:420px;
  }

  .chart-legend{
    display:flex;
    gap:18px;
    align-items:center;
  }

  .legend-item{
    display:flex;
    align-items:center;
    gap:8px;
    color:var(--muted);
    font-size:0.9rem;
  }

  .legend-dot{
    width:12px;
    height:12px;
    border-radius:999px;
  }

  /* =========================================
     TABLE
  ========================================= */

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
     BLOG
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
    }

    .metrics-grid{
      grid-template-columns:1fr;
    }

    .metric-value{
      font-size:1.7rem;
    }

    .chart-wrap{
      height:320px;
    }

    th,
    td{
      padding:16px;
    }

  }

</style>

</head>

<body>

<div class="page">

<?php
include_once '../files/connection.php';
include '../layout/header.php';
?>

<!-- HERO -->
<section class="tool-hero">

  <div class="container">

    <div class="tool-hero-content">

      <div class="tool-badge">
        📈 Advanced Trading Calculator
      </div>

      <h1>
        Compound Interest & Trading Growth Calculator
      </h1>

      <p>
        Calculate compound growth, trading performance, risk management, drawdown, expectancy, and portfolio projections for forex, crypto, stocks, and investing.
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

        <!-- SETTINGS -->
        <div class="tool-panel" style="margin-bottom:24px;">

          <div class="tool-panel-header">

            <span class="tool-panel-title">
              Settings
            </span>

          </div>

          <div class="tool-panel-body">

            <div class="freq-tabs">

              <button
                class="freq-tab active"
                onclick="setFreq('daily',this)">

                Daily

              </button>

              <button
                class="freq-tab"
                onclick="setFreq('weekly',this)">

                Weekly

              </button>

              <button
                class="freq-tab"
                onclick="setFreq('monthly',this)">

                Monthly

              </button>

            </div>

            <div class="field">

              <div class="field-header">

                <span class="field-label">
                  Starting Capital
                </span>

                <span
                  class="field-value"
                  id="capital-out">

                  $10,000

                </span>

              </div>

              <input
                type="range"
                id="capital"
                min="500"
                max="200000"
                step="500"
                value="10000"
                oninput="update()">

            </div>

            <div class="field">

              <div class="field-header">

                <span class="field-label">
                  Return Per Period (%)
                </span>

                <span
                  class="field-value"
                  id="rate-out">

                  1.0%

                </span>

              </div>

              <input
                type="range"
                id="rate"
                min="0.1"
                max="15"
                step="0.1"
                value="1"
                oninput="update()">

            </div>

            <div class="field">

              <div class="field-header">

                <span class="field-label">
                  Periods
                </span>

                <span
                  class="field-value"
                  id="periods-out">

                  60

                </span>

              </div>

              <input
                type="range"
                id="periods"
                min="5"
                max="365"
                step="1"
                value="60"
                oninput="update()">

            </div>

            <div class="divider"></div>

            <div class="field">

              <div class="field-header">

                <span class="field-label">
                  Reinvest Profits
                </span>

                <span
                  class="field-value"
                  id="reinvest-out">

                  100%

                </span>

              </div>

              <input
                type="range"
                id="reinvest"
                min="0"
                max="100"
                step="5"
                value="100"
                oninput="update()">

            </div>

            <div class="field">

              <div class="field-header">

                <span class="field-label">
                  Win Rate (%)
                </span>

                <span
                  class="field-value"
                  id="winrate-out">

                  55%

                </span>

              </div>

              <input
                type="range"
                id="winrate"
                min="30"
                max="90"
                step="1"
                value="55"
                oninput="update()">

            </div>

            <div class="field">

              <div class="field-header">

                <span class="field-label">
                  Risk Per Trade (%)
                </span>

                <span
                  class="field-value"
                  id="risk-out">

                  2%

                </span>

              </div>

              <input
                type="range"
                id="risk"
                min="0.5"
                max="20"
                step="0.5"
                value="2"
                oninput="update()">

            </div>

            <div class="field">

              <div class="field-header">

                <span class="field-label">
                  Reward : Risk Ratio
                </span>

                <span
                  class="field-value"
                  id="rr-out">

                  2.0

                </span>

              </div>

              <input
                type="range"
                id="rr"
                min="0.5"
                max="5"
                step="0.1"
                value="2"
                oninput="update()">

            </div>

          </div>

        </div>

        <!-- RISK -->
        <div class="tool-panel">

          <div class="tool-panel-header">

            <span class="tool-panel-title">
              Risk Analysis
            </span>

          </div>

          <div class="tool-panel-body">

            <div class="stat-row">
              <span class="stat-name">Profit Factor</span>
              <span class="stat-val" id="s-pf">—</span>
            </div>

            <div class="stat-row">
              <span class="stat-name">Expectancy per trade</span>
              <span class="stat-val" id="s-exp">—</span>
            </div>

            <div class="stat-row">
              <span class="stat-name">Kelly Criterion</span>
              <span class="stat-val" id="s-kelly">—</span>
            </div>

            <div class="stat-row">
              <span class="stat-name">Max Drawdown $</span>
              <span class="stat-val" id="s-dd">—</span>
            </div>

            <div class="stat-row">
              <span class="stat-name">Ruin Probability</span>
              <span class="stat-val" id="s-ruin">—</span>
            </div>

            <div
              class="risk-bar-wrap"
              style="margin-top:14px;">

              <div
                class="risk-bar"
                id="ruin-bar"
                style="width:0%; background:#f87171;"></div>

            </div>

          </div>

        </div>

      </div>

      <!-- RIGHT -->
      <div>

        <!-- METRICS -->
        <div class="metrics-grid">

          <div class="metric-card">

            <div class="metric-label">
              Final Capital
            </div>

            <div
              class="metric-value green"
              id="m-final">

              —

            </div>

          </div>

          <div class="metric-card">

            <div class="metric-label">
              Total Profit
            </div>

            <div
              class="metric-value green"
              id="m-profit">

              —

            </div>

          </div>

          <div class="metric-card">

            <div class="metric-label">
              Total Return
            </div>

            <div
              class="metric-value blue"
              id="m-return">

              —

            </div>

          </div>

          <div class="metric-card">

            <div class="metric-label">
              Max Drawdown
            </div>

            <div
              class="metric-value red"
              id="m-dd">

              —

            </div>

          </div>

        </div>

        <!-- CHART -->
        <div
          class="tool-panel"
          style="margin-bottom:24px;">

          <div class="tool-panel-header">

            <span class="tool-panel-title">
              Growth Curve
            </span>

            <div class="chart-legend">

              <div class="legend-item">

                <div
                  class="legend-dot"
                  style="background:#c8f564;"></div>

                Capital

              </div>

              <div class="legend-item">

                <div
                  class="legend-dot"
                  style="background:#4b5563;"></div>

                Baseline

              </div>

            </div>

          </div>

          <div class="tool-panel-body">

            <div class="chart-wrap">

              <canvas
                id="mainChart"
                role="img"
                aria-label="Compound growth chart"></canvas>

            </div>

          </div>

        </div>

        <!-- TABLE -->
        <div class="tool-panel">

          <div class="tool-panel-header">

            <span class="tool-panel-title">
              Milestone Schedule
            </span>

          </div>

          <div
            class="tool-panel-body"
            style="padding:0; overflow-x:auto;">

            <table>

              <thead>

                <tr>
                  <th>Period</th>
                  <th>Capital</th>
                  <th>Period Profit</th>
                  <th>Cumulative</th>
                  <th>Growth</th>
                  <th>Multiple</th>
                </tr>

              </thead>

              <tbody id="schedule-body"></tbody>

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

      <span>Trading Education</span>

      <h2>
        Compound Interest & Trading Growth Calculator
      </h2>

      <p>
        Understand how compounding works in trading, investing, crypto, forex, and long-term portfolio growth using our advanced compound calculator.
      </p>

    </div>

    <div class="tool-panel">

      <div class="tool-panel-body tool-blog-content">

        <h3>What Is a Compound Calculator?</h3>

        <p>
          A compound calculator helps traders and investors estimate how their capital can grow over time when profits are continuously reinvested.
        </p>

        <p>
          This calculator is especially useful for forex traders, crypto traders, stock investors, and anyone using a compounding strategy.
        </p>

        <h3>How Compounding Works in Trading</h3>

        <p>
          Compounding means earning profits on both your original capital and previous profits. As your balance increases, future gains become larger over time.
        </p>

        <h3>Features of This Compound Trading Calculator</h3>

        <ul>

          <li>Calculate daily, weekly, or monthly compound growth</li>

          <li>Estimate long-term trading account growth</li>

          <li>Analyze win rates and risk management</li>

          <li>Visualize growth using charts</li>

          <li>Measure drawdown and ruin probability</li>

          <li>Plan position sizing strategies</li>

        </ul>

        <h3>Frequently Asked Questions</h3>

        <h4>Is this compound calculator free?</h4>

        <p>
          Yes, the calculator is completely free and works directly in your browser.
        </p>

        <h4>Can I use this calculator for forex trading?</h4>

        <p>
          Absolutely. It works for forex, crypto, stocks, and investing projections.
        </p>

      </div>

    </div>

  </div>

</section>

</div>

<script>

  let freq = 'daily';
  let chart = null;

  function setFreq(f, btn) {
    freq = f;
    document.querySelectorAll('.freq-tab').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const periodsSlider = document.getElementById('periods');

    if (f === 'daily') {
      periodsSlider.max = 365;
      periodsSlider.value = Math.min(periodsSlider.value, 365);
    }

    if (f === 'weekly') {
      periodsSlider.max = 104;
      periodsSlider.value = Math.min(periodsSlider.value, 104);
    }

    if (f === 'monthly') {
      periodsSlider.max = 60;
      periodsSlider.value = Math.min(periodsSlider.value, 60);
    }

    update();
  }

  function fmt(n) {

    if (Math.abs(n) >= 1e6)
      return '$' + (n / 1e6).toFixed(2) + 'M';

    if (Math.abs(n) >= 1e3)
      return '$' + (n / 1e3).toFixed(1) + 'k';

    return '$' + Math.round(n).toLocaleString();
  }

  function fmtFull(n) {
    return '$' + Math.round(n).toLocaleString();
  }

  function update() {

    const capital  = +document.getElementById('capital').value;
    const rate     = +document.getElementById('rate').value / 100;
    const periods  = +document.getElementById('periods').value;
    const reinvest = +document.getElementById('reinvest').value / 100;
    const winrate  = +document.getElementById('winrate').value / 100;
    const risk     = +document.getElementById('risk').value / 100;
    const rr       = +document.getElementById('rr').value;

    document.getElementById('capital-out').textContent  = fmtFull(capital);
    document.getElementById('rate-out').textContent     = (+document.getElementById('rate').value).toFixed(1) + '%';
    document.getElementById('periods-out').textContent  = periods;
    document.getElementById('reinvest-out').textContent = document.getElementById('reinvest').value + '%';
    document.getElementById('winrate-out').textContent  = document.getElementById('winrate').value + '%';
    document.getElementById('risk-out').textContent     = document.getElementById('risk').value + '%';
    document.getElementById('rr-out').textContent       = rr.toFixed(1);

    const data = [capital];

    let bal = capital;
    let withdrawn = 0;

    for (let i = 0; i < periods; i++) {

      const gross = bal * rate;
      const keep  = gross * reinvest;

      withdrawn += gross * (1 - reinvest);

      bal += keep;

      data.push(+bal.toFixed(2));
    }

    const finalCap    = data[data.length - 1];
    const totalProfit = (finalCap - capital) + withdrawn;
    const totalReturn = (totalProfit / capital) * 100;
    const maxDD       = finalCap * risk * 3;

    const avgWin   = risk * rr;
    const avgLoss  = risk;
    const loserate = 1 - winrate;

    const pf      = (winrate * avgWin) / (loserate * avgLoss);
    const exp     = (winrate * avgWin) - (loserate * avgLoss);
    const kelly   = Math.max(0, (winrate / avgLoss) - (loserate / avgWin)) * 100;
    const ruinRaw = Math.pow((avgLoss * loserate) / (avgWin * winrate), 10) * 100;
    const ruin    = Math.min(99.9, Math.max(0, ruinRaw));

    document.getElementById('m-final').textContent  = fmt(finalCap);
    document.getElementById('m-profit').textContent = fmt(totalProfit);
    document.getElementById('m-return').textContent = totalReturn.toFixed(1) + '%';
    document.getElementById('m-dd').textContent     = fmt(maxDD);

    document.getElementById('s-pf').textContent    = pf.toFixed(2);
    document.getElementById('s-exp').textContent   = (exp * 100).toFixed(2) + '%';
    document.getElementById('s-kelly').textContent = kelly.toFixed(1) + '%';
    document.getElementById('s-dd').textContent    = fmtFull(maxDD);
    document.getElementById('s-ruin').textContent  = ruin.toFixed(1) + '%';

    document.getElementById('ruin-bar').style.width = ruin + '%';

    const labels   = data.map((_, i) => i);
    const baseline = data.map(() => capital);

    if (chart) {

      chart.data.labels            = labels;
      chart.data.datasets[0].data = data;
      chart.data.datasets[1].data = baseline;

      chart.update('none');

    } else {

      chart = new Chart(document.getElementById('mainChart'), {

        type: 'line',

        data: {

          labels,

          datasets: [

            {
              label: 'Capital',
              data,
              borderColor: '#c8f564',
              backgroundColor: 'rgba(200,245,100,0.05)',
              fill: true,
              tension: 0.3,
              pointRadius: 0,
              borderWidth: 2
            },

            {
              label: 'Baseline',
              data: baseline,
              borderColor: 'rgba(58,61,69,0.8)',
              borderDash: [5, 4],
              fill: false,
              tension: 0,
              pointRadius: 0,
              borderWidth: 1
            }

          ]

        },

        options: {

          responsive: true,
          maintainAspectRatio: false,

          animation: {
            duration: 250
          },

          plugins: {

            legend: {
              display: false
            },

            tooltip: {

              backgroundColor: '#181c22',
              borderColor: 'rgba(255,255,255,0.1)',
              borderWidth: 1,

              titleColor: '#94a3b8',
              bodyColor: '#c8f564',

              callbacks: {

                title: ctx => 'Period ' + ctx[0].label,

                label: ctx => fmtFull(ctx.parsed.y)

              }

            }

          },

          scales: {

            x: {

              ticks: {
                color: '#94a3b8',
                maxTicksLimit: 8
              },

              grid: {
                color: 'rgba(255,255,255,0.04)'
              },

              border: {
                color: 'rgba(255,255,255,0.06)'
              }

            },

            y: {

              ticks: {

                color: '#94a3b8',

                callback: v => {

                  if (v >= 1e6)
                    return '$' + (v / 1e6).toFixed(1) + 'M';

                  if (v >= 1e3)
                    return '$' + (v / 1e3).toFixed(0) + 'k';

                  return '$' + v;
                }

              },

              grid: {
                color: 'rgba(255,255,255,0.04)'
              },

              border: {
                color: 'rgba(255,255,255,0.06)'
              }

            }

          }

        }

      });

    }

    const step = Math.max(1, Math.floor(periods / 10));

    const milestones = [];

    for (let i = step; i <= periods; i += step)
      milestones.push(i);

    if (milestones[milestones.length - 1] !== periods)
      milestones.push(periods);

    const tbody = document.getElementById('schedule-body');

    tbody.innerHTML = '';

    let prevBal = capital;

    milestones.forEach(p => {

      const cap       = data[p];
      const pProfit   = cap - prevBal;
      const cumProfit = cap - capital;
      const growth    = ((cap - capital) / capital * 100).toFixed(1);
      const mult      = (cap / capital).toFixed(2);

      prevBal = cap;

      const tr = document.createElement('tr');

      tr.innerHTML = `
        <td class="muted">${p}</td>
        <td>${fmtFull(cap)}</td>
        <td class="${pProfit >= 0 ? 'green' : 'red'}">${fmt(pProfit)}</td>
        <td class="${cumProfit >= 0 ? 'green' : 'red'}">${fmt(cumProfit)}</td>
        <td class="${growth >= 0 ? 'green' : 'red'}">${growth}%</td>
        <td class="muted">${mult}x</td>
      `;

      tbody.appendChild(tr);

    });

  }

  update();

</script>

</body>
</html>