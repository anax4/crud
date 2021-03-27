<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;

if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {

    $vaga = new Vaga;
    $vaga->titulo = $_POST['titulo'];
    $vaga->descricao = $_POST['descricao'];
    $vaga->ativo = $_POST['ativo'];
    $vaga->cadastrar();
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
