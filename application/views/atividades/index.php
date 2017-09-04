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
    <script type="text/javascript" src="<?php echo base_url("assets/js/sweetalert.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/sweetalert-dev.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/functions.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/atividades.js"); ?>"></script>
  </head>
  <body>
    <div class="container">
      <h1>Atividades</h1>
      <label for="nome">Status</label>
      <div class="col-sm- selectContainer">
            <select class="form-control" id="srcStatus">
                <option value="">Buscar por Status</option>
            </select>
        </div>

      <label for="nome">Situação</label>
      <div class="col-sm- selectContainer">
            <select class="form-control" id="srcSituacao">
                <option value="">Buscar por Situação</option>
            </select>
        </div>

      <br />
      <input type="button" class="btn btn-primary" value="Buscar" onclick="buscar();" />
    </div>
    <br />
    <div class="container">

      <table class="table table-striped table-hover table-sm">
        <thead>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Data de Ínicio</th>
          <th>Data Final</th>
          <th>Status</th>
          <th>Situação</th>
          <th>Ação</th>
        </thead>

        <tbody id="tabelaAtiv">
        </tbody>

      </table>
      <input id="add" type="button" class="btn btn-success" value="Adicionar Nova Atividade" />
    </div>
    <input id="base_url" type="hidden" value="<?= base_url() ?>" />
  </body>
</html>
