  <!-- MODAL DO CADASTRO DE USUARIOS -->
  <div class="modal fade" id="add-usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="">
          <div class="bg-dark text-light col-12 text-center">
            <h1 class="font-weight-light py-3">Cadastro de usuários <button type="button" class="btn float-right" onclick="editaUsuario()"><i class="fa fa-edit text-light fa-2x"></i></button></h1>
          </div>
        </div>
        <div class="modal-body">

          <!-- CADASTRO DE USUARIOS  -->
          <form name="cadastro" id="cadastro">
            <input type="hidden" id="idusuario" value="0">
            <div class="form-row">

              <div class="form-group col-md-6">
                <label for="tipo-usuario"><b>Tipo do usuário: </b></label>
                <select class="form-control" name="tipo-usuario" id="tipo-usuario">
                  <?php
                  foreach (DBRead('tipousuario') as $t) {
                    echo '<option value="' . $t['idtipousuario'] . '"> ' . $t['nome'] . ' </option>';
                  }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="entidade"><b>Entidade: </b></label>
                <select name="entidade" id="entidade" class="form-control">
                  <option selected>Gazin</option>
                </select>
              </div>

              <div class="form-group col-md-8">
                <label for="nome"><b>Nome: </b></label>
                <input type="text" class="form-control" id="nome">
              </div>

              <div class="form-group col-md-4" id="div-telefone">
                <label for="telefone"><b>Telefone: </b></label>
                <input type="tel" class="form-control" id="telefone">
              </div>

              <div class="form-group col-md-4" id="div-foto" style="display:none">
                <label for="foto"><b>Foto: </b></label>
                <input type="file" class="form-control" name="foto[]" id="foto">
                <small>Tamanho máximo: 500kb</small>
              </div>

              <div class="form-group col-md-4" id="div-custohora" style="display: none">
                <label for="custohora"><b>Custo/Hora: </b></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-dollar-sign text-success"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" id="custohora">
                </div>
              </div>

              <div class="form-group col-md-12">
                <label for="email"><b>Email: </b></label>
                <input type="email" class="form-control" id="email" placeholder="exemplo@exemplo.com.br">
              </div>

              <div class="form-group col-md-12">
                <label for="senha"><b>Senha: </b></label>
                <input type="password" class="form-control" id="senha">
              </div>

              <div class="form-group col-md-12">
                <label for="confirmasenha"><b>Confirmar senha: </b></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-check text-success" id="check" style="display: none;"></i>
                      <i class="fas fa-times text-danger" id="times" style="display: none;"></i>
                    </div>
                  </div>
                  <input type="password" class="form-control" id="confirmasenha" onkeyup="validasenha(this.value)">
                </div>
              </div>
              
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-light" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
          <button type="submit" class="btn btn-dark"><i class="far fa-check-circle"></i> Salvar</button>
        </div>
      </div>
    </div>
  </div>




  <!-- MODAL DO BOTAO ADD DA TABELA DE TICKETS  -->
  <div class="modal fade" id="adicionar" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="">
          <div class="bg-dark text-light col-12 text-center">
            <h1 class="font-weight-light py-3">Novo ticket</h1>
          </div>
        </div>
        <div class="modal-body">

          <div class="container">
            <form id="formTicket" action="../../backend/services.php?service=ticket" enctype="multipart/form-data" method="post">
              <!-- FORMULARIO DE TICKETS -->
              <div class="form-row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="idtipoticket"><b>Selecione o tipo: </b> </label>
                    <select name="idtipoticket" id="idtipoticket" class="form-control" required>
                      <option value=""></option>
                      <?php
                      foreach (DBRead('tipo_ticket') as $tipoticket) {
                        echo '<option value="' . $tipoticket['idtipoticket'] . '">' . $tipoticket['nome'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="idcategoriaticket"><b>Categoria: </b> </label>
                    <select name="idcategoriaticket" id="idcategoriaticket" class="form-control" required>
                      <option value=""></option>
                      <?php
                      foreach (DBRead('categoria_ticket') as $categoriaticket) {
                        echo '<option value="' . $categoriaticket['idcategoriaticket'] . '">' . $categoriaticket['nome'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="tituloticket"><b>Título: </b> </label>
                    <input type="text" class="form-control" name="tituloticket" id="tituloticket" required onkeyup="limit(this.value)" maxlength="40">
                    <small> <span id="countCaracter" class="font-weight-bold">0</span>/40</small>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="anexoticket"><b>Anexos: </b> </label>
                    <input type="file" name="anexoticket[]" multiple="multiple" id="anexoticket" class="form-control">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="descricaoticket"><b>Descrição: </b> </label>
                    <textarea class="form-control" rows="4" name="descricaoticket" id="descricaoticket"></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-light" data-dismiss="modal"><i class="far fa-times-circle"></i> Fechar</button>
                <button type="submit" class="btn btn-dark"><i class="far fa-check-circle"></i> Salvar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>







  <!-- MODAL QUE EXIBE O SELECT DOS USUARIOS CADASTRADOS  -->
  <div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="">
          <div class="bg-dark text-light col-12 text-center">
            <h1 class="font-weight-light py-3">Lista de Usuários</h1>
          </div>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="table-responsive" id="conteudoUsuarios">
                <!-- AQUI DENTRO CARREGA O SELECT DO BANCO E TRAS OS USUARIOS  -->
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-light" data-dismiss="modal"><i class="far fa-times-circle"></i> Fechar</button>
        </div>
      </div>
    </div>
  </div>




  <!-- MODAL MAIS DETALHES DO TICKET -->
  <div class="modal fade" id="modalTicket" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <!-- <div class="">
          <div class="bg-dark text-light col-12 text-center">
            <h1 class="font-weight-light py-3">Detalhes</h1>
          </div>
        </div> -->
        <div class="modal-body" id="conteudoTicket">

        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-light" data-dismiss="modal"><i class="far fa-times-circle"></i> Fechar</button>
        </div>
      </div>
    </div>
  </div>