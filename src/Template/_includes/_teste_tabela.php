<?php

// DIR informa aonde você está e quantos níveis você quer voltar
include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

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
        <?php include_once PATH . 'Template/_includes/_menu.php'; ?>


        <main class="main-content">
            <!-- Main Content -->
            <?php include_once PATH . 'Template/_includes/_topo.php'; ?>

            <!-- Mobile Menu Toggle -->
            <?php include_once PATH . 'Template/_includes/_botao_menu.php'; ?>






            <div class="settings-section">
                <h3 class="settings-section-title">Consultar Disciplinas</h3>
                <div class="table-wrapper" style="margin: 0;">
                    <table class="data-table" style="min-width: 100%;">
                        <thead>
                            <tr>
                                <th>Disciplina</th>
                                <th>Status da disciplina</th>
                                <th>Alterar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($disciplinas as $d) { ?>
                                <tr>
                                    <td>
                                        <div class="table-user">
                                            <div class="table-user-info"><span class="table-user-name"><?= $d['nome_disciplina'] ?></span><span class="table-user-email"></span></div>
                                        </div>
                                    </td>

                                    <td><span class="status-badge <?= $d['status_disciplina'] ? 'completed' : 'processing' ?>"><?= $d['status_disciplina'] ? 'Ativo' : 'Inativo' ?></span></td>
                                    <!-- <td><a href="./alterar_disciplinas.php" class="status-badge pending">Alterar</td> -->
                                    <td>
                                        <button class="status-badge pending"
                                            onclick="IrParaAlterar(<?= $d['id']; ?>)">
                                            Alterar
                                        </button>
                                    </td>
                                </tr>


                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            <!--  PAGINAÇÃO FICA AQUI  -->
                <?php include_once PATH . 'Template/_includes/_paginacao.php'; ?>



































        </main>
    </div>


    <!-- Footer -->
    <?php include_once PATH . 'Template/_includes/_footer.php'; ?>
    <!-- Scripts -->
    <?php include_once PATH . 'Template/_includes/_scripts.php'; ?>


    <!-- TemplateMo 607 Glass Admin -->
</body>

</html>



<form method="post" id="formCAD" onsubmit="return false;">

    <div class="settings-section">
        <!-- <h3 class="settings-section-title">Profile Information</h3> -->
        <div class="form-grid">
            <div class="form-group-settings">
                <label>Digite o nome da disciplina para consultar</label>
                <input type="text" id="nome_disciplina" name="nome_disciplina" placeholder="Digite aqui...">
            </div>

            <div class="glass-card table-card">

                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Disciplina</th>
                                <th>Status da disciplina</th>
                                <th>Alterar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($disciplinas as $d) { ?>
                                <tr>
                                    <td>
                                        <div class="table-user">
                                            <div class="table-user-info"><span class="table-user-name"><?= $d['nome_disciplina'] ?></span><span class="table-user-email"></span></div>
                                        </div>
                                    </td>

                                    <td><span class="status-badge <?= $d['status_disciplina'] ? 'completed' : 'processing' ?>"><?= $d['status_disciplina'] ? 'Ativo' : 'Inativo' ?></span></td>
                                    <!-- <td><a href="./alterar_disciplinas.php" class="status-badge pending">Alterar</td> -->
                                    <td>
                                        <button class="status-badge pending"
                                            onclick="IrParaAlterar(<?= $d['id']; ?>)">
                                            Alterar
                                        </button>
                                    </td>
                                </tr>


                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!--  PAGINAÇÃO FICA AQUI  -->
                <?php include_once PATH . 'Template/_includes/_paginacao.php'; ?>
            </div>
        </div>
    </div>


</form>