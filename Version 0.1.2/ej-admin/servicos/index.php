<?php
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
                <div class="col-xs-12 col-sm-10">
                    <div class="jumbotron">
                        <a href="./"><h1>Serviços</h1></a>
                        <br />
                        <?php echo Message::get(); ?>

                        <form enctype="multipart/form-data" action="index.php" method="post">
                            <fieldset>
                                <div>
                                    <h4>Nome:</h4>
                                    <input type='text'name='name_service' value='' class="form-control" placeholder="Nome" pattern="^[^<>]{0,255}$" required/>
                                </div>
                                <div>
                                    <h4>Descrição:</h4>
                                    <textarea name="about_service" class="ckeditor" placeholder="Detalhes" required></textarea>
                                </div>
                                <br/>
                                <div>
                                    <h4>Imagem (.png, .jpg):</h4>
                                    <input name="photo" id="photo" type="file" required/>
                                    <br/>
                                    *Tamanho recomendado: 200x200
                                </div>
                                <br />
                                <button type="submit" class="btn btn-primary pull-right" >Salvar</button>
                                <a href='../' class="btn btn-primary pull-right margin">Cancelar</a>
                            </fieldset>
                        </form>
                    </div>
                    <?php include 'table.php'; ?>
                </div>
                <!-- // Fim Servicos -->

            <!-- // Fim Conteudo -->
            </div>
        <!-- // Fim Corpo -->
        </div>

        <!--  Rodape -->
<?php	include ('../footer.php');
