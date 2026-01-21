<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\DisciplinaCTRL;
use Src\VO\DisciplinaVO;

$ctrl = new DisciplinaCTRL();

if(isset($_POST['btn_salvar'])){

    $vo = new DisciplinaVO();

    $vo->setNomeDisciplina(($_POST['nome_disciplina']));
    $vo->setDescricao(($_POST['descricao_disciplina']));
    $status = isset($_POST['status_disciplina']) ? 1 : 0;
    $vo->setStatus($status);

    $ret = $ctrl->CadastrarDisciplinaCTRL($vo);

    if($_POST['btn_salvar'] == 'ajx')
        echo $ret;
    exit;

}











