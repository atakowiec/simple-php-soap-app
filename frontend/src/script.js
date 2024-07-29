function fetchAndRender(city = "Lublin") {
    $.ajax(`http://localhost:6001/get_weather.php?city=${city}`)
        .done((data => render(city, JSON.parse(data))))
}

function render(city, data) {
    if(data.cod !== 200)
        return alert(data.message)

    const weatherInfo = data.weather[0]
    const weatherData = data.main

    $('#cityName').text(city)
    $('#weather').text(`Weather: ${weatherInfo.main}`)
    $('#description').text(`${weatherInfo.description}`)
    $('#temperature').text(`Temperature: ${weatherData.temp} °C`)
    $('#pressure').text(`Pressure: ${weatherData.pressure} hPa`)
    $('#humidity').text(`Humidity: ${weatherData.humidity} %`)
    $('#wind').text(`Wind: ${data.wind.speed} m/s`)

}

fetchAndRender()

function onSubmit() {
    const city = $('#city')
    fetchAndRender(city.val())
}