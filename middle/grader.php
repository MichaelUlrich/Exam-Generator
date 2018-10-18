<?php


//echo 'post:' . $_POST['answer'] . "<br>";

$pycode=$_POST['studentCode'];

//echo $_POST['studentCode'];

escapeshellarg($pycode);

$pyfile = fopen("newFile.py", "w+") or die("UNABLE TO OPEN FILE");
fwrite($pyfile, $pycode);
fclose($pyfile);



$return_exec = exec('python  /afs/cad.njit.edu/u/b/k/bkw2/public_html/newFile.py 2>&1' , $out , $return_var);







/*
echo " PHP exec function :" . $return_exec . "<br>";

echo '<pre> Output from out :'; print_r($out ); echo '</pre>';

print " Output from return_var :" . $return_var . "<br>";
*/
$points = 0;

$while_loop = "while";
$for_loop = "for";
$if_loop = "if";


$forpos = strpos($pycode, $for_loop);


if($forpos === false){
    echo "Use of '$for_loop' ABSENT in code"."<br>";
    } else {
    //echo "The string '$for_loop' PRESENT in code"."<br>";
    //echo " at position $forpos"."<br>";
      $points+=5;
}

$ifpos = strpos($pycode, $if_loop);


if($ifpos === false){
    echo "Use of '$if_loop' ABSENT in code"."<br>";
    } else {
   // echo "The string '$if_loop' PRESENT in code"."<br>";
   // echo " at position $ifpos"."<br>";
      $points+=5;
}

$whilepos = strpos($pycode, $while_loop);


if($whilepos === false){
    echo "Use of '$while_loop' ABSENT in code"."<br>";
    } else {
    //echo "Use of '$while_loop' PRESENT in code"."<br>";
    //echo " at position $whilepos"."<br>";
      $points+=5;
}


//echo "Variables used"."<br>";
preg_match_all('#\b((.*\w+) = (.*\w+))\b#',$pycode,$matches);
//print_r($matches);


//echo ""."<br>";
//echo "Functions used"."<br>";
$result=preg_split('/def/',$pycode);
if(count($result)>1){
$result_split=explode(' ',$result[1]);
//print_r($result_split[1]);
    $points+=5;
    
}

//echo ""."<br>";
//echo $points.'POINTS: '. "<br>";





     $ch = curl_init();
         
        $back_url='https://web.njit.edu/~ek95/responsedb.php';
        $user = array('studentcode' => $pycode, 'studentoutput' =>$return_exec, 'grade' =>$points);
        curl_setopt($ch, CURLOPT_URL, $back_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, /*http_build_query*/ $user);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        
        //$json_array.push($result);
        //echo json_decode($result);
        //echo json_decode($_POST['json_array']);
        echo $result;
        //echo json_encode($result);
        curl_close($ch);










?>
