<?php
$no_need_login = true;
$no_visible_elements = true;
include("../header.php");

@session_destroy();
if (Dbcommand::post("email")) {
    $mail = new Mail();	
    header("Location: index.php?msg=" .$mail->setRecovery());
}

?>
		<div class="container">
		    <div class="row">
		        <div class="span9">
		            <div class="hero-unit">       
		                <a href="../"><h1>Recuperar Senha</h1></a>
		                <br/>
		                <?php include("../components/msg.php"); ?>

		                <form action="#" method="post">
		                    <fieldset>
		                        <div>Email profissional:
		                            <input type='email' name='email' class="form-control" placeholder="Digite seu email" required/>                
		                        </div>                                
		                        <br/>
		                        <button type="submit" class="btn btn-primary pull-right" >Recuperar Senha</button>
		                        <a href="../" class="btn btn-primary">Voltar</a>
		                        <br/>
		                    </fieldset>
		                </form>        
		            </div>    
		        </div>
		    </div>
		</div>
	</body>
</html>
