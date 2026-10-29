<?php
$productos = [
    [
        'nombre'    => 'Portátil Lenovo ThinkPad',
        'categoria' => 'Electrónica',
        'precio'    => 850.00,
        'stock'     => 15,
    ],
    [
        'nombre'    => 'Monitor LG 27 pulgadas',
        'categoria' => 'Electrónica',
        'precio'    => 220.50,
        'stock'     => 30,
    ],
    [
        'nombre'    => 'Teclado Mecánico Keychron',
        'categoria' => 'Periféricos',
        'precio'    => 95.00,
        'stock'     => 45,
    ],
    [
        'nombre'    => 'Ratón Inalámbrico Logitech',
        'categoria' => 'Periféricos',
        'precio'    => 40.00,
        'stock'     => 60,
    ],
    [
        'nombre'    => 'Silla de Oficina Ergonómica',
        'categoria' => 'Mobiliario',
        'precio'    => 180.00,
        'stock'     => 12,
    ],
    [
        'nombre'    => 'Escritorio Elevable',
        'categoria' => 'Mobiliario',
        'precio'    => 310.00,
        'stock'     => 8,
    ],
    [
        'nombre'    => 'Lámpara LED de Escritorio',
        'categoria' => 'Mobiliario',
        'precio'    => 25.00,
        'stock'     => 25,
    ],
    [
        'nombre'    => 'Auriculares Sony WH-1000XM4',
        'categoria' => 'Audio',
        'precio'    => 280.00,
        'stock'     => 20,
    ],
    [
        'nombre'    => 'Altavoz Bluetooth JBL',
        'categoria' => 'Audio',
        'precio'    => 90.00,
        'stock'     => 35,
    ],
    [
        'nombre'    => 'Disco Duro Externo 2TB',
        'categoria' => 'Almacenamiento',
        'precio'    => 75.00,
        'stock'     => 50,
    ],
    [
        'nombre'    => 'Memoria USB 128GB',
        'categoria' => 'Almacenamiento',
        'precio'    => 18.50,
        'stock'     => 100,
    ],
    [
        'nombre'    => 'Webcam Full HD 1080p',
        'categoria' => 'Periféricos',
        'precio'    => 55.00,
        'stock'     => 40,
    ],
];

// Obtención dinámica de categorías únicas para el desplegable
$categorias = array_unique(array_column($productos, 'categoria'));
sort($categorias);
?>