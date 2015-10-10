<?php 
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
include_once ("components/config.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gerenciamento | <?php echo $company->getName(); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="<?php echo $server; ?>/components/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $server; ?>/components/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo $server; ?>/components/css/docs.css" rel="stylesheet">
        <link href="<?php echo $server; ?>/components/css/style.css" rel="stylesheet">
        
        <script src="<?php echo $server; ?>/components/js/jquery.js" ></script>
        <script src="<?php echo $server; ?>/components/js/jquery-2.js"></script>
        <script src="<?php echo $server; ?>/components/js/hidepages.js"></script>
        <script src="<?php echo $server; ?>/components/ckeditor/ckeditor.js"></script> <!-- CKEditor -->

    </head>
    <body>
    <?php if (!isset($no_visible_elements) || !$no_visible_elements) { 
        $user->get();
    ?>       
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn-navbar visible-phone pull-left" id="dropmenu">
                    <!--span class="sr-only">Toggle</span-->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="<?php echo $server; ?>"><?php echo $company->getName(); ?></a>
                    <div class="nav-collapse collapse">
                        <div class="nav  pull-right" id="open-dropdown">
                            <li class="dropdown-toggle" id="dropdown">                                
                                <a style="cursor: pointer;">
                                    Bem-vindo<span class="hidden-phone">, <?php echo $user->name; ?> </span>
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
                </div>
            </div>
        </div>
        <div class="container">
            <!--  Corpo -->
            <div class="row">
                <!--  Menu lateral -->
                <div id="dropmenu1" class="span3 hidden-phone visible-desktop visible-tablet">
                    <ul class="nav nav-list bs-docs-sidenav">
                        <li><a href="<?php echo $server; ?>" class="button <?php echo ($active == 'inicio') ? 'active' : ''; ?>">Início</a></li>
                        <li><a href="<?php echo $server; ?>/banner" class="button <?php echo ($active == 'banner') ? 'active' : ''; ?>">Banners</a></li>
                        <li><a href="<?php echo $server; ?>/quemsomos" class="button <?php echo ($active == 'quemsomos') ? 'active' : ''; ?>">Quem somos</a></li>
                        <li><a href="<?php echo $server; ?>/servicos" class="button <?php echo ($active == 'servico') ? 'active' : ''; ?>">Serviços</a></li>
                        <li><a href="<?php echo $server; ?>/portfolio" class="button <?php echo ($active == 'portfolio') ? 'active' : ''; ?>">Portfólio</a></li>
                        <li><a href="<?php echo $server; ?>/contato" class="button <?php echo ($active == 'contato') ? 'active' : ''; ?>">Contato</a></li>
                        <li><a href="<?php echo $server; ?>/emails" class="button <?php echo ($active == 'email') ? 'active' : ''; ?>">Emails</a></li>
                        <li><a href="<?php echo $server; ?>/links" class="button <?php echo ($active == 'link') ? 'active' : ''; ?>">Links</a></li>
                    </ul>                    
                </div>
                <!-- // Fim Menu lateral -->
            <?php } /*
            </div>
        </div>
    </body>
</html> */
