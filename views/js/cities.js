let country = document.getElementById('country')
country.onchange = () => {
  let choose = country.value
  $.ajax({
    data: {country:choose},
    url: 'sign_up.php',
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
