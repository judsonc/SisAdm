<?php
$active = 'inicio';
include 'header.php';	
$user->mails->get();
?>
                <!--  Home -->
                <div class="span9">
                    <div class="hero-unit">
                        <a href="../" title="Quer voltar pra <?php echo $company->getName(); ?>?" >
                            <h1><?php echo $company->getName(); ?></h1>
                        </a>
                        <br/>
                        <p>A partir desta área administrativa você tem total acesso a todas as configurações ajustáveis de seu site. 
                            A guia na lateral esquerda diz respeito à todos os dados manipuláveis no site. Como imagens, dados de contato e sobre sua empresa e a exibição desses. 
                        </p>
                        <hr>
                        Início da Sessão: 
                        <?php echo date("d/m/Y, h:i", strtotime($user->log)); ?><br/>
                        <hr/>
                        Data de Criação: 
                        <?php echo date("d/m/Y", strtotime($user->date_in)); ?><br/>                        
                        <hr/>
                        <a href="./emails"> Você tem <?php echo $user->mails->size; ?> mensagens.</a>
                        <hr/>
                    </div>
                </div>
                <!-- // Fim Home -->
                <!-- // Fim Conteudo -->
            </div>
        <!-- // Fim Corpo --> 
        </div>
        <!--  Rodape -->
<?php	include 'footer.php';
