<?php

namespace Src\VO;

use Src\Public\Util;

class QuestaoVO extends LogErroVO
{
    private $id;
    private $enunciado;
    private $nivel;
    private $status;
    private $conteudo_id;
    private $alternativas = [];

    // =========================
    // ID
    // =========================
    public function setId(int $p_id): void
    {
        $this->id = $p_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    // =========================
    // ENUNCIADO
    // =========================
    public function setEnunciado(string $p_enunciado): void
    {
        $this->enunciado = Util::RemoverTags($p_enunciado);
    }

    public function getEnunciado(): string
    {
        return $this->enunciado;
    }

    // =========================
    // NIVEL
    // =========================
    public function setNivel(string $p_nivel): void
    {
        $this->nivel = Util::RemoverTags($p_nivel);
    }

    public function getNivel(): string
    {
        return $this->nivel;
    }

    // =========================
    // STATUS
    // =========================
    public function setStatus(int $p_status): void
    {
        $this->status = $p_status;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    // =========================
    // CONTEUDO
    // =========================
    public function setConteudoId(int $p_conteudo): void
    {
        $this->conteudo_id = $p_conteudo;
    }

    public function getConteudoId(): int
    {
        return $this->conteudo_id;
    }

    // =========================
    // ALTERNATIVAS
    // =========================
    public function setAlternativas(array $p_alternativas): void
    {
        $this->alternativas = $p_alternativas;
    }

    public function getAlternativas(): array
    {
        return $this->alternativas;
    }
}