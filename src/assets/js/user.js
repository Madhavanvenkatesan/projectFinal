// Store all image sources in an array
const imgSrcs = [];
const imgs = document.querySelectorAll("img"); // Select all image elements on the page

// Loop through all images and add their source URLs to the imgSrcs array
for (let i = 0; i < imgs.length; i++) {
    imgSrcs.push(imgs[i].src);
}

// Event listener for "Download All" button to download all images
const downloadAll = document.getElementById('downloadAll');
downloadAll.addEventListener('click', () => {
    // Loop through the imgSrcs array and download each image
    for (let i = 0; i < imgSrcs.length; i++) {
        const imageUrl = imgSrcs[i];
        download(imageUrl); // Call the download function to download the image
    }
});

// Array to keep track of selected images
let selectedImages = [];

// Add event listener to each image to handle selection
for (let i = 0; i < imgs.length; i++) {
    imgs[i].addEventListener('click', () => {
        // Check if the image is already selected
        if (selectedImages.includes(imgs[i].src)) {
            // If selected, remove from selectedImages array
            selectedImages.splice(selectedImages.indexOf(imgs[i].src), 1);
        } else {
            // If not selected, add it to the selectedImages array
            selectedImages.push(imgs[i].src);
        }

        // Toggle the 'selected' class to highlight the selected image
        imgs[i].classList.toggle('selected');

        // Hide the "Download All" button and show the "Download Selected" and "Cancel" buttons
        downloadAll.style.display = 'none';
        downloadBtn.style.display = 'block';
        cancel.style.display = 'block';
    });
}

// Event listener for the "Download Selected" button
const downloadBtn = document.getElementById('download');
downloadBtn.addEventListener('click', () => {
    // Loop through selected images and download each
    for (let i = 0; i < selectedImages.length; i++) {
        const imageUrl = selectedImages[i];
        download(imageUrl); // Call the download function for each selected image
    }
});

// Event listener for the "Cancel" button to deselect all images
const cancel = document.getElementById('cancel');
cancel.addEventListener('click', () => {
    if (selectedImages.length > 0) {
        // Remove the 'selected' class from each image
        for (let i = 0; i < imgs.length; i++) {
            imgs[i].classList.remove('selected');
        }
    }
    // Reset the selectedImages array to an empty array
    selectedImages = [];

    // Show the "Download All" button and hide the "Download Selected" and "Cancel" buttons
    downloadAll.style.display = 'block';
    downloadBtn.style.display = 'none';
    cancel.style.display = 'none';
});

// Function to download an image using its URL
const download = (imageUrl) => {
    // Extract the file name from the URL
    const fileName = imageUrl.substring(imageUrl.lastIndexOf('/') + 1);
    console.log(fileName);

    // Create an anchor element to trigger the download
    const link = document.createElement('a');
    link.href = imageUrl;
    link.download = fileName; // Use the extracted file name for download
    document.body.appendChild(link); // Append the link to the DOM
    link.click(); // Trigger the click event to start the download
    document.body.removeChild(link); // Remove the link after the download is triggered
}
