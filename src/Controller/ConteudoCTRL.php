<?php

namespace Src\Controller;

use Src\Model\ConteudoMODEL;
use Src\VO\ConteudoVO;

class ConteudoCTRL
{
    private $model;

    public function __construct()
    {
        $this->model = new ConteudoMODEL();
    }

    public function CadastrarConteudoCTRL(ConteudoVO $vo)
    {
        if (
            trim($vo->getTitulo()) == '' ||
            $vo->getDisciplinaId() <= 0
        ) {
            return 0;
        }

        return $this->model->CadastrarConteudoMODEL($vo);
    }

    public function ConsultarConteudoCTRL(): array
    {
        return $this->model->ConsultarConteudoMODEL();
    }

    public function ConsultarPorDisciplinaCTRL(int $id): array
    {
        return $this->model->ConsultarPorDisciplinaMODEL($id);
    }

    public function AlterarConteudoCTRL(ConteudoVO $vo)
    {
        if ($vo->getId() <= 0) {
            return 0;
        }

        return $this->model->AlterarConteudoMODEL($vo);
    }

    public function ExcluirConteudoCTRL(int $id): int
    {
        if ($id <= 0) return 0;

        return $this->model->ExcluirConteudoMODEL($id);
    }

    public function DetalharConteudoCTRL(int $id): array
    {
        if ($id <= 0) return [];

        return $this->model->DetalharConteudoMODEL($id);
    }

    // Para paginação, tem que passar o número da página, e o limite de itens por página, e o offset (quantos itens pular)
    public function ConsultarConteudoPaginadoCTRL(int $page = 1): array
    {
        $limit = 10;

        if ($page < 1)
            $page = 1;

        $offset = ($page - 1) * $limit;

        $dados = $this->model->ConsultarConteudoPaginadoMODEL($limit, $offset);
        $total = $this->model->TotalConteudoMODEL();

        return [
            'dados' => $dados,
            'total' => $total,
            'limit' => $limit,
            'page'  => $page
        ];
    }

    public function ConsultarConteudoPorDisciplinaCTRL(int $id): array
    {
        if ($id <= 0) {
            return [];
        }

        return $this->model
            ->ConsultarConteudoPorDisciplinaMODEL($id);
    }
}
