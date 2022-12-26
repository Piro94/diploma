ymaps.ready(init);

function init() {
	let map = new ymaps.Map('map', {
		center: [55.770441, 49.255175],
		zoom: 17.8
	});
	map.controls.remove('geolocationControl'); // удаляем геолокацию
	map.controls.remove('searchControl'); // удаляем поиск
	map.controls.remove('typeSelector'); // удаляем тип
	map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
	map.controls.remove('zoomControl'); // удаляем контроль зуммирования
	map.controls.remove('rulerControl'); // удаляем контроль правил
}