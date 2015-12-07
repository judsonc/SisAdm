<?php
include '../header.php';
$clients = new Album('clientes');

/*   =============   Deletar imagem   ===============     */
if ((int) Dbcommand::get('del') > 0 && (int) Dbcommand::get('del') <= $clients->size) {
    unlink(".." .$clients->photo[Dbcommand::get('del')-1]->getDir());  /* Deletando arquivo em "../components/img"  */
    header("Location: ./?msg=" .$clients->photo[Dbcommand::get('del') - 1]->delete()); /* Deletando registro do banco */
}

/*   =============   Adicionar imagem   ===============     */
if (@$_POST) {
    header("Location: ./?msg=" .$clients->addPhoto($user->getId()));
}

?>
        <!-- Portfolio -->
        <div class="col-xs-12 col-sm-10">
            <div class="jumbotron">
                <a href="./"><h1>Portfólio</h1></a>
                <br/>
                <?php echo Message::get(); ?>

                <form enctype="multipart/form-data" action="index.php" method="post">
                    <fieldset>
                        <div>
                            <h4>Nome:</h4>
                            <input type='text' name='name_photo' class="form-control" placeholder="Digite o Nome do Cliente" pattern="^[^<>]{0,255}$" required/>
                        </div>
                        <div>
                            <h4>Miniatura (.png, .jpeg, .jpg):</h4>
                            <input name="photo" id="photo" type="file" required/>
                            <br/>
                            *Tamanho recomendado: 1280x720
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary pull-right">Salvar</button>
                        <a href='../' class="btn btn-primary pull-right">Cancelar</a>
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
include '../footer.php';
