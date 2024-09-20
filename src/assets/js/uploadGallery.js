
//table for register base value of list inputs
lastEditedCategory = null;


//click on update button to make field to editable
const lists = document.getElementsByClassName('catList');
const update = document.getElementsByClassName('update');
for (let i = 0; i < update.length; i++) {
    update[i].addEventListener('click', (e) => {
        e.preventDefault();

        nonEditableAll();
        editable(i);     
    });
};

//click on cancel button to make field to noneditable
const cancel = document.getElementsByClassName('cancel');
for (let i = 0; i < cancel.length; i++) {
    cancel[i].addEventListener('click', () => {
        nonEditable(i, true);
    });
}

//function to change all other fields to non editable without - selected one
const nonEditableAll = () => {
    for (let i = 0; i < lists.length; i++) {
        const validateButton = lists[i].getElementsByClassName('validate-button')[0];
        //check if the last cliked field user id and current cliked user id are same
        if (lastEditedCategory && validateButton.value === lastEditedCategory.catId) {
            //if its same, reset the field
            nonEditable(i, true);
        } else {
            nonEditable(i);
        }
    }
}

//function to change a field to editable
const editable = (i) => {
    const control = lists[i].querySelectorAll('a');
    for (let x = 0; x < 3; x++) {
        control[x].classList.remove('act');
    }
    for (let x = 3; x < 5; x++) {
        control[x].classList.add('act');
    }
    const inputs = lists[i].getElementsByClassName('input');

    const validateButton = lists[i].getElementsByClassName('validate-button')[0];

    //get a base value from the input element for reset if not modified
    lastEditedCategory = {
        catId: validateButton.value,
        name: inputs[0].value,
    };

    for (let y = 0; y < inputs.length; y++) {
        inputs[y].disabled = false;
        inputs[y].classList.add('actInput');
    }
}

//function to change a field to noneditable
const nonEditable = (i, reset = false) => {
    
    const control = lists[i].querySelectorAll('a');
    for (let x = 0; x < 3; x++) {
        control[x].classList.add('act');
    }
    for (let x = 3; x < 5; x++) {
        control[x].classList.remove('act');
    }
    const inputs = lists[i].getElementsByClassName('input');


    //apply a base value to the input element if not modified
    if (reset) {
        inputs[0].value = lastEditedCategory.name;
    }

    for (let y = 0; y < inputs.length; y++) {
        inputs[y].disabled = true;
        inputs[y].classList.remove('actInput');
    }
}
