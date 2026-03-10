<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mekong CyberUnit | Modern HR Management System</title>
    <meta name="description" content="Mekong CyberUnit - Smart Human Resource Management: Attendance, Payroll, and Reports">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --blue:#3b82f6;--indigo:#6366f1;--purple:#8b5cf6;
  --dark:#040d1a;--dark2:#071428;--dark3:#0c1f38;
  --card:#0e1e35;--border:rgba(59,130,246,0.18);
  --text:#94a3b8;--white:#f0f6ff;
}
html{scroll-behavior:smooth}
body{
  font-family:'Kantumruy Pro',sans-serif;
  background:var(--dark);color:var(--text);
  overflow-x:hidden;-webkit-font-smoothing:antialiased;
}
.num{font-family:'Outfit',sans-serif}

/* ── SCROLL BAR ── */
::-webkit-scrollbar{width:5px}
::-webkit-scrollbar-track{background:var(--dark)}
::-webkit-scrollbar-thumb{background:linear-gradient(var(--blue),var(--purple));border-radius:4px}

/* ── SCROLL PROGRESS ── */
#sp{position:fixed;top:0;left:0;width:0%;height:3px;
  background:linear-gradient(90deg,var(--blue),var(--purple));z-index:200}

/* ── NAV ── */
nav{
  position:fixed;top:0;width:100%;z-index:100;
  background:rgba(4,13,26,0.7);
  backdrop-filter:blur(20px) saturate(180%);
  border-bottom:1px solid var(--border);
  transition:all .3s
}
.nav-inner{
  max-width:1400px;margin:0 auto;padding:0 2rem;
  height:72px;display:flex;align-items:center;justify-content:space-between
}
.logo{display:flex;align-items:center;gap:.75rem;text-decoration:none;cursor:pointer}
.logo-icon{
  width:40px;height:40px;border-radius:12px;
  background:linear-gradient(135deg,var(--blue),var(--indigo));
  display:flex;align-items:center;justify-content:center;
  color:white;font-size:1.1rem;
  box-shadow:0 0 20px rgba(59,130,246,.4);
  transition:transform .3s
}
.logo:hover .logo-icon{transform:rotate(15deg)}
.logo-text{font-family:'Outfit',sans-serif;font-size:1.5rem;font-weight:800;color:var(--white)}
.logo-text span{background:linear-gradient(90deg,var(--blue),var(--purple));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.nav-links{display:flex;gap:2.5rem;list-style:none}
.nav-links a{
  font-size:.93rem;font-weight:600;color:var(--text);
  text-decoration:none;transition:color .2s,transform .2s;
  position:relative;padding-bottom:4px
}
.nav-links a::after{
  content:'';position:absolute;bottom:0;left:0;width:0;height:2px;
  background:linear-gradient(90deg,var(--blue),var(--purple));
  transition:width .3s
}
.nav-links a:hover{color:var(--white)}
.nav-links a:hover::after{width:100%}
.nav-actions{display:flex;align-items:center;gap:1rem}
.btn-ghost{
  padding:.6rem 1.5rem;border-radius:100px;font-weight:600;font-size:.9rem;
  color:var(--text);text-decoration:none;transition:color .2s
}
.btn-ghost:hover{color:var(--white)}
.btn-primary{
  padding:.65rem 1.6rem;border-radius:100px;font-weight:700;font-size:.9rem;
  background:linear-gradient(135deg,var(--blue),var(--indigo));
  color:white;text-decoration:none;
  box-shadow:0 4px 20px rgba(59,130,246,.35);
  transition:all .3s
}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 30px rgba(59,130,246,.5)}

/* ── HERO ── */
.hero{
  min-height:100vh;display:flex;flex-direction:column;
  align-items:center;justify-content:center;
  text-align:center;padding:8rem 2rem 4rem;
  position:relative;overflow:hidden
}
/* aurora blobs */
.hero::before{
  content:'';position:absolute;top:-200px;left:-200px;
  width:700px;height:700px;border-radius:50%;
  background:radial-gradient(circle,rgba(59,130,246,.18) 0%,transparent 70%);
  animation:blob 8s ease-in-out infinite alternate;pointer-events:none
}
.hero::after{
  content:'';position:absolute;bottom:-200px;right:-200px;
  width:800px;height:800px;border-radius:50%;
  background:radial-gradient(circle,rgba(139,92,246,.14) 0%,transparent 70%);
  animation:blob 10s ease-in-out infinite alternate-reverse;pointer-events:none
}
@keyframes blob{0%{transform:translate(0,0) scale(1)}100%{transform:translate(80px,60px) scale(1.15)}}

/* star particles */
.stars{position:absolute;inset:0;pointer-events:none;overflow:hidden}
.star{
  position:absolute;width:2px;height:2px;background:white;
  border-radius:50%;animation:twinkle var(--d,3s) ease-in-out infinite var(--del,0s)
}
@keyframes twinkle{0%,100%{opacity:.1;transform:scale(1)}50%{opacity:.8;transform:scale(1.5)}}

.badge{
  display:inline-flex;align-items:center;gap:.5rem;
  padding:.45rem 1.2rem;border-radius:100px;
  border:1px solid rgba(59,130,246,.35);
  background:rgba(59,130,246,.1);
  font-size:.78rem;font-weight:700;color:var(--blue);
  letter-spacing:.1em;text-transform:uppercase;
  margin-bottom:2rem
}
.badge span{width:7px;height:7px;background:var(--blue);border-radius:50%;animation:pulse 1.5s infinite}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(.7)}}
h1{
  font-family:'Kantumruy Pro',sans-serif;
  font-size:clamp(2.5rem,7vw,5.5rem);
  font-weight:900;line-height:1.08;
  color:var(--white);margin-bottom:1.5rem;
  letter-spacing:-.02em;position:relative;z-index:1
}
.grad{background:linear-gradient(135deg,var(--blue) 0%,var(--purple) 60%,#ec4899 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.hero-sub{
  font-size:1.15rem;font-weight:500;color:var(--text);
  max-width:640px;margin:0 auto 3rem;line-height:1.85;
  position:relative;z-index:1
}
.hero-btns{
  display:flex;flex-wrap:wrap;gap:1rem;
  justify-content:center;position:relative;z-index:1;margin-bottom:4rem
}
.btn-hero{
  padding:1rem 2.5rem;border-radius:100px;font-size:1rem;font-weight:800;
  text-decoration:none;display:inline-flex;align-items:center;gap:.6rem;
  transition:all .35s;white-space:nowrap
}
.btn-hero-primary{
  background:linear-gradient(135deg,var(--blue),var(--indigo));color:white;
  box-shadow:0 10px 40px rgba(59,130,246,.4)
}
.btn-hero-primary:hover{transform:translateY(-4px) scale(1.03);box-shadow:0 20px 60px rgba(59,130,246,.55)}
.btn-hero-outline{
  background:rgba(255,255,255,.06);color:var(--white);
  border:1.5px solid rgba(255,255,255,.15)
}
.btn-hero-outline:hover{background:rgba(255,255,255,.12);transform:translateY(-3px)}

/* hero card mockup */
.hero-card{
  position:relative;z-index:1;
  max-width:900px;width:100%;margin:0 auto;
  background:rgba(14,30,53,.8);border:1px solid var(--border);
  border-radius:24px;padding:1.5rem;
  box-shadow:0 40px 100px rgba(0,0,0,.5),inset 0 1px 0 rgba(255,255,255,.06);
  animation:floatY 6s ease-in-out infinite
}
@keyframes floatY{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
.hero-card-header{
  display:flex;align-items:center;gap:.5rem;margin-bottom:1rem;padding-bottom:1rem;
  border-bottom:1px solid var(--border)
}
.dot{width:12px;height:12px;border-radius:50%}
.hero-card-body{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem}
.mini-card{
  background:rgba(59,130,246,.07);border:1px solid var(--border);
  border-radius:14px;padding:1.2rem;text-align:left
}
.mini-card .icon{font-size:1.4rem;margin-bottom:.6rem}
.mini-card .label{font-size:.72rem;font-weight:600;color:var(--text);text-transform:uppercase;letter-spacing:.08em}
.mini-card .val{font-family:'Outfit',sans-serif;font-size:1.6rem;font-weight:800;color:var(--white);margin-top:.25rem}
.mini-card .trend{font-size:.78rem;font-weight:600;color:#22c55e;margin-top:.2rem}
.mini-card .trend.down{color:#f97316}
.bar-row{display:flex;align-items:center;gap:.5rem;margin-top:.5rem}
.bar{flex:1;height:6px;background:rgba(255,255,255,.08);border-radius:4px;overflow:hidden}
.bar-fill{height:100%;border-radius:4px;background:linear-gradient(90deg,var(--blue),var(--purple))}

/* ── TRUST LOGOS ── */
.trust{padding:3rem 2rem;border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.trust-inner{max-width:1200px;margin:0 auto;text-align:center}
.trust p{font-size:.8rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:#475569;margin-bottom:2rem}
.trust-logos{display:flex;flex-wrap:wrap;justify-content:center;gap:2.5rem 4rem;align-items:center}
.trust-logos span{font-family:'Outfit',sans-serif;font-size:1.1rem;font-weight:800;color:#334155;letter-spacing:-.02em}

/* ── STATS ── */
.stats{padding:5rem 2rem}
.stats-inner{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);gap:2rem;text-align:center}
.stat-num{font-family:'Outfit',sans-serif;font-size:3.5rem;font-weight:900;color:var(--white);line-height:1}
.stat-num span{background:linear-gradient(135deg,var(--blue),var(--purple));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.stat-label{font-size:.8rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#475569;margin-top:.6rem}

/* ── SECTION COMMON ── */
section{padding:6rem 2rem}
.section-inner{max-width:1200px;margin:0 auto}
.section-badge{
  display:inline-block;padding:.35rem 1rem;border-radius:100px;
  background:rgba(59,130,246,.12);border:1px solid rgba(59,130,246,.25);
  font-size:.75rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;
  color:var(--blue);margin-bottom:1.2rem
}
.section-title{
  font-size:clamp(2rem,4vw,3.2rem);font-weight:900;
  color:var(--white);line-height:1.15;letter-spacing:-.02em;margin-bottom:1rem
}
.section-sub{font-size:1.05rem;font-weight:500;color:var(--text);line-height:1.9;max-width:540px}

/* ── FEATURES ── */
.features-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;margin-top:4rem}
.feat-card{
  background:var(--card);border:1px solid var(--border);border-radius:20px;padding:2.2rem;
  transition:all .4s;position:relative;overflow:hidden
}
.feat-card::before{
  content:'';position:absolute;top:0;left:0;right:0;height:2px;
  background:linear-gradient(90deg,var(--blue),var(--purple));
  transform:scaleX(0);transform-origin:left;transition:transform .4s
}
.feat-card:hover{transform:translateY(-6px);border-color:rgba(99,102,241,.35);box-shadow:0 20px 60px rgba(0,0,0,.4)}
.feat-card:hover::before{transform:scaleX(1)}
.feat-icon{
  width:52px;height:52px;border-radius:14px;
  display:flex;align-items:center;justify-content:center;
  font-size:1.4rem;margin-bottom:1.5rem;
  transition:transform .3s
}
.feat-card:hover .feat-icon{transform:scale(1.1) rotate(-5deg)}
.feat-icon.blue{background:rgba(59,130,246,.15);color:#60a5fa}
.feat-icon.indigo{background:rgba(99,102,241,.15);color:#818cf8}
.feat-icon.green{background:rgba(34,197,94,.12);color:#4ade80}
.feat-icon.orange{background:rgba(251,146,60,.12);color:#fb923c}
.feat-icon.pink{background:rgba(236,72,153,.12);color:#f472b6}
.feat-icon.cyan{background:rgba(34,211,238,.12);color:#22d3ee}
.feat-title{font-size:1.15rem;font-weight:800;color:var(--white);margin-bottom:.7rem}
.feat-desc{font-size:.92rem;font-weight:500;color:var(--text);line-height:1.85}

/* ── HOW IT WORKS ── */
.how{background:linear-gradient(180deg,var(--dark) 0%,var(--dark2) 100%)}
.steps{display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;margin-top:4rem}
.step{text-align:center;padding:2.5rem}
.step-num{
  width:56px;height:56px;border-radius:50%;margin:0 auto 1.5rem;
  background:linear-gradient(135deg,var(--blue),var(--purple));
  display:flex;align-items:center;justify-content:center;
  font-family:'Outfit',sans-serif;font-size:1.3rem;font-weight:900;color:white;
  box-shadow:0 0 30px rgba(59,130,246,.4)
}
.step-title{font-size:1.1rem;font-weight:800;color:var(--white);margin-bottom:.6rem}
.step-desc{font-size:.9rem;color:var(--text);line-height:1.85}

/* ── PRICING ── */
.pricing-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;margin-top:4rem}
.price-card{
  background:var(--card);border:1px solid var(--border);
  border-radius:20px;padding:2.5rem;transition:all .4s;position:relative
}
.price-card.popular{
  border-color:var(--blue);
  background:linear-gradient(145deg,rgba(59,130,246,.12),rgba(99,102,241,.08));
  box-shadow:0 0 60px rgba(59,130,246,.15),0 0 0 1px var(--blue)
}
.popular-badge{
  position:absolute;top:-1px;left:50%;transform:translateX(-50%);
  background:linear-gradient(90deg,var(--blue),var(--indigo));
  padding:.3rem 1.2rem;border-radius:0 0 12px 12px;
  font-size:.72rem;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:white
}
.price-name{font-size:.85rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--blue);margin-bottom:1rem}
.price-amount{font-family:'Outfit',sans-serif;font-size:3rem;font-weight:900;color:var(--white);line-height:1}
.price-amount sub{font-size:1rem;font-weight:600;color:var(--text);vertical-align:middle}
.price-period{font-size:.85rem;color:var(--text);margin-top:.4rem;margin-bottom:1.5rem}
.price-divider{height:1px;background:var(--border);margin:1.5rem 0}
.price-features{list-style:none;display:flex;flex-direction:column;gap:.85rem;margin-bottom:2rem}
.price-features li{display:flex;align-items:center;gap:.7rem;font-size:.9rem;font-weight:500;color:var(--text)}
.price-features li i{color:#22c55e;font-size:.85rem;flex-shrink:0}
.price-features li.no i{color:#ef4444}
.price-features li.no{opacity:.5}
.btn-plan{
  display:block;text-align:center;padding:.9rem;border-radius:100px;
  font-weight:800;font-size:.95rem;text-decoration:none;transition:all .3s
}
.btn-plan-outline{border:1.5px solid var(--border);color:var(--white)}
.btn-plan-outline:hover{border-color:var(--blue);color:var(--blue)}
.btn-plan-solid{background:linear-gradient(135deg,var(--blue),var(--indigo));color:white;box-shadow:0 8px 30px rgba(59,130,246,.35)}
.btn-plan-solid:hover{transform:translateY(-2px);box-shadow:0 16px 40px rgba(59,130,246,.5)}

/* ── CTA ── */
.cta-section{padding:6rem 2rem}
.cta-inner{
  max-width:1100px;margin:0 auto;
  background:linear-gradient(135deg,rgba(37,99,235,.25),rgba(124,58,237,.2));
  border:1px solid rgba(99,102,241,.3);border-radius:32px;padding:5rem 3rem;
  text-align:center;position:relative;overflow:hidden
}
.cta-inner::before{
  content:'';position:absolute;top:-100px;left:50%;transform:translateX(-50%);
  width:600px;height:400px;
  background:radial-gradient(ellipse,rgba(59,130,246,.2) 0%,transparent 70%);
  pointer-events:none
}
.cta-title{font-size:clamp(2rem,4vw,3.5rem);font-weight:900;color:var(--white);line-height:1.1;margin-bottom:1rem;position:relative}
.cta-sub{font-size:1.1rem;color:var(--text);max-width:500px;margin:0 auto 2.5rem;line-height:1.9;position:relative}
.cta-btns{display:flex;flex-wrap:wrap;gap:1rem;justify-content:center;position:relative}

/* ── FOOTER ── */
footer{background:var(--dark2);border-top:1px solid var(--border);padding:5rem 2rem 2.5rem}
.footer-inner{max-width:1200px;margin:0 auto}
.footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:3rem;margin-bottom:4rem}
.footer-brand p{font-size:.92rem;color:var(--text);line-height:1.9;max-width:300px;margin-top:1rem;margin-bottom:1.5rem}
.social-row{display:flex;gap:.75rem}
.social-btn{
  width:38px;height:38px;border-radius:50%;border:1px solid var(--border);
  display:flex;align-items:center;justify-content:center;
  color:var(--text);font-size:.9rem;text-decoration:none;transition:all .3s
}
.social-btn:hover{border-color:var(--blue);color:var(--blue);background:rgba(59,130,246,.1)}
.footer-col h5{font-size:.78rem;font-weight:800;letter-spacing:.15em;text-transform:uppercase;color:var(--white);margin-bottom:1.2rem}
.footer-col ul{list-style:none;display:flex;flex-direction:column;gap:.75rem}
.footer-col ul a{font-size:.88rem;font-weight:500;color:var(--text);text-decoration:none;transition:color .2s}
.footer-col ul a:hover{color:var(--white)}
.footer-bottom{padding-top:2rem;border-top:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap}
.footer-bottom p{font-size:.82rem;color:#334155;font-family:'Outfit',sans-serif}

/* ── REVEAL ANIMATION ── */
.reveal{opacity:0;transform:translateY(28px);transition:all .8s cubic-bezier(.16,1,.3,1)}
.reveal.visible{opacity:1;transform:none}

/* ── RESPONSIVE ── */
@media(max-width:768px){
  .nav-links{display:none}
  .stats-inner{grid-template-columns:repeat(2,1fr)}
  .features-grid,.steps,.pricing-grid{grid-template-columns:1fr}
  .footer-grid{grid-template-columns:1fr 1fr}
  .hero-card-body{grid-template-columns:1fr}
}
</style>
</head>
<body>
<div id="sp"></div>

<!-- NAV -->
<nav id="navbar">
  <div class="nav-inner">
    <a href="/" class="logo">
      <div class="logo-icon"><i class="fa-solid fa-bolt-lightning"></i></div>
      <span class="logo-text">Mekong<span>CyberUnit</span></span>
    </a>
    <ul class="nav-links">
      <li><a href="#features">Features</a></li>
      <li><a href="#how">How it Works</a></li>
      <li><a href="#pricing">Pricing</a></li>
      <li><a href="https://t.me/SOCHEAT_DOEM" target="_blank">Contact Support</a></li>
    </ul>
    <div class="nav-actions">
      @auth
        <a href="{{ route('dashboard') }}" class="btn-primary">Dashboard <i class="fa-solid fa-arrow-right" style="font-size:.8rem"></i></a>
      @else
        <a href="{{ route('login') }}" class="btn-ghost">Login</a>
        <a href="{{ route('register') }}" class="btn-primary">Get Started Free</a>
      @endauth
    </div>
  </div>
</nav>

<!-- STAR PARTICLES -->
<div class="stars" id="stars"></div>

<!-- HERO -->
<section class="hero">
  <div class="badge"><span></span>Next-Gen Management System</div>
  <h1>
    Manage <span class="grad">Human Resource</span><br>Intelligently
  </h1>
  <p class="hero-sub">Mekong CyberUnit helps you manage employees, QR attendance, payroll, and reports — all in one smart system.</p>
  <div class="hero-btns">
    <a href="{{ route('register') }}" class="btn-hero btn-hero-primary">
      <i class="fa-solid fa-rocket"></i> Try For Free
    </a>
    <a href="#features" class="btn-hero btn-hero-outline">
      <i class="fa-solid fa-play" style="font-size:.8rem"></i> Learn More
    </a>
  </div>

  <!-- Dashboard Mockup Card -->
  <div class="hero-card reveal" style="transition-delay:.2s">
    <div class="hero-card-header">
      <div class="dot" style="background:#ef4444"></div>
      <div class="dot" style="background:#f59e0b"></div>
      <div class="dot" style="background:#22c55e"></div>
    </div>
    <div class="hero-card-body">
      <div class="mini-card">
        <div class="icon">👥</div>
        <div class="label">Total Employees</div>
        <div class="val num">248</div>
        <div class="trend"><i class="fa-solid fa-arrow-trend-up"></i> +12% this month</div>
        <div class="bar-row"><div class="bar"><div class="bar-fill" style="width:78%"></div></div><span style="font-size:.75rem;color:#475569">78%</span></div>
      </div>
      <div class="mini-card">
        <div class="icon">✅</div>
        <div class="label">Attendance Today</div>
        <div class="val num">98%</div>
        <div class="trend"><i class="fa-solid fa-arrow-trend-up"></i> Optimal</div>
        <div class="bar-row"><div class="bar"><div class="bar-fill" style="width:98%;background:linear-gradient(90deg,#22c55e,#16a34a)"></div></div><span style="font-size:.75rem;color:#475569">98%</span></div>
      </div>
      <div class="mini-card">
        <div class="icon">💰</div>
        <div class="label">Monthly Payroll</div>
        <div class="val num" style="font-size:1.2rem">$45,200</div>
        <div class="trend"><i class="fa-solid fa-arrow-trend-up"></i> +8.5%</div>
        <div class="bar-row"><div class="bar"><div class="bar-fill" style="width:65%;background:linear-gradient(90deg,#8b5cf6,#6366f1)"></div></div><span style="font-size:.75rem;color:#475569">65%</span></div>
      </div>
    </div>
  </div>
</section>

<!-- TRUST -->
<div class="trust">
  <div class="trust-inner">
    <p>TRUSTED BY COMPANIES NATIONWIDE</p>
    <div class="trust-logos">
      <span>Phnom Corp</span><span>Delta Group</span><span>TechHub KH</span><span>Mekong Ltd</span><span>Sunrise Co.</span>
    </div>
  </div>
</div>

<!-- STATS -->
<section class="stats">
  <div class="stats-inner">
    <div class="reveal">
      <div class="stat-num num">500<span>+</span></div>
      <div class="stat-label">Trusted Companies</div>
    </div>
    <div class="reveal" style="transition-delay:.1s">
      <div class="stat-num num">99.9<span>%</span></div>
      <div class="stat-label">System Uptime</div>
    </div>
    <div class="reveal" style="transition-delay:.2s">
      <div class="stat-num num">40<span>%</span></div>
      <div class="stat-label">Time Saved</div>
    </div>
    <div class="reveal" style="transition-delay:.3s">
      <div class="stat-num num">24<span>/7</span></div>
      <div class="stat-label">Tech Support</div>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section id="features" style="background:linear-gradient(180deg,var(--dark) 0%,var(--dark3) 100%)">
  <div class="section-inner">
    <div class="reveal">
      <div class="section-badge">Features</div>
      <h2 class="section-title">Everything in<br><span class="grad">One System</span></h2>
      <p class="section-sub">Modern tools designed to increase efficiency and reduce complexity</p>
    </div>
    <div class="features-grid">
      <div class="feat-card reveal">
        <div class="feat-icon blue"><i class="fa-solid fa-id-card-clip"></i></div>
        <div class="feat-title">QR Code Attendance</div>
        <div class="feat-desc">Instant clock-in/out with precise GPS location to prevent time theft</div>
      </div>
      <div class="feat-card reveal" style="transition-delay:.1s">
        <div class="feat-icon indigo"><i class="fa-solid fa-file-invoice-dollar"></i></div>
        <div class="feat-title">Automated Payroll</div>
        <div class="feat-desc">Calculate salaries, deductions, taxes and benefits automatically with 100% accuracy</div>
      </div>
      <div class="feat-card reveal" style="transition-delay:.2s">
        <div class="feat-icon green"><i class="fa-solid fa-chart-line"></i></div>
        <div class="feat-title">Analytical Reports</div>
        <div class="feat-desc">Visual charts and detailed data to assist management team in decision making</div>
      </div>
      <div class="feat-card reveal" style="transition-delay:.1s">
        <div class="feat-icon orange"><i class="fa-solid fa-users-gear"></i></div>
        <div class="feat-title">Employee Management</div>
        <div class="feat-desc">Complete profile management, role assignment, and multi-tenant isolation</div>
      </div>
      <div class="feat-card reveal" style="transition-delay:.2s">
        <div class="feat-icon pink"><i class="fa-solid fa-calendar-days"></i></div>
        <div class="feat-title">Leave Management</div>
        <div class="feat-desc">Apply, approve, and track annual, sick, or casual leaves effortlessly</div>
      </div>
      <div class="feat-card reveal" style="transition-delay:.3s">
        <div class="feat-icon cyan"><i class="fa-solid fa-shield-halved"></i></div>
        <div class="feat-title">Data Protection</div>
        <div class="feat-desc">Bank-grade encryption, Role-based access, and Multi-factor authentication</div>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section id="how" class="how">
  <div class="section-inner">
    <div class="reveal" style="text-align:center;max-width:600px;margin:0 auto 1rem">
      <div class="section-badge">How it works</div>
      <h2 class="section-title">Start in <span class="grad">3 Steps</span></h2>
      <p class="section-sub" style="margin:0 auto;text-align:center">Simple, fast, and no training required</p>
    </div>
    <div class="steps">
      <div class="step reveal">
        <div class="step-num">01</div>
        <div class="step-title">Register Company</div>
        <div class="step-desc">Fill in company details and create your primary Admin account in 5 minutes</div>
      </div>
      <div class="step reveal" style="transition-delay:.15s">
        <div class="step-num">02</div>
        <div class="step-title">Add Employees</div>
        <div class="step-desc">Import CSV or add individually, set roles, QR codes and permissions</div>
      </div>
      <div class="step reveal" style="transition-delay:.3s">
        <div class="step-num">03</div>
        <div class="step-title">Go Live</div>
        <div class="step-desc">System is ready. Scan QR codes, manage payroll and view reports instantly</div>
      </div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section id="pricing" style="background:var(--dark3)">
  <div class="section-inner">
    <div class="reveal" style="text-align:center;max-width:560px;margin:0 auto 1rem">
      <div class="section-badge">Pricing</div>
      <h2 class="section-title">Transparent <span class="grad">Plans</span></h2>
      <p class="section-sub" style="margin:0 auto;text-align:center">No hidden fees, no surprises. Start for free.</p>
      
      <!-- Pricing Grid Selector -->
      <div class="mt-8 flex flex-wrap justify-center gap-2">
        <button type="button" onclick="setLandingMonths(1)" class="landing-month-btn px-6 py-2 rounded-full border border-blue-500/30 bg-blue-500 text-white font-bold text-sm transition-all" data-months="1">1 Month</button>
        <button type="button" onclick="setLandingMonths(3)" class="landing-month-btn px-6 py-2 rounded-full border border-blue-500/30 bg-slate-800 text-slate-400 font-bold text-sm transition-all" data-months="3">3 Months</button>
        <button type="button" onclick="setLandingMonths(6)" class="landing-month-btn px-6 py-2 rounded-full border border-blue-500/30 bg-slate-800 text-slate-400 font-bold text-sm transition-all" data-months="6">6 Months</button>
        <button type="button" onclick="setLandingMonths(12)" class="landing-month-btn px-6 py-2 rounded-full border border-blue-500/30 bg-slate-800 text-slate-400 font-bold text-sm transition-all" data-months="12">
            1 Year <span class="bg-blue-500/20 text-blue-400 text-[9px] px-1.5 py-0.5 rounded-full ml-1">-10%</span>
        </button>
      </div>
    </div>
    <div class="pricing-grid">
      @forelse($plans as $index => $plan)
      <div class="price-card {{ $index === 1 ? 'popular' : '' }} reveal" style="transition-delay:{{ $index * 0.15 }}s">
        @if($index === 1)
          <div class="popular-badge">Popular Plan</div>
        @endif
        <div class="price-name">{{ $plan->name }}</div>
        <div class="price-amount num">
            @if($plan->price > 0)
                <span class="plan-price" 
                      data-monthly="{{ number_format($plan->price, 0) }}" 
                      data-yearly="{{ number_format($plan->yearly_price ?? ($plan->price * 12 * 0.9), 0) }}">
                  <sub>$</sub>{{ number_format($plan->price, 0) }}
                </span>
            @else
                FREE
            @endif
        </div>
        <div class="price-period" id="period-{{ $plan->id }}">per month / company</div>
        <div class="price-divider"></div>
        <ul class="price-features">
          <li><i class="fa-solid fa-check"></i> Employees: {{ $plan->employee_limit ?? 'Unlimited' }}</li>
          <li><i class="fa-solid fa-check"></i> Branches: {{ $plan->branch_limit ?? 'Unlimited' }}</li>
          @if($plan->feature_list)
            @foreach($plan->feature_list as $feature)
              <li><i class="fa-solid fa-check"></i> {{ $feature }}</li>
            @endforeach
          @endif
        </ul>
        <a href="{{ $plan->price > 0 ? route('checkout.plan', $plan->id) : route('register.company', $plan->id) }}" class="btn-plan {{ $index === 1 ? 'btn-plan-solid' : 'btn-plan-outline' }}">
            {{ $plan->price > 0 ? 'Buy Now' : 'Try Now' }}
        </a>
      </div>
      @empty
        <div style="grid-column: 1/-1; text-align: center; color: var(--white); opacity: 0.6; padding: 3rem;">
           <i class="fa-solid fa-circle-info" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
           មិនមានគម្រោងតម្លៃនៅឡើយទេ
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="cta-inner reveal">
    <h2 class="cta-title">Ready for <br><span class="grad">Transformation?</span></h2>
    <p class="cta-sub">Join hundreds of growing companies using Mekong CyberUnit</p>
    <div class="cta-btns">
      <a href="{{ route('register') }}" class="btn-hero btn-hero-primary"><i class="fa-solid fa-rocket"></i> Register Now</a>
      <a href="https://t.me/SOCHEAT_DOEM" target="_blank" class="btn-hero btn-hero-outline"><i class="fa-brands fa-telegram"></i> Contact Support</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer id="contact">
  <div class="footer-inner">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="/" class="logo" style="margin-bottom:0">
          <div class="logo-icon"><i class="fa-solid fa-bolt-lightning"></i></div>
          <span class="logo-text">Mekong<span>CyberUnit</span></span>
        </a>
        <p>Smart business operation management system. Transform tedious tasks into modern efficiency.</p>
        <div class="social-row">
          <a href="https://t.me/SOCHEAT_DOEM" target="_blank" class="social-btn"><i class="fa-brands fa-telegram"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h5>Product</h5>
        <ul>
          <li><a href="#features">Features</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="#">API</a></li>
          <li><a href="#">Changelog</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Company</h5>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="https://t.me/SOCHEAT_DOEM" target="_blank">Contact Support</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Support</h5>
        <ul>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Terms</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Status</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="num">&copy; {{ date('Y') }} Mekong CyberUnit Platform. All rights reserved.</p>
      <p class="num">Precision Engineered for Excellence</p>
    </div>
  </div>
</footer>

<script>
// Scroll progress
window.addEventListener('scroll',()=>{
  const s=document.documentElement.scrollTop,
        h=document.documentElement.scrollHeight-window.innerHeight;
  document.getElementById('sp').style.width=(s/h*100)+'%';
});

// Generate stars
const starsEl=document.getElementById('stars');
for(let i=0;i<120;i++){
  const s=document.createElement('div');
  s.className='star';
  s.style.cssText=`left:${Math.random()*100}%;top:${Math.random()*100}%;
    --d:${2+Math.random()*4}s;--del:${Math.random()*5}s;
    opacity:${.1+Math.random()*.5};width:${1+Math.random()*2}px;height:${1+Math.random()*2}px`;
  starsEl.appendChild(s);
}

// Pricing Selection Logic
let currentLandingMonths = 1;
function setLandingMonths(months) {
  currentLandingMonths = months;
  const buttons = document.querySelectorAll('.landing-month-btn');
  const prices = document.querySelectorAll('.plan-price');
  const periods = document.querySelectorAll('.price-period');
  
  buttons.forEach(btn => {
    if (parseInt(btn.dataset.months) === months) {
      btn.classList.replace('bg-slate-800', 'bg-blue-500');
      btn.classList.replace('text-slate-400', 'text-white');
    } else {
      btn.classList.replace('bg-blue-500', 'bg-slate-800');
      btn.classList.replace('text-white', 'text-slate-400');
    }
  });

  prices.forEach(el => {
    const monthlyVal = parseFloat(el.dataset.monthly.replace(/,/g, ''));
    const yearlyVal = parseFloat(el.dataset.yearly.replace(/,/g, ''));
    
    let total;
    if (months >= 12) {
      total = (yearlyVal / 12) * months;
    } else {
      total = monthlyVal * months;
    }
    
    el.innerHTML = `<sub>$</sub>${total.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0})}`;
  });

  periods.forEach(el => {
    el.innerText = `per ${months} ${months > 1 ? 'months' : 'month'} / company`;
  });
}

// Reveal on scroll
const obs=new IntersectionObserver(entries=>{
  entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('visible')});
},{threshold:.12,rootMargin:'0px 0px -40px 0px'});
document.querySelectorAll('.reveal').forEach(el=>obs.observe(el));

// Smooth anchor scroll
document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click',e=>{
    const t=document.querySelector(a.getAttribute('href'));
    if(t){e.preventDefault();t.scrollIntoView({behavior:'smooth'})}
  });
});
</script>
</body>
</html>
