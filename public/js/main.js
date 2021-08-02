//Define the variables to store minus and plus buttons
const minuses = document.querySelectorAll('#minus');
const pluses = document.querySelectorAll('#plus');

//Decrease the value of input field by clicking on minus button
for (let minus of minuses) {
    minus.addEventListener('click', () => {
        let quantity = minus.nextElementSibling;
        if (quantity.value !== '1') {
            quantity.value--;
        }
    });
}

//Increase the value of input field by clicking on plus button
for (let plus of pluses) {
    plus.addEventListener('click', () => {
        let quantity = plus.previousElementSibling;
        quantity.value++;
    });
}
