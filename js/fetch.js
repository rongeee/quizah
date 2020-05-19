const nameInput = document.querySelector(".quiz-setup__input");
const diffInput = document.querySelectorAll(".select-box__input-text");
const diffList = document.querySelectorAll(".select-box__list");
const startBtn = document.querySelector(".quiz-setup__submit");
let questions;

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
    }
  });
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
      renderQuiz();
    } else if (countdown === 1) {
      countdown--;
      timeElement.textContent = "Go!";
    } else {
      countdown--;
      timeElement.textContent = countdown;
    }
  }, 1000);
};

const renderQuiz = (q) => {
  const hello = document.querySelector(".hello");

  hello.remove();
  const template = `<section class="quiz">
      <h4 class="quiz__category">${questions[0].category}</h4>
      <div class="quiz__question">
        <h3 class="quiz__question-text">${questions[0].question}</h3>
      </div>
      <span class="quiz__time"></span>
      <div class="quiz__answers">
      <button class="quiz__answer">${questions[0].incorrect_answers[0]}</button>
      <button class="quiz__answer">${questions[0].incorrect_answers[1]}</button>
      <button class="quiz__answer">${questions[0].correct_answer}</button>
      <button class="quiz__answer">${questions[0].incorrect_answers[2]}</button>
      </div>
    </section>`;
  document.body.innerHTML = template;
};

const fetchProducts = (cb, name) => {
  const diff = getDifficulty();
  console.log(name);
  const url = `https://opentdb.com/api.php?amount=10&difficulty=${diff}&type=multiple`;
  name = nameInput.value;
  console.log(url);

  fetch(url)
    .then((resp) => resp.json())
    .then((data) => {
      questions = data.results;
      cb(name);
    })
    .catch((err) => {
      console.log(err);
    });
};

startBtn.addEventListener("click", () => {
  name = nameInput.value;

  if (name !== "") {
    fetchProducts(renderHello, name);
  }
});
