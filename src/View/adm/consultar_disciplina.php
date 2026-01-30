<?php

use Src\Public\Util;

// DIR informa aonde você está e quantos níveis você quer voltar
include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
include_once dirname(__DIR__, 2) . '/Resource/dataview/disciplina_dataview.php'; // Se precisar testar comente essa linha
include_once dirname(__DIR__, 3) . '/src/Template/_includes/icon/icones.php';

$tituloPagina = 'Consultar Disciplinas';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once PATH . 'Template/_includes/_head.php'; ?>

</head>

<body>

    <!-- Animated Background se tirar o fundo fica todo preto -->
    <?php include_once PATH . 'Template/_includes/_animacao_fundo.php'; ?>


    <div class="dashboard">
        <!-- Sidebar -->
        <?php include_once PATH . 'Template/_includes/_menu_adm.php'; ?>


        <main class="main-content">
            <!-- Main Content -->
            <?php include_once PATH . 'Template/_includes/_topo.php'; ?>

            <!-- Mobile Menu Toggle -->
            <?php include_once PATH . 'Template/_includes/_botao_menu.php'; ?>

            <!-- Formulário -->

            <div class="settings-grid">
                <!-- Settings Navigation -->
                <?php include_once PATH . 'Template/_includes/mini_menu_adm.php'; ?>

                <!-- Settings Content -->
                <div class="glass-card-card">
                    <!-- Profile Tab -->
                    <div class="settings-tab-content active" id="tab-profile">
                        <div class="profile-header">
                            <div class="profile-avatar-large">
                                ID
                                <div class="profile-avatar-edit">
                                    <?php echo get_icon('editarimagem'); ?>
                                </div>
                            </div>
                            <div class="profile-info">
                                <h2>Digite aqui as disciplinas</h2>
                                <!-- <p>Aqui você pode consultar todas as suas disciplinas</p> -->
                                <div class="form-group-settings">
                                    <label>Nome da disciplina</label>
                                    <input type="text" id="nome_disciplina" name="nome_disciplina" placeholder="Ex: Matemática...">
                                </div>
                            </div>
                        </div>

                        <form method="post" id="formCAD" action="">

                            <!-- <h3 class="settings-section-title">Profile Information</h3> -->

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

                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </main>
    </div>


    <!-- Footer -->
    <?php include_once PATH . 'Template/_includes/_footer.php'; ?>
    <!-- Scripts -->
    <?php include_once PATH . 'Template/_includes/_scripts.php'; ?>

    <script src="../../Resource/ajax/disciplina_ajax.js"></script>
    <!-- TemplateMo 607 Glass Admin -->
</body>

</html>