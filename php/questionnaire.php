<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Sleep, Insomnia, Sleep App, Sleep Tracking, Meditation, Mental health, Mindfulness, Stress and Anxiety"/>
	  <meta name="description" content="Revive is designed to provide comprehensive support and guidance for individuals struggling with insomnia. Leveraging cutting-edge technology and evidence-based techniques, Revive aims to empower users to understand, manage, and improve their sleep patterns effectively."/>
	  <meta name="author" content="Revive"/>

    <title>Revive | Your Personal Sleep Companion | Awaken Your Vitality. </title>

    <link rel="icon" href="../assets/images/favicon-revive.png" type="image/png">
    <link href="../assets/css/bootstrap/bootstrap.css" rel="stylesheet">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');

  *{
    box-sizing: border-box;
  }
  :root{
      --gradient: linear-gradient(to right, #a79c85, #86b2ce, #a79c85);
      --brown: rgba(141, 127, 117,0.2); 
      --blue:rgb(146, 159, 179);
  }
  body{
  background-image: url("../assets/images/bg3b.PNG");
  background-position:center;
    font-family: 'Poppins', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    overflow: hidden;
    margin: 0;
  }
  header {
      background-color: #ffffff; 
      padding: -200px;
      bottom:-10rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
  }
  .revive-logo {
      width: 150px;
      height: auto;
      align-items: center;
      justify-content: center;
  }
  .quiz-container{  
  background:var(--brown);
  backdrop-filter: blur(12px);
  border: 2px solid var(--brown);
    border-radius: 20px;
    box-shadow: 0 0 10px 2px rgba(100, 100, 100, 0.1);
    width: 500px;
    overflow: hidden;
    z-index:100;
  transition:height .2s ease;
  position:relative;
  }
  .quiz-header{
    padding: 2rem;
  }
  h3{
    font-size: 1.8rem;
    padding: .6rem;
    text-align: center;
    margin: 0;
    color:#d7cdbb;
  }
  h4{
    font-size: 1.4rem;
    padding: .6rem;
    text-align: center;
    margin: 0;
    color:#d7cdbb;
  }
  p{
    padding: .2rem;
    font-size:.7rem;
    text-align: center;
    margin: 0;
    color:#fff;
  }

  ul{
    list-style-type: none;
    padding: 0;
    text-align: center;
  }
  ul li{
      color: #fff;
      position:relative; 
      padding: 10px;
      margin: 10px;
      cursor: pointer;
      border-width: 2.3px;
      border-style: solid;
      border-image: var(--gradient);
      border-image-slice: 1;
      border-radius: 15px;
  }

  ul :hover{
      border: 3px solid var(--blue);
  }

  ul li label{
    cursor: pointer;
    border:1px solid transparent !important;
  }

  input[type="radio"] {
    float:left;
    top:20px;
    accent-color:#c0b6a7;
  }

  button{
    background-color: var(--blue);
    color: #fff;
    border: none;
    display: block;
    width: 100%;
    cursor: pointer;
    font-size: 1.1rem;
    font-family: inherit;
    padding: 1.3rem;
  }
  button:hover{
    background-color: rgb(131, 141, 157);
    font-weight:500;
  }
  button:focus{
    outline: none;
    background-color: #aca973;
  }
  .arrowbtn a{
    position:relative;
    left:30px;
    top:20px;
    font-size:1.5em;
    color:#d7cdbb;
    cursor: pointer;
    text-decoration: none;
  }
  @media screen and (max-width: 576px) {
    .quiz-container{  
  width:95%;
  }
  }
</style>
</head>
<body>

  <div class="quiz-container" id="quiz">
    
   <span id="backBtn" class="arrowbtn"><a href="index.php"><ion-icon name="arrow-back-circle-outline"></ion-icon></a></span> 
    <!--<a href="../index.html" class="align-center px-4 ml-5"><img src='../images/logo.PNG' class="revive-logo"/></a>-->
    <div class="quiz-header">
      <h3 id="question">Question Text</h3>
      <p id="text">Below Text</p>
      <ul>
        <li>
          <input type="radio" name="answer" id="a" class="answer">
          <label for="a" id="a_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="b" class="answer">
          <label for="b" id="b_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="c" class="answer">
          <label for="c" id="c_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="d" class="answer">
          <label for="d" id="d_text">Answer</label>
        </li>

      </ul>
    </div>

    <button id="submit">Continue</button>
  </div>


  
  <script src="../assets/js/jquery.min.js"></script>
<script>
        const quizData = [
    {
        question: "What brings you to Revive?",
        text: "Understanding your goal will help us define a plan that suits your lifestyle.",
        a: "Improve sleep quality",
        b: "Reduce stress or anxiety",
        c: "Improve focus",
        d: "Use sounds to fall asleep",
    },
    {
        question: "How have you been feeling lately?",
        text: " ",
        a: "Good",
        b: "Stressed",
        c: "Sad",
        d: "Indifferent",
    },
    {
        question: "What's typically the biggest source of stress for you?",
        text: " ",
        a: "Money",
        b: "Work or school",
        c: "Health",
        d: "Relationships / Family responsibilities",
    },
    {
        question: "How many hours of sleep do you typically get per night?",
        text: "Colored noise can mask disruptive noises from the environment and help reduce awakenings during the night.",
        a: "Less than 5 hours",
        b: "5 hours",
        c: "6-7 hours",
        d: "More than 8 hours",
    },
    {
      question: "How does stress usually show up for you?",
      text: " ",
        a: "Anxious thoughts",
        b: "Physical discomfort",
        c: "Moodiness",
        d: "Difficulty sleeping",
    },
    {
      question: "How often do you wake up during the night?",
        text: "Help us understand your sleeping habits.",
        a: "Rarely",
        b: "Occasionally",
        c: "Frequently",
        d: "Every hour or more",
    },
];

const quiz= document.getElementById('quiz')
const answerEls = document.querySelectorAll('.answer')
const questionEl = document.getElementById('question')
const belowText = document.getElementById('text')
const a_text = document.getElementById('a_text')
const b_text = document.getElementById('b_text')
const c_text = document.getElementById('c_text')
const d_text = document.getElementById('d_text')
const submitBtn = document.getElementById('submit')


let currentQuiz = 0
let score = 0

loadQuiz()

function loadQuiz() {

    deselectAnswers()

    const currentQuizData = quizData[currentQuiz]

    questionEl.innerText = currentQuizData.question
    belowText.innerText = currentQuizData.text
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
    d_text.innerText = currentQuizData.d
}

function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false)
}


function getSelected() {
    let answer
    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer = answerEl.id
        }
    })
    return answer
}


submitBtn.addEventListener('click', () => {
    const answer = getSelected()
    if(answer) {
       if(answer === quizData[currentQuiz].correct) {
           score++
       }

       currentQuiz++

       if(currentQuiz < quizData.length) {
           loadQuiz()
       } else {
           quiz.innerHTML = `<h4>Your assessment has been reviewed!</h4>''
           <button onclick="location.assign('combreak.php')">Continue</button> `
       }
    }
});

const backBtn = document.getElementById('backBtn');

//go back to the previous question//
backBtn.addEventListener('click', () => {
  if (currentQuiz > 0) {
    currentQuiz--;
    loadQuiz();
  }
});

// Add animation class to quiz container
quiz.classList.add('animate-fade');
    setTimeout(() => {
        quiz.classList.remove('animate-fade'); // Remove animation class after animation ends
    }, 500);

</script>
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>