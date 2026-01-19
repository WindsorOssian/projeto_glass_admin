<!-- Top Navbar -->
<nav class="navbar">
    <?php if (!empty($tituloPagina)) : ?>
        <h1 class="page-title"><?= $tituloPagina ?></h1>
    <?php endif; ?>
    
    <div class="navbar-right">
        <div class="contact-support">
            <a href="mailto:iraceles@gmail.com?subject=Suporte%20ID%20Concursos&body=Olá,%20preciso%20de%20ajuda."
                title="Entrar em contato por e-mail">

                <i class="fa-regular fa-at"></i>
                Dúvidas? Entre em contato com o suporte
            </a>
        </div>
        <!-- <button class="nav-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                        </svg>
                        <span class="notification-dot"></span>
                    </button> -->
        <button class="nav-btn" id="theme-toggle" title="Toggle Light/Dark Mode">
            <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="4" />
                <path d="M12 2v2" />
                <path d="M12 20v2" />
                <path d="M4.93 4.93l1.41 1.41" />
                <path d="M17.66 17.66l1.41 1.41" />
                <path d="M2 12h2" />
                <path d="M20 12h2" />
                <path d="M6.34 17.66l-1.41 1.41" />
                <path d="M19.07 4.93l-1.41 1.41" />
            </svg>
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: none;">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
            </svg>
        </button>
    </div>
</nav>