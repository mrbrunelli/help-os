<style>
  .box {
    box-shadow: black 1px 1px 3px;
    border-radius: 2px;
    min-height: 400px
  }

  .container {
    padding-bottom: 50px
  }

  .dark {
    background: #343a40;
    color: #fff;
    font-weight: bold
  }

  .titulo {
    font-weight: lighter;
  }
</style>


<div class="container-fluid">
  <div class="row">

    <div class="col-sm-4 ">
      <h2 class="text-center titulo"> Pendente </h2>
      <div class="box">
        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead class="dark">
              <tr>
                <td>Inclusão</td>
                <td>Título</td>
                <td>Solicitante</td>
                <td>Opções</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> <?= date('d/m/y H:i') ?> </td>
                <td>Novo relatório</td>
                <td>Luana Isabela</td>
                <td>
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                  <button class="btn btn-success" type="button">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <button class="btn btn-danger" type="button">
                    <i class="fa fa-thumbs-down"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td> <?= date('d/m/y H:i') ?> </td>
                <td>Manutenção portal faturas</td>
                <td>Franciele</td>
                <td>
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                  <button class="btn btn-success" type="button">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <button class="btn btn-danger" type="button">
                    <i class="fa fa-thumbs-down"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td> <?= date('d/m/y H:i') ?> </td>
                <td>SQL relatório Sabium</td>
                <td>Marcos Utsunomiya</td>
                <td>
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                  <button class="btn btn-success" type="button">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <button class="btn btn-danger" type="button">
                    <i class="fa fa-thumbs-down"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <h2 class="text-center titulo">Em desenvolvimento</h2>
      <div class="box">


        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead class="dark">
              <tr>
                <td>Prioridade</td>
                <td>Título</td>
                <td>Categoria</td>
                <td>Opções</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Alta</td>
                <td>Aplicativo Jornada</td>
                <td>Novo desenvolvimento</td>
                <td>
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                  <button class="btn btn-success" type="button">
                    <i class="fa fa-check"></i>
                  </button>
                  <button class="btn btn-danger" type="button">
                    <i class="fa fa-ban"></i>
                  </button>
                </td>
              </tr>

            </tbody>
          </table>
        </div>



      </div>
    </div>
    <div class="col-sm-4">
      <h2 class="text-center titulo">Finalizado</h2>
      <div class="box">



        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead class="dark">
              <tr>
                <td>Solicitante</td>
                <td>Título</td>
                <td>Lead-Time</td>
                <td>Custo total</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> ALTA </td>
                <td> SISTEMA JORNADA </td>
                <td> 67 HORAS </td>
                <td> R$ 900,00 </td>
              </tr>

            </tbody>
          </table>
        </div>






      </div>
    </div>
  </div>
</div>