<html >	
  <head >
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="http://download-data-uri.appspot.com/js/download-data-uri.js"></script> 
</head>

<?php  


$arr = array("Book","Magazine","Periodical","Directory");
$pub = $arr[rand(0,3)];

$act = array("Promotion cost","Transportation cost","Printing cost","Paper cost","Binding cost","Royalty cost");
shuffle($act);

$col = array("red","blue","green","silver","yellow","orange");


$perc = array();
$sum_1 =0;
for ($i=0;$i<5;$i++)
{
$perc[$i] =rand(10,20);
$sum_1 +=$perc[$i];
}

$perc[5]= 100-$sum_1;



?>




<body  >

 

    <script type="text/javascript"  >

var pubtype = "<?php echo $pub ; ?>";
  
var perc =<?php echo '[' . implode(', ', $perc) . ']' ; ?>;
var act = <?php echo '["' . implode('", "', $act) . '"]' ?>;



  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);



      function drawChart() {



        var data = google.visualization.arrayToDataTable([
      ['Activity', 'percentage'],
          [act[0],perc[0] ],
	  [act[1],perc[1] ],	
          [act[2], perc[2]],
          [act[3], perc[3]],
          [act[4], perc[4]],
          [act[5], perc[5]]
        ]);



switch (pubtype)
{	case "Book":
        var options = {title:'Various Expenditures (in percentage) incurred in Publishing a Book ',is3D:true,height:500,width:600,colors: ['#F98866', '#FF420E', '#80BD9E', '#89DA59', '#AEBD38','#003B46']};
		break;
	case "Magazine":
        var options = {title:'Various Expenditures (in percentage) incurred in Publishing a Magazine ',is3D:true,height:500,width:600,colors: ['#F98866', '#FF420E', '#80BD9E', '#89DA59', '#AEBD38','#003B46']};
		break;

	case "Periodical":
        var options = {title:'Various Expenditures (in percentage) incurred in Publishing a Periodical ',is3D:true,height:500,width:600,colors: ['#F98866', '#FF420E', '#80BD9E', '#89DA59', '#AEBD38','#003B46']};
		break;
	case "Directory":
        var options = {title:'Various Expenditures (in percentage) incurred in Publishing a Directory ',is3D:true,height:500,width:600,colors: ['#F98866', '#FF420E', '#80BD9E', '#89DA59', '#AEBD38','#003B46']};
		break;
}


        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

	       google.visualization.events.addListener(chart, 'ready', function () {
      chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
    });

        chart.draw(data, options);
var url = chart.getImageURI().replace(/^data:image\/[^;]/, 'data:application/octet-stream');


var n = "<?php echo time();?>";
var ext =".png";
var f=n.concat(ext);



}

   </script> 


 <div id="chart_div"  ></div>

  </body>



<?php 


$img =time();

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qna";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

*/




 $qtype = array();

 $qanswer=array ( );

 $qop = array(array(),
		array());


$correct_ans_pos=array();



function question_generate(){

global $qtype,$qanswer,$qop,$correct_ans_pos,$no_q,$pub,$perc,$act;



 			 //Questions

$a0 =50*rand(300,700);
$b0 =$act[rand(0,2)];
$c0 =$act[rand(3,5)];
$d0=$e0=0;
$qtype[0] =" If for a certain quantity of $pub , the publisher has to pay Rs. $a0 as $b0, then what will be amount of $c0 to be paid for these $pub?";

switch ($b0){
case $act[0] :$d0 = $perc[0];
		break;
case $act[1] :$d0 = $perc[1];
		break;
case $act[2] :$d0 = $perc[2];
		break;
 default : echo "";
		break;

}
switch ($c0){
case $act[3] :$e0 = $perc[3];
		break;
case $act[4] :$e0 = $perc[4];
		break;
case $act[5] :$e0 = $perc[5];
		break;
 default : echo "";
		break;
}


$qanswer[0]= round((($a0 * $e0)/$d0),2) ;




$a1=$act[rand(0,5)];


$an1=0;


$qtype[1] ="What is the central angle of the sector corresponding to $a1   ?";


switch ($a1){
case $act[0] :$an1 = $perc[0];
		break;
case $act[1] :$an1 = $perc[1];
		break;
case $act[2] :$an1 = $perc[2];
		break;
case $act[3] :$an1 = $perc[3];
		break;
case $act[4] :$an1 = $perc[4];
		break;
case $act[5] :$an1 = $perc[5];
		break;
 default : echo "";
		break;
}


$qanswer[1]=($an1*3.6);




$a2= 5*rand(2,6);
$b2 = 10*rand(15,30);
$p2=0;
for ($i2=0;$i2<6;$i2++)
{
if ($act[$i2] == "Paper cost")

$p2 = $perc[$i2];
}



$qtype[2] ="The price of the $pub is marked $a2 % above the C.P. If the marked price of the $pub is Rs. $b2 , then what is the cost of the paper used in a single copy of the $pub?";


$qanswer[2]=round(($p2*$b2)/(100+$a2),2);




$a3= 50*rand(100,200);
$b3=$act[rand(0,5)];
$c3= 500*rand(150,190);
$d3= 5*rand(4,8);

$e3=0;
switch ($b3){
case $act[0] :$e3 = $perc[0];
		break;
case $act[1] :$e3 = $perc[1];
		break;
case $act[2] :$e3 = $perc[2];
		break;
case $act[3] :$e3 = $perc[3];
		break;
case $act[4] :$e3 = $perc[4];
		break;
case $act[5] :$e3 = $perc[5];
		break;
 default : echo "";
		break;
}


$qtype[3] ="If $a3 copies are published and the $b3 on them amounts to Rs. $c3 , then what should be the selling price of the $pub so that the publisher can earn a profit of $d3 %?";

$qanswer[3]= round((($d3+100)*$c3)/($a3*$e3)  ,2)  ;




$a4=$act[rand(0,2)];
$b4=$act[rand(3,5)];
$c4=$d4=0;

switch ($a4){
case $act[0] :$c4 = $perc[0];
		break;
case $act[1] :$c4 = $perc[1];
		break;
case $act[2] :$c4 = $perc[2];
		break;
 default : echo "";
		break;

}
switch ($b4){
case $act[3] :$d4 = $perc[3];
		break;
case $act[4] :$d4 = $perc[4];
		break;
case $act[5] :$d4 = $perc[5];
		break;
 default : echo "";
		break;
}

for($i4=$d4;$i4>1;$i4--) {
  if(($c4%$i4)==0 && ($d4 % $i4)==0) {
    $c4 = $c4/$i4;
    $d4 = $d4/$i4;
  }
}

$qtype[4] ="What is the approximate ratio of $a4 and $b4 ?";



$qanswer[4]= "$c4 : $d4";













		//Random Options Generation

for( $i = 0 ; $i < count($qtype) ; $i++ ) 
 	 {	$qa = $qanswer[$i];
		$qa1 = (int) $qanswer[$i];
		for( $j = 0 ; $j < 5 ; $j++ ) 
		{
    	 	$qop[$i][$j]=  rand($qa1/2,$qa1+$qa1); 

		if (is_numeric( $qa ) && floor( $qa ) != $qa)
		{
		$places = strlen(substr(strrchr($qa, "."), 1));
		$power = pow (10,$places);
		$qop[$i][$j] += rand(0,$power*10)/($power) ; 
   		}
		}
	}

$arr = array(rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]),rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]),rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]),rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]),rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]),rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]),rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]),rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]),rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]),rand($qanswer[4]/2,$qanswer[4]+$qanswer[4]));
	$qop[4][0]="$arr[0] : $arr[4] ";
	$qop[4][1]="$arr[3] : $arr[1] ";
	$qop[4][2]="$arr[5] : $arr[2] ";
	$qop[4][3]="$arr[6] : $arr[7] ";
	$qop[4][4]="$arr[9] : $arr[8] ";
		//Answer Position Assignment

for ($i=0;$i< count($qtype) ; $i++)
		{
		
		$correct_ans_pos[$i]=rand(0,4);
		$qop[$i][$correct_ans_pos[$i]]=$qanswer[$i];
		}
		



}



for ($i=0;$i<5;$i++)
{
question_generate();
$inc=$i+1;
  $random_quesion_type= $i;
print(" Question No. $inc <br> ");

print("  $qtype[$random_quesion_type] <br><br>");

$op= array($qop[$random_quesion_type][0],$qop[$random_quesion_type][1],$qop[$random_quesion_type][2],$qop[$random_quesion_type][3],$qop[$random_quesion_type][4]);

print(" (a) $op[0]  <br> (b) $op[1]  <br> (c) $op[2]  <br> (d) $op[3] <br> (e) $op[4]<br><br>");

print("Answer is : $qanswer[$random_quesion_type] <hr><br>");


/*
if($img){

if($stmt = $mysqli->prepare("INSERT INTO qna (`Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Answer`,`Image`) VALUES (?,?,?,?,?,?,?,?)" )){

	$stmt->bind_param("ss",$qtype[$random_quesion_type]','$op[0] ','$op[1] ','$op[2] ','$op[3] ','$qanswer[$random_quesion_type] ','$img');

	$stmt->execute();
	$stmt->close();

}


}*/
}






?>

</html>

