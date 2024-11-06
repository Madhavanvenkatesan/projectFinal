// Select the header element
const header = document.querySelector('header');

// Add event listener to window to detect scrolling
window.addEventListener("scroll", function () {
    // If the user has scrolled down, add border-radius to the bottom of the header
    if (window.scrollY !== 0) {
        header.style.borderRadius = "0 0 2rem 2rem"; // Rounded corners on the bottom
    } else {
        // Reset the border-radius when scrolled back to the top
        header.style.borderRadius = "0"; // No rounded corners
    }
});


// Carousel functionality

// Select the "next" and "prev" buttons
const next = document.getElementById('next');
const prev = document.getElementById('prev');

// Select all elements with the class'slide'
const slides = document.getElementsByClassName('slide')[0];

// Get all elements with the class 'item'
const items = document.getElementsByClassName('item');

// Add event listener to the "next" button
next.addEventListener('click', () => {
    // Move the first item to the end of the carousel
    slides.appendChild(items[0]);
});

// Add event listener to the "prev" button
prev.addEventListener('click', () => {
    // Move the last item to the front of the carousel
    slides.prepend(items[items.length - 1]);
});
