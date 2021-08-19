<div class="row justify-content-center text-center">


    <h4 class="text-center">Datos cliente</h4>


    <div class="col-6 text-center">

    </div>

    <div class="col-6 text-center">


    </div>

    <form class="row justify-content-center g-3" action="#" id="detallenotasform">


        <div class="col-6">
            <label for="inputAddress" class="form-label">Concepto</label>
            <input type="text" class="form-control" id="concepto">
        </div>



        <div class="col-3">
            <label for="inputAddress2" class="form-label">Precio</label>
            <input type="number" min="1" class="form-control" id="precio" placeholder="">
        </div>

        <div class="col-3">
            <label for="inputState" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad">
        </div>

        <input type="hidden" name="tipo" id="tipo" value="nota">


        <div class="col-12 text-center">
            <button type="submit" id="adddetallesbtn" class="btn btn-primary text-center">Agregar Producto</button>
        </div>

    </form>

    <?php
    //}
    ?>





    <div class="container table-responsive contenedor-tabla" style="padding-top: 10px;">
        <table class="table" id="detalles-list">
            <thead class="table-dark">
                <tr>
                    <?php
                    /*
                if ($_GET['action'] == 'view') {*/
                    ?>

                    <?php
                    /* } else {    ?>
                    <th class="align-middle text-center">Remover</th>

                <?php } */ ?>

                    <th class="align-middle text-center">Cantidad</th>
                    <th class="align-middle text-center">Concepto</th>
                    <th class="align-middle text-center">Precio Unitario</th>
                    <th class="align-middle text-center">Importe</th>
                </tr>
            </thead>
            <tbody>

                <?php
                /*
            $ordenesdet = obtenerdetalleordenes($id);
            $ordenesdet->execute();
            $listad = $ordenesdet->fetchAll(PDO::FETCH_ASSOC);
            $rows = $ordenesdet->rowCount();
            if ($rows) {
                foreach ($listad as $ordetalle) {
                    */
                ?>


                <tr>

                    <?php /*
                        if ($_GET['action'] == 'view') {
                        ?>

                        <?php } else {    ?>
                            <td class="align-middle text-center">
                                <button class="btn btn-danger" eliminar="<?php echo $ordetalle['idDetalle']; ?>">X</button>
                            </td>

                        <?php } */ ?>


                    <td class="align-middle text-center"><?php //echo $ordetalle['cantidad']; 
                                                            ?></td>
                    <td class="align-middle text-center"><?php //echo $ordetalle['concepto']; 
                                                            ?></td>
                    <td class="align-middle text-center"><?php //echo $ordetalle['unitario']; 
                                                            ?></td>
                    <td class="align-middle text-center" id="total"><?php //echo $ordetalle['total']; 
                                                                    ?></td>

                </tr>

                <?php
                /*

                    $subtotal = $subtotal + ($ordetalle['total']);
                    $iva = $subtotal * 0.16;
                    $total = $subtotal * 1.16;
                }
            }*/
                ?>



            </tbody>
            <tfoot>
                <tr>
                    <?php /*
                if ($_GET['action'] == 'view') {
                ?>

                <?php } else {    ?>
                    <td></td>

                <?php } */ ?>

                    <td></td>
                    <td></td>
                    <td class="text-end">Sub Total :</td>
                    <td class="text-center" id="subtotalcant">$ <?php //echo number_format($subtotal, 2) 
                                                                ?></td>
                </tr>


                <tr style="border: none;">

                    <?php /*
                if ($_GET['action'] == 'view') {*/
                    ?>

                    <?php /*} else {    ?>
                    <td></td>
                <?php } */ ?>

                    <td></td>
                    <td></td>
                    <td class="text-end">Iva :</td>
                    <td class="text-center" id="ivacant">$<?php //echo number_format($iva, 2) 
                                                            ?></td>
                </tr>
                <tr style="border: none;">

                    <?php
                    /*
                if ($_GET['action'] == 'view') {*/
                    ?>

                    <?php /*} else {    ?>
                    <td></td>

                <?php } */ ?>
                    <td></td>
                    <td></td>
                    <td class="text-end">Total :</td>
                    <td class="text-center" id="totalcant">$ <?php //echo number_format($total, 2) 
                                                                ?></td>
                </tr>
            </tfoot>
        </table>

        <!--  <a id="printbutton" href="#" type="button" class="btn btn-primary">Imprimir</a>-->

    </div>