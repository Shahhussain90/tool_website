<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <title>Risk Reward Calculator - Trading Position Size Tool | VoltTools</title>
    <meta name="description" content="Calculate risk reward ratio, position size, profit targets and stop loss levels for forex, crypto and stock trading with our free risk reward calculator.">
    <meta name="keywords" content="risk reward calculator, trading position size, stop loss calculator, profit target, forex risk management, trading calculator">
    <meta name="author" content="VoltTools">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
        /* =========================================
   TOOL-SPECIFIC OVERRIDES (non-conflicting)
   Uses rr- prefix to avoid any collisions
========================================= */

        /* Fonts override for this tool */
        /* body { font-family: 'Syne', sans-serif; } */

        /* ── Hero ── */
        .tool-hero {
            padding: 80px 0 30px;
        }

        .tool-hero-content {
            text-align: center;
            max-width: 850px;
            margin-inline: auto;
        }

        .tool-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 999px;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #fca5a5;
            margin-bottom: 24px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .tool-hero h1 {
            font-size: clamp(2.4rem, 5vw, 4rem);
            line-height: 1.1;
            margin-bottom: 20px;
            font-weight: 800;
        }

        .tool-hero h1 .accent {
            color: #f87171;
        }

        .tool-hero p {
            color: var(--muted);
            font-size: 1.05rem;
            max-width: 760px;
            margin-inline: auto;
        }

        /* ── Layout ── */
        .tool-layout {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 28px;
            align-items: start;
            margin-top: 40px;
        }

        /* ── Panels ── */
        .tool-panel {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .tool-panel-header {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .tool-panel-title {
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #cbd5e1;
        }

        .tool-panel-body {
            padding: 24px;
        }

        /* ── Fields ── */
        .tool-field {
            margin-bottom: 22px;
        }

        .tool-field-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .tool-label {
            font-size: 0.92rem;
            font-weight: 600;
            color: #e2e8f0;
        }

        .tool-value {
            color: #c7d2fe;
            font-size: 0.85rem;
            font-weight: 700;
            font-family: 'DM Mono', monospace;
        }

        .tool-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px 16px;
            color: white;
            font-family: 'DM Mono', monospace;
            font-size: 0.95rem;
            outline: none;
            transition: 0.25s ease;
        }

        .tool-input:focus {
            border-color: rgba(239, 68, 68, 0.5);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .tool-input-wrap {
            position: relative;
        }

        .tool-input-prefix {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-family: 'DM Mono', monospace;
            font-size: 0.9rem;
            pointer-events: none;
        }

        .tool-input.has-prefix {
            padding-left: 30px;
        }

        /* ── Range sliders ── */
        .rr-range {
            width: 100%;
            height: 6px;
            appearance: none;
            border-radius: 999px;
            background: linear-gradient(to right, #ef4444, #f97316);
            outline: none;
            cursor: pointer;
        }

        .rr-range::-webkit-slider-thumb {
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            border: 4px solid #ef4444;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
            transition: 0.2s ease;
        }

        .rr-range::-webkit-slider-thumb:hover {
            transform: scale(1.1);
        }

        /* ── Divider ── */
        .rr-divider {
            height: 1px;
            background: var(--border);
            margin: 20px 0;
        }

        /* ── Select ── */
        .tool-select {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px 16px;
            color: white;
            font-family: 'Syne', sans-serif;
            font-size: 0.92rem;
            outline: none;
            transition: 0.25s ease;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2394a3b8' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
        }

        .tool-select option {
            background: #0f172a;
        }

        .tool-select:focus {
            border-color: rgba(239, 68, 68, 0.5);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        /* ── Calculate button ── */
        .rr-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #ef4444, #f97316);
            border: none;
            border-radius: 14px;
            color: white;
            font-family: 'Syne', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: 0.5px;
            transition: 0.25s ease;
            box-shadow: 0 8px 24px rgba(239, 68, 68, 0.3);
        }

        .rr-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(239, 68, 68, 0.45);
        }

        .rr-btn:active {
            transform: translateY(0);
        }

        /* ── Metrics grid ── */
        .rr-metrics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .rr-metric {
            position: relative;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 22px;
            overflow: hidden;
            transition: 0.3s ease;
        }

        .rr-metric:hover {
            transform: translateY(-4px);
        }

        .rr-metric::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
        }

        .rr-metric.red::before {
            background: #ef4444;
        }

        .rr-metric.green::before {
            background: #22c55e;
        }

        .rr-metric.blue::before {
            background: #3b82f6;
        }

        .rr-metric.orange::before {
            background: #f97316;
        }

        .rr-metric-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            margin-bottom: 10px;
        }

        .rr-metric-value {
            font-size: 1.8rem;
            font-weight: 800;
            line-height: 1;
            font-family: 'DM Mono', monospace;
        }

        .rr-metric-value.red {
            color: #f87171;
        }

        .rr-metric-value.green {
            color: #4ade80;
        }

        .rr-metric-value.blue {
            color: #60a5fa;
        }

        .rr-metric-value.orange {
            color: #fb923c;
        }

        /* ── Visual RR bar ── */
        .rr-visual {
            margin-bottom: 24px;
        }

        .rr-bar-wrap {
            position: relative;
            height: 56px;
            border-radius: 16px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border);
        }

        .rr-bar-loss {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(239, 68, 68, 0.7), rgba(239, 68, 68, 0.3));
            transition: width 0.5s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rr-bar-profit {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(34, 197, 94, 0.3), rgba(34, 197, 94, 0.7));
            transition: width 0.5s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rr-bar-label {
            font-size: 0.78rem;
            font-weight: 700;
            color: white;
            font-family: 'DM Mono', monospace;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.5);
            white-space: nowrap;
            padding: 0 10px;
        }

        .rr-bar-entry {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: white;
            opacity: 0.6;
            transform: translateX(-50%);
        }

        .rr-bar-entry::after {
            content: 'ENTRY';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.65rem;
            color: var(--muted);
            font-family: 'DM Mono', monospace;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        /* ── Results table ── */
        .rr-table {
            width: 100%;
            border-collapse: collapse;
        }

        .rr-table thead th {
            text-align: left;
            padding: 16px 18px;
            border-bottom: 1px solid var(--border);
            color: #cbd5e1;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .rr-table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            transition: 0.2s ease;
        }

        .rr-table tbody tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .rr-table tbody td {
            padding: 16px 18px;
            font-size: 0.9rem;
            font-family: 'DM Mono', monospace;
        }

        .rr-table td.label {
            color: var(--muted);
            font-family: 'Syne', sans-serif;
            font-size: 0.88rem;
        }

        .rr-table td.val-green {
            color: #4ade80;
            font-weight: 600;
        }

        .rr-table td.val-red {
            color: #f87171;
            font-weight: 600;
        }

        .rr-table td.val-blue {
            color: #60a5fa;
            font-weight: 600;
        }

        .rr-table td.val-white {
            color: white;
            font-weight: 600;
        }

        /* ── Verdict badge ── */
        .rr-verdict {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 0.92rem;
        }

        .rr-verdict.good {
            background: rgba(34, 197, 94, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #4ade80;
        }

        .rr-verdict.bad {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        .rr-verdict.neutral {
            background: rgba(251, 191, 36, 0.08);
            border: 1px solid rgba(251, 191, 36, 0.2);
            color: #fbbf24;
        }

        .rr-verdict-icon {
            font-size: 1.3rem;
        }

        /* ── Stat rows (left panel) ── */
        .rr-stat-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 13px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .rr-stat-row:last-child {
            border-bottom: none;
        }

        .rr-stat-name {
            color: var(--muted);
            font-size: 0.88rem;
        }

        .rr-stat-val {
            color: white;
            font-weight: 700;
            font-family: 'DM Mono', monospace;
            font-size: 0.88rem;
        }

        /* ── Empty state ── */
        .rr-empty {
            text-align: center;
            padding: 50px 24px;
            color: var(--muted);
        }

        .rr-empty-icon {
            font-size: 2.8rem;
            margin-bottom: 14px;
            opacity: 0.3;
        }

        .rr-empty-text {
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* ── Blog ── */
        .tool-blog {
            margin-top: 80px;
            padding-bottom: 80px;
        }

        .tool-blog-content h3 {
            margin-top: 28px;
            margin-bottom: 12px;
            font-size: 1.25rem;
            color: #e2e8f0;
        }

        .tool-blog-content h4 {
            margin-top: 20px;
            margin-bottom: 8px;
            color: #cbd5e1;
        }

        .tool-blog-content p {
            color: var(--muted);
            margin-bottom: 14px;
            font-size: 0.93rem;
            line-height: 1.75;
        }

        .tool-blog-content ul {
            padding-left: 22px;
            color: var(--muted);
            margin-bottom: 14px;
        }

        .tool-blog-content li {
            margin-bottom: 8px;
            font-size: 0.93rem;
            line-height: 1.65;
        }

        /* ── Responsive ── */
        @media (max-width: 1100px) {
            .rr-metrics {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 900px) {
            .tool-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .rr-metrics {
                grid-template-columns: 1fr 1fr;
            }

            .tool-hero h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 400px) {
            .rr-metrics {
                grid-template-columns: 1fr;
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
                    📉 Risk Management Tool
                </div>
                <h1>Risk <span class="accent">Reward</span> Calculator</h1>
                <p>
                    Calculate your risk-reward ratio, position size, stop loss, and profit targets instantly for forex, crypto, and stock trading.
                </p>
            </div>
        </div>
    </section>

    <!-- TOOL -->
    <section>
        <div class="container">
            <div class="tool-layout">

                <!-- LEFT: Inputs -->
                <div>
                    <div class="tool-panel" style="margin-bottom:1rem;">
                        <div class="tool-panel-header">
                            <span class="tool-panel-title">Trade Setup</span>
                        </div>
                        <div class="tool-panel-body">

                            <div class="tool-field">
                                <label class="tool-label">Account Balance</label>
                                <div class="tool-input-wrap">
                                    <span class="tool-input-prefix">$</span>
                                    <input type="number" id="balance" class="tool-input has-prefix" placeholder="10000" value="10000" oninput="calculate()">
                                </div>
                            </div>

                            <div class="tool-field">
                                <div class="tool-field-header">
                                    <span class="tool-label">Risk Per Trade</span>
                                    <span class="tool-value" id="risk-out">2%</span>
                                </div>
                                <input type="range" id="risk-pct" class="rr-range" min="0.5" max="10" step="0.5" value="2" oninput="syncRisk();calculate()">
                            </div>

                            <div class="rr-divider"></div>

                            <div class="tool-field">
                                <label class="tool-label">Entry Price</label>
                                <div class="tool-input-wrap">
                                    <span class="tool-input-prefix">$</span>
                                    <input type="number" id="entry" class="tool-input has-prefix" placeholder="1.2500" step="0.0001" value="" oninput="calculate()">
                                </div>
                            </div>

                            <div class="tool-field">
                                <label class="tool-label">Stop Loss Price</label>
                                <div class="tool-input-wrap">
                                    <span class="tool-input-prefix">$</span>
                                    <input type="number" id="stoploss" class="tool-input has-prefix" placeholder="1.2400" step="0.0001" value="" oninput="calculate()">
                                </div>
                            </div>

                            <div class="tool-field">
                                <label class="tool-label">Take Profit Price</label>
                                <div class="tool-input-wrap">
                                    <span class="tool-input-prefix">$</span>
                                    <input type="number" id="takeprofit" class="tool-input has-prefix" placeholder="1.2700" step="0.0001" value="" oninput="calculate()">
                                </div>
                            </div>

                            <div class="rr-divider"></div>

                            <div class="tool-field">
                                <label class="tool-label">Asset Type</label>
                                <select id="asset-type" class="tool-select" onchange="calculate()">
                                    <option value="forex">Forex (Lots)</option>
                                    <option value="crypto">Crypto (Coins)</option>
                                    <option value="stocks">Stocks (Shares)</option>
                                    <option value="indices">Indices (Units)</option>
                                </select>
                            </div>
                            <div class="tool-field">
                                <label class="tool-label">Currency Pair / Symbol</label>
                                <select id="pair" class="tool-select" onchange="onPairChange()">
                                    <optgroup label="Forex Majors">
                                        <option value="EURUSD" data-pip="0.0001" data-pipval="10">EURUSD</option>
                                        <option value="GBPUSD" data-pip="0.0001" data-pipval="10">GBPUSD</option>
                                        <option value="USDJPY" data-pip="0.01" data-pipval="9.09">USDJPY</option>
                                        <option value="USDCHF" data-pip="0.0001" data-pipval="10">USDCHF</option>
                                        <option value="AUDUSD" data-pip="0.0001" data-pipval="10">AUDUSD</option>
                                        <option value="USDCAD" data-pip="0.0001" data-pipval="10">USDCAD</option>
                                        <option value="NZDUSD" data-pip="0.0001" data-pipval="10">NZDUSD</option>
                                    </optgroup>
                                    <optgroup label="Forex Crosses">
                                        <option value="GBPJPY" data-pip="0.01" data-pipval="9.09">GBPJPY</option>
                                        <option value="EURJPY" data-pip="0.01" data-pipval="9.09">EURJPY</option>
                                        <option value="EURGBP" data-pip="0.0001" data-pipval="10">EURGBP</option>
                                        <option value="GBPAUD" data-pip="0.0001" data-pipval="10">GBPAUD</option>
                                    </optgroup>
                                    <optgroup label="Metals / Commodities">
                                        <option value="XAUUSD" data-pip="0.1" data-pipval="1">XAUUSD (Gold)</option>
                                        <option value="XAGUSD" data-pip="0.001" data-pipval="5">XAGUSD (Silver)</option>
                                        <option value="XTIUSD" data-pip="0.01" data-pipval="10">XTIUSD (Oil)</option>
                                    </optgroup>
                                    <optgroup label="Crypto">
                                        <option value="BTCUSDT" data-pip="1" data-pipval="1">BTCUSDT</option>
                                        <option value="ETHUSDT" data-pip="0.1" data-pipval="1">ETHUSDT</option>
                                        <option value="SOLUSDT" data-pip="0.01" data-pipval="1">SOLUSDT</option>
                                        <option value="BNBUSDT" data-pip="0.01" data-pipval="1">BNBUSDT</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="tool-field" id="trade-type-field">
                                <label class="tool-label">Trade Type</label>
                                <select id="trade-type" class="tool-select" onchange="onTradeTypeChange()">
                                    <option value="spot">Spot</option>
                                    <option value="futures">Futures / Margin</option>
                                </select>
                            </div>

                            <div class="tool-field" id="leverage-field" style="display:none;">
                                <div class="tool-field-header">
                                    <span class="tool-label">Leverage</span>
                                    <span class="tool-value" id="leverage-out">10x</span>
                                </div>
                                <input type="range" id="leverage" class="rr-range" min="1" max="125" step="1" value="10"
                                    oninput="document.getElementById('leverage-out').textContent=this.value+'x'; calculate()">
                            </div>

                            <div class="tool-field">
                                <label class="tool-label">Trade Direction</label>
                                <select id="direction" class="tool-select" onchange="calculate()">
                                    <option value="long">Long (Buy)</option>
                                    <option value="short">Short (Sell)</option>
                                </select>
                            </div>

                            <button class="rr-btn" onclick="calculate()">
                                ⚡ Calculate Risk/Reward
                            </button>

                        </div>
                    </div>

                    <!-- Quick Stats Panel -->
                    <div class="tool-panel">
                        <div class="tool-panel-header">
                            <span class="tool-panel-title">Quick Stats</span>
                        </div>
                        <div class="tool-panel-body">
                            <div class="rr-stat-row">
                                <span class="rr-stat-name">Risk Amount $</span>
                                <span class="rr-stat-val" id="qs-risk">—</span>
                            </div>
                            <div class="rr-stat-row">
                                <span class="rr-stat-name">Reward Amount $</span>
                                <span class="rr-stat-val" id="qs-reward">—</span>
                            </div>
                            <div class="rr-stat-row">
                                <span class="rr-stat-name">Break-even Win Rate</span>
                                <span class="rr-stat-val" id="qs-breakeven">—</span>
                            </div>
                            <div class="rr-stat-row">
                                <span class="rr-stat-name">Stop Distance</span>
                                <span class="rr-stat-val" id="qs-stopdist">—</span>
                            </div>
                            <div class="rr-stat-row">
                                <span class="rr-stat-name">Target Distance</span>
                                <span class="rr-stat-val" id="qs-targetdist">—</span>
                            </div>
                            <div class="rr-stat-row">
                                <span class="rr-stat-name">Expected Value</span>
                                <span class="rr-stat-val" id="qs-ev">—</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Results -->
                <div>

                    <!-- Metrics -->
                    <div class="rr-metrics">
                        <div class="rr-metric red">
                            <div class="rr-metric-label">R:R Ratio</div>
                            <div class="rr-metric-value red" id="m-rr">—</div>
                        </div>
                        <div class="rr-metric green">
                            <div class="rr-metric-label">Position Size</div>
                            <div class="rr-metric-value green" id="m-size">—</div>
                        </div>
                        <div class="rr-metric blue">
                            <div class="rr-metric-label">Max Loss</div>
                            <div class="rr-metric-value blue" id="m-loss">—</div>
                        </div>
                        <div class="rr-metric orange">
                            <div class="rr-metric-label">Max Profit</div>
                            <div class="rr-metric-value orange" id="m-profit">—</div>
                        </div>
                    </div>

                    <!-- Verdict -->
                    <div id="verdict-box" style="display:none;"></div>

                    <!-- Visual RR Bar -->
                    <div class="tool-panel rr-visual" style="margin-bottom:1rem;">
                        <div class="tool-panel-header">
                            <span class="tool-panel-title">Risk / Reward Visual</span>
                            <span style="font-size:0.75rem;color:var(--muted);font-family:'DM Mono',monospace;" id="rr-ratio-label">—</span>
                        </div>
                        <div class="tool-panel-body">
                            <div id="rr-bar-area">
                                <div class="rr-empty">
                                    <div class="rr-empty-icon">⚖</div>
                                    <div class="rr-empty-text">Enter entry, stop loss and take profit<br>to see your risk/reward visualized.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detailed Results Table -->
                    <div class="tool-panel">
                        <div class="tool-panel-header">
                            <span class="tool-panel-title">Trade Breakdown</span>
                        </div>
                        <div class="tool-panel-body" style="padding:0;overflow-x:auto;">
                            <div id="table-area">
                                <div class="rr-empty">
                                    <div class="rr-empty-icon">📊</div>
                                    <div class="rr-empty-text">Fill in your trade details<br>to see full breakdown.</div>
                                </div>
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
                <span>Risk Management</span>
                <h2>How to Use a Risk Reward Calculator in Trading</h2>
                <p>Master position sizing, stop loss placement, and profit targets to protect your trading account and grow consistently.</p>
            </div>

            <div class="tool-panel">
                <div class="tool-panel-body tool-blog-content">

                    <h3>What Is Risk Reward Ratio?</h3>
                    <p>The risk reward ratio compares the potential profit of a trade to the potential loss. A 1:2 ratio means you risk $1 to potentially make $2. Professional traders typically look for setups with at least a 1:2 ratio to stay profitable over time.</p>

                    <h3>How to Calculate Position Size</h3>
                    <p>Position sizing determines how many units to trade based on your account balance and risk tolerance. The formula is:</p>
                    <p><strong style="color:#e2e8f0;">Position Size = (Account Balance × Risk %) ÷ Stop Loss Distance</strong></p>
                    <p>For example, with a $10,000 account, 2% risk, and a 50-pip stop loss, your risk amount is $200 and your position size is calculated accordingly.</p>

                    <h3>Key Metrics Explained</h3>
                    <ul>
                        <li><strong style="color:#f87171;">R:R Ratio</strong> — Reward divided by risk. Aim for 1.5 or higher.</li>
                        <li><strong style="color:#4ade80;">Position Size</strong> — Units/lots/shares to trade based on your risk.</li>
                        <li><strong style="color:#60a5fa;">Break-even Win Rate</strong> — Minimum win rate needed to be profitable with this R:R.</li>
                        <li><strong style="color:#fb923c;">Expected Value</strong> — Long-term profitability per trade at 50% win rate.</li>
                    </ul>

                    <h3>Why Risk Management Matters</h3>
                    <p>Even a strategy with a 40% win rate can be highly profitable with a 1:3 risk reward ratio. Proper risk management is what separates profitable traders from losing ones over the long term.</p>
                    <p>Never risk more than 1–3% of your account on a single trade. Consistent small risks compound into significant gains while protecting you from account wipeouts.</p>

                    <h3>Stop Loss Placement Tips</h3>
                    <ul>
                        <li>Place stop loss beyond key support/resistance levels</li>
                        <li>Use ATR (Average True Range) to set volatility-based stops</li>
                        <li>Never move stop loss further from entry to avoid a loss</li>
                        <li>Consider spread and slippage when setting tight stops</li>
                    </ul>

                    <h3>Frequently Asked Questions</h3>
                    <h4>What is a good risk reward ratio?</h4>
                    <p>Most professional traders use a minimum of 1:2. Higher ratios like 1:3 allow profitability even with win rates below 50%.</p>
                    <h4>How much should I risk per trade?</h4>
                    <p>Conservative traders risk 0.5–1% per trade. Aggressive traders may risk up to 2–3%. Never exceed 5% on a single trade.</p>
                    <h4>Does this calculator work for forex, crypto and stocks?</h4>
                    <p>Yes. Select your asset type and the calculator adjusts position sizing units accordingly for forex lots, crypto coins, or stock shares.</p>

                </div>
            </div>

        </div>
    </section>

    <?php include '../layout/footer.php'; ?>

    <script>
        function syncRisk() {
            const v = document.getElementById('risk-pct').value;
            document.getElementById('risk-out').textContent = v + '%';
        }

        function fmt(n, decimals = 2) {
            if (isNaN(n)) return '—';
            return n.toLocaleString('en-US', {
                minimumFractionDigits: decimals,
                maximumFractionDigits: decimals
            });
        }

        function fmtPrice(n) {
            if (isNaN(n)) return '—';
            // Show more decimals for forex
            const asset = document.getElementById('asset-type').value;
            const d = asset === 'forex' ? 4 : 2;
            return '$' + n.toLocaleString('en-US', {
                minimumFractionDigits: d,
                maximumFractionDigits: d
            });
        }

        function calculate() {
            const balance = parseFloat(document.getElementById('balance').value) || 0;
            const riskPct = parseFloat(document.getElementById('risk-pct').value) || 2;
            const entry = parseFloat(document.getElementById('entry').value) || 0;
            const stoploss = parseFloat(document.getElementById('stoploss').value) || 0;
            const takeprofit = parseFloat(document.getElementById('takeprofit').value) || 0;
            const assetType = document.getElementById('asset-type').value;
            const direction = document.getElementById('direction').value;

            syncRisk();

            if (!entry || !stoploss || !takeprofit || !balance) {
                resetResults();
                return;
            }

            // Direction validation
            if (direction === 'long') {
                if (stoploss >= entry || takeprofit <= entry) {
                    showError('For a Long trade: Stop Loss must be below Entry and Take Profit must be above Entry.');
                    return;
                }
            } else {
                if (stoploss <= entry || takeprofit >= entry) {
                    showError('For a Short trade: Stop Loss must be above Entry and Take Profit must be below Entry.');
                    return;
                }
            }

            const stopDist = Math.abs(entry - stoploss);
            const targetDist = Math.abs(takeprofit - entry);
            const rr = targetDist / stopDist;

            const riskAmount = (balance * riskPct) / 100;
            const rewardAmount = riskAmount * rr;

            // Position size calculation
            let positionSize, posUnit;
            if (assetType === 'forex') {
                // Standard lot = 100,000 units. pip value ~$10 per lot for major pairs
                const stopPips = stopDist * 10000; // convert price distance to pips (4-decimal pair)
                const pipValue = 10; // $10 per pip per standard lot (major pairs USD account)
                positionSize = riskAmount / (stopPips * pipValue);
                posUnit = 'lots';
            } else if (assetType === 'crypto') {
                positionSize = riskAmount / stopDist;
                posUnit = 'units';
            } else if (assetType === 'stocks') {
                positionSize = Math.floor(riskAmount / stopDist);
                posUnit = 'shares';
            } else {
                positionSize = riskAmount / stopDist;
                posUnit = 'units';
            }

            // Break-even win rate: 1 / (1 + RR)
            const breakEven = (1 / (1 + rr)) * 100;

            // Expected value at 50% win rate
            const ev = (0.5 * rewardAmount) - (0.5 * riskAmount);

            // Update metric cards
            const rrColor = rr >= 2 ? 'green' : rr >= 1 ? 'orange' : 'red';
            document.getElementById('m-rr').textContent = '1:' + fmt(rr, 1);
            document.getElementById('m-rr').className = 'rr-metric-value ' + (rr >= 2 ? 'green' : rr >= 1.5 ? 'orange' : 'red');
            document.getElementById('m-size').textContent = fmt(positionSize, assetType === 'forex' ? 2 : 0) + ' ' + posUnit;
            document.getElementById('m-loss').textContent = '$' + fmt(riskAmount);
            document.getElementById('m-profit').textContent = '$' + fmt(rewardAmount);

            // Quick stats
            document.getElementById('qs-risk').textContent = '$' + fmt(riskAmount);
            document.getElementById('qs-reward').textContent = '$' + fmt(rewardAmount);
            document.getElementById('qs-breakeven').textContent = fmt(breakEven, 1) + '%';
            document.getElementById('qs-stopdist').textContent = fmt(stopDist, 4);
            document.getElementById('qs-targetdist').textContent = fmt(targetDist, 4);
            document.getElementById('qs-ev').textContent = (ev >= 0 ? '+' : '') + '$' + fmt(ev);

            // Verdict
            const verdictBox = document.getElementById('verdict-box');
            verdictBox.style.display = 'block';
            if (rr >= 2) {
                verdictBox.innerHTML = `<div class="rr-verdict good"><span class="rr-verdict-icon">✅</span> Strong setup — R:R of 1:${fmt(rr,1)} is excellent. This trade meets professional risk standards.</div>`;
            } else if (rr >= 1.5) {
                verdictBox.innerHTML = `<div class="rr-verdict neutral"><span class="rr-verdict-icon">⚠️</span> Acceptable setup — R:R of 1:${fmt(rr,1)}. Consider waiting for a better entry to improve ratio.</div>`;
            } else {
                verdictBox.innerHTML = `<div class="rr-verdict bad"><span class="rr-verdict-icon">❌</span> Poor setup — R:R of 1:${fmt(rr,1)} is below 1:1.5. Not recommended for most traders.</div>`;
            }

            // Visual bar
            const total = stopDist + targetDist;
            const lossPct = (stopDist / total) * 100;
            const profPct = (targetDist / total) * 100;

            document.getElementById('rr-ratio-label').textContent = `Risk ${fmt(lossPct,0)}% : Reward ${fmt(profPct,0)}%`;
            document.getElementById('rr-bar-area').innerHTML = `
    <div style="margin-bottom:24px;padding-top:20px;position:relative;">
      <div style="text-align:center;margin-bottom:8px;font-size:0.75rem;color:var(--muted);font-family:'DM Mono',monospace;letter-spacing:1px;">ENTRY ${fmtPrice(entry)}</div>
      <div class="rr-bar-wrap">
        <div class="rr-bar-loss" style="width:${lossPct}%">
          <span class="rr-bar-label">SL ${fmtPrice(stoploss)}</span>
        </div>
        <div class="rr-bar-profit" style="width:${profPct}%">
          <span class="rr-bar-label">TP ${fmtPrice(takeprofit)}</span>
        </div>
      </div>
      <div style="display:flex;justify-content:space-between;margin-top:10px;">
        <span style="font-size:0.78rem;color:#f87171;font-family:'DM Mono',monospace;">-$${fmt(riskAmount)} loss</span>
        <span style="font-size:0.78rem;color:#4ade80;font-family:'DM Mono',monospace;">+$${fmt(rewardAmount)} profit</span>
      </div>
    </div>`;

            // Detailed table
            const tradeValue = positionSize * entry;
            document.getElementById('table-area').innerHTML = `
    <table class="rr-table">
      <thead>
        <tr>
          <th>Parameter</th>
          <th>Value</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="label">Entry Price</td>
          <td class="val-white">${fmtPrice(entry)}</td>
          <td style="color:var(--muted);font-size:0.82rem;">${direction === 'long' ? 'Buy at market' : 'Sell at market'}</td>
        </tr>
        <tr>
          <td class="label">Stop Loss</td>
          <td class="val-red">${fmtPrice(stoploss)}</td>
          <td style="color:var(--muted);font-size:0.82rem;">${fmt(stopDist * (direction==='forex'?10000:1), 4)} distance (${fmt(stopDist/entry*100,2)}%)</td>
        </tr>
        <tr>
          <td class="label">Take Profit</td>
          <td class="val-green">${fmtPrice(takeprofit)}</td>
          <td style="color:var(--muted);font-size:0.82rem;">${fmt(targetDist * (direction==='forex'?10000:1), 4)} distance (${fmt(targetDist/entry*100,2)}%)</td>
        </tr>
        <tr>
          <td class="label">Position Size</td>
          <td class="val-green">${fmt(positionSize, assetType==='forex'?2:0)} ${posUnit}</td>
          <td style="color:var(--muted);font-size:0.82rem;">Trade value ≈ $${fmt(tradeValue)}</td>
        </tr>
        <tr>
          <td class="label">Risk Amount</td>
          <td class="val-red">$${fmt(riskAmount)}</td>
          <td style="color:var(--muted);font-size:0.82rem;">${fmt(riskPct,1)}% of $${fmt(balance)} account</td>
        </tr>
        <tr>
          <td class="label">Reward Amount</td>
          <td class="val-green">$${fmt(rewardAmount)}</td>
          <td style="color:var(--muted);font-size:0.82rem;">${fmt(riskPct*rr,1)}% of account if wins</td>
        </tr>
        <tr>
          <td class="label">R:R Ratio</td>
          <td class="${rr>=2?'val-green':rr>=1.5?'val-white':'val-red'}">1 : ${fmt(rr,2)}</td>
          <td style="color:var(--muted);font-size:0.82rem;">${rr>=2?'Excellent':'rr>=1.5?Acceptable:Poor'} (min 1:1.5 recommended)</td>
        </tr>
        <tr>
          <td class="label">Break-even Win Rate</td>
          <td class="val-blue">${fmt(breakEven,1)}%</td>
          <td style="color:var(--muted);font-size:0.82rem;">Need to win >${fmt(breakEven,0)}% of trades to profit</td>
        </tr>
        <tr>
          <td class="label">Expected Value (50%)</td>
          <td class="${ev>=0?'val-green':'val-red'}">${ev>=0?'+':''}$${fmt(ev)}</td>
          <td style="color:var(--muted);font-size:0.82rem;">Per trade at 50% win rate</td>
        </tr>
      </tbody>
    </table>`;
        }

        function resetResults() {
            document.getElementById('m-rr').textContent = '—';
            document.getElementById('m-size').textContent = '—';
            document.getElementById('m-loss').textContent = '—';
            document.getElementById('m-profit').textContent = '—';
            ['qs-risk', 'qs-reward', 'qs-breakeven', 'qs-stopdist', 'qs-targetdist', 'qs-ev'].forEach(id => {
                document.getElementById(id).textContent = '—';
            });
            document.getElementById('verdict-box').style.display = 'none';
            document.getElementById('rr-ratio-label').textContent = '—';
            document.getElementById('rr-bar-area').innerHTML = `
    <div class="rr-empty">
      <div class="rr-empty-icon">⚖</div>
      <div class="rr-empty-text">Enter entry, stop loss and take profit<br>to see your risk/reward visualized.</div>
    </div>`;
            document.getElementById('table-area').innerHTML = `
    <div class="rr-empty">
      <div class="rr-empty-icon">📊</div>
      <div class="rr-empty-text">Fill in your trade details<br>to see full breakdown.</div>
    </div>`;
        }

        function showError(msg) {
            const verdictBox = document.getElementById('verdict-box');
            verdictBox.style.display = 'block';
            verdictBox.innerHTML = `<div class="rr-verdict bad"><span class="rr-verdict-icon">⚠️</span> ${msg}</div>`;
        }

        // Init
        calculate();
    </script>

</body>

</html>