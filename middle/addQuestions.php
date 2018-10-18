<?php


$received = $_POST['answer'];
//echo 'mid ' . $_POST['answer'];




$var = array('question' => $_POST['question'], 'answer' => $_POST['answer'], 'type' => $_POST['type'], 'difficulty' => $_POST['difficulty']);
$ch = curl_init("https://web.njit.edu/~ek95/questiondb.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $var);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

echo $result;

?>
