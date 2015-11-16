    <?php if ($company->links->size > 0) { ?>
	    <div class="jumbotron">
                <div class="table-responsive">
                    <table class="table table-striped table-condensed tb-custom table-bordered">
                        <thead>
                            <tr class="bg-info text-center">
                                <td>
                                    <strong>Nome</strong>
                                </td>
                                <td>
                                    <strong>Descrição</strong>
                                </td>
                                <td style="width: 150px">
                                    <strong>Ações</strong>
                                </td>
                                <!-- Ao mudar o nome dos botoes, precisa mudar o tamanho da coluna que eh fixo pra
                                    nao quebrar linha dos botoes. -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < $company->links->size; $i++) { ?>
                            
                                <tr>
                                    <td>
                                        <?php echo $company->links->link[$i]->name; ?>
                                        
                                    </td>
                                    <td>
                                        <?php echo $company->links->link[$i]->about; ?>
                                        
                                    </td>                                    
                                    <td>
                                        <a class="btn btn-primary" href="view.php?up=<?php echo $i + 1; ?>">Editar</a>                                        
                                        <a class="btn btn-primary" href="index.php?del=<?php echo $i + 1; ?>">Deletar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                                
                        </tbody>
                    </table>
                </div>
	    </div>
    <?php }