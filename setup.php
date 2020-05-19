<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quizah!</title>
    <link rel="stylesheet" href="./scss/main.css" />
  </head>
  <body>
    <section class="quiz-setup">
      <form action="#" class="quiz-setup__form" method="POST" name="setup">
        <h2 class="quiz-setup__headline">Setup your Quiz!</h2>
        <div>
          <label for="name" class="quiz-setup__label">What's your name?</label>
          <input type="text" name="name" id="name" class="quiz-setup__input" />
        </div>
        <div>
          <label for="diff" class="quiz-setup__label"
            >Choose your difficulty!</label
          >
          <div class="select-box">
            <div class="select-box__current" tabindex="1">
              <div class="select-box__value">
                <input
                  class="select-box__input"
                  type="radio"
                  id="0"
                  value="1"
                  name="diff"
                  checked="checked"
                />
                <p class="select-box__input-text chosen">Easy</p>
              </div>
              <div class="select-box__value">
                <input
                  class="select-box__input"
                  type="radio"
                  id="1"
                  value="2"
                  name="diff"
                  checked="checked"
                />
                <p class="select-box__input-text">Medium</p>
              </div>
              <div class="select-box__value">
                <input
                  class="select-box__input"
                  type="radio"
                  id="2"
                  value="3"
                  name="diff"
                  checked="checked"
                />
                <p class="select-box__input-text">Hard</p>
              </div>
              <img
                class="select-box__icon"
                src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                alt="Arrow Icon"
                aria-hidden="true"
              />
            </div>
            <ul class="select-box__list">
              <li class="select-box__list-item">
                <label
                  class="select-box__option"
                  for="0"
                  aria-hidden="aria-hidden"
                  >Easy</label
                >
              </li>
              <li class="select-box__list-item">
                <label
                  class="select-box__option"
                  for="1"
                  aria-hidden="aria-hidden"
                  >Medium</label
                >
              </li>
              <li class="select-box__list-item">
                <label
                  class="select-box__option"
                  for="2"
                  aria-hidden="aria-hidden"
                  >Hard</label
                >
              </li>
            </ul>
          </div>
        </div>
        <input type="button" value="Go!" class="quiz-setup__submit" onclick="start()"/>
      </form>
    </section>
  </body>
  <script src="./js/test.js"></script>
  <script src="./js/fetch.js"></script>
</html>
