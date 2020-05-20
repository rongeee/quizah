<?php
require_once "db.php";





if (isset($_POST)) {
  $name = trim($_POST['name']);
  $difficulty = trim($_POST['difficulty']);
  $correct = trim($_POST['correct']);
  $points = trim($_POST['points']);
  
  
  $sql = "INSERT INTO highscore(name,difficulty,questions,points) VALUES(:name,:difficulty,:questions,:points);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':name' => $name,
    ':difficulty' => $difficulty,
    ':questions' => $correct,
    ':points' => $points,
    ]);
  }

$sql = "SELECT points FROM highscore ORDER BY points DESC LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$pointsLowest;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $pointsLowest = $row['points'];
}

  if ($points > $pointsLowest) {
    $test = '<p class="exit__text">Your highscore has been submitted!</p>';
    echo $test;
  } else {
    $test = '<p class="exit__text">You did not make the leaderboards :(</p>';
    echo $test;
  }
  


  ?>