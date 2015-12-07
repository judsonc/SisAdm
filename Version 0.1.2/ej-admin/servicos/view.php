<?php
include_once '../header.php';

if ((int) Dbcommand::get('up') < 1 || (int) Dbcommand::get('up') > $company->services->size) {
    header("Location: index.php");
} else {
    /*   =============   Editar nome e/ou foto   ===============     */
    $i = Dbcommand::get('up') - 1;
    $company->services->service[$i]->get();
    if (@$_POST) {
        if ($_FILES['photo']['name'] != '') {     /* Atualiza apenas o nome e foto nova     */
            $name = Photo::getSendName();       /* Guarda diretorio com novo nome   */
            if (is_int($name)) {    /* Verificando se eh o nome da imagem ou a mensagem de erro (inteiro)   */
                header("Location: view.php?up=" .($i+1). "&msg=" .$name);
            }else {
                for ($j = 0; $j < $company->services->service[$i]->album->size; $j++) {
                    unlink(".." .$company->services->service[$i]->album->photo[$j]->getDir());    /* Deletando arquivo em "../components/img"  */
                }
                header("Location: view.php?up=" .($i+1). "&msg=" .$company->services->service[$i]->update($user->getId(), Dbcommand::getServer().$name));    /* Adiciona novo serviço com novo endereco     */
            }
        }else {     /* Atualiza apenas o nome passando a url antiga     */
            header("Location: view.php?up=" .($i + 1). "&msg=" .$company->services->service[$i]->update($user->getId()));
        }

    }
?>
        <!-- Servicos -->
                <div class="col-xs-12 col-sm-10">
                    <div class="jumbotron">
                        <a href="./"><h1>Serviços</h1></a>
                        <br/>
                        <?php echo Message::get(); ?>

                        <form enctype="multipart/form-data" action="view.php?up=<?php echo $i + 1; ?>" method="post">
                            <fieldset>
                                <div>
                                    <h4>Editar Nome:</h4>
                                    <input type='text' name='name_service' value='<?php echo $company->services->service[$i]->name; ?>' class="form-control" pattern="^[^<>]{0,255}$" required/>
                                </div>
                                <div>
                                    <h4>Editar Descrição:</h4>
                                    <textarea name="about_service" class="ckeditor" placeholder="Detalhes" required><?php echo $company->services->service[$i]->about; ?></textarea>
                                </div>
                                <br/>
                                <?php for ($j = 0; $j < $company->services->service[$i]->album->size; $j++) { ?>
                                    <div>
                                        <img src="<?php echo $company->services->service[$i]->album->photo[$j]->url; ?>" alt="<?php echo $company->services->service[$i]->name; ?>">
                                    </div>
                                    <br/>
                                <?php } ?>
                                <div>
                                    <h4>Trocar Imagem (.png, .jpg):</h4>
                                    <input name="photo" id="photo" type="file" />
                                    <br/>
                                    *Tamanho recomendado: 200x200
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
                <!-- // Fim Servicos -->
            <!-- // Fim Conteudo -->
            </div>
            <!-- // Fim Corpo -->
        </div>
<!--  Rodape -->
<?php
    include_once '../footer.php';
}
