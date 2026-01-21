function BASE_URL_DATAVIEW(dataview) { // Função para retornar o caminho, igual quando fez a PATH
    return '../../Resource/dataview/' + dataview + '.php';

}

// function BASE_PATH() {
//     return "http://localhost/ControleOs/src/View/adm/";

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

function Load() {
    $(".loader").addClass("is-active");
}

function RemoverLoad() {
    $(".loader").removeClass("is-active");
}