<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
include_once dirname(__DIR__, 2) . '/Resource/dataview/conteudo_dataview.php';
include_once dirname(__DIR__, 3) . '/src/Template/_includes/icon/icones.php';

use Src\Controller\ConteudoCTRL;

$ctrl = new ConteudoCTRL();
// $conteudos = $ctrl->ConsultarConteudoCTRL();

$tituloPagina = 'Consultar Conteúdos';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once PATH . 'Template/_includes/_head.php'; ?>
</head>

<body>

    <?php include_once PATH . 'Template/_includes/_animacao_fundo.php'; ?>

    <div class="dashboard">

        <?php include_once PATH . 'Template/_includes/_menu_adm.php'; ?>

        <main class="main-content">

            <?php include_once PATH . 'Template/_includes/_topo.php'; ?>
            <?php include_once PATH . 'Template/_includes/_botao_menu.php'; ?>

            <div class="settings-grid">

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
                                <h2>Consultar Conteúdos</h2>
                                <p>Veja todos os conteúdos cadastrados</p>
                            </div>
                        </div>

                        <form id="formCAD">

                            <div class="settings-section">
                                <h3 class="settings-section-title">Lista de Conteúdos</h3>

                                <div class="table-wrapper">
                                    <table class="data-table">

                                        <thead>
                                            <tr>
                                                <th>Título</th>
                                                <th>Disciplina</th>
                                                <th>Status</th>
                                                <th>Alterar</th>
                                                <th>Excluir</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php foreach ($conteudos as $c) { ?>
                                                <tr>

                                                    <td><?= $c['titulo'] ?></td>

                                                    <td><?= $c['nome_disciplina'] ?></td>

                                                    <td>
                                                        <span class="status-badge <?= $c['status'] ? 'completed' : 'processing' ?>">
                                                            <?= $c['status'] ? 'Ativo' : 'Inativo' ?>
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <button type="button" class="status-badge pending"
                                                            onclick="IrParaAlterarConteudo(<?= $c['id'] ?>)">
                                                            Alterar
                                                        </button>
                                                    </td>

                                                    <td>
                                                        <button type="button" class="status-badge danger"
                                                            onclick='AbrirModalExcluir(<?= $c["id"] ?>, <?= json_encode($c["titulo"]) ?>)'>
                                                            Excluir
                                                        </button>
                                                    </td>

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                                <?php include_once PATH . 'Template/_includes/_paginacao.php'; ?>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </main>
    </div>

    <?php include_once PATH . 'View/adm/modais/modal-excluir.php'; ?>
    <?php include_once PATH . 'Template/_includes/_footer.php'; ?>
    <?php include_once PATH . 'Template/_includes/_scripts.php'; ?>

    <script src="../../Resource/ajax/conteudo_ajax.js"></script>

</body>

</html>