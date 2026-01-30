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

    public static function CONSULTAR_DISCIPLINA(): string
    {

        $sql = 'SELECT id, nome_disciplina, status_disciplina
                  FROM tb_disciplina
              ORDER BY nome_disciplina';
        return $sql;
    }

    // Para fazer paginação
    public static function CONSULTAR_DISCIPLINA_PAGINADO(): string
    {
        return 'SELECT id, nome_disciplina, status_disciplina
                  FROM tb_disciplina
              ORDER BY nome_disciplina
                 LIMIT ? OFFSET ?';
    }

    public static function TOTAL_DISCIPLINAS(): string
    {
        return 'SELECT COUNT(*) total 
                FROM tb_disciplina';
    }











}
