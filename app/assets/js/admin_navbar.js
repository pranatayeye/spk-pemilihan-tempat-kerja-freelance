// Navbar
const toggler1 = document.querySelector('#toggler-btn');
const sidebar1 = document.querySelector('#sidebar1');
const container1 = document.querySelector('.my-container');

toggler1.addEventListener('click',function(){
	sidebar1.classList.toggle('active-nav');
	container1.classList.toggle('active-cont');
})





