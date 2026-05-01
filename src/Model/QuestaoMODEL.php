<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\Model\SQL\QUESTAO_SQL;
use Src\Model\SQL\CONTEUDO_SQL;
use Src\VO\QuestaoVO;

class QuestaoMODEL extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }

    /*
    |--------------------------------------------------------------------------
    | CADASTRAR QUESTÃO
    |--------------------------------------------------------------------------
    */

    public function CadastrarQuestaoMODEL(QuestaoVO $vo)
    {
        try {

            $this->conexao->beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | QUESTÃO
            |--------------------------------------------------------------------------
            */

            $sql = QUESTAO_SQL::CADASTRAR_QUESTAO();

            $stmt = $this->conexao->prepare($sql);

            $stmt->execute([
                $vo->getEnunciado(),
                $vo->getNivel(),
                $vo->getStatus(),
                $vo->getConteudoId()
            ]);

            /*
            |--------------------------------------------------------------------------
            | ID DA QUESTÃO
            |--------------------------------------------------------------------------
            */

            $idQuestao = $this->conexao->lastInsertId();

            /*
            |--------------------------------------------------------------------------
            | ALTERNATIVAS
            |--------------------------------------------------------------------------
            */

            foreach ($vo->getAlternativas() as $alt) {

                $sqlAlt = QUESTAO_SQL::CADASTRAR_ALTERNATIVA();

                $stmtAlt = $this->conexao->prepare($sqlAlt);

                $stmtAlt->execute([
                    $idQuestao,
                    $alt['texto'],
                    $alt['correta']
                ]);
            }

            $this->conexao->commit();

            return 1;
        } catch (\Exception $e) {

            $this->conexao->rollBack();

            echo 'ERRO SQL: ' . $e->getMessage();

            exit;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | CONSULTAR QUESTÕES
    |--------------------------------------------------------------------------
    */

    public function ConsultarQuestaoMODEL()
    {
        $sql = QUESTAO_SQL::CONSULTAR_QUESTAO();

        return $this->conexao
            ->query($sql)
            ->fetchAll();
    }

    /*
    |--------------------------------------------------------------------------
    | CONSULTAR QUESTÕES PAGINADO
    |--------------------------------------------------------------------------
    */

    public function ConsultarQuestaoPaginadoMODEL(
        int $limit,
        int $offset
    ): array {

        $sql = $this->conexao->prepare(
            QUESTAO_SQL::CONSULTAR_QUESTAO_PAGINADO()
        );

        $sql->bindValue(1, $limit, \PDO::PARAM_INT);
        $sql->bindValue(2, $offset, \PDO::PARAM_INT);

        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    /*
    |--------------------------------------------------------------------------
    | TOTAL QUESTÕES
    |--------------------------------------------------------------------------
    */

    public function TotalQuestaoMODEL(): int
    {
        $sql = $this->conexao->prepare(
            QUESTAO_SQL::TOTAL_QUESTOES()
        );

        $sql->execute();

        return (int) $sql->fetch()['total'];
    }

    /*
    |--------------------------------------------------------------------------
    | ALTERAR QUESTÃO
    |--------------------------------------------------------------------------
    */

    public function AlterarQuestaoMODEL(QuestaoVO $vo)
    {
        try {

            $this->conexao->beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | ALTERA QUESTÃO
            |--------------------------------------------------------------------------
            */

            $sql = QUESTAO_SQL::ALTERAR_QUESTAO();

            $stmt = $this->conexao->prepare($sql);

            $stmt->execute([
                $vo->getEnunciado(),
                $vo->getNivel(),
                $vo->getStatus(),
                $vo->getConteudoId(),
                $vo->getId()
            ]);

            /*
            |--------------------------------------------------------------------------
            | REMOVE ALTERNATIVAS ANTIGAS
            |--------------------------------------------------------------------------
            */

            $sqlDel = QUESTAO_SQL::EXCLUIR_ALTERNATIVAS();

            $stmtDel = $this->conexao->prepare($sqlDel);

            $stmtDel->execute([
                $vo->getId()
            ]);

            /*
            |--------------------------------------------------------------------------
            | INSERE NOVAMENTE
            |--------------------------------------------------------------------------
            */

            foreach ($vo->getAlternativas() as $alt) {

                $sqlAlt = QUESTAO_SQL::CADASTRAR_ALTERNATIVA();

                $stmtAlt = $this->conexao->prepare($sqlAlt);

                $stmtAlt->execute([
                    $vo->getId(),
                    $alt['texto'],
                    $alt['correta']
                ]);
            }

            $this->conexao->commit();

            return 1;
        } catch (\Exception $e) {

            $this->conexao->rollBack();

            echo 'ERRO SQL: ' . $e->getMessage();

            exit;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | EXCLUIR QUESTÃO
    |--------------------------------------------------------------------------
    */

    public function ExcluirQuestaoMODEL(int $id)
    {
        try {

            $stmt = $this->conexao->prepare(
                QUESTAO_SQL::EXCLUIR_QUESTAO()
            );

            $stmt->execute([$id]);

            return 1;
        } catch (\Exception $e) {

            echo 'ERRO SQL: ' . $e->getMessage();

            return -1;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | DETALHAR QUESTÃO COMPLETA
    |--------------------------------------------------------------------------
    */

    public function DetalharQuestaoCompletaMODEL($id)
    {
        /*
        |--------------------------------------------------------------------------
        | QUESTÃO
        |--------------------------------------------------------------------------
        */

        $stmt = $this->conexao->prepare(
            QUESTAO_SQL::DETALHAR_QUESTAO()
        );

        $stmt->execute([$id]);

        $questao = $stmt->fetch();

        if (!$questao) {
            return [];
        }

        /*
        |--------------------------------------------------------------------------
        | ALTERNATIVAS
        |--------------------------------------------------------------------------
        */

        $stmtAlt = $this->conexao->prepare(
            QUESTAO_SQL::CONSULTAR_ALTERNATIVAS()
        );

        $stmtAlt->execute([$id]);

        $questao['alternativas'] = $stmtAlt->fetchAll();

        return $questao;
    }

    public function ConsultarConteudoPorDisciplinaMODEL(int $idDisciplina): array
    {
        $sql = $this->conexao->prepare(
            CONTEUDO_SQL::CONSULTAR_CONTEUDO_POR_DISCIPLINA()
        );

        $sql->bindValue(1, $idDisciplina, \PDO::PARAM_INT);

        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
