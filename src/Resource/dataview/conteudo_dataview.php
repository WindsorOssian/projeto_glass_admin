<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\VO\ConteudoVO;
use Src\Controller\ConteudoCTRL;

$ctrl = new ConteudoCTRL();

// 🔥 CADASTRAR
if (isset($_POST['btn_salvar'])) {

    $vo = new ConteudoVO();

    $vo->setTitulo($_POST['titulo']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setDisciplinaId((int)$_POST['disciplina_id']);
    $vo->setStatus($_POST['status']);

    echo $ctrl->CadastrarConteudoCTRL($vo);
    exit;
}

// 🔥 ALTERAR
if (isset($_POST['btn_alterar'])) {

    $vo = new ConteudoVO();

    $vo->setId($_POST['id']);
    $vo->setTitulo($_POST['titulo']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setDisciplinaId((int)$_POST['disciplina_id']);
    $vo->setStatus($_POST['status']);

    echo $ctrl->AlterarConteudoCTRL($vo);
    exit;
}

// 🔥 EXCLUIR
if (isset($_POST['btn_excluir'])) {
    echo $ctrl->ExcluirConteudoCTRL($_POST['id']);
    exit;
}

// Paginação
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$result = $ctrl->ConsultarConteudoPaginadoCTRL($page);

$conteudos   = $result['dados'];
$total       = $result['total'];
$limit       = $result['limit'];
$currentPage = $result['page'];

$totalPages = ceil($total / $limit);