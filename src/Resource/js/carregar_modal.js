function CarregarExcluir(id, nome) // Nesse caso precisamos de dois parametros o id e nome
{
    $("#id_excluir").val(id); // Preenche o campo hidden do modal de exclusão com o ID do item
    $("#nome_excluir").html(nome)  // Insere o nome do item dentro de um elemento (por exemplo, <span> ou <div>) no modal
}

function CarregarDescarte(id, nome) 
{
    $("#id_descarte").val(id); 
    $("#nome_descarte").html(nome) 
}

function CarregarDescarteInfo(data, nome, motivo) 
{   // Coloque os id da modal, não precisa seguir a ordem
    $("#data_descarte_info").val(data); 
    $("#nome_descarte_info").html(nome);
    $("#motivo_info").html(motivo)  
}

function CarregarTipoEquipamento(id, nome) 
{
    $("#tipo_alterar").val(nome); //  Preenche o input de texto com o nome do tipo de equipamento
    $("#id_alterar").val(id);
    
}

function CarregarModeloEquipamento(id, nome) 
{
    $("#modelo_alterar").val(nome); // .val é para input
    $("#id_alterar").val(id);
    
}
// Preciso disso para alterar o setor, por algum motivo as outras opções que tenho não funcionam para carregar, algo haver com <select>
function CarregarSetor(id, nome){
    $("#id_alterar").val(id);
    $("#setor_alterar").val(nome);
}