<?php
function buildBoard($answered, $categories) {

    echo "<div class='category'>";
    foreach ($categories as $c) {
        echo "<div class='categ-tile'>" . $c . "</div>";
    }
    echo "</div>";
    echo "<div class='board'>";

    foreach ($answered as $answer) {
        echo "<div class='row'>";
        foreach ($answer as $ans => $val) {
            if ($val[1] == false) {
                echo "<input class='ques-tile' type='submit' name='Question' value =$ans>";
                // echo "<input class='ques-tile' type='hidden' name='pointVal' value =$val[0]>";
               
            } else {
                echo "<input class='ques-tile'>";
            }
        }
        echo "</div>";
    }
    echo "</div>";
}

function checkAnswer($answer) {
    $file = explode(";", file_get_contents("questions.txt"));
    $correct = false;
    foreach ($file as $f) {
        $currentQ = explode(",", $f);
        if (trim($currentQ[3]) == trim($answer)) {
            $correct = true;
            break;
        }
    }
    return $correct;
}

function isBoardCleared($answered) {
    $isClear = true;
    foreach ($answered as $ans) {
        foreach ($ans as $a => $val) {
            if ($val[1] == false) {
                $isClear = false;
                break;
            }
        }
    }
    return $isClear;
}

function getQuestion($question) {
    $file = explode(";", file_get_contents("questions.txt"));
    $fetchedQuestion = "";
    foreach ($file as $f) {
        $currentQ = explode(",", $f);
        if (trim($question) == trim($currentQ[0])) {
            $fetchedQuestion = $currentQ[2];
            break;
        }
    }
    return $fetchedQuestion;
}

function getAnswer($question) {
    $file = explode(";", file_get_contents("questions.txt"));
    $answer = "";
    foreach ($file as $f) {
        $currentQ = explode(",", $f);
        if (trim($currentQ[0]) == trim($question)) {
            $answer = $currentQ[3];
            break;
        }
    }
    return $answer;
}

function getPointVal($question) {
    $file = explode(";", file_get_contents("questions.txt"));
    $pointVal = 0;
    foreach ($file as $f) {
        $currentQ = explode(",", $f);
        if (trim($currentQ[0]) == ($question)) {
            $pointVal = $currentQ[1];
            break;
        }
    }
    return $pointVal;
}

function openQuestion($question) {
    $fetchedQuestion = getQuestion($question);
    $answer = getAnswer($question);
    $points = getPointVal($question);
    $quesData = $fetchedQuestion . "," . $answer . "," . $points;
    $array = explode(",", $quesData);
    echo $array[0];
}

function updateLeaderBoard($player, $score) {
    if (isset($player)) {
        $inString = "\r\n" . $player . "," . $score . ";";
        $fp = fopen('leaderboard.txt', 'a');
        fwrite($fp, $inString);
        fclose($fp);
    }
}

function viewedQuestions($question, $answered) {
    $index = 0;
    $size = sizeof($answered);
    for ($i = 0; $i < $size; $i++) {
        if (array_key_exists($question, $answered[$i])) {
            $index = $i;
        }
    }
    $answered[$index][$question][1] = true;

    return $answered;
}
