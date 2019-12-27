<?php
if ($_SESSION['UsuarioTipo'] == '1') {
  echo ' <script> window.location.href="index.php?pg=tickets" </script> ';
}
?>

<script>
  window.onload = () => conteudoGerencial()


  setInterval(function() {
    conteudoGerencial()
  }, 10000)

</script>

<div class="container mb-5" id="conteudoGerencial">

</div>