<?php
error_reporting(0);

//historial
function obtenerordenes()
{
    include 'bd.php';

    try {
        return $conn->prepare("SELECT * from ordenes");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage();
        return false;
    }
}
//ordenes pendientes lista
function ordenespendientes()
{
    include 'bd.php';

    try {
        return $conn->prepare("SELECT * from ordenes WHERE estatus IS NULL OR estatus = 'pendiente' OR estatus ='Encurso';");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage();
        return false;
    }
}
//ordenes que estan listas para ser pagadas
function ordeneslistas()
{
    include 'bd.php';

    try {
        return $conn->prepare("SELECT * from ordenes WHERE estatus = 'Listo'");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage();
        return false;
    }
}

function ordeneshistorial()
{
    include 'bd.php';

    try {
        return $conn->prepare("SELECT * from ordenes WHERE estatus = 'Pagado'");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage();
        return false;
    }
}

//listar mecanicos en form
function obtmecanicos()
{
    include 'bd.php';

    try {
        return $conn->prepare("SELECT * from mecanico");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage();
        return false;
    }
}

//obtener detalles de una orden
function obtenerdetalleordenes($id)
{
    include 'bd.php';

    try {
        return $conn->prepare("SELECT * from detalleord WHERE folio =$id");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage();
        return false;
    }
}

//obtener una orden especifica
function obtenerorden($id)
{
    include 'bd.php';

    try {
        return $conn->prepare("SELECT * from ordenes WHERE folio =$id");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage();
        return false;
    }
}

function autenticacion()
{
    /*session_start();
    if (!$_SESSION['login']) {
        //header('Location:/');
        return false;
    }

    return true;*/

    session_start();
    if ($_SESSION['login']) {
        //header('Location:/');
        return true;
    }

    return false;
}
