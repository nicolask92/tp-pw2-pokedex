<?php require_once ('_session.php'); ?>
<!doctype html>
<html lang="es">
    <head>
        <?php require_once ('_header.php'); ?>
        <title>Entrar- Trabajo Practico - Programacion Web 2</title>
    </head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <?php include_once ('_admin_sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php include_once ('_top_bar.php'); ?>
            <!-- Begin Page Content -->
            <?php include_once ('_login_form.php') ?>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <?php include_once ('_footer.php'); ?>
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<?php
require_once ('_modal_salir.php');
require_once ('_scripts.php');
?>
</body>
</html>
