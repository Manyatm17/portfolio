document.addEventListener('DOMContentLoaded', function(){
  // smooth scroll for nav links
  document.querySelectorAll('a[href^="#"]').forEach(a=>{
    a.addEventListener('click', function(e){
      const href = this.getAttribute('href');
      if(href.startsWith('#')){
        e.preventDefault();
        const el = document.querySelector(href);
        if(el) el.scrollIntoView({behavior:'smooth', block:'start'});
      }
    });
  });
  // nav toggle
  const toggle = document.getElementById('nav-toggle');
  const nav = document.querySelector('.nav');
  toggle && toggle.addEventListener('click', ()=>{
    if(getComputedStyle(nav).display==='none' || nav.style.display==='flex') nav.style.display = nav.style.display==='flex' ? 'none' : 'flex';
    else nav.style.display = 'flex';
  });
});

function validateForm(){
  const name = document.getElementById('name')?.value.trim();
  const email = document.getElementById('email')?.value.trim();
  const msg = document.getElementById('msg')?.value.trim();
  if(!name||!email||!msg){ alert('Please fill all fields'); return false; }
  return true;
}
