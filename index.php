<?php
include 'funciones.php';
$bonificacion = getBonifXCofre($cofre);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Supermercado </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <h1 class="mb-3"> Detalle de compra </h1>

        <div class="border-bottom-3">
            <h2> Cofre de descuentos </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th> Moneda </th>
                        <th> Cantidad </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="img/iconos/detalle/oro.png" alt="Oro" />
                            Oro ($200)
                        </td>
                        <td> <?php echo contarOro($cofre) ?></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/iconos/detalle/plata.png" alt="Oro" />
                            Plata ($50)
                        </td>
                        <td> <?php echo contarPlata($cofre) ?> </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/iconos/detalle/bronce.png" alt="Oro" />
                            Bronce ($10)
                        </td>
                        <td> <?php echo contarBronce($cofre) ?> </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/iconos/detalle/bonif.png" alt="Bonificación" />
                            Bonificación
                        </td>
                        <td> <?php echo "$" . getBonifXCofre($cofre) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="border-bottom-3">
            <h2> Productos </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th> Cod </th>
                        <th> Detalle </th>
                        <th> Precio </th>
                        <th> Cantidad </th>
                        <th> Subtotal </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($productos); $i++) {
                        echo "<tr>
        <td>
            <img style='width: 30px' src='img/iconos/categorias/" . ($productos[$i]['icono'] ?? 'default.png') . "' alt=''>
            " . getCodigo($productos[$i]) . "
        </td>
        <td>" . getProducto($productos[$i]) . "</td>
        <td>$" . getPrecio($productos[$i]) . "</td>
        <td>" . getCantidad($productos[$i]) . "</td>
        <td>$" . getSubtotal($productos[$i]) . "</td>
    </tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <?php
                            if ($bonificacion > 0) {
                                echo "<del>Total: $" . getMontoXProductos($productos) . "</del>" . "<p style='color: green'> Total con descuento: $" . getMontoConDescuento($productos, $cofre) . "</p>";
                            } else {
                                echo "<p>Total: $" . getMontoXProductos($productos) . "<p>";
                            }
                            ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>