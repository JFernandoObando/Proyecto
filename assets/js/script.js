
//cargar funciones de grafica Highcharts
const chart = Highcharts.chart('ad', {
  data: {
    //llamar el id datatable del index
    table: 'datatable',
    switchRowsAndColumns: true
  },
  chart: {
    type: 'column'
  },
  title: {
    text: 'Gráfica'
  },
  exporting: {
    enabled: false,
    csv:{
      //delimitar el csv con punto y coma
      itemDelimiter: ';'
    }
  },
  yAxis: {
    allowDecimals: false,
    title: {
      text: 'Unidades'
    }
  },
 tooltip: {
    formatter: function () {
      return '<b>' + this.series.name + '</b><br/>' +
        this.point.y + ' ' + this.point.name.toLowerCase();
    }
  }
});

// llamada para exportar a pdf
 document.getElementById('botonpdf').addEventListener('click', () => {
    chart.exportChart({
      type: 'application/pdf',
      filename: 'grafica'
      
    });

  });

//llamada para exportar a png
  document.getElementById('botonpng').addEventListener('click', ()=> {
    chart.exportChart();
    console.log("sasdsa");
});

//llamada para exportar a csv
document.getElementById('botoncsv').addEventListener('click', ()=> {
  chart.downloadCSV();
  console.log("sasdsa");
});

//exportar por navbar
document.getElementById('botonpdf2').addEventListener('click', () => {
  chart.exportChart({
    type: 'application/pdf',
    filename: 'grafica'
    
  });

});

//exportar por navbar
document.getElementById('botonpng2').addEventListener('click', ()=> {
  chart.exportChart();
  console.log("sasdsa");
});

//exportar por navbar
document.getElementById('botoncsv2').addEventListener('click', ()=> {
chart.downloadCSV();
console.log("sasdsa");
});

//cambiar la grafica a plano
document.getElementById('plain').addEventListener('click', () => {
  chart.update({
      chart: {
          inverted: false,
          polar: false
      },
      subtitle: {
          text: 'Plain'
      }
  });
});

//cambiar la grafica a plano invertido
document.getElementById('inverted').addEventListener('click', () => {
  chart.update({
      chart: {
          inverted: true,
          polar: false
      },
      subtitle: {
          text: 'Inverted'
      }
  });
});

//cambiar la grafica a polar
document.getElementById('polar').addEventListener('click', () => {
  chart.update({
      chart: {
          inverted: false,
          polar: true
      },
      subtitle: {
          text: 'Polar'
      }
  });
});

//cambiar la grafica a plano para navbar
document.getElementById('plain2').addEventListener('click', () => {
  chart.update({
      chart: {
          inverted: false,
          polar: false
      },
      subtitle: {
          text: 'Plain'
      }
  });
});

//cambiar la grafica a plano invertido para navbar
document.getElementById('inverted2').addEventListener('click', () => {
  chart.update({
      chart: {
          inverted: true,
          polar: false
      },
      subtitle: {
          text: 'Inverted'
      }
  });
});

//cambiar la grafica a polar para navbar
document.getElementById('polar2').addEventListener('click', () => {
  chart.update({
      chart: {
          inverted: false,
          polar: true
      },
      subtitle: {
          text: 'Polar'
      }
  });
});

//filtra de ciudades a productos
document.getElementById('calendar').addEventListener('click', ()=> {
  chart.update({
     data: {
         switchRowsAndColumns: !chart.options.data.switchRowsAndColumns
 
     }
 });
 });