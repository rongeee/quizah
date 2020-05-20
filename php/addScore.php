<?php
require_once "db.php";

// if (isset($_POST)) {

  $name = trim($_POST['name']);
  $difficulty = trim($_POST['difficulty']);
  $points = trim($_POST['points']);
  

  $sql = "INSERT INTO quizah_highscore(name,difficulty,points) VALUES(:name,:difficulty,:points);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':name' => $name,
    ':difficulty' => $difficulty,
    ':points' => $points,
    ]);
  

$sql = "SELECT points FROM quizah_highscore ORDER BY points DESC LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$count = $stmt->rowCount();

$pointsLowest;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $pointsLowest = $row['points'];
}

if ($points > $pointsLowest || $count < 10) {
  $test = '<p class="exit__text">You made it to the leaderboards!</p>';
  echo $test;
} else {
  $test = '<p class="exit__text">You did not make it to the leaderboards, try again!</p>';
  echo $test;
}

//   if ($points > $pointsLowest) {

//   } else {
//     $test = '<p class="exit__text">You did not make the leaderboards :(</p>';
//     echo $test;
//   }
  


  ?>