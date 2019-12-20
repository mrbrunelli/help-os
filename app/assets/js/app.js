// PARAMETRO PARA INICIAR O JQUERY 
$(document).ready(function() {
    $('#telefone').mask('(00) 0 0000-0000')
    $('#custohora').mask("#.##0,00", { reverse: true })
    $('#dd').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    })
})

//FUNÇÃO DO SCROLL SUAVE
$(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {

        var target = $(this.hash);

        if (target.length) {
            $('html, body').animate({ scrollTop: target.offset().top }, 500)
            return false;
        }

    })
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

const modalTicket = (idticket, titulo) => {
    $('#modalTicket').modal('show')
    $('#conteudoTicket').load(`../../backend/elements.php?element=conteudoTicket&idticket=${idticket}`)
    $('#titulo-ticket').html(titulo)
}


const limit = (val) => {
    $('#countCaracter').html(val.length)
}