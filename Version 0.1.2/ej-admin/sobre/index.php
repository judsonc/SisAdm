<?php
include '../header.php';

if (@$_POST) {
    header("Location: index.php?msg=".$company->setAbout($user->getId()));
}
?>
                <!--  Quemsomos -->
                <div class="col-xs-12 col-sm-10">
                    <div class="jumbotron">
                        <a href="./"><h1>Sobre</h1></a>
                        <br />
                        <?php echo Message::get(); ?>

                        <form action="#" method="post">
                            <fieldset>
                                <div>
                                    <h4>Sobre a empresa:</h4>
                                    <textarea name="about_corporation" class="ckeditor" placeholder="Fale sobre a empresa" required><?php echo $company->about; ?></textarea>
                                </div>
                                <br />
                                <button type="submit" class="btn btn-primary pull-right" >Salvar</button>
                                <a href='../' class="btn btn-primary pull-right margin">Cancelar</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- // Fim Quemsomos -->

            <!-- // Fim Conteudo -->
            </div>
        <!-- // Fim Corpo -->
        </div>

        <!--  Rodape -->
<?php	include ('../footer.php');
