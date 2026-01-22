<?php 

namespace Src\Model;

use Exception;
// use Src\Controller\DisciplinaCTRL;
use Src\Model\Conexao;
use Src\Model\SQL\DISCIPLINA_SQL;
use Src\VO\DisciplinaVO;

class DisciplinaMODEL extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }

    public function CadastrarDisciplinaMODEL(DisciplinaVO $vo)
    {

        $sql = $this->conexao->prepare(DISCIPLINA_SQL::CADASTRAR_DISCIPLINA());
        $sql->bindValue(1, $vo->getNomeDisciplina());
        $sql->bindValue(2, $vo->getDescricao());
        $sql->bindValue(3, $vo->getStatus());

        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex){
            $vo->setErroTecnico($ex->getMessage());
            parent::GravarErroLog($vo);
            return -1;
        }

    }

    public function AlterarDisciplinaMODEL(DisciplinaVO $vo)
    {

        $sql = $this->conexao->prepare(DISCIPLINA_SQL::ALTERAR_DISCIPLINA());
        $i = 1;
        $sql->bindValue($i++, $vo->getNomeDisciplina());
        $sql->bindValue($i++, $vo->getDescricao());
        $sql->bindValue($i++, $vo->getStatus());
        $sql->bindValue($i++, $vo->getId());
        
        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex){
            $vo->setErroTecnico($ex->getMessage());
            parent::GravarErroLog($vo);
            return -1;
        }

    }













}
