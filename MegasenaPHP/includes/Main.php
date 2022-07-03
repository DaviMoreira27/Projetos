
<?php
//echo "<pre>";
//print_r($resultado);
//echo "<pre>";
$divida = number_format($resultado['valorEstimadoProximoConcurso']);
$divFim = str_replace(',', '.', $divida);
?>

<style>
    .dezenas{
        border: 3px solid #ccc;
        border-radius: 50%;
        height: 80px;
        width: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
    }
</style>

<img class="mb-5" src="imgs/mega-sena-logo.png"
     alt="Megasena"
     width="400">

<p class="fs-2">Concurso:
    <span class="badge
    bg-success fs-3"><?=$resultado['numero']?></span>
</p>

<p class="fs-5">Data de Apuração:
    <span class="badge
    bg-success fs-3"><?=$resultado['dataApuracao']?></span>
</p>

<p class="fs-5">Valor acumulado para o proximo concurso
    <span class="badge
    bg-success fs-3"><?=$divFim?></span>
</p>

<p class="fs-5">Resultado:
    <span class="badge
    bg-success fs-3"><?=($resultado['acumulado'] ? 'Acumulado'
            : 'Premiado')?></span>
</p>


<p class="fs-3 mt-5 fw-bold">Dezenas Sorteadas:
    <div class="d-flex justify-content-center">
        <?php foreach ($resultado['dezenasSorteadasOrdemSorteio'] as $item) {
            echo '<span class="dezenas">'.$item.'</span>';
        } ?>

    </div>
</p>