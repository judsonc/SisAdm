	    <div class="jumbotron">
                <div class="table-responsive">
                    <table class="table table-striped table-condensed tb-custom table-bordered">
                        <thead>
                            <tr class="bg-info text-center">
                                <td>
                                    <strong>Nome</strong>
                                </td>
                                <td>
                                    <strong>Assunto</strong>
                                </td>
                                <td>
                                    <strong>Data</strong>
                                </td>
                                <td style="width: 150px">
                                    <strong>Ações</strong>
                                </td>
                                <!-- Ao mudar o nome dos botoes, precisa mudar o tamanho da coluna que eh fixo pra
                                    nao quebrar linha dos botoes. -->
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
                                        <?php echo date('d-m-Y H:i', strtotime($user->mails->mail[$i]->date_in)); ?>
                                    </td>
                                    <td>
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