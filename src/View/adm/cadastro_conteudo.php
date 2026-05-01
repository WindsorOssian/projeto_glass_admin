<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
include_once dirname(__DIR__, 3) . '/src/Template/_includes/icon/icones.php';

use Src\Controller\ConteudoCTRL;
use Src\Controller\DisciplinaCTRL;

$ctrl = new ConteudoCTRL();
$ctrlDisc = new DisciplinaCTRL();

$disciplinas = $ctrlDisc->ConsultarDisciplinaCTRL();

$tituloPagina = 'Cadastro Conteúdo';

$dados = [];

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $dados = $ctrl->DetalharConteudoCTRL((int)$_GET['id']);

    if (!empty($dados)) {
        $tituloPagina = 'Alterar Conteúdo';
    }
}

$statusChecked = 'checked';

if (isset($dados['status']) && $dados['status'] == 0) {
    $statusChecked = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once PATH . 'Template/_includes/_head.php'; ?>
</head>

<body>

<!-- Fundo animado -->
<?php include_once PATH . 'Template/_includes/_animacao_fundo.php'; ?>

<div class="dashboard">

    <!-- Sidebar -->
    <?php include_once PATH . 'Template/_includes/_menu_adm.php'; ?>

    <main class="main-content">

        <!-- Topo -->
        <?php include_once PATH . 'Template/_includes/_topo.php'; ?>

        <!-- Botão mobile -->
        <?php include_once PATH . 'Template/_includes/_botao_menu.php'; ?>

        <div class="settings-grid">

            <!-- Mini menu -->
            <?php include_once PATH . 'Template/_includes/mini_menu_adm.php'; ?>

            <div class="glass-card-card">

                <div class="settings-tab-content active">

                    <div class="profile-header">
                        <div class="profile-avatar-large">
                            ID
                            <div class="profile-avatar-edit">
                                <?php echo get_icon('editarimagem'); ?>
                            </div>
                        </div>

                        <div class="profile-info">
                            <h2><?= !empty($dados) ? 'Alterar Conteúdo' : 'Cadastro de Conteúdo' ?></h2>
                            <p>
                                <?= !empty($dados)
                                    ? 'Aqui você pode alterar o conteúdo'
                                    : 'Aqui você pode cadastrar conteúdos das disciplinas' ?>
                            </p>
                        </div>
                    </div>

                    <form id="formCAD" onsubmit="return false;">

                        <input type="hidden" id="id_conteudo"
                            value="<?= $dados['id'] ?? '' ?>">

                        <div class="settings-section">

                            <div class="form-grid">

                                <!-- TÍTULO -->
                                <div class="form-group-settings">
                                    <label>Título</label>
                                    <input type="text" id="titulo" class="obg"
                                        value="<?= $dados['titulo'] ?? '' ?>">
                                </div>

                                <!-- DISCIPLINA -->
                                <div class="form-group-settings">
                                    <label>Disciplina</label>
                                    <select id="disciplina_id" class="settings-select obg">

                                        <option value="">Selecione</option>

                                        <?php foreach ($disciplinas as $d) { ?>
                                            <option value="<?= $d['id'] ?>"
                                                <?= ($dados['disciplina_id'] ?? 0) == $d['id'] ? 'selected' : '' ?>>
                                                <?= $d['nome_disciplina'] ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <!-- STATUS -->
                                <div class="settings-row">
                                    <div class="settings-label">
                                        <span class="settings-label-title">Status</span>
                                        <span class="settings-label-desc">Ativar ou inativar conteúdo</span>
                                    </div>

                                    <input type="hidden" value="0">

                                    <label class="toggle-switch">
                                        <input type="checkbox" id="status" value="1" <?= $statusChecked ?>>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <!-- DESCRIÇÃO -->
                                <div class="form-group-settings full-width">
                                    <label>Descrição</label>
                                    <textarea id="descricao"><?= $dados['descricao'] ?? '' ?></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="btn-group">

                            <?php if (!empty($dados)) { ?>
                                <button type="button"
                                    onclick="AlterarConteudo('formCAD')"
                                    class="btn btn-primary">
                                    Alterar
                                </button>
                            <?php } else { ?>
                                <button type="button"
                                    onclick="GravarConteudo('formCAD')"
                                    class="btn btn-primary">
                                    Salvar
                                </button>
                            <?php } ?>

                            <button class="btn btn-secondary" style="width:auto;">
                                Cancelar
                            </button>

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

<script src="../../Resource/ajax/conteudo_ajax.js"></script>

</body>
</html>