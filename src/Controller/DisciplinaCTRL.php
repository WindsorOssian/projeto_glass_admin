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
        if(empty($vo->getNomeDisciplina()))
            return 0;

        $vo->setErroTecnico(CADASTRAR_DISCIPLINA);
        // $vo->setCodLogado(Util::CodigoLogado()) Futuramente irei criar

        return $this->model->CadastrarDisciplinaMODEL($vo);

    }



}