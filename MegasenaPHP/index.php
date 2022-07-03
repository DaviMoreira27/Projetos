<?php

require_once __DIR__ . '/vendor/autoload.php';

use \App\Caixa\Loteria;

//Concurso
$concurso = $_GET['concurso'] ?? null;


$resultado = Loteria::consultarResultado('megasena', $concurso);

// Header
require_once __DIR__ . '/includes/Header.php';

// Body
require_once isset($resultado['numero']) ?
    __DIR__ . '/includes/Main.php':
    __DIR__ . '/includes/Error.php';

// Footer
require_once __DIR__ . '/includes/Footer.php';

