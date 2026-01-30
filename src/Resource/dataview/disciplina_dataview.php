<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\DisciplinaCTRL;
use Src\VO\DisciplinaVO;

$ctrl = new DisciplinaCTRL();

// Paga paginação
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$result = $ctrl->ConsultarDisciplinaPaginadoCTRL($page);

$disciplinas = $result['dados'];
$total       = $result['total'];
$limit       = $result['limit'];
$currentPage = $result['page'];

$totalPages = ceil($total / $limit);


// $disciplinas = $ctrl->ConsultarDisciplinaCTRL();  // Essa variavel $disciplinas guardou as consultas

// /* =========================
//    CADASTRAR
// ========================= */
if(isset($_POST['btn_salvar'])){

    $vo = new DisciplinaVO();

    $vo->setNomeDisciplina(($_POST['nome_disciplina']));
    $vo->setDescricao(($_POST['descricao_disciplina']));
    $status = (int) $_POST['status_disciplina'];
    $vo->setStatus($status);

    $ret = $ctrl->CadastrarDisciplinaCTRL($vo);

    if($_POST['btn_salvar'] == 'ajx')
        echo $ret;
    exit;

}

// /* =========================
//    ALTERAR
// ========================= */

else if(isset($_POST['btn_alterar'])){

    $vo = new DisciplinaVO();

    $vo->setId((int)$_POST['id_disciplina']);
    $vo->setNomeDisciplina(($_POST['nome_disciplina']));
    $vo->setDescricao(($_POST['descricao_disciplina']));
    $status = (int) $_POST['status_disciplina'];
    $vo->setStatus($status);

    $ret = $ctrl->AlterarDisciplinaCTRL($vo);

    if($_POST['btn_salvar'] == 'ajx')
        echo $ret;
    exit;

}


// /* =========================
//    CONSULTAR VAI CARREGAR TODAS AS MATÉRIAS
// ========================= */







