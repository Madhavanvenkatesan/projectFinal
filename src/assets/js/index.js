// Select the header element
const header = document.querySelector('header');

// Add event listener to window to detect scrolling
window.addEventListener("scroll", function() {
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

// Add event listener to the "next" button
next.addEventListener('click', () => {
    // Get all elements with the class 'item'
    let items = document.getElementsByClassName('item');
    // Move the first item to the end of the carousel
    document.getElementsByClassName('slide')[0].appendChild(items[0]);
});

// Add event listener to the "prev" button
prev.addEventListener('click', () => {
    // Get all elements with the class 'item'
    let items = document.getElementsByClassName('item');
    // Move the last item to the front of the carousel
    document.getElementsByClassName('slide')[0].prepend(items[items.length - 1]);
});
