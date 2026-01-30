<?php

namespace Src\Controller;

use Src\VO\DisciplinaVO;
use Src\Model\DisciplinaMODEL;
use Src\Public\Util;

class DisciplinaCTRL
{

    private $model;

    public function __construct()
    {
        $this->model = new DisciplinaMODEL;
    }

    public function CadastrarDisciplinaCTRL(DisciplinaVO $vo)
    {
        if (trim($vo->getNomeDisciplina()) === '')
            return 0;

        $vo->setErroTecnico(CADASTRAR_DISCIPLINA);
        // $vo->setCodLogado(Util::CodigoLogado()) Futuramente irei criar

        return $this->model->CadastrarDisciplinaMODEL($vo);
    }

    public function AlterarDisciplinaCTRL(DisciplinaVO $vo): int
    {

        if (
            trim($vo->getNomeDisciplina()) === '' || trim($vo->getDescricao()) === ''
            || !is_numeric($vo->getId()) || $vo->getId() <= 0
        )
            return 0;
        $vo->setErroTecnico(ALTERAR_DISCIPLINA);

        return $this->model->AlterarDisciplinaMODEL($vo);

        // Em $vo->getId() <= 0 ID válido começa em 1

    }

    public function ConsultarDisciplinaCTRL(): array
    {

        return $this->model->ConsultarDisciplinaMODEL();
    }

    // Paginação
    public function ConsultarDisciplinaPaginadoCTRL(int $page = 1): array
    {
        $limit = 10;

        if ($page < 1)
            $page = 1;

        $offset = ($page - 1) * $limit;

        $dados = $this->model->ConsultarDisciplinaPaginadoMODEL($limit, $offset);
        $total = $this->model->TotalDisciplinaMODEL();

        return [
            'dados' => $dados,
            'total' => $total,
            'limit' => $limit,
            'page'  => $page
        ];
    }
}
