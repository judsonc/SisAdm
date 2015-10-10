<?php
$active = 'servico';
include '../header.php';

if ((int) Dbcommand::get('del') > 0 && (int) Dbcommand::get('del') <= $company->services->size) {
    $i = Dbcommand::get('del') - 1;
    $company->services->service[$i]->get();
    for ($j = 0; $j < $company->services->service[$i]->album->size; $j++) {
        unlink("../" .$company->services->service[$i]->album->photo[$j]->getDir());  /* Deletando arquivo em "../components/img"  */
    }
    header("Location: index.php?msg=" .$company->services->service[$i]->delete()); // Deletando registro
}
if (@$_POST) {
    header("Location: index.php?msg=" .$company->services->addService($user->getId()));
}

?>
                <!--  Servicos -->
                <div class="span9">
                    <div class="hero-unit">
                        <a href="./"><h1>Servi&ccedil;os</h1></a>
                        <br />
                        <?php include("../components/msg.php"); ?>
                        
                        <form enctype="multipart/form-data" action="index.php" method="post">
                            <fieldset>
                                <div>Nome:
                                    <input type='text'name='name_service' value='' class="form-control" placeholder="Nome" pattern="^[^<>]{0,255}$" required/>
                                </div>
                                <div>Descri&ccedil;&atilde;o:
                                    <textarea name="about_service" class="ckeditor" placeholder="Detalhes" required></textarea>
                                </div>
                                <br/>
                                <div>
                                    <p>Imagem (.png, .jpeg, .jpg):
                                    <input name="photo" id="photo" type="file" required/>                                
                                    </p>
                                    *Tamanho recomendado: 500x500
                                </div>
                                <br />
                                <button type="submit" class="btn btn-primary pull-right" >Salvar</button>                                 
                                <a href='../' class="btn btn-primary pull-right margin">Cancelar</a>
                            </fieldset>
                        </form>
                    </div>
                    <?php include 'table.php'; ?>
                </div>
                <!-- // Fim Quemsomos -->
                                
            <!-- // Fim Conteudo -->
            </div>
        <!-- // Fim Corpo --> 
        </div>

        <!--  Rodape -->
<?php	include ('../footer.php');
