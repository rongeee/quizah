<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <base href="localhost/quizah" target="_blank" /> -->
    <title>Quizah!</title>
    <link rel="stylesheet" href="./scss/main.css" />
  </head>
  <body>
  <section class="highscore">
    <h2 class="highscore__headline">Leaderboards</h2>
    <div class="highscore__list-container">
    <div class="highscore__item">
      <h4 class="highscore__name">Name</h4>
      <h4 class="highscore__difficulty">Difficulty</h4>
      <h4 class="highscore__points">Points</h4>
    </div>
    <?php require_once "./php/renderScore.php"; ?>
</div>
<a
        href="./"
          class="highscore__btn"
          >Home</a
        >
  </section>
  </body>
</html>