<?php

namespace Src\VO;

use Src\Public\Util;

class DisciplinaVO extends LogErroVO
{
    private $id;
    private $nome;
    private $descricao;
    private $status;

    // Get e Set Id
    public function setId(int $p_id): void
    {
        $this->id = $p_id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    // Get e Set Nome
    public function setNomeDisciplina(string $p_nome): void
    {
        $this->nome = Util::RemoverTags($p_nome);
    }
    public function getNomeDisciplina(): string
    {
        return $this->nome;
    }

    // Get e Set Descrição
    public function setDescricao(string $p_descricao): void
    {
        $this->descricao = Util::RemoverTags($p_descricao);
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    // Get e Set Status
    public function setStatus(int $p_status): void
    {
        $this->status = $p_status;
    }
    public function getStatus(): int
    {
        return $this->status;
    }
}
