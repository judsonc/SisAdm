<?php
require_once ('ValidationData.class.php');

/**
 * @brief Classe Message
 *      é responsável por mostrar as notificações que são solicitadas no decorrer do código.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class Message {
    private static $msg = array(
        "entrada_usuario" => "Entre com seu usuário e senha.", //1
        "erro_entrada_usuario" => "Login e/ou senha incorretos.", //2
        "usuario_inativo" => "Usuario não ativo", //3
        "erro_acesso" => "Falha ao acessar o banco de dados", //4
        "sucesso_alterar_dados" => "Dados alterados com sucesso", //5
        "sucesso_cadastro" => "Cadastrado com sucesso", //6
        "erro_campos" => "Há campos não preenchidos", //7
        "campos_cadastrados" => "Login e/ou email já cadastrados", //8
        "erro_senhas" => "As senhas inseridas não conferem", //9
        "sucesso_deletar" => "Dados apagados com sucesso", //10
        "arquivo_invalido" => "Arquivo inválido", //11
        "erro_senha" => "Senha incorreta", //12
        "nome_repetido" => "Nome de arquivo já utilizado, por favor insira outro", //13
        "inserir_email" => "Insira seu Email abaixo", //14
        "erro_email" => "Email não cadastrado", //15
        "sucesso_recuperacao" => "Email de recuperação de senha enviado com sucesso", //16
        "erro_recuperacao" => "Falha ao enviar email de recuperação, favor tentar novamente", //17
        "erro_campo" => "Um dos campos não está no padrão definido!", //18
        "usuario_logado" => "Redirecionar para index"
    ); /**< Conteúdo da notificação */
    private static $type = array(
        "entrada_usuario" => "-info",
        "erro_entrada_usuario" => "-danger",
        "usuario_inativo" => "-warning",
        "erro_acesso" => "-danger",
        "sucesso_alterar_dados" => "-success",
        "sucesso_cadastro" => "-success",
        "erro_campos" => "-danger",
        "campos_cadastrados" => "-danger",
        "erro_senhas" => "-warning",
        "sucesso_deletar" => "-success",
        "arquivo_invalido" => "-danger",
        "erro_senha" => "-danger",
        "nome_repetido" => "-warning",
        "inserir_email" => "-info",
        "erro_email" => "-danger",
        "sucesso_recuperacao" => "-success",
        "erro_recuperacao" => "-danger",
        "erro_campo" => "-danger"
    );  /**< Classe do Bootstrap de acordo com o nivel da notificação */

    /**
     * @brief Function get
     *      retorna a string de mensagem de aviso de acordo com o indice que foi passado por GET ou, no caso especifico de usuario logado, redireciona para a index do site.
     * @param void
     * @return o html (tag 'div') com a mensagem de notificacao
     */
    public static function get() {
        if (isset($_GET["msg"]) && array_key_exists($_GET["msg"], self::$msg)) {
            if ($_GET["msg"] === "usuario_logado") {
                header("Location: ./");
            } else {
                return '<div class="alert alert' . self::$type[$_GET["msg"]] . '">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        ' . self::$msg[$_GET["msg"]] . '
                        </div>';
            }
        }
    }
}