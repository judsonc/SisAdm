<?php
date_default_timezone_set('America/Sao_Paulo');

// ------  Incluindo as Classes  ------
include_once ("class/User.class.php");
include_once ("class/Corporation.class.php");
include_once ("class/Message.class.php");

// ------  Instanciando as Classes  ------
$user    = new User();
$company = new Corporation();

// -----  Validacao de Sessao do Usuario  -------
if (!isset($no_need_login) || !$no_need_login) {
    $user->verifyAccess();
}
