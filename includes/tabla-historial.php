<?php
//include "includes/funciones/funciones.php";
?>
<div class="contenedor-contactos text-center">
    <h2 class="text-center">Historial Ordenes Taller</h2>

    <input class="buscador sombra" type="text" id="buscarhist" placeholder="Buscar contactos...">
    <p class="total-contactos text-center"><span></span>Ordenes listas para pago</p>
</div>

<div class="container tab base">


    <div class=" container table-responsive contenedor-tabla" style="margin-top: 50px; overflow-y:scroll; height :450px;">
        <table class="table table-striped table-responsive" id="detalles-list" style="width: 100%;">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Folio</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Datos</th>
                    <th class="text-center">Agregar Detalles</th>
                    <th class="text-center">Estatus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ordenes = ordeneshistorial();
                $ordenes->execute();
                $lista = $ordenes->fetchAll(PDO::FETCH_ASSOC);
                $rows = $ordenes->rowCount();
                if ($rows) {
                    foreach ($lista as $orden) {
                ?>

                        <tr>
                            <td class="align-middle text-center"><?php echo $orden['folio']; ?></td>
                            <td class="align-middle text-center"><?php echo $orden['nombre']; ?>
                            <td class="align-middle text-center"><?php echo $orden['marca'] . " - " . $orden['modelo']; ?></td>
                            <td class="align-middle text-center">
                                <button class="btn btn-warning">
                                    <a style="text-decoration: none; color:white;" class="detalles" href="./detalleorden.php?id=<?php echo $orden['folio']; ?>&action=view">Ver detalles</a>

                                </button>
                            </td>
                            <td class="align-middle text-center">

                                <?php
                                if ($orden['estatus'] == '') {
                                    echo "Aprobar";
                                } elseif ($orden['estatus'] == 'Encurso') {
                                    echo "En curso";
                                } elseif ($orden['estatus'] == 'Listo') {
                                    echo "Listo";
                                } else {
                                    echo "Pagado";
                                }

                                ?>


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