<?php
$active = 'portfolio';
include '../header.php';
$clients = new Album('clientes');

/*   =============   Deletar imagem   ===============     */
if ((int) Dbcommand::get('del') > 0 && (int) Dbcommand::get('del') <= $clients->size) {
    unlink(".." .$clients->photo[Dbcommand::get('del')-1]->getDir());  /* Deletando arquivo em "../components/img"  */
    header("Location: index.php?msg=" .$clients->photo[Dbcommand::get('del') - 1]->delete()); /* Deletando registro do banco */
}

/*   =============   Adicionar imagem   ===============     */
if (@$_POST) {
    header("Location: index.php?msg=" .$clients->addPhoto($user->getId()));   
}

?>
        <!-- Banner -->
        <div class="span9">
            <div class="hero-unit">
                <a href="./"><h1>Portfólio</h1></a>
                <br/>
                <?php include("../components/msg.php"); ?>                    
                <form enctype="multipart/form-data" action="index.php" method="post">
                    <fieldset>
                        <div>Nome:
                            <input type='text' name='name_photo' class="form-control" placeholder="Digite o Nome do Cliente" pattern="^[^<>]{0,255}$" required/> 
                        </div>                                                               
                        <div>
                            <p>Miniatura (.png, .jpeg, .jpg):
                            <input name="photo" id="photo" type="file" required/>                                
                            </p>
                            *Tamanho recomendado: 500x500
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
