<?php
$active = '';
include '../header.php';
if($_POST){
    header("Location: index.php?msg=".$user->update());
}

?>
                <!-- Perfil -->
                <div class="span9">
                    <div class="hero-unit">
                        <a href="./"><h1>Conta</h1></a>
                        <br/>
                        <?php include("../components/msg.php"); ?>
                        
                        <form action="#" method="post">
                            <fieldset>
                                <div>Nome:
                                    <input type='text' id='name' name='name_user' value='<?php echo $user->name; ?>' class="form-control" placeholder="Nome" pattern="^(([a-zA-Z ]|[çáéíóúãẽĩõũàèìòùâêîôû]){1,60})$" required/>
                                </div>
                                <div>Email:
                                    <input type='email' id='mail_job' name='mail_job_user' value='<?php echo $user->mail_job; ?>' class="form-control" placeholder="Email Profissional" required/>
                                </div>
                                <hr/>
                                <div>*Alterar senha:
                                    <input type='password' id='password1' name='password1_user' class="form-control" placeholder="Nova senha"/>
                                </div>
                                <div>*Confirme sua senha:
                                    <input type='password' id='password2' name='password2_user' class="form-control" placeholder="Confirme nova senha"/>
                                </div>
                                <br><button type="submit" class="btn btn-primary pull-right" >Salvar</button>
                                <a href='../' class="btn btn-primary pull-right margin">Voltar</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- // Fim Perfil -->
            
            <!-- // Fim Conteudo -->
            </div>
        <!-- // Fim Corpo --> 
        </div>

        <!--  Rodape -->
<?php	include '../footer.php';
