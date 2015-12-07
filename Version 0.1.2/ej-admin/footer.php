     <footer class="footer">
        <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="<?php echo Dbcommand::getServer(); ?>/components/js/responsive.js" type="text/javascript"></script>
        <script src="<?php echo Dbcommand::getServer(); ?>/components/ckeditor/ckeditor.js" type="text/javascript"></script>
<!--            <div class="container">
                <p class="pull-right"><a href="#">Voltar ao topo</a></p>
                <p> <?php echo $company->getName(); ?> | Desenvolvido por <a href="http://www.ejectufrn.com.br" target="_blank">EJECT</a>.</p>

                <!-- Links Rodape --
                <ul class="footer-links">
                  <li><a href="http://blog.getbootstrap.com">Blog</a></li>
                  <li class="muted">·</li>
                  <li><a href="https://github.com/twitter/bootstrap/issues?state=open">Issues</a></li>
                  <li class="muted">·</li>
                  <li><a href="https://github.com/twitter/bootstrap/wiki">Roadmap e changelog</a></li>
                </ul>
                            // Links Rodape --
            </div-->
        </footer>
        <!-- //Fim Rodape -->
    </body>
</html>
<?php
    Connection::close();
    unset($user);
    unset($company);

/*	<script src="components/js/google-code-prettify/prettify.js"></script>
        <script src="components/js/bootstrap-dropdown.js"></script>
        <script src="components/js/bootstrap-transition.js"></script>
        <script src="components/js/bootstrap-alert.js"></script>
        <script src="components/js/bootstrap-modal.js"></script>
        <script src="components/js/bootstrap-scrollspy.js"></script>
        <script src="components/js/bootstrap-tab.js"></script>
        <script src="components/js/bootstrap-tooltip.js"></script>
        <script src="components/js/bootstrap-popover.js"></script>
        <script src="components/js/bootstrap-balloon.js"></script>
        <script src="components/js/bootstrap-button.js"></script>
        <script src="components/js/bootstrap-collapse.js"></script>
        <script src="components/js/bootstrap-carousel.js"></script>
        <script src="components/js/bootstrap-typeahead.js"></script>
        <script src="components/js/bootstrap-affix.js"></script>
        <script src="components/js/application.js"></script>
*/
