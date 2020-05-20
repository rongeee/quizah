<?php
require_once "db.php";


if (isset($_POST)) {
  $name = trim($_POST['name']);
  $difficulty = trim($_POST['difficulty']);
  $points = trim($_POST['points']);
  
  
  $sql = "INSERT INTO highscore(name,difficulty,points) VALUES(:name,:difficulty,:points);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':name' => $name,
    ':difficulty' => $difficulty,
    ':points' => $points,
    ]);
}
?>