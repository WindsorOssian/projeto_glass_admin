<?php

namespace Src\Public;

// use FontLib\Table\Type\head;

class Util
{

    // public static function IniciarSessao(): void
    // {
    //     if (!isset($_SESSION))
    //         session_start();
    // }

    // public static function CriarSessao(int $id, string $nome): void
    // {
    //     self::IniciarSessao();
    //     $_SESSION['cod'] = $id;
    //     $_SESSION['nome'] = $nome;
    // }

    // public static function Deslogar()
    // {
    //     self::IniciarSessao(); // Vai acessar o servidor e depois limpa o que está iniciado
    //     unset($_SESSION['cod']);
    //     unset($_SESSION['nome']);
    //     self::ChamarPagina('http://localhost/ControleOs/src/View/acesso/login');
    // }

    // public static function VerificarLogado()
    // {
    //     self::IniciarSessao();
    //     if (!isset($_SESSION['cod']) || empty($_SESSION['cod']))
    //         self::ChamarPagina('http://localhost/ControleOs/src/View/acesso/login');
    // }

    // public static function CodigoLogado(): int
    // {
    //     self::IniciarSessao();
    //     return $_SESSION['cod'];
    // } // No caso sem login return 1; Foi colocado para testar o erro, ele simuta um código logado

    // public static function NomeLogado(): string
    // {
    //     self::IniciarSessao();
    //     return $_SESSION['nome'];
    // }

    // public static function MostrarDadosArray($arr)
    // { // Vai exibir os conteúdos do array de forma formatada
    //     echo '<prev>';
    //     print_r($arr);
    //     echo '</pre>';
    //     exit;
    // }


    private static function SetarFusoHorario()
    {
        date_default_timezone_set('America/Sao_Paulo'); // Para setar o fuso horario, existe no manual do php todos os horarios do mundo
    }

    public static function DataAtual()
    {
        self::SetarFusoHorario();
        return date('Y-m-d'); // date('d/m/Y'); Para formatar em data Brasileira

    }

    public static function DataAtualBr()
    {
        self::SetarFusoHorario();
        return date('d/m/Y');
    }

    public static function HoraAtual()
    {
        self::SetarFusoHorario();
        return date('H:i');
    }

    public static function DataHoraAtual()
    {
        self::SetarFusoHorario();
        return date('Y-m-d H:i');  // 'Y-m-d H:i:s' Para adicionar segundos
    }

    public static function TirarCaracteresEspeciais($palavra) // Para usar nos campos de máscaras: cpf, telefone, etc
    {
        $especiais = array(".", ",", ";", "!", "@", "#", "%", "¨", "*", "(", ")", "+", "-", "=", "§", "$", "|", "\\", ":", "/", "<", ">", "?", "{", "}", "[", "]", "&", "'", '"', "´", "`", "?", "“", "”", '$', "'", "'", '  ');
        $palavra = str_replace($especiais, "", trim($palavra));
        return $palavra;
    }

    public static function RemoverTags($palavra) // Para email
    {
        $palavra = strip_tags($palavra);
        return $palavra;
    }

    public static function TratarDadosGeral($palavra)
    {

        $especiais = array(".", ",", ";", "!", "@", "#", "%", "¨", "*", "(", ")", "+", "-", "=", "§", "$", "|", "\\", ":", "/", "<", ">", "?", "{", "}", "[", "]", "&", "'", '"', "´", "`", "?", "“", "”", '$', "'", "'", '  ');
        
        // $especiais = array(
        //     "`", "~", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", 
        //     "=", "+", "[", "]", "{", "}", "\\", "|", ";", ":", "'", "\"", "‘", "’", 
        //     "“", "”", "<", ">", ",", ".", "?", "/", "€", "£", "¥", "¢", "§", "©", 
        //     "®", "™", "¶", "°", "±", "÷", "×", "µ", "¿", "¡", "¬"
        // );  // Esse parece mais completo 

        $palavra = strip_tags($palavra);
        $palavra = str_replace($especiais, "", trim($palavra));
        return $palavra;
    }

    // public static function MostrarSituacao(int $sit): string
    // {
    //     $situacao = '';

    //     switch ($sit) {
    //         case SITUACAO_ATIVO:
    //             $situacao = '<strong style="color: #008000;">ATIVO</strong>';
    //             break;

    //         case SITUACAO_INATIVO:
    //             $situacao = '<strong style="color: #FF0000;">INATIVO</strong>';
    //             break;

    //         case SITUACAO_ATIVO_E_ALOCADO:
    //             $situacao = '<strong style="color: #dbd307ff;">ATIVO/ALOCADO</strong>';
    //             break;
                
    //         case SITUACAO_INATIVAVEL:
    //             $situacao = '<strong style="color: #2da8ec;">INATIVÁVEL</strong>';
    //             break;
    //     }

    //     return $situacao;
    // }

    // Para mostrar o que o usuario é invés dos números logicos tipo 1,2,3
    // public static function MostrarTipoUsuario(int $tipo): string
    // { // Inicia o $nome_tipo = ''; como string
    //     $nome_tipo = '';

    //     switch ($tipo) {
    //         case USUARIO_ADM:
    //             $nome_tipo = "ADMINISTRADOR";
    //             break;

    //         case USUARIO_FUNCIONARIO:
    //             $nome_tipo = "FUNCIONÁRIO";
    //             break;

    //         case USUARIO_TECNICO:
    //             $nome_tipo = "TÉCNICO";
    //             break;
    //     }

    //     return $nome_tipo;
    // }

    // public static function ChamarPagina($pag)
    // {
    //     header("location: $pag.php");
    //     exit;
    // }


    // public static function CriptografarSenhar($senha): string
    // {
    //     return password_hash($senha, PASSWORD_DEFAULT);
    // }

    // public static function VerificarSenha($senha_digitada, $senha_hash): bool
    // {
    //     return password_verify($senha_digitada, $senha_hash);
    // }

    // Parte do JWT
    // O usuario vai validar se o dados do email e senha existem, se existir cria o claims(os dados usuario, as informações que eu quero armazenar e transmitir)
    // public static function CreateTokenAuthentication(array $dados_user) // Então mandamos um array com os dados do usuario
    // {
    //     // HEADER
    //     $header = [
    //         'typ' => 'JWT',
    //         'alg' => 'HS256'
    //     ];

    //     // PAYLOAD
    //     $payload = $dados_user;

    //     // Transformo eles em JSON com json_encode para um string
    //     $header = json_encode($header);
    //     $payload = json_encode($payload);

    //     // Atualizo eles para base64_encode codificando
    //     $header = base64_encode($header);
    //     $payload = base64_encode($payload);

    //     // Assinatura
    //     $sign = hash_hmac(
    //         "sha256",
    //         $header . '.' . $payload,
    //         SECRET,
    //         true
    //     );

    //     // Resultado
    //     $sign = base64_encode($sign);
    //     $token = $header . '.' . $payload . '.' . $sign;
    //     return $token;
    // }

    // Parte do JWT para autenticar o acesso
    // public static function AuthenticationTokenAccess()
    // {
    //     //Recupera todo o cabeçalho da requisição
    //     $http_header = apache_request_headers();
    //     //Se n for nulo
    //     if (
    //         $http_header['Authorization'] != null &&
    //         str_contains($http_header['Authorization'], '.')
    //         // str_contains só funciona na versão 8 do php, ela checa se naquele conteúdo tem um ponto
    //     ) :
    //         //quebra o bearer(autenticação de token)
    //         $bearer = explode(' ', $http_header['Authorization']); // Ele quebra o espaço no conteudo Authorization
    //         $token = explode('.', $bearer[1]); // Quebra em partes o token em Header, Payload e Signature
    //         //Quebrando os valores e jogango em seus significados
    //         $header = $token[0];
    //         $payload = $token[1];
    //         $sign = $token[2];
    //         //Faz a criptografia novamente para ver se bate com a chave
    //         $valid = hash_hmac(
    //             'sha256',
    //             $header . '.' . $payload,
    //             SECRET,
    //             true
    //         );
    //         $valid = base64_encode($valid);
    //         if ($valid === $sign)
    //             return true;
    //         else
    //             return false;
    //     endif;
    //     return false;
    // }
}
