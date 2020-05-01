<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {

    // On teste pour voir si nos variables ont bien été enregistrées
    echo '<html>';
    echo '<head>';
    echo '<title>Page de notre section membre</title>';
    echo '</head>';

    echo '<body>';
    //echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['mdp'].'.';
    echo 'Votre login est ' . $_SESSION['login'];
    echo '<br />';

    // On affiche un lien pour fermer notre session
    echo '<a href="deconnexion.php">Déconnexion</a>';
} else {
    //echo 'Les variables ne sont pas déclarées.';
    header('location: login.php?message=erreur');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Gretagram</title>
    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!--FontAwesome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/leaflet.css" />
    <link rel="stylesheet" href="css/L.Control.Locate.min.css" />

    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>


    <!-- Include des fonctons pouvant être utilisées + connexion BD-->
    <?php
    include("include/connect.inc.php");
    ?>
</head>

<!--Contenu-->

<body>
    <!--Nav-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <div class="styleLogo">
                <h4>Gretagram</h4>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="ajouter.php">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profilPerso.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="discover.php">Discover</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="carte.php">Carte</a>
                </li>

            </ul>
            <div class="md-form">
            
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 mdb-autocomplete" type="text" id="search-user" placeholder="Rechercher">
            </form>
                <div style="margin-top: 0px">
                    <div id="result-search"     style="z-index: 1;">
                        <ul style="list-style: none;"></ul>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <!--Fin Nav-->
    <br>
    <br>
    <br>
    
    </div>
    <div id="mapid" style="width: 100%; height: 75%; z-index: 10;"></div>

    <script src="script/L.Control.Locate.js" ></script>

    <script src="script/leaflet-search.js"></script>

    <script>
        var mymap = L.map('mapid').setView([43.602397286206816, 1.4419555664062502], 10);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        L.control.locate({
    strings: {   title: "Show me where I am, yo!"    }}).addTo(mymap);

        mymap.addControl( new L.Control.Search({
		url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
		jsonpParam: 'json_callback',
		propertyName: 'display_name',
		propertyLoc: ['lat','lon'],
		marker: L.circleMarker([0,0],{radius:30}),
		autoCollapse: true,
		autoType: false,
		minLength: 2
	}) );
        
    </script>

    <style>
        .leaflet-container .leaflet-control-attribution,
        .leaflet-container .leaflet-control-scale {
            font-size: 0px;
        }

    </style>

    <?php

    if (!empty($_GET['userSpecifi'])) {
        $userSpec = $_GET['userSpecifi'];
        $requetePost = "Select * FROM publication where user='" . $userSpec . "'";
        //echo $requetePost;
        $prequetePost = $conn->prepare($requetePost);
        $prequetePost->execute();
        while ($dataPost = $prequetePost->fetch()) {

            $user = $dataPost['user'];
            $titre = $dataPost['titre'];
            $description = $dataPost['description'];
            $image = $dataPost['photo'];
            $latitu = $dataPost['lat'];
            $longi =  $dataPost['longitude'];

            if (isset($longi)) {

                echo '
                        <script>
                        L.marker([' . $latitu . ', ' . $longi . ']).addTo(mymap)
                        .bindPopup("<b>' . $titre . ' by @' . $user . '</b><hr><br/><img src = ' . $image . ' width=100%><br><a href=post.php?post=' . $image . '>Voir le post</a>"); 
                        </script>
                        ';
            }
        }
    } else {

        $requetePost = "Select * FROM publication ";
        $prequetePost = $conn->prepare($requetePost);
        $prequetePost->execute();
        while ($dataPost = $prequetePost->fetch()) {

            $user = $dataPost['user'];
            $titre = $dataPost['titre'];
            $description = $dataPost['description'];
            $image = $dataPost['photo'];
            $latitu = $dataPost['lat'];
            $longi =  $dataPost['longitude'];

            if (isset($longi)) {

                echo '
                        <script>
                        L.marker([' . $latitu . ', ' . $longi . ']).addTo(mymap)
                        .bindPopup("<b>' . $titre . ' by @' . $user . '</b><hr><br/><img src = ' . $image . ' width=100%><br><a href=post.php?post=' . $image . '>Voir le post</a>"); 
                        </script>
                        ';
            }
        }
    }

    //.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
    ?>

    <script>
/*
        L.circle([51.508, -0.11], 500, {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5
        }).addTo(mymap).bindPopup("I am a circle.");

        L.polygon([
            [51.509, -0.08],
            [51.503, -0.06],
            [51.51, -0.047]
        ]).addTo(mymap).bindPopup("I am a polygon.");

        mymap.on('click', function(e) {
            alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        });

        var popup = L.popup();
*/
    </script>




    <!--Fin Post-->
    <br>
    <!--Footer-->
    <footer class="containe-fluid footer">
        <i class="fa fa-copyright"> Gretagram 2020</i>
    </footer>
    <!--Fin Footer-->
    <!--Script JS-->
    <script>
        $(document).ready(function() {
            $('#search-user').keyup(function() {
                $('#result-search ul').html('');
                var utilisateur = $(this).val();
                if (utilisateur != "") {
                    $.ajax({
                        type: 'GET',
                        url: 'script/searchuser.php',
                        data: 'user=' + encodeURIComponent(utilisateur),
                        success: function(data) {
                            if (data != "") {
                                $('#result-search ul').append(data);
                            } else {
                                document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center'; margin-top: 10px;>Aucun utilisateur</div>";
                            }
                        }
                    });
                }

            });
        });
    </script>
</body>

<script type="text/javascript">
    collapse.show;
</script>


</html>