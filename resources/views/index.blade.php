@extends('layouts.app')

@section('title', 'home')

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
  transition:.3s;
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

/* ===== HERO ===== */
.hero-wrap{
  min-height:100vh;display:flex;align-items:center;justify-content:center;
  text-align:center;padding:110px 20px 80px;position:relative;
}
.hero-inner{max-width:820px;animation:fadeUp 1s ease both}
@keyframes fadeUp{from{opacity:0;transform:translateY(40px)}to{opacity:1;transform:translateY(0)}}

.avatar-ring{
  width:190px;height:190px;margin:0 auto 30px;border-radius:50%;
  padding:5px;position:relative;
  background:conic-gradient(from var(--a,0deg),var(--accent),var(--accent2),#818cf8,var(--accent));
  animation:spin 4s linear infinite;
}
@property --a{syntax:'<angle>';initial-value:0deg;inherits:false}
@keyframes spin{to{--a:360deg}}
.avatar-ring img{
  width:100%;height:100%;border-radius:50%;object-fit:cover;
  border:4px solid var(--bg);background:var(--bg2);display:block;
}

.status-chip{
  display:inline-flex;align-items:center;gap:8px;
  background:var(--card);border:1px solid var(--border);
  border-radius:50px;padding:7px 18px;font-size:13px;color:var(--muted);
  margin-bottom:22px;font-weight:600;
}
.status-chip .dot{width:8px;height:8px;border-radius:50%;background:#22c55e;box-shadow:0 0 10px #22c55e;animation:pulse 1.6s infinite}
@keyframes pulse{50%{opacity:.4}}

h1.hero-name{
  font-size:clamp(38px,7vw,72px);font-weight:900;letter-spacing:-1.5px;
  line-height:1.05;
}
h1.hero-name span{
  background:linear-gradient(90deg,var(--accent),var(--accent2));
  -webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;
}

.typing-line{
  font-size:clamp(18px,3vw,26px);color:var(--muted);margin:18px 0 40px;
  min-height:34px;font-weight:600;
}
.typing-line .cursor{
  display:inline-block;width:3px;height:1em;background:var(--accent2);
  vertical-align:-2px;margin-left:3px;animation:blink .8s infinite;
}
@keyframes blink{50%{opacity:0}}

.btn-hero{
  position:relative;display:inline-flex;align-items:center;gap:10px;
  padding:16px 42px;border-radius:50px;font-weight:700;font-size:15px;
  text-decoration:none;letter-spacing:.5px;transition:.35s;border:none;cursor:pointer;
}
.btn-primary-hero{
  background:linear-gradient(90deg,var(--accent),#2ea043);
  color:#fff;box-shadow:0 8px 30px rgba(55,140,63,.35);margin-right:14px;
}
.btn-primary-hero:hover{transform:translateY(-3px);box-shadow:0 12px 40px rgba(55,140,63,.55);color:#fff}
.btn-ghost{
  background:var(--card);color:#fff;border:1px solid var(--border);
  backdrop-filter:blur(8px);
}
.btn-ghost:hover{background:rgba(255,255,255,.1);border-color:var(--accent2);color:#fff;transform:translateY(-3px)}

/* scroll arrow */
.scroll-arrow{
  position:absolute;bottom:32px;left:50%;transform:translateX(-50%);
  width:44px;height:44px;border-radius:50%;border:1px solid var(--border);
  display:flex;align-items:center;justify-content:center;color:var(--muted);
  animation:bounce 2s infinite;text-decoration:none;transition:.3s;
}
.scroll-arrow:hover{color:var(--accent2);border-color:var(--accent2)}
@keyframes bounce{0%,100%{transform:translateX(-50%) translateY(0)}50%{transform:translateX(-50%) translateY(10px)}}

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

.reveal{opacity:0;transform:translateY(30px);transition:.8s ease}
.reveal.show{opacity:1;transform:translateY(0)}
</style>
</head>

<body>

<div class="aurora"></div>
<canvas id="particles"></canvas>


  @foreach($about as $abouts)
<!-- ===== HERO ===== -->
<header class="hero-wrap">
  <div class="hero-inner">
    <div class="status-chip reveal"><span class="dot"></span> Available for freelance work</div>

    <div class="avatar-ring reveal"><img src="{{ asset($abouts->image) }}" alt="{{$abouts->fname}} {{$abouts->lname}}" /></div>

    <h1 class="hero-name reveal">{{$abouts->fname}}&nbsp;{{$abouts->mname}}&nbsp; <span>{{$abouts->lname}}</span></h1>

    <div class="typing-line reveal"><span id="typed"></span><span class="cursor"></span></div>

    <div class="reveal">
      <button class="btn-hero btn-primary-hero"><i class="fa-solid fa-download"></i> DOWNLOAD CV</button>
      <button class="btn-hero btn-ghost"><i class="fa-solid fa-paper-plane"></i> HIRE ME</button>
    </div>
  </div>
  <a href="#about" class="scroll-arrow"><i class="fa-solid fa-chevron-down"></i></a>
</header>
@endforeach



<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
/* mobile menu */
function toggleMenu(){ document.getElementById('navLinks').classList.toggle('open'); }
document.querySelectorAll('#navLinks a').forEach(a=>a.addEventListener('click',()=>document.getElementById('navLinks').classList.remove('open')));

/* typing effect */
const roles = ["Front-end Developer","UI/UX Designer","Design Enthusiast"];
const typedEl = document.getElementById('typed');
let ri=0, ci=0, deleting=false;
(function type(){
  const word = roles[ri];
  typedEl.textContent = word.substring(0, ci);
  if(!deleting && ci < word.length){ ci++; setTimeout(type, 90); }
  else if(!deleting){ deleting=true; setTimeout(type, 1600); }
  else if(ci > 0){ ci--; setTimeout(type, 45); }
  else { deleting=false; ri=(ri+1)%roles.length; setTimeout(type, 350); }
})();

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

/* scroll reveal */
const io = new IntersectionObserver(es=>es.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('show'); }),{threshold:.15});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
</script>

@endsection