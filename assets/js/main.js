(() => {
 const toggle=document.getElementById('themeToggle');
 const saved=localStorage.getItem('pixelnest-theme');
 if(saved==='light') document.body.classList.add('light-theme');
 if(toggle){toggle.textContent=document.body.classList.contains('light-theme')?'☾':'☼';toggle.addEventListener('click',()=>{document.body.classList.toggle('light-theme');const light=document.body.classList.contains('light-theme');toggle.textContent=light?'☾':'☼';localStorage.setItem('pixelnest-theme',light?'light':'dark');});}
 const params=new URLSearchParams(location.search);
 if(params.get('sent')==='1'){const box=document.createElement('div');box.className='container mt-3';box.innerHTML='<div class="alert alert-success" role="status">Thank you! Your enquiry has been received. I will contact you soon.</div>';document.querySelector('#contact .container')?.prepend(box);}
 const observer=new IntersectionObserver(entries=>entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('is-visible');observer.unobserve(entry.target);}}),{threshold:.12});
 document.querySelectorAll('.service-card,.project-card,.price-card').forEach(el=>{el.style.opacity='0';el.style.transform='translateY(16px)';el.style.transition='opacity .6s ease, transform .6s ease';observer.observe(el);});
 document.querySelectorAll('.is-visible').forEach(el=>{el.style.opacity='1';el.style.transform='none';});
 const style=document.createElement('style');style.textContent='.is-visible{opacity:1!important;transform:translateY(0)!important}';document.head.append(style);
})();
