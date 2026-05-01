<?php

namespace Src\Controller;

use Src\Model\QuestaoMODEL;
use Src\VO\QuestaoVO;

class QuestaoCTRL
{
    private $model;

    public function __construct()
    {
        $this->model = new QuestaoMODEL();
    }

    // =========================
    // CADASTRAR
    // =========================
    public function CadastrarQuestaoCTRL(QuestaoVO $vo): int
    {
        if (
            trim($vo->getEnunciado()) == '' ||
            trim($vo->getNivel()) == '' ||
            $vo->getConteudoId() <= 0
        ) {
            return 0;
        }

        $alternativas = $vo->getAlternativas();

        // mínimo 2 e máximo 5
        if (count($alternativas) < 2 || count($alternativas) > 5) {
            return 0;
        }

        $qtdCorretas = 0;

        foreach ($alternativas as $alt) {

            if (
                !isset($alt['texto']) ||
                trim($alt['texto']) == ''
            ) {
                return 0;
            }

            if (
                !isset($alt['correta'])
            ) {
                return 0;
            }

            if ($alt['correta'] == 1) {
                $qtdCorretas++;
            }
        }

        // apenas 1 correta
        if ($qtdCorretas != 1) {
            return 0;
        }

        return $this->model->CadastrarQuestaoMODEL($vo);
    }

    // =========================
    // CONSULTAR
    // =========================
    public function ConsultarQuestaoCTRL(): array
    {
        return $this->model->ConsultarQuestaoMODEL();
    }

    // =========================
    // PAGINAÇÃO
    // =========================
    public function ConsultarQuestaoPaginadoCTRL(int $page = 1): array
    {
        $limit = 10;

        if ($page < 1) {
            $page = 1;
        }

        $offset = ($page - 1) * $limit;

        $dados = $this->model->ConsultarQuestaoPaginadoMODEL($limit, $offset);
        $total = $this->model->TotalQuestaoMODEL();

        return [
            'dados' => $dados,
            'total' => $total,
            'limit' => $limit,
            'page'  => $page
        ];
    }

    // =========================
    // ALTERAR
    // =========================
    public function AlterarQuestaoCTRL(QuestaoVO $vo): int
    {
        if (
            $vo->getId() <= 0 ||
            trim($vo->getEnunciado()) == '' ||
            trim($vo->getNivel()) == '' ||
            $vo->getConteudoId() <= 0
        ) {
            return 0;
        }

        $alternativas = $vo->getAlternativas();

        if (count($alternativas) < 2 || count($alternativas) > 5) {
            return 0;
        }

        $qtdCorretas = 0;

        foreach ($alternativas as $alt) {

            if (
                !isset($alt['texto']) ||
                trim($alt['texto']) == ''
            ) {
                return 0;
            }

            if (
                !isset($alt['correta'])
            ) {
                return 0;
            }

            if ($alt['correta'] == 1) {
                $qtdCorretas++;
            }
        }

        // apenas 1 correta
        if ($qtdCorretas != 1) {
            return 0;
        }

        return $this->model->AlterarQuestaoMODEL($vo);
    }

    // =========================
    // EXCLUIR
    // =========================
    public function ExcluirQuestaoCTRL(int $id): int
    {
        if ($id <= 0) {
            return 0;
        }

        return $this->model->ExcluirQuestaoMODEL($id);
    }

    // =========================
    // DETALHAR
    // =========================
    public function DetalharQuestaoCTRL(int $id): array
    {
        if ($id <= 0) {
            return [];
        }

        return $this->model->DetalharQuestaoCompletaMODEL($id);
    }

    public function ConsultarConteudoPorDisciplinaCTRL(int $id): array
    {
        if ($id <= 0)
            return [];

        return $this->model->ConsultarConteudoPorDisciplinaMODEL($id);
    }
}
