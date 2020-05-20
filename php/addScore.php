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
  // $test = '<p class="exit__text">Your highscore has been submitted!</p>';
  // echo $test;

  echo 'Rowcount: ' . $count

// $pointsLowest;

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//   $i++
//   $pointsLowest = $row['points'];
// }

//   if ($points > $pointsLowest) {

//   } else {
//     $test = '<p class="exit__text">You did not make the leaderboards :(</p>';
//     echo $test;
//   }
  


  ?>