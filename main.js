$(document).ready(function(){
    $('.slider-container').slick({
        dots: true
    });

    var file_input = document.getElementById("image-input");
    // file_input.addEventListener("change", function () {
    //     document.getElementById("image-form").submit();
    // });
    file_input.addEventListener("change", function() {

        var fd = new FormData();
        var files = $('#image-input')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: 'image_upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(data){
                console.log(data);
                var imageContainer = document.getElementById('uploaded-image');
                imageContainer.style.backgroundImage="url(" + data +")";

                var delayInMilliseconds = 1000;

                setTimeout(function() {
                    $('.slider-container').slick('slickGoTo', 3)
                }, delayInMilliseconds);
            }
        });
    });


    $('#drink-form').submit(function(event) {
        var formData = {
            'tea'              : document.getElementById('tea').value ,
            'coffee'             : document.getElementById('coffee').value
        };

        $.ajax({
            type: 'POST',
            url: 'save_in_database.php',
            data: formData,
            success: function () {
                document.getElementById('tea').value = 0;
                document.getElementById('coffee').value = 0;

                $(".slide3 .background-image").css("background", "");

                var delayInMilliseconds = 1000;
                setTimeout(function() {
                    $('.slider-container').slick('slickGoTo', 4)
                }, delayInMilliseconds);
            }
        });

        // Stop the browser from submitting the form.
        event.preventDefault();
    });
});

function initMap() {
    var bounds = new google.maps.LatLngBounds();

    var locations = [
        [51.917199, 4.484031],
        [51.917319, 4.48832]
    ];

    var map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 16,
            draggable: false
        });

    for (i = 0; i < locations.length; i++) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][0], locations[i][1]),
            map: map
        });

        //extend the bounds to include each marker's position
        bounds.extend(marker.position);
    }

    map.fitBounds(bounds);

    var listener = google.maps.event.addListener(map, "idle", function () {
        map.setZoom(17);
        google.maps.event.removeListener(listener);
    });
}
