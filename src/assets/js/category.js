// This variable stores the last edited category, so the user can reset the input field if needed
lastEditedCategory = null;

// Get all category lists and update buttons
const lists = document.getElementsByClassName('catList');
const update = document.getElementsByClassName('update');

// Add an event listener to each "update" button to allow editing the category
for (let i = 0; i < update.length; i++) {
    update[i].addEventListener('click', (e) => {
        e.preventDefault();  
        nonEditableAll();     
        editable(i);        
    });
};

// Add event listeners to all "cancel" buttons to cancel editing
const cancel = document.getElementsByClassName('cancel');
for (let i = 0; i < cancel.length; i++) {
    cancel[i].addEventListener('click', () => {
        nonEditable(i, true); 
    });
}

// This function makes all category fields non-editable, except the one being edited
const nonEditableAll = () => {
    for (let i = 0; i < lists.length; i++) {
        const validateButton = lists[i].getElementsByClassName('validate-button')[0];
        
        // Check if the last clicked category is the same as the one currently being edited
        if (lastEditedCategory && validateButton.value === lastEditedCategory.catId) {
            // If they are the same, reset the field to its original value
            nonEditable(i, true);
        } else {
            // Otherwise, set the field to non-editable
            nonEditable(i);
        }
    }
}

// This function makes a specific category field editable
const editable = (i) => {
    const control = lists[i].querySelectorAll('a'); 
    
    // Hide the first 3 buttons (edit,delete and upload) during editing
    for (let x = 0; x < 3; x++) {
        control[x].classList.remove('act');
    }
    // Show the next 2 buttons (like "validate" and "cancel")
    for (let x = 3; x < 5; x++) {
        control[x].classList.add('act');
    }

    // Get all input fields for the current category list item
    const inputs = lists[i].getElementsByClassName('input');
    const validateButton = lists[i].getElementsByClassName('validate-button')[0];

    // Save the original values in case the user cancels the edit
    lastEditedCategory = {
        catId: validateButton.value,
        name: inputs[0].value,
    };

    // Enable the input fields to allow editing
    for (let y = 0; y < inputs.length; y++) {
        inputs[y].disabled = false;
        inputs[y].classList.add('actInput'); 
    }
}

// This function makes a specific category field non-editable
const nonEditable = (i, reset = false) => {
    const control = lists[i].querySelectorAll('a'); 

    // Show the first 3 buttons (edit,delete and upload)
    for (let x = 0; x < 3; x++) {
        control[x].classList.add('act');
    }
    // Hide the next 2 buttons (like "validate" and "cancel")
    for (let x = 3; x < 5; x++) {
        control[x].classList.remove('act');
    }

    // Get all input fields for the current category list item
    const inputs = lists[i].getElementsByClassName('input');

    // If the reset parameter is true, restore the original values
    if (reset) {
        inputs[0].value = lastEditedCategory.name;
    }

    // Disable the input fields to prevent editing
    for (let y = 0; y < inputs.length; y++) {
        inputs[y].disabled = true;
        inputs[y].classList.remove('actInput'); 
    }
}
