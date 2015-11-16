<!DOCTYPE html>
<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
include_once ("components/config.php");
?>
<html lang="pt_BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $company->getName(); ?>">

        <title>Gerenciamento | <?php echo $company->getName(); ?></title>
        <link rel="shortcut icon" href="<?php echo $server; ?>/components/img/favicon.png"/>

        <link rel="stylesheet" href="<?php echo $server; ?>/components/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $server; ?>/components/css/style.css">
        <link rel="stylesheet" href="<?php echo $server; ?>/components/css/responsive.css">

        <script src="<?php echo $server; ?>/components/js/jquery.min.js"></script>
        <script src="<?php echo $server; ?>/components/js/responsive.js"></script>
        <script src="<?php echo $server; ?>/components/ckeditor/ckeditor.js"></script>
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
                        <a class="navbar-brand " href="<?php echo $server; ?>"><?php echo $company->getName(); ?></a>
                    </div>
                    <div class="nav navbar-nav pull-right" id="open-dropdown">
                        <li class="dropdown-toggle" id="dropdown">
                            <a style="cursor: pointer;">
                                Bem-vindo<span class="hidden-xs">, <?php echo $user->name; ?> </span>
                                <span class="caret"></span>
                            </a>
                        </li>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $server; ?>/conta" class="button" id="perfil1">Conta</a></li>
                            <hr />
                            <li><a href="<?php echo $server; ?>/login.php?logout=1">Sair</a></li>
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
                        <a href="<?php echo $server; ?>" class="list-group-item <?php echo ($active == 'inicio') ? 'selected' : ''; ?>">Início</a>
                        <a href="<?php echo $server; ?>/banner" class="list-group-item <?php echo ($active == 'banner') ? 'selected' : ''; ?>">Banners</a>
                        <a href="<?php echo $server; ?>/quemsomos" class="list-group-item <?php echo ($active == 'quemsomos') ? 'selected' : ''; ?>">Quem Somos</a>
                        <a href="<?php echo $server; ?>/servicos" class="list-group-item <?php echo ($active == 'servico') ? 'selected' : ''; ?>">Serviços</a>
                        <a href="<?php echo $server; ?>/portfolio" class="list-group-item <?php echo ($active == 'portfolio') ? 'selected' : ''; ?>">Portifólio</a>
                        <a href="<?php echo $server; ?>/contato" class="list-group-item <?php echo ($active == 'contato') ? 'selected' : ''; ?>">Contato</a>
                        <a href="<?php echo $server; ?>/emails" class="list-group-item <?php echo ($active == 'email') ? 'selected' : ''; ?>">Emails</a>
                        <a href="<?php echo $server; ?>/links" class="list-group-item <?php echo ($active == 'link') ? 'selected' : ''; ?>">Links</a>
                    </div>
                </div>
                <!-- // Fim Menu lateral -->
            <?php } /*
            </div>
        </div>
    </body>
</html> */
