<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\DisciplinaCTRL;
use Src\VO\DisciplinaVO;

$ctrl = new DisciplinaCTRL();


/* =========================
   CADASTRAR
========================= */
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

/* =========================
   ALTERAR
========================= */

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











