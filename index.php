<?php
    $directory = "uploads/";
    if (file_exists($directory)) {
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $firstimage = "uploads/" . reset($scanned_directory);
    }
?>
<!doctype html>
<html>
<head>
    <title></title>
    <meta name="description" content="text"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
</head>
<body style="position: fixed">

<a href="admin.php" class="admin"></a>
<div class="slider-container">
    <div class="slide slide1">
        <div class="background-image" style="background-image: url('images/slide1.jpeg')">
            <div class="overlay"></div>
        </div>
        <div class="header">
            <h2>Welcome to the IBIS Workbooth</h2>
            <h5> Enjou your peace or come visit <br> and enjoy a free cup of coffee</h5>
        </div>
        <button>Continue</button>
        <img src="images/Hotel_Ibis_logo_2012.png" alt="ibis-logo">
    </div>
    <div class="slide slide2">
        <div class="background-image" style="background-image: url('images/slide2.jpeg')">
            <div class="overlay"></div>
        </div>
        <div class="header">
            <h2>Enjoy a free cup of coffee or tea</h2>
            <h5> Take a picture for us in the IBIS workbooth <br> and come visit us for a free drink</h5>
        </div>
        <div class="content">
            <div class="step step1">
                <h2>Step 1:</h2>
                <h5>Take a picture on our tablet</h5>
                <img src="images/photo-camera.png">
            </div>
            <div class="step step2">
                <h2>Step 2:</h2>
                <h5>Tell us what you would like to drink</h5>
                <img src="images/cup-of-hot-chocolate.png">
            </div>
            <div class="step step3">
                <h2>Step 3:</h2>
                <h5>Come to our IBIS workplace and <br> enjoy your drink and workplace!</h5>
                <img src="images/location-on-map.png">
            </div>
        </div>
    </div>
    <div class="slide slide3">
        <div class="background-image" id="uploaded-image" style="background-image: url('<?= $firstimage ?>')">
            <div class="overlay"></div>
        </div>
        <div class="header">
            <h2>Take a picture!</h2>
            <h5>d</h5>
        </div>
        <div class="content">
             <form id="image-form" method="POST" enctype="multipart/form-data">
                 <div class="image-upload">
                     <label for="image-input">
                            <img src="images/circle-shape-outline.png">
                     </label>

                     <input type="file" accept="image/*" id="image-input" name="image">
                 </div>
            </form>
        </div>
    </div>
    <div class="slide slide4">
        <div class="background-image" style="background-image: url('images/slide4.jpeg')">
            <div class="overlay"></div>
        </div>
        <div class="header">
            <h2>Almost there!</h2>
            <h5>Let us know what you want to drink!</h5>
        </div>
        <div class="content">
           <form id="drink-form" method="post" action="save_in_database.php">
               <div class="drink-option">
                   <h2 style="font-weight: bold">Coffee:</h2>
                   <input type="number" id="coffee" name="coffee" value="0">
                   <label for="coffee">Person(s)</label>
                </div>

               <div class="drink-option">
                   <h2 style="font-weight: bold">Tea:</h2>
                   <input type="number" id="tea" name="tea" value="0">
                   <label for="tea">Person(s)</label>
               </div>

               <input type="submit" value="Order now" name="save_order">
           </form>
        </div>
    </div>
    <div class="slide slide5">
        <div class="background-image" style="background-image: url('images/slide5.jpeg')">
            <div class="overlay"></div>
        </div>
        <div class="header">
            <h2>Come find us!</h2>
            <h5>Meet us at the IBIS workplace nearby and enjoy <br> your free drink and an excellent place to work or study!</h5>
        </div>

        <div class="content">
            <div id="map"></div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="main.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADHTrMwE_UvdvFqOo4t9ZHEU4CLNhRscA&callback=initMap" type="text/javascript"></script>

</body>
</html>
    