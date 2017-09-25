google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
   // Define the chart to be drawn.
   var data = google.visualization.arrayToDataTable([
      ['Skills', 'Skills'],
	  ['wireframing',  85],
      ['scenarios',  78],
      ['storyboarding', 70 ],
      ['creating personas',  70],
      ['user research',  75]
   ]);

   var options = {
      title: 'my skills',
      legend: 'none',
      tooltip: { trigger: 'none' },
      'is3D': true,
      left: 0, top: 0, height: 280, width: 850,
      colors: ['#808080'],
      bar: { groupWidth: '50%' },
      hAxis: { color: '#FF0000',
                   fontName: 'Lato',
                   fontSize: '20' },
      vAxis: { gridlines: { count: 4 },
          ticks: [{v: 0, f: ''}, {v: 33, f: 'basic'}, {v: 65, f: 'intermediate'},
          {v: 100, f: 'advanced'}]
      }
    };

   // Instantiate and draw the chart.
   var chart = new google.visualization.ColumnChart(document.getElementById('div-chart'));
   chart.draw(data, options);
}
google.charts.setOnLoadCallback(drawChart);
