<?php
  require_once "db.php";

$sql = "SELECT * FROM highscore ORDER BY points DESC LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$count = 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $name = $row['name'];
  $points = $row['points'];
  $questions = $row['questions'];
  $difficulty = $row['difficulty'];

  $template = '<div class="highscore__item"><p>'  . $count . '. ' . $name . '</p>' . '<p>' . $difficulty . '</p>' . '<p>' . $points . '</p></div>';
  echo $template;
  $count++;
}
?>