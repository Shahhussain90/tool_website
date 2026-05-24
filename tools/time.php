<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focus Timer & Productivity Dashboard | VoltTools</title>
    <meta name="description" content="Boost focus, track deep work sessions, manage tasks, run Pomodoro timers, and improve productivity with VoltTools's modern focus timer dashboard.">
    <meta name="keywords" content="focus timer, pomodoro timer, productivity dashboard, task manager, study timer, countdown timer, work timer, focus app">
    <meta name="author" content="VoltTools">

    <link rel="apple-touch-icon" sizes="180x180" href="../files/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../files/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../files/images/favicon-16x16.png">
    <link rel="manifest" href="../files/images/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <style>
    /* =========================================
       FOCUS TIMER — TOOL-SPECIFIC STYLES
       Prefix: focus-
    ========================================= */

    /* ── Hero ── */
    .tool-hero { padding: 80px 0 30px; }
    .tool-hero-content { text-align: center; max-width: 850px; margin-inline: auto; }
    .tool-badge {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 18px; border-radius: 999px;
        background: rgba(99,102,241,0.12); border: 1px solid rgba(99,102,241,0.28);
        color: #c7d2fe; margin-bottom: 24px; font-size: 0.9rem; font-weight: 600;
    }
    .tool-badge-dot {
        width: 7px; height: 7px; border-radius: 50%;
        background: #818cf8; animation: focusPulse 1.6s infinite;
    }
    @keyframes focusPulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.3;transform:scale(0.8)} }

    .tool-hero h1 { font-size: clamp(2.4rem,5vw,4rem); line-height:1.1; margin-bottom:20px; font-weight:800; }
    .tool-hero h1 .accent { color: #818cf8; }
    .tool-hero p { color: var(--muted); font-size:1.05rem; max-width:760px; margin-inline:auto; }

    /* ── Layout ── */
    .tool-layout { display: grid; grid-template-columns: 340px 1fr; gap: 28px; align-items: start; margin-top: 40px; }

    /* ── Panels ── */
    .tool-panel { background: var(--card); border: 1px solid var(--border); border-radius: 24px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.2); }
    .tool-panel-header { padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
    .tool-panel-title { font-size: 0.78rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: #cbd5e1; }
    .tool-panel-body { padding: 24px; }

    /* ── Fields ── */
    .tool-field { margin-bottom: 20px; }
    .tool-field-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px; }
    .tool-label { font-size: 0.9rem; font-weight: 600; color: #e2e8f0; display: block; margin-bottom: 9px; }
    .tool-value { color: #a5b4fc; font-size: 0.85rem; font-weight: 700; font-family: 'DM Mono', monospace; }

    .tool-input {
        width: 100%; background: rgba(255,255,255,0.04); border: 1px solid var(--border);
        border-radius: 14px; padding: 13px 16px; color: white;
        font-family: 'DM Mono', monospace; font-size: 0.92rem; outline: none; transition: 0.25s ease;
    }
    .tool-input:focus { border-color: rgba(99,102,241,0.5); box-shadow: 0 0 0 4px rgba(99,102,241,0.1); }

    .tool-select {
        width: 100%; background: rgba(255,255,255,0.04); border: 1px solid var(--border);
        border-radius: 14px; padding: 13px 16px; color: white;
        font-family: 'Syne', sans-serif; font-size: 0.9rem; outline: none;
        cursor: pointer; appearance: none; transition: 0.25s ease;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2394a3b8' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat; background-position: right 16px center;
    }
    .tool-select option { background: #0f172a; }
    .tool-select:focus { border-color: rgba(99,102,241,0.5); box-shadow: 0 0 0 4px rgba(99,102,241,0.1); }

    /* ── Mode Tabs ── */
    .focus-mode-tabs { display: grid; grid-template-columns: repeat(3,1fr); gap: 7px; margin-bottom: 22px; }
    .focus-mode-tab {
        background: rgba(255,255,255,0.04); border: 1px solid transparent;
        color: var(--muted); padding: 11px 8px; border-radius: 12px;
        font-size: 0.8rem; font-weight: 600; cursor: pointer;
        font-family: 'Syne', sans-serif; transition: 0.25s ease; text-align: center;
    }
    .focus-mode-tab:hover { color: white; transform: translateY(-2px); }
    .focus-mode-tab.active { background: rgba(99,102,241,0.14); border-color: rgba(99,102,241,0.32); color: #c7d2fe; }

    /* ── Range sliders ── */
    .focus-range {
        width: 100%; height: 6px; appearance: none; border-radius: 999px;
        background: linear-gradient(to right, #6366f1, #8b5cf6); outline: none; cursor: pointer;
    }
    .focus-range::-webkit-slider-thumb {
        appearance: none; width: 18px; height: 18px; border-radius: 50%;
        background: white; border: 4px solid #6366f1; cursor: pointer;
        box-shadow: 0 4px 10px rgba(99,102,241,0.4); transition: 0.2s ease;
    }
    .focus-range::-webkit-slider-thumb:hover { transform: scale(1.1); }

    /* ── Divider ── */
    .focus-divider { height: 1px; background: var(--border); margin: 18px 0; }

    /* ── Buttons ── */
    .focus-btn {
        width: 100%; padding: 15px; background: linear-gradient(135deg,#6366f1,#8b5cf6);
        border: none; border-radius: 14px; color: white; font-family: 'Syne', sans-serif;
        font-size: 0.95rem; font-weight: 700; cursor: pointer; letter-spacing: 0.5px;
        transition: 0.25s ease; box-shadow: 0 8px 24px rgba(99,102,241,0.3);
    }
    .focus-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(99,102,241,0.45); }
    .focus-btn:active { transform: translateY(0); }
    .focus-btn.danger { background: linear-gradient(135deg,#ef4444,#f97316); box-shadow: 0 8px 24px rgba(239,68,68,0.25); }
    .focus-btn.secondary { background: rgba(255,255,255,0.06); box-shadow: none; border: 1px solid var(--border); }
    .focus-btn.secondary:hover { background: rgba(255,255,255,0.1); box-shadow: none; }

    .focus-btn-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }

    /* ── Task quick-add ── */
    .task-add-wrap { display: flex; gap: 8px; }
    .task-add-wrap .tool-input { border-radius: 12px; padding: 12px 14px; }
    .task-add-btn {
        flex-shrink: 0; width: 46px; height: 46px; background: linear-gradient(135deg,#6366f1,#8b5cf6);
        border: none; border-radius: 12px; color: white; font-size: 1.2rem;
        cursor: pointer; transition: 0.25s ease; display: flex; align-items: center; justify-content: center;
    }
    .task-add-btn:hover { transform: scale(1.08); }

    /* ── Metrics ── */
    .focus-metrics { display: grid; grid-template-columns: repeat(4,1fr); gap: 16px; margin-bottom: 22px; }
    .focus-metric {
        position: relative; background: var(--card); border: 1px solid var(--border);
        border-radius: 20px; padding: 20px; overflow: hidden; transition: 0.3s ease;
    }
    .focus-metric:hover { transform: translateY(-4px); border-color: rgba(99,102,241,0.3); }
    .focus-metric::before { content:""; position:absolute; top:0; left:0; width:100%; height:4px; }
    .focus-metric.blue::before   { background: #3b82f6; }
    .focus-metric.purple::before { background: #8b5cf6; }
    .focus-metric.cyan::before   { background: #06b6d4; }
    .focus-metric.green::before  { background: #22c55e; }
    .focus-metric-label { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); margin-bottom: 10px; }
    .focus-metric-value { font-size: 1.7rem; font-weight: 800; line-height: 1; font-family: 'DM Mono', monospace; }
    .focus-metric-value.blue   { color: #60a5fa; }
    .focus-metric-value.purple { color: #a78bfa; }
    .focus-metric-value.cyan   { color: #22d3ee; }
    .focus-metric-value.green  { color: #4ade80; }
    .focus-metric-sub { margin-top: 6px; font-size: 0.75rem; color: var(--muted); }

    /* ── TIMER DISPLAY ── */
    .focus-timer-wrap {
        display: flex; flex-direction: column; align-items: center;
        justify-content: center; padding: 32px 24px; position: relative;
    }
    .focus-ring-wrap { position: relative; width: 240px; height: 240px; margin-bottom: 28px; }
    .focus-ring-svg { width: 240px; height: 240px; transform: rotate(-90deg); }
    .focus-ring-bg { fill: none; stroke: rgba(255,255,255,0.06); stroke-width: 8; }
    .focus-ring-prog {
        fill: none; stroke: url(#ringGrad); stroke-width: 8;
        stroke-linecap: round; transition: stroke-dashoffset 0.8s ease;
        filter: drop-shadow(0 0 8px rgba(99,102,241,0.6));
    }
    .focus-ring-inner {
        position: absolute; inset: 0; display: flex; flex-direction: column;
        align-items: center; justify-content: center; text-align: center;
    }
    .focus-timer-display {
        font-size: 3.2rem; font-weight: 800; font-family: 'DM Mono', monospace;
        color: white; letter-spacing: -2px; line-height: 1;
        text-shadow: 0 0 30px rgba(99,102,241,0.5);
    }
    .focus-timer-mode-label {
        font-size: 0.72rem; font-weight: 700; letter-spacing: 2px;
        text-transform: uppercase; color: #a5b4fc; margin-top: 6px;
    }
    .focus-session-count {
        font-size: 0.75rem; color: var(--muted); margin-top: 3px;
        font-family: 'DM Mono', monospace;
    }

    /* ── Glow pulse when running ── */
    .focus-ring-wrap.running .focus-ring-prog {
        animation: glowPulse 2s ease-in-out infinite;
    }
    @keyframes glowPulse {
        0%,100% { filter: drop-shadow(0 0 8px rgba(99,102,241,0.5)); }
        50%      { filter: drop-shadow(0 0 18px rgba(139,92,246,0.9)); }
    }

    /* ── Timer Controls ── */
    .focus-controls { display: flex; gap: 12px; align-items: center; justify-content: center; }
    .focus-ctrl-btn {
        border: none; cursor: pointer; border-radius: 50%; transition: 0.25s ease;
        display: flex; align-items: center; justify-content: center; font-size: 1rem;
    }
    .focus-ctrl-btn.main {
        width: 68px; height: 68px; font-size: 1.4rem;
        background: linear-gradient(135deg,#6366f1,#8b5cf6);
        color: white; box-shadow: 0 8px 24px rgba(99,102,241,0.45);
    }
    .focus-ctrl-btn.main:hover { transform: scale(1.08); box-shadow: 0 12px 32px rgba(99,102,241,0.6); }
    .focus-ctrl-btn.secondary-ctrl {
        width: 48px; height: 48px; background: rgba(255,255,255,0.06);
        border: 1px solid var(--border); color: var(--muted);
    }
    .focus-ctrl-btn.secondary-ctrl:hover { background: rgba(255,255,255,0.1); color: white; transform: scale(1.05); }

    /* ── Active task bar ── */
    .focus-active-task {
        width: 100%; background: rgba(99,102,241,0.08); border: 1px solid rgba(99,102,241,0.2);
        border-radius: 14px; padding: 14px 18px; margin-top: 20px;
        display: flex; align-items: center; gap: 12px; min-height: 52px;
    }
    .focus-active-dot { width: 8px; height: 8px; border-radius: 50%; background: #818cf8; flex-shrink: 0; animation: focusPulse 1.6s infinite; }
    .focus-active-text { font-size: 0.88rem; color: #c7d2fe; font-weight: 600; }
    .focus-active-empty { color: var(--muted); font-size: 0.85rem; }

    /* ── Task List ── */
    .focus-task-list { display: flex; flex-direction: column; gap: 8px; }
    .focus-task-item {
        display: flex; align-items: center; gap: 12px;
        background: rgba(255,255,255,0.03); border: 1px solid var(--border);
        border-radius: 14px; padding: 14px 16px; transition: 0.25s ease;
        animation: taskSlideIn 0.3s ease;
    }
    @keyframes taskSlideIn { from { opacity:0; transform:translateY(-8px); } to { opacity:1; transform:translateY(0); } }
    .focus-task-item:hover { background: rgba(255,255,255,0.05); border-color: rgba(99,102,241,0.2); }
    .focus-task-item.active-task { border-color: rgba(99,102,241,0.4); background: rgba(99,102,241,0.07); }
    .focus-task-item.done { opacity: 0.45; }
    .focus-task-item.done .focus-task-name { text-decoration: line-through; color: var(--muted); }

    .focus-task-check {
        width: 20px; height: 20px; border-radius: 50%; border: 2px solid var(--border);
        flex-shrink: 0; cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: 0.2s ease; background: transparent;
    }
    .focus-task-check:hover { border-color: #6366f1; }
    .focus-task-check.checked { background: #6366f1; border-color: #6366f1; }
    .focus-task-check.checked::after { content: '✓'; color: white; font-size: 0.65rem; font-weight: 800; }

    .focus-task-info { flex: 1; min-width: 0; }
    .focus-task-name { font-size: 0.88rem; font-weight: 600; color: #e2e8f0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .focus-task-meta { font-size: 0.75rem; color: var(--muted); margin-top: 2px; font-family: 'DM Mono', monospace; }

    .focus-task-priority {
        font-size: 0.65rem; font-weight: 700; letter-spacing: 0.5px;
        padding: 3px 9px; border-radius: 999px; flex-shrink: 0;
    }
    .focus-task-priority.high   { background: rgba(239,68,68,0.12);  color: #f87171; }
    .focus-task-priority.med    { background: rgba(251,191,36,0.12); color: #fbbf24; }
    .focus-task-priority.low    { background: rgba(34,197,94,0.12);  color: #4ade80; }

    .focus-task-play {
        width: 30px; height: 30px; border-radius: 50%; background: rgba(99,102,241,0.15);
        border: 1px solid rgba(99,102,241,0.25); color: #a5b4fc;
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        font-size: 0.75rem; transition: 0.2s ease; flex-shrink: 0;
    }
    .focus-task-play:hover { background: rgba(99,102,241,0.3); color: white; transform: scale(1.1); }

    .focus-task-del {
        width: 28px; height: 28px; border-radius: 50%; background: transparent;
        border: none; color: var(--muted); cursor: pointer;
        display: flex; align-items: center; justify-content: center; font-size: 0.8rem;
        transition: 0.2s ease; flex-shrink: 0;
    }
    .focus-task-del:hover { color: #f87171; transform: scale(1.1); }

    /* ── Stats rows ── */
    .focus-stat-row {
        display: flex; align-items: center; justify-content: space-between;
        padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .focus-stat-row:last-child { border-bottom: none; }
    .focus-stat-name { color: var(--muted); font-size: 0.87rem; }
    .focus-stat-val  { color: white; font-weight: 700; font-family: 'DM Mono', monospace; font-size: 0.87rem; }

    /* ── Session History Table ── */
    .focus-table { width: 100%; border-collapse: collapse; }
    .focus-table thead th {
        text-align: left; padding: 14px 18px; border-bottom: 1px solid var(--border);
        color: #cbd5e1; font-size: 0.72rem; font-weight: 700;
        text-transform: uppercase; letter-spacing: 1px;
    }
    .focus-table tbody tr { border-bottom: 1px solid rgba(255,255,255,0.04); transition: 0.2s ease; }
    .focus-table tbody tr:hover { background: rgba(255,255,255,0.03); }
    .focus-table tbody td { padding: 14px 18px; font-size: 0.87rem; font-family: 'DM Mono', monospace; }
    .focus-table td.label { color: var(--muted); font-family: 'Syne', sans-serif; font-size: 0.85rem; }
    .focus-table td.val-blue   { color: #60a5fa; font-weight: 600; }
    .focus-table td.val-purple { color: #a78bfa; font-weight: 600; }
    .focus-table td.val-green  { color: #4ade80; font-weight: 600; }
    .focus-table td.val-white  { color: white;   font-weight: 600; }

    /* ── Empty state ── */
    .focus-empty { text-align: center; padding: 44px 24px; color: var(--muted); }
    .focus-empty-icon { font-size: 2.5rem; margin-bottom: 12px; opacity: 0.3; }
    .focus-empty-text { font-size: 0.88rem; line-height: 1.6; }

    /* ── Weekly bar chart ── */
    .focus-week-chart { display: flex; align-items: flex-end; justify-content: space-between; gap: 8px; height: 80px; padding: 0 4px; }
    .focus-week-col { display: flex; flex-direction: column; align-items: center; gap: 6px; flex: 1; }
    .focus-week-bar-wrap { flex: 1; width: 100%; display: flex; align-items: flex-end; }
    .focus-week-bar {
        width: 100%; border-radius: 6px 6px 0 0;
        background: linear-gradient(180deg,#6366f1,#3b82f6);
        min-height: 4px; transition: height 0.5s ease;
        opacity: 0.7;
    }
    .focus-week-bar.today { opacity: 1; box-shadow: 0 0 12px rgba(99,102,241,0.5); }
    .focus-week-label { font-size: 0.65rem; color: var(--muted); font-family: 'DM Mono', monospace; }

    /* ── Blog ── */
    .tool-blog { margin-top: 80px; padding-bottom: 80px; }
    .tool-blog-content h3 { margin-top: 28px; margin-bottom: 12px; font-size: 1.2rem; color: #e2e8f0; }
    .tool-blog-content h4 { margin-top: 20px; margin-bottom: 8px; color: #cbd5e1; }
    .tool-blog-content p  { color: var(--muted); margin-bottom: 14px; font-size: 0.92rem; line-height: 1.75; }
    .tool-blog-content ul { padding-left: 22px; color: var(--muted); margin-bottom: 14px; }
    .tool-blog-content li { margin-bottom: 8px; font-size: 0.92rem; line-height: 1.65; }

    /* ── Scrollbar ── */
    .focus-task-scroll { max-height: 340px; overflow-y: auto; padding-right: 4px; }
    .focus-task-scroll::-webkit-scrollbar { width: 4px; }
    .focus-task-scroll::-webkit-scrollbar-track { background: transparent; }
    .focus-task-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 999px; }

    /* ── Responsive ── */
    @media (max-width:1100px) { .focus-metrics { grid-template-columns: repeat(2,1fr); } }
    @media (max-width:900px)  { .tool-layout { grid-template-columns: 1fr; } }
    @media (max-width:600px)  { .focus-metrics { grid-template-columns: 1fr 1fr; } .tool-hero h1 { font-size: 2rem; } .focus-timer-display { font-size: 2.6rem; } }
    @media (max-width:400px)  { .focus-metrics { grid-template-columns: 1fr; } }
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
                <div class="tool-badge-dot"></div>
                ⏳ Productivity System
            </div>
            <h1>Focus <span class="accent">Timer</span> Dashboard</h1>
            <p>Track focus sessions, manage tasks, run Pomodoro cycles, and stay productive with a beautifully designed all-in-one productivity system.</p>
        </div>
    </div>
</section>

<!-- TOOL -->
<section>
<div class="container">
<div class="tool-layout">

    <!-- ═══════════ LEFT PANEL ═══════════ -->
    <div>
        <div class="tool-panel" style="margin-bottom:1rem;">
            <div class="tool-panel-header">
                <span class="tool-panel-title">Timer Settings <button class="focus-btn danger" onclick="resetAllStats()">
    Reset Stats to 0
</button></span>
            </div>
            <div class="tool-panel-body">

                <!-- Mode tabs -->
                <div class="focus-mode-tabs">
                    <button class="focus-mode-tab active" onclick="setMode('pomodoro',this)">🍅 Pomodoro</button>
                    <button class="focus-mode-tab" onclick="setMode('countdown',this)">⏱ Countdown</button>
                    <button class="focus-mode-tab" onclick="setMode('countup',this)">⏫ Count Up</button>
                    <button class="focus-mode-tab" onclick="setMode('deepwork',this)">🧠 Deep Work</button>
                    <button class="focus-mode-tab" onclick="setMode('break',this)">☕ Break</button>
                    <button class="focus-mode-tab" onclick="setMode('custom',this)">⚙ Custom</button>
                </div>

                <!-- Focus Duration -->
                <div class="tool-field">
                    <div class="tool-field-header">
                        <span class="tool-label" style="margin-bottom:0;">Focus Duration</span>
                        <span class="tool-value" id="focus-dur-out">25 min</span>
                    </div>
                    <input type="range" id="focus-dur" class="focus-range" min="1" max="120" step="1" value="25"
                        oninput="onDurChange()">
                </div>

                <!-- Short Break -->
                <div class="tool-field" id="break-field">
                    <div class="tool-field-header">
                        <span class="tool-label" style="margin-bottom:0;">Short Break</span>
                        <span class="tool-value" id="short-break-out">5 min</span>
                    </div>
                    <input type="range" id="short-break" class="focus-range" min="1" max="30" step="1" value="5"
                        oninput="document.getElementById('short-break-out').textContent=this.value+' min'">
                </div>

                <!-- Long Break -->
                <div class="tool-field" id="longbreak-field">
                    <div class="tool-field-header">
                        <span class="tool-label" style="margin-bottom:0;">Long Break</span>
                        <span class="tool-value" id="long-break-out">15 min</span>
                    </div>
                    <input type="range" id="long-break" class="focus-range" min="5" max="60" step="5" value="15"
                        oninput="document.getElementById('long-break-out').textContent=this.value+' min'">
                </div>

                <div class="focus-divider"></div>

                <!-- Sessions before long break -->
                <div class="tool-field">
                    <label class="tool-label">Sessions Before Long Break</label>
                    <select id="sessions-before-break" class="tool-select">
                        <option value="2">2 sessions</option>
                        <option value="3">3 sessions</option>
                        <option value="4" selected>4 sessions</option>
                        <option value="6">6 sessions</option>
                    </select>
                </div>

                <!-- Sound -->
                <div class="tool-field">
                    <label class="tool-label">Alert Sound</label>
                    <select id="alert-sound" class="tool-select">
                        <option value="bell">🔔 Bell</option>
                        <option value="chime">🎵 Chime</option>
                        <option value="none">🔇 Silent</option>
                    </select>
                </div>

                <div class="focus-divider"></div>

                <!-- Task Add -->
                <div class="tool-field">
                    <label class="tool-label">Add Task</label>
                    <div class="task-add-wrap">
                        <input type="text" id="task-input" class="tool-input" placeholder="What are you working on?" maxlength="60"
                            onkeydown="if(event.key==='Enter') addTask()">
                        <button class="task-add-btn" onclick="addTask()">+</button>
                    </div>
                </div>

                <div class="tool-field">
                    <label class="tool-label">Priority</label>
                    <select id="task-priority" class="tool-select">
                        <option value="high">🔴 High</option>
                        <option value="med" selected>🟡 Medium</option>
                        <option value="low">🟢 Low</option>
                    </select>
                </div>

                <div class="tool-field">
                    <div class="tool-field-header">
                        <span class="tool-label" style="margin-bottom:0;">Estimated Pomodoros</span>
                        <span class="tool-value" id="est-pomodoros-out">2</span>
                    </div>
                    <input type="range" id="est-pomodoros" class="focus-range" min="1" max="8" step="1" value="2"
                        oninput="document.getElementById('est-pomodoros-out').textContent=this.value">
                </div>

            </div>
        </div>

        <!-- Today's Stats -->
        <div class="tool-panel">
            <div class="tool-panel-header">
                <span class="tool-panel-title">Today's Stats</span>
            </div>
            <div class="tool-panel-body">
                <div class="focus-stat-row"><span class="focus-stat-name">Focus Time</span><span class="focus-stat-val" id="stat-focus-time">0m</span></div>
                <div class="focus-stat-row"><span class="focus-stat-name">Sessions Done</span><span class="focus-stat-val" id="stat-sessions">0</span></div>
                <div class="focus-stat-row"><span class="focus-stat-name">Tasks Completed</span><span class="focus-stat-val" id="stat-tasks">0</span></div>
                <div class="focus-stat-row"><span class="focus-stat-name">Productivity Score</span><span class="focus-stat-val" id="stat-score">—</span></div>
                <div class="focus-stat-row"><span class="focus-stat-name">Current Streak</span><span class="focus-stat-val" id="stat-streak">0 days 🔥</span></div>
                <div class="focus-stat-row"><span class="focus-stat-name">Daily Goal</span><span class="focus-stat-val" id="stat-goal">—</span></div>
            </div>
        </div>
    </div>

    <!-- ═══════════ RIGHT PANEL ═══════════ -->
    <div>

        <!-- Metric Cards -->
        <div class="focus-metrics">
            <div class="focus-metric blue">
                <div class="focus-metric-label">Focus Time Today</div>
                <div class="focus-metric-value blue" id="m-focus-time">0m</div>
                <div class="focus-metric-sub">minutes focused</div>
            </div>
            <div class="focus-metric purple">
                <div class="focus-metric-label">Sessions Done</div>
                <div class="focus-metric-value purple" id="m-sessions">0</div>
                <div class="focus-metric-sub">completed today</div>
            </div>
            <div class="focus-metric cyan">
                <div class="focus-metric-label">Productivity</div>
                <div class="focus-metric-value cyan" id="m-score">—</div>
                <div class="focus-metric-sub">score out of 100</div>
            </div>
            <div class="focus-metric green">
                <div class="focus-metric-label">Tasks Done</div>
                <div class="focus-metric-value green" id="m-tasks-done">0</div>
                <div class="focus-metric-sub">of <span id="m-tasks-total">0</span> total</div>
            </div>
        </div>

        <!-- Timer Panel -->
        <div class="tool-panel" style="margin-bottom:1rem;">
            <div class="tool-panel-header">
                <span class="tool-panel-title">Focus Timer</span>
                <span style="font-size:0.75rem;color:var(--muted);font-family:'DM Mono',monospace;" id="timer-mode-badge">POMODORO</span>
            </div>
            <div class="tool-panel-body" style="padding:0;">
                <div class="focus-timer-wrap">

                    <!-- Circular ring -->
                    <div class="focus-ring-wrap" id="ring-wrap">
                        <svg class="focus-ring-svg" viewBox="0 0 240 240">
                            <defs>
                                <linearGradient id="ringGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#6366f1"/>
                                    <stop offset="100%" style="stop-color:#8b5cf6"/>
                                </linearGradient>
                            </defs>
                            <circle class="focus-ring-bg" cx="120" cy="120" r="108"/>
                            <circle class="focus-ring-prog" id="ring-prog" cx="120" cy="120" r="108"
                                stroke-dasharray="678.6" stroke-dashoffset="0"/>
                        </svg>
                        <div class="focus-ring-inner">
                            <div class="focus-timer-display" id="timer-display">25:00</div>
                            <div class="focus-timer-mode-label" id="timer-mode-label">Focus Session</div>
                            <div class="focus-session-count" id="session-count-label">Session 1 of 4</div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <div class="focus-controls">
                        <button class="focus-ctrl-btn secondary-ctrl" onclick="resetTimer()" title="Reset">
                            <i class="fa fa-rotate-left"></i>
                        </button>
                        <button class="focus-ctrl-btn main" id="play-pause-btn" onclick="toggleTimer()">
                            <i class="fa fa-play" id="play-icon"></i>
                        </button>
                        <button class="focus-ctrl-btn secondary-ctrl" onclick="skipSession()" title="Skip">
                            <i class="fa fa-forward-step"></i>
                        </button>
                    </div>

                    <!-- Active Task -->
                    <div class="focus-active-task" id="active-task-bar">
                        <span class="focus-active-empty">No task selected — pick one from the list below</span>
                    </div>

                </div>
            </div>
        </div>

        <!-- Task List -->
        <div class="tool-panel" style="margin-bottom:1rem;">
            <div class="tool-panel-header">
                <span class="tool-panel-title">Task List</span>
                <div style="display:flex;gap:8px;align-items:center;">
                    <span style="font-size:0.75rem;color:var(--muted);font-family:'DM Mono',monospace;" id="task-count-label">0 tasks</span>
                    <button onclick="clearDoneTasks()" style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.2);color:#f87171;padding:5px 12px;border-radius:8px;font-size:0.72rem;font-weight:700;cursor:pointer;font-family:'Syne',sans-serif;">Clear Done</button>
                </div>
            </div>
            <div class="tool-panel-body">
                <div class="focus-task-scroll">
                    <div class="focus-task-list" id="task-list">
                        <div class="focus-empty">
                            <div class="focus-empty-icon">📋</div>
                            <div class="focus-empty-text">No tasks yet.<br>Add one from the left panel.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Session History + Weekly Chart -->
        <div class="tool-panel">
            <div class="tool-panel-header">
                <span class="tool-panel-title">Session History</span>
                <button onclick="clearHistory()" style="background:transparent;border:none;color:var(--muted);font-size:0.75rem;cursor:pointer;font-family:'Syne',sans-serif;">Clear</button>
            </div>
            <div class="tool-panel-body">

                <!-- Weekly chart -->
                <div style="margin-bottom:24px;">
                    <div style="font-size:0.75rem;color:var(--muted);letter-spacing:1px;text-transform:uppercase;margin-bottom:12px;">This Week</div>
                    <div class="focus-week-chart" id="week-chart">
                        <!-- Rendered by JS -->
                    </div>
                </div>

                <!-- History table -->
                <div id="history-area">
                    <div class="focus-empty">
                        <div class="focus-empty-icon">📊</div>
                        <div class="focus-empty-text">No sessions recorded yet.<br>Complete a focus session to see history.</div>
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
            <span>Productivity Science</span>
            <h2>How to Use the Focus Timer for Deep Work</h2>
            <p>Master the Pomodoro technique, time blocking, and focus sessions to achieve more in less time.</p>
        </div>
        <div class="tool-panel">
            <div class="tool-panel-body tool-blog-content">
                <h3>What Is the Pomodoro Technique?</h3>
                <p>The Pomodoro Technique is a time management method that breaks work into focused intervals — typically 25 minutes — separated by short breaks. After 4 sessions, you take a longer break. This rhythm keeps your brain fresh and maintains deep focus.</p>
                <h3>Why Timed Focus Sessions Work</h3>
                <p>Research shows that the human brain can maintain peak focus for about 25–52 minutes before needing rest. Structured focus sessions leverage this biological rhythm to maximize output while minimizing burnout.</p>
                <h3>Timer Modes Explained</h3>
                <ul>
                    <li><strong style="color:#c7d2fe;">Pomodoro</strong> — Classic 25/5 cycle with auto long-break after 4 sessions.</li>
                    <li><strong style="color:#c7d2fe;">Countdown</strong> — Set any duration and count down to zero.</li>
                    <li><strong style="color:#c7d2fe;">Count Up</strong> — Track elapsed focus time with no pressure.</li>
                    <li><strong style="color:#c7d2fe;">Deep Work</strong> — Extended 90-minute sessions for flow state work.</li>
                    <li><strong style="color:#c7d2fe;">Break</strong> — Relaxing break timer with softer visual cues.</li>
                </ul>
                <h3>Task Management Tips</h3>
                <p>Assign each task an estimated number of Pomodoros before starting. This builds realistic time awareness and prevents underestimating complex work. Track actual vs estimated to improve your planning over time.</p>
                <h3>Frequently Asked Questions</h3>
                <h4>Should I always use 25-minute sessions?</h4>
                <p>Not necessarily. Some people prefer 50/10 or 90-minute deep work blocks. Use the custom mode to find your ideal rhythm.</p>
                <h4>What should I do during breaks?</h4>
                <p>Step away from the screen. Walk, stretch, breathe. Avoid social media during short breaks as it can disrupt cognitive recovery.</p>
                <h4>Does this tool save my data?</h4>
                <p>Yes — all tasks, settings, and session history are saved to your browser's localStorage so your data persists between visits.</p>
            </div>
        </div>
    </div>
</section>

<?php include '../layout/footer.php'; ?>

<script>
// ═══════════════════════════════════════════════════
// STATE
// ═══════════════════════════════════════════════════
const CIRCUMFERENCE = 2 * Math.PI * 108; // 678.6

let state = {
    mode:         'pomodoro',   // pomodoro | countdown | countup | deepwork | break | custom
    running:      false,
    elapsed:      0,            // seconds elapsed in current session
    totalSecs:    25 * 60,      // total seconds for current session
    sessionCount: 0,            // completed pomodoro sessions today
    currentTaskId: null,
    interval:     null,
    isBreak:      false,
};

let tasks    = [];
let history  = [];
let todayFocusSeconds = 0;

const MODES = {
    pomodoro:  { label:'Focus Session',  defaultMin:25, color:'#6366f1' },
    countdown: { label:'Countdown',      defaultMin:25, color:'#3b82f6' },
    countup:   { label:'Count Up',       defaultMin:0,  color:'#06b6d4' },
    deepwork:  { label:'Deep Work',      defaultMin:90, color:'#8b5cf6' },
    break:     { label:'Break Time ☕',  defaultMin:5,  color:'#22c55e' },
    custom:    { label:'Custom Timer',   defaultMin:30, color:'#f59e0b' },
};

// ═══════════════════════════════════════════════════
// INIT
// ═══════════════════════════════════════════════════
function init() {
    loadFromStorage();
    renderWeekChart();
    renderHistory();
    renderTasks();
    updateMetrics();
    resetTimer();
}

// ═══════════════════════════════════════════════════
// MODE
// ═══════════════════════════════════════════════════
function setMode(mode, btn) {
    state.mode = mode;
    stopTimer();

    document.querySelectorAll('.focus-mode-tab').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // Show/hide break fields
    const showBreak = mode === 'pomodoro';
    document.getElementById('break-field').style.display    = showBreak ? 'block' : 'none';
    document.getElementById('longbreak-field').style.display = showBreak ? 'block' : 'none';

    // Set default duration for mode
    const dur = document.getElementById('focus-dur');
    if (mode === 'deepwork')  { dur.value = 90; }
    else if (mode === 'break'){ dur.value = 5;  }
    else if (mode === 'pomodoro'){ dur.value = 25; }

    onDurChange();
    document.getElementById('timer-mode-badge').textContent = mode.toUpperCase();
    resetTimer();
}

function onDurChange() {
    const v = document.getElementById('focus-dur').value;
    document.getElementById('focus-dur-out').textContent = v + ' min';
    if (!state.running) resetTimer();
}

// ═══════════════════════════════════════════════════
// TIMER CORE
// ═══════════════════════════════════════════════════
function toggleTimer() {
    state.running ? pauseTimer() : startTimer();
}

function startTimer() {
    state.running = true;
    document.getElementById('play-icon').className = 'fa fa-pause';
    document.getElementById('ring-wrap').classList.add('running');

    state.interval = setInterval(() => {
        if (state.mode === 'countup') {
            state.elapsed++;
            todayFocusSeconds++;
            updateDisplay();
            updateRing();
        } else {
            const remaining = state.totalSecs - state.elapsed;
            if (remaining <= 0) {
                onSessionComplete();
                return;
            }
            state.elapsed++;
            todayFocusSeconds++;
            updateDisplay();
            updateRing();
        }
        updateMetrics();
        saveToStorage();
    }, 1000);
}

function pauseTimer() {
    state.running = false;
    clearInterval(state.interval);
    document.getElementById('play-icon').className = 'fa fa-play';
    document.getElementById('ring-wrap').classList.remove('running');
}

function stopTimer() {
    pauseTimer();
    state.elapsed = 0;
}

function resetTimer() {
    stopTimer();
    const mins = parseInt(document.getElementById('focus-dur').value) || 25;
    state.totalSecs = state.mode === 'countup' ? 0 : mins * 60;
    state.elapsed   = 0;
    updateDisplay();
    updateRing();
    document.getElementById('play-icon').className = 'fa fa-play';
    document.getElementById('ring-wrap').classList.remove('running');

    const modeData = MODES[state.mode] || MODES.pomodoro;
    document.getElementById('timer-mode-label').textContent = modeData.label;
}

function skipSession() {
    onSessionComplete();
}

function onSessionComplete() {
    stopTimer();
    playSound();

    if (state.mode === 'pomodoro' && !state.isBreak) {
        state.sessionCount++;
        logSession();
        updateMetrics();
        renderHistory();
        saveToStorage();

        const sessionsBeforeLong = parseInt(document.getElementById('sessions-before-break').value);
        if (state.sessionCount % sessionsBeforeLong === 0) {
            startBreak(parseInt(document.getElementById('long-break').value), 'Long Break');
        } else {
            startBreak(parseInt(document.getElementById('short-break').value), 'Short Break');
        }
    } else if (state.isBreak) {
        state.isBreak = false;
        document.getElementById('focus-dur-out').textContent = document.getElementById('focus-dur').value + ' min';
        document.getElementById('timer-mode-label').textContent = 'Focus Session';
        resetTimer();
    } else {
        state.sessionCount++;
        logSession();
        updateMetrics();
        renderHistory();
        saveToStorage();
        resetTimer();
    }

    updateSessionCountLabel();
}

function startBreak(mins, label) {
    state.isBreak   = true;
    state.totalSecs = mins * 60;
    state.elapsed   = 0;
    document.getElementById('timer-mode-label').textContent    = label + ' ☕';
    document.getElementById('focus-dur-out').textContent       = mins + ' min';
    document.getElementById('timer-mode-badge').textContent    = 'BREAK';
    updateDisplay();
    updateRing();
}

// ═══════════════════════════════════════════════════
// DISPLAY
// ═══════════════════════════════════════════════════
function updateDisplay() {
    let secs;
    if (state.mode === 'countup') {
        secs = state.elapsed;
    } else {
        secs = Math.max(0, state.totalSecs - state.elapsed);
    }
    document.getElementById('timer-display').textContent = fmtTime(secs);
}

function updateRing() {
    const prog = document.getElementById('ring-prog');
    let ratio;
    if (state.mode === 'countup') {
        const cap = (parseInt(document.getElementById('focus-dur').value) || 25) * 60;
        ratio = Math.min(state.elapsed / cap, 1);
    } else {
        ratio = state.totalSecs > 0 ? state.elapsed / state.totalSecs : 0;
    }
    const offset = CIRCUMFERENCE * (1 - ratio);
    prog.style.strokeDashoffset = offset;
}

function updateSessionCountLabel() {
    const before = parseInt(document.getElementById('sessions-before-break').value) || 4;
    const current = (state.sessionCount % before) + 1;
    document.getElementById('session-count-label').textContent = `Session ${current} of ${before}`;
}

function fmtTime(secs) {
    const h = Math.floor(secs / 3600);
    const m = Math.floor((secs % 3600) / 60);
    const s = secs % 60;
    if (h > 0) return `${pad(h)}:${pad(m)}:${pad(s)}`;
    return `${pad(m)}:${pad(s)}`;
}

function pad(n) { return String(n).padStart(2, '0'); }

// ═══════════════════════════════════════════════════
// METRICS
// ═══════════════════════════════════════════════════
function updateMetrics() {
    const focusMins = Math.floor(todayFocusSeconds / 60);
    const totalTasks = tasks.length;
    const doneTasks  = tasks.filter(t => t.done).length;
    const score      = calcScore(focusMins, state.sessionCount, doneTasks, totalTasks);

    document.getElementById('m-focus-time').textContent   = focusMins + 'm';
    document.getElementById('m-sessions').textContent     = state.sessionCount;
    document.getElementById('m-score').textContent        = score;
    document.getElementById('m-tasks-done').textContent   = doneTasks;
    document.getElementById('m-tasks-total').textContent  = totalTasks;

    document.getElementById('stat-focus-time').textContent = focusMins + 'm';
    document.getElementById('stat-sessions').textContent   = state.sessionCount;
    document.getElementById('stat-tasks').textContent      = doneTasks;
    document.getElementById('stat-score').textContent      = score;

    const goalSessions = 8;
    const goalPct = Math.min(100, Math.round((state.sessionCount / goalSessions) * 100));
    document.getElementById('stat-goal').textContent = goalPct + '% of daily goal';

    updateSessionCountLabel();
}

function calcScore(mins, sessions, done, total) {
    if (mins === 0 && sessions === 0) return '—';
    let s = 0;
    s += Math.min(50, mins / 2);
    s += Math.min(30, sessions * 5);
    s += total > 0 ? Math.round((done / total) * 20) : 0;
    return Math.round(s);
}

// ═══════════════════════════════════════════════════
// TASKS
// ═══════════════════════════════════════════════════
function addTask() {
    const input    = document.getElementById('task-input');
    const name     = input.value.trim();
    const priority = document.getElementById('task-priority').value;
    const est      = parseInt(document.getElementById('est-pomodoros').value) || 1;
    if (!name) return;

    const task = { id: Date.now(), name, priority, est, done: false, elapsed: 0 };
    tasks.push(task);
    input.value = '';
    renderTasks();
    updateMetrics();
    saveToStorage();
}

function setActiveTask(id) {
    state.currentTaskId = id;
    const task = tasks.find(t => t.id === id);
    const bar  = document.getElementById('active-task-bar');
    if (task) {
        bar.innerHTML = `<div class="focus-active-dot"></div><span class="focus-active-text">${escHtml(task.name)}</span>`;
    }
    renderTasks();
}

function toggleTaskDone(id) {
    const task = tasks.find(t => t.id === id);
    if (task) { task.done = !task.done; }
    renderTasks();
    updateMetrics();
    saveToStorage();
}

function deleteTask(id) {
    tasks = tasks.filter(t => t.id !== id);
    if (state.currentTaskId === id) {
        state.currentTaskId = null;
        document.getElementById('active-task-bar').innerHTML = `<span class="focus-active-empty">No task selected — pick one from the list below</span>`;
    }
    renderTasks();
    updateMetrics();
    saveToStorage();
}

function clearDoneTasks() {
    tasks = tasks.filter(t => !t.done);
    renderTasks();
    updateMetrics();
    saveToStorage();
}

function renderTasks() {
    const list = document.getElementById('task-list');
    document.getElementById('task-count-label').textContent = tasks.length + ' task' + (tasks.length !== 1 ? 's' : '');

    if (!tasks.length) {
        list.innerHTML = `<div class="focus-empty"><div class="focus-empty-icon">📋</div><div class="focus-empty-text">No tasks yet.<br>Add one from the left panel.</div></div>`;
        return;
    }

    const sorted = [...tasks].sort((a,b) => {
        if (a.done !== b.done) return a.done ? 1 : -1;
        const order = {high:0, med:1, low:2};
        return (order[a.priority]||1) - (order[b.priority]||1);
    });

    list.innerHTML = sorted.map(task => `
        <div class="focus-task-item ${task.done ? 'done' : ''} ${task.id === state.currentTaskId ? 'active-task' : ''}">
            <div class="focus-task-check ${task.done ? 'checked' : ''}" onclick="toggleTaskDone(${task.id})"></div>
            <div class="focus-task-info">
                <div class="focus-task-name">${escHtml(task.name)}</div>
                <div class="focus-task-meta">~${task.est} 🍅 estimated</div>
            </div>
            <span class="focus-task-priority ${task.priority}">${task.priority.toUpperCase()}</span>
            <button class="focus-task-play" onclick="setActiveTask(${task.id})" title="Set as active">▶</button>
            <button class="focus-task-del" onclick="deleteTask(${task.id})" title="Delete">✕</button>
        </div>
    `).join('');
}

// ═══════════════════════════════════════════════════
// HISTORY
// ═══════════════════════════════════════════════════
function logSession() {
    const now  = new Date();
    const task = tasks.find(t => t.id === state.currentTaskId);
    history.unshift({
        time:  now.toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'}),
        date:  now.toLocaleDateString(),
        mode:  state.mode,
        dur:   document.getElementById('focus-dur').value,
        task:  task ? task.name : '—',
    });
    if (history.length > 50) history.pop();
}

function clearHistory() {
    history = [];
    renderHistory();
    saveToStorage();
}

function renderHistory() {
    const area = document.getElementById('history-area');
    if (!history.length) {
        area.innerHTML = `<div class="focus-empty"><div class="focus-empty-icon">📊</div><div class="focus-empty-text">No sessions recorded yet.<br>Complete a focus session to see history.</div></div>`;
        return;
    }
    area.innerHTML = `
        <table class="focus-table">
            <thead><tr><th>Time</th><th>Mode</th><th>Duration</th><th>Task</th></tr></thead>
            <tbody>
                ${history.slice(0,10).map(h => `
                    <tr>
                        <td class="val-blue">${h.time}</td>
                        <td class="val-purple">${h.mode}</td>
                        <td class="val-white">${h.dur}m</td>
                        <td class="label" style="max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">${escHtml(h.task)}</td>
                    </tr>
                `).join('')}
            </tbody>
        </table>`;
    renderWeekChart();
}

function renderWeekChart() {
    const days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
    const today = new Date().getDay();
    const todayIdx = today === 0 ? 6 : today - 1;

    const daySessions = new Array(7).fill(0);
    const today_str = new Date().toLocaleDateString();
    history.forEach(h => {
        const d = new Date(h.date);
        const idx = d.getDay() === 0 ? 6 : d.getDay() - 1;
        if (!isNaN(idx)) daySessions[idx]++;
    });
    daySessions[todayIdx] += state.sessionCount;

    const max = Math.max(...daySessions, 1);
    document.getElementById('week-chart').innerHTML = days.map((d, i) => {
        const h = Math.round((daySessions[i] / max) * 64);
        const isToday = i === todayIdx;
        return `<div class="focus-week-col">
            <div class="focus-week-bar-wrap">
                <div class="focus-week-bar ${isToday ? 'today' : ''}" style="height:${h}px;" title="${daySessions[i]} sessions"></div>
            </div>
            <div class="focus-week-label">${d}</div>
        </div>`;
    }).join('');
}

// ═══════════════════════════════════════════════════
// SOUND
// ═══════════════════════════════════════════════════
function playSound() {
    const sound = document.getElementById('alert-sound').value;
    if (sound === 'none') return;
    try {
        const ctx = new (window.AudioContext || window.webkitAudioContext)();
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();
        osc.connect(gain);
        gain.connect(ctx.destination);
        osc.frequency.value = sound === 'bell' ? 880 : 660;
        osc.type = sound === 'bell' ? 'sine' : 'triangle';
        gain.gain.setValueAtTime(0.4, ctx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 1.2);
        osc.start(ctx.currentTime);
        osc.stop(ctx.currentTime + 1.2);
    } catch(e) {}
}

// ═══════════════════════════════════════════════════
// STORAGE
// ═══════════════════════════════════════════════════
function saveToStorage() {
    const today = new Date().toDateString();
    try {
        localStorage.setItem('ft_tasks',    JSON.stringify(tasks));
        localStorage.setItem('ft_history',  JSON.stringify(history));
        localStorage.setItem('ft_sessions', JSON.stringify({ count: state.sessionCount, date: today, focusSecs: todayFocusSeconds }));
        localStorage.setItem('ft_streak',   getStreak());
    } catch(e) {}
}

function loadFromStorage() {
    const today = new Date().toDateString();
    try {
        tasks   = JSON.parse(localStorage.getItem('ft_tasks'))   || [];
        history = JSON.parse(localStorage.getItem('ft_history')) || [];
        const sess = JSON.parse(localStorage.getItem('ft_sessions'));
        if (sess && sess.date === today) {
            state.sessionCount = sess.count || 0;
            todayFocusSeconds  = sess.focusSecs || 0;
        }
        document.getElementById('stat-streak').textContent = getStreak() + ' days 🔥';
    } catch(e) {}
}

function getStreak() {
    try {
        const s = parseInt(localStorage.getItem('ft_streak')) || 0;
        return state.sessionCount > 0 ? Math.max(1, s) : s;
    } catch(e) { return 0; }
}

// ═══════════════════════════════════════════════════
// UTILS
// ═══════════════════════════════════════════════════
function escHtml(str) {
    return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

// Update page title with live timer
function updatePageTitle() {
    if (state.running) {
        const secs = state.mode === 'countup' ? state.elapsed : Math.max(0, state.totalSecs - state.elapsed);
        document.title = fmtTime(secs) + ' — Focus Timer | VoltTools';
    } else {
        document.title = 'Focus Timer & Productivity Dashboard | VoltTools';
    }
}
setInterval(updatePageTitle, 1000);

// ═══════════════════════════════════════════════════
// BOOT
// ═══════════════════════════════════════════════════
init();
function resetAllStats() {
    // reset runtime variables
    state.sessionCount = 0;
    todayFocusSeconds = 0;

    // reset task progress (optional: keep tasks or clear done status)
    tasks.forEach(t => {
        t.done = false;
        t.elapsed = 0;
    });

    // reset history
    history = [];

    // reset UI
    updateMetrics();
    renderTasks();
    renderHistory();
    renderWeekChart();

    // reset storage
    saveToStorage();

    // reset timer display too
    resetTimer();
}
</script>

</body>
</html>