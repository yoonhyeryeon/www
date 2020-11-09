const weather = document.querySelector(".js-weather");
const API_KEY = "38cb84355b7ad3bb3676b3b9e6b11d39";
const COORDS = "coords";

// 여기서 fetch 함수는 requests 함수와 같은 역할.
function getWeather(lat, lng){
    fetch(
        `https://api.openweathermap.org/data/2.5/weather?lat=37.57&lon=125.98&appid=9cbbf4ba69e5c741cbde5456d9dd87e3`
        ).then(function(response){
            return response.json();
        }).then(function(json){
            const temperature = json.main.temp;
            const place = json.name;
            weather.innerText = `${temperature} @ ${place}`;
        })
}

function saveCoords(coordsObj){
    localStorage.setItem(COORDS, JSON.stringify(coordsObj));
}

// 위치정보 획득에 성공하면 실행하는 함수
function handleGeoSuccess(position){
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const coordsObj = {
        latitude : latitude,
        longitude : longitude
    };
    saveCoords(coordsObj);
    getWeather(latitude, longitude);
}

// 위치정보 획득에 실패하면 실행하는 함수.
function handleGeoError(){
    console.log("Can't access geo location");
}

function askForCoords(){
    navigator.geolocation.getCurrentPosition(handleGeoSuccess, handleGeoError); // 유저의 현재 위치 정보를 요청하고, 성공하면 첫 번째 함수를, 실패하면 두 번째 함수를 실행.
}

// 로컬 스토리지에 정보가 없으면 요청.
function loadCoords(){
    const loadedCoords = localStorage.getItem(COORDS); 
    if(loadedCoords === null){
        askForCoords();
    } else {
        const parsedCoords = JSON.parse(loadedCoords);
        getWeather(parsedCoords.latitude, parsedCoords.longitude);
    }
}


function init(){
    loadCoords();
}

init();