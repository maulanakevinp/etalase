var map = L.map('map', {
    center: [-8.165683, 113.717000], // Map loads with this location as center
    zoom: 14,
    scrollWheelZoom: false,
});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([-8.165683, 113.717000]).addTo(map)
    .bindPopup('<b>Hello world!</b><br>This is UKMK ETALASE.').openPopup();
