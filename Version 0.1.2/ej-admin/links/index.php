<?php
include '../header.php';

if ((int) Dbcommand::get('del') > 0 && (int) Dbcommand::get('del') <= $company->links->size) {
    $i = Dbcommand::get('del') - 1;
    $company->links->link[$i]->get();
    for ($j = 0; $j < $company->links->link[$i]->album->size; $j++) {
        unlink("../" .$company->links->link[$i]->album->photo[$j]->getDir());  /* Deletando arquivo em "../components/img"  */
    }
    header("Location: index.php?msg=" .$company->links->link[$i]->delete()); // Deletando registro
}
if (@$_POST) {
    header("Location: index.php?msg=" .$company->links->addLink($user->getId()));
}

?>
                <!--  Links -->
                <div class="col-xs-12 col-sm-10">
                    <div class="jumbotron">
                        <a href="./"><h1>Links</h1></a>
                        <br />
                        <?php echo Message::get(); ?>

                        <form enctype="multipart/form-data" action="index.php" method="post">
                            <fieldset>
                                <div>
                                    <h4>Nome:</h4>
                                    <input type='text' name='name_link' class="form-control" placeholder="Nome" pattern="^[^<>]{0,255}$" required/>
                                </div>
                                <div>
                                    <h4>Link:</h4>
                                    <table>
                                        <tr>
                                            <td>http://</td>
                                            <td class="width-full"><input type='text' name='url_link' placeholder="www.exemplo.com.br" class="form-control" pattern="^[^<>]{0,255}$" required/></td>
                                        </tr>
                                    </table>
                                </div>
                                <div>
                                    <h4>Descrição:</h4>
                                    <textarea name="about_link" class="ckeditor" placeholder="Detalhes" required></textarea>
                                </div>
                                <br/>
                                <div>
                                    <h4>Imagem (.png, .jpeg, .jpg):</h4>
                                    <input name="photo" id="photo" type="file" required/>
                                    <br/>
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
                <!-- // Fim Links -->

            <!-- // Fim Conteudo -->
            </div>
        <!-- // Fim Corpo -->
        </div>

        <!--  Rodape -->
<?php	include ('../footer.php');
