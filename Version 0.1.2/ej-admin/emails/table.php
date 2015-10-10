	    <div class="hero-unit">        
                <div class="table-responsive">
                    <table class="table-striped table-condensed tb-custom text-center">
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Assunto</td>
                                <td>Data</td>                                
                                <td>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < $user->mails->size; $i++) { ?>                            
                                <tr>
                                    <td <?php echo ($user->mails->mail[$i]->status == 1) ? "style='background-color: #FF7E00'" : ''; ?> >
                                        <?php echo $user->mails->mail[$i]->name; ?>                                        
                                    </td>
                                    <td <?php echo ($user->mails->mail[$i]->status == 1) ? "style='background-color: #FF7E00'" : ''; ?> >
                                        <?php echo $user->mails->mail[$i]->title; ?>
                                    </td>
                                    <td <?php echo ($user->mails->mail[$i]->status == 1) ? "style='background-color: #FF7E00'" : ''; ?> >
                                        <?php echo date('d-m-Y h:i', strtotime($user->mails->mail[$i]->date_in)); ?>                                        
                                    </td>
                                    <!-- Ao mudar o nome dos botoes, precisa mudar o tamanho da coluna que eh fixo pra
                                    nao quebrar linha dos botoes. -->                                    
                                    <td style="min-width: 140px">
                                        <a class="btn btn-primary" href="index.php?up=<?php echo $i + 1; ?>" >Ver</a>
                                        <a class="btn btn-primary" href="index.php?del=<?php echo $i + 1; ?>" >Deletar</a>
                                    </td>
                                </tr>
                            <?php }     
                        /*      =====     Caso nao tenha email, mostra a tabela vazia      ======      */
                            if ($user->mails->size < 1) { ?>
                                <tr>
                                    <td colspan="4">
                                        <br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;" colspan="4">
                                        Nenhum email disponível
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <br/>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
	    </div>
    <?php 