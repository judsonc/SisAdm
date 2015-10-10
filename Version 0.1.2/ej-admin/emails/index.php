<?php
$active = 'email';
include '../header.php';
$user->mails->get();

/*   =============   Deletar email   ===============     */
if ((int) Dbcommand::get('del') > 0 && (int) Dbcommand::get('del') <= $user->mails->size) {
    header("Location: index.php?msg=" .$user->mails->mail[Dbcommand::get('del') - 1]->delete()); /* Deletando registro do banco */
}

?>
        <!-- Banner -->
        <div class="span9">
            <div class="hero-unit">
                <a href="./"><h1>Emails</h1></a>
                <br/>
                <?php include("../components/msg.php"); ?>
                
                <p>Você tem <?php echo $user->mails->size; ?> mensagens.</p>
                <br/>
                <?php if ((int) Dbcommand::get('up') > 0 && (int) Dbcommand::get('up') <= $user->mails->size) {                    
                    $i = Dbcommand::get('up') - 1;
                    $user->mails->mail[$i]->setStatus();
                    $user->mails->get();
                ?>
                
                <div>
                    <p>Nome: <?php echo $user->mails->mail[$i]->name; ?></p>
                </div>
                <div>
                    <p>Email: <?php echo $user->mails->mail[$i]->mail_job; ?></p>
                </div>
                <div>
                    <p>Telefone: <?php echo $user->mails->mail[$i]->phone; ?></p>
                </div>
                <div>
                    <p>Título: <?php echo $user->mails->mail[$i]->title; ?></p>
                </div>
                <div>
                    <p>Mensagem: <?php echo $user->mails->mail[$i]->message; ?></p>
                </div>                
                <?php } ?>
                
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
