function MostrarMensagem(ret) {
    // console.log(ret);  comando para testar o console na pagina anônima

    // Porém com '' nos case gera um problema no php, para corrigir utilizamos o if
    if (ret == 1) {
        toastr.success('Ação realizada com sucesso.');
    } else if (ret == 0) {
        toastr.warning('Preencher os campos obrigatórios.');
    } else if (ret == -1) {
        toastr.error('Ocorreu um erro na operação.');
    } else if (ret == -2) {
        toastr.error('CEP não encontrado.');
    } else if (ret == -3) {
        toastr.error('Formato de CEP inválido.');
    } else if (ret == -4) {
        toastr.error('CPF inválido.');
    } else if (ret == -5) {
        toastr.error('E-MAIL inválido.');
    } else if (ret == -6) {
        toastr.error('E-MAIL já cadastrado.');
    } else if (ret == -7) {
        toastr.info('Nenhum resultado encontrado.');
    } else if (ret == -8) {
        toastr.error('Usuário não encontrado!');
    } else if (ret == -9) {
        toastr.error('CPF já cadastrado.');
    } else if (ret == -10) {
        toastr.error('O nome não pode conter números.');
    } else if (ret == -11) {
        toastr.error('O nome contém caracteres inválidos.');
    } else if (ret == -12) {
        toastr.error('O usuário não pode alterar o próprio status.');
    } else if (ret == -13) {
        toastr.error('O nome da Cidade não pode conter números.');
    } else if (ret == -14) {
        toastr.error('O nome da Cidade não pode conter caracteres especiais.');
    } else if (ret == -15) {
        toastr.error('O nome do Estado não pode conter números.');
    } else if (ret == -16) {
        toastr.error('O nome do Estado não pode conter caracteres especiais.');
    } else if (ret == -17) {
        toastr.error('O nome do Bairro não pode conter caracteres especiais.');
    } else if (ret == -18) {
        toastr.error('O nome da Rua não pode conter caracteres especiais.');
    } else if (ret == -19) {
        toastr.error('Senha incorreta.');
    } else if (ret == -20) {
        toastr.warning('Preencher a senha com no mínimo 6 caracteres.');
    } else if (ret == -21) {
        toastr.warning('A NOVA SENHA e REPETIR SENHA não conferem!');
    } else if (ret == -22) {
        toastr.warning('A nova senha não pode ser igual à senha atual.');
    }








}



// switch (ret) {
//     case '-1':
//         toastr.error('Ocorreu um erro na operação.')
//         break;

//     case '0':
//         toastr.warning('Preencher os campos obrigatórios.')
//         break;

//     case '1': // Precisa colocar entre '' por o echo le como string caso não tenha
//         toastr.success('Ação realizada com sucesso.')
//         break;
// }