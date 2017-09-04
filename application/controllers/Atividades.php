<?php
  header('Access-Control-Allow-Origin: *');

  defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   *
   */
  class Atividades extends CI_Controller
  {

    public function index()
    {
      $this->load->view("atividades/index.php");
    }

    public function read()
    {
      $this->load->database();
      $this->load->model("Atividades_model");
      $atividades = $this->Atividades_model->readAll();

      echo json_encode($atividades);
    }

    public function adicionarAtividade()
    {
      $this->load->view("atividades/nova.php");
    }

    public function insert()
    {
      $dados = $_POST['data'];
      $dados = json_decode($dados, true);
      if(empty($dados['nome'])){ die(array('response' => "error", "message" => "Obrigatorio ter um nome na Atividade"));}

      if(empty($dados['descricao'])){ die(array('response' => "error", "message" => "Obrigatorio ter uma descrição na Atividade"));}

      if(empty($dados['dataini'])){ die(array('response' => "error", "message" => "Obrigatorio ter uma data de inicio"));}

      if(empty($dados['status'])){ die(array('response' => "error", "message" => "Obrigatorio ter um Status"));}

      if(empty($dados['situacao'])){ die(array('response' => "error", "message" => "Obrigatorio ter uma Situação"));}

      if($dados['status'] == 4){
        if(empty($dados['datafim'])){
          die(json_encode(array('response' => "error", "message" => "Para o Status Concluído é necessário ter uma Data Final para a Atividade")));
        }
      }

      switch (strtoupper($dados['situacao'])) {
        case 'ATIVO':
          # code...
          $dados['situacao'] = 'Ativo';
          break;

        case 'INATIVO':
          # code...
          $dados['situacao'] = "Inativo";
          break;

        default:
          die(array('response' => "error", "message" => "Necessário ter uma Situação Válida"));
        break;
      }

      $data = array(
        'nome' => $dados['nome'],
        'descricao' => $dados['descricao'],
        'dtinicio' => $dados['dataini'],
        'dtfim' => empty($dados['datafim']) ? null : $dados['datafim'],
        'idstatus' => (int)$dados['status'],
        'situacao' => $dados['situacao']
      );

      $this->load->database();
      $this->load->model("Atividades_model");

      $result = $this->Atividades_model->insert($data);
      echo json_encode($result);
      die();
    }

    public function edicao()
    {
      $this->load->view("atividades/edicao");
    }

    public function readAtividade()
    {
      $idatividade = $_GET['idatividade'];
      $this->load->database();
      $this->load->model("Atividades_model");
      $atividade = $this->Atividades_model->read($idatividade);

      if($atividade[0]['idstatus'] == 4){
        $atividade[0]['blocked'] = true;
      }
      echo json_encode($atividade[0]);
    }

    public function editar()
    {
      $dados = $_POST['data'];


      $dados = json_decode($dados, true);
      if(empty($dados['nome'])){ die(json_encode(array('response' => "error", "message" => "Obrigatorio ter um nome na Atividade")));}

      if(empty($dados['descricao'])){ die(json_encode(array('response' => "error", "message" => "Obrigatorio ter uma descrição na Atividade")));}

      if(empty($dados['dataini'])){ die(json_encode(array('response' => "error", "message" => "Obrigatorio ter uma data de inicio")));}

      if(empty($dados['status'])){ die(json_encode(array('response' => "error", "message" => "Obrigatorio ter um Status")));}

      if(empty($dados['situacao'])){ die(json_encode(array('response' => "error", "message" => "Obrigatorio ter uma Situação")));}

      if($dados['status'] == 4){
        if(empty($dados['datafim'])){
          die(json_encode(json_encode(array('response' => "error", "message" => "Para o Status Concluído é necessário ter uma Data Final para a Atividade"))));
        }
      }


      switch (strtoupper($dados['situacao'])) {
        case 'ATIVO':
          # code...
          $dados['situacao'] = 'Ativo';
          break;

        case 'INATIVO':
          # code...
          $dados['situacao'] = "Inativo";
          break;

        default:
          die(array('response' => "error", "message" => "Necessário ter uma Situação Válida"));
        break;
      }

      $data = array(
        'nome' => $dados['nome'],
        'descricao' => $dados['descricao'],
        'dtinicio' => $dados['dataini'],
        'dtfim' => empty($dados['datafim']) ? null : $dados['datafim'],
        'idstatus' => (int)$dados['status'],
        'situacao' => $dados['situacao']
      );

      $this->load->database();
      $this->load->model("Atividades_model");
      $result = $this->Atividades_model->update($data, $dados['idatividade']);

      echo json_encode($result);
      die();
    }

    public function delete()
    {
      $idatividade = $_POST['dados']['idatividade'];

      $this->load->database();
      $this->load->model("Atividades_model");
      $result = $this->Atividades_model->delete($idatividade);

      die(json_encode($result));
    }

    public function search()
    {
      $dados = $_GET['data'];
      $dados = json_decode($dados, true);
      $status = $dados['status'];
      $situacao = $dados['situacao'];
      $this->load->database();
      $this->load->model("Atividades_model");
      $atividades = $this->Atividades_model->search($status, $situacao);

      echo json_encode($atividades);
    }
  }

?>
