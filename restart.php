<?php
session_start();
$_SESSION["answered"] = array(
    array("Q1" => array(200, false), "Q2" => array(200, false), "Q3" => array(200, false), "Q4" => array(200, false), "Q5" => array(200, false)),
    array("Q6" => array(400, false), "Q7" => array(400, false), "Q8" => array(400, false), "Q9" => array(400, false), "Q10" => array(400, false)),
    array("Q11" => array(600, false), "Q12" => array(600, false), "Q13" => array(600, false), "Q14" => array(600, false), "Q15" => array(600, false)),
    array("Q16" => array(800, false), "Q17" => array(800, false), "Q18" => array(800, false), "Q19" => array(800, false), "Q20" => array(800, false)),
    array("Q21" => array(1000, false), "Q22" =>  array(1000, false), "Q23" =>  array(1000, false), "Q24" =>  array(1000, false), "Q25" =>  array(1000, false)),
);
$_SESSION["categories"] = array("Category 1", "Category 2", "Category 3", "Category 4", "Category 5");

$_SESSION["score"] = 0;

header("location: board.php");
?>