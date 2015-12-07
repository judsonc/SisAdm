<?php
header('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
require_once ("components/config.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $company->getName(); ?>">

        <title><?php echo ucfirst(Dbcommand::getTitle()) ." | ". $company->getName(); ?></title>
        <link rel="shortcut icon" href="<?php echo Dbcommand::getServer(); ?>/components/img/favicon.ico" type="image/x-icon"/>

        <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo Dbcommand::getServer(); ?>/components/css/style.css">
        <link rel="stylesheet" href="<?php echo Dbcommand::getServer(); ?>/components/css/responsive.css">
    </head>
    <body>
        <?php
        if (!isset($no_visible_elements) || !$no_visible_elements) {
            $user->get();
            ?>
            <nav class="navbar navbar-fixed-top navbar-inverse">
                <div class="container-fluid">
                    <div>
                        <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand " href="<?php echo Dbcommand::getServer(); ?>"><?php echo $company->getName(); ?></a>
                    </div>
                    <div class="nav navbar-nav pull-right" id="open-dropdown">
                        <li class="dropdown-toggle" id="dropdown">
                            <a style="cursor: pointer;">
                                Bem-vindo<span class="hidden-xs">, <?php echo $user->name; ?> </span>
                                <span class="caret"></span>
                            </a>
                        </li>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo Dbcommand::getServer(); ?>/conta" class="button" id="perfil1">Conta</a></li>
                            <hr />
                            <li><a href="<?php echo Dbcommand::getServer(); ?>/login.php?logout=1">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <!--  Corpo -->
                <div class="row row-offcanvas row-offcanvas-left" id="sidebar">
                <!--  Menu lateral -->
                <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar" >
                    <div class="list-group">
                        <a href="<?php echo Dbcommand::getServer(); ?>" class="list-group-item <?php echo (Dbcommand::getTitle() == 'gerenciamento') ? 'selected' : ''; ?>">Início</a>
                        <a href="<?php echo Dbcommand::getServer(); ?>/banners" class="list-group-item <?php echo (Dbcommand::getTitle() == 'banners') ? 'selected' : ''; ?>">Banners</a>
                        <a href="<?php echo Dbcommand::getServer(); ?>/sobre" class="list-group-item <?php echo (Dbcommand::getTitle() == 'sobre') ? 'selected' : ''; ?>">Sobre</a>
                        <a href="<?php echo Dbcommand::getServer(); ?>/servicos" class="list-group-item <?php echo (Dbcommand::getTitle() == 'serviços') ? 'selected' : ''; ?>">Serviços</a>
                        <a href="<?php echo Dbcommand::getServer(); ?>/portfolio" class="list-group-item <?php echo (Dbcommand::getTitle() == 'portfolio') ? 'selected' : ''; ?>">Portfólio</a>
                        <a href="<?php echo Dbcommand::getServer(); ?>/contato" class="list-group-item <?php echo (Dbcommand::getTitle() == 'contato') ? 'selected' : ''; ?>">Contato</a>
                        <a href="<?php echo Dbcommand::getServer(); ?>/emails" class="list-group-item <?php echo (Dbcommand::getTitle() == 'emails') ? 'selected' : ''; ?>">Emails</a>
                        <a href="<?php echo Dbcommand::getServer(); ?>/links" class="list-group-item <?php echo (Dbcommand::getTitle() == 'links') ? 'selected' : ''; ?>">Links</a>
                    </div>
                </div>
                <!-- // Fim Menu lateral -->
            <?php } /*
            </div>
        </div>
    </body>
</html> */
