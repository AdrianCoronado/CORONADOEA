<div class="p-3 text-white bg-dark" style="width:250px; min-height: 100vh;">
    <div class="container" style="">
        <a href="/" class="align-items-center text-white text-decoration-none">

            <img src="public/img/photos/CORONADO.jpg" style="width: 195px; border-radius:5px;">
        </a>
    </div>


    <hr>
    <!-- <ul class="nav nav-pills d-flex justify-content-evenly mb-auto menu"> -->
    <nav class="m-0 p-0">
        <ul class="menu">
            <li>
                <a href="app.php" class="text-white  ">
                    <!--nav-link li -->

                    Inicio
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Notas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="text-start dropdown-item" href="generarNota">Generar Nota</a></li>
                    <li><a class="text-start dropdown-item" href="historialnotas">Historial Notas</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Orden Taller
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="text-start dropdown-item" href="generarOrden">Generar Orden</a></li>
                    <li><a class="text-start dropdown-item" href="ordenes-pendientes">Ordenes Pendientes</a></li>
                    <li><a class="text-start dropdown-item" href="ordenes-pagadas">Ordenes para Pago</a></li>
                    <li><a class="text-start dropdown-item" href="historialordenes">Historial de Ordenes</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="text-white">

                    Gastos
                </a>
            </li>

            <li>
                <a href="#" class="text-white">

                    Informes
                </a>
            </li>

            <li>
                <a href="#" class="text-white">
                    Cotización

                </a>
            </li>


        </ul>
    </nav>
    <hr>
    <div class="container profile">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>Usuario</strong>
            </a>

            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="includes/funciones/cerrarsesion">Cierra Sesión</a></li>
            </ul>
        </div>
    </div>

</div>