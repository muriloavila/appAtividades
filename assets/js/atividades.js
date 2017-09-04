var base_url = "";
var objAtividades = {};
var DIV_TABELA = "#tabelaAtiv";

function read(){
  swal("Carregando");
  $.ajax({
      type: "GET",
      url: base_url + "index.php/Atividades/read",
      dataType: "json",
      cache:false,
      success:
           function(data){
             $.each(data, function(index, value){
               if($("#srcStatus option[value='"+value.status+"']").length <= 0){
                 $("#srcStatus").append($('<option>', { value: value.status, text: value.status }));
               }

               if($("#srcSituacao option[value='"+value.situacao+"']").length <= 0){
                 $("#srcSituacao").append($('<option>', { value: value.situacao, text: value.situacao }));
               }

               $(DIV_TABELA).append(montaLinha(value));
             });
             swal.close();
           }
       });// you have missed this bracket
  return false;
}

function montaLinha(atividade){
  var dtfim = atividade.dtfim == null ? "" : converteData(atividade.dtfim);
  var classe = atividade.idstatus == 4 ? "background-color: #00FF00" : "";

  var linha = "<tr position='"+atividade.idatividade+"' style='"+classe+"'>"+
                "<td>"+atividade.nome+"</td>"+
                "<td>"+atividade.descricao+"</td>"+
                "<td>"+converteData(atividade.dtinicio)+"</td>"+
                "<td>"+dtfim+"</td>"+
                "<td>"+atividade.status+"</td>"+
                "<td>"+atividade.situacao+"</td>"+
                "<td><input type='button' class='edit btn btn-link' onclick='edit("+atividade.idatividade+");' value='Editar' />"+
                    "<input type='button' class='delete btn btn-danger' onclick='deletar("+atividade.idatividade+");' value='-' /> </td>"+
            "</tr>";

  return linha;
}

function buscar() {
  var status = $("#srcStatus").val();
  var situacao = $("#srcSituacao").val();

  var data = {"status": status, "situacao": situacao};
  data = JSON.stringify(data);

  swal("Carregando");
  $.ajax({
      type: "GET",
      url: base_url + "index.php/Atividades/search",
      dataType: "json",
      data: {data},
      cache:false,
      success:
           function(retorno){
             $(DIV_TABELA).html("");
             $.each(retorno, function(index, value){
               $(DIV_TABELA).append(montaLinha(value));
             });
             swal.close();
           }
       });// you have missed this bracket
  return false;
}


function insert(){
  window.location = "adicionarAtividade";
}

function edit(idatividade) {
  window.location = "edicao?id="+idatividade;
}

function deletar(idatividade) {
  swal({
    title: "Confirmar Exclusão?",
    text: "Gostaria de Excluir a Atividade de nº "+idatividade+"!",
    type: "warning",
    showLoaderOnConfirm: true,
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim",
    cancelButtonText: "Não",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      $.ajax({
          type: "POST",
          url: base_url + "index.php/Atividades/delete",
          dataType: "json",
          data: {"dados":{"idatividade":idatividade}},
          cache:false,
          success:
               function(result){
                 if(result){
                  window.location = "index";
                 }
               }
           });// you have missed this bracket
      return false;
    } else {
      swal.close();
      return;
    }
  });
}


$( document ).ready(function() {
   base_url = $("#base_url").val();
   read();

   $("#add").on("click", function(){
     insert();
   });
});
