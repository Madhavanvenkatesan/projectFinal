// Array of image objects with their respective details
const images = [
    {
        name: 'portrait1',
        height: 1.5094,
        category: 'portrait'
    },
    {
        name: 'portrait2',
        height: 1.5023,
        category: 'portrait'
    },
    {
        name: 'portrait3',
        height: 1.3195,
        category: 'evenment'
    },
    {
        name: 'portrait4',
        height: 1.1307,
        category: 'portrait'
    },
    {
        name: 'portrait5',
        height: 1.4988,
        category: 'evenment'
    },
    {
        name: 'family1',
        height: 1.5384,
        category: 'family'
    },
    {
        name: 'family2',
        height: 1.5122,
        category: 'family'
    },
    {
        name: 'family3',
        height: 1.5226,
        category: 'family'
    },
    {
        name: 'family4',
        height: 1.5384,
        category: 'family'
    },
    {
        name: 'family5',
        height: 1.5122,
        category: 'family'
    },
    {
        name: 'family6',
        height: 1.5226,
        category: 'family'
    },
    {
        name: 'nature1',
        height: 1.5384,
        category: 'nature'
    },
    {
        name: 'nature2',
        height: 1.5122,
        category: 'nature'
    },
    {
        name: 'nature3',
        height: 1.5226,
        category: 'nature'
    },
    {
        name: 'nature4',
        height: 1.5384,
        category: 'nature'
    },
    {
        name: 'nature5',
        height: 1.5122,
        category: 'nature'
    },
    {
        name: 'nature6',
        height: 1.5226,
        category: 'nature'
    }
];

// Reference to the container where columns will be added
const containerRight = document.getElementById('containerRight');
// Array to hold the dynamically created columns
let columns = [];

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
    setImg('all');
}

// Function to set images into the columns
const setImg = (category) => {
    // Clear columns before adding new images
    columns.forEach(column => column.html.innerHTML = '');
    columns.forEach(column => column.height = 0);

    for (let i = 0; i < images.length; i++) {
        if (category == 'all'||images[i].category == category) {
            // Create a div element to hold the image
            const imageDiv = document.createElement('div');
            imageDiv.innerHTML = `<img src="assets/img/${images[i].name}.jpg" alt="sportImage">`;
            // Find the column with the smallest height and add the image to it
            const small = getSmallColumns();
            small.height += images[i].height;
            small.html.appendChild(imageDiv);
        }
    }
}


const categories = document.getElementsByClassName('category');
const categoryNames = ['portrait', 'family', 'nature', 'all'];

for (let i = 0; i < categories.length; i++) {
    categories[i].addEventListener('click', () => {
        setImg(categoryNames[i]);
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
