var zonas = [1000, 200, 25];

$(document).ready(function() {
  $('article.col.s4').each(function() {
    
    var entradas = +$(this).find('span#entr').text();
    var zona = $(this).attr('id');
    var totalEntradas;
    if (zona === "zonaPrinc") {
      totalEntradas = zonas[0];
    } else if (zona === "zonaComVen") {
      totalEntradas = zonas[1];
    } else if (zona === "zonaVIP") {
      totalEntradas = zonas[2];
    }
    
    var porcentajeVerde = (entradas * 100) / totalEntradas;
    var porcentajeRojo = 100 - porcentajeVerde;
    console.log(porcentajeVerde + ", " + porcentajeRojo);
    
    
    $(this).find('span.green').css('width', porcentajeVerde + '%').text(porcentajeVerde + "%");
    $(this).find('span.red').css('width', porcentajeRojo + '%');
  });
});