function converteData(data) {
  var data=new Date()
  var dia=data.getDate();
  var mes=data.getMonth();
  var ano=data.getFullYear();
  data = dia + '/' + (mes++) + '/' + ano;
  return data;
}
