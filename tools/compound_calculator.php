<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Compound Calculator</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/tools.css">

</head>
<body>
<div class="page">

  <?php
  include_once '../files/connection.php';
  include '../layout/header.php'; ?>

  <div class="layout">

    <!-- LEFT: Controls -->
    <div>
      <div class="panel" style="margin-bottom: 1rem;">
        <div class="panel-header"><span class="panel-title">Settings</span></div>
        <div class="panel-body">

          <div class="freq-tabs">
            <button class="freq-tab active" onclick="setFreq('daily',this)">Daily</button>
            <button class="freq-tab" onclick="setFreq('weekly',this)">Weekly</button>
            <button class="freq-tab" onclick="setFreq('monthly',this)">Monthly</button>
          </div>

          <div class="field">
            <div class="field-header">
              <span class="field-label">Starting Capital</span>
              <span class="field-value" id="capital-out">$10,000</span>
            </div>
            <input type="range" id="capital" min="500" max="200000" step="500" value="10000" oninput="update()">
          </div>

          <div class="field">
            <div class="field-header">
              <span class="field-label">Return Per Period (%)</span>
              <span class="field-value" id="rate-out">1.0%</span>
            </div>
            <input type="range" id="rate" min="0.1" max="15" step="0.1" value="1" oninput="update()">
          </div>

          <div class="field">
            <div class="field-header">
              <span class="field-label">Periods</span>
              <span class="field-value" id="periods-out">60</span>
            </div>
            <input type="range" id="periods" min="5" max="365" step="1" value="60" oninput="update()">
          </div>

          <div class="divider"></div>

          <div class="field">
            <div class="field-header">
              <span class="field-label">Reinvest Profits</span>
              <span class="field-value" id="reinvest-out">100%</span>
            </div>
            <input type="range" id="reinvest" min="0" max="100" step="5" value="100" oninput="update()">
          </div>

          <div class="field">
            <div class="field-header">
              <span class="field-label">Win Rate (%)</span>
              <span class="field-value" id="winrate-out">55%</span>
            </div>
            <input type="range" id="winrate" min="30" max="90" step="1" value="55" oninput="update()">
          </div>

          <div class="field">
            <div class="field-header">
              <span class="field-label">Risk Per Trade (%)</span>
              <span class="field-value" id="risk-out">2%</span>
            </div>
            <input type="range" id="risk" min="0.5" max="20" step="0.5" value="2" oninput="update()">
          </div>

          <div class="field">
            <div class="field-header">
              <span class="field-label">Reward : Risk Ratio</span>
              <span class="field-value" id="rr-out">2.0</span>
            </div>
            <input type="range" id="rr" min="0.5" max="5" step="0.1" value="2" oninput="update()">
          </div>

        </div>
      </div>

      <!-- Risk Stats -->
      <div class="panel">
        <div class="panel-header"><span class="panel-title">Risk Analysis</span></div>
        <div class="panel-body">
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
          <div class="risk-bar-wrap" style="margin-top:10px;">
            <div class="risk-bar" id="ruin-bar" style="width:0%; background: var(--red);"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT: Results -->
    <div>
      <!-- Metrics -->
      <div class="metrics-grid" style="grid-template-columns: repeat(4,1fr);">
        <div class="metric-card green">
          <div class="metric-label">Final Capital</div>
          <div class="metric-value green" id="m-final">—</div>
        </div>
        <div class="metric-card green">
          <div class="metric-label">Total Profit</div>
          <div class="metric-value green" id="m-profit">—</div>
        </div>
        <div class="metric-card blue">
          <div class="metric-label">Total Return</div>
          <div class="metric-value blue" id="m-return">—</div>
        </div>
        <div class="metric-card red">
          <div class="metric-label">Max Drawdown</div>
          <div class="metric-value red" id="m-dd">—</div>
        </div>
      </div>

      <!-- Chart -->
      <div class="panel" style="margin-bottom: 1rem;">
        <div class="panel-header">
          <span class="panel-title">Growth Curve</span>
          <div class="chart-legend" style="margin:0;">
            <div class="legend-item"><div class="legend-dot" style="background:var(--accent)"></div>Capital</div>
            <div class="legend-item"><div class="legend-dot" style="background:var(--dim)"></div>Baseline</div>
          </div>
        </div>
        <div class="panel-body" style="padding-top:12px;">
          <div class="chart-wrap">
            <canvas id="mainChart" role="img" aria-label="Compound growth chart"></canvas>
          </div>
        </div>
      </div>

      <!-- Schedule -->
      <div class="panel">
        <div class="panel-header"><span class="panel-title">Milestone Schedule</span></div>
        <div class="panel-body" style="padding:0; overflow-x:auto;">
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

<!-- BLOG / SEO CONTENT -->
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
  let freq = 'daily';
  let chart = null;

  function setFreq(f, btn) {
    freq = f;
    document.querySelectorAll('.freq-tab').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('freq-badge').textContent = f.toUpperCase();

    const periodsSlider = document.getElementById('periods');
    if (f === 'daily')   { periodsSlider.max = 365; periodsSlider.value = Math.min(periodsSlider.value, 365); }
    if (f === 'weekly')  { periodsSlider.max = 104; periodsSlider.value = Math.min(periodsSlider.value, 104); }
    if (f === 'monthly') { periodsSlider.max = 60;  periodsSlider.value = Math.min(periodsSlider.value, 60);  }
    update();
  }

  function fmt(n) {
    if (Math.abs(n) >= 1e6) return '$' + (n / 1e6).toFixed(2) + 'M';
    if (Math.abs(n) >= 1e3) return '$' + (n / 1e3).toFixed(1) + 'k';
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

    // Build data series
    const data = [capital];
    let bal = capital;
    let withdrawn = 0;

    for (let i = 0; i < periods; i++) {
      const gross = bal * rate;
      const keep  = gross * reinvest;
      withdrawn  += gross * (1 - reinvest);
      bal        += keep;
      data.push(+bal.toFixed(2));
    }

    const finalCap   = data[data.length - 1];
    const totalProfit = (finalCap - capital) + withdrawn;
    const totalReturn = (totalProfit / capital) * 100;
    const maxDD      = finalCap * risk * 3; // simulated 3-loss streak

    // Trading stats
    const avgWin    = risk * rr;
    const avgLoss   = risk;
    const loserate  = 1 - winrate;
    const pf        = (winrate * avgWin) / (loserate * avgLoss);
    const exp       = (winrate * avgWin) - (loserate * avgLoss);
    const kelly     = Math.max(0, (winrate / avgLoss) - (loserate / avgWin)) * 100;
    const ruinRaw   = Math.pow((avgLoss * loserate) / (avgWin * winrate), 10) * 100;
    const ruin      = Math.min(99.9, Math.max(0, ruinRaw));

    // Summary metrics
    document.getElementById('m-final').textContent  = fmt(finalCap);
    document.getElementById('m-profit').textContent = fmt(totalProfit);
    document.getElementById('m-return').textContent = totalReturn.toFixed(1) + '%';
    document.getElementById('m-dd').textContent     = fmt(maxDD);

    // Risk stats
    document.getElementById('s-pf').textContent    = pf.toFixed(2);
    document.getElementById('s-exp').textContent   = (exp * 100).toFixed(2) + '%';
    document.getElementById('s-kelly').textContent = kelly.toFixed(1) + '%';
    document.getElementById('s-dd').textContent    = fmtFull(maxDD);
    document.getElementById('s-ruin').textContent  = ruin.toFixed(1) + '%';
    document.getElementById('ruin-bar').style.width = ruin + '%';

    // Chart
    const labels   = data.map((_, i) => i);
    const baseline = data.map(() => capital);

    if (chart) {
      chart.data.labels              = labels;
      chart.data.datasets[0].data   = data;
      chart.data.datasets[1].data   = baseline;
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
          animation: { duration: 250 },
          plugins: {
            legend: { display: false },
            tooltip: {
              backgroundColor: '#181c22',
              borderColor: 'rgba(255,255,255,0.1)',
              borderWidth: 1,
              titleColor: '#606470',
              bodyColor: '#c8f564',
              titleFont: { family: 'Syne', size: 11 },
              bodyFont: { family: 'DM Mono', size: 13 },
              callbacks: {
                title: ctx => 'Period ' + ctx[0].label,
                label: ctx => fmtFull(ctx.parsed.y)
              }
            }
          },
          scales: {
            x: {
              ticks: {
                color: '#606470',
                maxTicksLimit: 8,
                font: { family: 'DM Mono', size: 11 }
              },
              grid: { color: 'rgba(255,255,255,0.04)' },
              border: { color: 'rgba(255,255,255,0.06)' }
            },
            y: {
              ticks: {
                color: '#606470',
                font: { family: 'DM Mono', size: 11 },
                callback: v => {
                  if (v >= 1e6) return '$' + (v/1e6).toFixed(1) + 'M';
                  if (v >= 1e3) return '$' + (v/1e3).toFixed(0) + 'k';
                  return '$' + v;
                }
              },
              grid: { color: 'rgba(255,255,255,0.04)' },
              border: { color: 'rgba(255,255,255,0.06)' }
            }
          }
        }
      });
    }

    // Milestone table
    const step = Math.max(1, Math.floor(periods / 10));
    const milestones = [];
    for (let i = step; i <= periods; i += step) milestones.push(i);
    if (milestones[milestones.length - 1] !== periods) milestones.push(periods);

    const tbody = document.getElementById('schedule-body');
    tbody.innerHTML = '';
    let prevBal = capital;

    milestones.forEach(p => {
      const cap     = data[p];
      const pProfit = cap - prevBal;
      const cumProfit = cap - capital;
      const growth  = ((cap - capital) / capital * 100).toFixed(1);
      const mult    = (cap / capital).toFixed(2);
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