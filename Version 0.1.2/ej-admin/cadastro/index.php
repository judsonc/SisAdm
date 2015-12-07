<?php
$no_need_login = true;
$no_visible_elements = true;
include "../header.php";

// Inserindo Usuário no Banco
if (@$_POST) {
    header("Location: index.php?msg=".$user->set());
}

?>

        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-sm-10">
                    <div class="jumbotron">
                        <a href="../"><h1>Cadastro de Usuários</h1></a>
                        <br/>
                        <?php echo Message::get(); ?>

                        <form action="#" method="post">
                            <fieldset>
                                <div>
                                    <input type='text' id='name' name='name_user' class="form-control" placeholder="Nome" pattern="^(([a-zA-Z ]|[çáéíóúãẽĩõũàèìòùâêîôû]){1,60})$" required/>
                                </div>
                                <div>
                                    <input type='email' id='mail_job' name='mail_job_user' class="form-control" placeholder="Email Profissional" required/>
                                </div>
                                <div>
                                    <input type='text' id='username' name='username_user' class="form-control" placeholder="Usuário" pattern="^[a-zA-Z0-9_.-]{3,16}$" required/>
                                </div>
                                <div>
                                    <input type='password' id='password1' name='password1_user' class="form-control" placeholder="Senha" required/>
                                </div>
                                <div>
                                    <input type='password' id='password2' name='password2_user' class="form-control" placeholder="Confirme a senha" required/>
                                </div>
                                <a href="../" class="btn btn-primary pull-left">Voltar</a>
                                <button type="submit" class="btn btn-primary pull-right" >Cadastrar</button>
                                <button type="reset" class="btn btn-primary pull-right" >Cancelar</button>
                                <br />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
// Se cadastrado com sucesso, pergunta se pode redirecionar pro Login
if (Dbcommand::get("msg") == 6) {  ?>
    <script>
        var goLogin = confirm("Cadastrado com Sucesso! \nDeseja Logar-se?");
        if (goLogin){
            location.href="../";
        }
    </script>
    </body>
</html>
<?php
}
