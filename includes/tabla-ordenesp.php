<div class="contenedor-contactos text-center">
    <h2 class="text-center">Ordenes Taller Pendientes</h2>

    <input class="buscador sombra" type="text" id="buscarpendientes" placeholder="Buscar contactos...">
    <p class="total-contactos text-center"><span></span>Registros</p>
</div>

<div class="container tab">


    <div class=" container table-responsive contenedor-tabla" style="margin-top: 50px;">
        <table class="table table-striped table-responsive" id="detalles-list" style="width: 100%;">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Eliminar</th>
                    <th class="text-center">Folio</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Datos</th>
                    <th class="text-center">Agregar Detalles</th>
                    <th class="text-center">Estatus</th>
                    <th class="text-center">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ordenes = ordenespendientes();
                $ordenes->execute();
                $lista = $ordenes->fetchAll(PDO::FETCH_ASSOC);
                $rows = $ordenes->rowCount();
                if ($rows) {
                    foreach ($lista as $orden) {
                ?>

                        <tr>
                            <td class="align-middle text-center">
                                <button class="btn btn-danger" data_id="<?php echo $orden['folio']; ?>">
                                    X
                                </button>
                            </td>

                            <td class="align-middle text-center"><?php echo $orden['folio']; ?></td>
                            <td class="align-middle text-center"><?php echo $orden['nombre']; ?>
                            <td class="align-middle text-center"><?php echo $orden['marca'] . " - " . $orden['modelo']; ?></td>
                            <td class="align-middle text-center">
                                <button class="btn btn-warning">
                                    <a style="text-decoration: none; color:white;" class="detalles" href="./detalleorden.php?id=<?php echo $orden['folio']; ?>">Agregar concepto</a>

                                </button>
                            </td>
                            <td class="align-middle text-center">
                                <button s-status="<?php echo $orden['estatus']; ?>" class="btn btn btn-success" data_id="<?php echo $orden['folio']; ?>">
                                    <?php
                                    if ($orden['estatus'] == '') {
                                        echo "Aprobar";
                                    } elseif ($orden['estatus'] == 'Encurso') {
                                        echo "En curso";
                                    } else {
                                        echo "Listo";
                                    }

                                    ?>
                                </button>

                            </td>
                            <td class="align-middle text-center">
                                <button class="btn btn-primary">
                                    <a style="text-decoration: none; color:white;" class="detalles" href="./generarOrden.php?id=<?php echo $orden['folio']; ?>&accion=Editar">Editar</a>

                                </button>
                            </td>


                        </tr>
                <?php
                    }
                }
                ?>


            </tbody>
        </table>
    </div>
</div>