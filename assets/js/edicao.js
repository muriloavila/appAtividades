var base_url = "";
var objAtividade = {};
var blocked;

function read() {
  var idatividade = $("#id").val();

  $.ajax({
      type: "GET",
      url: base_url + "index.php/Atividades/readAtividade",
      dataType: "json",
      data:{"idatividade":idatividade},
      cache:false,
      success:
           function(data){
             if(data.idatividade != ""){
               $("#nome").val(data.nome);
               $("#descricao").val(data.descricao);
               $("#dataini").val(data.dtinicio);
               $("#datafim").val(data.dtfim);
               $("#cbStatus").val(data.idstatus);
               $("#"+data.situacao).prop("checked", true);

               if(data.blocked == true){
                  blocked = true;
                  $("#nome").prop('disabled', true);
                  $("#descricao").prop('disabled', true);
                  $("#dataini").prop('disabled', true);
                  $("#datafim").prop('disabled', true);
                  $("#cbStatus").prop('disabled', true);
                  $("input[type=radio]").prop('disabled', true);
               }
             }
           }
       });// you have missed this bracket
  return false;
}

function update() {
  if(blocked == true){
    swal("Erro", "Atividades com Status Concluído não podem ser alteradas", "error");
    return;
  }
  var nome = $("#nome").val();
  var descricao = $("#descricao").val();
  var optSituacao = $('input[name=optativo]:checked').val()
  var status = $("#cbStatus").val();
  var dataini = $("#dataini").val();
  var datafim = $("#datafim").val();

  if(nome == "" || nome == undefined){
    swal("Alerta","A Atividade necessita de um Nome", "warning");
    return;
  }

  if(descricao == "" || descricao == undefined){
    swal("Alerta","A Atividade necessita de uma Descrição","warning");
    return;
  }

  if(optSituacao == "" || optSituacao == undefined){
    swal("Alerta","A Atividade necessita de uma Situação","warning");
    return;
  }

  if(status == "" || status == undefined){
    swal("Alerta","A Atividade necessita de um Status","warning");
    return;
  }

  if(dataini == "" || dataini == undefined){
    swal("Alerta","A Atividade necessita de uma data de Inicio","warning");
    return;
  }


  var objAtividade = {"nome": nome, "descricao": descricao,
                      "situacao": optSituacao,
                      "status": status,
                      "dataini": dataini,
                      "datafim": datafim,
                      "idatividade": $("#id").val()};

  var data = JSON.stringify(objAtividade);

  $.ajax({
      type: "POST",
      url: base_url + "index.php/Atividades/editar",
      dataType: "json",
      data: {data},
      cache:false,
      success:
           function(result){
             swal({
                   title: "Sucesso",
                   text: "Atividade Alterada com Sucesso",
                   type: "success",
                   timer: 8000
                },
                function() {
                  window.location = "index";
                });
           }
       });// you have missed this bracket
  return false;
}

$( document ).ready(function() {
   base_url = $("#base_url").val();
   read();
});
