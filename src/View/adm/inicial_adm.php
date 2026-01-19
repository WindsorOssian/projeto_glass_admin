<?php

// DIR informa aonde você está e quantos níveis você quer voltar
include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$menuAtivo  = 'principal';
$tituloPagina = 'Principal';


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once PATH . 'Template/_includes/_head.php'; ?>

</head>

<body>
    <!-- Animated Background se tirar o fundo fica todo preto -->
    <div class="background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <!-- Animated Background se tirar o fundo fica todo preto -->


    <div class="dashboard">
        <!-- Sidebar -->
        <?php include_once PATH . 'Template/_includes/_menu_adm.php'; ?>

        <!-- Main nunca fica no _topo -->
        <main class="main-content">

            <!-- Main Content -->
            <?php include_once PATH . 'Template/_includes/_topo.php'; ?>

            <!-- Mobile Menu Toggle -->
            <?php include_once PATH . 'Template/_includes/_botao_menu.php'; ?>

            <!-- Stats Cards Conteúdos da página -->


        </main>

    </div>


    <!-- Footer -->
    <?php include_once PATH . 'Template/_includes/_footer.php'; ?>
    <!-- Scripts -->
    <?php include_once PATH . 'Template/_includes/_scripts.php'; ?>


    <!-- TemplateMo 607 Glass Admin -->
</body>

</html>