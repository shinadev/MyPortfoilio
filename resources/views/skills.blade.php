@extends('layouts.app')

@section('title', 'Skill')

@section('content')
<!-- STYLES -->
<link href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700,800,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
  --bg:#0a0e1a;
  --bg2:#0f1526;
  --card:rgba(255,255,255,.04);
  --accent:#378C3F;
  --accent2:#22d3ee;
  --text:#e8ecf4;
  --muted:#94a3b8;
  --border:rgba(255,255,255,.08);
}
*{margin:0;padding:0;box-sizing:border-box}
body{
  background:var(--bg);
  color:var(--text);
  font-family:'Inter',sans-serif;
  overflow-x:hidden;
}

/* ===== ANIMATED BACKGROUND ===== */
.aurora{position:fixed;inset:0;z-index:-2;overflow:hidden}
.aurora::before,.aurora::after{
  content:"";position:absolute;border-radius:50%;filter:blur(120px);opacity:.35;
}
.aurora::before{
  width:600px;height:600px;top:-200px;left:-150px;
  background:radial-gradient(circle,#378C3F,transparent 70%);
  animation:float1 14s ease-in-out infinite;
}
.aurora::after{
  width:500px;height:500px;bottom:-150px;right:-100px;
  background:radial-gradient(circle,#1e40af,transparent 70%);
  animation:float2 18s ease-in-out infinite;
}
@keyframes float1{0%,100%{transform:translate(0,0)}50%{transform:translate(80px,60px)}}
@keyframes float2{0%,100%{transform:translate(0,0)}50%{transform:translate(-60px,-80px)}}
#particles{position:fixed;inset:0;z-index:-1}

/* ===== NAVBAR ===== */
.glass-nav{
  position:fixed;top:0;left:0;right:0;z-index:1000;
  backdrop-filter:blur(16px);
  background:rgba(10,14,26,.7);
  border-bottom:1px solid var(--border);
  padding:14px 0;
}
.nav-inner{max-width:1200px;margin:0 auto;padding:0 24px;display:flex;align-items:center;justify-content:space-between}
.brand{font-weight:900;font-size:20px;color:var(--text);text-decoration:none;letter-spacing:1px}
.brand span{color:var(--accent)}
.nav-links{display:flex;gap:28px;list-style:none;align-items:center;margin:0;padding:0}
.nav-links a{
  color:var(--muted);text-decoration:none;font-size:14px;font-weight:600;
  letter-spacing:.5px;position:relative;transition:.25s;
}
.nav-links a::after{
  content:"";position:absolute;left:0;bottom:-6px;width:0;height:2px;
  background:linear-gradient(90deg,var(--accent),var(--accent2));
  transition:.3s;border-radius:2px;
}
.nav-links a:hover{color:#fff}
.nav-links a:hover::after{width:100%}
.login-pill{
  border:1px solid var(--accent)!important;border-radius:50px!important;
  padding:7px 20px!important;color:#fff!important;
  background:rgba(55,140,63,.15);transition:.3s;
}
.login-pill::after{display:none}
.login-pill:hover{background:var(--accent);box-shadow:0 0 25px rgba(55,140,63,.5)}

/* mobile toggle */
.nav-toggle{display:none;background:none;border:none;color:#fff;font-size:22px;cursor:pointer}
@media(max-width:991px){
  .nav-links{
    position:fixed;top:60px;right:-100%;flex-direction:column;
    background:rgba(15,21,38,.98);width:min(75vw,320px);height:100vh;
    padding:60px 30px;gap:22px;transition:right .4s cubic-bezier(.77,0,.18,1);
    border-left:1px solid var(--border);align-items:flex-start;
  }
  .nav-links.open{right:0}
  .nav-toggle{display:block}
}

/* ===== SECTION TITLE ===== */
.section-title{text-align:center;margin-bottom:60px}
.section-title h2{
  font-size:clamp(32px,5vw,48px);font-weight:900;letter-spacing:-1px;
}
.section-title h2 span{
  background:linear-gradient(90deg,var(--accent),var(--accent2));
  -webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;
}
.section-title p{color:var(--muted);font-size:15px;margin-top:8px;letter-spacing:1px;text-transform:uppercase}
.section-title .divider{
  width:70px;height:4px;border-radius:4px;margin:18px auto 0;
  background:linear-gradient(90deg,var(--accent),var(--accent2));
}

/* ===== SKILLS ===== */
.skills-wrap{max-width:1000px;margin:0 auto;padding:130px 24px 90px}
.skills-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}
@media(max-width:768px){.skills-grid{grid-template-columns:1fr}}

.skill-card{
  background:var(--card);border:1px solid var(--border);
  border-radius:16px;padding:22px 24px;
  backdrop-filter:blur(10px);
  transition:.35s;
}
.skill-card:hover{
  transform:translateY(-4px);
  border-color:rgba(55,140,63,.5);
  box-shadow:0 12px 35px rgba(55,140,63,.15);
}
.skill-head{display:flex;align-items:center;gap:14px;margin-bottom:14px}
.skill-icon{
  width:44px;height:44px;border-radius:12px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;
  font-size:20px;color:#fff;
}
.skill-head h4{margin:0;font-size:16px;font-weight:800;letter-spacing:.3px}
.skill-pct{
  margin-left:auto;font-size:15px;font-weight:900;
  background:linear-gradient(90deg,var(--accent),var(--accent2));
  -webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;
}

.skill-bar{
  height:9px;border-radius:10px;overflow:hidden;
  background:rgba(255,255,255,.07);position:relative;
}
.skill-fill{
  height:100%;border-radius:10px;width:0;
  background:linear-gradient(90deg,var(--accent),var(--accent2));
  box-shadow:0 0 14px rgba(34,211,238,.5);
  transition:width 1.4s cubic-bezier(.25,.8,.25,1);
  position:relative;
}
.skill-fill::after{
  content:"";position:absolute;inset:0;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.35),transparent);
  transform:translateX(-100%);
  animation:shimmer 2.4s infinite;
}
@keyframes shimmer{60%{transform:translateX(100%)}100%{transform:translateX(100%)}}

/* ===== FOOTER ===== */
.footer-wrap{
  border-top:1px solid var(--border);
  background:rgba(15,21,38,.6);backdrop-filter:blur(12px);
  padding:44px 20px 30px;text-align:center;
}
.socials{display:flex;gap:14px;justify-content:center;list-style:none;margin-bottom:22px;padding:0}
.socials a{
  width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;
  background:var(--card);border:1px solid var(--border);color:var(--muted);
  font-size:18px;transition:.35s;text-decoration:none;
}
.socials a:hover{
  background:linear-gradient(135deg,var(--accent),var(--accent2));
  color:#fff;transform:translateY(-5px);border-color:transparent;
  box-shadow:0 10px 25px rgba(34,211,238,.3);
}
.footer-copy{color:var(--muted);font-size:14px}
.footer-copy b{color:var(--text)}

/* scroll reveal */
.reveal{opacity:0;transform:translateY(30px);transition:.8s ease}
.reveal.show{opacity:1;transform:translateY(0)}
</style>
</head>

<body>

<div class="aurora"></div>
<canvas id="particles"></canvas>

<!-- ===== NAVBAR (Laravel links untouched) ===== -->
<nav class="glass-nav">
  <div class="nav-inner">
    <a href="<?php echo url('/') ?>" class="brand">PORT<span>FOLIO</span></a>
    <button class="nav-toggle" onclick="toggleMenu()" aria-label="menu"><i class="fa-solid fa-bars"></i></button>
    <ul class="nav-links" id="navLinks">
      <li><a href="<?php echo url('about') ?>">About</a></li>
      <li><a href="<?php echo url('skills') ?>">Skills</a></li>
      <li><a href="<?php echo url('projects') ?>">Projects</a></li>
      <li><a href="<?php echo url('experience') ?>">Experience</a></li>
      <li><a href="<?php echo url('blog') ?>">Blog</a></li>
      <li><a href="<?php echo url('services') ?>">Services</a></li>
      <li><a href="<?php echo url('contact') ?>">Contact</a></li>
      <li><a href="{{ route('login') }}" class="login-pill">Login</a></li>
    </ul>
  </div>
</nav>

<!-- ===== SKILLS ===== -->
<section class="skills-wrap">
  <div class="section-title reveal">
    <h2>My <span>Skills</span></h2>
    <p>My Calibre..</p>
    <div class="divider"></div>
  </div>

  @foreach ($skill as $skills)
  <div class="skills-grid reveal">

    <!-- COLUMN 1 -->
    <div style="display:flex;flex-direction:column;gap:16px">
      <div class="skill-card">
        <div class="skill-head">
          <div class="skill-icon" style="background:linear-gradient(135deg,#e34f26,#f16529)"><i class="fa-brands fa-html5"></i></div>
          <h4>HTML5</h4><span class="skill-pct">{{$skills->html}}%</span>
        </div>
        <div class="skill-bar"><div class="skill-fill" data-pct="{{$skills->html}}"></div></div>
      </div>

      <div class="skill-card">
        <div class="skill-head">
          <div class="skill-icon" style="background:linear-gradient(135deg,#1572b6,#33a9dc)"><i class="fa-brands fa-css3-alt"></i></div>
          <h4>CSS3</h4><span class="skill-pct">{{$skills->css}}%</span>
        </div>
        <div class="skill-bar"><div class="skill-fill" data-pct="{{$skills->css}}"></div></div>
      </div>

      <div class="skill-card">
        <div class="skill-head">
          <div class="skill-icon" style="background:linear-gradient(135deg,#f0db4f,#e9c832)"><i class="fa-brands fa-js"></i></div>
          <h4>Javascript</h4><span class="skill-pct">{{$skills->javascript}}%</span>
        </div>
        <div class="skill-bar"><div class="skill-fill" data-pct="{{$skills->javascript}}"></div></div>
      </div>

      <div class="skill-card">
        <div class="skill-head">
          <div class="skill-icon" style="background:linear-gradient(135deg,#21759b,#464646)"><i class="fa-brands fa-wordpress"></i></div>
          <h4>WordPress</h4><span class="skill-pct">{{$skills->wordpress}}%</span>
        </div>
        <div class="skill-bar"><div class="skill-fill" data-pct="{{$skills->wordpress}}"></div></div>
      </div>
    </div>

    <!-- COLUMN 2 -->
    <div style="display:flex;flex-direction:column;gap:16px">
      <div class="skill-card">
        <div class="skill-head">
          <div class="skill-icon" style="background:linear-gradient(135deg,#6181b6,#8892be)"><i class="fa-brands fa-php"></i></div>
          <h4>PHP</h4><span class="skill-pct">{{$skills->php}}%</span>
        </div>
        <div class="skill-bar"><div class="skill-fill" data-pct="{{$skills->php}}"></div></div>
      </div>

      <div class="skill-card">
        <div class="skill-head">
          <div class="skill-icon" style="background:linear-gradient(135deg,#0769ad,#78cff5)"><i class="fa-solid fa-code"></i></div>
          <h4>JQuery</h4><span class="skill-pct">{{$skills->jquery}}%</span>
        </div>
        <div class="skill-bar"><div class="skill-fill" data-pct="{{$skills->jquery}}"></div></div>
      </div>

      <div class="skill-card">
        <div class="skill-head">
          <div class="skill-icon" style="background:linear-gradient(135deg,#00758f,#f29111)"><i class="fa-solid fa-database"></i></div>
          <h4>MySQL</h4><span class="skill-pct">{{$skills->mysql}}%</span>
        </div>
        <div class="skill-bar"><div class="skill-fill" data-pct="{{$skills->mysql}}"></div></div>
      </div>

      <div class="skill-card">
        <div class="skill-head">
          <div class="skill-icon" style="background:linear-gradient(135deg,#dd0031,#c3002f)"><i class="fa-brands fa-angular"></i></div>
          <h4>Angular</h4><span class="skill-pct">{{$skills->angular}}%</span>
        </div>
        <div class="skill-bar"><div class="skill-fill" data-pct="{{$skills->angular}}"></div></div>
      </div>
    </div>

  </div>
  @endforeach
</section>



<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
/* mobile menu */
function toggleMenu(){ document.getElementById('navLinks').classList.toggle('open'); }
document.querySelectorAll('#navLinks a').forEach(a=>a.addEventListener('click',()=>document.getElementById('navLinks').classList.remove('open')));

/* floating particles */
const canvas = document.getElementById('particles'), ctx = canvas.getContext('2d');
let W,H,parts=[];
function resize(){ W=canvas.width=innerWidth; H=canvas.height=innerHeight; }
resize(); addEventListener('resize',resize);
for(let i=0;i<70;i++) parts.push({
  x:Math.random()*innerWidth, y:Math.random()*innerHeight,
  r:Math.random()*1.6+.4, vx:(Math.random()-.5)*.3, vy:(Math.random()-.5)*.3,
  o:Math.random()*.5+.15
});
(function draw(){
  ctx.clearRect(0,0,W,H);
  parts.forEach(p=>{
    p.x+=p.vx; p.y+=p.vy;
    if(p.x<0)p.x=W; if(p.x>W)p.x=0; if(p.y<0)p.y=H; if(p.y>H)p.y=0;
    ctx.beginPath(); ctx.arc(p.x,p.y,p.r,0,Math.PI*2);
    ctx.fillStyle=`rgba(120,220,150,${p.o})`; ctx.fill();
  });
  requestAnimationFrame(draw);
})();

/* animated skill bars — reads % straight from your Blade variables */
const barIO = new IntersectionObserver(es=>es.forEach(e=>{
  if(e.isIntersecting){
    const f = e.target;
    f.style.width = f.dataset.pct + '%';
    barIO.unobserve(f);
  }
}),{threshold:.4});
document.querySelectorAll('.skill-fill').forEach(f=>barIO.observe(f));

/* scroll reveal */
const io = new IntersectionObserver(es=>es.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('show'); }),{threshold:.15});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
</script>

@endsection