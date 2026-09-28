@extends('layouts.app')

@section('title', 'Project')

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

/* ===== PROJECTS ===== */
.projects-wrap{max-width:1200px;margin:0 auto;padding:130px 24px 90px}
.projects-grid{
  display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));
  gap:26px;
}
.project-card{
  background:var(--card);border:1px solid var(--border);
  border-radius:20px;overflow:hidden;
  backdrop-filter:blur(10px);
  transition:.4s cubic-bezier(.25,.8,.25,1);
  position:relative;
}
.project-card:hover{
  transform:translateY(-8px);
  border-color:rgba(55,140,63,.5);
  box-shadow:0 20px 50px rgba(0,0,0,.5),0 0 0 1px rgba(55,140,63,.3);
}
.project-img{
  position:relative;height:230px;overflow:hidden;
}
.project-img img{
  width:100%;height:100%;object-fit:cover;display:block;
  transition:transform .6s ease;
}
.project-card:hover .project-img img{transform:scale(1.08)}
.project-img::after{
  content:"";position:absolute;inset:0;
  background:linear-gradient(180deg,transparent 40%,rgba(10,14,26,.9));
  opacity:0;transition:.4s;
}
.project-card:hover .project-img::after{opacity:1}
.project-view{
  position:absolute;top:50%;left:50%;
  transform:translate(-50%,-50%) scale(.6);
  width:56px;height:56px;border-radius:50%;
  background:rgba(255,255,255,.12);backdrop-filter:blur(8px);
  border:1px solid rgba(255,255,255,.3);
  display:flex;align-items:center;justify-content:center;
  color:#fff;font-size:18px;opacity:0;transition:.4s;z-index:2;
}
.project-card:hover .project-view{
  opacity:1;transform:translate(-50%,-50%) scale(1);
}
.project-body{padding:22px 24px 26px}
.project-tag{
  display:inline-block;font-size:11px;font-weight:800;
  letter-spacing:1.5px;text-transform:uppercase;
  color:#7ee2a0;background:rgba(55,140,63,.12);
  border:1px solid rgba(55,140,63,.35);
  border-radius:50px;padding:4px 12px;margin-bottom:12px;
}
.project-body h3{
  font-size:19px;font-weight:800;margin-bottom:10px;letter-spacing:-.3px;
}
.project-body p{
  color:var(--muted);font-size:14.5px;line-height:1.7;margin:0;
  display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;
}
.project-line{
  height:3px;border-radius:3px;margin-top:18px;width:44px;
  background:linear-gradient(90deg,var(--accent),var(--accent2));
  transition:width .4s ease;
}
.project-card:hover .project-line{width:100%}

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



<!-- ===== PROJECTS ===== -->
<section class="projects-wrap">
  <div class="section-title reveal">
    <h2>My <span>Projects</span></h2>
    <p>Worked So far.</p>
    <div class="divider"></div>
  </div>

  <div class="projects-grid reveal">
    @foreach($project as $projects)
        <article class="project-card">
            <div class="project-img">
                <img src="{{ asset($projects->project_image) }}"
                     alt="{{ $projects->project_name }}" />

                <span class="project-view">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </span>
            </div>

            <div class="project-body">
                <span class="project-tag">Project</span>
                <h3>{{ $projects->project_name }}</h3>
                <p>{{ $projects->project_descr }}</p>
                <div class="project-line"></div>
            </div>
        </article>
    @endforeach
</div>



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

/* scroll reveal */
const io = new IntersectionObserver(es=>es.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('show'); }),{threshold:.1});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
</script>
@endsection