<?php
$active = 'portfolio';
include_once '../header.php';
$clients = new Album('clientes');

if ((int) Dbcommand::get('up') < 1 || (int) Dbcommand::get('up') > $clients->size) {
    header("Location: index.php");
} else {
    /*   =============   Editar nome e/ou foto   ===============     */
    $i = (int) Dbcommand::get('up') - 1;    /* Guarda o indice que foi passado pelo get do nome e foto a ser editado    */
    if (@$_POST) {
        if ($_FILES['photo']['name'] != '') {     /* Atualiza apenas o nome e foto nova     */
            $name = Photo::getSendName();       /* Guarda diretorio com novo nome   */
            if (is_int($name)) {    /* Verificando se eh o nome da imagem ou a mensagem de erro (inteiro)   */
                header("Location: view.php?up=" .($i+1). "&msg=" .$name);
            }else {
                unlink("../" .$clients->photo[$i]->getDir());    /* Deletando arquivo em "../components/img"  */
                header("Location: view.php?up=" .($i+1). "&msg=" .$clients->photo[$i]->update($user->getId(), Dbcommand::getServer().$name));
            }
        }else {     /* Atualiza apenas o nome passando a url antiga     */
            header("Location: view.php?up=" .($i+1). "&msg=" .$clients->photo[$i]->update($user->getId(), $clients->photo[$i]->url));
        }
    }

?>
        <!-- Portfolio -->
        <div class="col-xs-12 col-sm-10">
            <div class="jumbotron">
                <a href="./"><h1>Portfólio</h1></a>
                <br/>
                <?php echo Message::get(); ?>

                <form enctype="multipart/form-data" action="view.php?up=<?php echo $i + 1; ?>" method="post">
                    <fieldset>
                        <div>
                            <h4>Editar Nome:</h4>
                            <input type='text' name='name_photo' value='<?php echo $clients->photo[$i]->name; ?>' class="form-control" pattern="^[^<>]{0,255}$" required/>
                        </div>
                        <br/>
                        <div>
                            <img src="<?php echo $clients->photo[$i]->url; ?>" alt="<?php echo $clients->photo[$i]->name; ?>">
                        </div>
                        <br/>
                        <div>
                            <h4>Editar Miniatura (.png, .jpeg, .jpg):</h4>
                            <input name="photo" id="photo" type="file"/>
                            <br/>
                            *Tamanho recomendado: 500x500
                        </div>
                        <br/>
                        <a class="btn btn-primary" href="index.php?del=<?php echo $i + 1; ?>">Deletar</a>
                        <button type="submit" class="btn btn-primary pull-right">Salvar</button>
                        <a href='./' class="btn btn-primary pull-right">Voltar</a>
                    </fieldset>
                </form>
            </div>
            <?php include 'table.php'; ?>
        </div>
        <!-- // Fim Portfolio -->
    <!-- // Fim Conteudo -->
    </div>
    <!-- // Fim Corpo -->
</div>
<!--  Rodape -->
<?php
    include_once '../footer.php';
}