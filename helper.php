<?php
function buildBoard($quesInfo, $categories) {

    echo "<div class='category'>";
    foreach ($categories as $c) {
        echo "<div class='categ-tile'>" . $c . "</div>";
    }
    echo "</div>";
    echo "<div class='board'>";

    foreach ($quesInfo as $row) {
        echo "<div class='row'>";
        foreach ($row as $quesNum => $info) {
            if ($info[1] == true) {
                echo "<input type='button' class='ques-tile'>";
            } else {
                echo "<input class='ques-tile' type='submit' 
                name='Question' value='$info[0]-$quesNum'v>";
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
        if (strtolower(trim($currentQ[3]))  == strtolower(trim($answer))) {
            $correct = true;
            break;
        }
    }
    return $correct;
}

function isBoardCleared($quesInfo) {
    $isClear = false;
    foreach ($quesInfo as $row) {
        foreach ($row as $ques => $info) {
            if ($info[1] == false) {
                $isClear = false;
                break;
            } else {
                $isClear = true;
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
        if (trim($currentQ[0]) == trim($question)) {
            $pointVal = $currentQ[1];
            break;
        }
    }
    return $pointVal;
}

function updateLeaderBoard($player, $score) {
    if (isset($player)) {
        $inString = "\r\n" . $score . "," . $player . ";";
        $fp = fopen('leaderboard.txt', 'a');
        fwrite($fp, $inString);
        fclose($fp);
    }
}

function viewedQuestions($question, $quesInfo) {
    $index = 0;
    $size = sizeof($quesInfo);
    for ($i = 0; $i < $size; $i++) {
        if (array_key_exists($question, $quesInfo[$i])) {
            $index = $i;
        }
    }
    $quesInfo[$index][$question][1] = true;

    return $quesInfo;
}

function readLeaderBoard() {
    $board = explode(";", file_get_contents("leaderboard.txt"));
    arsort($board);
    echo "<h1>LeaderBoard</h1>";
    echo "<div class ='leaders'>";
    foreach ($board as $b) {
        $current = explode(",", $b);
        echo $current[1] . "&nbsp;" . "&nbsp;" . "&nbsp;" . $current[0] . "<br>";
    }
    echo "</div>";
}
