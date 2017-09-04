<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery-ui.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery-ui.structure.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery-ui.theme.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/sweetalert.css"); ?>" />


    <!-- JS -->
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.1.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-ui.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/sweetalert-dev.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/functions.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/edicao.js"); ?>"></script>
  </head>
  <body>

    <div class="container">
      <h1>Editar Atividade</h1>
      <form>
        <div class="form-group">
          <label for="nome">Nome da Atividade</label>
          <input type="text" class="form-control" id="nome">
        </div>

        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" id="descricao">
        </div>

        <div class="form-group">
          <label for="dataini">Data Inicial</label>
          <input type="date" id="dataini" class="form-control">
        </div>

        <div class="form-group">
          <label for="datafim">Data Final</label>
          <input type="date" id="datafim" class="form-control">
        </div>

        <div class="form-group">
          <label>Situação</label><br/>
          <label class="radio-inline">
            <input type="radio" id="Ativo" value="ativo" name="optativo">Ativo
          </label>

          <label class="radio-inline">
            <input type="radio" id="Inativo" value="inativo" name="optativo">Inativo
          </label>
        </div>

        <div class="form-group">
          <label class="col-xs-3 control-label">Status</label>
          <div class="col-xs-5 selectContainer">
            <select class="form-control" name="size" id="cbStatus">
              <option value="">Selecione uma...</option>
              <option value="1">Pendente</option>
              <option value="2">Em Desenvolvimento</option>
              <option value="3">Em Teste</option>
              <option value="4">Concluído</option>
            </select>
          </div>
        </div>


        <button type="button" onclick="update();" class="btn btn-primary">Alterar Atividade</button>
      </form>
    </div>

    <input id="base_url" type="hidden" value="<?= base_url() ?>" />
    <input id="id" type="hidden" value="<?= $_GET['id'] ?>" />
  </body>
</html>
