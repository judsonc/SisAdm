<?php
$no_need_login = true;
$no_visible_elements = true;
$active = '';
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
                <div class="span9">
                    <div class="hero-unit">
                        <a href="../"><h1>Logomarca</h1></a>
                        <br/>
                        <?php include("../components/msg.php"); ?>                    
                        <form enctype="multipart/form-data" action="admin.php" method="post">
                            <fieldset>
                                <div>Nome:
                                    <input type='text' name='name_corporation' class="form-control" value="<?php echo @$company->getName(); ?>" placeholder="Digite o Nome do Site" required/> 
                                </div>
                                <br/>
                                <div>
                                    <p>Imagem (.png, .jpeg, .jpg, .svg):           
                                    <input name="photo" id="photo" type="file" required/>                                
                                    </p>
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
                <!-- // Fim Banner -->
            <!-- // Fim Conteudo -->
            </div>
            <!-- // Fim Corpo --> 
        </div>
    </body>
</html>


