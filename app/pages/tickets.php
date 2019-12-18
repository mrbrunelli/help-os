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
    font-weight: normal
  }
</style>


<div class="container-fluid">
  <div class="row">

    <div class="col-sm-4 ">
      <h2 class="text-center titulo"> PENDENTE </h2>
      <div class="box">
        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead class="dark">
              <tr>
                <td>INCLUSÃO</td>
                <td>TITULO</td>
                <td>SOLICITANTE</td>
                <td>OPÇÕES</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> <?= date('d/m/y H:i') ?> </td>
                <td> NOVO RELATÓRIO </td>
                <td> Luana Isabela</td>
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
                <td> MANUTENÇÃO PORTAL FATURAS </td>
                <td> FRANCIELE </td>
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
                <td> SQL RELATÓRIO SABIUM </td>
                <td> Marcos Utsunomiya </td>
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
      <h2 class="text-center titulo"> EM DESENVOLVIMENTO </h2>
      <div class="box">


        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead class="dark">
              <tr>
                <td>PRIORIDADE</td>
                <td>TITULO</td>
                <td>CATEGORIA</td>
                <td>OPÇÕES</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> ALTA </td>
                <td> APLICATIVO JORNADA </td>
                <td> Novo desenvolvimento </td>
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
      <h2 class="text-center titulo"> FINALIZADO </h2>
      <div class="box">



        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead class="dark">
              <tr>
                <td>SOLICITANTE</td>
                <td>TITULO</td>
                <td>LEAD-TIME</td>
                <td>CUSTO TOTAL</td>
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