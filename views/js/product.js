let add_ingredient = document.getElementById('add-ingredient')
let ingredients = document.getElementById('ingredients')
let count = 0;
add_ingredient.addEventListener('click', function(e) {
  count ++
  let selectIngredients = document.createElement('select')
  selectIngredients.name = `ingredient[${count}]`
  for (var i = 0; i < ingredients.length; i++) {
    let option = document.createElement('option');
    option.value = ingredients[i].value
    option.innerHTML = ingredients[i].innerHTML
    selectIngredients.appendChild(option)
  }
  ingredients.insertAdjacentElement('afterend',selectIngredients)

})
