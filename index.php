<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coronado</title>
    <link rel="short cut icon" href="public/img//photos/CORONADO1.jpg" style="border-radius: 15%;">

    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Estilos-->
    <link rel="stylesheet" href="public/css/index.css">

    <!--Plugin-->
    <link rel="stylesheet" href="public/css/plugins.css">

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

<body>

    <nav class="navbar">
        <div class="contentenedor">

            <div class="logo">
                <a href="#" class="logo"><img src="public/img/photos/CORONADO.jpg"></a>
            </div>

            <div class="menu">
                <ul class="menu-list">

                    <div class="icon cancel-btn">
                        <i class="fas fa-times"></i>
                    </div>
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#nosotros">Nosotros</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <li><a href="login">Sesión</a></li>
                </ul>

                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

        </div>
    </nav>
    <!-- <div class="banner" id="nosotros">




    </div>-->


    <div id="inicio">
        <div id="carouselExampleCaptions" class="carousel slide carusel" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>

            </div>
            <div class="carousel-inner carusel">
                <div class="carousel-item active data-bs-interval=" 10000"">
                    <img src="public/img/photos/1.png" class="d-block w-100" alt="...">
                    <!--<div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>-->
                </div>
                <div class="carousel-item data-bs-interval=" 10000"">
                    <img src="public/img/photos/2.png" class="d-block w-100" alt="...">
                    <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>-->
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>




    <div id="nosotros" class="nosotros">



        <div class="col-12">

            <div class="col-12 os-animation" data-animation="animate__animated animate__fadeInUp">
                <h3 class="heading text-center">Nosotros</h3>
                <div class="heading-underline"></div>
            </div>

            <div class="container-fluid nosotros-contenedor os-animation" data-animation="animate__animated animate__fadeIn ">
                <div class="row">

                    <div class="container text-center somos ">
                        <p>Somos una empresa dedicada a brindar servicios electro mecanicos para solucionar problemas de su automovil. </p>
                    </div>


                </div>

            </div>
        </div>

    </div>



    <div id="servicios" class="servicios">


        <div class="col-12 os-animation" data-animation="animate__animated animate__fadeInUp">
            <h3 class="heading text-center">Servicios</h3>
            <div class="heading-underline"></div>



            <div class="container">
                <div class="row text-center px-lg-4 px-xl-5">

                    <div class="base col-sm-12 col-md-4 os-animation" data-animation="animate__animated animate__fadeInLeft">
                        <div class="feature">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                            </span>
                            <h3>Venta de auto partes</h3>
                            <p class="lead">Accesorios y refacciones eléctricas.</p>
                        </div>
                    </div>

                    <div class="base col-sm-12 col-md-4 os-animation" data-animation="animate__animated animate__fadeInUp">
                        <div class="feature">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-car fa-stack-1x fa-inverse" data-fa-transform="shrink-1 "></i>
                            </span>
                            <h3>Servicio de taller</h3>
                            <p class="lead">Diagnosticos, reparación e instalación.</p>
                        </div>
                    </div>

                    <div class="base col-sm-12 col-md-4 os-animation" data-animation="animate__animated animate__fadeInRight">
                        <div class="feature">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-car-battery fa-stack-1x fa-inverse" data-fa-transform="shrink-3.5 right-1"></i>
                            </span>
                            <h3>Baterias</h3>
                            <p class="lead">Venta y carga de baterias (Checker y LTH).</p>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>

    <div id="contacto" class="contacto">

        <div class="col-12 os-animation" data-animation="animate__animated animate__fadeIn">
            <h3 class="heading text-center">Contacto</h3>
            <div class="heading-underline"></div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 py-2">


                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27158.48667142976!2d-106.47934775698603!3d31.693738903989264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86e75eaff9dfac81%3A0xf3013a5f0a5ea5bf!2sAutopartes%20El%C3%A9ctricas%20Coronado!5e0!3m2!1ses-419!2smx!4v1628180463911!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


                    </div>


                    <div class="col-md-6 py-2">


                        <div class="contact-info">

                            <ul class="contsociales">
                                <li><span class="text-center"><i class="fas fa-map-marker-alt"></i></span> Av López Mateos 1919 sur.</li>
                                <li><span><i class="fas fa-envelope"></i></span> Correo: eacoronado2010@hotmail.com.</li>
                                <li><span><i class="fas fa-phone-square-alt"></i></span> Número: 656-332-65-80.<br></li>
                                <li><span><i class="far fa-calendar-alt"></i></span> Abierto: lunes - Viernes : 9:00 - 6:00 pm. <br></li>
                                <li>Sabados 9:00 a 4:00 pm <br></li>
                            </ul>

                            <ul style="margin: auto;" class="social-links">
                                <li><a href="https://www.facebook.com/profile.php?id=100016651621755" target="_blank"><i class="fab fa-facebook"></i></a>
                            </ul>
                        </div>



                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="footer" style="background-color: #5a5a5a; color:white; padding:20px;">
        <p class="text-center">Todos los derechos reservados &copy <?php echo date("Y"); ?> </p>
    </div>


    <!-- Top Scroll -->
    <a href="#inicio" class="top-scroll ">
        <span><i class="fa fa-angle-up"></i></span>
    </a>
    <!-- End of Top Scroll -->




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Waypoints https://cdnjs.com/libraries/waypoints
    		https://github.com/imakewebthings/waypoints -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>


    <!-- Lightbox Image Gallery https://cdnjs.com/libraries/lightbox2  https://lokeshdhakar.com/projects/lightbox2/ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <!-- Bootstrap JS https://getbootstrap.com/docs/4.5/getting-started/introduction/ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--Plugins and main code js-->
    <script src="public/js/index.js"></script>
    <!--FONT AWSOME-->
    <script src="https://kit.fontawesome.com/a7432e2c7e.js" crossorigin="anonymous"></script>
    <!-- Lightbox Image Gallery https://cdnjs.com/libraries/lightbox2  https://lokeshdhakar.com/projects/lightbox2/ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <!-- Owl Carousel https://cdnjs.com/libraries/OwlCarousel2
    		http://owlcarousel2.github.io/OwlCarousel2/ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

</html>