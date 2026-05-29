<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Password Generator | VoltTools</title>
    <meta name="description" content="Generate ultra-secure, AI-inspired passwords with custom hints. Supports multiple styles, strength analysis, crack time estimation, and password history.">
    <meta name="keywords" content="password generator, secure password, AI password, passphrase generator, random password, strong password">
    <meta name="author" content="VoltTools">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Your existing stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
    /* =========================================
       VOLTTOOLS BASE — minimal stub so this
       demo renders standalone. In production
       your ../css/style.css provides all of this.
    ========================================= */
   
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Syne', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }
    .container { max-width: 1280px; margin: 0 auto; padding: 0 24px; }

    /* Panel system (matches your existing .tool-panel) */
    .tool-panel { background: var(--card); border: 1px solid var(--border); border-radius: 24px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.2); }
    .tool-panel-header { padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
    .tool-panel-title { font-size: 0.78rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: #cbd5e1; }
    .tool-panel-body { padding: 24px; }
    .tool-field { margin-bottom: 20px; }
    .tool-field-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px; }
    .tool-label { font-size: 0.9rem; font-weight: 600; color: #e2e8f0; display: block; margin-bottom: 9px; }
    .tool-value { color: #a5b4fc; font-size: 0.85rem; font-weight: 700; font-family: 'DM Mono', monospace; }
    .tool-input { width: 100%; background: rgba(255,255,255,0.04); border: 1px solid var(--border); border-radius: 14px; padding: 13px 16px; color: white; font-family: 'DM Mono', monospace; font-size: 0.92rem; outline: none; transition: 0.25s ease; }
    .tool-input:focus { border-color: rgba(99,102,241,0.5); box-shadow: 0 0 0 4px rgba(99,102,241,0.1); }
    .tool-hero { padding: 80px 0 30px; }
    .tool-hero-content { text-align: center; max-width: 850px; margin-inline: auto; }
    .tool-badge { display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; border-radius: 999px; background: rgba(99,102,241,0.12); border: 1px solid rgba(99,102,241,0.28); color: #c7d2fe; margin-bottom: 24px; font-size: 0.9rem; font-weight: 600; }
    .tool-badge-dot { width: 7px; height: 7px; border-radius: 50%; background: #818cf8; animation: focusPulse 1.6s infinite; }
    .tool-hero h1 { font-size: clamp(2.4rem,5vw,4rem); line-height: 1.1; margin-bottom: 20px; font-weight: 800; }
    .tool-hero h1 .accent { color: #818cf8; }
    .tool-hero p { color: var(--muted); font-size: 1.05rem; max-width: 760px; margin-inline: auto; }
    .tool-layout { display: grid; grid-template-columns: 340px 1fr; gap: 28px; align-items: start; margin-top: 40px; }
    .focus-range { width: 100%; height: 6px; appearance: none; border-radius: 999px; background: linear-gradient(to right, #6366f1, #8b5cf6); outline: none; cursor: pointer; }
    .focus-range::-webkit-slider-thumb { appearance: none; width: 18px; height: 18px; border-radius: 50%; background: white; border: 4px solid #6366f1; cursor: pointer; box-shadow: 0 4px 10px rgba(99,102,241,0.4); transition: 0.2s ease; }
    .focus-range::-webkit-slider-thumb:hover { transform: scale(1.1); }
    .focus-divider { height: 1px; background: var(--border); margin: 18px 0; }
    .focus-btn { width: 100%; padding: 15px; background: linear-gradient(135deg,#6366f1,#8b5cf6); border: none; border-radius: 14px; color: white; font-family: 'Syne', sans-serif; font-size: 0.95rem; font-weight: 700; cursor: pointer; letter-spacing: 0.5px; transition: 0.25s ease; box-shadow: 0 8px 24px rgba(99,102,241,0.3); }
    .focus-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(99,102,241,0.45); }
    .focus-btn:active { transform: translateY(0); }
    .focus-btn.secondary { background: rgba(255,255,255,0.06); box-shadow: none; border: 1px solid var(--border); }
    .focus-btn.secondary:hover { background: rgba(255,255,255,0.1); box-shadow: none; }
    .focus-btn.danger { background: linear-gradient(135deg,#ef4444,#f97316); box-shadow: 0 8px 24px rgba(239,68,68,0.25); }
    .focus-btn-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .focus-empty { text-align: center; padding: 44px 24px; color: var(--muted); }
    .focus-empty-icon { font-size: 2.5rem; margin-bottom: 12px; opacity: 0.3; }
    .focus-empty-text { font-size: 0.88rem; line-height: 1.6; }
    @keyframes focusPulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.3;transform:scale(0.8)} }
    @media (max-width:900px) { .tool-layout { grid-template-columns: 1fr; } }
    /* =========================================
       END STUB — above is provided by style.css
    ========================================= */

    /* =========================================
       PASSWORD GENERATOR — TOOL-SPECIFIC
       All classes prefixed: pw-
    ========================================= */

    /* ── Hint tags ── */
    .pw-tag-wrap { display: flex; flex-wrap: wrap; gap: 6px; min-height: 34px; margin-top: 8px; }
    .pw-tag {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(99,102,241,0.12); border: 1px solid rgba(99,102,241,0.25);
        color: #c7d2fe; border-radius: 999px; padding: 4px 12px;
        font-size: 0.78rem; font-weight: 600; font-family: 'DM Mono', monospace;
        animation: pw-tagIn 0.2s ease;
    }
    @keyframes pw-tagIn { from { opacity:0; transform:scale(0.85); } to { opacity:1; transform:scale(1); } }
    .pw-tag-del {
        background: none; border: none; color: #818cf8; cursor: pointer;
        font-size: 0.85rem; line-height: 1; padding: 0; transition: color 0.15s;
    }
    .pw-tag-del:hover { color: #f87171; }

    /* ── Toggle checkboxes ── */
    .pw-toggle-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
    .pw-toggle {
        display: flex; align-items: center; gap: 10px;
        background: rgba(255,255,255,0.03); border: 1px solid var(--border);
        border-radius: 12px; padding: 11px 14px; cursor: pointer; transition: 0.2s ease;
        user-select: none;
    }
    .pw-toggle:hover { border-color: rgba(99,102,241,0.3); background: rgba(99,102,241,0.05); }
    .pw-toggle input[type="checkbox"] { display: none; }
    .pw-toggle-box {
        width: 18px; height: 18px; border-radius: 5px;
        border: 2px solid var(--border); flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        transition: 0.2s ease; background: transparent;
    }
    .pw-toggle input:checked ~ .pw-toggle-box {
        background: #6366f1; border-color: #6366f1;
    }
    .pw-toggle input:checked ~ .pw-toggle-box::after { content: '✓'; color: white; font-size: 0.65rem; font-weight: 800; }
    .pw-toggle-label { font-size: 0.82rem; font-weight: 600; color: #cbd5e1; }
    .pw-toggle.active { border-color: rgba(99,102,241,0.35); background: rgba(99,102,241,0.07); }

    /* ── Mode pills ── */
    .pw-mode-strip { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 6px; }
    .pw-mode-pill {
        background: rgba(255,255,255,0.04); border: 1px solid transparent;
        color: var(--muted); padding: 7px 14px; border-radius: 999px;
        font-size: 0.75rem; font-weight: 700; cursor: pointer;
        font-family: 'Syne', sans-serif; transition: 0.2s ease; white-space: nowrap;
    }
    .pw-mode-pill:hover { color: white; border-color: rgba(255,255,255,0.1); }
    .pw-mode-pill.active { background: rgba(99,102,241,0.14); border-color: rgba(99,102,241,0.32); color: #c7d2fe; }

    /* ── Password output card ── */
    .pw-output-card {
        background: rgba(99,102,241,0.06); border: 1px solid rgba(99,102,241,0.18);
        border-radius: 18px; padding: 20px 22px; margin-bottom: 12px;
        transition: 0.25s ease; position: relative; overflow: hidden;
        animation: pw-cardIn 0.3s ease;
    }
    @keyframes pw-cardIn { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:translateY(0); } }
    .pw-output-card:hover { border-color: rgba(99,102,241,0.35); background: rgba(99,102,241,0.1); }
    .pw-output-card.pw-copied {
        border-color: rgba(34,197,94,0.5) !important;
        background: rgba(34,197,94,0.07) !important;
    }
    .pw-output-type {
        font-size: 0.65rem; font-weight: 700; letter-spacing: 1.2px;
        text-transform: uppercase; color: #a5b4fc; margin-bottom: 8px;
        font-family: 'Syne', sans-serif;
    }
    .pw-output-text {
        font-family: 'DM Mono', monospace; font-size: 1.05rem; font-weight: 500;
        color: white; word-break: break-all; line-height: 1.6;
        letter-spacing: 0.02em;
    }
    .pw-output-text .pw-char-upper { color: #60a5fa; }
    .pw-output-text .pw-char-lower { color: #e2e8f0; }
    .pw-output-text .pw-char-num   { color: #a78bfa; }
    .pw-output-text .pw-char-sym   { color: #f59e0b; }

    .pw-output-actions {
        display: flex; align-items: center; justify-content: space-between;
        margin-top: 12px; flex-wrap: wrap; gap: 8px;
    }
    .pw-strength-bar-wrap { flex: 1; min-width: 120px; }
    .pw-strength-bar-track { height: 4px; background: rgba(255,255,255,0.07); border-radius: 999px; overflow: hidden; }
    .pw-strength-bar-fill { height: 100%; border-radius: 999px; transition: width 0.4s ease, background 0.4s ease; }
    .pw-strength-label { font-size: 0.7rem; color: var(--muted); margin-top: 4px; font-family: 'DM Mono', monospace; }

    .pw-copy-btn {
        background: rgba(255,255,255,0.06); border: 1px solid var(--border);
        color: #a5b4fc; border-radius: 10px; padding: 7px 14px;
        font-size: 0.78rem; font-weight: 700; cursor: pointer;
        font-family: 'Syne', sans-serif; transition: 0.2s ease;
        display: flex; align-items: center; gap: 6px; white-space: nowrap;
    }
    .pw-copy-btn:hover { background: rgba(99,102,241,0.15); border-color: rgba(99,102,241,0.3); color: white; }
    .pw-copy-btn.pw-copied-state { background: rgba(34,197,94,0.12); border-color: rgba(34,197,94,0.3); color: #4ade80; }

    /* ── Stats row under each card ── */
    .pw-stats-row {
        display: flex; gap: 18px; margin-top: 8px; flex-wrap: wrap;
    }
    .pw-stat-item { font-size: 0.72rem; color: var(--muted); font-family: 'DM Mono', monospace; }
    .pw-stat-item span { color: #c7d2fe; font-weight: 600; }

    /* ── Entropy meter ── */
    .pw-entropy-wrap {
        background: rgba(255,255,255,0.03); border: 1px solid var(--border);
        border-radius: 14px; padding: 16px 18px; margin-bottom: 16px;
    }
    .pw-entropy-label { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); margin-bottom: 10px; }
    .pw-entropy-bar-track { height: 8px; background: rgba(255,255,255,0.06); border-radius: 999px; overflow: hidden; position: relative; }
    .pw-entropy-bar-fill { height: 100%; border-radius: 999px; transition: width 0.5s ease, background 0.5s ease; }
    .pw-entropy-row { display: flex; justify-content: space-between; align-items: center; margin-top: 8px; }
    .pw-entropy-score { font-family: 'DM Mono', monospace; font-size: 1.1rem; font-weight: 500; color: white; }
    .pw-entropy-desc { font-size: 0.72rem; color: var(--muted); font-family: 'DM Mono', monospace; }
    .pw-crack-time { font-size: 0.8rem; font-weight: 700; font-family: 'DM Mono', monospace; }

    /* ── History ── */
    .pw-history-list { display: flex; flex-direction: column; gap: 6px; max-height: 280px; overflow-y: auto; padding-right: 2px; }
    .pw-history-list::-webkit-scrollbar { width: 3px; }
    .pw-history-list::-webkit-scrollbar-track { background: transparent; }
    .pw-history-list::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.08); border-radius: 999px; }
    .pw-history-item {
        display: flex; align-items: center; gap: 10px;
        background: rgba(255,255,255,0.02); border: 1px solid var(--border);
        border-radius: 12px; padding: 10px 14px; transition: 0.2s ease;
    }
    .pw-history-item:hover { background: rgba(255,255,255,0.05); border-color: rgba(99,102,241,0.2); }
    .pw-history-pw { flex: 1; font-family: 'DM Mono', monospace; font-size: 0.8rem; color: #c7d2fe; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .pw-history-meta { font-size: 0.68rem; color: var(--muted); font-family: 'DM Mono', monospace; flex-shrink: 0; }
    .pw-history-copy { background: none; border: none; color: var(--muted); cursor: pointer; font-size: 0.82rem; padding: 4px; transition: color 0.15s; flex-shrink: 0; }
    .pw-history-copy:hover { color: #a5b4fc; }

    /* ── Export btn ── */
    .pw-export-row { display: flex; gap: 8px; margin-top: 14px; }
    .pw-export-btn {
        flex: 1; background: rgba(255,255,255,0.04); border: 1px solid var(--border);
        color: #94a3b8; border-radius: 10px; padding: 10px 14px;
        font-size: 0.78rem; font-weight: 700; cursor: pointer;
        font-family: 'Syne', sans-serif; transition: 0.2s ease; text-align: center;
    }
    .pw-export-btn:hover { background: rgba(255,255,255,0.08); color: white; }

    /* ── Shortcut hint ── */
    .pw-shortcut-hint {
        font-size: 0.7rem; color: var(--muted); text-align: center;
        margin-top: 12px; font-family: 'DM Mono', monospace;
    }
    .pw-shortcut-hint kbd {
        background: rgba(255,255,255,0.07); border: 1px solid var(--border);
        border-radius: 5px; padding: 2px 6px; font-family: 'DM Mono', monospace;
        font-size: 0.7rem; color: #c7d2fe;
    }

    /* ── Responsive ── */
    @media (max-width: 640px) {
        .pw-toggle-grid { grid-template-columns: 1fr; }
        .pw-mode-strip { gap: 4px; }
        .pw-output-text { font-size: 0.88rem; }
    }
    </style>
</head>
<body>

 <?php include_once '../files/connection.php'; include '../layout/header.php'; ?>

<!-- ── HERO ── -->
<section class="tool-hero">
    <div class="container">
        <div class="tool-hero-content">
            <div class="tool-badge">
                <div class="tool-badge-dot"></div>
                🔐 AI-Powered Security
            </div>
            <h1>AI <span class="accent">Password</span> Generator</h1>
            <p>Drop a hint — a word, a name, a year. Our engine turns it into multiple unique, ultra-secure passwords you'll never need to remember twice.</p>
        </div>
    </div>
</section>

<!-- ── MAIN LAYOUT ── -->
<section>
<div class="container">
<div class="tool-layout">

    <!-- ════════════ LEFT PANEL ════════════ -->
    <div>

        <!-- Settings Panel -->
        <div class="tool-panel" style="margin-bottom:1rem;">
            <div class="tool-panel-header">
                <span class="tool-panel-title">Generator Settings</span>
            </div>
            <div class="tool-panel-body">

                <!-- Hint input -->
                <div class="tool-field">
                    <label class="tool-label" for="pw-hint-input">Hint / Inspiration</label>
                    <div style="display:flex;gap:8px;">
                        <input
                            type="text"
                            id="pw-hint-input"
                            class="tool-input"
                            placeholder="e.g. shadow dragon 2005"
                            maxlength="80"
                            autocomplete="off"
                            aria-label="Password hint"
                        >
                        <button
                            id="pw-hint-add-btn"
                            class="task-add-btn"
                            onclick="addHintTag()"
                            aria-label="Add hint tag"
                            style="flex-shrink:0;width:46px;height:46px;background:linear-gradient(135deg,#6366f1,#8b5cf6);border:none;border-radius:12px;color:white;font-size:1.2rem;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:.25s ease;"
                        >+</button>
                    </div>
                    <div class="pw-tag-wrap" id="pw-tag-wrap" aria-live="polite"></div>
                </div>

                <!-- Length slider -->
                <div class="tool-field">
                    <div class="tool-field-header">
                        <span class="tool-label" style="margin-bottom:0;">Password Length</span>
                        <span class="tool-value" id="pw-len-out">16</span>
                    </div>
                    <input
                        type="range" id="pw-length" class="focus-range"
                        min="6" max="32" step="1" value="16"
                        oninput="onLengthChange()"
                        aria-label="Password length"
                    >
                </div>

                <div class="focus-divider"></div>

                <!-- Character set toggles -->
                <div class="tool-field">
                    <label class="tool-label">Character Sets</label>
                    <div class="pw-toggle-grid" id="pw-charset-grid">
                        <!-- rendered by JS -->
                    </div>
                </div>

                <div class="focus-divider"></div>

                <!-- Mode options -->
                <div class="tool-field">
                    <label class="tool-label">Special Modes</label>
                    <div class="pw-toggle-grid" id="pw-mode-grid">
                        <!-- rendered by JS -->
                    </div>
                </div>

                <div class="focus-divider"></div>

                <!-- Generate btn -->
                <button class="focus-btn" onclick="generateAll()" id="pw-generate-btn" aria-label="Generate passwords">
                    <i class="fa fa-wand-magic-sparkles" style="margin-right:8px;"></i> Generate Passwords
                </button>
                <p class="pw-shortcut-hint" style="margin-top:10px;">
                    Press <kbd>Ctrl</kbd>+<kbd>G</kbd> to regenerate &nbsp;·&nbsp; <kbd>Ctrl</kbd>+<kbd>C</kbd> to copy top result
                </p>

            </div>
        </div>

        <!-- Today's Stats -->
        <div class="tool-panel">
            <div class="tool-panel-header">
                <span class="tool-panel-title">Session Stats</span>
            </div>
            <div class="tool-panel-body">
                <div class="focus-stat-row" style="display:flex;align-items:center;justify-content:space-between;padding:10px 0;border-bottom:1px solid rgba(255,255,255,0.05);">
                    <span class="focus-stat-name" style="color:var(--muted);font-size:.87rem;">Generated</span>
                    <span class="focus-stat-val" id="stat-generated" style="color:white;font-weight:700;font-family:'DM Mono',monospace;font-size:.87rem;">0</span>
                </div>
                <div class="focus-stat-row" style="display:flex;align-items:center;justify-content:space-between;padding:10px 0;border-bottom:1px solid rgba(255,255,255,0.05);">
                    <span class="focus-stat-name" style="color:var(--muted);font-size:.87rem;">Copied</span>
                    <span class="focus-stat-val" id="stat-copied" style="color:white;font-weight:700;font-family:'DM Mono',monospace;font-size:.87rem;">0</span>
                </div>
                <div class="focus-stat-row" style="display:flex;align-items:center;justify-content:space-between;padding:10px 0;border-bottom:1px solid rgba(255,255,255,0.05);">
                    <span class="focus-stat-name" style="color:var(--muted);font-size:.87rem;">Avg Entropy</span>
                    <span class="focus-stat-val" id="stat-entropy" style="color:white;font-weight:700;font-family:'DM Mono',monospace;font-size:.87rem;">—</span>
                </div>
                <div class="focus-stat-row" style="display:flex;align-items:center;justify-content:space-between;padding:10px 0;">
                    <span class="focus-stat-name" style="color:var(--muted);font-size:.87rem;">Saved in History</span>
                    <span class="focus-stat-val" id="stat-history-count" style="color:white;font-weight:700;font-family:'DM Mono',monospace;font-size:.87rem;">0</span>
                </div>
            </div>
        </div>

    </div>

    <!-- ════════════ RIGHT PANEL ════════════ -->
    <div>

        <!-- Output type tabs -->
        <div class="tool-panel" style="margin-bottom:1rem;">
            <div class="tool-panel-header">
                <span class="tool-panel-title">Password Types</span>
                <button
                    onclick="generateAll()"
                    style="background:rgba(99,102,241,0.12);border:1px solid rgba(99,102,241,0.25);color:#a5b4fc;padding:6px 14px;border-radius:8px;font-size:0.72rem;font-weight:700;cursor:pointer;font-family:'Syne',sans-serif;transition:.2s;display:flex;align-items:center;gap:6px;"
                    onmouseover="this.style.background='rgba(99,102,241,0.22)'"
                    onmouseout="this.style.background='rgba(99,102,241,0.12)'"
                    aria-label="Regenerate all passwords"
                >
                    <i class="fa fa-arrows-rotate"></i> Regenerate
                </button>
            </div>
            <div class="tool-panel-body">
                <div class="pw-mode-strip" id="pw-type-strip" role="tablist">
                    <!-- Type filter pills rendered by JS -->
                </div>
                <!-- Entropy summary -->
                <div class="pw-entropy-wrap" id="pw-entropy-block" style="display:none;">
                    <div class="pw-entropy-label">Entropy Analysis</div>
                    <div class="pw-entropy-bar-track">
                        <div class="pw-entropy-bar-fill" id="pw-entropy-bar" style="width:0%"></div>
                    </div>
                    <div class="pw-entropy-row">
                        <div>
                            <div class="pw-entropy-score" id="pw-entropy-score">0 bits</div>
                            <div class="pw-entropy-desc" id="pw-entropy-desc">—</div>
                        </div>
                        <div style="text-align:right;">
                            <div class="pw-crack-time" id="pw-crack-time" style="color:#a5b4fc;">—</div>
                            <div class="pw-entropy-desc">est. crack time</div>
                        </div>
                    </div>
                </div>
                <!-- Outputs -->
                <div id="pw-outputs-area">
                    <div class="focus-empty" id="pw-empty-state">
                        <div class="focus-empty-icon">🔐</div>
                        <div class="focus-empty-text">Enter a hint above and hit <strong style="color:#c7d2fe;">Generate Passwords</strong><br>or press <kbd style="background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.1);border-radius:4px;padding:2px 6px;font-size:0.78rem;">Ctrl+G</kbd></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Password History -->
        <div class="tool-panel">
            <div class="tool-panel-header">
                <span class="tool-panel-title">Password History</span>
                <div style="display:flex;gap:8px;align-items:center;">
                    <span style="font-size:0.75rem;color:var(--muted);font-family:'DM Mono',monospace;" id="pw-hist-count-label">0 saved</span>
                    <button
                        onclick="clearHistory()"
                        style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.2);color:#f87171;padding:5px 12px;border-radius:8px;font-size:0.72rem;font-weight:700;cursor:pointer;font-family:'Syne',sans-serif;"
                    >Clear</button>
                </div>
            </div>
            <div class="tool-panel-body">
                <div class="pw-history-list" id="pw-history-list" aria-label="Password history">
                    <div class="focus-empty" id="pw-hist-empty">
                        <div class="focus-empty-icon" style="font-size:1.8rem;">📋</div>
                        <div class="focus-empty-text">Passwords you copy will appear here.</div>
                    </div>
                </div>
                <div class="pw-export-row">
                    <button class="pw-export-btn" onclick="exportHistory('txt')" aria-label="Export as plain text">
                        <i class="fa fa-file-lines" style="margin-right:6px;"></i>Export .txt
                    </button>
                    <button class="pw-export-btn" onclick="exportHistory('json')" aria-label="Export as JSON">
                        <i class="fa fa-code" style="margin-right:6px;"></i>Export .json
                    </button>
                    <button class="pw-export-btn" onclick="exportHistory('csv')" aria-label="Export as CSV">
                        <i class="fa fa-table" style="margin-right:6px;"></i>Export .csv
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</section>

 <?php include '../layout/footer.php'; ?>

<!-- ═══════════════════════════════════════════════════════════════
     AI PASSWORD GENERATOR — CLIENT-SIDE LOGIC
     ═══════════════════════════════════════════════════════════════ -->
<script>
'use strict';

// ══════════════════════════════════════════════════
//  CHARACTER POOLS
// ══════════════════════════════════════════════════
const CHARS = {
    upper      : 'ABCDEFGHJKLMNPQRSTUVWXYZ',       // no I, O
    upperFull  : 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    lower      : 'abcdefghjkmnpqrstuvwxyz',         // no i, l, o
    lowerFull  : 'abcdefghijklmnopqrstuvwxyz',
    num        : '23456789',                         // no 0,1
    numFull    : '0123456789',
    sym        : '!@#$%^&*-_+=?',
    symFull    : '!@#$%^&*()-_=+[]{};:,.<>/?',
};

// Common words for passphrase mode
const WORDS = [
    'cloud','flame','river','stone','tiger','laser','storm','lunar','echo','delta',
    'forge','swift','prism','vault','nexus','crisp','blaze','frost','drift','spark',
    'amber','cobalt','zenith','quartz','phantom','cipher','carbon','vector','nova',
    'vortex','pulse','ridge','orbit','axiom','solar','grove','haven','steel','myth',
];

// leet-speak substitution map (used in smart generation)
const LEET = { a:'@', A:'4', s:'$', S:'5', o:'0', O:'0', i:'!', I:'1', e:'3', E:'3', t:'+', g:'9', b:'8' };

// Adjective + noun for gamer-style
const ADJECTIVES = ['Shadow','Neon','Iron','Cyber','Dark','Hyper','Ultra','Mega','Astro','Pixel','Void','Storm','Ghost','Turbo','Omega'];
const NOUNS      = ['Wolf','Dragon','Phoenix','Cobra','Raptor','Titan','Viper','Eagle','Lynx','Falcon','Panther','Hydra','Kraken','Golem','Specter'];

// ══════════════════════════════════════════════════
//  STATE
// ══════════════════════════════════════════════════
let hints          = [];                              // hint tag strings
let history        = [];                              // { pw, type, strength, entropy, ts }
let lastPasswords  = [];                              // last batch generated [{ type, pw }]
let activeTypeFilter = 'all';                         // current type pill filter
let sessionStats   = { generated: 0, copied: 0, totalEntropy: 0, entropyCount: 0 };

// ── Checkbox config (id → default, label) ──────────
const CHARSET_OPTS = [
    { id:'opt-upper',    label:'Uppercase A–Z',     def: true  },
    { id:'opt-lower',    label:'Lowercase a–z',     def: true  },
    { id:'opt-nums',     label:'Numbers 0–9',       def: true  },
    { id:'opt-syms',     label:'Symbols !@#…',      def: true  },
    { id:'opt-noambig',  label:'No Ambiguous',      def: false },
];
const MODE_OPTS = [
    { id:'opt-memorable', label:'Memorable Mode',   def: false },
    { id:'opt-ultra',     label:'Ultra Secure',     def: false },
];

// Password output type definitions
const PW_TYPES = [
    { id:'secure',       label:'Secure Random',   emoji:'🔒' },
    { id:'readable',     label:'Human-Readable',  emoji:'👁️' },
    { id:'gamer',        label:'Gamer Style',      emoji:'🎮' },
    { id:'professional', label:'Professional',     emoji:'💼' },
    { id:'passphrase',   label:'Passphrase',       emoji:'📜' },
];

// ══════════════════════════════════════════════════
//  INIT
// ══════════════════════════════════════════════════
function init() {
    renderCharsetToggles();
    renderTypeFilterPills();
    loadFromStorage();
    renderHistory();
    updateStats();

    // Auto-generate on setting change
    const watchIds = ['pw-length', 'opt-upper','opt-lower','opt-nums','opt-syms','opt-noambig','opt-memorable','opt-ultra'];
    watchIds.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('change', () => { if (hints.length || document.getElementById('pw-hint-input').value.trim()) generateAll(); });
    });
}

// ══════════════════════════════════════════════════
//  RENDER UI COMPONENTS
// ══════════════════════════════════════════════════
function renderCharsetToggles() {
    const charGrid = document.getElementById('pw-charset-grid');
    const modeGrid = document.getElementById('pw-mode-grid');

    charGrid.innerHTML = CHARSET_OPTS.map(o => toggleHTML(o)).join('');
    modeGrid.innerHTML = MODE_OPTS.map(o => toggleHTML(o)).join('');

    // Sync .active class on label click
    document.querySelectorAll('.pw-toggle').forEach(label => {
        label.addEventListener('click', () => {
            setTimeout(() => {
                const cb = label.querySelector('input');
                label.classList.toggle('active', cb.checked);
            }, 0);
        });
    });
}

function toggleHTML({ id, label, def }) {
    return `
    <label class="pw-toggle${def ? ' active' : ''}" for="${id}">
        <input type="checkbox" id="${id}" ${def ? 'checked' : ''}>
        <div class="pw-toggle-box"></div>
        <span class="pw-toggle-label">${label}</span>
    </label>`;
}

function renderTypeFilterPills() {
    const strip = document.getElementById('pw-type-strip');
    const all = [{ id:'all', label:'All', emoji:'✨' }, ...PW_TYPES];
    strip.innerHTML = all.map(t =>
        `<button class="pw-mode-pill${t.id === 'all' ? ' active' : ''}"
            onclick="setTypeFilter('${t.id}', this)"
            role="tab" aria-selected="${t.id === 'all'}"
        >${t.emoji} ${t.label}</button>`
    ).join('');
}

// ══════════════════════════════════════════════════
//  HINT TAGS
// ══════════════════════════════════════════════════
function addHintTag() {
    const input = document.getElementById('pw-hint-input');
    const raw   = input.value.trim();
    if (!raw) return;

    // Split on spaces/commas to allow multiple at once
    raw.split(/[\s,]+/).filter(Boolean).forEach(word => {
        if (!hints.includes(word.toLowerCase())) hints.push(word.toLowerCase());
    });
    input.value = '';
    renderTags();
    generateAll();
}

function removeHintTag(word) {
    hints = hints.filter(h => h !== word);
    renderTags();
    if (lastPasswords.length) generateAll();
}

function renderTags() {
    const wrap = document.getElementById('pw-tag-wrap');
    wrap.innerHTML = hints.map(h =>
        `<div class="pw-tag">
            ${escHtml(h)}
            <button class="pw-tag-del" onclick="removeHintTag('${escHtml(h)}')" aria-label="Remove hint ${h}">✕</button>
        </div>`
    ).join('');
}

// Handle Enter in hint input
document.getElementById('pw-hint-input').addEventListener('keydown', e => {
    if (e.key === 'Enter') addHintTag();
});

// ══════════════════════════════════════════════════
//  SETTINGS READERS
// ══════════════════════════════════════════════════
function getSetting(id) {
    const el = document.getElementById(id);
    return el ? el.checked : false;
}

function getLength() {
    return parseInt(document.getElementById('pw-length').value) || 16;
}

/** Build the character pool based on user settings */
function buildPool() {
    const noAmbig   = getSetting('opt-noambig');
    const useUpper  = getSetting('opt-upper');
    const useLower  = getSetting('opt-lower');
    const useNums   = getSetting('opt-nums');
    const useSyms   = getSetting('opt-syms');

    let pool = '';
    if (useUpper) pool += noAmbig ? CHARS.upper    : CHARS.upperFull;
    if (useLower) pool += noAmbig ? CHARS.lower    : CHARS.lowerFull;
    if (useNums)  pool += noAmbig ? CHARS.num      : CHARS.numFull;
    if (useSyms)  pool += noAmbig ? CHARS.sym      : CHARS.symFull;

    // Fallback: never return empty pool
    if (!pool) pool = CHARS.lowerFull + CHARS.numFull;
    return pool;
}

// ══════════════════════════════════════════════════
//  SECURE RANDOM HELPERS
// ══════════════════════════════════════════════════

/** Cryptographically secure random int in [0, max) */
function secureRandInt(max) {
    const arr = new Uint32Array(1);
    crypto.getRandomValues(arr);
    // Rejection sampling to avoid modulo bias
    const limit = Math.floor(0xFFFFFFFF / max) * max;
    if (arr[0] >= limit) return secureRandInt(max); // recurse (very rare)
    return arr[0] % max;
}

/** Pick a random character from a string */
function randChar(str) { return str[secureRandInt(str.length)]; }

/** Shuffle array in-place using Fisher-Yates (crypto random) */
function shuffle(arr) {
    for (let i = arr.length - 1; i > 0; i--) {
        const j = secureRandInt(i + 1);
        [arr[i], arr[j]] = [arr[j], arr[i]];
    }
    return arr;
}

/** Generate a completely random password of given length from pool */
function randomFromPool(pool, len) {
    return Array.from({ length: len }, () => randChar(pool)).join('');
}

/** Ensure at least one char from each active set */
function enforceCharsets(chars) {
    const arr = chars.split('');
    const insertions = [];
    if (getSetting('opt-upper')) insertions.push(randChar(getSetting('opt-noambig') ? CHARS.upper : CHARS.upperFull));
    if (getSetting('opt-lower')) insertions.push(randChar(getSetting('opt-noambig') ? CHARS.lower : CHARS.lowerFull));
    if (getSetting('opt-nums'))  insertions.push(randChar(getSetting('opt-noambig') ? CHARS.num   : CHARS.numFull));
    if (getSetting('opt-syms'))  insertions.push(randChar(getSetting('opt-noambig') ? CHARS.sym   : CHARS.symFull));
    // Replace random positions to maintain length
    insertions.forEach(ch => { arr[secureRandInt(arr.length)] = ch; });
    return shuffle(arr).join('');
}

// ══════════════════════════════════════════════════
//  HINT PROCESSING
//  Hints are used as *inspiration only* — we never
//  produce weak derivatives directly from them.
// ══════════════════════════════════════════════════

/** Extract meaningful syllables/fragments from hint words */
function extractFragments(hintWords) {
    if (!hintWords.length) return [];
    return hintWords.flatMap(w => {
        const frags = [];
        if (w.length >= 3) frags.push(w.slice(0, 3));   // first 3 chars
        if (w.length >= 4) frags.push(w.slice(-3));      // last 3 chars
        frags.push(w.slice(0, 2).toUpperCase());           // first 2 uppercase
        return frags;
    });
}

/** Apply leet substitutions to a string */
function applyLeet(str) {
    return str.split('').map(c => LEET[c] ?? c).join('');
}

/** Pick a random hint fragment or empty string */
function hintFragment() {
    if (!hints.length) return '';
    const frags = extractFragments(hints);
    if (!frags.length) return '';
    return frags[secureRandInt(frags.length)];
}

// ══════════════════════════════════════════════════
//  PASSWORD GENERATORS — one per type
// ══════════════════════════════════════════════════

/**
 * SECURE RANDOM — pure entropy, leet-inspired fragment optionally inserted
 */
function generateSecure(len) {
    const pool  = buildPool();
    const ultra = getSetting('opt-ultra');
    const base  = randomFromPool(pool, ultra ? Math.max(len, 20) : len);
    const pw    = enforceCharsets(base);

    if (!hints.length) return pw;

    // Weave a leet-transformed fragment into a random position
    const frag = applyLeet(hintFragment());
    if (!frag) return pw;
    const pos  = secureRandInt(Math.max(1, pw.length - frag.length));
    const result = pw.slice(0, pos) + frag + pw.slice(pos + frag.length);
    return enforceCharsets(result.slice(0, len));
}

/**
 * HUMAN-READABLE — mixed case, limited symbols, hint-inspired syllable prefix
 */
function generateReadable(len) {
    const pool     = (getSetting('opt-upper') ? CHARS.upper : '') +
                     (getSetting('opt-lower') ? CHARS.lower : CHARS.lower) +
                     (getSetting('opt-nums')  ? CHARS.num   : '') +
                     '!@#$';

    const frag     = applyLeet(hintFragment());
    const fragPart = frag.length ? capitalize(frag) : '';
    const num      = String(secureRandInt(900) + 100); // 3-digit number
    const suffix   = getSetting('opt-syms') ? randChar('!@#$') : '';

    const base     = fragPart + randomFromPool(pool || CHARS.lower + CHARS.num, Math.max(4, len - fragPart.length - num.length - suffix.length)) + num + suffix;
    return enforceCharsets(base.slice(0, len));
}

/**
 * GAMER STYLE — Adj+Noun combos, numbers, symbols
 */
function generateGamer(len) {
    const adj  = ADJECTIVES[secureRandInt(ADJECTIVES.length)];
    const noun = NOUNS[secureRandInt(NOUNS.length)];
    const num  = String(secureRandInt(9000) + 1000); // 4-digit
    const sym  = getSetting('opt-syms') ? randChar('!@#$') : '';

    // Optionally weave a hint fragment
    const frag = hints.length ? applyLeet(hintFragment()).slice(0, 4) : '';
    const base = applyLeet(adj) + noun + sym + num + frag;
    const padded = base.length < len
        ? base + randomFromPool(buildPool(), len - base.length)
        : base;
    return enforceCharsets(padded.slice(0, len));
}

/**
 * PROFESSIONAL — capitalised, clean, board-meeting safe
 */
function generateProfessional(len) {
    const pool = CHARS.upperFull + CHARS.lowerFull + CHARS.numFull + (getSetting('opt-syms') ? '-_+=' : '');
    const frag = hints.length ? capitalize(hintFragment().replace(/[^a-zA-Z]/g, '')) : '';
    const num  = String(secureRandInt(900) + 100);
    const base = frag + randomFromPool(pool, Math.max(4, len - frag.length - num.length)) + num;
    return enforceCharsets(base.slice(0, len));
}

/**
 * PASSPHRASE — word1-word2-word3-NNN, readable but long
 */
function generatePassphrase() {
    const wordCount = 3 + secureRandInt(2); // 3 or 4 words
    const sep    = getSetting('opt-syms') ? randChar('-_+') : '-';
    const num    = String(secureRandInt(9000) + 1000);

    // Mix in hint words if available, else use word list
    const available = hints.length ? [...hints, ...WORDS] : WORDS;
    const chosen = Array.from({ length: wordCount }, () => available[secureRandInt(available.length)]);

    // Randomly capitalise some
    const styled = chosen.map(w => secureRandInt(2) ? capitalize(w) : w);
    return styled.join(sep) + sep + num;
}

/**
 * MEMORABLE MODE — uses hint words more directly but adds heavy randomisation
 */
function generateMemorable(len) {
    if (!hints.length) return generateReadable(len);
    const shuffled = shuffle([...hints]);
    const base = shuffled.slice(0, 2).map(w => capitalize(applyLeet(w))).join('');
    const pad  = randomFromPool(buildPool(), Math.max(4, len - base.length));
    return enforceCharsets((base + pad).slice(0, len));
}

// ══════════════════════════════════════════════════
//  MAIN GENERATE FUNCTION
// ══════════════════════════════════════════════════
function generateAll() {
    const len      = getLength();
    const memMode  = getSetting('opt-memorable');

    // Collect all 5 password types
    const results = [
        { type: 'secure',       pw: memMode ? generateMemorable(len) : generateSecure(len) },
        { type: 'readable',     pw: generateReadable(len) },
        { type: 'gamer',        pw: generateGamer(len) },
        { type: 'professional', pw: generateProfessional(len) },
        { type: 'passphrase',   pw: generatePassphrase() },
    ];

    lastPasswords = results;
    sessionStats.generated += results.length;
    renderOutputs(results);
    updateStats();
    saveToStorage();
}

// ══════════════════════════════════════════════════
//  STRENGTH & ENTROPY ANALYSIS
// ══════════════════════════════════════════════════

/** Calculate Shannon entropy bits for a password */
function calcEntropy(pw) {
    let poolSize = 0;
    if (/[A-Z]/.test(pw)) poolSize += 26;
    if (/[a-z]/.test(pw)) poolSize += 26;
    if (/[0-9]/.test(pw)) poolSize += 10;
    if (/[^A-Za-z0-9]/.test(pw)) poolSize += 32;
    if (poolSize === 0) poolSize = 26;
    return Math.round(pw.length * Math.log2(poolSize));
}

/** Return { score 0–100, label, color, crackTime } */
function analyseStrength(pw) {
    const entropy = calcEntropy(pw);
    let score = 0;

    // Entropy contribution (0–50)
    score += Math.min(50, entropy * 0.4);

    // Length contribution (0–20)
    score += Math.min(20, pw.length * 1.2);

    // Charset variety (0–20)
    if (/[A-Z]/.test(pw)) score += 5;
    if (/[a-z]/.test(pw)) score += 5;
    if (/[0-9]/.test(pw)) score += 5;
    if (/[^A-Za-z0-9]/.test(pw)) score += 5;

    // Penalise repeating chars / patterns (0 to -10)
    const repeats = pw.match(/(.)\1{2,}/g);
    if (repeats) score -= repeats.length * 3;

    score = Math.max(0, Math.min(100, Math.round(score)));

    let label, color;
    if (score < 30)      { label = 'Very Weak'; color = '#ef4444'; }
    else if (score < 50) { label = 'Weak';       color = '#f97316'; }
    else if (score < 70) { label = 'Moderate';   color = '#f59e0b'; }
    else if (score < 85) { label = 'Strong';     color = '#22c55e'; }
    else                 { label = 'Very Strong'; color = '#6366f1'; }

    // Estimate crack time (brute-force at 100 billion guesses/sec)
    const combinations = Math.pow(getPoolSizeEstimate(pw), pw.length);
    const guessesPerSec = 1e11; // 100 billion/s (modern GPU cluster)
    const seconds = combinations / guessesPerSec;
    const crackTime = formatCrackTime(seconds);

    return { score, label, color, entropy, crackTime };
}

function getPoolSizeEstimate(pw) {
    let size = 0;
    if (/[A-Z]/.test(pw)) size += 26;
    if (/[a-z]/.test(pw)) size += 26;
    if (/[0-9]/.test(pw)) size += 10;
    if (/[^A-Za-z0-9]/.test(pw)) size += 32;
    return size || 26;
}

function formatCrackTime(secs) {
    if (secs < 1)                return 'Instant';
    if (secs < 60)               return `${Math.round(secs)} seconds`;
    if (secs < 3600)             return `${Math.round(secs / 60)} minutes`;
    if (secs < 86400)            return `${Math.round(secs / 3600)} hours`;
    if (secs < 2.628e6)          return `${Math.round(secs / 86400)} days`;
    if (secs < 3.156e7)          return `${Math.round(secs / 2.628e6)} months`;
    if (secs < 3.156e9)          return `${Math.round(secs / 3.156e7)} years`;
    if (secs < 3.156e12)         return `${Math.round(secs / 3.156e9)} thousand yrs`;
    if (secs < 3.156e15)         return `${Math.round(secs / 3.156e12)} million yrs`;
    return 'Practically forever';
}

// ══════════════════════════════════════════════════
//  RENDER OUTPUTS
// ══════════════════════════════════════════════════
function renderOutputs(results) {
    const area      = document.getElementById('pw-outputs-area');
    const emptyEl   = document.getElementById('pw-empty-state');
    if (emptyEl) emptyEl.style.display = 'none';

    // Filter by active type
    const filtered = activeTypeFilter === 'all'
        ? results
        : results.filter(r => r.type === activeTypeFilter);

    if (!filtered.length) {
        area.innerHTML = `<div class="focus-empty" style="padding:30px 0;"><div class="focus-empty-icon">🔍</div><div class="focus-empty-text">No results for this type filter.</div></div>`;
        return;
    }

    // Update entropy block with first result
    const firstAnalysis = analyseStrength(filtered[0].pw);
    renderEntropyBlock(firstAnalysis, filtered[0].pw);

    // Track avg entropy
    const allAnalyses = results.map(r => analyseStrength(r.pw));
    const avgEntropy  = Math.round(allAnalyses.reduce((s, a) => s + a.entropy, 0) / allAnalyses.length);
    sessionStats.totalEntropy  += avgEntropy;
    sessionStats.entropyCount  += 1;

    // Render each card
    area.innerHTML = filtered.map((item, idx) => {
        const typeInfo = PW_TYPES.find(t => t.id === item.type) || { label: item.type, emoji: '🔑' };
        const analysis = analyseStrength(item.pw);
        const coloredPw = colorizePassword(item.pw);
        return `
        <div class="pw-output-card" id="pw-card-${idx}" data-pw="${escHtml(item.pw)}">
            <div class="pw-output-type">${typeInfo.emoji} ${typeInfo.label}</div>
            <div class="pw-output-text" aria-label="Generated password: ${escHtml(item.pw)}">${coloredPw}</div>
            <div class="pw-output-actions">
                <div class="pw-strength-bar-wrap">
                    <div class="pw-strength-bar-track">
                        <div class="pw-strength-bar-fill" style="width:${analysis.score}%;background:${analysis.color};"></div>
                    </div>
                    <div class="pw-strength-label" style="color:${analysis.color};">${analysis.label} · ${analysis.entropy} bits</div>
                </div>
                <div style="display:flex;gap:6px;flex-shrink:0;">
                    <button class="pw-copy-btn" onclick="copyPassword('${escHtml(item.pw)}', ${idx})" aria-label="Copy password">
                        <i class="fa fa-copy"></i> Copy
                    </button>
                    <button class="pw-copy-btn" onclick="regenerateOne(${idx})" aria-label="Regenerate this password" title="Regenerate">
                        <i class="fa fa-arrows-rotate"></i>
                    </button>
                </div>
            </div>
            <div class="pw-stats-row">
                <div class="pw-stat-item">Length <span>${item.pw.length}</span></div>
                <div class="pw-stat-item">Crack <span>${analysis.crackTime}</span></div>
                <div class="pw-stat-item">Entropy <span>${analysis.entropy}b</span></div>
            </div>
        </div>`;
    }).join('');
}

/** Wrap password characters in colored spans */
function colorizePassword(pw) {
    return pw.split('').map(c => {
        if (/[A-Z]/.test(c)) return `<span class="pw-char-upper">${escHtml(c)}</span>`;
        if (/[a-z]/.test(c)) return `<span class="pw-char-lower">${escHtml(c)}</span>`;
        if (/[0-9]/.test(c)) return `<span class="pw-char-num">${escHtml(c)}</span>`;
        return `<span class="pw-char-sym">${escHtml(c)}</span>`;
    }).join('');
}

function renderEntropyBlock(analysis, pw) {
    const block  = document.getElementById('pw-entropy-block');
    block.style.display = 'block';
    document.getElementById('pw-entropy-bar').style.width      = `${(analysis.entropy / 128) * 100}%`;
    document.getElementById('pw-entropy-bar').style.background = analysis.color;
    document.getElementById('pw-entropy-score').textContent    = `${analysis.entropy} bits`;
    document.getElementById('pw-entropy-score').style.color    = analysis.color;
    document.getElementById('pw-entropy-desc').textContent     = analysis.label;
    document.getElementById('pw-crack-time').textContent       = analysis.crackTime;
    document.getElementById('pw-crack-time').style.color       = analysis.color;
}

// ══════════════════════════════════════════════════
//  COPY & REGENERATE
// ══════════════════════════════════════════════════
function copyPassword(pw, cardIdx) {
    navigator.clipboard.writeText(pw).then(() => {
        const card = document.getElementById(`pw-card-${cardIdx}`);
        if (card) {
            card.classList.add('pw-copied');
            const btn = card.querySelector('.pw-copy-btn');
            if (btn) { btn.classList.add('pw-copied-state'); btn.innerHTML = '<i class="fa fa-check"></i> Copied!'; }
            setTimeout(() => {
                card.classList.remove('pw-copied');
                if (btn) { btn.classList.remove('pw-copied-state'); btn.innerHTML = '<i class="fa fa-copy"></i> Copy'; }
            }, 2000);
        }
        sessionStats.copied++;
        addToHistory(pw);
        updateStats();
        saveToStorage();
    }).catch(() => {
        // Fallback for environments without clipboard API
        const ta = document.createElement('textarea');
        ta.value = pw;
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        document.execCommand('copy');
        ta.remove();
        addToHistory(pw);
        sessionStats.copied++;
        updateStats();
        saveToStorage();
    });
}

/** Regenerate just one card in the output list */
function regenerateOne(cardIdx) {
    if (!lastPasswords[cardIdx]) return;
    const type    = lastPasswords[cardIdx].type;
    const len     = getLength();
    let newPw;

    switch (type) {
        case 'secure':       newPw = getSetting('opt-memorable') ? generateMemorable(len) : generateSecure(len); break;
        case 'readable':     newPw = generateReadable(len); break;
        case 'gamer':        newPw = generateGamer(len); break;
        case 'professional': newPw = generateProfessional(len); break;
        case 'passphrase':   newPw = generatePassphrase(); break;
        default:             newPw = generateSecure(len);
    }

    lastPasswords[cardIdx].pw = newPw;
    renderOutputs(lastPasswords);
    sessionStats.generated++;
    updateStats();
}

// ══════════════════════════════════════════════════
//  TYPE FILTER PILLS
// ══════════════════════════════════════════════════
function setTypeFilter(typeId, btn) {
    activeTypeFilter = typeId;
    document.querySelectorAll('.pw-mode-pill').forEach(p => {
        p.classList.remove('active');
        p.setAttribute('aria-selected', 'false');
    });
    btn.classList.add('active');
    btn.setAttribute('aria-selected', 'true');
    if (lastPasswords.length) renderOutputs(lastPasswords);
}

// ══════════════════════════════════════════════════
//  HISTORY
// ══════════════════════════════════════════════════
function addToHistory(pw) {
    const analysis = analyseStrength(pw);
    const entry = {
        pw,
        strength: analysis.label,
        entropy : analysis.entropy,
        color   : analysis.color,
        ts      : new Date().toLocaleTimeString([], { hour:'2-digit', minute:'2-digit' }),
    };
    // Deduplicate
    if (!history.find(h => h.pw === pw)) {
        history.unshift(entry);
        if (history.length > 50) history.pop();
        renderHistory();
    }
}

function renderHistory() {
    const list  = document.getElementById('pw-history-list');
    const empty = document.getElementById('pw-hist-empty');
    const label = document.getElementById('pw-hist-count-label');
    label.textContent = history.length + ' saved';

    if (!history.length) {
        list.innerHTML = '';
        list.appendChild(empty || createHistEmptyEl());
        return;
    }

    list.innerHTML = history.map((h, i) => `
        <div class="pw-history-item">
            <div class="pw-history-pw" title="${escHtml(h.pw)}">${escHtml(h.pw)}</div>
            <div class="pw-history-meta" style="color:${h.color};">${h.strength}</div>
            <div class="pw-history-meta">${h.ts}</div>
            <button class="pw-history-copy" onclick="copyFromHistory('${escHtml(h.pw)}')" title="Copy" aria-label="Copy password from history">
                <i class="fa fa-copy"></i>
            </button>
            <button class="pw-history-copy" onclick="removeFromHistory(${i})" title="Remove" aria-label="Remove from history" style="color:#ef4444">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    `).join('');
}

function copyFromHistory(pw) {
    navigator.clipboard.writeText(pw).catch(() => {
        const ta = document.createElement('textarea');
        ta.value = pw; ta.style.cssText = 'position:fixed;opacity:0';
        document.body.appendChild(ta); ta.select(); document.execCommand('copy'); ta.remove();
    });
    sessionStats.copied++;
    updateStats();
    saveToStorage();
}

function removeFromHistory(idx) {
    history.splice(idx, 1);
    renderHistory();
    updateStats();
    saveToStorage();
}

function clearHistory() {
    history = [];
    renderHistory();
    updateStats();
    saveToStorage();
}

function createHistEmptyEl() {
    const div = document.createElement('div');
    div.id = 'pw-hist-empty';
    div.className = 'focus-empty';
    div.innerHTML = '<div class="focus-empty-icon" style="font-size:1.8rem;">📋</div><div class="focus-empty-text">Passwords you copy will appear here.</div>';
    return div;
}

// ══════════════════════════════════════════════════
//  EXPORT
// ══════════════════════════════════════════════════
function exportHistory(format) {
    if (!history.length) { alert('No passwords in history to export.'); return; }
    let content, mime, ext;

    if (format === 'txt') {
        content = history.map((h, i) => `${i + 1}. ${h.pw}   (${h.strength}, ${h.entropy} bits, ${h.ts})`).join('\n');
        mime = 'text/plain'; ext = 'txt';
    } else if (format === 'json') {
        content = JSON.stringify(history.map(h => ({ password: h.pw, strength: h.strength, entropy: h.entropy, time: h.ts })), null, 2);
        mime = 'application/json'; ext = 'json';
    } else {
        content = 'Password,Strength,Entropy (bits),Time\n' +
            history.map(h => `"${h.pw}","${h.strength}","${h.entropy}","${h.ts}"`).join('\n');
        mime = 'text/csv'; ext = 'csv';
    }

    const blob = new Blob([content], { type: mime });
    const url  = URL.createObjectURL(blob);
    const a    = document.createElement('a');
    a.href = url; a.download = `volttools-passwords.${ext}`;
    document.body.appendChild(a); a.click(); a.remove();
    URL.revokeObjectURL(url);
}

// ══════════════════════════════════════════════════
//  STATS UPDATE
// ══════════════════════════════════════════════════
function updateStats() {
    document.getElementById('stat-generated').textContent     = sessionStats.generated;
    document.getElementById('stat-copied').textContent        = sessionStats.copied;
    document.getElementById('stat-history-count').textContent = history.length;
    const avg = sessionStats.entropyCount > 0
        ? Math.round(sessionStats.totalEntropy / sessionStats.entropyCount)
        : '—';
    document.getElementById('stat-entropy').textContent = avg === '—' ? avg : `${avg}b`;
}

// ══════════════════════════════════════════════════
//  LENGTH SLIDER
// ══════════════════════════════════════════════════
function onLengthChange() {
    document.getElementById('pw-len-out').textContent = document.getElementById('pw-length').value;
    if (lastPasswords.length) generateAll();
}

// ══════════════════════════════════════════════════
//  STORAGE (session-level; not persisted to server)
// ══════════════════════════════════════════════════
function saveToStorage() {
    try {
        localStorage.setItem('pw_history', JSON.stringify(history.slice(0, 50)));
        localStorage.setItem('pw_stats',   JSON.stringify(sessionStats));
        localStorage.setItem('pw_hints',   JSON.stringify(hints));
    } catch(e) {}
}

function loadFromStorage() {
    try {
        history       = JSON.parse(localStorage.getItem('pw_history')) || [];
        sessionStats  = JSON.parse(localStorage.getItem('pw_stats'))   || { generated:0, copied:0, totalEntropy:0, entropyCount:0 };
        hints         = JSON.parse(localStorage.getItem('pw_hints'))   || [];
        renderTags();
    } catch(e) {}
}

// ══════════════════════════════════════════════════
//  KEYBOARD SHORTCUTS
// ══════════════════════════════════════════════════
document.addEventListener('keydown', e => {
    // Ctrl+G — regenerate all
    if (e.ctrlKey && e.key === 'g') {
        e.preventDefault();
        generateAll();
        document.getElementById('pw-generate-btn').style.transform = 'scale(0.97)';
        setTimeout(() => { document.getElementById('pw-generate-btn').style.transform = ''; }, 150);
    }
    // Ctrl+C — copy first password (only when not in text input)
    if (e.ctrlKey && e.key === 'c' && document.activeElement.tagName !== 'INPUT') {
        if (lastPasswords.length) copyPassword(lastPasswords[0].pw, 0);
    }
    // Enter in hint input handled inline via addEventListener above
});

// ══════════════════════════════════════════════════
//  UTILS
// ══════════════════════════════════════════════════
function escHtml(str) {
    return String(str)
        .replace(/&/g,'&amp;').replace(/</g,'&lt;')
        .replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#x27;');
}

function capitalize(str) {
    return str ? str.charAt(0).toUpperCase() + str.slice(1) : str;
}

// ══════════════════════════════════════════════════
//  BOOT
// ══════════════════════════════════════════════════
init();
</script>

</body>
</html>