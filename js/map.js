var map = L.map('map').setView([25.68807, -100.31702], 12);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

  var circle = L.circle([25.68807, -100.31702], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 4000
  }).addTo(map);

  var circle2 = L.circle([25.76007, -100.31702], {
        color: 'blue',
        fillColor: 'blue',
        fillOpacity: 0.5,
        radius: 4000
  }).addTo(map);

  var circle3 = L.circle([25.68807, -100.39782], {
        color: 'yellow',
        fillColor: 'yellow',
        fillOpacity: 0.5,
        radius: 4000
  }).addTo(map);

  var circle4 = L.circle([25.68807, -100.23702], {
        color: 'green',
        fillColor: 'green',
        fillOpacity: 0.5,
        radius: 4000
  }).addTo(map);

  var circle5 = L.circle([25.61507, -100.31702], {
        color: 'purple',
        fillColor: 'purple',
        fillOpacity: 0.5,
        radius: 4000
  }).addTo(map);
  circle.bindPopup("Zona 1");
  circle2.bindPopup("Zona 2");
  circle3.bindPopup("Zona 3");
  circle4.bindPopup("Zona 4");
  circle5.bindPopup("Zona 5");
  var marker = L.marker([25.68807, -100.31702]).addTo(map);
  marker.bindPopup("Perteneces a:<br><b>Zona 1</b>").openPopup();