<?php
$active = 'banner';
include '../header.php';
$banner = new Album('banner');

/*   =============   Deletar imagem   ===============     */
if ((int) Dbcommand::get('del') > 0 && (int) Dbcommand::get('del') <= $banner->size) {
    unlink(".." .$banner->photo[Dbcommand::get('del')-1]->getDir());  /* Deletando arquivo em "../components/img"  */
    header("Location: index.php?msg=" .$banner->photo[Dbcommand::get('del') - 1]->delete()); /* Deletando registro do banco */
}

/*   =============   Adicionar imagem   ===============     */
if (@$_POST) {
    header("Location: index.php?msg=" .$banner->addPhoto($user->getId())); 
}

?>
        <!-- Banner -->
        <div class="span9">
            <div class="hero-unit">
                <a href="./"><h1>Banners</h1></a>
                <br/>
                <?php include("../components/msg.php"); ?>                    
                <form enctype="multipart/form-data" action="index.php" method="post">
                    <fieldset>
                        <div>Nome:
                            <input type='text' name='name_photo' class="form-control" placeholder="Digite o Nome do Banner" pattern="^[^<>]{0,255}$" required/> 
                        </div>                                                               
                        <div>
                            <p>Imagem (.png, .jpeg, .jpg):
                            <input name="photo" id="photo" type="file" required/>                                
                            </p>
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
        <!-- // Fim Banner -->
    <!-- // Fim Conteudo -->
    </div>
    <!-- // Fim Corpo --> 
</div>
<!--  Rodape -->
<?php
include '../footer.php';
