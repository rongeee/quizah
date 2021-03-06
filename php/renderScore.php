<?php
  require_once "db.php";

$sql = "SELECT * FROM quizah_highscore ORDER BY points DESC LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$count = 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $name = $row['name'];
  $points = $row['points'];
  $questions = $row['questions'];
  $difficulty = $row['difficulty'];

  $template = '<div class="highscore__item"><p class="highscore__name">'  . $count . '. ' . $name . '</p>' . '<p class="highscore__difficulty">' . $difficulty . '</p>' . '<p class="highscore__points">' . $points . '</p></div>';
  echo $template;
  $count++;
}
?>