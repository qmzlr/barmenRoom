let ingredientsList = document.querySelector('.ingredients-list');
let index = 0;

function addIngredient() {
    index++;
    let newIngredientItem = document.querySelector('.ingredient-item').cloneNode(true);
    newIngredientItem.querySelector('input[name="ingredients[0][name]"]').name = `ingredients[${index}][name]`;
    newIngredientItem.querySelector('input[name="ingredients[0][quantity]"]').name = `ingredients[${index}][quantity]`;
    newIngredientItem.querySelector('input[name="ingredients[0][unit]"]').name = `ingredients[${index}][unit]`;
    ingredientsList.appendChild(newIngredientItem);
}

function removeIngredient() {
    if (index > 0) {
        let lastIngredientItem = ingredientsList.lastElementChild;
        lastIngredientItem.remove();
        index--;
    }
}
