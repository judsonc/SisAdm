<?php
include '../header.php';

if (@$_POST) {
    header("Location: index.php?msg=".$company->setContact($user->getId()));
}
?>
                <!--  Contato -->
                <div class="col-xs-12 col-sm-10">
                    <div class="jumbotron">
                        <a href="./"><h1>Contato</h1></a>
                        <br />
                        <?php echo Message::get(); ?>

                        <form action="#" method="post">
                            <fieldset>
                                <div>
                                    <h4>Endereço:</h4>
                                    <input type='text' name='adress_corporation' value='<?php echo $company->adress; ?>' class="form-control" placeholder="Avenida Prudente de Morais, Loja 03, 3857" pattern="^[^<>]{0,255}$" required/>
                                </div>
                                <div>
                                    <h4>CEP:</h4>
                                    <input type='text' name='zip_corporation' value='<?php echo $company->zip; ?>' class="form-control" placeholder="59999-999" required/>
                                </div>
                                <div>
                                    <h4>Bairro:</h4>
                                    <input type='text' name='square_corporation' value='<?php echo $company->square; ?>' class="form-control" placeholder="Bairro" pattern="^[^<>]{0,255}$" required/>
                                </div>
                                <div>
                                    <h4>Cidade:</h4>
                                    <input type='text' name='city_corporation' value='<?php echo $company->city; ?>' class="form-control" placeholder="Cidade" pattern="^[^<>]{0,255}$" required/>
                                </div>
                                <div>
                                    <h4>Estado:</h4>
                                    <input type='text' name='state_corporation' value='<?php echo $company->state; ?>' class="form-control" placeholder="Estado" pattern="^[^<>]{0,255}$" required/>
                                </div>
                                <div>
                                    <h4>País:</h4>
                                    <input type='text' name='country_corporation' value='<?php echo $company->country; ?>' class="form-control" placeholder="País" pattern="^[^<>]{0,255}$" required/>
                                </div>
                                <div>
                                    <h4>Email:</h4>
                                    <input type='email' name='mail_corporation' value='<?php echo $company->mail; ?>' class="form-control" placeholder="<?php echo $_SERVER['SERVER_ADMIN']; ?>" required/>
                                </div>
                                <div>
                                    <h4>Telefone (1):</h4>
                                    <input type='text' name='phone1_corporation' value='<?php echo $company->phone1; ?>' class="form-control" placeholder="+55 (84) 9999-9999" pattern="^(\+[0-9][0-9]) (\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$" required/>
                                </div>
                                <div>
                                    <h4>Telefone (2):</h4>
                                    <input type='text' name='phone2_corporation' value='<?php echo $company->phone2; ?>' class="form-control" placeholder="+55 (84) 99999-9999" pattern="^(\+[0-9][0-9]) (\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$" required/>
                                </div>
                                <br />
                                <button type="submit" class="btn btn-primary pull-right" >Salvar</button>
                                <a href='../' class="btn btn-primary pull-right margin">Voltar</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- // Fim Contato -->

            <!-- // Fim Conteudo -->
            </div>
        <!-- // Fim Corpo -->
        </div>

        <!--  Rodape -->
<?php	include '../footer.php';
