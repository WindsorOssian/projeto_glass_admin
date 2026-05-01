<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\Model\SQL\CONTEUDO_SQL;
use Src\VO\ConteudoVO;

class ConteudoMODEL extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }

    public function CadastrarConteudoMODEL(ConteudoVO $vo)
    {
        try {
            $sql = CONTEUDO_SQL::CADASTRAR_CONTEUDO();
            $stmt = $this->conexao->prepare($sql);

            $stmt->execute([
                $vo->getTitulo(),
                $vo->getDescricao(),
                $vo->getStatus(),
                $vo->getDisciplinaId()
            ]);

            return 1;
        } catch (\Exception $e) {
            return -1;
        }
    }

    public function ConsultarConteudoMODEL()
    {
        $sql = CONTEUDO_SQL::CONSULTAR_CONTEUDO();
        return $this->conexao->query($sql)->fetchAll();
    }

    public function ConsultarPorDisciplinaMODEL($id)
    {
        $stmt = $this->conexao->prepare(
            CONTEUDO_SQL::CONSULTAR_CONTEUDO_POR_DISCIPLINA()
        );

        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function AlterarConteudoMODEL(ConteudoVO $vo)
    {
        try {
            $stmt = $this->conexao->prepare(
                CONTEUDO_SQL::ALTERAR_CONTEUDO()
            );

            $stmt->execute([
                $vo->getTitulo(),
                $vo->getDescricao(),
                $vo->getStatus(),
                $vo->getDisciplinaId(),
                $vo->getId()
            ]);

            return 1;
        } catch (\Exception $e) {
            return -1;
        }
    }

    public function ExcluirConteudoMODEL($id)
    {
        try {

            $stmt = $this->conexao->prepare(CONTEUDO_SQL::EXCLUIR_CONTEUDO());
            $stmt->execute([$id]);

            return 1;
        } catch (\Exception $e) {
            return -1;
        }
    }

    public function DetalharConteudoMODEL($id)
    {
        $stmt = $this->conexao->prepare(
            CONTEUDO_SQL::DETALHAR_CONTEUDO()
        );

        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Para paginação
    public function ConsultarConteudoPaginadoMODEL(int $limit, int $offset): array
    {
        $sql = $this->conexao->prepare(CONTEUDO_SQL::CONSULTAR_CONTEUDO_PAGINADO());

        $sql->bindValue(1, $limit, \PDO::PARAM_INT);
        $sql->bindValue(2, $offset, \PDO::PARAM_INT);

        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function TotalConteudoMODEL(): int
    {
        $sql = $this->conexao->prepare(CONTEUDO_SQL::TOTAL_CONTEUDO());
        $sql->execute();

        return (int) $sql->fetch()['total'];
    }

    public function ConsultarConteudoPorDisciplinaMODEL(
        int $idDisciplina
    ): array {

        $sql = $this->conexao->prepare(
            CONTEUDO_SQL::CONSULTAR_CONTEUDO_POR_DISCIPLINA()
        );

        $sql->bindValue(
            1,
            $idDisciplina,
            \PDO::PARAM_INT
        );

        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
