<?php


//math functions

function gcf($a, $b) { 
	return ( $b == 0 ) ? ($a):( gcf($b, $a % $b) ); 
}
function lcm($a, $b) { 
	return ( $a / gcf($a,$b) ) * $b; 
}
 function fact($num){$factorial=1;if($num==0){$factorial=  1;}else{for ($x=$num; $x>=1; $x--)  {  $factorial = $factorial * $x;   }}return$factorial;}

function n_p_r($n,$r){$n=(int)$n; $r=(int)$r;return (fact($n)/fact($n-$r));}	


function n_c_r($n,$r){$n=(int)$n; $r=(int)$r;return (n_p_r($n,$r)/fact($r));}


//server connection

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


//arrays for storing questions, answers,options and correct answer

 $qtype = array();

 $qanswer=array ( );

 $qop = array(array(),
		array());


$correct_ans_pos=array();





//  function for generating questions



function question_generate(){







global $qtype,$qanswer,$qop,$correct_ans_pos,$no_q;


		$a = rand(100,200);
		$b = rand(10,40);


					//profit and loss

 $qtype[0]= " In a certain store, the profit is $a% of the cost. If the cost increases by $b% but the selling price remains constant, approximately what percentage of the selling price is the profit?  ";
		$cp=100;
		$sp=$a+$cp;
		$new_cp=(($cp+$b)*$cp);
		$new_cp_final=($new_cp/100);
		$pft=($sp-$new_cp_final);
		
	
	$qanswer[0]=round( ($pft/$sp)*100 ,2);

		
// surface area and volumes 
	
		$c = rand(10,100);
		$d = rand(20,30);
		$e = rand(1,5);
		$f = rand(1,10);
 $qtype[1]= " A hollow iron pipe is $c cm long and its external diameter is $d cm. If the thickness of the pipe is $e cm and iron weighs $f g/cm3, then the weight of the pipe is:    ";
		$ext_rad= $d/2;
		$int_rad = $ext_rad - $e;
		$volume= ((22/7)*(pow($ext_rad,2)-pow($int_rad,2))*$c);
		
		
	
	$qanswer[1]=round( ($volume*$f)/1000 , 2);

	
// speed, time and distance 

		$g= rand(1,10);
		$ns= rand(10,20);
		$h = rand(1,5);
		$m = rand(10,60);
$qtype[2]= "  Walking at the rate of $g kmph a man cover certain distance in $h hr $m min. Running at a speed of $ns kmph the man will cover the same distance in. ";


		$dis= $g* (($h*60+ $m)/60);
	$qanswer[2]= round($dis/$ns,2);	
	

		$a3=rand(20,59);
		$b3=rand(1,100);
		$c3=$a3-rand(1,10);
		
$qtype[3]= " A train covers a distance in $a3 min, if it 
runs at a speed of $b3  kmph on an average. The speed at which the train must run to reduce the time of journey to $c3 min will be . ";

		$d3= ($a3/60)*$b3;
		$qanswer[3]= round(($d3/$c3)*60, 2);
		


		$a4=rand(1,10);
		$b4=rand(1,10);
	if($a4=$b4)
		$b4=$a4+rand(1,5);
		$c4=rand(5,20);

$qtype[4]= " Two boys starting from the same place walk at a rate of $a4 kmph and $b4 kmph respectively. What time will they take to be $c4 km apart, if they walk in the same direction? ";

		if ($a4>$b4)
		$qanswer[4]= round(($c4/($a4-$b4)),2);
		else
		$qanswer[4]= round(($c4/($b4-$a4)),2);



		$a5=rand(30,100);
		$b5= $a5 - rand(5,15);
$qtype[5]= "Excluding stoppages, the speed of a bus is $a5 kmph and including stoppages, it is $b5 kmph. For how many minutes does the bus stop per hour? ";

		$qanswer[5]= round(((($a5 - $b5)/$a5)*60) ,2); 


		$a6= rand(200,500);
		$b6= $a6- rand(1,100);

$qtype[6]= " 2 trains starting at the same time from 2 stations $a6 km apart and going in opposite direction cross each other at a distance of $b6 km from one of the stations. What is the ratio of their speeds? ";

	$numer=$b6;
$denom=$a6-$b6;

for($x=$denom;$x>1;$x--) {
  if(($numer%$x)==0 && ($denom % $x)==0) {
    $numer = $numer/$x;
    $denom = $denom/$x;
  }
}
$qanswer[6]= "$numer : $denom";



		$a7 = rand(20,80);
$qtype[7] = "In covering a distance of $a7 km, Sachin takes 2 hours more than Rohit. If Sachin doubles his speed, then he would take 1 
hour less than Rohit. Sachins speed is :  ";

$qanswer[7]=	round($a7/6,2);


			$a8 = rand(100,300);
			$b8 = rand(50,150);
			$c8 = $a8 + rand(100,300);	

$qtype[8] = "A train $a8 m long running at $b8 kmph. In how much time will it pass a platform $c8 m
long?";

		$qanswer[8] = round((($a8 + $c)/(($b*5)/8)),2); 

	
		$a9= rand(1,10);
		$b9= rand(1,10);
		$c9 = rand(200,600);
		$d9= rand(1,100);

$qtype[9] = "The ratio between the speeds of two trains is $a9 : $b9 . If the second train runs $c9 kms in $d9
hours, then the speed of the first train is: ";

		$qanswer[9]= round((($a9*$c9)/($b9*$d9)),2);


			$a10= rand(1,5);
		$b10= rand(1,59);
		$d10 = rand(5,10);
		$c10 = $d10 - rand(1,4);
		$e10= rand(1,10);
		$f10= rand(1,10);

$qtype[10]= "Sachin can cover a distance in $a10 hr $b10 min by covering $c10 / $d10 of the distance at $e10 kmph
and the rest at $f10 kmph.the total distance is? ";

		$qanswer[10]= round((($a10*60 + $b10)/60)/((($c10/$d10)/$e10) + ((1- $c10/$d10)/$f10)),2);



		$a11= rand(1,10);
		$b11= rand(1,50);
		$c11 = rand(1,10);
		$d11 = rand(1,50);

$qtype[11]= "A person walks at $a11 kmph for $b11 hr and at $c11 kmph for $d11 hr.
 The average speed is : ?";

	$qanswer[11]= round(($a11*$b11 + $c11*$d11)/($b11+$d11),2);


			$a12= rand(1,100);
		$b12= rand(1,59);

$qtype[12] = "A person covers a certain distance at $a12 kmph .How many meters does he cover in
$b12 minutes.";

		$qanswer[12] = round(((($a12*5)/18)*$b12*60),2);



		$a13= rand(1,10);
		$b13= rand(1,10);
		$c13 = rand(1,59);
	
$qtype[13] = "If a man runs at $a13 m/s. How many km does he run in $b13 hr $c13 min ";

		$qanswer[13] = round(((($a13*18)/5)*(($b13*60 + $c13)/60)),2);




	$a14= rand(20,59);
		$b14= rand(1,100);
		$c14 = $a14 - rand(1,10);
	
$qtype[14] = "A train covers a distance in $a14 min ,if it runs at a speed of $b14 kmph on an average.The
speed at which the train must run to reduce the time of journey to $c14 min will be. ";

		$qanswer[14] = round((($b14*$a14)/$c14),2);




		$b15= rand(5,10);
		$a15= $b15 - rand(1,4);
		$c15 = rand(1,10);
		$e15 = rand(5,10);
		$d15= $e15 - rand(1,4);
		
	
$qtype[15] = "walking at $a15/$b15 of his usual speed ,a man is late by $c15 $d15/$e15 hr.
the usual time is. ";

		$qanswer[15] = round(((($c15*$e15+$d15)/$d15)/(($b15/$a15)-1)),2);


		$a16= rand(5,10);
		$b16=  rand(1,59);
		$c16 = rand(1,4);
		
		
	
$qtype[16] = "A man covers a distance on scooter .had he moved $a16 kmph faster he would have taken
$b16 min less. If he had moved $c16 kmph slower he would have taken $b16 min more.the
distance is.";

		$qanswer[16] = round(((2*$a16*$c16*$b16*($a16+$c16))/60),2);



		$a17= rand(5,10);
		$b17=  rand(1,59);
		$c17 = rand(1,4);
		
		
	
$qtype[17] = "A man covers a distance on scooter .had he moved $a17 kmph faster he would have taken
$b17 min less. If he had moved $c17 kmph slower he would have taken $b17 min more.the
distance is.";

		$qanswer[17] = round(((2*$a17*$c17*$b17*($a17+$c17))/60),2);



		$a18= rand(10,30);
		$b18=  $a18+ rand(1,10);
		
	
$qtype[18] = "Gita rows a boat at a speed of $a18 kmph upstream and $b18 kmph downstream. Find the Speed with which Gita rows the boat in still water ";

		$qanswer[18] = round(($a18+$b18)/2,2);



		$a19= rand(50,100);
		$b19=  rand(1,10);
		$c19 = rand(1,10);
		
		
	
$qtype[19] = "A man and a woman $a19 miles apart from each other, start travelling towards each other at the same time. If the man covers $b19 miles per hour to the women $c19 miles per hour, how far will the woman have travelled when they meet?";

		$qanswer[19] = round((($a19/($b19+$c19))*$c19),2);




		$a20= rand(1,59);
		$b20=  rand(40,100);
		$c20 = $b20- rand(1,20);
		
		
	
$qtype[20] = " A passenger train covers the distance between stations X and Y, $a20 minutes faster than a goods train. Find this distance if the average speed of the passenger train is $b20 kmph and that of goods train is $c20 kmph.";

		$qanswer[20] = round((($a20/$b20)*($b20*$c20)/($b20-$c20)),2);



		$a21= rand(200,2000);
		$b21=  rand(30,100);
		$c21 = $a21 -1;
		$d21= ((int) ($b21/2)) - rand(1,5);
		
	
$qtype[21] = " Two boys begin together to write out a booklet containing $a21 lines. The first boy starts with the first line, writing at the rate of $b21 lines an hour; and the second starts with the last line then writes line $c21 and so on, backward proceeding at the rate of $d21 lines an hour. At what line will they meet? ";

		
for($z=$d21;$z>1;$z--) {
  if(($b21%$z)==0 && ($d21 % $z)==0) {
    $b21 = $b21/$z;
    $d21 = $d21/$z;
  }
}
		$qanswer[21] = (round((($b21/($b21+$d21))*$a21),0))+1;



		$a22= rand(140,200);
		$b22=  rand(30,100);
		$c22 = rand(20,59);

		
	
$qtype[22] = " A train traveling at $a22 kmph overtakes a motorbike traveling at $b22 kmph in $c22 seconds. What is the length of the train in meters? ";

		
		$qanswer[22] = round(((((($a22-$b22)*5)/18)*$c22)),0);



		$a22= rand(140,200);
		$b22=  rand(30,100);
		$c22 = rand(20,59);

		
	
$qtype[22] = " A train traveling at $a22 kmph overtakes a motorbike traveling at $b22 kmph in $c22 seconds. What is the length of the train in meters? ";

		
		$qanswer[22] = (round(((((($a22-$b22)*5)/18)*$c22)),0));


	//profit and loss


		$x23= rand(140,200);
		$y23=  rand(30,60);
		$z23 = rand(1,10);

		



$qtype[23] = " If the cost of an article is $x23 , first discount given is $y23 % of cost, second discount given is $z23 % of cost.
The selling price  is ";

		
		$qanswer[23] = round(($x23*(1- (($y23+$z23)/100))),2);




		$a24= rand(100,1000);
		$b24=  $a24- rand(20,80);
	
$qtype[24] = "If a radio is purchased for Rs $a24 and sold for Rs $b24.  Find the loss% ?";

		
		$qanswer[24] = round(((($a24-$b24)*100)/$a24),2);




		$a25= rand(5,30);
		$b25=  rand(100,600);
	
	
$qtype[25] = " A person incurs $a25 % loss by selling a bat for Rs  $b25 . At what price should the watch be sold to earn $a25 % profit? ";

		
		$qanswer[25] = round(($a25*((100+$a25)/(100-$a25))),2);



		$a26= rand(10,200);
		$b26=  rand(2,10);
		$c26 = $b26+ rand(2,5);

		
	
$qtype[26] = " The price of an article including the sales tax is Rs $a26.The rate of sales tax is $b26 %,if the
shopkeeper has made a profit of $c26 %,then the cost price of the article is ? ";



		
		$qanswer[26] = round((((($a26*100)/($b26+100))*100)/($c26+100)),2);






		$a27= rand(1,11);
		$b27=  rand(300,500);
		$c27 = (((int)($b27/$a27)));

		
	
$qtype[27] = " Mayank Bothra purchased $a27 dozens of toys at the rate of $b27 Rs per dozen . He sold each one of them at the rate of Rs $c27 . What was his percentage profit ? ";

		
		$qanswer[27] = round((((($c27*$a27*12) - ($b27*$a27))/($b27*$a27))*100),2);




		$a28= rand(10,30);
		$b28=  rand(1,10);
		$c28 = rand(1,9);
		$d28 = rand(1,9);
		
	
$qtype[28] = " A person earns $a28 % on investment but loses $b28 % on another investment. If the ratio of the two investments be    $c28:$d28 , what is the gain or loss on the two investments taken together ? ";

		$tot_receipt = ((((100+$a28)*$c28)/100) + (((100-$b28)*$d28)/100));

		if($tot_receipt < ($c28+$d28))

		$qanswer[28] = round((((($c28+$d28)- $tot_receipt)*100)/($c28+$d28)),3);

		else
		$qanswer[28] = round(((($tot_receipt-($c28+$d28) )*100)/($c28+$d28)),3);
		
		

		$a29= rand(100,800);
		$b29=  rand(5,15);

		
	
$qtype[29] = " A dealer sold two of his cattle for Rs. $a29 each. On one of them he lost $b29 % on the other, he gained $b29 %. His gain or loss percent in the entire transaction was: ";

		
		$qanswer[29] = round((($b29/10)*($b29/10)),2);	




		$a30= rand(12,20);
		$b30=  rand(2,5);
		$c30 = rand(6,15);

		
	
$qtype[30] = " A man bought an article and sold it at a gain of $a30 %. If he had bought it at $a30 % less and sold it for Re $b30 less, he would have made a profit of $c30 %. The C.P. of the article was ";

		
		$qanswer[30] = round(($b30/((100+$a30)/100-(((100+$c30)/100)*((100-$a30)/100)))),0);



		$a31= rand(100,200);
		$b31=  rand(3,9);
		$c31 = rand(2,10);

		
	//simple and compound interest 

$qtype[31] = " A sum fetched a total simple interest of Rs. $a31 at the rate of $b31 p.c.p.a. in $c31 years. What is the sum? ";

		
		$qanswer[31] = round(((100*$a31)/($b31*$c31)),2);




		$a32= rand(100,200);
		$b32=  rand(2,6);
		$c32 = $b32 + rand(50,100);
		$d32 = rand(7,11);
		
	
$qtype[32] = " A sum of money at simple interest amounts to Rs. $a32 in $b32 years and to Rs. $c32 in $d32
years. The sum is ";

		
		$qanswer[32] = round(($a32 - (($c32-$a32)*$b32)),2);




		$a33= rand(700,1000);
		$b33=  rand(200,400);

		
	
$qtype[33] = " Reena took a loan of Rs. $a33 with simple interest for as many years as the rate of interest. If she paid Rs. $b33 as interest at the end of the loan period, what was the rate of interest? ";

		
		$qanswer[33] = round((pow((($b33*100)/$a33),0.5)),2);




		$a34= rand(2000,6000);
		$b34=  rand(1,10);
		$c34 = rand(2000,7000);
		$d34= rand(1,10);
		$e34= rand(2200,3000);
		
	
$qtype[34] = " Ajay lent Rs. $a34 to Vikas for $b34 years and Rs. $c34 to Raman for $d34 years on simple interest at the same rate of interest and received Rs. $e34 in all from both of them as interest. The rate of interest per annum is: ";

		
		$qanswer[34] = round(($e34/((($a34*$b34)/100) + (($c34*$d34)/100))),0);




		$a35= rand(1,10);
		$b35=  rand(1,10);

		
	
$qtype[35] = " What will be the ratio of simple interest earned by certain amount at the same rate of
interest for $a35 years and that for $b35 years? ";

for($z35=$b35;$z35>1;$z35--) {
  if(($a35%$z35)==0 && ($b35 % $z35)==0) {
    $a35 = $a35/$z35;
    $b35 = $b35/$z35;
  }
}
		$qanswer[35] = "$a35 : $b35";






		$a36= rand(100,500);
		$b36=  rand(5,10);
		$c36 = $a36*2;

		
	
$qtype[36] = " Rs.$a36 doubled in $b36 years when compounded annually. How many more years will it take to get another Rs.$c36 compound interest? ";

		
		$qanswer[36] = $b36;



			//ages 

			$x37 = rand(10,100);
			$y37 = rand(10,100);
			$a37=$x37*$y37;
			$times=$x37 +rand(1,5);
			$b37 = ($times*$y37)-$x37;
	
$qtype[37] = " The product of the ages of Ankit and Nikita is $a37. If $times times the age of Nikita is more than Ankits age by $b37 years, what is Nikitas age? ";

		
		$qanswer[37] = $y37;






		//Permutation and Combination

		$a38= rand(10,20);
		$b38=  $a38 - rand(1,3);
		$d38= rand(1,$a38-1);
		$c38 = rand($d38,$d38+3);
		
		
	
$qtype[38] = "  From a group of $a38 men and $b38 women, $c38 persons are to be selected to form a committee so that at least $d38 men are there on the committee. In how many ways can it be done? ";
		$qanswer[38]=0;
	
		for ($i38 = $d38,$j38=$c38-$d38;$i38<=$c38,$j38>=0;$i38++,$j38--)
	{
	$qanswer[38] += n_c_r($a38,$i38) * n_c_r($b38,$j38);

	}


		$a39= rand(2,6);
		$b39=  rand(1,6);
		
	
$qtype[39] = "  When $a39  fair dice are rolled simultaneously, in how many outcomes will at least one of the dice show $b39 ? ";
		
	
		
	$qanswer[39] = pow(6,$a39) - pow(5,$a39);





$alp40 =array("A","B", "C","D", "E", "F", "G", "H", "I","J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T","U", "V","W","X", "Y","Z" );
	$occ40 = array();

		$word40="";
$no_of_vowels40=0;
		$total_letters40=rand(5,10);
	for ($i40=0;$i40<$total_letters40;$i40++)
		{
		$word40 = $word40 . $alp40[rand(0,6)];
		}
		for ($j40 = 0; $j40 <strlen($word40);$j40++)
		{
		if ($word40[$j40]=="A" ||$word40[$j40]=="E" || $word40[$j40]== "I" || $word40[$j40]=="O" ||$word40[$j40]=="U")
		$no_of_vowels40+=1;
		}



for ($k40 = 0; $k40<25;$k40++)
{
$occ40[$k40]= substr_count($word40,$alp40[$k40]);


}

$denom40_1=1;
$denom40_2=1;


for ($l40 = 0; $l40<25;$l40++)
{
if($occ40[$l40]==0)
$occ40[$l40]=1;
$denom40_1 *= fact($occ40[$l40]);

}
$denom40_2= (fact($occ40[0])*fact($occ40[4])*fact($occ40[8])*fact($occ40[14])*fact($occ40[20]));

	$denom40_1 = $denom40_1/$denom40_2;	
	
$qtype[40] = "  In how many different ways can the letters of the word $word40 be arranged so that the vowels always come together? ";
		
	
	$numer40_1=fact((strlen($word40) -$no_of_vowels40)+1);
	$numer40_2=fact($no_of_vowels40);	
		
	$qanswer[40] = ($numer40_1/$denom40_1) * ($numer40_2/$denom40_2) ;





		$a41= rand(4,7);
		$b41=  rand(2,5);
		$c41= $a41-rand(2,3);
		$d41=  $b41- rand(0,1);	
	
$qtype[41] = "   Out of $a41 consonants and $b41 vowels, how many words of $c41 consonants and $d41 vowels can be formed? ";
		
	
		
	$qanswer[41] = ((n_c_r($a41,$c41) * n_c_r($b41,$d41)) * (fact($c41+$d41)) );




	
		

$occ42 = array();

		$word42="";
		$total_letters42=rand(5,10);
	for ($i42=0;$i42<$total_letters42;$i42++)
		{
		$word42 = $word42 . $alp40[rand(0,6)];
		}



for ($k42 = 0; $k42<25;$k42++)
{
$occ42[$k42]= substr_count($word42,$alp40[$k42]);


}

$denom42=1;

for ($l42 = 0; $l42<25;$l42++)
{
if($occ42[$l42]==0)
$occ42[$l42]=1;
$denom42 *= fact(($occ42[$l42]));

}

$numer42= fact(strlen($word42));


	
$qtype[42] = " In how many ways can the letters of the word $word42 be arranged? ";
		
		
	$qanswer[42] = $numer42/$denom42;




		$a43= rand(2,6);
		$b43=  2;
		$c43=  rand(0,9);
		$d43=  rand(0,9);
		$e43=  0;
		$f43=  rand(0,9);
		$g43=  rand(0,9);
		$op43=array(2,5,10);
		$h43=  $op43[rand(0,2)];
$qtype[43] = "  How many $a43-digit numbers can be formed from the digits $b43, $c43, $d43, $e43, $f43 and $g43, which are divisible by $h43 and none of the digits is repeated? ";
		
	$occ43 =0;

	switch($h43){
	
		case 2:	if ($b43==0||$b43==2||$b43==4||$b43==6||$b43==8)
				$occ43=1;
			if ($c43==0||$c43==2||$c43==4||$c43==6||$c43==8)
				$occ43+=1;
			if ($d43==0||$d43==2||$d43==4||$d43==6||$d43==8)
				$occ43+=1;		
			if ($e43==0||$e43==2||$e43==4||$e43==6||$e43==8)
				$occ43+=1;
			if ($f43==0||$f43==2||$f43==4||$f43==6||$f43==8)
				$occ43+=1;	
			if ($g43==0||$g43==2||$g43==4||$g43==6||$g43==8)
				$occ43+=1;

				$fav_43=$occ43;

				break;

		case 5: if ($b43==0||$b43==5)
				$occ43=1;
			if ($c43==0||$c43==5)
				$occ43+=1;
			if ($d43==0||$d43==5)
				$occ43+=1;		
			if ($e43==0||$e43==5)
				$occ43+=1;
			if ($f43==0||$f43==5)
				$occ43+=1;	
			if ($g43==0||$g43==5)
				$occ43+=1;

				$fav_43=$occ43;


					 break;
		

		case 10: if ($b43==0)
				$occ43=1;
			if ($c43==0)
				$occ43+=1;
			if ($d43==0)
				$occ43+=1;		
			if ($e43==0)
				$occ43+=1;
			if ($f43==0)
				$occ43+=1;	
			if ($g43==0)
				$occ43+=1;

				$fav_43=$occ43;
			break;
		

		default: echo "";

		}
		switch($a43)
		{
		case 2: $x43=5;
			break;

		case 3:$x43=20;
			break;
		case 4: $x43=60;
			break;

		case 5: $x43=120;
			break;
		case 6: $x43 = 120;
			break;
		default: echo "";

			}

		
		$qanswer[43] = $x43*$fav_43;






		$a44= rand(1,5);
		$b44=  rand(1,5);
		$c44 = rand(6,10);
		$d44= rand(6,10);
	
$qtype[44] = "  In how many ways a committee, consisting of $a44 men and $b44 women can be formed from $c44 men and $d44 women? ";
		
	
		
	$qanswer[44] = n_c_r($c44,$a44) * n_c_r($d44,$b44);



		$a45= rand(2,5);
		$b45=  rand(3,5);
		$c45= rand(2,5);
		$d45= rand(5,$a45+$c45);
		$e45= $b45 - rand(1,2);
	
$qtype[45] = "  A box contains $a45 white balls, $b45 black balls and $c45 red balls. In how many ways can $d45 balls be drawn from the box, if at least $e45 black ball(s) is to be included in the draw? ";
		

		$qanswer[45]=0;	

	for ($i45 = $e45,$j45=$d45-$e45;$i45<=$b45;$i45++,$j45--)
	{
	$qanswer[45] += n_c_r($b45,$i45) * n_c_r($a45+$c45,$j45);

	}
		



		$a46= rand(2,5);
		$word46="";
		$total_letters46=rand(6,12);
	for ($i46=0;$i46<$total_letters46;$i46++)
		{
		$word46 = $word46 . $alp40[rand(0,25)];
		}


$qtype[46] = "  How many $a46-letter words can be formed out of the letters of the word $word46 , if repetition of letters is not allowed ? ";
		



for ($k46 = 0; $k46<25;$k46++)
{
$occ46[$k46]= substr_count($word46,$alp40[$k46]);


}

$repitions46=1;


for ($l46 = 0; $l46<25;$l46++)
{
if($occ46[$l46]==0)
$occ46[$l46]=1;
$repitions46 *= fact($occ46[$l46]);

}


		$qanswer[46]= ((n_p_r(strlen($word46),$a46))/($repitions46));
		




		$a47= rand(5,10);
		$b47=  rand(2,4);
	
	
$qtype[47] = " $a47 different toys are distributed among $b47 children how many different ways are possible? ";
		

		$qanswer[47]=pow($b47,$a47);	








					//Average


		$a48= rand(4,10);
		$b48=  rand(3,5);
	
$qtype[48] = " The average of first $a48 multiples of $b48 is: ";
		
	
		if ($a48%2==0)

		$qanswer[48]=(($a48/2)*$b48);	
	
		else
		$qanswer[48]=((($a48+1)/2)*$b48);	




		$a49= rand(20,40);
		$b49=  rand(20,40);
		$c49= rand(40,70);
		$d49= rand(40,70);
	
$qtype[49] = "  There are two sections A and B of a class, consisting of $a49 and $b49 students respectively.
If the average weight of section A is $c49 kg and that of section B is $d49 kg, find the average weight of the whole class. ";
		

		$qanswer[49]=round((($a49*$c49 + $b49*$d49)/($a49+$b49)),2);	




		$a50= rand(500,999);
		$b50=  rand(80,100);
		$c50= rand(50,75);
	
$qtype[50] = "  The distance between two stations A and B is $a50  km. A train covers the journey from A to B at $b50 km per hour and returns back to A with a uniform speed of $c50 km per hour. Find the average speed of train during the whole journey. ";
		

		$qanswer[50]= round(((2*$b50*$c50)/($b50+$c50)),2)  ;	



		$a51= rand(50,100);
		$b51=  rand(30,90);
		$c51= rand(20,50);
		$d51= rand(20,50);
	
$qtype[51] = "  The average of $a51 numbers is $b51 . If two numbers, $c51 and $d51 are discarded, then the average of the remaining numbers is nearly: ";
		

		$qanswer[51]=round(((($a51*$b51)-($c51+$d51))/($a51-2)),2)  ;	






		$a52= rand(10,15);
		$b52=  rand(50,100);
		$c52= rand((int)($a52/2)+1,8);
		$d52= (int) ($a52*($b52/$c52))- rand(50,70);
		$e52= $a52-$c52;
	
$qtype[52] = "  The average score of a cricketer for $a52 matches is $b52 runs. If the average for the first $c52 matches is $d52 ,then find the average for the last $e52 matches. ";
		

		$qanswer[52]=round(((($a52*$b52)-($c52*$d52))/($e52)),2)  ;		

	

		$a53= rand(40,60);
		$b53=  rand(5,10);
		$c53= $a53+ rand(5,10);
		$d53= rand(2,5);

	
$qtype[53] = " There were $a53 students in a hostel. Due to the admission of $b53 new students the expenses of  the  mess  were  increased  by  Rs $c53  per  day  while  the  average  expenditure  per  head diminished by Rs $d53 . What was the original expenditure of the mess? ";
		

		$qanswer[53]=round(((($c53 + $a53*$d53 + $b53*$d53)*$a53)/($b53)),2);

	

		$a54= rand(5,10);
		$b54= $a54-1;
		$c54=  rand(40,100);
		$d54= $a54;
		$e54= rand(10,20);
	
$qtype[54] = " $a54 persons went to a hotel for taking their meals. $b54 of them spent Rs. $c54 each on their meals and the $d54 th spent Rs. $e54 more than the average expenditure of all the nine. What was the total money spent by them. ";
		

		$qanswer[54]= round(($a54*(($e54+$c54*$b54)/($a54-1))),1) ;		

	



	      		//probability


		$a55[0]= rand(-10,10);
		$a55[1]=  rand(-10,10);
		$a55[2]= rand(-10,10);
		$a55[3]= rand(-10,10);
		$a55[4]= rand(-10,10);
		$a55[5] = rand(-10,10);
		$a55[6] = rand(-10,10);
		$a55[7]= rand(-10,10);
		$a55[8]= rand(-10,10);
		$a55[9]= rand(-10,10);
		$a55[10]= rand(-10,10);
		$a55[11]= rand(-10,10);
		$a55[12]= rand(-10,10);
		$a55[13]= rand(-10,10);
		$a55[14]= rand(-10,10);
		$b55 = rand(2,6);	
		$signs= array("<",">","=","<=",">=");
		$sign55 = $signs[rand(0,4)];		
		
$qtype[55] = "  A number X is chosen at random from the numbers 
$a55[0],$a55[1],$a55[2], $a55[3], $a55[4], $a55[5], $a55[6], $a55[7], $a55[8], $a55[9], $a55[10], $a55[11], $a55[12], $a55[13], $a55[14]. What is the probability that |x| $sign55 $b55 ";
			$fav55=0;

		for ($i55=0;$i55<15;$i55++)	
	{
		switch($sign55){
			case "<":if (abs($a55[$i55]) < $b55)
				$fav55+=1;
				break;
			case ">":if (abs($a55[$i55]) > $b55)
				$fav55+=1;
				break;
			case "=":if (abs($a55[$i55]) == $b55)
				$fav55+=1;
				break;
			case "<=":if (abs($a55[$i55]) < $b55||abs($a55[$i55]) == $b55)
				$fav55+=1;
				break;
			case ">=":if (abs($a55[$i55]) > $b55||abs($a55[$i55]) == $b55)
				$fav55+=1;
				break;
			default: echo " "; 
				break;
			
		

		}
	}	
		$qanswer[55]="$fav55/15";	

	

		$a56[0]= rand(1,5);
		$a56[1]=  rand(1,5);
		$a56[2]= rand(1,5);
		$b56[0]=rand(1,10);
		$b56[1]=rand(1,10);
		$b56[2]=rand(1,10);
		$c56 =rand(10,15);
		$sign56 = $signs[rand(0,4)];

$qtype[56] = "  A number is selected from the numbers $a56[0], $a56[1], $a56[2] and then a second number  y is randomly selected from the numbers $b56[0], $b56[1], $b56[2].  What is the probability that the product xy of the two numbers $sign56 $c56 ? ";
		
$fav56=0;
for ($i56=0;$i56<3;$i56++)	
	for ($j56=0;$j56<3;$j56++)
	{
		switch($sign56){
			case "<":if (($a56[$i56])*($b56[$j56]) < $c56)
				$fav56+=1;
				break;
			case ">":if (($a56[$i56])*($b56[$j56]) > $c56)
				$fav56+=1;
				break;
			case "=":if (($a56[$i56])*($b56[$j56]) == $c56)
				$fav56+=1;
				break;
			case "<=":if (($a56[$i56])*($b56[$j56]) < $c56||($a56[$i56])*($b56[$j56]) == $c56)
				$fav56+=1;
				break;
			case ">=":if (($a56[$i56])*($b56[$j56]) > $c56||($a56[$i56])*($b56[$j56]) == $c56)
				$fav56+=1;
				break;
			default: echo " "; 
				break;
			
		

		}
	}

	
		$qanswer[56] = "$fav56/9";



		
		
		$a57= rand(1,12);
		$sign57 = $signs[rand(0,4)];

$qtype[57] = "  Two dice are rolled, find the probability that the sum is $sign57 $a57 ";
		
$fav57=0;
for ($i57=1;$i57<=6;$i57++)	
	for ($j57=1;$j57<=6;$j57++)
	{
		switch($sign57){
			case "<":if (($i57+$j57)  < $a57)
				$fav57+=1;
				break;
			case ">":if (($i57+$j57)  > $a57)
				$fav57+=1;
				break;
			case "=":if (($i57+$j57)  == $a57)
				$fav57+=1;
				break;
			case "<=":if (($i57+$j57) < $a57||($i57+$j57) == $a57)
				$fav57+=1;
				break;
			case ">=":if (($i57+$j57) > $a57||($i57+$j57) == $a57)
				$fav57+=1;
				break;
			default: echo " "; 
				break;
				}

	}


	
		$qanswer[57] = "$fav57/36";


		$a58= rand(1,10);
		$cards58 = array("clubs","diamonds","hearts","spades");
		$b58 = $cards58[rand(0,3)];

		
	
$qtype[58] = " A card is drawn at random from a deck of cards. Find the probability of getting the $a58 of $b58. ";

		
		$qanswer[58] = "1/36";




		$cards59 = array("jack","queen","king");
		$a59 = $cards59[rand(0,2)];

		
	
$qtype[59] = " A card is drawn at random from a deck of cards. Find the probability of getting a $a59. ";

		
		$qanswer[59] = "1/13";




		$a60= rand(1,10);
		$b60 = rand(1,10);
		$c60= rand(1,10);
		$color_op60= array("red","green","white");
		$color60 = $color_op60[rand(0,2)];

$qtype[60] = " A jar contains $a60 red marbles, $b60 green marbles and $c60 white marbles. If a marble is drawn from the jar at random, what is the probability that this marble is $color60 ? ";
		$total60=$a60+$b60+$c60;
		switch($color60){
			case "red":$qanswer[60]= "$a60/$total60";
				break;
			case "green":$qanswer[60]= "$b60/$total60";
				break;
			case "white":$qanswer[60]= "$c60/$total60";
				break;
	
			default: echo " "; 
				break;
				}


		$a61= rand(30,100);
		$b61 = rand(30,100);
		$c61= rand(30,100);
		$d61 = rand(30,100);
		$blood_op61= array("A","B","O","AB");
		$blood61 = $blood_op61[rand(0,3)];


$total61=$a61+$b61+$c61+$d61;
$qtype[61] = " The blood groups of $total61 people is distributed as follows: $a61 have type A blood, $b61 have B blood type, $c61 have O blood type and $d61 have type AB blood. If a person from this group is selected at random, what is the probability that this person has $blood61 blood type? ";
		
		switch($blood61){
			case "A":$qanswer[61]= "$a61/$total61";
				break;
			case "B":$qanswer[61]= "$b61/$total61";
				break;
			case "O":$qanswer[61]= "$c61/$total61";
				break;
			case "AB":$qanswer[61]= "$d61/$total61";
				break;
			default: echo " "; 
				break;
				}




		$a62= rand(5,10);
		$b62=  rand(5,10);
		$total62=$a62+$b62;
	
$qtype[62] = "  A bag contains $a62 white and $b62 black balls. Two balls are drawn at random. Find the probability that they are of the same colour. ";
		
	
		
	$numer62 = n_c_r($a62,2) + n_c_r($b62,2);

	$denom62= n_c_r($total62,2);

	$qanswer[62]= "$numer62/$denom62";



		$cards63 = array("black","red");
		$a63 = $cards63[rand(0,1)];
		$cards_63 = array("jack","queen","king");
		$b63 = $cards_63[rand(0,2)];
		$op63= array("either both are $a63 and both are $b63.","both are $a63.","both are $b63.","they are $a63 $b63.");
		$op_63= $op63[rand(0,3)];
	
$qtype[63] = " Two cards are drawn at random from a pack of 52 cards. What is the probability that $op_63 ";

			switch($op_63)
				{

				case $op63[0]: $qanswer[63]="330/1326";
						break;
				
				case $op63[1]: $qanswer[63]="325/1326";
						break;
				
				case $op63[2]: $qanswer[63]="6/1326";
						break;
				case $op63[3]: $qanswer[63]="1/1326";
						break;
				default : echo "";

		
				}




		//	Heights and Distance

		$angle64=array("30","45","60");
		$a64= $angle64[rand(0,2)];
		$b64=  rand(10,40);

		
	
$qtype[64] = " A ladder learning against a wall makes an angle of
$a64 degrees with the ground. If the length of the ladder is $b64 m, find the distance of the foot of the ladder from the wall. ";

		
		$qanswer[64] = round(((cos($a64*pi()/180))*$b64),1);




		$angle65=array("root 3","1","1/(root 3)");
		$a65= $angle65[rand(0,2)];

		
	
$qtype[65] = " The angle of elevation of the sun, when the length of the shadow of a tree is $a65 times the height of the tree is. ";

		switch($a65){

		case $angle65[0]:$qanswer[65] = "30 degree";
				break;
		case $angle65[1]:$qanswer[65] = "45 degree";
				break;
		case $angle65[2]:$qanswer[65] = "60 degree";
				break;
		default:echo "";

		}




		$angle66=array("30","45","60");
		$a66= $angle66[rand(0,2)];
		$b66=  rand(10,40);

		
	
$qtype[66] = " A man is walking along a straight road. He not
ices the top of a tower subtending an angle A = $a66 degree with the ground at the point where he is standing. If the height of the tower is h = $b66 m, then what is the distance (in meters) of the man from the tower? ";

		
		$qanswer[66] = round(($b66/tan($a66*pi()/180)),2);



		$angle67=array("30","45","60");
		$a67=  rand(10,50);
		$b67= $angle67[rand(1,2)];
		$c67= 30;

		
	
$qtype[67] = " Two towers face each other separated by a distance
d = $a67 m. As seen from the top of the first tower, the angle of depression of the second towers base is $b67 degree and that of the top is $c67 degree .What is the height (in meters) of the second tower? ";

		
		$qanswer[67] = round($a67*(tan($b67*pi()/180)-tan($c67*pi()/180)),2);




		$angle68=array("30","45","60");
		$a68= $angle68[rand(0,1)];
		$b68=  ($a68==30?45:60);
		$c68=rand(10,50);
		
	
$qtype[68] = " Two men on opposite sides
of a TV tower of height $c68 m notice the angle of elevation of the top of this tower to be $a68 degree and $b68 degree respectively. Find the distance (in meters) between the two men. ";

		
		$qanswer[68] = round(($c68/tan($a68*pi()/180))+($c68/tan($b68*pi()/180)),2);





		$angle69=array("30","45","60");
		$a69= $angle69[rand(0,1)];
		$b69=  ($a69==30?45:60);
		$c69=rand(2,9);
		
	
$qtype[69] = " A statue, $c69 m tall, stands on the top of a pedestal. From a point on the ground, the angle of elevation of the top of the statue is $b69 degree and from the same point the angle of elevation of the top of the pedestal is $a69 degree. Find the height of the pedestal. ";

		
		$qanswer[69] = round(($c69/(tan($b69*pi()/180)-tan($a69*pi()/180))),2);





				//Sequence and Series

		$a70 = rand(1,50);
		$b70 = rand(2,5);
		$c71 = rand(3,6);
		$no_70 = array("$a70");
		for ($i70=1;$i70<=6;$i70++)
		{
		$no_70[$i70]= $no_70[$i70-1]+$b70+($c71*($i70-1));
		}
	

$qtype[70] = " Which number would replace underline mark in the series? 
		$no_70[0], $no_70[1], $no_70[2], $no_70[3], ---, $no_70[5]  ";


		$qanswer[70]=$no_70[4];



		$a71 = rand(1,10);
		$b71 = rand(2,6);
		$c71 = rand(2,5);
		$no_71 = array("$a71");
		for ($i71=1;$i71<=6;$i71++)
		{
		$no_71[$i71]= $no_71[$i71-1]+$b71*pow($c71,$i71-1);
		}
	

$qtype[71] = " Which number would replace underline mark in the series? 
		$no_71[0], $no_71[1], $no_71[2], $no_71[3], ---, $no_71[5]  ";


		$qanswer[71]=$no_71[4];




		$a72 = rand(1,5);
		$b72 = rand(10,20);
		$no_72 = array("$a72");
		for ($i72=1;$i72<=6;$i72++)
		{
		$no_72[$i72]= $no_72[$i72-1]+$b72*$i72;
		}
	

$qtype[72] = " Which number would replace underline mark in the series? 
		$no_72[0], $no_72[1], $no_72[2], $no_72[3], ---, $no_72[5]  ";


		$qanswer[72]=$no_72[4];



		$a73 = rand(1,20);
		$b73 = rand(7,11);
		$no_73 = array("$a73");
		for ($i73=1;$i73<=6;$i73++)
		{
		$no_73[$i73]= $no_73[$i73-1]*$b73--;
		
		}
	

$qtype[73] = " Which number would replace underline mark in the series? 
		$no_73[0], $no_73[1], $no_73[2], $no_73[3], ---, $no_73[5]  ";


		$qanswer[73]=$no_73[4];


		

		$a74 = rand(1,20);
		$b74 = rand(7,11);
		$no_74 = array("$a74");
		$no_74[1]=$a74+rand(2,5);
		for ($i74=2;$i74<=7;$i74++)
		{
		$no_74[$i74]= $no_74[$i74-1]+$b74;
		
		}
	

$qtype[74] = " What numbers should come next ?
 
		$no_74[0], $no_74[1], $no_74[2], $no_74[0], $no_74[3], $no_74[4] , $no_74[0],  ---  ";


		$qanswer[74]="$no_74[5], $no_74[6]";



		$a75 = rand(100,150);
		$b75 = rand(2,10);
		$no_75 = array("$a75");
		for ($i75=1;$i75<=7;$i75++)
		{
		$no_75[$i75]= $no_75[$i75-1]-$b75;
		
		}
	

$qtype[75] = " What numbers should come next ?
 
		$no_75[0], $no_75[0], $no_75[1], $no_75[1], $no_75[2], $no_75[2], $no_75[3]  ";


		$qanswer[75]="$no_75[3], $no_75[4]";


		$a76 = rand(20,100);
		$b76 = rand(5,10);
		$c76 = rand(1,4);
		$no_76 = array("$a76");
		for ($i76=1;$i76<=6;$i76++)
		{if ($i76%2!=0)
		$no_76[$i76]= $no_76[$i76-1]+$b76;
		else
		$no_76[$i76]= $no_76[$i76-1]-$c76;
		}
	

$qtype[76] = " Which number would replace underline mark in the series? 
		$no_76[0], $no_76[1], $no_76[2], $no_76[3], $no_76[4], $no_76[5]  , ---";


		$qanswer[76]=$no_76[6];




		$a77 = rand(1,2);
		$b77 = rand(1,4);
		$no_77 = array("$a77");
		for ($i77=1;$i77<=6;$i77++)
		{if ($i77%2!=0)
		$no_77[$i77]= $no_77[$i77-1]*$no_77[$i77-1]+$b77;
		else
		$no_77[$i77]= $no_77[$i77-1]*$no_77[$i77-1]-$b77;
		}
	

$qtype[77] = " Which number would replace underline mark in the series? 
		$no_77[0], $no_77[1], $no_77[2], ---, $no_77[4]  ";


		$qanswer[77]=$no_77[3];




		$a78 = rand(1,3);
		$b78= rand(1,5);
		$no_78 = array();
		for ($i78=0;$i78<=6;$i78++)
		{
		$no_78[$i78]=($a78)*($a78)+$b78;
		$a78=$a78+2;
		}
	

$qtype[78] = " Which number would replace underline mark in the series? 
		$no_78[0], $no_78[1], $no_78[2], ---, $no_78[4]  ";


		$qanswer[78]=$no_78[3];



		$a79 = rand(7,11);
		$b79= rand(2,4);
		$c79= rand(1,3);
		$no_79 = array("$a79");
		for ($i79=1;$i79<=6;$i79++)
		{
		$no_79[$i79]= ($no_79[$i79-1]*$b79)-$c79++;
		}
	

$qtype[79] = " Which number would replace underline mark in the series? 
		$no_79[0], $no_79[1], $no_79[2], $no_79[3],  ---, $no_79[5]  ";


		$qanswer[79]=$no_79[4];


		$a80 = rand(10,100);
		$b80 = rand(5,10);
		$c80 = rand(1,4);
		$no_80 = array("$a80");
		for ($i80=1;$i80<=6;$i80++)
		{if ($i80%2!=0)
		$no_80[$i80]= $no_80[$i80-1]+$b80;
		else
		$no_80[$i80]= $no_80[$i80-1]+$c80;
		}
	

$qtype[80] = " Which number would replace underline mark in the series? 
		$no_80[0], $no_80[1], $no_80[2], $no_80[3], $no_80[4], $no_80[5]  , ---";


		$qanswer[80]=$no_80[6];








			//Number System


		$no_81=array();
		$div_81=array(0,0,0,0);
		for ($i81=0;$i81<4;$i81++)
		{
			$no_81[$i81] = rand(20,100);
			
			 for($j81=1; $j81 < $no_81[$i81]; $j81++) 					{
  		 if ($no_81[$i81] % $j81 == 0)
			 $div_81[$i81]++;
 				}

		}


		
	
$qtype[81] = " Which of the following has most number of divisors?
 	$no_81[0], $no_81[1], $no_81[2], $no_81[3]		";

		
				$max_81=max($div_81[0], $div_81[1], $div_81[2], $div_81[3]);
		
		switch($max_81){
				case $div_81[0]: $qanswer[81]=$no_81[0];
						break;
				
				case $div_81[1]: $qanswer[81]=$no_81[1];
						break;
				
				case $div_81[2]: $qanswer[81]=$no_81[2];
						break;
				case $div_81[3]: $qanswer[81]=$no_81[3];
						break;
				default : echo "";

				}



		$a82= rand(100,500);
		$b82= $a82+rand(100,300);
		$h_82 = $a82>200?0:200-$a82;
		$t_82=0;
		$o_82=0;
		for($i82=$a82;$i82<=$b82;$i82++)
		{
		 if($i82%100>9&&$i82%100<20)
		$t_82++;

		}				
		for($i82=$a82;$i82<=$b82;$i82++)
		{
		if($i82%10==1)
		$o_82++;

		}				
$qtype[82] = " A girl wrote all the numbers from $a82 to $b82. Then she started counting the number of ones that has been used while writing all these numbers. What is the number that she got? ";
		

		$qanswer[82]=$h_82+$t_82+$o_82;




		$n1_83=rand(5,40);
		$n2_83=$n1_83*rand(2,10);
		$a83= lcm($n1_83,$n2_83);
		$r83=$n1_83;
		$r183=$n2_83;
		for($z83=$r83;$z83>1;$z83--) {
  if(($r83%$z83)==0 && ($r183 % $z83)==0) {
    $r83 = $r83/$z83;
    $r183 = $r183/$z83;
  }
}
		
		
		
$qtype[83] = " The LCM of two numbers is $a83 and their ratio is $r83:$r183. The two numbers are ";
			

		$qanswer[83]="$n1_83 and $n2_83";





		$a84= rand(2,7);
		
$qtype[84] = " The product of $a84 consecutive even numbers is always divisible by: ";
		

		$qanswer[84]=pow(2,$a84)*fact($a84);




		$a85= rand(1,2);
		$b85= rand(1,10);
		$c85= rand(1,3);
		$d85= rand(1,15);
		$e85= rand(2,5);
		
$qtype[85] = " What number should be subtracted from $a85.x^3+$b85.x^2 - $c85.x+$d85, if it is to be perfectly divisible by x+$e85?
 ";
		

		$qanswer[85]=($a85*pow(-$e85,3))+($b85*pow(-$e85,2))-($c85*(-$e85))+$d85;


		$a86= rand(4,6);
		$b86=$b_86= rand(1,10);
		$oa86=$na86=0;
$qtype[86] = " A set has exactly $a86 consecutive positive integers starting with $b86 . What is the percentage decrease in the average of the numbers when the greatest one of the numbers is removed from the set? ";
		for ($i86=0;$i86<$a86;$i86++)		
		{
		$oa86+=$b86;
		$b86++;
		}
		$oa86=$oa86/$a86;
		for ($i86=0;$i86<$a86-1;$i86++)		
		{
		$na86+=$b_86;
		$b_86++;
		}
		$na86=$na86/($a86-1);

		$qanswer[86]=round((($oa86- $na86)/$oa86)*100,2);




		$a87= 10*rand(50,90);
		$b87=rand(6,8);
		$c87 = rand(9,12);
		$d87=rand(2,5);
		
		
$qtype[87] = " How many natural numbers below $a87 are divisible by $b87 and $c87 but not by $d87 ? ";
		

		$qanswer[87]=floor(($a87-1)/($b87*$c87)) - floor((floor(($a87-1)/($b87*$c87))/$d87)) ;






		$a88= rand(5,9)*rand(2,9);
		$sum88= array();
		$k88=0;
		
$qtype[88] = " Which one of the following is the minimum value of the sum of two integers whose product is $a88 ?";
		
		for ($i88=1;$i88<=$a88/2;$i88++)
		{	for($j88=1;$j88<=$a88/2;$j88++)
			{
			if ($i88*$j88==$a88)
				{$sum88[$k88++]=$i88+$j88;
				}
			}
		}

			

		$qanswer[88]=min($sum88);

				


			//Quadratic Equations


		$x1_89= rand(-10,10);
		$y1_89= rand(-10,10);
		$x2_89= rand(-10,10);
		$y2_89= rand(-10,10);
		$a_189=rand(1,10);
		$a_289=rand(1,10);
		$b_189=(-($x1_89+$x2_89))*$a_189;
		$b_289=(-($y1_89+$y2_89))*$a_289;
		$c_189=($x1_89*$x2_89)*$a_189;
		$c_289=($y1_89*$y2_89)*$a_289;

if ($b_189<0&&$c_189<0)
$eq1_89="$a_189.x^2  $b_189.x  $c_189";
else if ($b_189<0&&$c_189>0)
$eq1_89="$a_189.x^2  $b_189.x + $c_189";
else if ($b_189>0&&$c_189<0)
$eq1_89="$a_189.x^2 + $b_189.x  $c_189";
else 
$eq1_89="$a_189.x^2 + $b_189.x + $c_189";

if ($b_289<0&&$c_289<0)
$eq2_89="$a_289.x^2  $b_289.x  $c_289";
else if ($b_289<0&&$c_289>0)
$eq2_89="$a_289.x^2  $b_289.x + $c_289";
else if ($b_289>0&&$c_289<0)
$eq2_89="$a_289.x^2 + $b_289.x  $c_289";
else 
$eq2_89="$a_289.y^2 + $b_289.y + $c_289";

$qtype[89] = " I.  $eq1_89    </br>        II.   $eq2_89  ";
		
	if(($x1_89>$y1_89)&&($x1_89>$y2_89)&&($x2_89>$y1_89)&&($x2_89>$y2_89))
		$qanswer[89]=" X >Y ";
	else if(($x1_89<$y1_89)&&($x1_89<$y2_89)&&($x2_89<$y1_89)&&($x2_89<$y2_89))
		$qanswer[89]=" Y >X ";
	else if(($x1_89<$y1_89||$x1_89==$y1_89)&&($x1_89<$y2_89||$x1_89==$y2_89)&&($x2_89<$y1_89||$x2_89==$y1_89)&&($x2_89<$y2_89||$x2_89==$y2_89)) 
		$qanswer[89]=" X <= Y ";
	else if(($x1_89>$y1_89||$x1_89==$y1_89)&&($x1_89>$y2_89||$x1_89==$y2_89)&&($x2_89>$y1_89||$x2_89==$y1_89)&&($x2_89>$y2_89||$x2_89==$y2_89))
		$qanswer[89]="  Y<= X ";
	else
		$qanswer[89]="X = Y or relationship cannot be established.";





			//Surds and Indices 

		$a90=rand(2,7);
		$a290= pow($a90,2);
		$parr90=array("2","3","5","6","7","8","10","11","12","13","14","15","17","18","19","20","21","22","23","24","26","27","28","29","30");
		

		$p90=rand(1,count($parr90));
		$c90=$a290*$p90;
		
		
$qtype[90] = " Write the following in the form a.root(p)  </br>
		root($c90) ";
		

		$qanswer[90]="$a90 root($p90) " ;




		$a91= pow(rand(5,15),3);
		
		
		
$qtype[91] = " What is the cube root of $a91 ? ";
		

		$qanswer[91]=pow($a91,(1/3)) ;




					//Mixture and Alligation 


		$a92=100* rand(3,9);
		$b92= 10*rand(2,4);
		$c92= $b92+ 10*rand(1,5);
		$d92 =100-$c92;
		$e92= $c92-$b92;
$qtype[92] = "$a92 gm spirit solution has $b92 % spirit in it , How may grams of spirit should be added to make it $c92 % in the solution ? ";
		for($z92=$e92;$z92>1;$z92--) {
  if(($d92%$z92)==0 && ($e92 % $z92)==0) {
    $d92 = $d92/$z92;
    $e92 = $e92/$z92;
  }
}
		
		$qanswer[92] = round($a92*$e92/$d92,2);




		$a93=5*rand(4,8);
		$b93=$a93+5*rand(2,4);
		$c93= rand(10,20);
		$d93= rand(4,6);
		$e93= $d93+rand(3,6);
	
$qtype[93] = "A milk vendor has 2 cans of milk. The first contains $a93 % water and the rest milk. The second contains $b93 % water. How much milk should he mix from each of the containers so as to get $c93 litres of milk such that the ratio of water to milk is $d93 : $e93 ? ";

		$cp_93a=(100-$a93)/100;
		$cp_93b=(100-$b93)/100;
		$mean93=$e93/($d93+$e93);
		$r93_a=abs($cp_93b-$mean93);
		$r93_b=abs($mean93-$cp_93a);
		$ans_93a=round(($c93*$r93_a)/($r93_a+$r93_b),1);
		$ans_93b=round(($c93*$r93_b)/($r93_a+$r93_b),1);


		$qanswer[93] = " $ans_93a litres, $ans_93b litres" ;



		$a94=5*rand(2,5);
		$b94=5*rand(6,14);
		$c94=$a94+5*rand(2,5);
	
$qtype[94] = " A painter mixes blue paint with white paint so that the mixture contains $a94 % blue paint.In a mixture of $b94 litres paint how many litres blue paint should be added so that the mixture contains $c94 % of blue paint.";

		

		$qanswer[94] =round( $b94*($c94-$a94)/(100-$c94),1);



		$a95=5*rand(2,5);
		$b95=$a95+5*rand(1,3);
		$c95=rand(2,5);
		$d95=$c95+rand(1,3);


$qtype[95] = " The cost of Type 1 rice is Rs. $a95 per kg and Type 2 rice is Rs.$b95 per kg. If both Type 1 and Type 2 are mixed in the ratio of $c95 : $d95, then the price per kg of the mixed variety of rice is: ";

		

		$qanswer[95] =round((($b95*$d95) +($a95*$c95))/($c95+$d95) ,2);





		$a96=rand(5,15);
		$b96=rand(2,4);
		$e96=rand(2,3);
		$f96=$e96+rand(1,3);
		$c96=pow($e96,$b96+1);
		$d96=pow($f96,$b96+1);


$qtype[96] = "$a96 litres are drawn from a cask full of wine and is then filled with water. This operation is performed $b96 more times. The ratio of the quantity of wine now left in cask to that of water is $c96 : $d96. How much wine did the cask hold originally? ";

		

		$qanswer[96] =round($a96/(1-$e96/($f96)),1);






			//Mensuration


		$a97=rand(10,50);
		$b97=rand(10,50);

		
$qtype[97]= " The base of a rectangle is $a97 units and the height is $b97 units. What will be the area of the right-angled triangle constructed on the same base and height?";

		$qanswer[97]= 0.5*$a97*$b97;





		$a98=rand(10,50);
		$b98=rand(300,500);

		
$qtype[98]= " The base of a parallelogram is $a98 units and the area of the isosceles triangle constructed on the same base between the parallel lines of the parallelogram is $b98 square units. Then the vertical distance between the parallel lines is :";

		$qanswer[98]= round(((2*($b98))/$a98),2) ;



		$a99=5*rand(4,8);
		$b99=5*rand(1,5);

		
$qtype[99]= "The length and breadth of a rectangle are increased by $a99 % and $b99 %, respectively. Find the percentage increase in its area? ";

		$qanswer[99]= ((((100+$a99)/100)*((100+$b99)/100)) -1)*100;











// options assignment 

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



$arr = array(rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]),rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]),rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]),rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]),rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]),rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]),rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]),rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]),rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]),rand($qanswer[6]/2,$qanswer[6]+$qanswer[6]));
	$qop[6][0]="$arr[0] : $arr[4] ";
	$qop[6][1]="$arr[3] : $arr[1] ";
	$qop[6][2]="$arr[5] : $arr[2] ";
	$qop[6][3]="$arr[6] : $arr[7] ";
	$qop[6][4]="$arr[9] : $arr[8] ";

$arr1= array(rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]),rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]),rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]),rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]),rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]),rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]),rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]),rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]),rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]),rand($qanswer[35]/2,$qanswer[35]+$qanswer[35]+$qanswer[35]));
	$qop[35][0]="$arr1[0] : $arr1[4] ";
	$qop[35][1]="$arr1[3] : $arr1[1] ";
	$qop[35][2]="$arr1[5] : $arr1[2] ";
	$qop[35][3]="$arr1[6] : $arr1[7] ";
	$qop[35][4]="$arr1[9] : $arr1[8] ";

$qop550=rand(1,3);
$qop551=rand(9,11);
$qop552=rand(4,6);
$qop553=rand(12,15);
$qop554=rand(7,8);


$qop[55][0]= "$qop550/15"  ;
	$qop[55][1]="$qop551/15" ;
	$qop[55][2]= "$qop552/15" ;
	$qop[55][3]=  "$qop553/15" ;
	$qop[55][4]=  "$qop554/15" ;

$qop560=rand(1,9);
$qop561=rand(1,9);
$qop562=rand(1,9);
$qop563=rand(1,9);
$qop564=rand(1,9);


$qop[56][0]= "$qop560/9"  ;
	$qop[56][1]="$qop561/9" ;
	$qop[56][2]= "$qop562/9" ;
	$qop[56][3]=  "$qop563/9" ;
	$qop[56][4]=  "$qop564/9" ;

$qop570=rand(1,20);
$qop571=rand(1,20);
$qop572=rand(1,20);
$qop573=rand(1,20);
$qop574=rand(1,20);

$qop[57][0]= "$qop570/36"  ;
	$qop[57][1]="$qop571/36" ;
	$qop[57][2]= "$qop572/36" ;
	$qop[57][3]=  "$qop573/36" ;
	$qop[57][4]=  "$qop574/36" ;	


$qop580=rand(2,10);
$qop581=rand(2,10);
$qop582=rand(2,10);
$qop583=rand(2,10);
$qop584=rand(2,10);

$qop[58][0]= "$qop580/36"  ;
	$qop[58][1]="$qop581/36" ;
	$qop[58][2]= "$qop582/36" ;
	$qop[58][3]=  "$qop583/36" ;
	$qop[58][4]=  "$qop584/36" ;


$qop590=rand(2,10);
$qop591=rand(2,10);
$qop592=rand(2,10);
$qop593=rand(2,10);
$qop594=rand(2,10);

$qop[59][0]= "$qop590/13"  ;
	$qop[59][1]="$qop591/13" ;
	$qop[59][2]= "$qop592/13" ;
	$qop[59][3]=  "$qop593/13" ;
	$qop[59][4]=  "$qop594/13" ;

$qop600=rand(min($a60,$b60,$c60),$total60);
$qop601=rand(min($a60,$b60,$c60),$total60);
$qop602=rand(min($a60,$b60,$c60),$total60);
$qop603=rand(min($a60,$b60,$c60),$total60);
$qop604=rand(min($a60,$b60,$c60),$total60);


$qop[60][0]= "$qop600/$total60"  ;
	$qop[60][1]="$qop601/$total60" ;
	$qop[60][2]= "$qop602/$total60" ;
	$qop[60][3]=  "$qop603/$total60" ;
	$qop[60][4]=  "$qop604/$total60" ;


$qop610=rand(min($a61,$b61,$c61,$d61),$total61);
$qop611=rand(min($a61,$b61,$c61,$d61),$total61);
$qop612=rand(min($a61,$b61,$c61,$d61),$total61);
$qop613=rand(min($a61,$b61,$c61,$d61),$total61);
$qop614=rand(min($a61,$b61,$c61,$d61),$total61);

$qop[61][0]= "$qop610/$total61"  ;
	$qop[61][1]="$qop611/$total61" ;
	$qop[61][2]= "$qop612/$total61" ;
	$qop[61][3]=  "$qop613/$total61" ;
	$qop[61][4]=  "$qop613/$total61" ;

$qop620=rand(5,$numer62);
$qop621=rand(5,$numer62);
$qop622=rand(5,$numer62);
$qop623=rand(5,$numer62);
$qop624=rand(5,$numer62);


$qop[62][0]= "$qop620/$denom62"  ;
	$qop[62][1]="$qop621/$denom62" ;
	$qop[62][2]= "$qop622/$denom62" ;
	$qop[62][3]=  "$qop623/$denom62" ;
	$qop[62][4]=  "$qop624/$denom62" ;


$qop630=rand(7,250);
$qop631=rand(2,5);
$qop632=rand(7,100);
$qop633=rand(110,150);
$qop634=rand(70,100);


$qop[63][0]= "$qop630/1326"  ;
	$qop[63][1]="$qop631/1326" ;
	$qop[63][2]= "$qop632/1326" ;
	$qop[63][3]=  "$qop633/1326" ;
	$qop[63][4]=  "$qop634/1326" ;

$qop650= array("30 degree","45 degree","60 degree","90 degree","None of these");

$qop[65][0]= $qop650[0];
	$qop[65][1]=$qop650[1];
	$qop[65][2]= $qop650[2] ;
	$qop[65][3]=  $qop650[3];
	$qop[65][4]=  $qop650[4];

$qop[70][0]= rand($no_70[3]+1,$no_70[5]-1);
	$qop[70][1]=rand($no_70[3]+1,$no_70[5]-1);
	$qop[70][2]=rand ($no_70[3]+1,$no_70[5]-1);
	$qop[70][3]= rand ($no_70[3]+1,$no_70[5]-1);
	$qop[70][4]= rand ($no_70[3]+1,$no_70[5]-1);

$qop[72][0]= rand($no_72[3]+1,$no_72[5]-1);
	$qop[72][1]=rand($no_72[3]+1,$no_72[5]-1);
	$qop[72][2]=rand ($no_72[3]+1,$no_72[5]-1);
	$qop[72][3]= rand ($no_72[3]+1,$no_72[5]-1);
	$qop[72][4]= rand ($no_72[3]+1,$no_72[5]-1);



$qop740a=rand($no_74[4]+1,$no_74[6]-1);$qop740b=rand($no_74[5]+1,$no_74[7]-1);
$qop741a=rand($no_74[4]+1,$no_74[6]-1);$qop741b=rand($no_74[5]+1,$no_74[7]-1);
$qop742a=rand ($no_74[4]+1,$no_74[6]-1);$qop742b=rand($no_74[5]+1,$no_74[7]-1);
$qop743a=rand ($no_74[4]+1,$no_74[6]-1);$qop743b=rand($no_74[5]+1,$no_74[7]-1);
$qop744a=rand ($no_74[4]+1,$no_74[6]-1);$qop744b=rand($no_74[5]+1,$no_74[7]-1);

$qop[74][0]= "$qop740a, $qop740b";
	$qop[74][1]="$qop741a, $qop741b";
	$qop[74][2]="$qop742a, $qop742b";
	$qop[74][3]= "$qop743a, $qop743b";
	$qop[74][4]= "$qop744a, $qop744b";

		$qop750a=rand($no_75[2]+1,$no_75[4]-1);$qop750b=rand($no_75[3]+1,$no_75[5]-1);
$qop751a=rand($no_75[2]+1,$no_75[4]-1);$qop751b=rand($no_75[3]+1,$no_75[5]-1);
$qop752a=rand ($no_75[2]+1,$no_75[4]-1);$qop752b=rand($no_75[3]+1,$no_75[5]-1);
$qop753a=rand ($no_75[2]+1,$no_75[4]-1);$qop753b=rand($no_75[3]+1,$no_75[5]-1);
$qop754a=rand ($no_75[2]+1,$no_75[4]-1);$qop754b=rand($no_75[3]+1,$no_75[5]-1);



$qop[75][0]= "$qop750a, $qop750b";
	$qop[75][1]="$qop751a, $qop751b";
	$qop[75][2]="$qop752a, $qop752b";
	$qop[75][3]= "$qop753a, $qop753b";
	$qop[75][4]= "$qop754a, $qop754b";

$qop[76][0]= rand($no_76[0],$no_76[0]*4);
	$qop[76][1]=rand($no_76[0],$no_76[0]*4);
	$qop[76][2]=rand ($no_76[0],$no_76[0]*4);
	$qop[76][3]= rand ($no_76[0],$no_76[0]*4);
	$qop[76][4]= rand ($no_76[0],$no_76[0]*4);

$qop810= array("$no_81[0]","$no_81[1]", "$no_81[2]", "$no_81[3]","None of these");

$qop[81][0]= $qop810[0];
	$qop[81][1]=$qop810[1];
	$qop[81][2]= $qop810[2] ;
	$qop[81][3]=  $qop810[3];
	$qop[81][4]=  $qop810[4];


$arr83 = array(rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]),rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]),rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]),rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]),rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]),rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]),rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]),rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]),rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]),rand($qanswer[83]/2,$qanswer[83]+$qanswer[83]));
	$qop[83][0]="$arr83[0] and $arr83[4] ";
	$qop[83][1]="$arr83[3] and $arr83[1] ";
	$qop[83][2]="$arr83[5] and $arr83[2] ";
	$qop[83][3]="$arr83[6] and $arr83[7] ";
	$qop[83][4]="$arr83[9] and $arr83[8] ";


$qop890= array("X >Y ","Y >X ","X <= Y ","Y<= X ","X = Y or relationship cannot be established ");

$qop[89][0]= $qop890[0];
	$qop[89][1]=$qop890[1];
	$qop[89][2]= $qop890[2] ;
	$qop[89][3]=  $qop890[3];
	$qop[89][4]=  $qop890[4];



$arr90_a = array(rand($a90/2,$a90+$a90),rand($a90/2,$a90+$a90),rand($a90/2,$a90+$a90),rand($a90/2,$a90+$a90),rand($a90/2,$a90+$a90));

$arr90_p = array(rand($p90/2,$p90+$p90),rand($p90/2,$p90+$p90),rand($p90/2,$p90+$p90),rand($p90/2,$p90+$p90),rand($p90/2,$p90+$p90));


	$qop[90][0]="$arr90_a[3] root( $arr90_p[1] ) ";
	$qop[90][1]="$arr90_a[4] root( $arr90_p[3] )";
	$qop[90][2]="$arr90_a[2] root( $arr90_p[0] )";
	$qop[90][3]="$arr90_a[0] root($arr90_p[2] )";
	$qop[90][4]="$arr90_a[1] root( $arr90_p[4] )";



$arr93_a = array(rand($ans_93a/2,$ans_93a+$ans_93a),rand($ans_93a/2,$ans_93a+$ans_93a),rand($ans_93a/2,$ans_93a+$ans_93a),rand($ans_93a/2,$ans_93a+$ans_93a),rand($ans_93a/2,$ans_93a+$ans_93a));

$arr93_p = array(rand($ans_93b/2,$ans_93b+$ans_93b),rand($ans_93b/2,$ans_93b+$ans_93b),rand($ans_93b/2,$ans_93b+$ans_93b),rand($ans_93b/2,$ans_93b+$ans_93b),rand($ans_93b/2,$ans_93b+$ans_93b));


	$qop[93][0]="$arr93_a[3]  litres,$arr93_p[1] litres  ";
	$qop[93][1]="$arr93_a[4] litres, $arr93_p[3] litres ";
	$qop[93][2]="$arr93_a[2] litres, $arr93_p[0] litres ";
	$qop[93][3]="$arr93_a[0] litres,$arr93_p[2] litres ";
	$qop[93][4]="$arr93_a[1]  litres,$arr93_p[4] litres ";












//assign position to answer
	for ($i=0;$i< count($qtype) ; $i++)
		{
		if($i!=65&&$i!=81&&$i!=89){
		$correct_ans_pos[$i]=rand(0,4);
		$qop[$i][$correct_ans_pos[$i]]=$qanswer[$i];
		}
		}



$no_q = count($qtype);

}
$no_q = 100;

// question generator
for ($i=0;$i<$no_q;$i++)

{
question_generate();
$inc=$i+1;
  $random_quesion_type= $i;
print(" Question No. $inc <br> ");

print("Question :      $qtype[$random_quesion_type] <br><br>");

$op= array($qop[$random_quesion_type][0],$qop[$random_quesion_type][1],$qop[$random_quesion_type][2],$qop[$random_quesion_type][3],$qop[$random_quesion_type][4]);

print(" Options are : (a) $op[0]  || (b) $op[1]  || (c) $op[2]  || (d) $op[3] || (e) $op[4]<br><br>");

print("Answer is : $qanswer[$random_quesion_type] <hr><br>");

/*
if($stmt = $mysqli->prepare("INSERT INTO qna (`Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Answer`,) VALUES (?,?,?,?,?,?,?)" )){

	$stmt->bind_param("ss",$qtype[$random_quesion_type]','$op[0] ','$op[1] ','$op[2] ','$op[3] ','$qanswer[$random_quesion_type] ');

	$stmt->execute();
	$stmt->close();


}

*/

}
?>


