const eventsMenuBtn = document.querySelector('.events-menu')
const eventsMenu = document.querySelector('.mega-menu')
const header = document.querySelector('header')

// mobile menu toggle
function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    if(menu.style.display === 'flex'){
        menu.style.display = 'none'
        header.classList.remove('header-scrolled')
    }else{
        menu.style.display = 'flex'
        header.classList.add('header-scrolled')
    }
}
// mega menu hover
eventsMenuBtn.addEventListener('mouseover',()=>{
    eventsMenu.style.display = eventsMenu.style.display==='none'?'block':'none'
})
// scroll haeder change color
window.addEventListener('scroll',() => {
  if(window.scrollY>0){
    header.classList.add('header-scrolled')
  }
  else
  {
    header.classList.remove('header-scrolled')
  }
})