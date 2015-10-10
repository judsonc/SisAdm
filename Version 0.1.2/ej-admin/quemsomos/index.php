<?php
$active = 'quemsomos';
include '../header.php';

if (@$_POST) {    
    header("Location: index.php?msg=".$company->setAbout($user->getId()));
}
?>
                <!--  Quemsomos -->
                <div class="span9">
                    <div class="hero-unit">
                        <a href="./"><h1>Quem Somos</h1></a>
                        <br />
                        <?php include("../components/msg.php"); ?>
                        
                        <form action="#" method="post">
                            <fieldset>
                                <div>Sobre a empresa:
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
