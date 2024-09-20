//Menu burger for slider
const slideLeft = document.getElementById('slideLeft');
const burgerDiv = document.getElementById('burgerDiv'); 
menuBurger.addEventListener('click', () => {
    slideLeft.classList.toggle('slideLeftActive');
    burgerDiv.classList.toggle('active');
});

//table for register base value of list inputs
lastEditedUser = null;


//click on update button to make field to editable
const list = document.getElementsByClassName('ul');
const update = document.getElementsByClassName('update');
for (let i = 0; i < update.length; i++) {
    update[i].addEventListener('click', () => {
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
    for (let i = 0; i < list.length; i++) {
        const validateButton = list[i].getElementsByClassName('validate-button')[0];
        //check if the last cliked field user id and current cliked user id are same
        if (lastEditedUser && validateButton.value === lastEditedUser.user) {
            //if its same, reset the field
            nonEditable(i, true);
        } else {
            nonEditable(i);
        }
    }
}

//function to change a field to editable
const editable = (i) => {
    list[i].classList.add('editable');
    const control = list[i].querySelectorAll('a');
    for (let x = 0; x < 4; x++) {
        control[x].classList.remove('active');
    }
    for (let x = 4; x < 6; x++) {
        control[x].classList.add('active');
    }
    const inputs = list[i].getElementsByClassName('input');

    const validateButton = list[i].getElementsByClassName('validate-button')[0];

    //get a base value from the input element for reset if not modified
    lastEditedUser = {
        user: validateButton.value,
        firstname: inputs[0].value,
        lastname: inputs[1].value,
        email: inputs[2].value,
        password: inputs[3].value,
    };

    for (let y = 0; y < inputs.length; y++) {
        inputs[y].disabled = false;
        inputs[y].classList.add('inputActive');
    }
}

//function to change a field to noneditable
const nonEditable = (i, reset = false) => {
    list[i].classList.remove('editable');
    const control = list[i].querySelectorAll('a');
    for (let x = 0; x < 4; x++) {
        control[x].classList.add('active');
    }
    for (let x = 4; x < 6; x++) {
        control[x].classList.remove('active');
    }
    const inputs = list[i].getElementsByClassName('input');


    //apply a base value to the input element if not modified
    if (reset) {
        inputs[0].value = lastEditedUser.firstname;
        inputs[1].value = lastEditedUser.lastname;
        inputs[2].value = lastEditedUser.email;
        inputs[3].value = lastEditedUser.password;
    }

    for (let y = 0; y < inputs.length; y++) {
        inputs[y].disabled = true;
        inputs[y].classList.remove('inputActive');
    }
}
