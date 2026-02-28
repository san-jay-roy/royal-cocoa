<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Royal Cocoa – Handcrafted Chocolates</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Lato:wght@300;400;700&family=Dancing+Script:wght@600&display=swap" rel="stylesheet"/>
<style>
:root{
  --db:#3e2723;--choco:#5d4037;--med:#795548;
  --cream:#fff8e1;--lcream:#fffde7;
  --gold:#d4a843;--gl:#f0c96a;--gd:#b8882a;
  --wa:#25D366;--txt:#1a0e00;--muted:#6d4c41;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Lato',sans-serif;background:#0d0500;color:var(--txt);overflow-x:hidden}
h1,h2,h3,h4,h5{font-family:'Playfair Display',serif}
::selection{background:var(--gold);color:var(--db)}
::-webkit-scrollbar{width:5px}
::-webkit-scrollbar-track{background:#0d0500}
::-webkit-scrollbar-thumb{background:linear-gradient(var(--gold),var(--gd));border-radius:4px}

/* CURSOR */
.cursor-dot{width:8px;height:8px;background:var(--gold);border-radius:50%;position:fixed;pointer-events:none;z-index:99999;transform:translate(-50%,-50%);mix-blend-mode:difference}
.cursor-ring{width:36px;height:36px;border:1.5px solid rgba(212,168,67,.6);border-radius:50%;position:fixed;pointer-events:none;z-index:99998;transform:translate(-50%,-50%);transition:all .15s ease}

/* LOADER */
#loader{position:fixed;inset:0;background:#0d0500;z-index:99997;display:flex;flex-direction:column;align-items:center;justify-content:center;transition:opacity .8s ease,visibility .8s}
#loader.hide{opacity:0;visibility:hidden}
.loader-logo{font-family:'Playfair Display',serif;font-size:2.6rem;color:var(--gold);letter-spacing:4px;animation:lPulse 1.5s ease infinite}
.loader-logo em{color:#fff;font-style:normal}
.loader-sub{font-family:'Dancing Script',cursive;color:rgba(212,168,67,.5);font-size:1rem;margin-top:4px;letter-spacing:2px}
.loader-bar-wrap{width:220px;height:2px;background:rgba(212,168,67,.15);border-radius:2px;margin-top:28px;overflow:hidden}
.loader-bar{height:100%;background:linear-gradient(90deg,var(--gold),var(--gl));border-radius:2px;animation:lFill 2.2s ease forwards}
.loader-pct{color:rgba(212,168,67,.6);font-size:.7rem;letter-spacing:3px;margin-top:12px}
@keyframes lPulse{0%,100%{opacity:1;text-shadow:0 0 20px rgba(212,168,67,.3)}50%{opacity:.6;text-shadow:0 0 40px rgba(212,168,67,.8)}}
@keyframes lFill{0%{width:0}100%{width:100%}}

/* PARTICLES */
#particleCanvas{position:fixed;inset:0;pointer-events:none;z-index:1;opacity:.5}

/* NAVBAR */
.navbar{background:transparent!important;border-bottom:1px solid transparent;transition:all .5s;padding:20px 0;z-index:1040}
.navbar.scrolled{background:rgba(6,2,0,.96)!important;backdrop-filter:blur(20px);border-bottom:1px solid rgba(212,168,67,.18);padding:10px 0;box-shadow:0 4px 40px rgba(0,0,0,.7)}
.navbar-brand{font-family:'Playfair Display',serif;font-size:1.6rem;font-weight:700;color:var(--gold)!important;letter-spacing:1px;position:relative}
.navbar-brand span{color:#fff;font-weight:300}
.navbar-brand small{display:block;font-family:'Dancing Script',cursive;font-size:.78rem;color:rgba(212,168,67,.5);font-weight:400;letter-spacing:1px;line-height:1}
.nav-link{color:rgba(255,248,225,.8)!important;font-size:.8rem;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px!important;position:relative;transition:color .3s}
.nav-link::after{content:'';position:absolute;bottom:4px;left:50%;width:0;height:1px;background:var(--gold);transition:all .4s;transform:translateX(-50%)}
.nav-link:hover{color:var(--gold)!important}
.nav-link:hover::after{width:55%}
.navbar-toggler{border-color:rgba(212,168,67,.4)}
.navbar-toggler-icon{background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28212,168,67,0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")}
.btn-nav{background:linear-gradient(135deg,var(--gold),var(--gl));color:var(--db)!important;font-weight:700;font-size:.76rem;letter-spacing:1.5px;text-transform:uppercase;padding:10px 22px!important;border-radius:50px;box-shadow:0 4px 20px rgba(212,168,67,.3);transition:all .3s!important}
.btn-nav:hover{transform:translateY(-2px);box-shadow:0 8px 30px rgba(212,168,67,.55)!important}
.btn-nav::after{display:none!important}

/* HERO SLIDER */
#hero{position:relative;height:100vh;overflow:hidden;z-index:2}
.slide{position:absolute;inset:0;display:flex;align-items:center;opacity:0;transition:opacity 1.4s ease;pointer-events:none}
.slide.active{opacity:1;pointer-events:auto}
.slide-1{background:linear-gradient(150deg,rgba(5,1,0,.93) 0%,rgba(40,18,8,.8) 50%,rgba(70,35,20,.65) 100%),url('https://images.unsplash.com/photo-1549007953-2f2dc0b24019?w=1920&q=90') center/cover no-repeat}
.slide-2{background:linear-gradient(150deg,rgba(5,1,0,.92) 0%,rgba(30,12,5,.82) 50%,rgba(55,28,12,.68) 100%),url('https://images.unsplash.com/photo-1511381939415-e44015466834?w=1920&q=90') center/cover no-repeat}
.slide-3{background:linear-gradient(150deg,rgba(8,3,0,.91) 0%,rgba(50,25,10,.79) 50%,rgba(80,45,25,.65) 100%),url('https://images.unsplash.com/photo-1606312619070-d48b4c652a52?w=1920&q=90') center/cover no-repeat}
.slide-1.active{animation:kb1 12s ease forwards}
.slide-2.active{animation:kb2 12s ease forwards}
.slide-3.active{animation:kb3 12s ease forwards}
@keyframes kb1{0%{background-size:115% auto}100%{background-size:100% auto}}
@keyframes kb2{0%{background-position:60% center;background-size:115% auto}100%{background-position:40% center;background-size:105% auto}}
@keyframes kb3{0%{background-size:110% auto;background-position:center 60%}100%{background-size:100% auto;background-position:center 40%}}
.slide::before{content:'';position:absolute;inset:0;background:repeating-linear-gradient(105deg,transparent 0%,transparent 45%,rgba(212,168,67,.03) 50%,transparent 55%,transparent 100%);background-size:400% 400%;animation:shimmer 10s linear infinite;z-index:1}
.slide::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at center,transparent 30%,rgba(0,0,0,.6) 100%);z-index:1}
@keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}
.slide-content{position:relative;z-index:5}
.slide .ey,.slide .st,.slide .ss,.slide .sc{opacity:0;transform:translateY(35px)}
.slide.active .ey{animation:sUp .9s cubic-bezier(.22,1,.36,1) .2s forwards}
.slide.active .st{animation:sUp 1s cubic-bezier(.22,1,.36,1) .45s forwards}
.slide.active .ss{animation:sUp .9s cubic-bezier(.22,1,.36,1) .75s forwards}
.slide.active .sc{animation:sUp .9s cubic-bezier(.22,1,.36,1) 1s forwards}
@keyframes sUp{to{opacity:1;transform:translateY(0)}}
.ey{display:inline-flex;align-items:center;gap:10px;color:var(--gold);font-size:.7rem;letter-spacing:5px;text-transform:uppercase;border:1px solid rgba(212,168,67,.35);padding:7px 20px;border-radius:50px;margin-bottom:1.6rem;background:rgba(212,168,67,.06)}
.ey::before,.ey::after{content:'✦';font-size:.55rem;opacity:.7}
.st{font-size:clamp(3rem,7vw,5.5rem);color:#fff;line-height:1.1;text-shadow:0 4px 30px rgba(0,0,0,.6)}
.st .ac{background:linear-gradient(135deg,var(--gold),var(--gl),var(--gd));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;filter:drop-shadow(0 0 20px rgba(212,168,67,.4));font-style:italic}
.ss{font-size:1.05rem;color:rgba(255,248,225,.75);max-width:560px;margin-top:1.1rem;font-weight:300;line-height:1.8}
.sc{margin-top:2rem}
.slide-num{position:absolute;right:48px;bottom:130px;z-index:10;font-family:'Playfair Display',serif;color:rgba(212,168,67,.25);font-size:5.5rem;font-weight:700;line-height:1;user-select:none;transition:color .5s}
.slide-progress{position:absolute;bottom:0;left:0;height:3px;background:linear-gradient(90deg,var(--gold),var(--gl));z-index:10;width:0;transition:width linear}
.s-arrow{position:absolute;top:50%;transform:translateY(-50%);z-index:10;width:52px;height:52px;border-radius:50%;background:rgba(212,168,67,.1);border:1px solid rgba(212,168,67,.35);color:var(--gold);font-size:1.2rem;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .35s;backdrop-filter:blur(8px)}
.s-arrow:hover{background:var(--gold);color:var(--db);transform:translateY(-50%) scale(1.1);box-shadow:0 0 30px rgba(212,168,67,.5)}
.s-prev{left:28px}.s-next{right:28px}
.s-dots{position:absolute;bottom:52px;left:50%;transform:translateX(-50%);z-index:10;display:flex;gap:8px;align-items:center}
.s-dot{width:6px;height:6px;border-radius:50%;background:rgba(255,248,225,.25);border:1px solid rgba(212,168,67,.3);cursor:pointer;transition:all .4s}
.s-dot.active{background:var(--gold);width:30px;border-radius:3px;box-shadow:0 0 12px rgba(212,168,67,.5)}
.scroll-ind{position:absolute;bottom:36px;right:44px;z-index:10;display:flex;flex-direction:column;align-items:center;gap:6px}
.scroll-ind p{font-size:.56rem;letter-spacing:4px;text-transform:uppercase;color:rgba(212,168,67,.5);writing-mode:vertical-rl}
.scroll-ind span{width:1px;height:48px;background:linear-gradient(to bottom,transparent,var(--gold));animation:sdrop 2s ease infinite}
@keyframes sdrop{0%{transform:scaleY(0);transform-origin:top}50%{transform:scaleY(1);transform-origin:top}51%{transform:scaleY(1);transform-origin:bottom}100%{transform:scaleY(0);transform-origin:bottom}}

/* BUTTONS */
.btn-gold{background:linear-gradient(135deg,var(--gold),var(--gl));color:var(--db);font-weight:700;font-size:.84rem;letter-spacing:1.5px;text-transform:uppercase;padding:14px 36px;border-radius:50px;border:none;box-shadow:0 6px 28px rgba(212,168,67,.4);transition:all .35s;text-decoration:none;display:inline-block;position:relative;overflow:hidden}
.btn-gold::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,var(--gl),#fff8b0);opacity:0;transition:opacity .35s}
.btn-gold:hover{transform:translateY(-4px) scale(1.03);box-shadow:0 14px 40px rgba(212,168,67,.6);color:var(--db)}
.btn-gold:hover::before{opacity:1}
.btn-gold span{position:relative;z-index:1}
.btn-ghost{border:1.5px solid rgba(255,248,225,.4);color:var(--cream);font-size:.84rem;letter-spacing:1.5px;text-transform:uppercase;padding:13px 34px;border-radius:50px;background:rgba(255,255,255,.04);transition:all .35s;text-decoration:none;display:inline-block;backdrop-filter:blur(4px)}
.btn-ghost:hover{background:rgba(255,248,225,.12);border-color:var(--cream);color:var(--cream);transform:translateY(-3px)}

/* TRUST STRIP */
.trust-strip{background:linear-gradient(90deg,var(--db) 0%,var(--choco) 50%,var(--db) 100%);padding:32px 0;position:relative;overflow:hidden;z-index:2}
.trust-strip::before{content:'';position:absolute;inset:0;background:repeating-linear-gradient(90deg,transparent 0,transparent 200px,rgba(212,168,67,.04) 200px,rgba(212,168,67,.04) 201px)}
.trust-stat{text-align:center;padding:0 16px}
.trust-stat .num{font-family:'Playfair Display',serif;font-size:2.4rem;font-weight:700;color:var(--gold);display:inline;line-height:1;filter:drop-shadow(0 0 10px rgba(212,168,67,.35))}
.trust-stat .lbl{font-size:.68rem;letter-spacing:3px;text-transform:uppercase;color:rgba(255,248,225,.55);margin-top:4px;display:block}
.trust-divider{width:1px;background:linear-gradient(to bottom,transparent,rgba(212,168,67,.4),transparent);height:50px}
.ticker-wrap{overflow:hidden;background:rgba(212,168,67,.06);border-top:1px solid rgba(212,168,67,.1);border-bottom:1px solid rgba(212,168,67,.1);padding:9px 0;margin-bottom:24px}
.ticker{display:inline-flex;gap:40px;white-space:nowrap;animation:tick 28s linear infinite}
@keyframes tick{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
.t-item{font-size:.68rem;letter-spacing:3px;text-transform:uppercase;color:rgba(212,168,67,.65);display:inline-flex;align-items:center;gap:12px}
.t-item::before{content:'✦';font-size:.5rem;color:var(--gold)}

/* FEAT MARQUEE */
.feat-band{background:rgba(212,168,67,.05);border-top:1px solid rgba(212,168,67,.1);border-bottom:1px solid rgba(212,168,67,.1);padding:16px 0;overflow:hidden;position:relative;z-index:2}
.feat-track{display:inline-flex;gap:50px;white-space:nowrap;animation:marq 32s linear infinite}
.feat-track:hover{animation-play-state:paused}
@keyframes marq{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
.f-item{display:inline-flex;align-items:center;gap:10px;color:rgba(255,248,225,.55);font-size:.76rem;letter-spacing:2px;text-transform:uppercase}
.f-item i{color:var(--gold)}

/* ABOUT */
#about{background:linear-gradient(160deg,#170700 0%,#280e05 40%,#170700 100%);padding:110px 0;position:relative;overflow:hidden;z-index:2}
.orb{position:absolute;border-radius:50%;pointer-events:none;background:radial-gradient(circle,rgba(212,168,67,.07) 0%,transparent 70%);animation:orbF 8s ease-in-out infinite}
@keyframes orbF{0%,100%{transform:translate(0,0)}50%{transform:translate(20px,-30px)}}
.about-img-wrap{position:relative;border-radius:24px;overflow:hidden;box-shadow:0 30px 80px rgba(0,0,0,.65),0 0 0 1px rgba(212,168,67,.12)}
.about-img-wrap::before{content:'';position:absolute;inset:-2px;border-radius:26px;background:linear-gradient(135deg,var(--gold),transparent,var(--gl),transparent,var(--gold));background-size:300% 300%;z-index:-1;animation:bSpin 4s linear infinite}
@keyframes bSpin{0%{background-position:0% 0%}100%{background-position:300% 300%}}
.about-img-wrap img{width:100%;height:520px;object-fit:cover;display:block;transition:transform 1s cubic-bezier(.22,1,.36,1);filter:brightness(.88) saturate(1.1)}
.about-img-wrap:hover img{transform:scale(1.05)}
.about-badge{position:absolute;bottom:28px;right:28px;background:linear-gradient(135deg,rgba(25,8,0,.96),rgba(55,25,8,.96));color:var(--gold);border-radius:18px;padding:20px 26px;box-shadow:0 12px 40px rgba(0,0,0,.5);text-align:center;border:1px solid rgba(212,168,67,.3);backdrop-filter:blur(12px);animation:bFloat 4s ease-in-out infinite}
@keyframes bFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
.about-badge .big{font-size:2.2rem;font-weight:700;display:block;line-height:1}
.about-badge .sm{font-size:.62rem;letter-spacing:2px;text-transform:uppercase;opacity:.7}
.float-chip{position:absolute;background:rgba(212,168,67,.1);border:1px solid rgba(212,168,67,.3);border-radius:50px;padding:7px 15px;font-size:.68rem;letter-spacing:.8px;color:var(--gold);backdrop-filter:blur(8px);animation:cFloat 5s ease-in-out infinite;white-space:nowrap;z-index:10}
.float-chip:nth-child(2){top:22px;left:-20px;animation-delay:0s}
.float-chip:nth-child(3){top:45%;left:-55px;animation-delay:1.5s}
.float-chip:nth-child(4){top:22px;right:-15px;animation-delay:.8s}
@keyframes cFloat{0%,100%{transform:translateY(0) rotate(-1deg)}50%{transform:translateY(-10px) rotate(1deg)}}
.s-ey{font-size:.68rem;letter-spacing:5px;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem}
.s-hl{font-size:clamp(2rem,4vw,2.9rem);color:#fff;line-height:1.2}
.s-hl em{color:var(--gold);font-style:italic}
.gold-bar{width:56px;height:3px;background:linear-gradient(90deg,var(--gold),var(--gl));border-radius:4px;margin:1.2rem 0 1.6rem}
.ap{color:rgba(255,248,225,.62);line-height:1.9;font-size:.98rem;margin-bottom:.9rem}
.feat-pills{display:flex;flex-wrap:wrap;gap:10px;margin-top:1.4rem}
.fp{display:flex;align-items:center;gap:8px;background:rgba(212,168,67,.07);border:1px solid rgba(212,168,67,.18);border-radius:50px;padding:8px 18px;font-size:.78rem;color:rgba(255,248,225,.75);font-weight:600;transition:all .35s;cursor:default}
.fp i{color:var(--gold)}
.fp:hover{background:rgba(212,168,67,.16);border-color:rgba(212,168,67,.45);transform:translateY(-2px);box-shadow:0 6px 18px rgba(212,168,67,.12)}
.tl-item{display:flex;gap:16px;margin-bottom:1.2rem;align-items:flex-start}
.tl-dot{width:38px;height:38px;min-width:38px;border-radius:50%;background:linear-gradient(135deg,var(--gold),var(--gl));display:flex;align-items:center;justify-content:center;color:var(--db);font-size:.78rem;font-weight:700;animation:dPulse 3s ease-in-out infinite}
@keyframes dPulse{0%,100%{box-shadow:0 0 0 4px rgba(212,168,67,.15)}50%{box-shadow:0 0 0 10px rgba(212,168,67,.04)}}
.tl-text h6{color:var(--gold);font-size:.78rem;letter-spacing:1px;margin-bottom:2px}
.tl-text p{color:rgba(255,248,225,.5);font-size:.83rem;line-height:1.5}

/* PRODUCTS */
#products{background:linear-gradient(180deg,#0d0500 0%,#150600 50%,#0d0500 100%);padding:110px 0;position:relative;z-index:2;overflow:hidden}
#products::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,rgba(212,168,67,.5),transparent)}
#products::after{content:'';position:absolute;bottom:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,rgba(212,168,67,.5),transparent)}
.prod-card{background:linear-gradient(160deg,rgba(255,248,225,.045) 0%,rgba(255,248,225,.01) 100%);border:1px solid rgba(212,168,67,.14);border-radius:22px;overflow:hidden;height:100%;transition:all .5s cubic-bezier(.22,1,.36,1);position:relative}
.prod-card::before{content:'';position:absolute;inset:0;border-radius:22px;background:linear-gradient(135deg,rgba(212,168,67,.1),transparent,rgba(212,168,67,.04));opacity:0;transition:opacity .4s}
.prod-card:hover{transform:translateY(-14px) scale(1.01);box-shadow:0 30px 70px rgba(0,0,0,.65),0 0 60px rgba(212,168,67,.1),0 0 0 1px rgba(212,168,67,.3);border-color:rgba(212,168,67,.38)}
.prod-card:hover::before{opacity:1}
.pc-img{position:relative;overflow:hidden;height:228px}
.pc-img img{width:100%;height:100%;object-fit:cover;transition:transform .8s cubic-bezier(.22,1,.36,1);filter:brightness(.86) saturate(1.2)}
.prod-card:hover .pc-img img{transform:scale(1.13)}
.pc-img::after{content:'';position:absolute;inset:0;background:linear-gradient(to top,rgba(8,3,0,.75) 0%,transparent 55%)}
.pc-tag{position:absolute;top:14px;left:14px;z-index:2;background:linear-gradient(135deg,var(--gold),var(--gl));color:var(--db);font-size:.6rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;padding:5px 14px;border-radius:50px;box-shadow:0 4px 14px rgba(212,168,67,.4)}
.pc-overlay{position:absolute;inset:0;z-index:3;background:rgba(8,3,0,.65);display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity .4s;backdrop-filter:blur(5px)}
.prod-card:hover .pc-overlay{opacity:1}
.pc-ob{background:linear-gradient(135deg,var(--gold),var(--gl));color:var(--db);font-weight:700;font-size:.76rem;letter-spacing:1px;padding:10px 22px;border-radius:50px;border:none;transform:scale(.8) translateY(12px);transition:all .4s cubic-bezier(.22,1,.36,1);text-decoration:none}
.prod-card:hover .pc-ob{transform:scale(1) translateY(0)}
.pc-body{padding:20px 22px 24px}
.pc-body h5{color:#fff;font-size:1.1rem;margin-bottom:.4rem}
.pc-body p{color:rgba(255,248,225,.52);font-size:.84rem;line-height:1.65;margin-bottom:1rem}
.pc-price{font-family:'Playfair Display',serif;font-size:1.45rem;background:linear-gradient(135deg,var(--gold),var(--gl));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;font-weight:700;display:block;margin-bottom:1.2rem}
.pc-price sub{font-size:.74rem;-webkit-text-fill-color:rgba(255,248,225,.4);font-family:'Lato',sans-serif;font-weight:400}
.stars{display:flex;gap:2px;margin-bottom:.5rem}
.stars i{color:var(--gold);font-size:.68rem}
.btn-wa{display:flex;align-items:center;justify-content:center;gap:8px;background:linear-gradient(135deg,#25D366,#128C7E);color:#fff;font-size:.76rem;font-weight:700;letter-spacing:1px;text-transform:uppercase;padding:11px 20px;border-radius:50px;text-decoration:none;transition:all .35s;box-shadow:0 4px 18px rgba(37,211,102,.22);width:100%;position:relative;overflow:hidden}
.btn-wa::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,#2deb6f,#15967c);opacity:0;transition:opacity .35s}
.btn-wa:hover{transform:translateY(-3px);box-shadow:0 10px 30px rgba(37,211,102,.45);color:#fff}
.btn-wa:hover::before{opacity:1}
.btn-wa span,.btn-wa i{position:relative;z-index:1}

/* TESTIMONIALS */
#testimonials{background:linear-gradient(160deg,#170800 0%,#280e05 50%,#170800 100%);padding:100px 0;position:relative;z-index:2;overflow:hidden}
.testi-card{background:linear-gradient(135deg,rgba(255,248,225,.04),rgba(255,248,225,.01));border:1px solid rgba(212,168,67,.14);border-radius:20px;padding:30px 26px;height:100%;position:relative;overflow:hidden;transition:all .4s}
.testi-card::before{content:'❝';position:absolute;top:-15px;left:18px;font-size:7rem;color:rgba(212,168,67,.05);font-family:serif;line-height:1}
.testi-card:hover{transform:translateY(-8px);border-color:rgba(212,168,67,.35);box-shadow:0 20px 50px rgba(0,0,0,.45),0 0 30px rgba(212,168,67,.07)}
.testi-text{color:rgba(255,248,225,.68);font-size:.93rem;line-height:1.8;margin-bottom:1.4rem;position:relative;z-index:1}
.testi-author{display:flex;align-items:center;gap:12px}
.t-avatar{width:44px;height:44px;min-width:44px;border-radius:50%;background:linear-gradient(135deg,var(--gold),var(--gl));display:flex;align-items:center;justify-content:center;color:var(--db);font-weight:700;font-size:1.1rem;font-family:'Playfair Display',serif}
.t-info h6{color:#fff;font-size:.88rem;margin-bottom:1px}
.t-info p{color:rgba(255,248,225,.4);font-size:.73rem}

/* CTA BANNER */
.cta-banner{background:linear-gradient(135deg,var(--db) 0%,#4a2010 50%,var(--db) 100%);padding:80px 0;position:relative;overflow:hidden;z-index:2}
.cta-banner::before{content:'';position:absolute;inset:0;background:url('https://images.unsplash.com/photo-1481391319762-47dff72954d9?w=1200&q=50') center/cover;opacity:.07}
.cta-content{position:relative;z-index:2;text-align:center}
.cta-content h2{color:#fff;font-size:clamp(2rem,4vw,3rem);margin-bottom:1rem}
.cta-content h2 em{color:var(--gold);font-style:italic}
.cta-content p{color:rgba(255,248,225,.68);max-width:480px;margin:0 auto 2rem;font-size:1rem;line-height:1.75}

/* FLOATING WA */
.wa-fab{position:fixed;bottom:30px;right:30px;z-index:9999}
.wa-fab a{display:flex;align-items:center;justify-content:center;width:62px;height:62px;background:var(--wa);border-radius:50%;color:#fff;font-size:1.8rem;text-decoration:none;box-shadow:0 8px 30px rgba(37,211,102,.5);transition:transform .35s;position:relative}
.wa-fab a:hover{transform:scale(1.12) rotate(6deg)}
.wa-fab a::before,.wa-fab a::after{content:'';position:absolute;border-radius:50%;border:2px solid var(--wa);animation:waP 2.5s ease-out infinite}
.wa-fab a::after{animation-delay:1.2s}
@keyframes waP{0%{width:62px;height:62px;opacity:.8}100%{width:120px;height:120px;opacity:0}}
.wa-tip{position:absolute;right:76px;top:50%;transform:translateY(-50%);background:var(--db);color:var(--cream);font-size:.73rem;font-weight:700;white-space:nowrap;padding:7px 16px;border-radius:8px;opacity:0;pointer-events:none;transition:opacity .3s;border:1px solid rgba(212,168,67,.3)}
.wa-tip::after{content:'';position:absolute;right:-6px;top:50%;transform:translateY(-50%);border:5px solid transparent;border-left-color:var(--db)}
.wa-fab:hover .wa-tip{opacity:1}

/* FOOTER */
footer{background:#060200;color:rgba(255,248,225,.62);padding:80px 0 30px;border-top:1px solid rgba(212,168,67,.1);position:relative;z-index:2}
footer::before{content:'';position:absolute;top:0;left:50%;transform:translateX(-50%);width:300px;height:1px;background:linear-gradient(90deg,transparent,var(--gold),transparent)}
.ft-brand{font-family:'Playfair Display',serif;font-size:1.8rem;color:var(--gold);display:block;margin-bottom:.2rem}
.ft-tag{font-family:'Dancing Script',cursive;color:rgba(212,168,67,.5);font-size:.95rem;display:block;margin-bottom:1rem}
footer p{font-size:.86rem;line-height:1.8}
footer h6{color:var(--gold);font-family:'Playfair Display',serif;margin-bottom:1.2rem;font-size:.92rem}
footer ul{list-style:none;padding:0}
footer ul li{margin-bottom:.5rem}
footer ul li a{color:rgba(255,248,225,.5);text-decoration:none;font-size:.84rem;transition:all .3s;display:inline-flex;align-items:center;gap:6px}
footer ul li a::before{content:'→';font-size:.65rem;opacity:0;transform:translateX(-6px);transition:all .3s}
footer ul li a:hover{color:var(--gold);padding-left:4px}
footer ul li a:hover::before{opacity:1;transform:translateX(0)}
.ci{display:flex;align-items:flex-start;gap:10px;color:rgba(255,248,225,.5);font-size:.84rem;margin-bottom:.65rem}
.ci i{color:var(--gold);margin-top:3px}
.socials{display:flex;gap:10px;margin-top:1.2rem}
.socials a{width:40px;height:40px;border:1px solid rgba(212,168,67,.22);border-radius:50%;display:flex;align-items:center;justify-content:center;color:rgba(255,248,225,.55);text-decoration:none;transition:all .35s}
.socials a:hover{background:var(--gold);border-color:var(--gold);color:var(--db);transform:translateY(-4px) rotate(6deg);box-shadow:0 8px 20px rgba(212,168,67,.3)}
.ft-div{border-color:rgba(212,168,67,.07);margin:2.5rem 0 1.5rem}
.ft-copy{font-size:.76rem;color:rgba(255,248,225,.32)}

/* REVEAL */
.rv{opacity:0;transform:translateY(50px);transition:opacity .9s cubic-bezier(.22,1,.36,1),transform .9s cubic-bezier(.22,1,.36,1)}
.rv.show{opacity:1;transform:translateY(0)}
.rv-l{opacity:0;transform:translateX(-60px);transition:opacity .9s cubic-bezier(.22,1,.36,1),transform .9s cubic-bezier(.22,1,.36,1)}
.rv-l.show{opacity:1;transform:translateX(0)}
.rv-r{opacity:0;transform:translateX(60px);transition:opacity .9s cubic-bezier(.22,1,.36,1),transform .9s cubic-bezier(.22,1,.36,1)}
.rv-r.show{opacity:1;transform:translateX(0)}
.d1{transition-delay:.1s!important}.d2{transition-delay:.22s!important}.d3{transition-delay:.36s!important}.d4{transition-delay:.5s!important}.d5{transition-delay:.65s!important}

@media(max-width:991px){.about-img-wrap img{height:360px}.float-chip{display:none}.slide-num,.scroll-ind{display:none}.s-prev{left:10px}.s-next{right:10px}}
@media(max-width:767px){.sc{flex-direction:column}.trust-divider{display:none}}
</style>
</head>
<body>

<!-- CURSOR -->
<div class="cursor-dot" id="curDot"></div>
<div class="cursor-ring" id="curRing"></div>

<!-- LOADER -->
<div id="loader">
  <div class="loader-logo">Royal <em>Cocoa</em></div>
  <div class="loader-sub">Handcrafted with Love</div>
  <div class="loader-bar-wrap"><div class="loader-bar"></div></div>
  <div class="loader-pct" id="loaderPct">0%</div>
</div>

<!-- PARTICLES -->
<canvas id="particleCanvas"></canvas>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="#hero">Royal <span>Cocoa</span><small>Handcrafted Chocolates</small></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navMenu">
      <ul class="navbar-nav align-items-center gap-1">
        <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="#testimonials">Reviews</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item ms-2">
          <a class="nav-link btn-nav" href="https://wa.me/919999999999?text=Hi Royal Cocoa, I want to order!" target="_blank">
            <i class="bi bi-whatsapp me-1"></i> Order Now
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO SLIDER -->
<section id="hero">
  <div class="slide slide-1 active">
    <div class="container">
      <div class="col-xl-7 col-lg-9 slide-content">
        <div class="ey">Artisan Chocolatiers Since 2012</div>
        <h1 class="st">The Art of<br/><span class="ac">Pure Chocolate</span><br/>Perfection</h1>
        <p class="ss">Every bite tells a story of passion, precision, and premium single-origin cacao. Handcrafted in small batches — made to be savoured.</p>
        <div class="sc d-flex flex-wrap gap-3">
          <a href="#products" class="btn-gold"><span>Explore Collection</span></a>
          <a href="#about" class="btn-ghost">Our Story</a>
        </div>
      </div>
    </div>
  </div>

  <div class="slide slide-2">
    <div class="container">
      <div class="col-xl-7 col-lg-9 slide-content">
        <div class="ey">Premium Gifting Experience</div>
        <h1 class="st">Give the Gift<br/>of <span class="ac">Luxury</span><br/>&amp; Sweetness</h1>
        <p class="ss">Bespoke gift hampers and custom chocolate boxes crafted for weddings, festivals, and corporate celebrations. Make every occasion unforgettable.</p>
        <div class="sc d-flex flex-wrap gap-3">
          <a href="#products" class="btn-gold"><span>Shop Gift Boxes</span></a>
          <a href="https://wa.me/919999999999?text=Hi, I need a custom gift hamper" target="_blank" class="btn-ghost">Custom Order</a>
        </div>
      </div>
    </div>
  </div>

  <div class="slide slide-3">
    <div class="container">
      <div class="col-xl-7 col-lg-9 slide-content">
        <div class="ey">Single-Origin Cacao Farms</div>
        <h1 class="st">Sourced from<br/><span class="ac">World's Finest</span><br/>Cacao Farms</h1>
        <p class="ss">From the highlands of Ecuador to the coasts of Kerala — we trace every bean so you taste the difference. Chocolate with a conscience and a story.</p>
        <div class="sc d-flex flex-wrap gap-3">
          <a href="#about" class="btn-gold"><span>Our Journey</span></a>
          <a href="#products" class="btn-ghost">View Products</a>
        </div>
      </div>
    </div>
  </div>

  <div class="slide-num" id="slideNum">01</div>
  <div class="slide-progress" id="slideProgress"></div>
  <button class="s-arrow s-prev" id="sPrev"><i class="bi bi-chevron-left"></i></button>
  <button class="s-arrow s-next" id="sNext"><i class="bi bi-chevron-right"></i></button>
  <div class="s-dots">
    <div class="s-dot active" data-i="0"></div>
    <div class="s-dot" data-i="1"></div>
    <div class="s-dot" data-i="2"></div>
  </div>
  <div class="scroll-ind"><p>Scroll</p><span></span></div>
</section>

<!-- TRUST STRIP -->
<div class="trust-strip">
  <div class="ticker-wrap">
    <div class="ticker">
      <span class="t-item">Handcrafted Daily</span><span class="t-item">Single-Origin Cacao</span><span class="t-item">No Artificial Flavours</span><span class="t-item">48,000+ Happy Customers</span><span class="t-item">Premium Gift Packaging</span><span class="t-item">Corporate Orders Welcome</span><span class="t-item">Pan-India Delivery</span><span class="t-item">12 Years of Craft</span>
      <span class="t-item">Handcrafted Daily</span><span class="t-item">Single-Origin Cacao</span><span class="t-item">No Artificial Flavours</span><span class="t-item">48,000+ Happy Customers</span><span class="t-item">Premium Gift Packaging</span><span class="t-item">Corporate Orders Welcome</span><span class="t-item">Pan-India Delivery</span><span class="t-item">12 Years of Craft</span>
    </div>
  </div>
  <div class="container">
    <div class="row align-items-center justify-content-center g-0">
      <div class="col-6 col-md-auto"><div class="trust-stat rv"><span class="num" data-target="12">0</span><span class="num">+</span><span class="lbl">Years Crafting</span></div></div>
      <div class="col-auto d-none d-md-block trust-divider mx-4"></div>
      <div class="col-6 col-md-auto"><div class="trust-stat rv d1"><span class="num" data-target="48">0</span><span class="num">K+</span><span class="lbl">Happy Customers</span></div></div>
      <div class="col-auto d-none d-md-block trust-divider mx-4"></div>
      <div class="col-6 col-md-auto"><div class="trust-stat rv d2"><span class="num" data-target="30">0</span><span class="num">+</span><span class="lbl">Flavours</span></div></div>
      <div class="col-auto d-none d-md-block trust-divider mx-4"></div>
      <div class="col-6 col-md-auto"><div class="trust-stat rv d3"><span class="num" data-target="100">0</span><span class="num">%</span><span class="lbl">Natural</span></div></div>
    </div>
  </div>
</div>

<!-- FEAT BAND -->
<div class="feat-band">
  <div class="feat-track">
    <span class="f-item"><i class="bi bi-leaf-fill"></i>Ethically Sourced Cacao</span>
    <span class="f-item"><i class="bi bi-heart-fill"></i>Made with Love Daily</span>
    <span class="f-item"><i class="bi bi-award-fill"></i>Award Winning Recipes</span>
    <span class="f-item"><i class="bi bi-gift-fill"></i>Custom Gift Hampers</span>
    <span class="f-item"><i class="bi bi-truck"></i>Pan-India Delivery</span>
    <span class="f-item"><i class="bi bi-star-fill"></i>4.9 Star Rated</span>
    <span class="f-item"><i class="bi bi-patch-check-fill"></i>FSSAI Certified</span>
    <span class="f-item"><i class="bi bi-building"></i>Corporate Orders</span>
    <span class="f-item"><i class="bi bi-leaf-fill"></i>Ethically Sourced Cacao</span>
    <span class="f-item"><i class="bi bi-heart-fill"></i>Made with Love Daily</span>
    <span class="f-item"><i class="bi bi-award-fill"></i>Award Winning Recipes</span>
    <span class="f-item"><i class="bi bi-gift-fill"></i>Custom Gift Hampers</span>
    <span class="f-item"><i class="bi bi-truck"></i>Pan-India Delivery</span>
    <span class="f-item"><i class="bi bi-star-fill"></i>4.9 Star Rated</span>
    <span class="f-item"><i class="bi bi-patch-check-fill"></i>FSSAI Certified</span>
    <span class="f-item"><i class="bi bi-building"></i>Corporate Orders</span>
  </div>
</div>

<!-- ABOUT -->
<section id="about">
  <div class="orb" style="width:600px;height:600px;top:-120px;right:-160px"></div>
  <div class="orb" style="width:380px;height:380px;bottom:-80px;left:-80px;animation-delay:2s"></div>
  <div class="container position-relative">
    <div class="row align-items-center g-5">
      <div class="col-lg-5 rv-l">
        <div class="about-img-wrap">
          <div class="float-chip"><i class="bi bi-star-fill me-1"></i>Est. 2012</div>
          <div class="float-chip"><i class="bi bi-leaf-fill me-1"></i>100% Natural</div>
          <div class="float-chip"><i class="bi bi-award-fill me-1"></i>Award Winning</div>
          <img src="https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=800&q=85" alt="Handcrafting chocolates" onerror="this.src='https://images.unsplash.com/photo-1481391319762-47dff72954d9?w=800&q=85'"/>
          <div class="about-badge">
            <span class="big">A+</span>
            <span class="sm">Quality Grade</span>
          </div>
        </div>
      </div>
      <div class="col-lg-7 rv-r">
        <p class="s-ey">Our Story</p>
        <h2 class="s-hl">Born from a Passion<br/>for <em>Perfect Chocolate</em></h2>
        <div class="gold-bar"></div>
        <p class="ap">Royal Cocoa began in a small kitchen with a simple belief — that chocolate, made with love and the finest ingredients, can transform any moment into something extraordinary. Twelve years later, that belief guides every batch we craft.</p>
        <p class="ap">We source ethically grown, single-origin cacao from the finest farms across Ivory Coast, Ecuador, and Kerala. Each piece is tempered by hand, designed to delight, and delivered with care.</p>
        <div style="margin-top:1.8rem">
          <div class="tl-item rv d1">
            <div class="tl-dot">12</div>
            <div class="tl-text"><h6>Founded in Mumbai, 2012</h6><p>Started in a home kitchen with a single tempering machine and a dream.</p></div>
          </div>
          <div class="tl-item rv d2">
            <div class="tl-dot"><i class="bi bi-globe2" style="font-size:.75rem"></i></div>
            <div class="tl-text"><h6>Global Sourcing Partners</h6><p>Direct farm relationships in Ecuador, Ivory Coast, and Kerala for traceable cacao.</p></div>
          </div>
          <div class="tl-item rv d3">
            <div class="tl-dot"><i class="bi bi-award" style="font-size:.75rem"></i></div>
            <div class="tl-text"><h6>Award-Winning Range, 2022</h6><p>Recognised by the Indian Artisan Food Awards for best handcrafted chocolate.</p></div>
          </div>
        </div>
        <div class="feat-pills">
          <div class="fp rv d1"><i class="bi bi-leaf"></i>Ethically Sourced</div>
          <div class="fp rv d2"><i class="bi bi-heart"></i>Handcrafted Daily</div>
          <div class="fp rv d3"><i class="bi bi-patch-check"></i>No Artificial Flavours</div>
          <div class="fp rv d4"><i class="bi bi-gift"></i>Custom Gift Boxes</div>
        </div>
        <a href="#products" class="btn-gold mt-4 d-inline-block"><span>View Our Collection</span></a>
      </div>
    </div>
  </div>
</section>

<!-- PRODUCTS -->
<section id="products">
  <div class="orb" style="width:700px;height:700px;top:0;right:-220px;opacity:.5"></div>
  <div class="orb" style="width:450px;height:450px;bottom:80px;left:-120px;animation-delay:3s;opacity:.45"></div>
  <div class="container position-relative">
    <div class="text-center mb-5 rv">
      <p class="s-ey">Our Collection</p>
      <h2 class="s-hl text-center" style="color:#fff">Signature <em>Chocolates</em></h2>
      <div class="gold-bar mx-auto"></div>
      <p style="color:rgba(255,248,225,.52);max-width:520px;margin:0 auto;font-size:.94rem;line-height:1.8">Each piece is a small work of art — crafted to melt perfectly, taste exquisite, and leave you wanting just one more.</p>
    </div>
    <div class="row g-4">

      <div class="col-md-6 col-lg-4 rv d1">
        <div class="prod-card">
          <div class="pc-img">
            <img src="https://images.unsplash.com/photo-1481391319762-47dff72954d9?w=700&q=85" alt="Dark Truffle Collection"/>
            <span class="pc-tag">Best Seller</span>
            <div class="pc-overlay"><a href="https://wa.me/919999999999?text=Hi, I want to order Dark Truffle Collection" target="_blank" class="pc-ob"><i class="bi bi-whatsapp me-1"></i>Enquire Now</a></div>
          </div>
          <div class="pc-body">
            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
            <h5>Dark Truffle Collection</h5>
            <p>Velvety 72% dark chocolate truffles dusted with Dutch cocoa. Bittersweet, bold, and irresistible.</p>
            <span class="pc-price">₹ 899 <sub>/ box of 12</sub></span>
            <a href="https://wa.me/919999999999?text=Hi, I want to order Dark Truffle Collection" target="_blank" class="btn-wa"><i class="bi bi-whatsapp"></i><span>Enquire on WhatsApp</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 rv d2">
        <div class="prod-card">
          <div class="pc-img">
            <img src="https://images.unsplash.com/photo-1606312619070-d48b4c652a52?w=700&q=85" alt="Rose Pistachio Praline"/>
            <span class="pc-tag">New Arrival</span>
            <div class="pc-overlay"><a href="https://wa.me/919999999999?text=Hi, I want to order Rose %26 Pistachio Praline" target="_blank" class="pc-ob"><i class="bi bi-whatsapp me-1"></i>Enquire Now</a></div>
          </div>
          <div class="pc-body">
            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
            <h5>Rose &amp; Pistachio Praline</h5>
            <p>Silky milk chocolate shells filled with crushed pistachio and dried rose petals. Delicate &amp; floral.</p>
            <span class="pc-price">₹ 1,099 <sub>/ box of 12</sub></span>
            <a href="https://wa.me/919999999999?text=Hi, I want to order Rose %26 Pistachio Praline" target="_blank" class="btn-wa"><i class="bi bi-whatsapp"></i><span>Enquire on WhatsApp</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 rv d3">
        <div class="prod-card">
          <div class="pc-img">
            <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?w=700&q=85" alt="Salted Caramel Bonbons"/>
            <span class="pc-tag">Fan Favourite</span>
            <div class="pc-overlay"><a href="https://wa.me/919999999999?text=Hi, I want to order Salted Caramel Bonbons" target="_blank" class="pc-ob"><i class="bi bi-whatsapp me-1"></i>Enquire Now</a></div>
          </div>
          <div class="pc-body">
            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
            <h5>Salted Caramel Bonbons</h5>
            <p>Handpoured caramel centres in luscious 60% chocolate, finished with Himalayan sea salt crystals.</p>
            <span class="pc-price">₹ 999 <sub>/ box of 12</sub></span>
            <a href="https://wa.me/919999999999?text=Hi, I want to order Salted Caramel Bonbons" target="_blank" class="btn-wa"><i class="bi bi-whatsapp"></i><span>Enquire on WhatsApp</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 rv d1">
        <div class="prod-card">
          <div class="pc-img">
            <img src="https://images.unsplash.com/photo-1548907040-4baa42d10919?w=700&q=85" alt="White Chocolate Berry Bark"/>
            <div class="pc-overlay"><a href="https://wa.me/919999999999?text=Hi, I want to order White Chocolate Berry Bark" target="_blank" class="pc-ob"><i class="bi bi-whatsapp me-1"></i>Enquire Now</a></div>
          </div>
          <div class="pc-body">
            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i></div>
            <h5>White Chocolate Berry Bark</h5>
            <p>Creamy Belgian white chocolate topped with freeze-dried strawberries, blueberries, and almonds.</p>
            <span class="pc-price">₹ 749 <sub>/ 200g slab</sub></span>
            <a href="https://wa.me/919999999999?text=Hi, I want to order White Chocolate Berry Bark" target="_blank" class="btn-wa"><i class="bi bi-whatsapp"></i><span>Enquire on WhatsApp</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 rv d2">
        <div class="prod-card">
          <div class="pc-img">
            <img src="https://images.unsplash.com/photo-1511381939415-e44015466834?w=700&q=85" alt="Hazelnut Rocher Bonbons"/>
            <span class="pc-tag">Premium</span>
            <div class="pc-overlay"><a href="https://wa.me/919999999999?text=Hi, I want to order Hazelnut Rocher Bonbons" target="_blank" class="pc-ob"><i class="bi bi-whatsapp me-1"></i>Enquire Now</a></div>
          </div>
          <div class="pc-body">
            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
            <h5>Hazelnut Rocher Bonbons</h5>
            <p>Whole roasted hazelnuts at the heart of each bonbon, wrapped in gianduja and gold-dusted dark shells.</p>
            <span class="pc-price">₹ 1,299 <sub>/ box of 12</sub></span>
            <a href="https://wa.me/919999999999?text=Hi, I want to order Hazelnut Rocher Bonbons" target="_blank" class="btn-wa"><i class="bi bi-whatsapp"></i><span>Enquire on WhatsApp</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 rv d3">
        <div class="prod-card">
          <div class="pc-img">
            <img src="https://images.unsplash.com/photo-1611270629569-8b357cb88da9?w=700&q=85" alt="Royal Luxury Gift Hamper"/>
            <span class="pc-tag">Gift Ready</span>
            <div class="pc-overlay"><a href="https://wa.me/919999999999?text=Hi, I want to order Royal Luxury Gift Hamper" target="_blank" class="pc-ob"><i class="bi bi-whatsapp me-1"></i>Enquire Now</a></div>
          </div>
          <div class="pc-body">
            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
            <h5>Royal Luxury Gift Hamper</h5>
            <p>A curated selection of our most loved chocolates in a handcrafted wooden box — perfect for every occasion.</p>
            <span class="pc-price">₹ 2,499 <sub>/ hamper</sub></span>
            <a href="https://wa.me/919999999999?text=Hi, I want to order Royal Luxury Gift Hamper" target="_blank" class="btn-wa"><i class="bi bi-whatsapp"></i><span>Enquire on WhatsApp</span></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section id="testimonials">
  <div class="orb" style="width:500px;height:500px;top:-50px;left:-100px;opacity:.6"></div>
  <div class="container position-relative">
    <div class="text-center mb-5 rv">
      <p class="s-ey">What Customers Say</p>
      <h2 class="s-hl" style="color:#fff">Loved by <em>Thousands</em></h2>
      <div class="gold-bar mx-auto"></div>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4 rv d1">
        <div class="testi-card">
          <div class="stars mb-3"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
          <p class="testi-text">"Ordered the Dark Truffle Collection for our anniversary and it was absolutely divine. The packaging was exquisite and the chocolates melted like a dream. Will definitely order again!"</p>
          <div class="testi-author"><div class="t-avatar">P</div><div class="t-info"><h6>Priya Sharma</h6><p>Mumbai · Verified Buyer</p></div></div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 rv d2">
        <div class="testi-card">
          <div class="stars mb-3"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
          <p class="testi-text">"We gifted Royal Cocoa hampers to 200 employees this Diwali. The response was phenomenal — people were asking where we got them! Corporate customization was completely seamless."</p>
          <div class="testi-author"><div class="t-avatar">R</div><div class="t-info"><h6>Rahul Mehta</h6><p>Delhi · Corporate Client</p></div></div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 rv d3">
        <div class="testi-card">
          <div class="stars mb-3"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
          <p class="testi-text">"The Salted Caramel Bonbons are genuinely the best chocolate I've had in India. You can taste the quality of ingredients. Royal Cocoa is in a league of their own — worth every rupee."</p>
          <div class="testi-author"><div class="t-avatar">A</div><div class="t-info"><h6>Ananya Iyer</h6><p>Bengaluru · Food Blogger</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA BANNER -->
<div class="cta-banner">
  <div class="container">
    <div class="cta-content rv">
      <h2>Ready to <em>Indulge?</em></h2>
      <p>Chat with us on WhatsApp for custom orders, corporate gifting, and same-day delivery in Mumbai.</p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="https://wa.me/919999999999?text=Hi Royal Cocoa, I want to place an order!" target="_blank" class="btn-gold"><span><i class="bi bi-whatsapp me-2"></i>Order on WhatsApp</span></a>
        <a href="#products" class="btn-ghost">Browse Collection</a>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer id="contact">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4 rv">
        <span class="ft-brand">Royal Cocoa</span>
        <span class="ft-tag">Handcrafted with Love since 2012</span>
        <p>Premium handcrafted chocolates made with passion, single-origin cacao, and zero compromises. Every piece is a promise of pure indulgence.</p>
        <div class="socials">
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-pinterest"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
          <a href="https://wa.me/919999999999" target="_blank"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>
      <div class="col-6 col-lg-2 rv d1">
        <h6>Quick Links</h6>
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#products">Products</a></li>
          <li><a href="#testimonials">Reviews</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 rv d2">
        <h6>Collections</h6>
        <ul>
          <li><a href="#">Dark Chocolates</a></li>
          <li><a href="#">Milk Chocolates</a></li>
          <li><a href="#">White Chocolates</a></li>
          <li><a href="#">Seasonal Editions</a></li>
          <li><a href="#">Gift Hampers</a></li>
          <li><a href="#">Corporate Orders</a></li>
        </ul>
      </div>
      <div class="col-lg-4 rv d3">
        <h6>Get In Touch</h6>
        <div class="ci"><i class="bi bi-geo-alt-fill"></i><span>12, Cacao Lane, Bandra West,<br/>Mumbai – 400050, Maharashtra</span></div>
        <div class="ci"><i class="bi bi-telephone-fill"></i><span>+91 99999 99999</span></div>
        <div class="ci"><i class="bi bi-envelope-fill"></i><span>hello@royalcocoa.in</span></div>
        <div class="ci"><i class="bi bi-clock-fill"></i><span>Mon – Sat: 10:00 AM – 7:00 PM</span></div>
        <div class="ci"><i class="bi bi-whatsapp"></i><span>WhatsApp orders: 24/7</span></div>
      </div>
    </div>
    <hr class="ft-div"/>
    <div class="d-flex flex-wrap justify-content-between align-items-center ft-copy">
      <p class="mb-0">© 2024 Royal Cocoa – Handcrafted Chocolates. All rights reserved.</p>
      <p class="mb-0">Made with <span style="color:var(--gold)">♥</span> &amp; finest cacao · Mumbai, India</p>
    </div>
  </div>
</footer>

<!-- FLOATING WHATSAPP -->
<div class="wa-fab">
  <span class="wa-tip">Chat with Us!</span>
  <a href="https://wa.me/919999999999?text=Hi Royal Cocoa!" target="_blank" aria-label="WhatsApp">
    <i class="bi bi-whatsapp"></i>
  </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
/* LOADER */
let pct=0;
const lpct=document.getElementById('loaderPct'),ldr=document.getElementById('loader');
const li=setInterval(()=>{pct+=Math.random()*18;if(pct>=100){pct=100;clearInterval(li);}lpct.textContent=Math.floor(pct)+'%';},120);
window.addEventListener('load',()=>{setTimeout(()=>ldr.classList.add('hide'),2200);});

/* CUSTOM CURSOR */
const dot=document.getElementById('curDot'),ring=document.getElementById('curRing');
let mx=0,my=0,rx=0,ry=0;
document.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY;});
(function ac(){rx+=(mx-rx)*.12;ry+=(my-ry)*.12;dot.style.left=mx+'px';dot.style.top=my+'px';ring.style.left=rx+'px';ring.style.top=ry+'px';requestAnimationFrame(ac);})();
document.querySelectorAll('a,button').forEach(el=>{
  el.addEventListener('mouseenter',()=>{ring.style.width='56px';ring.style.height='56px';ring.style.borderColor='rgba(212,168,67,.9)';});
  el.addEventListener('mouseleave',()=>{ring.style.width='36px';ring.style.height='36px';ring.style.borderColor='rgba(212,168,67,.6)';});
});

/* PARTICLES */
const cvs=document.getElementById('particleCanvas'),ctx=cvs.getContext('2d');
function rsz(){cvs.width=window.innerWidth;cvs.height=window.innerHeight;}
rsz();window.addEventListener('resize',rsz);
class P{
  constructor(){this.reset();this.y=Math.random()*cvs.height;}
  reset(){this.x=Math.random()*cvs.width;this.y=cvs.height+10;this.sz=Math.random()*2+.4;this.sy=Math.random()*.6+.2;this.sx=(Math.random()-.5)*.3;this.op=Math.random()*.45+.1;this.life=0;this.ml=Math.random()*300+200;}
  update(){this.x+=this.sx;this.y-=this.sy;this.life++;if(this.life>this.ml||this.y<-10)this.reset();}
  draw(){ctx.save();ctx.globalAlpha=this.op*(1-this.life/this.ml);ctx.fillStyle='#d4a843';ctx.shadowBlur=8;ctx.shadowColor='#d4a843';ctx.beginPath();ctx.arc(this.x,this.y,this.sz,0,Math.PI*2);ctx.fill();ctx.restore();}
}
const parts=Array.from({length:70},()=>new P());
(function ap(){ctx.clearRect(0,0,cvs.width,cvs.height);parts.forEach(p=>{p.update();p.draw();});requestAnimationFrame(ap);})();

/* HERO SLIDER */
const slides=document.querySelectorAll('.slide'),sdots=document.querySelectorAll('.s-dot'),snum=document.getElementById('slideNum'),sprg=document.getElementById('slideProgress');
const NUMS=['01','02','03'],DUR=6000;
let cur=0,stimer;
function goTo(i){
  slides[cur].classList.remove('active');sdots[cur].classList.remove('active');
  cur=(i+slides.length)%slides.length;
  slides[cur].classList.add('active');sdots[cur].classList.add('active');
  snum.textContent=NUMS[cur];
  sprg.style.transition='none';sprg.style.width='0%';
  setTimeout(()=>{sprg.style.transition=`width ${DUR}ms linear`;sprg.style.width='100%';},20);
}
function startAuto(){stimer=setInterval(()=>goTo(cur+1),DUR);}
document.getElementById('sNext').addEventListener('click',()=>{goTo(cur+1);clearInterval(stimer);startAuto();});
document.getElementById('sPrev').addEventListener('click',()=>{goTo(cur-1);clearInterval(stimer);startAuto();});
sdots.forEach(d=>d.addEventListener('click',()=>{goTo(+d.dataset.i);clearInterval(stimer);startAuto();}));
goTo(0);startAuto();

/* NAVBAR */
const nav=document.getElementById('mainNav');
window.addEventListener('scroll',()=>nav.classList.toggle('scrolled',window.scrollY>60));

/* SCROLL REVEAL */
const sObs=new IntersectionObserver(entries=>{
  entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('show');sObs.unobserve(e.target);}});
},{threshold:.1,rootMargin:'0px 0px -40px 0px'});
document.querySelectorAll('.rv,.rv-l,.rv-r').forEach(el=>sObs.observe(el));

/* COUNTER ANIMATION */
const cObs=new IntersectionObserver(entries=>{
  entries.forEach(e=>{
    if(!e.isIntersecting)return;
    const el=e.target,target=+el.dataset.target;
    let count=0;const step=target/60;
    const iv=setInterval(()=>{count+=step;if(count>=target){count=target;clearInterval(iv);}el.textContent=Math.floor(count);},24);
    cObs.unobserve(el);
  });
},{threshold:.5});
document.querySelectorAll('.num[data-target]').forEach(el=>cObs.observe(el));

/* PARALLAX ORBS */
window.addEventListener('scroll',()=>{
  const sy=window.scrollY;
  document.querySelectorAll('.orb').forEach((o,i)=>{o.style.transform=`translateY(${sy*(i%2===0?.04:.065)}px)`;});
});

/* CLOSE MOBILE NAV */
document.querySelectorAll('.nav-link').forEach(l=>{
  l.addEventListener('click',()=>{const c=bootstrap.Collapse.getInstance(document.getElementById('navMenu'));if(c)c.hide();});
});
</script>
</body>
</html>