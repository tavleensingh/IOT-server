var label;
var value;


FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts({
    id: "stockRealTimeChart",
    type: 'realtimeline',
    renderAt: 'chart-container',
    width: '100%',
    height: '420',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "",
            //"subCaption": "Harry's SuperMart",
            "xAxisName": "Time",
            "yAxisName": "ppm value",
            //"numberPrefix": "$",
            "refreshinterval": "1",
            //"yaxisminvalue": "35",
            "yaxismaxvalue": "36",
            "numdisplaysets": "10",
            "labeldisplay": "rotate",
            "showValues": "0",
            "showRealTimeValue": "0",
            "theme": "fint",
            "anchorhoverradius":"10",
            "anchorradius":"5",
            "anchorborderradius":"10"
        },
        "categories": [{
            "category": [{
                "label": "Day Start"
            }]
        }],
        "dataset": [{
            "data": [{
                "value": "0"
            }]
        }],
          "trendlines": [
        {
            "line": [
                {
                    "parentyaxis": "P",
                    "startvalue": "1000",
                    "displayvalue": "Safe CO2 {br}Concentration {br}According to WHO",
                    "valueOnRight": "1",
                    "thickness": "2",
                    "color": "#ff0000",
                    //"dashed": "1",
                    "origText": "Open"
                },
                {
                    "parentyaxis": "S",
                    "startvalue": "409.48",
                    "displayvalue": "Average CO2{br}Concentration by March 2017",
                    "valueOnRight": "1",
                    "thickness": "2",
                    "color": "#1aaf5d",
                    //"dashed": "1",
                    "origText": "Open"
                }
            ]
        }
    ]
    },
    "events": {
        "initialized": function(e) {
            function addLeadingZero(num) {
                return (num <= 9) ? ("0" + num) : num;
            }

            function updateData() {
                $.ajax({
	    url: 'http://localhost/final/chart.php',
	    type: 'GET',
	    success : function(data) {
	    str= data[0].label;
        arr=str.split(" ");
        label=arr[1];    
        value=data[0].value; 
	    }
	  });
                // Get reference to the chart using its ID
                var chartRef = FusionCharts("stockRealTimeChart"),
                    // We need to create a querystring format incremental update, containing
                    // label in hh:mm:ss format
                    // and a value (random).
                    
                   // Build Data String in format &label=...&value=...
                    strData = "&label=" + label + "&value=" + value;
                
                // Feed it to chart.
                chartRef.feedData(strData);
            }

            e.sender.chartInterval = setInterval(function() {
                updateData();
            }, 5000);
        },
        "disposed": function(evt, arg) {
            clearInterval(evt.sender.chartInterval);
        }
    }
}
);
    fusioncharts.render();
});