<?php
$no_need_login = true;
$no_visible_elements = true;
include("../header.php");
@session_destroy();

if (@$_POST) {
    if (Dbcommand::post("password1_rec") && Dbcommand::post("password2_rec")) {
        if (Dbcommand::post("password1_rec") == Dbcommand::post("password2_rec")) {
            $pass  = Criptografia::Bcrypt(Dbcommand::post("password1_rec"));
            $email = Dbcommand::post("email");
            Dbcommand::update('tb_administradores', array('ADM_SENHA' => $pass), array('ADM_EMAIL' => $email));
            header("Location: ../login.php?msg=5");
        } else {
        	/*
            $chave = $_GET['confirmacao'];
            $email = $_GET['utilizador'];
            header("Location: recuperar.php?utilizador=$email&confirmacao=$chave&msg=9");
            */
        	die('<a href="./" class="btn btn-primary">Voltar</a>
	        	<p>Senhas diferem uma da outra. Volte e digite seu email novamente para reiniciar a recuperação de senha.</p>');
        }
    }
}

if (empty($_GET['utilizador']) || empty($_GET['confirmacao'])) {
	echo
    die('<a href="./" class="btn btn-primary">Voltar</a>
		<p>Não é possível alterar a password: dados em falta</p>');
    //header("Location: ./");
}

@$user = $_GET['utilizador'];
@$hash = $_GET['confirmacao'];

$results = Dbcommand::select("tb_recuperacao", array("REC_ADM" => $user, 'REC_CONFIRMACAO' => $hash));

if (Dbcommand::count_rows($results) > 0) {
    //os dados estão corretos: eliminar o pedido e permitir alterar a password
    Dbcommand::delete("tb_recuperacao", array('REC_ADM' => $user, 'REC_CONFIRMACAO' => $hash));

?>
		<div class="container">
		    <div class="row">
		        <div class="col-xs-12 col-sm-10">
                                     <div class="jumbotron">
		                <a href="./"><h1>Recuperar de Senha</h1></a>
		                <br/>
		                <?php echo Message::get(); ?>

                                        <form action="recuperar.php" method="post">
		                    <fieldset>
		                        <div>Nova Senha
		                            <input type="password" name="password1_rec" class="form-control" required>
		                            Confirmar Nova Senha
		                            <input type="password" name="password2_rec" class="form-control" required>
		                            <input type="hidden" name="email" value="<?php echo $_GET['utilizador']; ?>" >
		                        </div>
		                        <br/>
		                        <button type="submit" class="btn btn-primary pull-right" >Recuperar Senha</button>
		                        <a href="../" class="btn btn-primary">Voltar</a>
		                        <br/>
		                    </fieldset>
		                </form>
		            </div>
		        </div>
		    </div>
	    </div>
<?php
	include '../footer.php';
} else {
	/*die('<a href="./" class="btn btn-primary">Voltar</a>
		<p>Página indisponível!</p>');*/
	header("Location: ./");
}



