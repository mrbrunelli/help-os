<div class="container-fluid mb-5">
  <div class="row justify-content-center">

    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="table-responsive p-4 bg-light shadow box">
        <div class="row">
          <div class="col-11">
            <h2 class="titulo">Pendente</h2>
          </div>
          <div class="col-1">
            <div class="dropdown">
              <a type="button" id="dropdownconfig" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownconfig">
                <h6 class="dropdown-header">Ações</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"><i class="far fa-share-square"></i> Compartilhar</a>
                <a class="dropdown-item"><i class="fas fa-print"></i> Imprimir</a>
                <a class="dropdown-item"><i class="fas fa-download"></i> Exportar</a>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-hover bg-white shadow">
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
                <div class="dropdown">
                  <a type="button" id="dropdownjoinha" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs fa-1em"></i>
                  </a>
                  <div class="dropdown-menu shadow" aria-labelledby="dropdownjoinha">
                    <a class="dropdown-item "><i class="fas fa-search"></i> Detalhes</a>
                    <a class="dropdown-item"><i class="far fa-thumbs-up"></i> Aceitar</a>
                    <a class="dropdown-item"><i class="far fa-thumbs-down"></i> Recusar</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td> <?= date('d/m/y H:i') ?> </td>
              <td>Manutenção portal faturas</td>
              <td>Franciele</td>
              <td>
                <div class="dropdown">
                  <a type="button" id="dropdownjoinha" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs fa-1em"></i>
                  </a>
                  <div class="dropdown-menu shadow" aria-labelledby="dropdownjoinha">
                    <a class="dropdown-item"><i class="fas fa-search"></i> Detalhes</a>
                    <a class="dropdown-item"><i class="far fa-thumbs-up"></i> Aceitar</a>
                    <a class="dropdown-item"><i class="far fa-thumbs-down"></i> Recusar</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td> <?= date('d/m/y H:i') ?> </td>
              <td>SQL relatório Sabium</td>
              <td>Marcos Utsunomiya</td>
              <td>
                <div class="dropdown">
                  <a type="button" id="dropdownjoinha" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs fa-1em"></i>
                  </a>
                  <div class="dropdown-menu shadow" aria-labelledby="dropdownjoinha">
                    <a class="dropdown-item"><i class="fas fa-search"></i> Detalhes</a>
                    <a class="dropdown-item"><i class="far fa-thumbs-up"></i> Aceitar</a>
                    <a class="dropdown-item"><i class="far fa-thumbs-down"></i> Recusar</a>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="table-responsive p-4 bg-light shadow box">
        <div class="row">
          <div class="col-11">
            <h2 class="titulo">Em desenvolvimento</h2>
          </div>
          <div class="col-1">
            <div class="dropdown">
              <a type="button" id="dropdownconfig" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownconfig">
                <h6 class="dropdown-header">Ações</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"><i class="far fa-share-square"></i> Compartilhar</a>
                <a class="dropdown-item"><i class="fas fa-print"></i> Imprimir</a>
                <a class="dropdown-item"><i class="fas fa-download"></i> Exportar</a>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-hover bg-white shadow">
          <thead class="dark">
            <tr>
              <td>Prioridade</td>
              <td>Título</td>
              <td>Previsão</td>
              <td>Opções</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Alta</td>
              <td>Aplicativo Jornada</td>
              <td>
                <div class="progress">
                  <div class="bg-dark progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <a type="button" id="dropdownjoinha" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs fa-1em"></i>
                  </a>
                  <div class="dropdown-menu shadow" aria-labelledby="dropdownjoinha">
                    <a class="dropdown-item"><i class="fas fa-search"></i> Detalhes</a>
                    <a class="dropdown-item"><i class="fas fa-check"></i> Concluído</a>
                    <a class="dropdown-item"><i class="fas fa-ban"></i> Cancelar</a>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="table-responsive p-4 bg-light shadow box">
        <div class="row">
          <div class="col-11">
            <h2 class="titulo">Finalizado</h2>
          </div>
          <div class="col-1">
            <div class="dropdown">
              <a type="button" id="dropdownconfig" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownconfig">
                <h6 class="dropdown-header">Ações</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"><i class="far fa-share-square"></i> Compartilhar</a>
                <a class="dropdown-item"><i class="fas fa-print"></i> Imprimir</a>
                <a class="dropdown-item"><i class="fas fa-download"></i> Exportar</a>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-hover bg-white shadow">
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
              <td>Franciele</td>
              <td>Sistema de jornada</td>
              <td>67 horas</td>
              <td>R$ 900,00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>