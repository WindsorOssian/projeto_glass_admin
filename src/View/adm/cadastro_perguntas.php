<?php

// DIR informa aonde você está e quantos níveis você quer voltar
include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
include_once dirname(__DIR__, 3) . '/src/Template/_includes/icon/icones.php';

use Src\Controller\QuestaoCTRL;
use Src\Controller\ConteudoCTRL;
use Src\Controller\DisciplinaCTRL;

$ctrlQuestao = new QuestaoCTRL();

// $ctrlConteudo = new ConteudoCTRL();
// $conteudos = $ctrlConteudo->ConsultarConteudoCTRL();

$ctrlDisciplina = new DisciplinaCTRL();
$disciplinas = $ctrlDisciplina->ConsultarDisciplinaAtivaCTRL();

$tituloPagina = 'Cadastro Questões';

// Se não existir dados ou se estiver vazio, redireciona para consultar usuário
// if (!isset($dados) || empty($dados)) {
//     Util::ChamarPagina('consultar_disciplina');
//     exit;


$dados = [];

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $dados = $ctrlQuestao->DetalharQuestaoCTRL((int)$_GET['id']);

    // 🔥 ALTERA O TÍTULO
    if (!empty($dados)) {
        $tituloPagina = 'Alterar Questão';
    }
}

// $statusChecked = 'checked';

// if (isset($dados['status_disciplina']) && $dados['status_disciplina'] == 0) {
//     $statusChecked = '';
// }


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
                                <h2><?= !empty($dados) ? 'Alterar Questão' : 'Cadastro de Questões' ?></h2>
                                <p><?= !empty($dados)
                                        ? 'Aqui você pode alterar os dados da questão'
                                        : 'Aqui você pode cadastrar todas as suas questões' ?>
                                </p>
                            </div>
                        </div>

                        <form id="formQuestao" onsubmit="return false;">
                            <input type="hidden" id="id_questao" value="<?= $dados['id'] ?? '' ?>">

                            <div class="form-group-settings">
                                <label>Disciplina</label>
                                <select id="disciplina_id"
                                    class="settings-select obg"
                                    onchange="CarregarConteudos()">

                                    <option value="">
                                        Selecione uma disciplina
                                    </option>

                                    <?php foreach ($disciplinas as $d) { ?>

                                        <option value="<?= $d['id'] ?>"
                                            <?= ($dados['disciplina_id'] ?? 0) == $d['id']
                                                ? 'selected'
                                                : '' ?>>

                                            <?= $d['nome_disciplina'] ?>

                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                            <div class="form-group-settings">
                                <label>Conteúdo</label>
                                <select id="conteudo_id"
                                    class="settings-select obg">

                                    <option value="">
                                        Selecione um conteúdo
                                    </option>

                                </select>

                            </div>

                            <div class="form-group-settings">
                                <label>Nível</label>
                                <select id="nivel" class="settings-select obg">
                                    <option value="" <?= ($dados['nivel'] ?? '') == '' ? 'selected' : '' ?>>Selecione</option>
                                    <option value="facil" <?= ($dados['nivel'] ?? '') == 'facil' ? 'selected' : '' ?>>Fácil</option>
                                    <option value="medio" <?= ($dados['nivel'] ?? '') == 'medio' ? 'selected' : '' ?>>Médio</option>
                                    <option value="dificil" <?= ($dados['nivel'] ?? '') == 'dificil' ? 'selected' : '' ?>>Difícil</option>
                                </select>
                            </div>

                            <div class="form-group-settings full-width">
                                <label>Enunciado</label>
                                <textarea id="enunciado"><?= $dados['enunciado'] ?? '' ?></textarea>
                            </div>

                            <div id="alternativas">

                                <?php if (!empty($dados['alternativas'])) { ?>

                                    <?php foreach ($dados['alternativas'] as $alt) { ?>

                                        <div class="alternativa-item glass-card-card" style="margin-top:10px; padding:10px;">

                                            <div style="display:flex; align-items:center; gap:10px;">

                                                <input type="radio" name="correta_grupo"
                                                    <?= $alt['correta'] ? 'checked' : '' ?>>

                                                <input type="text" class="input-alternativa"
                                                    value="<?= $alt['texto'] ?>">

                                                <button type="button" class="btn btn-danger"
                                                    onclick="removerAlternativa(this)">
                                                    X
                                                </button>

                                            </div>

                                        </div>

                                    <?php } ?>

                                <?php } ?>

                            </div>

                            <div style="margin-top:15px;">
                                <button type="button" onclick="addAlternativa()" class="btn btn-secondary">
                                    + Alternativa
                                </button>

                                <button type="button"
                                    onclick="<?= !empty($dados)
                                                    ? 'AlterarQuestao(' . $dados['id'] . ')'
                                                    : 'CadastrarQuestao(\'formQuestao\')' ?>">
                                    Salvar
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

    <script src="../../Resource/ajax/disciplina_ajax.js"></script>
    <script src="../../Resource/ajax/questao_ajax.js"></script>
    <!-- TemplateMo 607 Glass Admin -->
    <script>
        $(document).ready(function() {

            let disciplina = $("#disciplina_id").val();

            if (disciplina != "") {

                CarregarConteudos(
                    <?= $dados['conteudo_id'] ?? 0 ?>
                );
            }
        });
    </script>
</body>

</html>