function BASE_URL_DATAVIEW(dataview) { // Função para retornar o caminho, igual quando fez a PATH
    return '../../Resource/dataview/' + dataview + '.php';

}

// function BASE_PATH() {
//     return "http://localhost/projeto_glass_admin/src/View/";

// }

function LimparNotificacoes(formID) {
    $("#" + formID + " input, #" + formID + " textarea, #" + formID + " select").each(function () {
        $(this).val('');// Limpar campos (O item da vez = this e val = valor e deixar '' vazio)
        $(this).removeClass("is-invalid").removeClass("is-valid");

    });

}

function NotificarCampos(formID) {
    // console.log("FormID recebido =", formID);

    let ret = true;

    // Usar o for it no Js utilizando o Jquery   Seria- "Hasteg" + FormId + "Input,"    each do foreach
    // Um erro comum é esquecer do espaços entre as palavras, segue o exemplo:
    // $("#" + formID + "*espaço*input, #" + formID + "*espaço*textarea, #" + formID + "*espaço*select")
    $("#" + formID + " input, #" + formID + " textarea, #" + formID + " select").each(function () {

        if ($(this).hasClass("obg")) { // Class customizada

            if ($(this).val() == "") {
                ret = false;
                $(this).addClass("is-invalid");
            } else {
                $(this).removeClass("is-invalid").addClass("is-valid");
            }

        }
    });
    if (!ret)
        MostrarMensagem(0);
    return ret;


}

// function Load() {
//     $(".loader").addClass("is-active");
// }

// function RemoverLoad() {
//     $(".loader").removeClass("is-active");
// }

let tempoMinimo = 800; // pode aumentar pra 800~1200 se quiser mais suave
let inicioLoad = 0;

function Load() {
    inicioLoad = Date.now();
    $("#loader").addClass("is-active");
}

function RemoverLoad() {
    let tempoAtual = Date.now();
    let tempoPassado = tempoAtual - inicioLoad;

    let restante = tempoMinimo - tempoPassado;

    setTimeout(() => {
        $("#loader").removeClass("is-active");
    }, restante > 0 ? restante : 0);
}

function AbrirModalExcluir(id, nome) {
    $("#id_excluir").val(id);
    $("#nome_excluir").text(nome);

    $("#modal-excluir").addClass("is-active");
}

function FecharModal(id) {
    $("#" + id).removeClass("is-active");
}

// function IrParaAlterar(id) {
//     window.location.href = "cadastro_perguntas.php?id=" + id;
// }

// function IrParaAlterarConteudo(id) {
//     window.location.href = "cadastro_conteudo.php?id=" + id;
// }