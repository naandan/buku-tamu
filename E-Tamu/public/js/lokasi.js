$(document).ready(function () {
    getLocation();
});

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Menggunakan koordinat geografis untuk membatasi lokasi
            var allowedLatitude = -7.1771014; // Contoh latitude yang diizinkan
            var allowedLongitude = -7.1771014; // Contoh longitude yang diizinkan

            // Menggunakan formula haversine untuk menghitung jarak
            var distance = calculateDistance(
                latitude,
                longitude,
                allowedLatitude,
                allowedLongitude
            );

            // Membandingkan jarak dengan batas 100 meter
            if (distance <= 100) {
                $(".container").show();
            } else {
                $(".container").show();
                // $(".not-allow").show();
            }
        });
    } else {
        // Browser tidak mendukung geolocation
        alert("Browser Anda tidak mendukung geolocation");
    }
}

function calculateDistance(lat1, lon1, lat2, lon2) {
    var R = 6371; // Radius bumi dalam kilometer
    var dLat = deg2rad(lat2 - lat1);
    var dLon = deg2rad(lon2 - lon1);
    var a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(deg2rad(lat1)) *
            Math.cos(deg2rad(lat2)) *
            Math.sin(dLon / 2) *
            Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var distance = R * c * 1000; // Mengubah jarak menjadi meter
    return distance;
}

function deg2rad(deg) {
    return deg * (Math.PI / 180);
}
