    <?php if ($banner->size > 0) { ?>
	    <div class="hero-unit">        
                <div class="table-responsive">
                    <table class="table-striped table-condensed tb-custom text-center">
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Alteração</td>
                                <td>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < $banner->size; $i++) { ?>
                            
                                <tr>
                                    <td>
                                        <?php echo $banner->photo[$i]->name; ?>
                                        
                                    </td>
                                    <td>
                                        <?php echo date('h:i:s', strtotime($banner->photo[$i]->log)); ?>
                                        
                                    </td>
                                    <!-- Ao mudar o nome dos botoes, precisa mudar o tamanho da coluna que eh fixo pra
                                    nao quebrar linha dos botoes. -->                                    
                                    <td style="min-width: 150px">
                                        <a class="btn btn-primary" href="view.php?up=<?php echo $i + 1; ?>">Editar</a>                                        
                                        <a class="btn btn-primary" href="index.php?del=<?php echo $i + 1; ?>">Deletar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                                
                        </tbody>
                    </table>
                </div>
	    </div>
    <?php } ?>