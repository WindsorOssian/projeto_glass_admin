<?php

namespace Src\VO;

use Src\Public\Util;

class ConteudoVO extends LogErroVO
{
    private $id;
    private $titulo;
    private $descricao;
    private $status;
    private $disciplina_id;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = Util::RemoverTags($titulo);
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = Util::RemoverTags($descricao);
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setDisciplinaId($id)
    {
        $this->disciplina_id = $id;
    }

    public function getDisciplinaId()
    {
        return $this->disciplina_id;
    }
}