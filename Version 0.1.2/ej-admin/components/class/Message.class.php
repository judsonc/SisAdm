<?php

class Message {
    private static $msg = array(
        1 => "Entre com seu usuário e senha.",
        2 => "Login e/ou senha incorretos.",
        3 => "Usuario não ativo",
        4 => "Falha ao acessar o banco de dados",
        5 => "Dados alterados com sucesso",
        6 => "Cadastrado com sucesso",
        7 => "Há campos não preenchidos",
        8 => "Login e/ou email já cadastrados",
        9 => "As senhas inseridas não conferem",
        10 => "Dados apagados com sucesso",
        11 => "Arquivo inválido",
        12 => "Senha incorreta",
        13 => "Nome de arquivo já utilizado, por favor insira outro",
        14 => "Insira seu Email abaixo",
        15 => "Email não cadastrado",
        16 => "Email de recuperação de senha enviado com sucesso",
        17 => "Falha ao enviar email de recuperação, favor tentar novamente",
        18 => "Um dos campos não está no padrão definido!"
    );
    private static $type = array(
        1 => "-info",
        2 => "-danger",
        3 => "-warning",
        4 => "-danger",
        5 => "-success",
        6 => "-success",
        7 => "-danger",
        8 => "-danger",
        9 => "-warning",
        10 => "-success",
        11 => "-danger",
        12 => "-danger",
        13 => "-warning",
        14 => "-info",
        15 => "-danger",
        16 => "-success",
        17 => "-danger",
        18 => "-danger"
    );

    /*
     * Function get()
     *      Seleciona o indice o array, retornando a mensagem
     * param void
     * return object
     */
    public static function get() {
        if (@$_GET["msg"] && $_GET["msg"] != '' && $_GET["msg"] > 0 && $_GET["msg"] <= 18) {
            return '<div class="alert alert' . self::$type[$_GET["msg"]] . '">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        ' . self::$msg[$_GET["msg"]] . '
                        </div>';
        }
    }

}
