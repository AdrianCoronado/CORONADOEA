<?php
include "includes/funciones/funciones.php";
?>
<div class="contenedor-contactos text-center">
    <h2 class="text-center">Historial Ordenes Taller</h2>

    <input class="buscador sombra" type="text" id="buscarhist" placeholder="Buscar contactos...">
    <p class="total-contactos text-center"><span></span></p>
</div>

<div class="container tab base">


    <div class=" container table-responsive contenedor-tabla" style="margin-top: 50px; overflow-y:scroll; height :450px;">
        <table class="table table-striped table-responsive" id="detalles-list" style="width: 100%;">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Fondo</th>
                    <th class="text-center">Banco</th>
                    <th class="text-center">Caja Fuerte</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="align-middle text-center"><?php echo $orden['folio']; ?></td>
                    <td class="align-middle text-center"><?php echo $orden['nombre']; ?>
                    <td class="align-middle text-center"><?php echo $orden['marca'] . " - " . $orden['modelo']; ?></td>
                    <td class="align-middle text-center">
                        <button class="btn btn-warning">
                            <a style="text-decoration: none; color:white;" class="detalles" href="./detalleorden.php?id=<?php echo $orden['folio']; ?>&action=view">Ver detalles</a>

                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>