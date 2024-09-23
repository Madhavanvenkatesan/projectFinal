// Variable to store the last user that was edited, used for reset if needed
let lastEditedUser = null;

// Get all list elements and update buttons
const list = document.getElementsByClassName('ul');
const update = document.getElementsByClassName('update');

// Add click event listener to each update button to make fields editable
for (let i = 0; i < update.length; i++) {
    update[i].addEventListener('click', () => {
        // Set all other fields to non-editable
        nonEditableAll();
        // Make the current field editable
        editable(i);
    });
}

// Get all cancel buttons
const cancel = document.getElementsByClassName('cancel');

// Add click event listener to each cancel button to make fields non-editable and reset values if needed
for (let i = 0; i < cancel.length; i++) {
    cancel[i].addEventListener('click', () => {
        nonEditable(i, true); // Reset fields to original values
    });
}

// Function to make all fields non-editable, except the currently selected one
const nonEditableAll = () => {
    for (let i = 0; i < list.length; i++) {
        const validateButton = list[i].getElementsByClassName('validate-button')[0];
        
        // If the last edited user matches the current user, reset the field
        if (lastEditedUser && validateButton.value === lastEditedUser.user) {
            nonEditable(i, true); // Reset values if the user is the same as the last edited one
        } else {
            nonEditable(i); // Simply make the field non-editable
        }
    }
}

// Function to make a specific field editable
const editable = (i) => {
    // Add 'editable' class to visually indicate the field is being edited
    list[i].classList.add('editable');

    // Get all control elements in the current field
    const control = list[i].querySelectorAll('a');
    
    // Hide the first set of controls (update, delete, profile, upload)
    for (let x = 0; x < 4; x++) {
        control[x].classList.remove('active');
    }

    // Show the second set of controls (validate, cancel)
    for (let x = 4; x < 6; x++) {
        control[x].classList.add('active');
    }

    // Get all input fields in the current list item
    const inputs = list[i].getElementsByClassName('input');
    const validateButton = list[i].getElementsByClassName('validate-button')[0];

    // Store the current values of the inputs for potential reset if the edit is cancelled
    lastEditedUser = {
        user: validateButton.value,
        firstname: inputs[0].value,
        lastname: inputs[1].value,
        email: inputs[2].value,
        password: inputs[3].value,
    };

    // Enable all input fields and add a class to visually indicate they are editable
    for (let y = 0; y < inputs.length; y++) {
        inputs[y].disabled = false;
        inputs[y].classList.add('inputActive');
    }
}

// Function to make a specific field non-editable and optionally reset it to its original value
const nonEditable = (i, reset = false) => {
    // Remove 'editable' class to indicate the field is no longer being edited
    list[i].classList.remove('editable');

    // Get all control elements in the current field
    const control = list[i].querySelectorAll('a');
    
    // Show the first set of controls again (update, delete, etc.)
    for (let x = 0; x < 4; x++) {
        control[x].classList.add('active');
    }

    // Hide the second set of controls (validate, cancel)
    for (let x = 4; x < 6; x++) {
        control[x].classList.remove('active');
    }

    // Get all input fields in the current list item
    const inputs = list[i].getElementsByClassName('input');

    // If reset is true, restore the input fields to their original values
    if (reset) {
        inputs[0].value = lastEditedUser.firstname;
        inputs[1].value = lastEditedUser.lastname;
        inputs[2].value = lastEditedUser.email;
        inputs[3].value = lastEditedUser.password;
    }

    // Disable all input fields and remove the 'inputActive' class
    for (let y = 0; y < inputs.length; y++) {
        inputs[y].disabled = true;
        inputs[y].classList.remove('inputActive');
    }
}
