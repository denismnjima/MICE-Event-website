const eventsMenuBtn = document.querySelector('.events-menu')
const eventsMenu = document.querySelector('.mega-menu')
const header = document.querySelector('header')
const scheduleBth1 = document.querySelector('#choice1')
const scheduleBtn2 = document.querySelector('#choice2')


document.addEventListener('DOMContentLoaded', function() {
  const revealItems = document.querySelectorAll('.reveal-item');

  function revealOnScroll() {
    const viewportHeight = window.innerHeight;

    revealItems.forEach(item => {
      const { top, bottom } = item.getBoundingClientRect();

      if (top < viewportHeight && bottom >= 0) {
        item.classList.add('visible');
      } else {
        item.classList.remove('visible');
      }
    });
  }

  window.addEventListener('scroll', revealOnScroll);
  revealOnScroll(); // Initial check in case elements are already in view
});
// contact form
document.getElementById('contactForm').addEventListener('submit', function(e) {
  e.preventDefault();

  // Gather form data
  let formData = new FormData(this);
  alert('submitted')
  // Create an AJAX request
  fetch('./services/contact.php', {
      method: 'POST',
      body: formData
  })
  .then(response => response.text()) // Assuming PHP returns plain text
  .then(data => {
      // Display success or error messages in the formResponse div
      document.getElementById('formResponse').innerHTML = `<p style="color: green;">${data}</p>`;
  })
  .catch(error => {
      document.getElementById('formResponse').innerHTML = `<p style="color: red;">There was an error submitting the form.</p>`;
  });
});
// Toggle schedule days
function toggleShedule(num){
  if(num==2){
    scheduleBtn2.classList.add('selected')
    scheduleBth1.classList.remove('selected')
  }
  else{
    scheduleBtn2.classList.remove('selected')
    scheduleBth1.classList.add('selected')
  }

}
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
