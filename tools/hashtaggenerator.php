<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hashtag Generator AI</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/tools.css">
<style>

/* ── Layout (mirrors compound calc) ── */
.layout {
  display: grid;
  grid-template-columns: 340px 1fr;
  gap: 24px;
  align-items: start;
  margin-top: 50px;
}

/* ── Panel ── */
.panel {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(0,0,0,0.25);
}
.panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 24px;
  border-bottom: 1px solid var(--border);
}
.panel-title {
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  color: #cbd5e1;
}
.panel-body { padding: 24px; }

/* ── Field / Label ── */
.field { margin-bottom: 22px; }
.field-label {
  display: block;
  font-size: 0.92rem;
  font-weight: 600;
  color: #e2e8f0;
  margin-bottom: 10px;
}

/* ── Inputs ── */
textarea, select {
  width: 100%;
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 14px 16px;
  color: white;
  font-family: 'Syne', sans-serif;
  font-size: 0.92rem;
  outline: none;
  transition: 0.25s ease;
  resize: none;
}
textarea:focus, select:focus {
  border-color: rgba(99,102,241,0.4);
  box-shadow: 0 0 0 4px rgba(99,102,241,0.12);
}
select option { background: #13181f; }

/* ── Platform toggle tabs ── */
.freq-tabs {
  display: grid;
  grid-template-columns: repeat(3,1fr);
  gap: 8px;
  margin-bottom: 28px;
}
.freq-tab {
  background: rgba(255,255,255,0.04);
  border: 1px solid transparent;
  color: var(--muted);
  padding: 12px 10px;
  border-radius: 14px;
  font-size: 0.85rem;
  font-weight: 600;
  cursor: pointer;
  font-family: 'Syne', sans-serif;
  transition: 0.25s ease;
}
.freq-tab:hover { color: white; transform: translateY(-2px); }
.freq-tab.active {
  background: rgba(99,102,241,0.12);
  border-color: rgba(99,102,241,0.28);
  color: #c7d2fe;
}

/* ── Range sliders ── */
input[type=range] {
  width: 100%;
  height: 6px;
  appearance: none;
  border-radius: 999px;
  background: linear-gradient(to right, var(--primary), var(--secondary));
  outline: none;
}
input[type=range]::-webkit-slider-thumb {
  appearance: none;
  width: 20px; height: 20px;
  border-radius: 50%;
  background: white;
  border: 4px solid var(--primary);
  cursor: pointer;
  box-shadow: 0 5px 14px rgba(0,0,0,0.3);
  transition: 0.2s ease;
}
input[type=range]::-webkit-slider-thumb:hover { transform: scale(1.08); }

.field-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 12px;
}
.field-value {
  color: #c7d2fe;
  font-size: 0.85rem;
  font-weight: 700;
}

/* ── Divider ── */
.divider { height: 1px; background: var(--border); margin: 26px 0; }

/* ── Generate button ── */
.btn-generate {
  width: 100%;
  padding: 16px;
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  border: none;
  border-radius: 14px;
  color: white;
  font-family: 'Syne', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  cursor: pointer;
  letter-spacing: 0.5px;
  transition: 0.25s ease;
  box-shadow: 0 8px 24px rgba(99,102,241,0.3);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}
.btn-generate:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(99,102,241,0.45); }
.btn-generate:active { transform: translateY(0); }
.btn-generate:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

/* ── Metrics grid ── */
.metrics-grid {
  display: grid;
  gap: 18px;
  margin-bottom: 24px;
}
.metric-card {
  position: relative;
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 22px;
  padding: 22px;
  overflow: hidden;
  transition: 0.3s ease;
}
.metric-card:hover { transform: translateY(-4px); border-color: rgba(99,102,241,0.3); }
.metric-card::before {
  content: "";
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 4px;
}
.metric-card.green::before { background: #22c55e; }
.metric-card.blue::before  { background: #3b82f6; }
.metric-card.purple::before{ background: #8b5cf6; }
.metric-card.yellow::before{ background: #f59e0b; }
.metric-label {
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 1px;
  color: var(--muted);
  margin-bottom: 10px;
}
.metric-value {
  font-size: 1.9rem;
  font-weight: 800;
  line-height: 1;
}
.metric-value.green  { color: #22c55e; }
.metric-value.blue   { color: #3b82f6; }
.metric-value.purple { color: #a78bfa; }
.metric-value.yellow { color: #f59e0b; }

/* ── Hashtag output area ── */
.hashtag-section {
  margin-bottom: 24px;
}
.hashtag-group-title {
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  color: var(--muted);
  margin-bottom: 14px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.hashtag-group-title .dot {
  width: 8px; height: 8px;
  border-radius: 50%;
}
.dot.green  { background: #22c55e; }
.dot.blue   { background: #3b82f6; }
.dot.yellow { background: #f59e0b; }

.hashtag-cloud {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 22px;
}
.htag {
  background: rgba(255,255,255,0.05);
  border: 1px solid var(--border);
  border-radius: 999px;
  padding: 7px 16px;
  font-family: 'DM Mono', monospace;
  font-size: 0.82rem;
  color: #c7d2fe;
  cursor: pointer;
  transition: 0.2s ease;
  user-select: none;
  position: relative;
}
.htag:hover {
  background: rgba(99,102,241,0.15);
  border-color: rgba(99,102,241,0.4);
  color: white;
  transform: translateY(-2px);
}
.htag.copied {
  background: rgba(34,197,94,0.12);
  border-color: rgba(34,197,94,0.35);
  color: #22c55e;
}
.htag.high   { border-color: rgba(34,197,94,0.2);  color: #86efac; }
.htag.medium { border-color: rgba(59,130,246,0.2); color: #93c5fd; }
.htag.low    { border-color: rgba(245,158,11,0.2); color: #fcd34d; }

/* ── Copy all bar ── */
.copy-bar {
  display: flex;
  gap: 10px;
  margin-top: 4px;
}
.btn-copy-all {
  flex: 1;
  padding: 13px;
  background: rgba(255,255,255,0.05);
  border: 1px solid var(--border);
  border-radius: 12px;
  color: #cbd5e1;
  font-family: 'Syne', sans-serif;
  font-size: 0.85rem;
  font-weight: 600;
  cursor: pointer;
  transition: 0.2s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}
.btn-copy-all:hover {
  background: rgba(99,102,241,0.1);
  border-color: rgba(99,102,241,0.3);
  color: white;
}
.btn-copy-all.success {
  background: rgba(34,197,94,0.1);
  border-color: rgba(34,197,94,0.3);
  color: #22c55e;
}

/* ── Strategy tips ── */
.stat-row {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  padding: 14px 0;
  border-bottom: 1px solid rgba(255,255,255,0.05);
  gap: 12px;
}
.stat-row:last-child { border-bottom: none; }
.stat-name { color: var(--muted); font-size: 0.88rem; flex-shrink: 0; }
.stat-val  { color: white; font-weight: 600; font-size: 0.88rem; text-align: right; }

/* ── Empty / loading states ── */
.empty-state {
  text-align: center;
  padding: 60px 24px;
  color: var(--muted);
}
.empty-icon {
  font-size: 3rem;
  margin-bottom: 16px;
  opacity: 0.4;
}
.empty-text { font-size: 0.92rem; line-height: 1.6; }

.loading-dots {
  display: inline-flex;
  gap: 5px;
}
.loading-dots span {
  width: 7px; height: 7px;
  background: white;
  border-radius: 50%;
  animation: blink 1.2s infinite;
}
.loading-dots span:nth-child(2) { animation-delay: 0.2s; }
.loading-dots span:nth-child(3) { animation-delay: 0.4s; }
@keyframes blink {
  0%,80%,100% { opacity: 0.2; transform: scale(0.8); }
  40%         { opacity: 1;   transform: scale(1); }
}

/* ── Page header ── */
.page-header {
  padding: 50px 0 0;
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 16px;
}
.page-header h1 {
  font-size: 2.2rem;
  font-weight: 700;
  line-height: 1.1;
}
.page-header h1 span { color: var(--accent); }
.page-header p { color: var(--muted); font-size: 0.92rem; margin-top: 8px; max-width: 460px; }
.badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(200,245,100,0.08);
  border: 1px solid rgba(200,245,100,0.2);
  border-radius: 999px;
  padding: 6px 14px;
  font-size: 0.78rem;
  font-weight: 700;
  color: var(--accent);
  letter-spacing: 1px;
}
.badge-dot {
  width: 6px; height: 6px;
  background: var(--accent);
  border-radius: 50%;
  animation: pulse 1.5s infinite;
}
@keyframes pulse {
  0%,100% { opacity: 1; } 50% { opacity: 0.3; }
}

/* ── Blog section ── */
.tool-blog-section {
  margin-top: 60px;
  padding-bottom: 80px;
}
.section-header { text-align: center; margin-bottom: 36px; }
.section-header span {
  font-size: 0.75rem;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--accent);
  font-weight: 700;
}
.section-header h2 {
  font-size: 2rem;
  font-weight: 700;
  margin: 10px 0 12px;
}
.section-header p { color: var(--muted); max-width: 600px; margin: 0 auto; font-size: 0.95rem; }
.tool-blog-content h3 { font-size: 1.15rem; margin: 24px 0 10px; color: #e2e8f0; }
.tool-blog-content p  { color: var(--muted); line-height: 1.75; margin-bottom: 12px; font-size: 0.92rem; }
.tool-blog-content ul { color: var(--muted); padding-left: 20px; margin-bottom: 12px; font-size: 0.92rem; }
.tool-blog-content li { margin-bottom: 6px; line-height: 1.65; }

/* ── Responsive ── */
@media(max-width:1000px) { .layout { grid-template-columns: 1fr; } }
@media(max-width:768px) {
  .metrics-grid { grid-template-columns: 1fr 1fr !important; }
  .page-header h1 { font-size: 1.7rem; }
}
@media(max-width:480px) {
  .metrics-grid { grid-template-columns: 1fr !important; }
}
</style>
</head>
<body>
<div class="page">

  <!-- Header -->
  <div class="page-header">
    <div>
      <h1>Hashtag <span>Generator</span> AI</h1>
      <p>Drop your topic & description — get ranked, categorized hashtags for Instagram, TikTok, LinkedIn & more.</p>
    </div>
    <div class="badge"><div class="badge-dot"></div> AI POWERED</div>
  </div>

  <div class="layout">

    <!-- LEFT: Controls -->
    <div>
      <div class="panel" style="margin-bottom:1rem;">
        <div class="panel-header"><span class="panel-title">Settings</span></div>
        <div class="panel-body">

          <!-- Platform tabs -->
          <div class="freq-tabs">
            <button class="freq-tab active" onclick="setPlatform('Instagram',this)">Instagram</button>
            <button class="freq-tab" onclick="setPlatform('TikTok',this)">TikTok</button>
            <button class="freq-tab" onclick="setPlatform('LinkedIn',this)">LinkedIn</button>
          </div>

          <div class="field">
            <label class="field-label" for="topic">Trending Topic</label>
            <textarea id="topic" rows="2" placeholder="e.g. AI art, gym motivation, street food karachi…"></textarea>
          </div>

          <div class="field">
            <label class="field-label" for="description">Post Description</label>
            <textarea id="description" rows="4" placeholder="Describe your post or content briefly. The more detail, the better the hashtags…"></textarea>
          </div>

          <div class="field">
            <label class="field-label" for="niche">Content Niche</label>
            <select id="niche">
              <option value="General">General</option>
              <option value="Fitness & Health">Fitness & Health</option>
              <option value="Fashion & Style">Fashion & Style</option>
              <option value="Food & Cooking">Food & Cooking</option>
              <option value="Travel & Lifestyle">Travel & Lifestyle</option>
              <option value="Tech & AI">Tech & AI</option>
              <option value="Business & Finance">Business & Finance</option>
              <option value="Art & Design">Art & Design</option>
              <option value="Photography">Photography</option>
              <option value="Music & Entertainment">Music & Entertainment</option>
              <option value="Gaming">Gaming</option>
              <option value="Education">Education</option>
              <option value="Beauty & Skincare">Beauty & Skincare</option>
              <option value="Motivational">Motivational</option>
            </select>
          </div>

          <div class="divider"></div>

          <div class="field">
            <div class="field-header">
              <span class="field-label">Total Hashtags</span>
              <span class="field-value" id="count-out">25</span>
            </div>
            <input type="range" id="htag-count" min="10" max="30" step="5" value="25" oninput="document.getElementById('count-out').textContent=this.value">
          </div>

          <div class="field">
            <div class="field-header">
              <span class="field-label">Include Emojis</span>
              <span class="field-value" id="emoji-out">Yes</span>
            </div>
            <input type="range" id="emoji-toggle" min="0" max="1" step="1" value="1"
              oninput="document.getElementById('emoji-out').textContent=this.value=='1'?'Yes':'No'">
          </div>

          <button class="btn-generate" id="gen-btn" onclick="generate()">
            <span id="btn-label">✦ Generate Hashtags</span>
            <div class="loading-dots" id="btn-loader" style="display:none">
              <span></span><span></span><span></span>
            </div>
          </button>

        </div>
      </div>

      <!-- Strategy tips panel -->
      <div class="panel">
        <div class="panel-header"><span class="panel-title">Strategy Tips</span></div>
        <div class="panel-body">
          <div class="stat-row">
            <span class="stat-name">Mix ratio</span>
            <span class="stat-val" id="tip-mix">—</span>
          </div>
          <div class="stat-row">
            <span class="stat-name">Best posting time</span>
            <span class="stat-val" id="tip-time">—</span>
          </div>
          <div class="stat-row">
            <span class="stat-name">Reach estimate</span>
            <span class="stat-val" id="tip-reach">—</span>
          </div>
          <div class="stat-row">
            <span class="stat-name">Avoid overused</span>
            <span class="stat-val" id="tip-avoid">—</span>
          </div>
          <div class="stat-row">
            <span class="stat-name">Platform tip</span>
            <span class="stat-val" id="tip-platform">—</span>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT: Results -->
    <div>
      <!-- Metrics -->
      <div class="metrics-grid" style="grid-template-columns:repeat(4,1fr);">
        <div class="metric-card green">
          <div class="metric-label">Total Tags</div>
          <div class="metric-value green" id="m-total">—</div>
        </div>
        <div class="metric-card blue">
          <div class="metric-label">High Volume</div>
          <div class="metric-value blue" id="m-high">—</div>
        </div>
        <div class="metric-card purple">
          <div class="metric-label">Mid Range</div>
          <div class="metric-value purple" id="m-mid">—</div>
        </div>
        <div class="metric-card yellow">
          <div class="metric-label">Niche Tags</div>
          <div class="metric-value yellow" id="m-niche">—</div>
        </div>
      </div>

      <!-- Hashtag output -->
      <div class="panel" style="margin-bottom:1rem;">
        <div class="panel-header">
          <span class="panel-title">Generated Hashtags</span>
          <span style="font-size:0.78rem;color:var(--muted);font-family:'DM Mono',monospace;">Click tag to copy</span>
        </div>
        <div class="panel-body">

          <div id="output-area">
            <div class="empty-state">
              <div class="empty-icon">#</div>
              <div class="empty-text">Enter a topic and description,<br>then hit Generate to get your hashtags.</div>
            </div>
          </div>

        </div>
      </div>

      <!-- Copy all panel -->
      <div class="panel" id="copy-panel" style="display:none;">
        <div class="panel-header"><span class="panel-title">Quick Copy</span></div>
        <div class="panel-body" style="padding:16px 24px;">
          <div class="copy-bar">
            <button class="btn-copy-all" id="copy-all-btn" onclick="copyAll()">
              <span>⎘</span> Copy All Hashtags
            </button>
            <button class="btn-copy-all" id="copy-caption-btn" onclick="copyCaption()">
              <span>✎</span> Copy with Caption
            </button>
          </div>
          <div id="raw-tags" style="margin-top:14px;font-family:'DM Mono',monospace;font-size:0.78rem;color:var(--muted);line-height:1.8;word-break:break-word;"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Blog / SEO section -->
  <section class="tool-blog-section">
    <div class="section-header">
      <span>Social Media Growth</span>
      <h2>AI Hashtag Generator for Instagram & Beyond</h2>
      <p>Get data-driven, niche-specific hashtags that help your content rank and reach the right audience.</p>
    </div>

    <div class="panel">
      <div class="panel-body tool-blog-content">

        <h3>What Is an AI Hashtag Generator?</h3>
        <p>An AI hashtag generator analyzes your topic, description, and niche to produce a curated set of hashtags optimized for discoverability. Instead of guessing which tags work, the AI balances high-volume, mid-range, and niche-specific hashtags for maximum organic reach.</p>

        <h3>Why Hashtags Still Matter in 2025</h3>
        <p>Platforms like Instagram and TikTok continue to use hashtags as indexing signals. A well-balanced hashtag strategy puts your content in front of people who are actively searching for that topic — essentially free organic traffic.</p>
        <p>The key is mixing viral broad tags (#fitness, #food) with targeted niche tags (#karachifoodie, #homegymsetup) so the algorithm has multiple entry points to rank your post.</p>

        <h3>How This Tool Categorizes Hashtags</h3>
        <ul>
          <li><strong style="color:#86efac;">High Volume</strong> — Broad tags with millions of posts. Good for visibility bursts.</li>
          <li><strong style="color:#93c5fd;">Mid Range</strong> — 100K–1M posts. Best balance of reach and competition.</li>
          <li><strong style="color:#fcd34d;">Niche / Long-tail</strong> — Highly specific tags under 100K posts. Drive targeted, engaged followers.</li>
        </ul>

        <h3>Platform-Specific Tips</h3>
        <p><strong style="color:#e2e8f0;">Instagram</strong> — Use 20–30 hashtags. Put them in the first comment or caption. Mix all three tiers.</p>
        <p><strong style="color:#e2e8f0;">TikTok</strong> — 3–5 strong hashtags outperform long lists. Focus on trending and niche tags.</p>
        <p><strong style="color:#e2e8f0;">LinkedIn</strong> — 3–6 professional hashtags work best. Avoid overly broad tags; prioritize industry terms.</p>

        <h3>Frequently Asked Questions</h3>
        <h4>Is this tool free?</h4>
        <p>Yes, completely free to use directly in your browser with no signup required.</p>
        <h4>How often should I change my hashtags?</h4>
        <p>Rotate your hashtag sets every 5–10 posts to avoid shadowban patterns and keep reaching new audiences.</p>
        <h4>Can I use the same hashtags every post?</h4>
        <p>Not recommended. Instagram's algorithm can suppress repetitive hashtag patterns. Use this tool to generate fresh sets regularly.</p>

      </div>
    </div>
  </section>

</div><!-- /page -->

<script>
let platform = 'Instagram';
let allHashtags = [];
let postTopic = '';
let postDescription = '';

function setPlatform(p, btn) {
  platform = p;
  document.querySelectorAll('.freq-tab').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}

async function generate() {
  const topic   = document.getElementById('topic').value.trim();
  const desc    = document.getElementById('description').value.trim();
  const niche   = document.getElementById('niche').value;
  const count   = document.getElementById('htag-count').value;
  const emojis  = document.getElementById('emoji-toggle').value === '1';

  if (!topic) { alert('Please enter a trending topic.'); return; }

  postTopic = topic;
  postDescription = desc;

  // Loading state
  const btn = document.getElementById('gen-btn');
  document.getElementById('btn-label').style.display = 'none';
  document.getElementById('btn-loader').style.display = 'flex';
  btn.disabled = true;

  // Show loading in output
  document.getElementById('output-area').innerHTML = `
    <div class="empty-state">
      <div style="font-size:2.5rem;margin-bottom:16px;">
        <div class="loading-dots"><span></span><span></span><span></span></div>
      </div>
      <div class="empty-text">AI is crafting your hashtag strategy…</div>
    </div>`;
  document.getElementById('copy-panel').style.display = 'none';

  const prompt = `You are a social media hashtag strategist. Generate exactly ${count} hashtags for a ${platform} post.

Topic: "${topic}"
Description: "${desc || 'Not provided'}"
Niche: ${niche}
Include emojis in hashtags: ${emojis ? 'yes' : 'no'}

Respond ONLY with a JSON object in this exact format (no markdown, no extra text):
{
  "high": ["#tag1","#tag2",...],
  "medium": ["#tag1","#tag2",...],
  "niche": ["#tag1","#tag2",...],
  "tips": {
    "mix": "e.g. 8 high / 10 mid / 7 niche",
    "time": "e.g. 6–9 PM local time",
    "reach": "e.g. 50K–200K impressions",
    "avoid": "e.g. #love, #follow",
    "platform": "One short platform-specific tip"
  }
}

Rules:
- high: ~30% of total, broad popular tags (1M+ posts)
- medium: ~40% of total, balanced tags (100K–1M posts)
- niche: ~30% of total, specific long-tail tags (<100K posts)
- All hashtags must be relevant to the topic, description and niche
- No duplicate hashtags
- Each hashtag must start with #
- No spaces inside hashtags (use camelCase or underscores)`;

  try {
    const response = await fetch("https://api.anthropic.com/v1/messages", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        model: "claude-sonnet-4-20250514",
        max_tokens: 1000,
        messages: [{ role: "user", content: prompt }]
      })
    });

    const data = await response.json();
    const text = data.content.map(i => i.text || "").join("");
    const clean = text.replace(/```json|```/g, "").trim();
    const parsed = JSON.parse(clean);

    renderHashtags(parsed);

  } catch(err) {
    document.getElementById('output-area').innerHTML = `
      <div class="empty-state">
        <div class="empty-icon">⚠</div>
        <div class="empty-text">Something went wrong. Please try again.</div>
      </div>`;
    console.error(err);
  } finally {
    document.getElementById('btn-label').style.display = 'inline';
    document.getElementById('btn-loader').style.display = 'none';
    btn.disabled = false;
  }
}

function renderHashtags(data) {
  const high   = data.high   || [];
  const medium = data.medium || [];
  const niche  = data.niche  || [];
  const tips   = data.tips   || {};

  allHashtags = [...high, ...medium, ...niche];

  // Metrics
  document.getElementById('m-total').textContent = allHashtags.length;
  document.getElementById('m-high').textContent  = high.length;
  document.getElementById('m-mid').textContent   = medium.length;
  document.getElementById('m-niche').textContent = niche.length;

  // Strategy tips
  document.getElementById('tip-mix').textContent      = tips.mix      || '—';
  document.getElementById('tip-time').textContent     = tips.time     || '—';
  document.getElementById('tip-reach').textContent    = tips.reach    || '—';
  document.getElementById('tip-avoid').textContent    = tips.avoid    || '—';
  document.getElementById('tip-platform').textContent = tips.platform || '—';

  // Build output HTML
  let html = '';

  if (high.length) {
    html += `<div class="hashtag-group-title"><div class="dot green"></div> High Volume</div>`;
    html += `<div class="hashtag-cloud">` + high.map(h => `<span class="htag high" onclick="copyTag(this,'${h}')">${h}</span>`).join('') + `</div>`;
  }
  if (medium.length) {
    html += `<div class="hashtag-group-title"><div class="dot blue"></div> Mid Range</div>`;
    html += `<div class="hashtag-cloud">` + medium.map(h => `<span class="htag medium" onclick="copyTag(this,'${h}')">${h}</span>`).join('') + `</div>`;
  }
  if (niche.length) {
    html += `<div class="hashtag-group-title"><div class="dot yellow"></div> Niche / Long-tail</div>`;
    html += `<div class="hashtag-cloud">` + niche.map(h => `<span class="htag low" onclick="copyTag(this,'${h}')">${h}</span>`).join('') + `</div>`;
  }

  document.getElementById('output-area').innerHTML = html;

  // Raw tags for copy-all
  const rawStr = allHashtags.join(' ');
  document.getElementById('raw-tags').textContent = rawStr;
  document.getElementById('copy-panel').style.display = 'block';
}

function copyTag(el, tag) {
  navigator.clipboard.writeText(tag).then(() => {
    el.classList.add('copied');
    const orig = el.textContent;
    el.textContent = '✓ copied';
    setTimeout(() => { el.classList.remove('copied'); el.textContent = orig; }, 1200);
  });
}

function copyAll() {
  const text = allHashtags.join(' ');
  navigator.clipboard.writeText(text).then(() => {
    const btn = document.getElementById('copy-all-btn');
    btn.classList.add('success');
    btn.innerHTML = '<span>✓</span> Copied!';
    setTimeout(() => { btn.classList.remove('success'); btn.innerHTML = '<span>⎘</span> Copy All Hashtags'; }, 1800);
  });
}

function copyCaption() {
  const caption = `${postDescription || postTopic}\n\n${allHashtags.join(' ')}`;
  navigator.clipboard.writeText(caption).then(() => {
    const btn = document.getElementById('copy-caption-btn');
    btn.classList.add('success');
    btn.innerHTML = '<span>✓</span> Copied!';
    setTimeout(() => { btn.classList.remove('success'); btn.innerHTML = '<span>✎</span> Copy with Caption'; }, 1800);
  });
}
</script>
</body>
</html>