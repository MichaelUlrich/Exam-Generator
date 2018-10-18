<?php

$var = array('question' => $_POST['question'], 'answer' => $_POST['answer'], 'type' => $_POST['type'], 'difficulty' => $_POST['difficulty']);
$ch = curl_init("https://web.njit.edu/~ek95/getexam.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $var);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*
echo 'mid ques : ' . $_POST['question'] . "<br>";
echo 'mid  ans :' . $_POST['answer']. "<br>";
echo 'mid  typ :' . $_POST['type']. "<br>";
echo 'mid  diff :' . $_POST['difficulty']. "<br>";
*/
$result = curl_exec($ch);



echo $result;
        

?>
