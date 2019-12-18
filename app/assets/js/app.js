// PARAMETRO PARA INICIAR O JQUERY 
$(document).ready(function() {
    $('#telefone').mask('(00) 0 0000-0000')
    $('#custohora').mask("#.##0,00", { reverse: true })
})

const validasenha = (senha) => {
    let senha1 = $('#senha').val()
    if (senha == senha1) {
        $('#check').css("display", "block")
        $('#times').css("display", "none")
    } else {
        $('#check').css("display", "none")
        $('#times').css('display', 'block')
    }
}

const editaUsuario = () => {
    $('#modalUsuarios').modal('show');
    $('#add-usuario').modal('hide');
    $('#conteudoUsuarios').load('../../backend/elements.php?element=tabela_usuarios');
}


const editar = (idusuario, nome, email, telefone, idtipousuario, identidade) => {
    $('#idusuario').val(idusuario);
    $('#nome').val(nome);
    $('#email').val(email);
    $('#telefone').val(telefone);
    $('#idtipousuario').val(idtipousuario);
    $('#identidade').val(identidade);
    $('#add-usuario').modal('show');
    $('#modalUsuarios').modal('hide');
}


const tipoUsuario = (tipo) => {

    tipo == 2 ? $('#div-foto').css('display', 'block') : $('#div-foto').css('display', 'none')
    tipo == 2 ? $('#div-custohora').css('display', 'block') : $('#div-custohora').css('display', 'none')
    tipo == 2 ? $('#div-telefone').css('display', 'none') : $('#div-telefone').css('display', 'block')

}