<?php
include '../header.php';

if(@$_POST){
    header("Location: index.php?msg=".$user->update());
}

?>
                <!-- Conta -->
                <div class="col-xs-12 col-sm-10">
                    <div class="jumbotron">
                        <a href="./"><h1>Conta</h1></a>
                        <br/>
                        <?php echo Message::get(); ?>

                        <form action="#" method="post">
                            <fieldset>
                                <div>
                                    <h4>Nome:</h4>
                                    <input type='text' id='name' name='name_user' value='<?php echo $user->name; ?>' class="form-control" placeholder="Nome" pattern="^(([a-zA-Z ]|[çáéíóúãẽĩõũàèìòùâêîôû]){1,60})$" required/>
                                </div>
                                <div>
                                    <h4>Email:</h4>
                                    <input type='email' id='mail_job' name='mail_job_user' value='<?php echo $user->mail_job; ?>' class="form-control" placeholder="Email Profissional" required/>
                                </div>
                                <hr/>
                                <div>
                                    <h4>*Alterar senha:</h4>
                                    <input type='password' id='password1' name='password1_user' class="form-control" placeholder="Nova senha"/>
                                </div>
                                <div>
                                    <h4>*Confirme sua senha:</h4>
                                    <input type='password' id='password2' name='password2_user' class="form-control" placeholder="Confirme nova senha"/>
                                </div>
                                <br><button type="submit" class="btn btn-primary pull-right" >Salvar</button>
                                <a href='../' class="btn btn-primary pull-right margin">Voltar</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- // Fim Conta -->

            <!-- // Fim Conteudo -->
            </div>
        <!-- // Fim Corpo -->
        </div>

        <!--  Rodape -->
<?php	include '../footer.php';
