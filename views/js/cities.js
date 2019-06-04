let country = document.getElementById('country')
let source = document.getElementsByTagName('title')
let paths = {
  sign : 'sign_up.php',
  direction : 'add_direction.php'
}
country.onchange = () => {
  let path
  if (source[0].innerHTML === 'Add direction') {
    path = paths.direction
  }else {
    path = paths.sign
  }

  let choose = country.value
  $.ajax({
    data: {country:choose},
    url: path,
    type: 'GET',
    success: function (res) {
      let jsonRes = JSON.parse(res)
      if (jsonRes.success) {
        let cities = document.getElementById('city')
        cities.innerHTML = '';
        for (var i = 0; i < jsonRes.cities.length; i++) {
          let option = document.createElement('option')
          option.value = jsonRes.cities[i]['idCiudad']
          option.innerHTML = jsonRes.cities[i]['ciudad']
          cities.appendChild(option)
        }
      }
    }
  })
}
