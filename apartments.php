<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apartments</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fa-cdn.css">
    <link rel="stylesheet" href="css/apartments.css">

    <script src="js/fa-cdn.js"></script>
</head>

<body>
    <div class="menu-bar right">
        <div class="wrapper">
            <a href="index.php" class="left">
                <i class="fas fa-home"></i>&nbsp; OREB</a>

            <a href="index.php">Home</a>
            <!-- <a href="adminPanel.php">Admin Panel</a> -->
            <a href="apartments.php">Apartments</a>
            <a href="newsletter.php">News Letter</a>
            <a href="login.php">Login</a>
            <a href="contact.php">Contact</a>
        </div>
    </div>

    <div class="wrapper" style="margin-top:30px; margin-bottom:30px;">
        <h1 style="text-align: center;">Newly Constructed Buildings</h1>
    </div>

    <div class="row" style="margin-bottom:30px !important">
        <div class="wrapper">
            <div class="col-md-4">
                <div class="card">
                    <img src="images/house4.jpg" alt="John" style="width:100%">
                    <h1>Kamal Ahmed Villa</h1>
                    <p class="title">A place with comfortable weather</p>
                    <p>Mirpur 10 | Dhaka | Bangladesh</p>

                    <p style="margin-bottom: 20px; margin-top:20px;">
                        <button onclick="btnClick(23.806931, 90.368709)">View in Google Map</button>
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="images/house5.jpg" alt="John" style="width:100%">
                    <h1>Choudhary Villa</h1>
                    <p class="title">A place for comfortable weather to take fresh breath</p>
                    <p>Gulshan | Dhaka | Bangladesh</p>

                    <p style="margin-bottom: 20px; margin-top:20px;">
                        <button onclick="btnClick(23.792496,90.407806)">View in Google Map</button>
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="images/house6.jpg" alt="John" style="width:100%">
                    <h1>Jamilur Rahman Villa</h1>
                    <p class="title">A place where you can find comfortable facilities</p>
                    <p>Shyamoli | Dhaka | Bangladesh</p>

                    <p style="margin-bottom: 20px; margin-top:20px;">
                        <button onclick="btnClick(23.771783,90.363067)">View in Google Map</button>
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="images/house7.jpeg" alt="John" style="width:100%">
                    <h1>Raihan Villa</h1>
                    <p class="title">A place where you can find comfortable facilities</p>
                    <p>Mohammadpur | Dhaka | Bangladesh</p>

                    <p style="margin-bottom: 20px; margin-top:20px;">
                        <button onclick="btnClick(23.765844, 90.358361)">View in Google Map</button>
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="images/house8.jpeg" alt="John" style="width:100%">
                    <h1>Khan Villa</h1>
                    <p class="title">A place where you can find comfortable facilities</p>
                    <p>Badda | Dhaka | Bangladesh</p>

                    <p style="margin-bottom: 20px; margin-top:20px;">
                        <button onclick="btnClick(23.780546,90.426658)">View in Google Map</button>
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="images/house9.jpeg" alt="John" style="width:100%">
                    <h1>Akash Villa</h1>
                    <p class="title">A place where you can find comfortable facilities</p>
                    <p>Farmgate | Dhaka | Bangladesh</p>

                    <p style="margin-bottom: 20px; margin-top:20px;">
                        <button onclick="btnClick(23.756107,90.387196)">View in Google Map</button>
                    </p>
                </div>
            </div>

        </div>
    </div>
    
    <div class="row">
        <div class="wrapper" style="padding: 15px; margin-bottom: 50px">
            <div class="googlemp" style="border:3px solid #262c3a">
                <div id="map" style="height:300px; width:100%"></div>
                <!-- ***** -->
            </div>
        </div>    
    </div>

    <div class="footer">
        <div class="wrapper">
            <div class="socaial-links">
                <a href="https://www.facebook.com/">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://bd.linkedin.com/">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://twitter.com/">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://plus.google.com/discover">
                    <i class="fab fa-google-plus"></i>
                </a>
            </div>
        </div>
    </div>


    <script>
        var marker;
        var latLong = new Array(23.751676, 90.377759);

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: { lat: latLong[0], lng: latLong[1] }
            });

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: { lat: latLong[0], lng: latLong[1] }
            });
            marker.addListener('click', toggleBounce);
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

        function btnClick(lat, long) {
            latLong[0] = lat;
            latLong[1] = long;
            initMap();
        }

    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq2S7dRHaBiw4b8FNS1UBt9peDbOjhxGs&callback=initMap">
    </script>
</body>

</html>