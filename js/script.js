var map = L.map('map').setView([-6.1751, 106.8650], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var currentMarker;
var markerToDelete; // Variable to store marker to be deleted

// Load existing POIs
$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: 'api/read_pois.php',
        success: function(response) {
            var pois = JSON.parse(response);
            pois.forEach(function(poi) {
                var marker = L.marker([poi.latitude, poi.longitude], { draggable: true, uniqueID: poi.id})
                    .addTo(map)
                    .bindPopup(poi.name);

                marker.on('dragend', function(event) {
                    var marker = event.target;
                    var position = marker.getLatLng();

                    $('#latitude').val(position.lat);
                    $('#longitude').val(position.lng);
                    $('#name').val(poi.name);
                    $('#description').val(poi.description);
                    $('#address').val(poi.address);
                    $('#category').val(poi.category);
                    $('#rating').val(poi.rating);
                    $('#poiId').val(poi.id);
                    $('#poiModal').modal('show');
                });

                // Add contextmenu event listener for delete confirmation
                marker.on('contextmenu', function(event) {
                    markerToDelete = this; // Set marker to be deleted
                    $("#poiIdDel").val(event.target.options.uniqueID)
                    $('#deleteConfirmModal').modal('show'); // Show delete confirmation modal
                });
            });
        },
        error: function(xhr, status, error) {
            alert('Error loading POIs: ' + error);
            console.log("Error response: ", xhr.responseText);
        }
    });
});

// Create marker event
map.on('click', function(e) {

    $('#latitude').val(e.latlng.lat);
    $('#longitude').val(e.latlng.lng);
    $('#poiModal').modal('show');
});

// Form submit event
$('#poiForm').on('submit', function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    var poiId = $('#poiId').val();
    var url = poiId ? 'api/update_poi.php' : 'api/create_poi.php';

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function(response) {
            var poi = JSON.parse(response);
            if (!poiId) {
                currentMarker = L.marker([poi.latitude, poi.longitude], { draggable: true })
                    .addTo(map)
                    .bindPopup(poi.name);
                    currentMarker.on('dragend', function(event) {
                        console.log(event);
                        var marker = event.target;
                        var position = marker.getLatLng();
    
                        $('#latitude').val(position.lat);
                        $('#longitude').val(position.lng);
                        $('#name').val(poi.name);
                        $('#description').val(poi.description);
                        $('#address').val(poi.address);
                        $('#category').val(poi.category);
                        $('#rating').val(poi.rating);
                        $('#poiId').val(poi.id);
                        $('#poiModal').modal('show');
                    });
            }
            $('#poiModal').modal('hide');
        },
        error: function(xhr, status, error) {
            alert('Error saving POI: ' + error);
            console.log("Error response: ", xhr.responseText);
        }
    });
});

// Add contextmenu event listener for delete confirmation
map.on('contextmenu', function(event) {
    var marker = L.marker(event.latlng); // Create a marker at the clicked location
    markerToDelete = marker; // Set marker to be deleted
    $('#deleteConfirmModal').modal('show'); // Show delete confirmation modal
});

// Confirm delete event
$('#confirmDeleteBtn').on('click', function() {
    console.log($('#poiIdDel'))
    var poiId = $('#poiIdDel').val();
    $.ajax({
        type: 'POST',
        url: 'api/delete_poi.php',
        data: { id: poiId },
        success: function() {
            map.removeLayer(markerToDelete); // Remove marker from map
            $('#deleteConfirmModal').modal('hide'); // Hide delete confirmation modal
        },
        error: function(xhr, status, error) {
            alert('Error deleting POI: ' + error);
            console.log("Error response: ", xhr.responseText);
        }
    });
});