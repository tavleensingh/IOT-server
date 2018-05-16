<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript">
$(document).ready(function() {
  var dataPointsA = []
  var dataPointsB = []

  $.ajax({
    type: 'GET',
    url: 'https://localhost/final/chart',
    dataType: 'json',
    success: function(field) {
      for (var i = 0; i < field.length; i++) {
        dataPointsA.push({
          x: field[i].time,
          y: field[i].xxx
        });
        dataPointsB.push({
          x: field[i].time,
          y: field[i].yyy
        });
      }


      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "JSON from External File"
        },

        data: [{
          type: "line",
          name: "line1",
          dataPoints: dataPointsA
        }, {
          type: "line",
          name: "line2",
          dataPoints: dataPointsB
        }, ]
      });

      chart.render();

    }
  });
})
</script>
<script type="text/javascript" src="http://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>