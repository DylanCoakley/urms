<!--<h2><?= $title ?></h2>

<?php
 
//$dataPoints = array( 
	//array("label"=>"Tickets Sold","y"=>$tickets_sold),
	//array("label"=>"Tickets Remaining","y"=>$tickets_remaining) 
//)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Tickets Sold and Tickets Remaining"
	},
	data: [{
		type: "doughnut",
		yValueFormatString: "0",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
-->


<h2><?= $title ?></h2>
</script>
</head>
<body>
<div id="chartContainer" style="height: 10px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

<?php
$dataPoints=[$tickets_sold, $tickets_remaining]; 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
</head>
<body>
	<canvas id="doughnut-chart" width="800" height="450"></canvas>
	<script>
		var dataArray = [<?php echo join(',',$dataPoints); ?>];
		new Chart(document.getElementById("doughnut-chart"), {
		    type: 'doughnut',
		    data: {
		        labels: ['Tickets Sold', 'Tickets Remaining'],
		        datasets: [{
		            label: 'Tickets',
		            data: dataArray, // 3. use the javascript variable here.
		            backgroundColor: ["#3e95cd", "#8e5ea2"]
		        }]
		    }
		});
	</script>
</body>
</html>