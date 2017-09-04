function adicionar() {
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
                      "datafim": datafim};

  var data = JSON.stringify(objAtividade);

  $.ajax({
      type: "POST",
      url: base_url + "index.php/Atividades/insert",
      dataType: "json",
      data: {data},
      cache:false,
      success:
           function(result){
             if(result == true){
               swal({
                     title: "Sucesso",
                     text: "Atividade Inserida com Sucesso",
                     type: "success",
                     timer: 8000
                  },
                  function() {
                    window.location = "index";
                  });
             }
           }
       });// you have missed this bracket
  return false;
}


$( document ).ready(function() {
   base_url = $("#base_url").val();
   console.log("OI");
});
