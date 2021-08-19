<?php
error_reporting(0);


$id = $_GET['id'];
$accion = $_GET['accion'];

if ($id && $accion == 'Editar') {
    $resultado = obtenerorden($id);
    $resultado->execute();
    $dato = $resultado->fetch(PDO::FETCH_ASSOC);
}
?>


<div class="container-fluid">
    <?php
    if ($dato) {
    ?>

        <h2 class="text-center">Orden de taller</h2>

    <?php
    } else {
    ?>
        <h2 class="text-center">Registro de Orden de taller</h2>
    <?php
    }
    ?>

    <form class="row g-3" id="ordenform" enctype="multipart/form-data">



        <h4 class="text-center">Datos cliente</h4>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo ($dato['nombre']) ? $dato['nombre'] : ''; ?>">
        </div>

        <div class="col-md-6">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo ($dato['telefono']) ? $dato['telefono'] : ''; ?>">
        </div>

        <hr class="separacion">
        <h4 class="text-center">Datos Auto</h4>

        <div class="col-4">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="<?php echo ($dato['marca']) ? $dato['marca'] : ''; ?>">
        </div>

        <div class="col-4">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo ($dato['modelo']) ? $dato['modelo'] : ''; ?>">
        </div>

        <div class="col-4">
            <label for="modelo" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo ($dato['tipo']) ? $dato['tipo'] : ''; ?>">
        </div>

        <div class="col-6 col-md-6">
            <label for="mecanico" class="form-label">Mecanico Asignado</label>
            <select id="mecanico" name="mecanico" class="form-select">
                <option disabled selected>--Seleccionar</option>
                <?php

                $mecanicos = obtmecanicos();
                $mecanicos->execute();
                $listam = $mecanicos->fetchAll(PDO::FETCH_ASSOC);
                $rows = $mecanicos->rowCount();
                if ($rows) {
                    foreach ($listam as $mecanicodato) {
                ?>

                        <!--<option><?php //echo $mecanicodato['nombre']; 
                                    ?></option>-->
                        <option <?php echo $mecanicodato['nombre'] == $dato['mecanico'] ? 'selected' :  '' ?>>
                            <?php
                            echo $mecanicodato['nombre'];
                            ?>
                        </option>

                <?php }
                }


                ?>
            </select>
        </div>

        <div class="col-6">
            <label for="autorizados" class="form-label">Detalles o Personal autorizado</label>
            <textarea class="form-control" id="autorizados" name="autorizados" rows="1" cols="20">
                <?php
                if ($dato['autorizados']) {
                    echo $dato['autorizados'];
                } else {
                }
                ?>
            </textarea>
        </div>

        <!--INPUTS HIDDEN-->



        <?php
        $txtbtn = ($dato['telefono']) ? 'Guardar' : 'Crear';
        $accion = ($dato['telefono']) ? 'editar' : 'crear';
        ?>

        <input type="hidden" id="accion" id-d="<?php echo $dato['folio']  ?>" name="accion" value="<?php echo $accion; ?>">

        <?php // if (isset($dato['id'])) { 
        ?>
        <!--  <input type="hidden" id="id" value="<? //php echo $dato['id']; 
                                                    ?>">-->
        <?php //} 
        ?>



        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary text-center"><?php echo $txtbtn; ?></button>
        </div>
    </form>

</div>