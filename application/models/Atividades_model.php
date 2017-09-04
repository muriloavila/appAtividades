<?php

  /**
   *
   */
  class Atividades_model extends CI_Model
  {

    public function readAll()
    {
      $sql = "select a.*, s.nome as status from atividade a, status s where a.idstatus = s.idstatus";
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function insert($data)
    {
      try {
        return $this->db->insert('atividade', $data);
        // $this->db->last_query();
      } catch (Exception $e) {
        return $e->getMessage();
      }

    }

    public function read($idatividade)
    {
      if(empty($idatividade)){
        return false;
      }

      $sql = "SELECT * FROM atividade WHERE idatividade = {$idatividade}";

      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function search($status, $situacao)
    {
      $sql = "select a.*, s.nome as status from atividade a, status s where a.idstatus = s.idstatus
              AND s.nome LIKE '%{$status}%'
              AND a.situacao LIKE '%{$situacao}%'";

      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function update($data, $idatividade)
    {
      $this->db->where('idatividade', $idatividade);
      return $this->db->update('atividade', $data);
    }

    public function delete($idatividade)
    {
      $this->db->where('idatividade', $idatividade);
      return $this->db->delete('atividade');
    }
  }




?>
