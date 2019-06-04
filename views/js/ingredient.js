var modifiableRadio = document.getElementsByName('modifiable')
var modifiableForm = document.getElementsByClassName('modifiable-form')
var count = 0;
for (var i=0; i<modifiableRadio.length; i++) {
  modifiableRadio[i].addEventListener('change', function(e) {
    if (this.value === 'yes') {
      let type = document.createElement('select')
      type.name = 'modifiable-type'
      for (var j = 0; j < 3; j++) {
        let option = document.createElement('option')
        option.value = j+1
        switch (j+1) {
          case 1:
            option.appendChild(document.createTextNode('Agregar'))
            break;
          case 2:
            option.appendChild(document.createTextNode('Quitar'))
            break;
          case 3:
            option.appendChild(document.createTextNode('Remplazar'))
            break;
          default:
        }
        type.appendChild(option)
      }
      modifiableForm[0].appendChild(type)
      type.onchange = ()=>{
        if (type.value === '3') {
          let ingredient = true
          $.ajax({
            data: {ingredients:ingredient},
            url: 'add_ingredient.php',
            type: 'GET',
            success: function (res) {
              let jsonRes = JSON.parse(res)
              if (jsonRes.success) {
                let replacement = document.createElement('select')
                replacement.name = 'replacement'
                let textReplacement = document.createElement('label');
                textReplacement.innerHTML = 'Por cual ingrediente desea que sea remplazado'
                for (var i = 0; i < jsonRes.ingredients.length; i++) {
                  let option = document.createElement('option')
                  option.value = jsonRes.ingredients[i].id
                  option.innerHTML = jsonRes.ingredients[i].name
                  replacement.appendChild(option);
                }
                modifiableForm[0].appendChild(textReplacement)
                modifiableForm[0].appendChild(replacement)
              }
            }
          })
        } else {
          childrens = modifiableForm[0].childNodes
          if (count === 0) {
            modifiableForm[0].removeChild(childrens[0])
            count++
          }
          if (childrens.length > 1) {
              alert(childrens.length)
            modifiableForm[0].removeChild(childrens[1])
            modifiableForm[0].removeChild(childrens[1])
          }
        }
      }
    }else{
      modifiableForm[0].innerHTML = ''
    }
  });
}
