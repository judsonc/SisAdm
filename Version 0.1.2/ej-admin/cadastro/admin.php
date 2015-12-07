<?php
$no_need_login = true;
$no_visible_elements = true;
include '../header.php';
$banner = new Album('empresa');

/*   =============   Deletar imagem   ===============     */
if ((int) Dbcommand::get('del')) {
    for ($i = 0; $i < $banner->size; $i++) {
        unlink(".." .$banner->photo[$i]->getDir());  // Deletando arquivo em "../components/img"
        header("Location: admin.php?msg=" .$banner->photo[$i]->delete()); // Deletando registro
    }
}

/*   =============   Adicionar imagem   ===============     */
if (@$_POST) {
    $company->setName();
    header("Location: admin.php?msg=" .$banner->addPhoto($user->getId()));
}

?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10">
                    <div class="jumbotron">
                        <a href="../"><h1>Logomarca</h1></a>
                        <br/>
                        <?php echo Message::get(); ?>

                        <form enctype="multipart/form-data" action="admin.php" method="post">
                            <fieldset>
                                <div>
                                    <h4>Nome:</h4>
                                    <input type='text' name='name_corporation' class="form-control" value="<?php echo @$company->getName(); ?>" placeholder="Digite o Nome do Site" required/>
                                </div>
                                <br/>
                                <div>
                                    <h4>Imagem (.png, .jpeg, .jpg, .svg):</h4>
                                    <input name="photo" id="photo" type="file" required/>
                                    <br/>
                                    *Tamanho recomendado: 1280x720
                                </div>
                                <hr/>
                                <div>
                                    <img src="<?php echo @$banner->photo[0]->url; ?>" alt="<?php echo @$banner->photo[0]->name; ?>">
                                </div>
                                <br/>
                                <a class="btn btn-primary" href="admin.php?del=<?php echo 1; ?>">Deletar</a>
                                <button type="submit" class="btn btn-primary pull-right">Salvar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            <!-- // Fim Conteudo -->
            </div>
            <!-- // Fim Corpo -->
        </div>
    </body>
</html>


