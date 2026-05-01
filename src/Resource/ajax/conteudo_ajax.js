function GravarConteudo(formID) {

    if (NotificarCampos(formID)) {

        let dados = {

            btn_salvar: "ajx",

            titulo: $("#titulo").val(),

            descricao: $("#descricao").val(),

            disciplina_id: $("#disciplina_id").val(),

            status: $("#status").is(":checked") ? 1 : 0
        };

        $.ajax({

            beforeSend: function () {
                Load();
            },

            type: 'post',

            url: BASE_URL_DATAVIEW('conteudo_dataview'),

            data: dados,

            success: function (ret) {

                MostrarMensagem(ret);

                LimparNotificacoes(formID);

                document.getElementById(formID).reset();

            },

            complete: function () {
                RemoverLoad();
            }

        });

    }

    return false;
}

function AlterarConteudo(formID) {

    if (NotificarCampos(formID)) {

        let dados = {

            id: $("#id_conteudo").val(),

            btn_alterar: "ajx",

            titulo: $("#titulo").val(),

            descricao: $("#descricao").val(),

            disciplina_id: $("#disciplina_id").val(),

            status: $("#status").is(":checked") ? 1 : 0
        };

        $.ajax({

            beforeSend: function () {
                Load();
            },

            type: 'post',

            url: BASE_URL_DATAVIEW('conteudo_dataview'),

            data: dados,

            success: function (ret) {

                MostrarMensagem(ret);

                setTimeout(function () {
                    window.location.href = "consultar_conteudo.php";
                }, 1000);

            },

            complete: function () {
                RemoverLoad();
            }

        });

    }

    return false;
}

function IrParaAlterarConteudo(id) {
    window.location.href = "cadastro_conteudo.php?id=" + id;
}

function ConfirmarExclusao() {

    let id = $("#id_excluir").val();

    $.ajax({

        beforeSend: function () {
            Load();
        },

        type: 'post',

        url: BASE_URL_DATAVIEW('conteudo_dataview'),

        data: {
            id: id,
            btn_excluir: 'ajx'
        },

        success: function (ret) {

            MostrarMensagem(ret);

            $("button[onclick*='(" + id + ")']")
                .closest("tr")
                .fadeOut();

            setTimeout(function () {
                FecharModal("modal-excluir");
            }, 300);

        },

        complete: function () {
            RemoverLoad();
        }

    });
}