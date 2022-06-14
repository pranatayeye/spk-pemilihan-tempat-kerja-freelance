const alternatif = document.querySelector('#alternatif');
const key = document.getElementsByClassName('key');

alternatif.addEventListener('keyup',function(){
	for (var i = 0; i < key.length; i++) {
		key[i].innerHTML = alternatif.value[0].toUpperCase() + alternatif.value.slice(1);
	}
	
});

window.addEventListener('load',function(){
	for (var i = 0; i < key.length; i++) {
		key[i].innerHTML = alternatif.value[0].toUpperCase() + alternatif.value.slice(1);
	}
	
});
