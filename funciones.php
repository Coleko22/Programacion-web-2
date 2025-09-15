<?php

$cofre = [
    "oro",
    "plata",
    "bronce",
    "bronce",
    "oro"
];

function getBonifXCofre($cofre) {
        $contadorOro = 0;
        $contadorPlata = 0;
        $contadorBronce = 0;
    for ($i=0; $i < count($cofre); $i++) { 
        if(strcmp($cofre[$i], "oro") === 0) {
            $contadorOro++;
        };
        if(strcmp($cofre[$i], "plata") === 0) {
            $contadorPlata++;
        };
        if(strcmp($cofre[$i], "bronce") === 0) {
            $contadorBronce++;
        };
    };

    $bonificacion = ($contadorOro * 200) + ($contadorPlata * 50) + ($contadorBronce * 10);
    return $bonificacion;
};

function contarOro($cofre) {
    $contador = 0;
    for ($i=0; $i < count($cofre); $i++) { 
        if(strcmp($cofre[$i], "oro") === 0) {
            $contador++;
        };
    };
    return $contador;
};

function contarBronce($cofre) {
    $contador = 0;
    for ($i=0; $i < count($cofre); $i++) { 
        if(strcmp($cofre[$i], "bronce") === 0) {
            $contador++;
        };
    };
    return $contador;
};

function contarPlata($cofre) {
    $contador = 0;
    for ($i=0; $i < count($cofre); $i++) { 
        if(strcmp($cofre[$i], "plata") === 0) {
            $contador++;
        };
    };
    return $contador;
};

function getDetalleXCofre($cofre) {
        $contadorOro = 0;
        $contadorPlata = 0;
        $contadorBronce = 0;
    for ($i=0; $i < count($cofre); $i++) { 
        if(strcmp($cofre[$i], "oro") === 0) {
            $contadorOro++;
        };
        if(strcmp($cofre[$i], "plata") === 0) {
            $contadorPlata++;
        };
        if(strcmp($cofre[$i], "bronce") === 0) {
            $contadorBronce++;
        };
    };

    $bonificacion = ($contadorOro * 200) + ($contadorPlata * 50) + ($contadorBronce * 10);

    $detalle = [
        "oro" => $contadorOro,
        "plata" => $contadorPlata,
        "bronce" => $contadorBronce,
        "bonif" => $bonificacion
    ];

    return $detalle;
};

$productos = [
[
    'cod' => 111,
    'precio' => 800,
    'cantidad' => 3,
    'detalle' => 'Coca Cola 1.5LT', 'icono' => 'bebidas.png',
], 
[
    'cod' => 222,
    'precio' => 100,
    'cantidad' => 1,
    'detalle' => 'Azúcar Ledesma', 'icono' => 'azucar.png',
], 
[
    'cod' => 333,
    'precio' => 800,
    'cantidad' => 2,
    'detalle' => 'Servilletas Elegante 3 rollos', 'icono' => 'limpieza.png',
], 
[
    'cod' => 444,
    'precio' => 250,
    'cantidad' => 1,
    'detalle' => 'Alcohol etílico', 'icono' => 'alcohol.png',
], 
[
    'cod' => 555,
    'precio' => 5000,
    'cantidad' => 2,
    'detalle' => 'Papas Pringles', 'icono' => 'papas.png',
], 
[
    'cod' => 789,
    'precio' => 80000,
    'cantidad' => 1,
    'detalle' => 'Licuadora', 'icono' => 'licuadora.png',
],
];

function getMontoXProductos($productos) {
    $montoTotal = 0;
    foreach ($productos as $producto) {
        $montoTotal += $producto['precio'] * $producto['cantidad'];
    }
    return $montoTotal;
}

function getCodigo($productos) {
    return $productos["cod"];
}

function getProducto($productos) {
    return $productos["detalle"];
}

function getPrecio($productos) {
    return $productos["precio"];
}

function getCantidad($productos) {
    return $productos["cantidad"];
}

function getSubtotal($productos) {
    return $productos["precio"] * $productos["cantidad"];
}

function getMontoConDescuento($productos, $cofre) {
    $montoSinDescuento = getMontoXProductos($productos);
    
    if($montoSinDescuento < getBonifXCofre($cofre)){
        echo "El descuento debe ser menor o igual al monto sin descuento";
    } else {
        $montoConDescuento = $montoSinDescuento - getBonifXCofre($cofre);
    }
        return $montoConDescuento;
}

?>