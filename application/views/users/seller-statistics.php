<h2><?= $title ?></h2>

<?php
 
$dataPoints = array( 
	array("label"=>"Tickets Sold","y"=>$tickets_sold),
	array("label"=>"Tickets Remaining","y"=>$tickets_remaining) 
)
 
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
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>