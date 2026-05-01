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

function AlterarDisciplina(formID) {

    if (NotificarCampos(formID)) {

        let id = $("#id_disciplina").val(); // Precisa ter o id hidden para alterar
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
                id_disciplina: id,
                btn_alterar: 'ajx',
                nome_disciplina: nome,
                descricao_disciplina: descricao,
                status_disciplina: status
            },
            success: function (ret) {
                MostrarMensagem(ret);

                LimparNotificacoes(formID);

                // 🔥 REDIRECIONAMENTO
                setTimeout(function () {
                    window.location.href = "consultar_disciplinas.php";
                }, 1000); // pequeno delay pra mostrar a mensagem
            },
            complete: function () {
                RemoverLoad();
            }

        })

    }

    return false;
}

function IrParaAlterar(id) {
    window.location.href = "cadastro_disciplinas.php?id=" + id;
}

function ConfirmarExclusao() {

    let id = $("#id_excluir").val();

    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('disciplina_dataview'),
        data: {
            id_disciplina: id,
            btn_excluir: 'ajx'
        },
        success: function (ret) {
            MostrarMensagem(ret);

            $("button[onclick*='(" + id + ")']").closest("tr").fadeOut();

            // 🔥 fecha com delay leve (melhor UX)
            setTimeout(function () {
                FecharModal("modal-excluir");
            }, 300);
        },
        complete: function () {
            RemoverLoad();
        }
    });
}