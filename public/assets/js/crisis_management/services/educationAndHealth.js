function handleKeyDown(event,inputFieldsID,inputContainerID,name) {
    // Check if the pressed key is Enter

    if (event.key === "Enter") {
        
        const inputField = event.target;

        // If the input is not empty, add a new input field
        if (inputField.value.trim() !== "") {
            addInputField(inputFieldsID,inputContainerID,name);
        }
    }
}

function handleFocus(event,inputFieldsID,inputContainerID) {
   
    const inputField = event.target;
    const inputFieldsContainer = document.getElementById(inputFieldsID);
    const inputContainers = inputFieldsContainer.querySelectorAll('.input-container'+inputContainerID);

    // If the focused field is not the last one and there is a last empty input, remove it
    if (inputField !== inputFieldsContainer.lastElementChild.querySelector('input')) {
        const lastInputField = inputFieldsContainer.lastElementChild.querySelector('input');
        if (lastInputField.value.trim() === "") {
            inputFieldsContainer.lastElementChild.remove();
           
        }
    }
}

function addInputField(inputFieldsID,inputContainerID,name) {
    const inputFieldsContainer = document.getElementById(inputFieldsID);

    // Check if the last input is not empty before adding a new one
    const lastInputField = inputFieldsContainer.lastElementChild.querySelector('input');
    if (lastInputField && lastInputField.value.trim() === "") {
        return; // If the last input is empty, do not add a new one
    }

    // Create a new input container
    const newInputContainer = document.createElement('div');
    newInputContainer.className = 'input-container'+inputContainerID;

    // Create a new input element
    const newInputField = document.createElement('input');
    newInputField.type = 'text';
    newInputField.placeholder = system_translation['Enter another one'];
    newInputField.onkeydown = (event) => handleKeyDown(event, inputFieldsID, inputContainerID,name);
    newInputField.onfocus = (event) => handleFocus(event, inputFieldsID, inputContainerID);
    newInputField.name = name+"s[][name]";
    newInputField.className = ' form-control form-control-solid form-control-lg m-2';

    // Add the new input field to the container
    newInputContainer.appendChild(newInputField);

    // Add the new input container to the input fields
    inputFieldsContainer.appendChild(newInputContainer);

    // Focus the new input field
    newInputField.focus();
}



function toggleCostField() {
const selectElement = document.getElementById("costSelection");
const costField = document.getElementById("costField");

// تحقق من قيمة الخيار المختار
if (selectElement.value === "charged") {
costField.style.display = "block"; // إظهار حقل التكلفة
} else {
costField.style.display = "none"; // إخفاء حقل التكلفة
}
}