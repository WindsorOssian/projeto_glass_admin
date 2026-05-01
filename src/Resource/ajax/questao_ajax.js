function CadastrarQuestao(formID) {

    if (!NotificarCampos(formID))
        return;

    let alternativas = [];
    let erro = false;

    let corretaIndex = $("input[name=correta_grupo]:checked")
        .closest(".alternativa-item")
        .index();

    $(".alternativa-item").each(function (i) {

        let texto = $(this).find(".input-alternativa").val();

        if (texto.trim() == "") {

            MostrarMensagem("Preencha todas as alternativas");
            erro = true;
            return false;
        }

        alternativas.push({
            texto: texto,
            correta: (i == corretaIndex) ? 1 : 0
        });
    });

    if (erro)
        return;

    if ($("#enunciado").val().trim() == "") {

        MostrarMensagem("Digite o enunciado");
        return;
    }
    
    if (alternativas.length < 2) {

        MostrarMensagem("Adicione pelo menos 2 alternativas");
        return;
    }

    if (corretaIndex < 0) {

        MostrarMensagem("Selecione a alternativa correta");
        return;
    }

    $.ajax({

        beforeSend: function () {
            Load();
        },

        type: 'post',

        url: BASE_URL_DATAVIEW('questao_dataview'),

        data: {

            btn_salvar: 'ajx',
            enunciado: $("#enunciado").val(),
            nivel: $("#nivel").val(),
            conteudo_id: $("#conteudo_id").val(),
            alternativas: JSON.stringify(alternativas)
        },

        success: function (ret) {

            MostrarMensagem(ret);

            if (ret == 1) {

                $("#" + formID)[0].reset();
                $("#alternativas").html('');
            }
        },

        complete: function () {
            RemoverLoad();
        }
    });
}

function AlterarQuestao(id) {

    let alternativas = [];

    let corretaIndex = $("input[name=correta_grupo]:checked")
        .closest(".alternativa-item")
        .index();

    $(".alternativa-item").each(function (i) {

        alternativas.push({

            texto: $(this).find(".input-alternativa").val(),
            correta: (i == corretaIndex) ? 1 : 0
        });
    });

    $.ajax({

        beforeSend: function () {
            Load();
        },

        type: 'post',

        url: BASE_URL_DATAVIEW('questao_dataview'),

        data: {

            btn_alterar: 'ajx',
            id: id,
            enunciado: $("#enunciado").val(),
            nivel: $("#nivel").val(),
            conteudo_id: $("#conteudo_id").val(),
            alternativas: JSON.stringify(alternativas)
        },

        success: function (ret) {

            MostrarMensagem(ret);

            if (ret == 1) {

                setTimeout(function () {

                    window.location.href = "consultar_questoes.php";

                }, 1000);
            }
        },

        complete: function () {
            RemoverLoad();
        }
    });
}

function ConfirmarExclusao() {

    let id = $("#id_excluir").val();

    $.ajax({

        beforeSend: function () {
            Load();
        },

        type: 'post',

        url: BASE_URL_DATAVIEW('questao_dataview'),

        data: {

            btn_excluir: 'ajx',
            id: id
        },

        success: function (ret) {

            MostrarMensagem(ret);

            if (ret == 1) {

                $("button[onclick*='(" + id + ")']")
                    .closest("tr")
                    .fadeOut();

                setTimeout(function () {

                    FecharModal("modal-excluir");

                }, 300);
            }
        },

        complete: function () {
            RemoverLoad();
        }
    });
}

function addAlternativa() {

    let total = $(".alternativa-item").length;

    if (total >= 5) {

        MostrarMensagem("Máximo de 5 alternativas");
        return;
    }

    let html = `
    
    <div class="alternativa-item glass-card-card"
         style="margin-top:10px; padding:10px;">

        <div style="display:flex; align-items:center; gap:10px;">

            <input type="radio" name="correta_grupo">

            <input type="text"
                   class="input-alternativa obg"
                   placeholder="Digite a alternativa"
                   style="flex:1;">

            <button type="button"
                    class="btn btn-danger"
                    onclick="removerAlternativa(this)">
                X
            </button>

        </div>

    </div>
    `;

    $("#alternativas").append(html);
}

function removerAlternativa(btn) {

    $(btn).closest(".alternativa-item").remove();
}

function IrParaAlterarQuestao(id) {

    window.location.href = "cadastro_perguntas.php?id=" + id;
}


function CarregarConteudos(conteudoSelecionado = 0) {

    let disciplina = $("#disciplina_id").val();

    $("#conteudo_id").html(
        '<option value="">Carregando...</option>'
    );

    $.ajax({

        url: BASE_URL_DATAVIEW('questao_dataview'),

        type: 'POST',

        data: {
            buscar_conteudos: 'ajx',
            disciplina_id: disciplina
        },

        success: function (ret) {

            let dados = JSON.parse(ret);

            let html =
                '<option value="">Selecione</option>';

            dados.forEach(function (item) {

                let selected =
                    item.id == conteudoSelecionado
                        ? 'selected'
                        : '';

                html += `
    <option value="${item.id}" ${selected}>
                        ${item.titulo}
                    </option>
                `;
            });

            $("#conteudo_id").html(html);
        }
    });
}