<?php

namespace Src\Model\SQL;

class DISCIPLINA_SQL
{

    public static function CADASTRAR_DISCIPLINA(): string
    {

        $sql = 'INSERT INTO tb_disciplina
                            (nome_disciplina, descricao, status_disciplina)
                     VALUES (?,?,?)';
        return $sql;

    }

    public static function ALTERAR_DISCIPLINA(): string
    {

        $sql = 'UPDATE tb_disciplina
                   SET nome_disciplina = ?,
                       descricao = ?,
                       status_disciplina = ?
                 WHERE id = ?';
        return $sql;

    }



























}


















