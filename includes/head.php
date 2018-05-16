<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png" />
	<link rel="icon" type="image/png" href="img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css" rel="stylesheet"/>

    
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    
    <!--Charts-->
    <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script><script src="js/fusioncharts.js"></script>
	  <script src="js/fusioncharts.charts.js"></script>
	  <script src="js/themes/fusioncharts.theme.fint.js"></script>
	  <script src="js/app.js"></script>
    <script type="text/javascript">
  FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
        "type": "mscolumn2d",
        "renderAt": "columnContainer",
        "width": "100%",
        "height": "306",
        "dataFormat": "json",
        "dataSource":  {
    "chart": {
        "caption": "",
        "xAxisname": "Day",
        "yAxisName": "CO2 (In ppm)",
        "plotFillAlpha": "80",
        "paletteColors": "#0075c2,#1aaf5d",
        "baseFontColor": "#333333",
        "baseFont": "Helvetica Neue,Arial",
        "captionFontSize": "14",
        "subcaptionFontSize": "14",
        "subcaptionFontBold": "0",
        "showBorder": "0",
        "bgColor": "#ffffff",
        "showShadow": "0",
        "canvasBgColor": "#ffffff",
        "canvasBorderAlpha": "0",
        "divlineAlpha": "100",
        "divlineColor": "#999999",
        "divlineThickness": "1",
        "divLineDashed": "1",
        "divLineDashLen": "1",
        "usePlotGradientColor": "0",
        "showplotborder": "0",
        "valueFontColor": "#ffffff",
        "placeValuesInside": "1",
        "showHoverEffect": "1",
        "rotateValues": "1",
        "showXAxisLine": "1",
        "xAxisLineThickness": "1",
        "xAxisLineColor": "#999999",
        "showAlternateHGridColor": "0",
        "legendBgAlpha": "0",
        "legendBorderAlpha": "0",
        "legendShadow": "0",
        "legendItemFontSize": "10",
        "legendItemFontColor": "#666666"
    },
    "categories": [
        {
            "category": [
                {
                    "label": "Monday"
                },
                {
                    "label": "Tuesday"
                },
                {
                    "label": "Wednesday"
                },
                {
                    "label": "Thursday"
                },
                {
                    "label": "Friday"
                },
                {
                    "label": "Saturday"
                },
                {
                    "label": "Sunday"
                }
            ]
        }
    ],
    "dataset": [
        {
            "seriesname": "Min ppm value",
            "data": [
                {
                    "value": "320"
                },
                {
                    "value": "360"
                },
                {
                    "value": "299"
                },
                {
                    "value": "359"
                },
                {
                    "value": "422"
                },
                {
                    "value": "395"
                },
                {
                    "value": "342"
                }
            ]
        },
        {
            "seriesname": "Max ppm value",
            "data": [
                {
                    "value": "900"
                },
                {
                    "value": "560"
                },
                {
                    "value": "600"
                },
                {
                    "value": "564"
                },
                {
                    "value": "714"
                },
                {
                    "value": "689"
                },
                {
                    "value": "941"
                }
            ]
        }
    ]
}

  });
revenueChart.render();
})
</script>

</head>

<body>