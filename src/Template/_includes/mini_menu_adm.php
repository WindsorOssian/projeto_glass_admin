<?php
$paginaAtual = basename($_SERVER['PHP_SELF']);
?>

<div class="glass-card-card menu-fixo">
    <ul class="settings-nav">

        <!-- DISCIPLINA -->
        <li class="settings-nav-item">
            <a href="../../View/adm/cadastro_disciplinas.php"
               class="settings-nav-link <?= $paginaAtual == 'cadastro_disciplinas.php' ? 'active' : '' ?>">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>

                Cadastro de Disciplinas
            </a>
        </li>

        <li class="settings-nav-item">
            <a href="../../View/adm/consultar_disciplinas.php"
               class="settings-nav-link <?= $paginaAtual == 'consultar_disciplinas.php' ? 'active' : '' ?>">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a7.97 7.97 0 0 0 .1-6"/>
                </svg>

                Consultar Disciplinas
            </a>
        </li>

        <!-- CONTEÚDO -->
        <li class="settings-nav-item">
            <a href="../../View/adm/cadastro_conteudo.php"
               class="settings-nav-link <?= $paginaAtual == 'cadastro_conteudo.php' ? 'active' : '' ?>">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 20h9"/>
                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                </svg>

                Cadastro de Conteúdo
            </a>
        </li>

        <li class="settings-nav-item">
            <a href="../../View/adm/consultar_conteudo.php"
               class="settings-nav-link <?= $paginaAtual == 'consultar_conteudo.php' ? 'active' : '' ?>">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                    <path d="M7 8h10M7 12h6"/>
                </svg>

                Consultar Conteúdo
            </a>
        </li>

        <!-- QUESTÕES -->
        <li class="settings-nav-item">
            <a href="../../View/adm/cadastro_perguntas.php"
               class="settings-nav-link <?= $paginaAtual == 'cadastro_perguntas.php' ? 'active' : '' ?>">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18h6"/>
                    <path d="M10 22h4"/>
                    <path d="M12 2a7 7 0 0 0-4 12v2h8v-2a7 7 0 0 0-4-12Z"/>
                </svg>

                Cadastro de Questões
            </a>
        </li>

        <li class="settings-nav-item">
            <a href="../../View/adm/consultar_questoes.php"
               class="settings-nav-link <?= $paginaAtual == 'consultar_questoes.php' ? 'active' : '' ?>">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h10"/>
                </svg>

                Consultar Questões
            </a>
        </li>

    </ul>
</div>