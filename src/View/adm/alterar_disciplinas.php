<?php

use Src\Public\Util;

// DIR informa aonde você está e quantos níveis você quer voltar
include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
include_once dirname(__DIR__, 2) . '/Resource/dataview/disciplina_dataview.php'; // Se precisar testar comente essa linha
include_once dirname(__DIR__, 3) . '/src/Template/_includes/icon/icones.php';

$tituloPagina = 'Alterar Disciplinas';

// Se não existir dados ou se estiver vazio, redireciona para consultar usuário
if (!isset($dados) || empty($dados)) {
    Util::ChamarPagina('consultar_disciplina');
    exit;
}

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
                <div class="glass-card">
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
                                <h2>Alterar Disciplinas</h2>
                                <p>Aqui você pode alterar todas as suas disciplinas</p>
                            </div>
                        </div>

                        <form method="post" id="formCAD" action="alterar_disciplinas.php">

                            <input type="hidden" id="id_disciplina" name="id_disciplina" value="<?= $dados['id_disciplina'] ?>">

                            <div class="settings-section">
                                <!-- <h3 class="settings-section-title">Profile Information</h3> -->
                                <div class="form-grid">
                                    <div class="form-group-settings">
                                        <label>Nome da disciplina</label>
                                        <input type="text" id="nome_disciplina" name="nome_disciplina" value="<?= $dados['nome_disciplina'] ?>" placeholder="Ex: Matemática...">
                                    </div>

                                    <div class="settings-row">
                                        <div class="settings-label">
                                            <span class="settings-label-title">Status da disciplina</span>
                                            <span class="settings-label-desc">Aqui você pode ativar ou inativar</span>
                                        </div>

                                        <input type="hidden" name="status_disciplina" value="0">
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="status_disciplina" name="status_disciplina" value="1" <?= $dados['status_disciplina'] == 1 ? 'checked' : '' ?>>
                                            <span class="toggle-slider obg"></span>
                                        </label>

                                    </div>

                                    <div class="form-group-settings full-width">
                                        <label>Descrição</label>
                                        <textarea id="descricao_disciplina" name="descricao_disciplina" placeholder="Descreva a sua disciplina aqui..."><?= $dados['descricao'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" onclick="AlterarDisciplina('formCAD')" id="btn_alterar" name="btn_alterar" class="btn btn-primary" style="width: auto;">Salvar</button>
                                <button name="btn_cancelar" class="btn btn-secondary" style="width: auto;">Cancel</button>
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
    <!-- AJAX -->
    <script src="../../Resource/ajax/disciplina_ajax.js"></script>

</body>

</html>