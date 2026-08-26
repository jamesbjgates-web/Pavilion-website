const b=document.querySelector('.nav-toggle'),n=document.querySelector('.main-nav');
b?.addEventListener('click',()=>{const o=n.classList.toggle('open');b.setAttribute('aria-expanded',o?'true':'false')});
document.querySelectorAll('.main-nav a').forEach(a=>a.addEventListener('click',()=>n?.classList.remove('open')));
document.querySelectorAll('#year').forEach(e=>e.textContent=new Date().getFullYear());