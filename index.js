const eventsMenuBtn = document.querySelector('.events-menu')
const eventsMenu = document.querySelector('.mega-menu')
const header = document.querySelector('header')

// mobile menu toggle
function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    const hamburger = document.querySelector('#hamburger')
    if(menu.style.display === 'flex'){
        menu.style.display = 'none'
        header.classList.remove('header-scrolled')
        hamburger.classList.remove('hamburger-clicked')
    }else{
        menu.style.display = 'flex'
        header.classList.add('header-scrolled')
        hamburger.classList.add('hamburger-clicked')
    }
}
// mega menu hover
eventsMenuBtn.addEventListener('mouseover',()=>{
    eventsMenu.style.display = eventsMenu.style.display==='none'?'block':'none'
})
// hide mega menu
function hideMega(){
    eventsMenu.style.display ='none'
}
// scroll haeder change color
window.addEventListener('scroll',() => {
  if(window.scrollY>100){
    header.classList.add('header-scrolled')
  }
  else
  {
    header.classList.remove('header-scrolled')
  }
})

// timer
let endDate = new Date("Nov 28, 2024 00:00:00").getTime()
x=setInterval(() => {
  let now = new Date().getTime()
  let timeRemaining = endDate-now
  let days = Math.floor(timeRemaining/(1000*60*60*24))
  let hours = Math.floor((timeRemaining%(1000*60*60*24))/(1000*60*60))
  let minutes = Math.floor(((timeRemaining%(1000*60*60*24))%(1000*60*60))/(1000*60))
  let seconds = Math.floor((((timeRemaining%(1000*60*60*24))%(1000*60*60)%(1000*60))/1000))
  if(timeRemaining>0){
    document.querySelector('#days').innerHTML=days.toString().length==1?`0${days}:`:days+':'
    document.querySelector('#hours').innerHTML=hours.toString().length==1?`0${hours}:`:hours+':'
    document.querySelector('#mins').innerHTML=minutes.toString().length==1?`0${minutes}:`:minutes+':'
    document.querySelector('#secs').innerHTML=seconds.toString().length==1?`0${seconds}`:seconds
  }


},1000)
