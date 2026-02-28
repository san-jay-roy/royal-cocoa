<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Royal Cocoa – Share Your Experience</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,700&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Lato:wght@300;400;700&family=Dancing+Script:wght@500;600&display=swap" rel="stylesheet"/>
<style>
/* ═══════════════════════════════════════════
   ROOT
═══════════════════════════════════════════ */
:root{
  --db:#2c1608;--choco:#5d4037;
  --cream:#fff8e1;--lcream:#fffde7;
  --gold:#d4a843;--gl:#f0c96a;--gd:#b8882a;
  --txt:#1a0e00;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%;scroll-behavior:smooth}
body{font-family:'Lato',sans-serif;background:var(--db);overflow:hidden}
::selection{background:var(--gold);color:var(--db)}
::-webkit-scrollbar{width:4px}
::-webkit-scrollbar-thumb{background:var(--gold);border-radius:4px}

/* ═══════════════════════════════════════════
   CUSTOM CURSOR
═══════════════════════════════════════════ */
.c-dot{width:7px;height:7px;background:var(--gold);border-radius:50%;position:fixed;pointer-events:none;z-index:9999;transform:translate(-50%,-50%)}
.c-ring{width:32px;height:32px;border:1.5px solid rgba(212,168,67,.55);border-radius:50%;position:fixed;pointer-events:none;z-index:9998;transform:translate(-50%,-50%);transition:all .14s ease}

/* ═══════════════════════════════════════════
   LOADER
═══════════════════════════════════════════ */
#loader{
  position:fixed;inset:0;z-index:9997;
  background:var(--db);
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  transition:opacity .9s ease,visibility .9s;
}
#loader.gone{opacity:0;visibility:hidden}
.l-word{font-family:'Playfair Display',serif;font-size:2.2rem;color:var(--gold);letter-spacing:6px;animation:lBlink 1.8s ease infinite}
@keyframes lBlink{0%,100%{opacity:1}50%{opacity:.35}}
.l-line{width:180px;height:1px;background:rgba(212,168,67,.18);margin:24px auto 0;overflow:hidden}
.l-fill{height:100%;background:linear-gradient(90deg,var(--gold),var(--gl));animation:lFill 2.2s ease forwards}
@keyframes lFill{0%{width:0}100%{width:100%}}
.l-sub{font-family:'Dancing Script',cursive;color:rgba(212,168,67,.45);font-size:.95rem;letter-spacing:2px;margin-top:14px}

/* ═══════════════════════════════════════════
   PARTICLES
═══════════════════════════════════════════ */
#pc{position:fixed;inset:0;pointer-events:none;z-index:0;opacity:.55}

/* ═══════════════════════════════════════════
   PAGE LAYOUT — SPLIT
═══════════════════════════════════════════ */
.page{
  display:flex;height:100vh;width:100%;position:relative;z-index:1;
}

/* ── LEFT: FULL IMAGE PANEL ── */
.img-panel{
  position:relative;
  flex:0 0 52%;
  overflow:hidden;
}
.img-panel img{
  width:100%;height:100%;object-fit:cover;
  display:block;
  filter:brightness(.7) saturate(1.15);
  transform:scale(1.06);
  animation:imgReveal 1.4s cubic-bezier(.22,1,.36,1) .5s forwards;
  transform-origin:center;
}
@keyframes imgReveal{
  0%{transform:scale(1.15);opacity:0}
  100%{transform:scale(1.06);opacity:1}
}

/* Gradient overlay on image */
.img-panel::after{
  content:'';position:absolute;inset:0;
  background:
    linear-gradient(to right, transparent 60%, var(--db) 100%),
    linear-gradient(to top, rgba(20,8,0,.7) 0%, transparent 45%),
    linear-gradient(150deg, rgba(20,8,0,.4) 0%, transparent 60%);
}

/* Image overlay text */
.img-text{
  position:absolute;bottom:52px;left:48px;z-index:2;
  opacity:0;transform:translateY(24px);
  animation:fadeUp .9s cubic-bezier(.22,1,.36,1) 1.4s forwards;
}
.img-text .cursive{
  font-family:'Dancing Script',cursive;
  font-size:1.05rem;color:rgba(212,168,67,.65);letter-spacing:2px;display:block;margin-bottom:4px;
}
.img-text h2{
  font-family:'Cormorant Garamond',serif;
  font-size:2.6rem;font-weight:300;color:#fff;line-height:1.2;
}
.img-text h2 em{color:var(--gold);font-style:italic}
.img-text .divline{
  width:48px;height:1px;background:linear-gradient(90deg,var(--gold),transparent);margin:14px 0;
}
.img-text p{
  font-size:.82rem;color:rgba(255,248,225,.6);letter-spacing:1px;text-transform:uppercase;
}

/* Top-left logo on image */
.img-logo{
  position:absolute;top:44px;left:48px;z-index:3;
  opacity:0;animation:fadeUp .8s ease .3s forwards;
}
.img-logo span{
  font-family:'Playfair Display',serif;font-size:1.45rem;font-weight:700;
  color:var(--gold);letter-spacing:1.5px;
}
.img-logo small{
  display:block;font-family:'Dancing Script',cursive;
  color:rgba(212,168,67,.5);font-size:.78rem;letter-spacing:1px;
}

/* Floating gold orb */
.img-orb{
  position:absolute;width:280px;height:280px;border-radius:50%;
  background:radial-gradient(circle,rgba(212,168,67,.12) 0%,transparent 70%);
  top:20%;right:-60px;z-index:1;pointer-events:none;
  animation:orbPulse 6s ease-in-out infinite;
}
@keyframes orbPulse{0%,100%{transform:scale(1) translateY(0)}50%{transform:scale(1.15) translateY(-20px)}}

/* ── RIGHT: FORM PANEL ── */
.form-panel{
  flex:1;
  background:linear-gradient(160deg,#1a0800 0%,#0d0400 100%);
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  padding:52px 60px;
  position:relative;overflow:hidden;
}

/* Background shimmer lines */
.form-panel::before{
  content:'';position:absolute;inset:0;
  background:
    repeating-linear-gradient(105deg,transparent 0,transparent 60px,rgba(212,168,67,.025) 60px,rgba(212,168,67,.025) 61px);
  pointer-events:none;
}

/* Decorative top-right corner */
.corner-deco{
  position:absolute;top:0;right:0;
  width:120px;height:120px;
  border-right:1px solid rgba(212,168,67,.18);
  border-top:1px solid rgba(212,168,67,.18);
  border-radius:0 0 0 120px;
}
.corner-deco2{
  position:absolute;bottom:0;left:0;
  width:80px;height:80px;
  border-left:1px solid rgba(212,168,67,.1);
  border-bottom:1px solid rgba(212,168,67,.1);
  border-radius:0 80px 0 0;
}

.form-wrap{
  width:100%;max-width:420px;
  opacity:0;transform:translateX(40px);
  animation:slideIn 1s cubic-bezier(.22,1,.36,1) .9s forwards;
}
@keyframes slideIn{to{opacity:1;transform:translateX(0)}}

/* Form header */
.form-eyebrow{
  display:inline-flex;align-items:center;gap:8px;
  font-size:.65rem;letter-spacing:5px;text-transform:uppercase;
  color:var(--gold);border:1px solid rgba(212,168,67,.25);
  padding:6px 18px;border-radius:50px;margin-bottom:1.8rem;
  background:rgba(212,168,67,.05);
}
.form-eyebrow::before,.form-eyebrow::after{content:'✦';font-size:.5rem;opacity:.7}

.form-title{
  font-family:'Cormorant Garamond',serif;
  font-size:2.8rem;font-weight:400;color:#fff;line-height:1.15;margin-bottom:.5rem;
}
.form-title em{
  font-style:italic;color:var(--gold);
  background:linear-gradient(135deg,var(--gold),var(--gl));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
}
.form-sub{
  font-size:.85rem;color:rgba(255,248,225,.45);line-height:1.7;
  margin-bottom:2.4rem;letter-spacing:.3px;
}

/* Divider bar */
.gold-bar{width:44px;height:2px;background:linear-gradient(90deg,var(--gold),var(--gl));border-radius:2px;margin-bottom:1.8rem}

/* ── INPUT FIELDS ── */
.field{position:relative;margin-bottom:1.6rem}

.field label{
  display:block;font-size:.65rem;letter-spacing:3px;text-transform:uppercase;
  color:rgba(212,168,67,.7);margin-bottom:.6rem;
  transition:color .3s;
}
.field:focus-within label{color:var(--gold)}

.field input,
.field textarea{
  width:100%;background:rgba(255,248,225,.03);
  border:none;border-bottom:1px solid rgba(212,168,67,.22);
  color:#fff;font-family:'Lato',sans-serif;font-size:.95rem;
  padding:12px 0 10px;outline:none;
  transition:all .4s;resize:none;
  letter-spacing:.3px;
  appearance:none;-webkit-appearance:none;
}
.field textarea{min-height:120px;line-height:1.7}
.field input::placeholder,
.field textarea::placeholder{color:rgba(255,248,225,.2);font-size:.88rem}

/* Animated underline */
.field-line{
  position:absolute;bottom:0;left:0;width:0;height:1px;
  background:linear-gradient(90deg,var(--gold),var(--gl));
  transition:width .5s cubic-bezier(.22,1,.36,1);
}
.field:focus-within .field-line{width:100%}

/* Character count */
.char-count{
  text-align:right;font-size:.65rem;color:rgba(212,168,67,.35);
  margin-top:6px;letter-spacing:1px;transition:color .3s;
}
.char-count.near{color:rgba(212,168,67,.7)}

/* Rating stars */
.rating-wrap{margin-bottom:2rem}
.rating-label{font-size:.65rem;letter-spacing:3px;text-transform:uppercase;color:rgba(212,168,67,.7);margin-bottom:.8rem;display:block}
.stars-input{display:flex;gap:8px}
.stars-input input{display:none}
.stars-input label{
  font-size:1.8rem;cursor:pointer;color:rgba(255,248,225,.15);
  transition:all .25s;filter:drop-shadow(0 0 0 transparent);
  transform-origin:center bottom;
}
.stars-input label:hover,
.stars-input label.lit{
  color:var(--gold);
  filter:drop-shadow(0 0 8px rgba(212,168,67,.6));
}
.stars-input label:hover{transform:scale(1.2) translateY(-3px)}

/* Submit Button */
.submit-btn{
  width:100%;padding:16px;border:none;border-radius:50px;
  background:linear-gradient(135deg,var(--gold),var(--gl));
  color:var(--db);font-family:'Lato',sans-serif;font-weight:700;
  font-size:.82rem;letter-spacing:2.5px;text-transform:uppercase;
  cursor:pointer;position:relative;overflow:hidden;
  box-shadow:0 8px 30px rgba(212,168,67,.3);
  transition:all .4s cubic-bezier(.22,1,.36,1);
  margin-top:.4rem;
}
.submit-btn::before{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,var(--gl),#fff8b0);
  opacity:0;transition:opacity .35s;
}
.submit-btn:hover{transform:translateY(-3px) scale(1.02);box-shadow:0 16px 40px rgba(212,168,67,.5)}
.submit-btn:hover::before{opacity:1}
.submit-btn:active{transform:translateY(0) scale(.98)}
.submit-btn span{position:relative;z-index:1;display:flex;align-items:center;justify-content:center;gap:10px}

/* Loading spinner inside button */
.btn-spinner{
  width:16px;height:16px;border:2px solid rgba(44,22,8,.3);
  border-top-color:var(--db);border-radius:50%;
  display:none;animation:spin .7s linear infinite;
}
@keyframes spin{to{transform:rotate(360deg)}}
.submit-btn.loading .btn-spinner{display:block}
.submit-btn.loading .btn-text{display:none}

/* ── SUCCESS STATE ── */
.success-overlay{
  position:absolute;inset:0;
  background:linear-gradient(160deg,#1a0800,#0d0400);
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  opacity:0;pointer-events:none;transition:opacity .7s ease;
  padding:40px;text-align:center;z-index:10;
}
.success-overlay.show{opacity:1;pointer-events:auto}
.success-icon{
  width:80px;height:80px;border-radius:50%;
  background:linear-gradient(135deg,var(--gold),var(--gl));
  display:flex;align-items:center;justify-content:center;
  font-size:2rem;color:var(--db);
  margin:0 auto 24px;
  animation:successPop .6s cubic-bezier(.34,1.56,.64,1) forwards;
  opacity:0;
}
@keyframes successPop{0%{transform:scale(0);opacity:0}100%{transform:scale(1);opacity:1}}
.success-title{
  font-family:'Cormorant Garamond',serif;font-size:2.4rem;
  color:#fff;margin-bottom:.8rem;
}
.success-title em{color:var(--gold);font-style:italic}
.success-sub{color:rgba(255,248,225,.5);font-size:.9rem;line-height:1.8;max-width:300px;margin:0 auto 2rem}
.back-btn{
  background:transparent;border:1px solid rgba(212,168,67,.35);
  color:var(--gold);font-size:.72rem;letter-spacing:2.5px;text-transform:uppercase;
  padding:10px 28px;border-radius:50px;cursor:pointer;
  transition:all .35s;font-family:'Lato',sans-serif;
}
.back-btn:hover{background:rgba(212,168,67,.08);border-color:var(--gold)}

/* ── FLOATING SPARKS on success ── */
.spark{
  position:absolute;width:6px;height:6px;border-radius:50%;
  background:var(--gold);pointer-events:none;
  animation:sparkFly 1s ease forwards;
}
@keyframes sparkFly{
  0%{transform:translate(0,0) scale(1);opacity:1}
  100%{transform:var(--tx,translate(60px,-80px)) scale(0);opacity:0}
}

/* ── ANIMATIONS ── */
@keyframes fadeUp{to{opacity:1;transform:translateY(0)}}

/* ── MOBILE ── */
@media(max-width:900px){
  body{overflow:auto}
  .page{flex-direction:column;height:auto;min-height:100vh}
  .img-panel{flex:0 0 46vh;min-height:300px}
  .form-panel{padding:48px 32px 60px}
  .img-text{left:28px;bottom:28px}
  .img-logo{left:28px;top:28px}
  .form-title{font-size:2.2rem}
  .slide-num,.scroll-ind{display:none}
}
@media(max-width:480px){
  .form-panel{padding:40px 24px 50px}
  .form-title{font-size:1.9rem}
}
</style>
</head>
<body>

<!-- CURSOR -->
<div class="c-dot" id="cDot"></div>
<div class="c-ring" id="cRing"></div>

<!-- LOADER -->
<div id="loader">
  <div class="l-word">Royal Cocoa</div>
  <div class="l-sub">Share Your Experience</div>
  <div class="l-line"><div class="l-fill"></div></div>
</div>

<!-- PARTICLES -->
<canvas id="pc"></canvas>

<!-- PAGE -->
<div class="page">

  <!-- LEFT: IMAGE -->
  <div class="img-panel">
    <img
      src="https://images.unsplash.com/photo-1549007953-2f2dc0b24019?w=1200&q=90"
      alt="Luxury handcrafted chocolates"
      onerror="this.src='https://images.unsplash.com/photo-1481391319762-47dff72954d9?w=1200&q=90'"
    />
    <div class="img-orb"></div>

    <!-- Logo top-left -->
    <div class="img-logo">
      <span>Royal Cocoa</span>
      <small>Handcrafted Chocolates</small>
    </div>

    <!-- Bottom text -->
    <div class="img-text">
      <span class="cursive">Every taste tells a story</span>
      <h2>Your words<br/>shape our <em>craft</em></h2>
      <div class="divline"></div>
      <p>Artisan Chocolatiers · Mumbai · Est. 2012</p>
    </div>
  </div>

  <!-- RIGHT: FORM -->
  <div class="form-panel">
    <div class="corner-deco"></div>
    <div class="corner-deco2"></div>

    <!-- Main Form -->
    <div class="form-wrap" id="formWrap">
      <div class="form-eyebrow">Share Your Experience</div>
      <h1 class="form-title">Tell us how we<br/>made you <em>feel</em></h1>
      <p class="form-sub">Your feedback is the finest ingredient in everything we create.</p>
      <div class="gold-bar"></div>

      <form id="feedbackForm" novalidate>

        <!-- Name -->
        <div class="field">
          <label for="name">Your Name</label>
          <input
            type="text" id="name" name="name"
            placeholder="e.g. Priya Sharma"
            autocomplete="off" maxlength="60"
          />
          <div class="field-line"></div>
        </div>

        <!-- Star Rating -->
        <div class="rating-wrap">
          <span class="rating-label">Your Rating</span>
          <div class="stars-input" id="starsInput" role="group" aria-label="Rating">
            <input type="radio" name="rating" id="s5" value="5"/>
            <label for="s5" title="Exceptional">★</label>
            <input type="radio" name="rating" id="s4" value="4"/>
            <label for="s4" title="Excellent">★</label>
            <input type="radio" name="rating" id="s3" value="3"/>
            <label for="s3" title="Good">★</label>
            <input type="radio" name="rating" id="s2" value="2"/>
            <label for="s2" title="Fair">★</label>
            <input type="radio" name="rating" id="s1" value="1"/>
            <label for="s1" title="Poor">★</label>
          </div>
        </div>

        <!-- Feedback -->
        <div class="field">
          <label for="feedback">Your Feedback</label>
          <textarea
            id="feedback" name="feedback"
            placeholder="Tell us about your experience — what delighted you, surprised you, or melted your heart…"
            maxlength="500"
          ></textarea>
          <div class="field-line"></div>
          <div class="char-count" id="charCount">0 / 500</div>
        </div>

        <button type="submit" class="submit-btn" id="submitBtn">
          <span>
            <div class="btn-spinner"></div>
            <span class="btn-text">Send My Feedback ✦</span>
          </span>
        </button>

      </form>
    </div>

    <!-- SUCCESS OVERLAY -->
    <div class="success-overlay" id="successOverlay">
      <div class="success-icon" id="successIcon">✦</div>
      <h2 class="success-title">Thank you,<br/><em id="thankName">dear guest</em></h2>
      <p class="success-sub">Your words mean the world to us. We craft every chocolate with hearts like yours in mind.</p>
      <button class="back-btn" id="backBtn">← Submit Another</button>
    </div>

  </div><!-- /form-panel -->
</div><!-- /page -->

<script>
/* ─── LOADER ─── */
window.addEventListener('load', () => {
  setTimeout(() => document.getElementById('loader').classList.add('gone'), 2000);
});

/* ─── CUSTOM CURSOR ─── */
const cDot = document.getElementById('cDot');
const cRing = document.getElementById('cRing');
let mx=0,my=0,rx=0,ry=0;
document.addEventListener('mousemove', e => { mx=e.clientX; my=e.clientY; });
(function tick(){
  rx += (mx-rx)*.13; ry += (my-ry)*.13;
  cDot.style.left=mx+'px'; cDot.style.top=my+'px';
  cRing.style.left=rx+'px'; cRing.style.top=ry+'px';
  requestAnimationFrame(tick);
})();
document.querySelectorAll('a,button,input,textarea,label').forEach(el=>{
  el.addEventListener('mouseenter',()=>{ cRing.style.width='48px';cRing.style.height='48px';cRing.style.borderColor='rgba(212,168,67,.9)'; });
  el.addEventListener('mouseleave',()=>{ cRing.style.width='32px';cRing.style.height='32px';cRing.style.borderColor='rgba(212,168,67,.55)'; });
});

/* ─── PARTICLES ─── */
const cvs = document.getElementById('pc');
const ctx = cvs.getContext('2d');
function resize(){ cvs.width=window.innerWidth; cvs.height=window.innerHeight; }
resize(); window.addEventListener('resize', resize);
class P {
  constructor(){ this.reset(); this.y=Math.random()*cvs.height; }
  reset(){
    this.x=Math.random()*cvs.width; this.y=cvs.height+10;
    this.sz=Math.random()*1.8+.3;
    this.sy=Math.random()*.5+.15; this.sx=(Math.random()-.5)*.25;
    this.op=Math.random()*.4+.08; this.life=0; this.ml=Math.random()*350+200;
  }
  update(){ this.x+=this.sx; this.y-=this.sy; this.life++; if(this.life>this.ml||this.y<-10) this.reset(); }
  draw(){
    ctx.save();
    ctx.globalAlpha=this.op*(1-this.life/this.ml);
    ctx.fillStyle='#d4a843'; ctx.shadowBlur=6; ctx.shadowColor='#d4a843';
    ctx.beginPath(); ctx.arc(this.x,this.y,this.sz,0,Math.PI*2); ctx.fill();
    ctx.restore();
  }
}
const pts = Array.from({length:55},()=>new P());
(function loop(){ ctx.clearRect(0,0,cvs.width,cvs.height); pts.forEach(p=>{p.update();p.draw();}); requestAnimationFrame(loop); })();

/* ─── STAR RATING (RTL visual trick via flex-direction) ─── */
// Stars rendered right-to-left so CSS sibling selector works for fill
// We use JS for simplicity instead
const starsInput = document.getElementById('starsInput');
const starLabels = starsInput.querySelectorAll('label');
const starInputs = starsInput.querySelectorAll('input');
let selectedRating = 0;

// Render stars left-to-right by reversing the DOM order display
starLabels.forEach((lbl, i) => {
  // i=0 = star5, i=1=star4 ... (inputs are 5,4,3,2,1)
  const val = 5 - i;
  lbl.dataset.val = val;

  lbl.addEventListener('mouseenter', () => {
    starLabels.forEach((l, j) => {
      l.classList.toggle('lit', j <= i);
    });
  });
  lbl.addEventListener('mouseleave', () => {
    starLabels.forEach((l, j) => {
      l.classList.toggle('lit', j < (5 - selectedRating));
    });
  });
  lbl.addEventListener('click', () => {
    selectedRating = val;
    starLabels.forEach((l, j) => {
      l.classList.toggle('lit', j < (5 - selectedRating));
    });
  });
});

// Reorder stars visually so 5 is on left
starsInput.style.flexDirection = 'row-reverse';
starsInput.style.justifyContent = 'flex-end';

/* ─── CHARACTER COUNT ─── */
const ta = document.getElementById('feedback');
const cc = document.getElementById('charCount');
ta.addEventListener('input', () => {
  const len = ta.value.length;
  cc.textContent = len + ' / 500';
  cc.classList.toggle('near', len > 420);
});

/* ─── FORM SUBMIT ─── */
const form = document.getElementById('feedbackForm');
const btn  = document.getElementById('submitBtn');

form.addEventListener('submit', e => {
  e.preventDefault();
  const name = document.getElementById('name').value.trim();
  const msg  = ta.value.trim();

  // Simple validation
  if (!name) { pulse(document.getElementById('name')); return; }
  if (!msg)  { pulse(ta); return; }

  // Loading state
  btn.classList.add('loading');
  btn.disabled = true;

  setTimeout(() => {
    showSuccess(name);
  }, 1800);
});

function pulse(el){
  el.style.borderBottomColor='rgba(212,80,60,.7)';
  el.style.animation='shake .4s ease';
  setTimeout(()=>{ el.style.borderBottomColor=''; el.style.animation=''; },600);
}

/* ─── SUCCESS ─── */
function showSuccess(name){
  const overlay = document.getElementById('successOverlay');
  const icon    = document.getElementById('successIcon');
  const tname   = document.getElementById('thankName');

  tname.textContent = name || 'dear guest';
  overlay.classList.add('show');

  // Trigger icon animation
  icon.style.opacity = '0';
  icon.style.animation = 'none';
  requestAnimationFrame(()=>{
    requestAnimationFrame(()=>{
      icon.style.animation = 'successPop .6s cubic-bezier(.34,1.56,.64,1) forwards';
    });
  });

  // Sparks
  launchSparks(overlay);
}

function launchSparks(parent){
  const colors = ['#d4a843','#f0c96a','#fff8e1','#b8882a'];
  for(let i=0;i<18;i++){
    const spark = document.createElement('div');
    spark.className = 'spark';
    const angle = Math.random()*360;
    const dist  = 60 + Math.random()*100;
    const tx = Math.cos(angle*Math.PI/180)*dist;
    const ty = Math.sin(angle*Math.PI/180)*dist;
    spark.style.cssText = `
      left:50%;top:40%;
      background:${colors[Math.floor(Math.random()*colors.length)]};
      width:${4+Math.random()*5}px;
      height:${4+Math.random()*5}px;
      --tx:translate(${tx}px,${ty}px);
      animation-delay:${Math.random()*.4}s;
      animation-duration:${.7+Math.random()*.5}s;
    `;
    parent.appendChild(spark);
    setTimeout(()=>spark.remove(), 1400);
  }
}

/* ─── BACK BUTTON ─── */
document.getElementById('backBtn').addEventListener('click', () => {
  const overlay = document.getElementById('successOverlay');
  overlay.classList.remove('show');
  btn.classList.remove('loading');
  btn.disabled = false;
  form.reset();
  selectedRating = 0;
  starLabels.forEach(l=>l.classList.remove('lit'));
  cc.textContent = '0 / 500';
  cc.classList.remove('near');
});

/* ─── SHAKE KEYFRAME ─── */
const style = document.createElement('style');
style.textContent = '@keyframes shake{0%,100%{transform:translateX(0)}20%{transform:translateX(-8px)}40%{transform:translateX(8px)}60%{transform:translateX(-5px)}80%{transform:translateX(5px)}}';
document.head.appendChild(style);
</script>
</body>
</html>
