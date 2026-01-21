<!-- jQuery
     Biblioteca base obrigatória.
     Deve vir ANTES de qualquer script que use Ajax ou manipulação de DOM -->
<script src="../../Template/plugins/jquery/jquery.min.js"></script>
<!-- Script principal do template Glass Admin
     Responsável por menus, animações e interações visuais -->
<script src="../../Template/dist/js/templatemo-glass-admin-script.js"></script>
<!-- Toastr
     Biblioteca de notificações (success, error, warning, info) -->
<script src="../../Template/plugins/toastr/toastr.min.js"></script>
<!-- Mensagens do sistema
     Centraliza mensagens padrão usando Toastr -->
<script src="../../Resource/js/mensagem.js"></script>
<!-- Funções globais do projeto
     Contém funções reutilizáveis (Ajax, validações, helpers, etc.) -->
<script src="../../Resource/js/funcoes.js"></script>


<!-- Ordem dos scripts
1️⃣ jQuery
2️⃣ Script do template
3️⃣ Plugins que dependem de jQuery (Toastr)
4️⃣ Seus JS (mensagens, funções)
5️⃣ JS específico da página (Ajax) -->