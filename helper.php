<?php 
    function buildBoard($answered, $categories){
  
        echo "<div class='category'>";
        foreach($categories as $c){
              echo "<div class='categ-tile'>".$c."</div>";
            }
        echo "</div>";  
        echo "<div class='board'>";
        
        foreach($answered as $answer){
            echo "<div class='row'>";      
            foreach($answer as $ans){
              if($ans[1] == true){
                echo "<input class='ques-tile' type='button' name='EmptyTile'>";
              }else{
                echo "<input class='ques-tile' type='submit' name='Question' value = '$".$ans[0]."'>";
              }
            }
            echo "</div>";
          }
        echo "</div>";
      }

      function checkAnswer($answer){
        $file = explode(";", file_get_contents("Questions.txt"));
        $currentAnswer = false;
        $currentQuestion = "";
        foreach($file as $f){
          $currentQ = explode(",", $f);
          if($currentQ[4] == $answer){
            $currentQuestion = $currentQ[1];
            $currentAnswer = true;
            break;
          }
        }
        return $currentAnswer;
      }

      function isBoardCleared($open){
        $isEmpty = True;
        foreach($open as $o){
          foreach($o as $check => $val){
          if($val == true){
            $isEmpty = false;
          }
        }
      }
        return $isEmpty;
      }


      function updateLeaderBoard($player, $score){
        if(isset($player)){
          $inString = "\r\n".$player.",".$score.";";
          $fp = fopen('leaderboard.txt', 'a');
          fwrite($fp, $inString);
          fclose($fp);
        }
      }
