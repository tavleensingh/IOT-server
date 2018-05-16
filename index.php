<?php
 require_once 'core/init.php';
  if(!is_logged_in()){
    header('Location: login.php');
  }
include'includes/head.php';
?>
	<div class="wrapper">
	    <!--sidebar include-->
        <?php require 'includes/sidebar.php'?>

	    <div class="main-panel">
			<!--navbar include-->
        <?php require 'includes/navigation.php'?>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Current CO<sub>2</sub> levels</h4>
	                                <p class="category"></p>
	                            </div>
                                <br>
                                <div></div>
	                            <div id="chart-container">Chart will render here</div>
	                        </div>
						</div>
				
					</div>
                    <div class="row">
						<div class="col-lg-6 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="red">
                                    <h4 class="title">Past week's levels</h4>
	                                <p class="category"></p>
	                            </div>
                                <br>
                                <div></div>
	                            <div id="columnContainer">Chart will render here</div>
	                        </div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="green">
                                    <h4 class="title">Current Sensor Data</h4>
	                                <p class="category"></p>
	                            </div>
                                <br>
                                <div>
                                    <table class="table table-sm">
                                      <thead >
                                        <tr>
                                            <th><b>#</b></th>
                                            <th><b>Date</b></th>
                                            <th><b>Time</b></th>
                                            <th><b>ppm Value</b></th>
                                        </tr>
                                        
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <th scope="row" name="" id="">1</th>
                                          <td name="d1" id="d1">-</td>
                                          <td name="t1" id="t1">-</td>
                                          <td name="p1" id="p1">-</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">2</th>
                                          <td name="d2" id="d2">-</td>
                                          <td name="t2" id="t2">-</td>
                                          <td name="p2" id="p2">-</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">3</th>
                                          <td name="d3" id="d3">-</td>
                                          <td name="t3" id="t3">-</td>
                                          <td name="p3" id="p3">-</td>
                                        </tr>
                                         <tr>
                                          <th scope="row">4</th>
                                          <td name="d4" id="d4">-</td>
                                          <td name="t4" id="t4">-</td>
                                          <td name="p4" id="p4">-</td>
                                        </tr>
                                         <tr>
                                          <th scope="row">5</th>
                                          <td name="d5" id="d5">-</td>
                                          <td name="t5" id="t5">-</td>
                                          <td name="p5" id="p5">-</td>
                                        </tr>
                                           <tr>
                                          <th scope="row">6</th>
                                          <td name="d6" id="d6">-</td>
                                          <td name="t6" id="t6">-</td>
                                          <td name="p6" id="p6">-</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
	                        </div>
						</div>
					</div>
				</div>
                <!--footer include-->
        <?php require 'includes/footer.php'?>
			</div>
            
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="js/bootstrap-notify.js"></script>

	
	<!-- Material Dashboard javascript methods -->
	<script src="js/material-dashboard.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>
<script>
    function updateTable(){
        $.ajax({
	    url: 'http://localhost/final/updateTable.php',
	    type: 'GET',
	    success : function(data) {
            //row1
	    $('#d1').text(data[0].date);
        $('#t1').text(data[0].time);
        $('#p1').text(data[0].air);
            //row2
        $('#d2').text(data[1].date);
        $('#t2').text(data[1].time);
        $('#p2').text(data[1].air);
            //row3
        $('#d3').text(data[2].date);
        $('#t3').text(data[2].time);
        $('#p3').text(data[2].air);
            //row4
        $('#d4').text(data[3].date);
        $('#t4').text(data[3].time);
        $('#p4').text(data[3].air); 
           //row5
        $('#d5').text(data[4].date);
        $('#t5').text(data[4].time);
        $('#p5').text(data[4].air);
            //row6
        $('#d6').text(data[5].date);
        $('#t6').text(data[5].time);
        $('#p6').text(data[5].air);    
	    }
	  });
    }

setInterval(function(){updateTable()},5000);
</script>

</html>
