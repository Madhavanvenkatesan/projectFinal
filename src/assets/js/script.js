//Menu burger for nav bar
const menuBurger = document.getElementById('menuBurger');
const navList = document.getElementById('navList');
const burgerDiv = document.getElementById('burgerDiv'); 

menuBurger.addEventListener('click',() => {
    navList.classList.toggle('navListActive');
    burgerDiv.classList.toggle('active');
    console.log('cliked');
    
});

