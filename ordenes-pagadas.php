<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <link rel="short cut icon" href="img/ladiesandgent.png">

    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Estilos-->
    <link rel="stylesheet" href="css/style.css">
    <!--Plugin-->

    <!-- Animate.css https://cdnjs.com/libraries/animate.css/
    		https://daneden.github.io/animate.css/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!--Lightbox image gallery-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <!--OWL carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Gentium+Book+Basic:ital,wght@1,700&family=Mrs+Saint+Delafield&display=swap" rel="stylesheet">


</head>
<style>
    .contenedor {
        display: flex;
    }
</style>

<body>

    <?php
    require "includes/funciones/funciones.php";

    $auth = autenticacion();

    if (!$auth) {

        header('location:index.php');
    }

    ?>




    <div class="container-fluid m-0 p-0">

        <div class="contenedor">


            <div>
                <?php
                include "includes/Menu.php";
                ?>
            </div>

            <div class="col p-3">
                <?php
                include "includes/tabla-ordenespagadas.php";
                ?>
            </div>
        </div>






    </div>



</html>






<!-- jQuery https://code.jquery.com/ -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Waypoints https://cdnjs.com/libraries/waypoints
    		https://github.com/imakewebthings/waypoints -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>


<!-- Lightbox Image Gallery https://cdnjs.com/libraries/lightbox2  https://lokeshdhakar.com/projects/lightbox2/ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<!-- Bootstrap JS https://getbootstrap.com/docs/4.5/getting-started/introduction/ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!--Plugins and main code js-->
<script src="public/js/main.js"></script>
<!--FONT AWSOME-->
<script src="https://kit.fontawesome.com/a7432e2c7e.js" crossorigin="anonymous"></script>
<!-- Lightbox Image Gallery https://cdnjs.com/libraries/lightbox2  https://lokeshdhakar.com/projects/lightbox2/ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<!-- Owl Carousel https://cdnjs.com/libraries/OwlCarousel2
    		http://owlcarousel2.github.io/OwlCarousel2/ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>