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
                header("Location: view.php?up=" .($i+1). "&msg=" .$clients->photo[$i]->update($user->getId(), $server.$name));    /* Adiciona nova foto com novo endereco     */                
            }
        }else {     /* Atualiza apenas o nome passando a url antiga     */
            header("Location: view.php?up=" .($i+1). "&msg=" .$clients->photo[$i]->update($user->getId(), $clients->photo[$i]->url));
        }
    }
    
?>
        <!-- Banner -->
        <div class="span9">
            <div class="hero-unit" id="new">
                <a href="./"><h1>Portfólio</h1></a>
                <br/>
                <?php include("../components/msg.php"); ?>                
                <form enctype="multipart/form-data" action="view.php?up=<?php echo $i + 1; ?>" method="post">
                    <fieldset>
                        <div>Novo Nome:
                            <input type='text' name='name_photo' value='<?php echo $clients->photo[$i]->name; ?>' class="form-control" pattern="^[^<>]{0,255}$" required/> 
                        </div>
                        <br/>
                        <div>
                            <img src="<?php echo $clients->photo[$i]->url; ?>" alt="<?php echo $clients->photo[$i]->name; ?>">
                        </div>
                        <br/>
                        <div>
                            <p>Miniatura (.png, .jpeg, .jpg):         
                            <input name="photo" id="photo" type="file"/>                                
                            </p>
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
        <!-- // Fim Banner -->
    <!-- // Fim Conteudo -->
    </div>
    <!-- // Fim Corpo --> 
</div>
<!--  Rodape -->
<?php
    include_once '../footer.php';
}