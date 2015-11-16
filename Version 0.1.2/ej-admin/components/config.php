<?php
date_default_timezone_set('America/Sao_Paulo'); 

// ------  Incluindo as Classes  ------
include_once ("class/User.class.php");
include_once ("class/Corporation.class.php");
include_once ("class/Message.class.php");

// ------  Instanciando as Classes  ------
$user    = new User();
$company = new Corporation();

// -----  Validacao de Login em Todas as Paginas  -------
if (!isset($no_need_login) || !$no_need_login) {
    session_start();
    if (!isset($_SESSION['usuario_logado'])) {
        header("location: ".$server."/login.php?msg=1");
    }else{
        $user->setId($_SESSION['usuario_logado']);
        $registro = $_SESSION['registro'];
        $limite = $_SESSION['limite'];
        if($registro) {// verifica se a session  registro esta ativa
         $segundos = time() - $registro;
        } // fim da verificacao da session registro

        /* verifica o tempo de inatividade 
        se ele tiver ficado mais do tempo limite sem atividade ele destroi a session
        se nao ele renova o tempo e ai eh contado mais o tempo limite */
        if($segundos > $limite){
            session_destroy();
            echo "<script>alert('Sua sessão expirou, favor logar novamente!')</script>";    //popup de aviso
            echo "<script>location.reload()</script>";  // atualiza para que seja redirecionado para a pagina de login
            die();  //destroi pagina para que nao carregue
        }else{
          $_SESSION['registro'] = time();
        }   // fim da verificacao de inatividade
    }
}
