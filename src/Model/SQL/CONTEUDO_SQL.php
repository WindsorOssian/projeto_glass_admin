<?php

namespace Src\Model\SQL;

class CONTEUDO_SQL
{
    public static function CADASTRAR_CONTEUDO(): string
    {
        return 'INSERT INTO tb_conteudo
                (titulo, descricao, status, disciplina_id)
                VALUES (?,?,?,?)';
    }

    public static function ALTERAR_CONTEUDO(): string
    {
        return 'UPDATE tb_conteudo
                   SET titulo = ?,
                       descricao = ?,
                       status = ?,
                       disciplina_id = ?
                 WHERE id = ?';
    }

    public static function CONSULTAR_CONTEUDO(): string
    {
        return 'SELECT c.id,
                   c.titulo,
                   c.status,
                   d.nome_disciplina
              FROM tb_conteudo c
        INNER JOIN tb_disciplina d ON d.id = c.disciplina_id
          ORDER BY c.titulo';
    }

    public static function DETALHAR_CONTEUDO(): string
    {
        return 'SELECT *
                  FROM tb_conteudo
                 WHERE id = ?';
    }

    public static function EXCLUIR_CONTEUDO(): string
    {
        return 'DELETE FROM tb_conteudo
                      WHERE id = ?';
    }

    // 🔥 ESSA É IMPORTANTE (pra usar depois no select dependente)
    public static function CONSULTAR_CONTEUDO_POR_DISCIPLINA(): string
    {
        return 'SELECT
                id,
                titulo
            FROM tb_conteudo
           WHERE disciplina_id = ?
             AND status = 1
        ORDER BY titulo';
    }

    // Para paginação, tem que usar o LIMIT e OFFSET, e tem que passar os parâmetros de limite e offset
    public static function CONSULTAR_CONTEUDO_PAGINADO(): string
    {
        return 'SELECT c.id,
                   c.titulo,
                   c.status,
                   d.nome_disciplina
              FROM tb_conteudo c
        INNER JOIN tb_disciplina d ON d.id = c.disciplina_id
          ORDER BY c.titulo
             LIMIT ? OFFSET ?';
    }

    public static function TOTAL_CONTEUDO(): string
    {
        return 'SELECT COUNT(*) total FROM tb_conteudo';
    }
}
