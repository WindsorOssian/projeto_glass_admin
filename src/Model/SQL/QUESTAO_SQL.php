<?php

namespace Src\Model\SQL;

class QUESTAO_SQL
{
    public static function CADASTRAR_QUESTAO(): string
    {
        return 'INSERT INTO tb_questao 
                (enunciado, nivel, status_questao, conteudo_id)
                VALUES (?,?,?,?)';
    }

    public static function CADASTRAR_ALTERNATIVA(): string
    {
        return 'INSERT INTO tb_alternativa
                (questao_id, texto, correta)
                VALUES (?,?,?)';
    }

    public static function ALTERAR_QUESTAO(): string
    {
        return 'UPDATE tb_questao
                   SET enunciado = ?,
                       nivel = ?,
                       status_questao = ?,
                       conteudo_id = ?
                 WHERE id = ?';
    }

    public static function EXCLUIR_ALTERNATIVAS(): string
    {
        return 'DELETE FROM tb_alternativa WHERE questao_id = ?';
    }

    public static function CONSULTAR_QUESTAO(): string
    {
        return 'SELECT
                    q.id,
                    q.enunciado,
                    q.nivel,
                    q.status_questao,
                    c.titulo AS conteudo,
                    d.nome_disciplina
                FROM tb_questao q
                INNER JOIN tb_conteudo c
                    ON c.id = q.conteudo_id
                INNER JOIN tb_disciplina d
                    ON d.id = c.disciplina_id
            ORDER BY q.id DESC';
    }

    public static function CONSULTAR_QUESTAO_PAGINADO(): string
    {
        return 'SELECT
                    q.id,
                    q.enunciado,
                    q.nivel,
                    q.status_questao,
                    c.titulo AS conteudo,
                    d.nome_disciplina
                FROM tb_questao q
                INNER JOIN tb_conteudo c
                    ON c.id = q.conteudo_id
                INNER JOIN tb_disciplina d
                    ON d.id = c.disciplina_id
            ORDER BY q.id DESC
               LIMIT ? OFFSET ?';
    }

    public static function TOTAL_QUESTOES(): string
    {
        return 'SELECT COUNT(*) total
                  FROM tb_questao';
    }

    public static function DETALHAR_QUESTAO(): string
    {
        return 'SELECT
                q.id,
                q.enunciado,
                q.nivel,
                q.status_questao,
                q.conteudo_id,
                c.disciplina_id
            FROM tb_questao q
            INNER JOIN tb_conteudo c
                ON c.id = q.conteudo_id
           WHERE q.id = ?';
    }

    public static function CONSULTAR_ALTERNATIVAS(): string
    {
        return 'SELECT
                    id,
                    texto,
                    correta
                FROM tb_alternativa
               WHERE questao_id = ?';
    }

    public static function EXCLUIR_QUESTAO(): string
    {
        return 'DELETE FROM tb_questao WHERE id = ?';
    }

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
}
