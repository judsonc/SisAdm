<?php
$no_need_login = true;
$no_visible_elements = true;
include_once ("header.php");

if (Dbcommand::get("logout") == 1) {
    session_start();
    unset($_SESSION['usuario_logado']);
    session_destroy();
    header("Location: login.php");
}

if (@$_POST) {
    $msg = $user->login();
    if ($msg == 20){ // Logado
        header("Location: ./");
    }else {
        header("Location: login.php?msg=" .$msg);  // Mensagem de Erro
    }
}

?>
    <!-- Login -->
        <div class="container">
            <div class="login row">
                <div class="col-md-4 formulario well">
                    <img src="<?php echo $company->album->photo[0]->url; ?>" alt="<?php echo $company->getName(); ?>" /><br/>
                    <?php echo Message::get(); ?>

                    <form action="login.php" method="post">
                        <fieldset>
                            <div>
                                <input type='text' id='username' name='username_user' value='' class="form-control" placeholder="Login" required/>
                            </div>
                            <div>
                                <input type='password' id='password' name='password_user' value='' class="form-control" placeholder="Senha" required/>
                            </div>
                            <br>
                            <button type="submit" class="btn-login" >Login</button>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-4 formulario">
                    <a href="<?php echo $server; ?>/recuperar">Esqueci minha senha</a><br/>
                    <a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>" title="Você está perdido?">&larr; Voltar para <?php echo $company->getName(); ?></a> <!-- &ecirc; seta pra esquerda -->
                </div>
            </div>
        </div>
    </body>
</html>
