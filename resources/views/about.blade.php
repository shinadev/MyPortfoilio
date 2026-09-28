@extends('layouts.app') 
@section('title', 'About Me') 
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

/* ===== ABOUT LAYOUT ===== */
.about-wrap{max-width:1100px;margin:0 auto;padding:130px 24px 80px}
.about-card{
  background:var(--card);border:1px solid var(--border);
  border-radius:24px;padding:clamp(24px,4vw,48px);
  backdrop-filter:blur(10px);
  box-shadow:0 20px 60px rgba(0,0,0,.4);
}
.about-grid{display:grid;grid-template-columns:380px 1fr;gap:clamp(30px,4vw,50px);align-items:start}
@media(max-width:991px){.about-grid{grid-template-columns:1fr}}

/* image side */
.img-side{position:relative;perspective:800px}
.img-frame{
  position:relative;border-radius:18px;overflow:hidden;
  border:1px solid var(--border);
  box-shadow:0 15px 45px rgba(0,0,0,.5);
  transform-style:preserve-3d;transition:transform .2s ease-out;
}
.img-frame img{width:100%;display:block;aspect-ratio:3/3.6;object-fit:cover}
.img-glow{
  position:absolute;inset:-2px;border-radius:20px;z-index:-1;
  background:linear-gradient(135deg,var(--accent),var(--accent2));
  filter:blur(18px);opacity:.35;
}
.img-badge{
  position:absolute;bottom:16px;left:16px;
  background:rgba(10,14,26,.85);backdrop-filter:blur(10px);
  border:1px solid var(--border);border-radius:14px;
  padding:10px 16px;font-size:13px;font-weight:700;display:flex;gap:8px;align-items:center;
}
.img-badge i{color:var(--accent2)}

/* text side */
.name-tag{
  display:inline-flex;align-items:center;gap:8px;
  background:rgba(55,140,63,.12);border:1px solid rgba(55,140,63,.35);
  color:#7ee2a0;border-radius:50px;padding:6px 16px;
  font-size:12px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;
  margin-bottom:16px;
}
.about-name{font-size:clamp(26px,4vw,36px);font-weight:900;letter-spacing:-.5px;margin-bottom:18px}
.about-desc{color:var(--muted);line-height:1.8;font-size:15.5px;margin-bottom:28px}

/* info grid */
.info-grid{
  display:grid;grid-template-columns:1fr 1fr;gap:12px 26px;
  margin-bottom:32px;
}
@media(max-width:576px){.info-grid{grid-template-columns:1fr}}
.info-item{
  background:rgba(255,255,255,.03);border:1px solid var(--border);
  border-radius:12px;padding:11px 16px;font-size:14px;
  display:flex;flex-direction:column;gap:2px;
}
.info-item label{
  font-size:11px;font-weight:800;letter-spacing:1.2px;text-transform:uppercase;
  color:var(--accent2);
}
.info-item span{color:var(--text);font-weight:600}
.info-item a{color:var(--text);text-decoration:none;font-weight:600}
.info-item a:hover{color:var(--accent2)}

/* buttons */
.btn-hero{
  display:inline-flex;align-items:center;gap:10px;
  padding:14px 36px;border-radius:50px;font-weight:700;font-size:14px;
  text-decoration:none;letter-spacing:.5px;transition:.35s;border:none;cursor:pointer;
}
.btn-primary-hero{
  background:linear-gradient(90deg,var(--accent),#2ea043);
  color:#fff;box-shadow:0 8px 30px rgba(55,140,63,.35);margin-right:12px;
}
.btn-primary-hero:hover{transform:translateY(-3px);box-shadow:0 12px 40px rgba(55,140,63,.55);color:#fff}
.btn-ghost{
  background:var(--card);color:#fff;border:1px solid var(--border);
  backdrop-filter:blur(8px);
}
.btn-ghost:hover{background:rgba(255,255,255,.1);border-color:var(--accent2);color:#fff;transform:translateY(-3px)}

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


<!-- ===== ABOUT ===== -->
<section class="about-wrap">
  <div class="section-title reveal">
    <h2>About <span>Me</span></h2>
    <p>In a nutshell..</p>
    <div class="divider"></div>
  </div>

  @foreach($about as $abouts)
  <div class="about-card reveal">
    <div class="about-grid">

      <!-- IMAGE -->
      <div class="img-side">
        <div class="img-glow"></div>
        <div class="img-frame" id="tiltImg">
          <img src="{{ asset($abouts->image) }}" alt="{{$abouts->fname}} {{$abouts->lname}}" />
        </div>
        <div class="img-badge"><i class="fa-solid fa-location-dot"></i> {{$abouts->city}}</div>
      </div>

      <!-- INFO -->
      <div>
        <span class="name-tag"><i class="fa-solid fa-bolt"></i> Web Developer</span>
        <h3 class="about-name">{{$abouts->fname}}&nbsp;{{$abouts->mname}}&nbsp;{{$abouts->lname}}</h3>
        <p class="about-desc">{{$abouts->descr}}</p>

        <div class="info-grid">
          <div class="info-item"><label>Birthday</label><span>{{$abouts->birthday}}</span></div>
          <div class="info-item"><label>Age</label><span>{{$abouts->age}}</span></div>
          <div class="info-item"><label>Email</label><span>{{$abouts->email}}</span></div>
          <div class="info-item"><label>Interests</label><span>{{$abouts->interests}}</span></div>
          <div class="info-item"><label>Website</label><span>{{$abouts->website}}</span></div>
          <div class="info-item"><label>Study</label><span>{{$abouts->study}}</span></div>
          <div class="info-item"><label>Twitter</label><a href="#">{{$abouts->twitter}}</a></div>
          <div class="info-item"><label>Degree</label><a href="mailto:harshchaludia@gmail.com">{{$abouts->degree}}</a></div>
          <div class="info-item"><label>Phone</label><a href="#">+1 682 230 2969</a></div>
          <div class="info-item"><label>City</label><a href="#">{{$abouts->city}}</a></div>
        </div>

        <div>
          <a href="#" class="btn-hero btn-primary-hero"><i class="fa-solid fa-download"></i> Download CV</a>
          <a href="contacts.html" class="btn-hero btn-ghost"><i class="fa-solid fa-paper-plane"></i> Send Message</a>
        </div>
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

/* 3D tilt on about image */
const tilt = document.getElementById('tiltImg');
if(tilt){
  tilt.parentElement.addEventListener('mousemove', e=>{
    const r = tilt.getBoundingClientRect();
    const x = (e.clientX - r.left)/r.width - .5;
    const y = (e.clientY - r.top)/r.height - .5;
    tilt.style.transform = `rotateY(${x*10}deg) rotateX(${-y*10}deg)`;
  });
  tilt.parentElement.addEventListener('mouseleave', ()=>{ tilt.style.transform='rotateY(0) rotateX(0)'; });
}

/* scroll reveal */
const io = new IntersectionObserver(es=>es.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('show'); }),{threshold:.15});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
</script>

@endsection