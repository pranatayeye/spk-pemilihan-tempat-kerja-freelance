// Navbar
const toggler = document.querySelector('#toggler-btn');
const sidebar = document.querySelector('#sidebar');
const container = document.querySelector('.my-container');

toggler.addEventListener('click',function(){
	sidebar.classList.toggle('active-nav');
	container.classList.toggle('active-cont');
})





