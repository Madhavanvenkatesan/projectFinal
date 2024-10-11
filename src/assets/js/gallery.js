
// Reference to the container where columns will be added
const containerRight = document.getElementById('containerRight');
// Array to hold the dynamically created columns
let columns = [];
// Variable to keep track of the current category
let currentCategory = 'all';

// Function to find the column with the smallest height
const getSmallColumns = () => {
    let result = columns[0];
    for (let i = 1; i < columns.length; i++) {
        // Check if the current column has a smaller height compared to the next column
        if (result.height - 0.1 > columns[i].height) {
            result = columns[i];
        }
    }
    return result;
}

// Function to initialize the columns based on the number of columns required
const initColumns = (noOfColumns) => {
    // If the current number of columns is equal to the required number of columns, do nothing
    if (noOfColumns == columns.length) return;

    // Clear the container and reset the columns array
    containerRight.innerHTML = '';
    columns = [];

    // Create the required number of columns
    for (let i = 0; i < noOfColumns; i++) {
        // Create a new div element for each column
        let column = document.createElement('div');
        column.classList.add('column');
        containerRight.appendChild(column);
        // Store the created column in the array
        columns.push({
            html: column,
            height: 0,
        });
    }
    // Add images to the columns
    setImg(currentCategory);
}

/**
 * Function to set images into the columns
 * @param {string} category category to display
 */
const setImg = (category) => {
    // Clear columns before adding new images
    columns.forEach(column => column.html.innerHTML = '');
    columns.forEach(column => column.height = 0);

    for (let i = 0; i < images.length; i++) {
        // Check if the image belongs to the selected category or if it's in all categories
        if (category == 'all' || images[i].category == category) {
            // Create a div element to hold the image
            const imageDiv = document.createElement('div');
            imageDiv.innerHTML = `<img src="../assets/img/uploads/${images[i].name}" alt="Image">`;
            // Find the column with the smallest height and add the image to it
            const small = getSmallColumns();

            small.height += images[i].height;
            small.html.appendChild(imageDiv);
        }
    }
}

const categories = document.getElementsByClassName('category'); // Select all elements with the class 'category'

for (let i = 0; i < categories.length; i++) { // Loop through each category element
    categories[i].addEventListener('click', () => { // Add a click event listener to the current category
        currentCategory = categories[i].getAttribute('id_cat');
        setImg(categories[i].getAttribute('id_cat')); // Call setImg function with the category's id attribute
    });
}



// Function to initialize the gallery based on the window width
const initGallery = () => {
    if (window.innerWidth > 860) {
        initColumns(4); // Use 4 columns for wide screens
    } else if (window.innerWidth > 660) {
        initColumns(3); // Use 3 columns for medium screens
    } else if (window.innerWidth > 500) {
        initColumns(2); // Use 2 columns for smaller screens
    } else {
        initColumns(1); // Use 1 column for very small screens
    }
}

// Initialize the gallery on page load
initGallery();
// Reinitialize the gallery whenever the window is resized
window.addEventListener('resize', initGallery);
