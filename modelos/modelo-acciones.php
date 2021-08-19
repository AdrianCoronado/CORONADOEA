<?php
error_reporting(0);


if ($_POST['accion'] == 'crear') {

    require '../includes/funciones/bd.php';

    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $marca = filter_var($_POST['marca'], FILTER_SANITIZE_STRING);
    $modelo = filter_var($_POST['modelo'], FILTER_SANITIZE_STRING);
    $tipo = filter_var($_POST['tipo'], FILTER_SANITIZE_STRING);
    $mecanico = filter_var($_POST['mecanico'], FILTER_SANITIZE_STRING);
    $autorizados = filter_var($_POST['autorizados'], FILTER_SANITIZE_STRING);
    $accion = filter_var($_POST['accion'], FILTER_SANITIZE_STRING);

    date_default_timezone_set('America/Ojinaga');
    $hora = date("g:i-a");
    //$hora = date("Y-m-d");
    $fecha = date('Y-m-d');



    try {

        $sql = $conn->prepare("INSERT INTO ordenes(nombre,telefono,marca,modelo,tipo,mecanico,autorizados,fecha,hora)
        VALUES (:nombre,:telefono,:marca,:modelo,:tipo,:mecanico,:autorizados,:fecha,:hora)");

        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':telefono', $telefono);
        $sql->bindParam(':marca', $marca);
        $sql->bindParam(':modelo', $modelo);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':mecanico', $mecanico);
        $sql->bindParam(':autorizados', $autorizados);
        $sql->bindParam(':fecha', $fecha);
        $sql->bindParam(':hora', $hora);
        $sql->execute();





        $objeto->resultado = "correcto";
        $objeto->nombre = $nombre;
        $objeto->telefono = $telefono;
        $objeto->marca = $marca;
        $objeto->modelo = $modelo;
        $objeto->tipo = $tipo;
        $objeto->mecanico = $mecanico;
        $objeto->autorizados = $autorizados;
        $objeto->accion = $accion;
        $objeto->fecha = $fecha;
        $objeto->hora->$hora;
    } catch (PDOEXCEPTION $e) {

        echo $sql . "<br>" . $e->getMessage();
        $objeto->resultado = "errorbd";
    }



    echo json_encode($objeto);
}


if ($_POST['accion'] == 'creardetalle') {
    require '../includes/funciones/bd.php';


    $folio = $_POST['foliorden'];
    $concepto = $_POST['concepto'];
    $cantidad = $_POST['cantidad'];
    $precio = floatval($_POST['precio']);
    $total = floatval($_POST['total']);
    $accion = $_POST['accion'];
    $tipo = $_POST['tipo'];



    try {

        if ($tipo == 'orden') {
            $sql = $conn->prepare("INSERT INTO detalleord(folio,concepto,unitario,cantidad,total)
        VALUES (:folio,:concepto,:unitario,:cantidad,:total)");

            $sql->bindParam(':folio', $folio);
            $sql->bindParam(':concepto', $concepto);
            $sql->bindParam(':unitario', $precio);
            $sql->bindParam(':cantidad', $cantidad);
            $sql->bindParam(':total', $total);
        } else {

            /*$sql = $conn->prepare("INSERT INTO detallenota(folio,concepto,unitario,cantidad,total)
        VALUES (:folio,:concepto,:unitario,:cantidad,:total)");*/
        }


        $sql->execute();

        $last_id = $conn->lastInsertId();

        $objeto->lastid = $last_id;
        $objeto->resultado = "correcto";
        $objeto->folio = $folio;
        $objeto->concepto = $concepto;
        $objeto->unitario = $precio;
        $objeto->cantidad = $cantidad;
        $objeto->total = $total;
        $objeto->accion = $accion;
        $objeto->tipodcto = $tipodcto;

        echo json_encode($objeto);
    } catch (PDOEXCEPTION $e) {

        echo $sql . "<br>" . $e->getMessage();
        $objeto->resultado = "errorbd";
    }
}
if ($_POST['accion'] == 'editar') {
    require '../includes/funciones/bd.php';

    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $marca = filter_var($_POST['marca'], FILTER_SANITIZE_STRING);
    $modelo = filter_var($_POST['modelo'], FILTER_SANITIZE_STRING);
    $tipo = filter_var($_POST['tipo'], FILTER_SANITIZE_STRING);
    $mecanico = filter_var($_POST['mecanico'], FILTER_SANITIZE_STRING);
    $autorizados = filter_var($_POST['autorizados'], FILTER_SANITIZE_STRING);
    $accion = filter_var($_POST['accion'], FILTER_SANITIZE_STRING);
    $folio = $_POST['id'];



    try {

        $sql = $conn->prepare("UPDATE ordenes SET nombre =:nombre , telefono = :telefono, marca= :marca ,modelo =:modelo, tipo =:tipo ,mecanico = :mecanico, autorizados = :autorizados WHERE folio = :folio");

        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':telefono', $telefono);
        $sql->bindParam(':marca', $marca);
        $sql->bindParam(':modelo', $modelo);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':mecanico', $mecanico);
        $sql->bindParam(':autorizados', $autorizados);
        $sql->bindParam(':folio', $folio);
        $sql->execute();

        $objeto->resultado = "se edito";
        $objeto->nombre = $nombre;
        $objeto->telefono = $telefono;
        $objeto->marca = $marca;
        $objeto->modelo = $modelo;
        $objeto->tipo = $tipo;
        $objeto->mecanico = $mecanico;
        $objeto->autorizados = $autorizados;
        $objeto->accion = $accion;
        $objeto->folio->$folio;
    } catch (Exception $e) {
    }

    echo json_encode($objeto);
}

if ($_GET['accion'] == 'borrar') {

    require '../includes/funciones/bd.php';


    $id = $_GET['id'];
    $tipo = $_GET['tipo'];

    if ($tipo === 'orden') {

        $sentencia = "DELETE FROM ordenes WHERE folio =:id";
    } else {
        $sentencia = "DELETE FROM detalleord WHERE idDetalle =:id";
    }
    try {

        $sql = $conn->prepare($sentencia);
        $sql->bindParam(':id', $id);
        $sql->execute();

        $objeto->respuesta = "correcto";
        $objeto->tipo = $tipo;
        $objeto->id = $id;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    echo json_encode($objeto);
}

if ($_GET['accion'] == 'estatus') {


    require '../includes/funciones/bd.php';


    $id = $_GET['id'];
    $estatus = $_GET['estatus'];
    date_default_timezone_set('America/Ojinaga');
    $fecha = date('Y-m-d');

    //FECHA DE SALIDA MAS 89 DíAS DE GARANTíA


    $mod_date =  strtotime($fecha . "+ 89 days");
    $datesalida = date('Y-m-d', $mod_date);



    try {

        if ($estatus == '') {
            $sql = $conn->prepare("UPDATE ordenes SET estatus=:estatus WHERE folio= :id AND estatus IS NULL");
        } elseif ($estatus == 'Pagado') { //preisonar listo para pagar
            $sql = $conn->prepare("UPDATE ordenes SET estatus=:estatus, fechasalida = :fecha, garantiadate = :garantiadate WHERE folio= :id");
        } else {
            $sql = $conn->prepare("UPDATE ordenes SET estatus=:estatus WHERE folio= :id");
        }
        $sql->bindParam(':estatus', $estatus);

        if ($estatus == 'Pagado') { // hasta que sea pagado se agrega la garantia
            $sql->bindParam(':fecha', $fecha);
            $sql->bindParam(':garantiadate', $datesalida);
        }
        $sql->bindParam(':id', $id);
        $sql->execute();

        $objeto->respuesta = "correcto";
        $objeto->estatus = $estatus;
        $objeto->id = $id;
    } catch (PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
        $objeto->error = "error";
    }


    echo json_encode($objeto);
}

//inicio de sesion
if ($_POST['accion'] == 'validar') {
    require '../includes/funciones/bd.php';
    $correo = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
    try {

        $sql = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $sql->bindParam(':usuario', $correo);
        $sql->execute();

        $resultados = $sql->fetch(PDO::FETCH_OBJ);

        if ($sql->rowCount() > 0) {
            if ($contrasena == $resultados->password) {
                $objeto->estado = "exitoso";
                $objeto->id = $resultados->idUsuario;
                $objeto->usuario = $resultados->usuario;
                $objeto->password = $resultados->password;
                $objeto->rol = $resultados->rol;
                $objeto->correo = $correo;
                $objeto->contrasena = $contrasena;
                $objeto->accion = $_POST['accion'];

                session_start();

                //llenar arreglo sesion
                $_SESSION['usuario'] = $resultados->usuario;
                $_SESSION['rol'] = $resultados->rol;
                $_SESSION['login'] = true;
            }
        } else {
            $objeto->estado = "No existe usuario";
            header('location:index.php');
        }
    } catch (PDOException $e) {
        $objeto->error = "error";
    }
    echo json_encode($objeto);
}


if ($_POST['accion'] == 'buscador') {

    require '../includes/funciones/bd.php';
    include '../includes/funciones/funciones.php';



    //buscarlistpago
    //buscarhist
    //buscarpendientes

    try {




        /*  if ($_POST['consulta'] != 'indefinido') {
            $textobusqueda = filter_var($_POST['consulta'], FILTER_SANITIZE_STRING);
            $sql = $conn->prepare("SELECT * FROM ordenes WHERE folio LIKE '%" . $textobusqueda . "%' AND estatus = 'Pagado' OR nombre LIKE '%" . $textobusqueda . "%'  AND estatus = 'Pagado' OR marca LIKE '%" . $textobusqueda . "%'  AND estatus = 'Pagado' OR modelo LIKE '%" . $textobusqueda . "%' AND estatus = 'Pagado';");
            $sql->execute();
        } else {
            $texto = "";
            $sql = $conn->prepare("SELECT * from ordenes WHERE estatus = 'Pagado' ORDER BY folio");
            $sql->execute();
        }*/


        if ($_POST['tabla'] == 'buscarhist') {
            if ($_POST['consulta'] != 'indefinido') {
                $texto = "";
                $textobusqueda = filter_var($_POST['consulta'], FILTER_SANITIZE_STRING);
                $sql = $conn->prepare("SELECT * FROM ordenes WHERE folio LIKE '%" . $textobusqueda . "%' AND estatus = 'Pagado' OR nombre LIKE '%" . $textobusqueda . "%'  AND estatus = 'Pagado' OR marca LIKE '%" . $textobusqueda . "%'  AND estatus = 'Pagado' OR modelo LIKE '%" . $textobusqueda . "%' AND estatus = 'Pagado';");
                $sql->execute();
            } else {
                $texto = "";
                $sql = $conn->prepare("SELECT * from ordenes WHERE estatus = 'Pagado' ORDER BY folio");
                $sql->execute();
                $objeto->fail = "todo el registro hist";
            }

            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

            if ($sql->rowCount() > 0) {




                $texto .= "<div class='container table-responsive contenedor-tabla' style='margin-top: 0px;'>
        <table class='table table-striped table-responsive' id='detalles-list' style='width: 100%;''>
            <thead class='table-dark'>
                <tr>
                    <th class='text-center'>Folio</th>
                    <th class='text-center'>Cliente</th>
                    <th class='text-center'>Datos</th>
                    <th class='text-center'>Agregar Detalles</th>
                    <th class='text-center'>Estatus</th>
                </tr>
            </thead>
            <tbody>";
                foreach ($lista as $orden) {
                    //$texto .= "<p>" . $orden['folio'] . "</p>" . "<p>" . $orden['nombre'] . "</p>";
                    $texto .= "
                      <tr>
                            <td class='align-middle text-center'>" . $orden['folio'] . "</td>
                            <td class='align-middle text-center'>" . $orden['nombre'] . "</td>
                            <td class='align-middle text-center'>" . $orden['marca'] . " - " . $orden['modelo'] . "</td>
                            <td class='align-middle text-center'>
                                 <button class='btn btn-warning'>
                                    <a style='text-decoration: none; color:white;' class='detalles' href='./detalleorden.php?id=" . $orden['folio'] . "&action=view'>Ver detalles</a>

                                </button>
                            </td>
                            <td class='align-middle text-center'>";
                    if ($orden['estatus'] == '') {
                        $texto .= "Aprobar";
                    } elseif ($orden['estatus'] == 'Encurso') {
                        $texto .= "En curso";
                    } elseif ($orden['estatus'] == 'Listo') {
                        $texto .= "Listo";
                    } else {
                        $texto .= "Pagado";
                    }
                    $texto .= " </td>
                        </tr>";
                }

                $texto .= "</tbody>
                </table>
            </div>";

                $objeto->query = $texto;
            } else {
                $salida .= "No hay datos";
                $objeto->query = $texto;
            }
        }


        if ($_POST['tabla'] == 'buscarlistpago') {
            if ($_POST['consulta'] != 'indefinido') {
                $texto = "";
                $textobusqueda = filter_var($_POST['consulta'], FILTER_SANITIZE_STRING);
                $sql = $conn->prepare("SELECT * FROM ordenes WHERE folio LIKE '%" . $textobusqueda . "%' AND estatus = 'Listo' OR nombre LIKE '%" . $textobusqueda . "%'  AND estatus = 'Listo' OR marca LIKE '%" . $textobusqueda . "%'  AND estatus = 'Listo' OR modelo LIKE '%" . $textobusqueda . "%' AND estatus = 'Listo';");
                $sql->execute();
            } else {
                $texto = "";
                $sql = $conn->prepare("SELECT * from ordenes WHERE estatus = 'Listo' ORDER BY folio");
                $sql->execute();
                $objeto->fail = "todo el registro de listos";
            }

            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

            if ($sql->rowCount() > 0) {




                $texto .= "    <div class=' container table-responsive contenedor-tabla' style='margin-top: 0px;'>
        <table class='table table-striped table-responsive' id='detalles-list' style='width: 100%;'>
            <thead class='table-dark'>
                <tr>
                    <th class='text-center'>Folio</th>
                    <th class='text-center'>Cliente</th>
                    <th class='text-center'>Datos</th>
                    <th class='text-center'>Agregar Detalles</th>
                    <th class='text-center'>Estatus</th>
                </tr>
            </thead>
                <tbody>";
                foreach ($lista as $orden) {
                    //$texto .= "<p>" . $orden['folio'] . "</p>" . "<p>" . $orden['nombre'] . "</p>";
                    $texto .= "   <tr>
                            <td class='align-middle text-center'>" . $orden['folio'] . "</td>
                            <td class='align-middle text-center'>" . $orden['nombre'] . "</td>
                            <td class='align-middle text-center'>" . $orden['marca'] . " - " . $orden['modelo'] . "</td>
                            <td class='align-middle text-center'>
                                <button class='btn btn-warning'>
                                    <a style='text-decoration: none; color:white;' class='detalles' href='./detalleorden.php?id='" . $orden['folio'] . "'>Agregar concepto</a>

                                </button>
                            </td>
                            <td class='align-middle text-center'>
                                <button s-status='" . $orden['estatus'] . "' class='btn btn btn-success' data_id='" . $orden['folio'] . "'>";


                    if ($orden['estatus'] == '') {
                        $texto .= "Aprobar";
                    } elseif ($orden['estatus'] == 'Encurso') {
                        $texto .= "En curso";
                    } else {
                        $texto .= "Listo";
                    }


                    $texto .= "</button>

                            </td>


                        </tr>";

                    $objeto->query = $texto;
                }
            } else {
                $salida .= "No hay datos";
                $objeto->query = $texto;
            }
        }


        if ($_POST['tabla'] == 'buscarpendientes') {
            if ($_POST['consulta'] != 'indefinido') {
                $texto = "";
                $textobusqueda = filter_var($_POST['consulta'], FILTER_SANITIZE_STRING);
                $sql = $conn->prepare("SELECT * FROM ordenes WHERE estatus IS NULL AND nombre LIKE '%" . $textobusqueda . "%' OR estatus = 'Encurso' AND nombre LIKE '%" . $textobusqueda . "%'
                                                                OR estatus IS NULL AND folio LIKE '%" . $textobusqueda . "%' OR estatus = 'Encurso' AND folio LIKE '%" . $textobusqueda . "%'
                                                                OR estatus IS NULL AND marca LIKE '%" . $textobusqueda . "%' OR estatus = 'Encurso' AND marca LIKE '%" . $textobusqueda . "%'
                                                                OR estatus IS NULL AND modelo LIKE '%" . $textobusqueda . "%' OR estatus = 'Encurso' AND modelo LIKE '%" . $textobusqueda . "%';");

                $sql->execute();
            } else {
                $texto = "";
                $sql = $conn->prepare("SELECT * from ordenes WHERE estatus IS NULL OR estatus = 'pendiente' OR estatus ='Encurso' ORDER BY folio");
                $sql->execute();
                $objeto->fail = "todo el registro hist";
            }

            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

            if ($sql->rowCount() > 0) {




                $texto .= "<div class='container table-responsive contenedor-tabla' style='margin-top: 0px;'>
        <table class='table table-striped table-responsive' id='detalles-list' style='width: 100%;'>
            <thead class='table-dark'>
                <tr>
                    <th class='text-center'>Eliminar</th>
                    <th class='text-center'>Folio</th>
                    <th class='text-center'>Cliente</th>
                    <th class='text-center'>Datos</th>
                    <th class='text-center'>Agregar Detalles</th>
                    <th class='text-center'>Estatus</th>
                     <th class='text-center'>Editar</th>
                </tr>
            </thead>
            <tbody>";
                foreach ($lista as $orden) {
                    //$texto .= "<p>" . $orden['folio'] . "</p>" . "<p>" . $orden['nombre'] . "</p>";
                    $texto .= "  <tr>
                            <td class='align-middle text-center'>
                                <button class='btn btn-danger' data_id='" . $orden['folio'] . "'>
                                    X
                                </button>
                            </td>

                            <td class='align-middle text-center'>" . $orden['folio'] . "</td>
                            <td class='align-middle text-center'>" . $orden['nombre'] . "</td>
                            <td class='align-middle text-center'>" . $orden['marca'] . " - " . $orden['modelo'] . "</td>
                            <td class='align-middle text-center'>
                                <button class='btn btn-warning'>
                                    <a style='text-decoration: none; color:white;' class='detalles' href='./detalleorden.php?id=" . $orden['folio'] . "'>Agregar concepto</a>

                                </button>
                            </td>
                            <td class='align-middle text-center'>
                                <button s-status='" . $orden['estatus'] . "' class='btn btn btn-success' data_id='" . $orden['folio'] . "'>";

                    if ($orden['estatus'] == '') {
                        $texto .= "Aprobar";
                    } elseif ($orden['estatus'] == 'Encurso') {
                        $texto .= "En curso";
                    } else {
                        $texto .= "Listo";
                    }



                    $texto .= " </button>
                    </td>
                      <td class='align-middle text-center'>
                                <button class='btn btn-primary'>
                                    <a style='text-decoration: none; color:white;' class='detalles' href='./generarOrden.php?id=" . $orden['folio'] . "&accion=Editar'>Editar</a>

                                </button>
                            </td>
            
                        </tr>";
                }

                $texto .= "</tbody>
                </table>
            </div>";

                $objeto->query = $texto;
            } else {
                $salida .= "No hay datos";
                $objeto->query = $texto;
            }
        }
    } catch (PDOException $e) {
        $objeto->error = "error";
    }

    echo json_encode($objeto);
}
