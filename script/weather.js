
let userSearch = document.getElementById(`userSearch`),
    weatherSearchButton = document.getElementById(`weatherSearchButton`),
    accurateWeather = document.getElementById(`accurateWeather`),
    city = document.getElementById(`city`),
    date = document.getElementById(`date`),
    preIMG = document.getElementById(`preIMG`),
    weatherIMG = document.getElementById(`weatherIMG`),
    degree = document.getElementById(`degree`),
    minT = document.getElementById(`minT`),
    maxT = document.getElementById(`maxT`),
    windSpeed = document.getElementById(`windSpeed`);

let lat = 0,
    lon = 0,
    now = 0,
    timeZone = 0,
    utc = ``;


let divHourlyWeather = document.getElementById(`divHourlyWeather`),
    weatherTime = document.getElementById(`weatherTime`),
    hourlyImages = document.getElementById(`hourlyImages`),
    hourlyForecast = document.getElementById(`hourlyForecast`),
    hourlyTemp = document.getElementById(`hourlyTemp`),
    hourlyWind = document.getElementById(`hourlyWind`),
    dayToday = document.getElementById(`dayToday`);



function searchWeather(city) {

    fetch("https://api.openweathermap.org/data/2.5/weather?q=" + city + "&lang=ru&appid=0028d5156b6049268b620cc89940a78a&units=metric")
        .then(response => response.json())
        .then(j => showWeather(j))
        .then(hourlyW => hourlyWeather(city))
}

function hourlyWeather(city) {

    fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&exclude=current,daily,minutely,alerts&lang=ru&&appid=0028d5156b6049268b620cc89940a78a&units=metric`)
        .then(response => response.json())
        .then(j => showHourlyWeather(j))
}


function showWeather(jsonCont) {

    city.innerText = jsonCont.name;
    preIMG.innerText = jsonCont.weather[0].description;
    weatherIMG.src = `http://openweathermap.org/img/wn/${jsonCont.weather[0].icon}@2x.png`;
    weatherIMG.alt = jsonCont.weather[0].main;
    degree.innerText = `${Math.round(jsonCont.main.temp)}°C`;
    minT.innerText = `Минимальная температура: ${Math.round(jsonCont.main.temp_min)}°C`;
    maxT.innerText = `Максимальная температура: ${Math.round(jsonCont.main.temp_max)}°C`;
    windSpeed.innerText = `Скорость ветра: ${Math.round(jsonCont.wind.speed)} км/ч`;

    lat = jsonCont.coord.lat;
    lon = jsonCont.coord.lon;

    timeZone = jsonCont.timezone;

    now = new Date();
    now.setSeconds(now.getSeconds() + timeZone);

    utc = now.toUTCString();
    date.innerText = `${utc.split(` `)[1]} ${utc.split(` `)[2]} ${utc.split(` `)[3]} ${utc.split(` `)[4]}`;
}


function showHourlyWeather(jsonCont) {

    for (let i = 0; i < weatherTime.children.length; i++) {
        let grDate = new Date((jsonCont.hourly[i].dt * 1000) + (timeZone * 1000) - 3600000);

        weatherTime.children[i].innerText = `${grDate.getHours()}:${grDate.getMinutes()}0`
    }

    for (let i = 0; i < hourlyImages.children.length; i++) {
        hourlyImages.children[i].src = `http://openweathermap.org/img/wn/${jsonCont.hourly[i].weather[0].icon}@2x.png`;
    }

    for (let i = 0; i < hourlyForecast.children.length; i++) {
        hourlyForecast.children[i].innerText = `${jsonCont.hourly[i].weather[0].description}`
    }

    for (let i = 0; i < hourlyTemp.children.length; i++) {
        hourlyTemp.children[i].innerText = `${Math.round(jsonCont.hourly[i].temp)}°C`
    }

    for (let i = 0; i < hourlyWind.children.length; i++) {
        hourlyWind.children[i].innerText = `${Math.round(jsonCont.hourly[i].wind_speed)} км/ч`
    }

    dayToday.innerText = utc.split(`, `)[0];

}


weatherSearchButton.addEventListener(`click`, () => {
    accurateWeather.style.display = `block`;
    divHourlyWeather.style.display = `block`;
    let city = userSearch.value;
    searchWeather(city);
})