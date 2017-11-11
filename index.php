<?php
include_once('database.class.php');

$logs = new Logs();

$z = $logs->getDates();

// foreach($z as $k => $v){
//      date('d',strtotime($v['LogCreated']));
// }



echo "<br>";
$x = $logs->countEntries();



date_default_timezone_set('Asia/Manila');

$list=array();

$month = date('m');
$year = date('y');

$today = date('d');
if($today <= 15) {

    for($d=1; $d<=15; $d++)
    {
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
        $list[]=date('d', $time);
    }

} else {

    for($d=16; $d<=30; $d++)
    {
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
        $list[]=date('d', $time);
    }
}













$arr = array();
$listlen = count($list);




for($i = 0; $i < $listlen; $i++ ){
    $arr[$i]['x'] = $list[$i];
    $arr[$i]['y'] = 0;
    foreach($x as $k => $v){
        if($arr[$i]['x'] == date('d',strtotime($v['date']))) {
            $arr[$i]['y'] = $v['count'];
        }
    }
}

//print_r($arr);


// $count = 0;

// foreach($list as $d => $dv) {
//    $arr['key'] = $dv;
//     foreach($x as $k => $v){
        
//         if($arr['key'] == date('d',strtotime($v['date']))) {
         
//        // echo $dv."=".$v['count']."<br>";
//        }
       
     
 
//     }
       
// }

// //print_r($arr);


$days = implode("','",$list);

?>

<!DOCTYPE html>
<html>
<head>
    <title>ChartJS - Line</title>
    
    <link href="css/default.css" rel="stylesheet">
    
</head>
<body>

    <div class="chart-container">
        <canvas id="line-chartcanvas"></canvas>
    </div>

    <!-- javascript -->
    <script src="js/moment.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/Chart.min.js"></script>

    <script>

   <?php include_once('js/line.js'); ?> 
    </script>
</body>
</html>
