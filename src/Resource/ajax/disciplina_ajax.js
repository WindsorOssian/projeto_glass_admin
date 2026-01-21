function GravarDisciplina(formID) {
    
    if (NotificarCampos(formID)) {

        let nome = $("#nome_disciplina").val();
        let descricao = $("#descricao_disciplina").val();
        let status = $("#status_disciplina").is(":checked") ? 1 : 0;

        $.ajax({
            beforeSend: function () {
                Load();
            },
            type: 'post',
            url: BASE_URL_DATAVIEW('disciplina_dataview'),
            data: {
                btn_salvar: 'ajx',
                nome_disciplina: nome,
                descricao_disciplina: descricao,
                status_disciplina: status
            },
            success: function (ret) {
                MostrarMensagem(ret); // Padronização do projeto, facíl manutenção
                // ConsultarDisciplina();     // Chama a função para atualizar quando cadastrar
                LimparNotificacoes(formID);
                document.getElementById(formID).reset(); // Serve para limpar o formulário inteiro e voltar ao estado inicial.

            },
            complete: function () {
                RemoverLoad();
            }

        })

    }

    return false;
}