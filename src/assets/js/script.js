// Select elements for the navigation menu burger functionality
const menuBurger = document.getElementById('menuBurger'); // The burger icon button
const navList = document.getElementById('navList'); // The navigation list
const burgerDiv = document.getElementById('burgerDiv'); // The div for the burger icon's styling

// Add a click event listener to the menu burger icon
menuBurger.addEventListener('click', () => {
    // Toggle the class 'navListActive' to show or hide the navigation list
    navList.classList.toggle('navListActive');
    
    // Toggle the class 'active' to animate the burger icon (e.g., turning into 'X' or back to burger)
    burgerDiv.classList.toggle('active');
});



// Menu burger functionality for the slider in the administrator panel
const slideLeft = document.getElementById('slideLeft'); // The sliding sidebar menu

// Add a second click event listener to the same burger menu button
menuBurger.addEventListener('click', () => {
    // Toggle the class 'slideLeftActive' to show or hide the slide menu in the admin panel
    slideLeft.classList.toggle('slideLeftActive');
    
    // Toggle the 'active' class to change the burger icon's state (same effect as above)
    burgerDiv.classList.toggle('active');
});
