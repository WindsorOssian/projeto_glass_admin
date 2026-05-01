<div class="modal" id="modal-excluir">
    <div class="modal-dialog">
        <div class="modal-content modal-glass-danger">

            <div class="modal-header">
                <h4 class="modal-title">⚠️ Confirmação de remoção</h4>
                <button type="button" class="close" onclick="FecharModal('modal-excluir')">
                    &times;
                </button>
            </div>

            <div class="modal-body">

                <input type="hidden" id="id_excluir">

                <p>Deseja remover o item:</p>
                <strong id="nome_excluir"></strong>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancelar"
                    onclick="FecharModal('modal-excluir')">
                    Cancelar
                </button>

                <button type="button" class="btn-excluir"
                    onclick="ConfirmarExclusao()">
                    Excluir
                </button>
            </div>

        </div>
    </div>
</div>