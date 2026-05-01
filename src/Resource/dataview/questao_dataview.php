<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\QuestaoCTRL;
use Src\Controller\ConteudoCTRL;
use Src\VO\QuestaoVO;

$ctrl = new QuestaoCTRL();

if (isset($_POST['btn_salvar'])) {

    $vo = new QuestaoVO();

    $vo->setEnunciado($_POST['enunciado']);
    $vo->setNivel($_POST['nivel']);
    $vo->setConteudoId((int) $_POST['conteudo_id']);
    $vo->setStatus(1);

    $alternativas = json_decode($_POST['alternativas'], true);
    $vo->setAlternativas($alternativas);

    $ret = $ctrl->CadastrarQuestaoCTRL($vo);

    echo $ret;
    exit;
} else if (isset($_POST['btn_alterar'])) {

    $vo = new QuestaoVO();

    $vo->setId((int) $_POST['id']);
    $vo->setEnunciado($_POST['enunciado']);
    $vo->setNivel($_POST['nivel']);
    $vo->setConteudoId((int) $_POST['conteudo_id']);
    $vo->setStatus(1);

    $alternativas = json_decode($_POST['alternativas'], true);
    $vo->setAlternativas($alternativas);

    $ret = $ctrl->AlterarQuestaoCTRL($vo);

    echo $ret;
    exit;
} else if (isset($_POST['btn_excluir'])) {

    $ret = $ctrl->ExcluirQuestaoCTRL((int) $_POST['id']);

    echo $ret;
    exit;
} else if (isset($_POST['buscar_conteudos'])) {

    $ctrl = new ConteudoCTRL();

    echo json_encode(
        $ctrl->ConsultarConteudoPorDisciplinaCTRL(
            (int)$_POST['disciplina_id']
        )
    );

    exit;
}