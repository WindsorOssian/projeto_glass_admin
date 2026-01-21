<?php

namespace Src\Model; // A pasta model serve para trabalhar com banco de dados

// Configurações do site
define('HOST', 'localhost'); //IP
define('USER', 'root'); //usuario
define('PASS', null); //Senha
define('DB', 'db_projetoid'); //Banco
/**
 * Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) year, WMBarros
 */

class Conexao {

    /** @var PDO */
    private static $Connect;

    private static function Conectar() {
        try {

            //Verifica se a conexão não existe
            if (self::$Connect == null):

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
                self::$Connect = new \PDO($dsn, USER, PASS, null);
            endif;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
       
        //Seta os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
       
        return  self::$Connect;
    }

    public static function GravarErroLog($vo)
    {
        // Cria a variavel que guardará o nome do arquivo e seu caminho
        $arquivo = PATH . 'Model/logs/log_erro.txt';

        // Verifica se não existe o arquivo
        if(!file_exists($arquivo)){
            // Cria o arquivo
            $arquivo = fopen($arquivo, 'w'); // Cria e escreve nele
        } else {
            // Tenho que abri-lo e manter o cursor no final da escrita
            $arquivo = fopen($arquivo, 'a+');
        }

        // Cria uma variável para poder escrever no arquivo
        $msg = '------------------------------------------' . PHP_EOL; // Constante do PHP a \n, ela joga para linha de baixo
        $msg .= 'Data do erro: ' . $vo->getDataErro() . PHP_EOL;  // A variavel recebe ele mesmo mais o conteúdo da vez  ($msg = $msg . 'sauhsuahsahus')
        $msg .= 'Hora do erro: ' . $vo->getHoraErro() . PHP_EOL;
        // $msg .= 'Código do logado: ' . $vo->getCodLogado() . PHP_EOL;
        $msg .= 'Função do erro: ' . $vo->getFuncaoErro() . PHP_EOL;
        $msg .= 'Erro técnico: ' . $vo->getErroTecnico() . PHP_EOL;
        

        // Escreve o erro no arquivo aberto
        fwrite($arquivo, $msg);
        // Fecha o arquivo
        fclose($arquivo);

        // PHP MAIL
    }

    public static function retornarConexao() {
        return  self::Conectar();
    }
    
    // PDO e PDOException são nativas do php, para solicitar eles nessa caso com namespace, adicionamos \  (Se chama Contra Barra)
    // Quando coloca \ antes, significa que irá acessar a raiz da linguagem
    // ou pode utilizar: use PDO; e use PDOException;
    
}