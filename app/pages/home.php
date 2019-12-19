<script>
    window.onload = () => {
        meusTickets();
    }

    setInterval(function(){
        meusTickets();
        console.log('atualizado');
    },10000)

    const meusTickets = () => $('#meus-tickets').load('../../backend/elements.php?element=meustickets');
</script>


<div class="container conteudo shadow borda" style="padding-left:0 !important; padding-right:0 !important">
    <div class="table-responsive" id="meus-tickets">
    </div>
</div>

<?php
if (isset($_GET['r']) && $_GET['r'] == 'success') {
    echo '<script> toastr.success("Ticket incluido com sucesso!") </script>';
}
if (isset($_GET['r']) && $_GET['r'] == 'error') {
    echo '<script> toastr.error("Erro, contate o suporte.") </script>';
}

?>