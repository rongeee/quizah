const nameInput = document.querySelector(".quiz-setup__input");
const diffInput = document.querySelectorAll(".select-box__input-text");
const diffList = document.querySelectorAll(".select-box__list");
const startBtn = document.querySelector(".quiz-setup__submit");
let questions;
let game = {
  points: 0,
};
let quizTimer;

document.addEventListener("click", (e) => {
  if (e.target.className.includes("select-box__option")) {
    const clicked = e.target.textContent;

    diffInput.forEach((item) => {
      if (clicked === item.textContent) {
        item.classList.add("chosen");
      } else {
        item.classList.remove("chosen");
      }
    });
  }
});

const getDifficulty = () => {
  let diff;

  diffInput.forEach((e) => {
    if (e.classList.contains("chosen")) {
      diff = e.textContent.toLowerCase();
      game.difficulty = diff;
    }
  });

  game.difficulty = diff;
  return diff;
};

const renderHello = (name) => {
  const setup = document.querySelector(".quiz-setup");
  let countdown = 3;
  setup.remove();

  const template = `<section class="hello">
      <h2 class="hello__name">Hello ${name}!</h2>
      <p class="hello__ready">Get Ready!</p>
      <p class="hello__timer">${countdown}</p>
    </section>`;

  document.body.innerHTML = template;
  const timeElement = document.querySelector(".hello__timer");

  let countdownTimer = setInterval(() => {
    if (countdown === 0) {
      clearInterval(countdownTimer);
      renderQuizTemplate();
    } else if (countdown === 1) {
      countdown--;
      timeElement.textContent = "Go!";
    } else {
      countdown--;
      timeElement.textContent = countdown;
    }
  }, 1000);
};

const getCorrectAnswer = (q) => {
  return q.correct_answer;
};

const shuffleAnswers = (q) => {
  let answers = q.incorrect_answers.concat(q.correct_answer);

  let currentIndex = answers.length;
  let temporaryValue, randomIndex;

  while (0 !== currentIndex) {
    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = answers[currentIndex];
    answers[currentIndex] = answers[randomIndex];
    answers[randomIndex] = temporaryValue;
  }

  return answers;
};

const renderQuestion = (i) => {
  const answerCont = document.querySelector(".quiz__answers");
  const pointsText = document.querySelector(".quiz__points");
  const questionNum = document.querySelector(".quiz__question-nr");
  const categoryText = document.querySelector(".quiz__category");
  const questionText = document.querySelector(".quiz__question-text");
  const answers = shuffleAnswers(game.questions[i]);
  const correct = getCorrectAnswer(game.questions[i]);
  const currQue = convertHTML(game.questions[i].question);
  const bar = document.querySelector(".quiz__time");
  let clicked = false;
  let timer = 10;
  let currentQuestion = i;

  answerCont.innerHTML = "";
  categoryText.innerHTML = "";
  questionText.innerHTML = "";
  categoryText.textContent = game.questions[i].category;
  questionText.textContent = currQue;
  bar.classList.add("quiz__time--anim");
  questionNum.innerHTML = `${i + 1} / 10`;
  answers.forEach((answer) => {
    answerCont.innerHTML += `<button class="quiz__answer" id="1">${answer}</button>`;
  });
  currentQuestion++;

  const answerBtns = document.querySelectorAll(".quiz__answer");
  answerBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      if (clicked === false) {
        clicked = true;
        bar.classList.remove("quiz__time--anim");
        showAnswers(answerBtns, correct);

        if (e.target.textContent === correct) {
          game.points += updatePoints(game.difficulty, timer);
          pointsText.innerHTML = `${game.points} points`;
        }

        clearInterval(quizTimer);
        setTimeout(() => {
          void bar.offsetWidth;
          renderQuestion(currentQuestion);
        }, 2000);
      }
    });
  });

  quizTimer = setInterval(() => {
    timer--;

    if (timer === 0) {
      clearInterval(quizTimer);
      bar.classList.remove("quiz__time--anim");
      showAnswers(answerBtns, correct);

      setTimeout(() => {
        void bar.offsetWidth;
        renderQuestion(currentQuestion);
      }, 2000);
    }
  }, 1000);
};

const showAnswers = (cont, corr) => {
  cont.forEach((ele) => {
    ele.style.background = "red";
    if (corr === ele.textContent) ele.style.background = "green";
  });
};

const updatePoints = (diff, time) => {
  let points = 0;

  switch (diff) {
    case "easy":
      points = time;
      return points;
      break;

    case "medium":
      points = time * 2;
      return points;
      break;

    case "hard":
      points = time * 3;
      return points;
      break;
  }
};

const renderQuizTemplate = () => {
  if (document.querySelector(".hello")) {
    const hello = document.querySelector(".hello");
    hello.remove();
  }

  const template = `<section class="quiz">
  <div class="quiz__top">
  <p class="quiz__points">0 p</p>
  <h4 class="quiz__category"></h4>
  <p class="quiz__question-nr"></p>
  </div>
  
  <div class="quiz__question">
  <h3 class="quiz__question-text"></h3>
  </div>
  <span class="quiz__time"></span>
  <div class="quiz__answers">
  </div>
  </section>`;

  document.body.innerHTML = template;

  renderQuestion(0);
};

const convertHTML = (str) => {
  const conversions = {
    "&amp;": "&",
    "&lt;": "<",
    "&gt;": ">",
    "&quot;": '"',
    "&apos;": "'",
    "&#039;": "'",
  };
  return str.replaceAll(
    /&quot;|&amp;|&gt;|&lt;|&apos;|&#039;/gi,
    (find) => conversions[find]
  );
};

const fetchProducts = () => {
  const diff = getDifficulty();
  const url = `https://opentdb.com/api.php?amount=10&difficulty=${diff}&type=multiple`;
  name = nameInput.value;
  renderHello(game.name);

  fetch(url)
    .then((resp) => resp.json())
    .then((data) => {
      console.log(data.results);
      game.questions = data.results;
    })
    .catch((err) => {
      console.log(err);
    });
};

const start = () => {
  game.name = nameInput.value;
  if (game.name !== "") {
    fetchProducts();
  }
};

// startBtn.addEventListener("click", () => {});
