$(document).ready(function() {

	//get canvas
	var ctx = $("#line-chartcanvas");

	var data = {
		labels : [<?php echo "'$days'"; ?>],
		datasets : [
			{
				label : "<?php echo date('M'); ?>",
				data :  <?php print json_encode($arr); ?>,
				backgroundColor : "rgba(233, 62, 62, 0.45)",
				borderColor : "#FF3860",
				pointBackgroundColor : "#411515",
				fill: 'false',
				lineTension : 0,
				pointRadius : 2

			},

			
		]
	};

	var options = {
		title : {
			display : true,
			position : "top",
			text : "Line Graph",
			fontSize : 18,
			fontColor : "#111"
		},
		legend : {
			display : true,
			position : "bottom"
		}
	};

	var chart = new Chart( ctx, {
		type : "line",
		data : data,
		options : options
	} );

});