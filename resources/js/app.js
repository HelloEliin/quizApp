// Our main CSS
import '../css/app.css'

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


import { spline } from '@georgedoescode/spline';
import { createNoise2D } from 'simplex-noise';

// our <path> element
const path = document.querySelector('path');
// used to set our custom property values
const root = document.documentElement;

const blobLeft = document.getElementById("blobleft")
const blobRight = document.getElementById("blobright")
const blobRightWhite = document.getElementById("blobrightwhite")
const blobLeftWhite = document.getElementById("blobleftwhite")

function createPoints() {
    const points = [];
    // how many points do we need
    const numPoints = 6;
    // used to equally space each point around the circle
    const angleStep = (Math.PI * 2) / numPoints;
    // the radius of the circle
    const rad = 75;

    for (let i = 1; i <= numPoints; i++) {
        // x & y coordinates of the current point
        const theta = i * angleStep;

        const x = 100 + Math.cos(theta) * rad;
        const y = 100 + Math.sin(theta) * rad;

        // store the point
        points.push({
            x: x,
            y: y,
            /* we need to keep a reference to the point's original {x, y} coordinates 
            for when we modulate the values later */
            originX: x,
            originY: y,
            // more on this in a moment!
            noiseOffsetX: Math.random() * 1000,
            noiseOffsetY: Math.random() * 1000,
        });
    }

    return points;
}


const points = createPoints();

function map(n, start1, end1, start2, end2) {
    return ((n - start1) / (end1 - start1)) * (end2 - start2) + start2
}

const simplex = new createNoise2D()

let noiseStep = 0.0025;

function noise(x, y) {
    return simplex(x, y);
};




(function animate() {

    blobLeft.setAttribute('d', spline(points, 1, true));
    blobRight.setAttribute('d', spline(points, 1, true));

    blobRightWhite.setAttribute('d', spline(points, 1, true));
    blobLeftWhite.setAttribute('d', spline(points, 1, true));

    requestAnimationFrame(animate);

    for (let i = 0; i < points.length; i++) {
        const point = points[i]

        const nX = noise(point.noiseOffsetX, point.noiseOffsetX)
        const nY = noise(point.noiseOffsetY, point.noiseOffsetY)

        const x = map(nX, -1, 1, point.originX - 5, point.originX + 5)
        const y = map(nY, -1, 1, point.originY - 10, point.originY + 10)

        point.x = x
        point.y = y

        point.noiseOffsetX += noiseStep
        point.noiseOffsetY += noiseStep
    }

})();






import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


const startButton = document.getElementById('startButton')
let questions = document.getElementById('questions')
const getAnswerBtn = document.getElementById('getAnswerBtn')
const yesBtn = document.getElementById('yesBtn')
const noBtn = document.getElementById('noBtn')
const oneMoreTimeBtn = document.getElementById('oneMoreTimeBtn')
const startView = document.getElementById('startView')
const questionView = document.getElementById('questionView')
const answerView = document.getElementById('answerView')
const vector = document.getElementById('whiteDonkey')
const scoreView = document.getElementById('scoreView')
const totalScore = document.getElementById('score')
const counter = document.getElementById('counter')
const counter2 = document.getElementById('counter2')
const progressBar = document.getElementById('progressBar')
const progressBar2 = document.getElementById('progressBar2')
const categories = document.getElementById('category')
const vector2 = document.getElementById('vector')

const movieScore = document.getElementById("movies").children
const sportsScore = document.getElementById("sports").children
const geographScore = document.getElementById("geograph").children
const historyScore = document.getElementById("history").children
const otherScore = document.getElementById("other").children
const scienceScore = document.getElementById("science").children
const musicScore = document.getElementById("music").children



let score = 0;
let questionCounter = 0;
let allQuestions;
let category;
let progressWidth = 0;
let progressWidth2 = 0;
let maxQuestions = 35;



let correctMovies = [];
let correctSports = [];
let correctScience = [];
let correctHistory = [];
let correctMusic = [];
let correctOther = [];
let correctGeoraph = [];

let allCorrectScores = [correctGeoraph, correctHistory, correctMovies,
    correctMusic, correctOther, correctScience, correctSports]



startButton.addEventListener('click', startGame)


function startGame() {

    startView.classList.remove('scale-100')
    startView.classList.add('scale-0')


    axios.get('/questions').then(response => {
        allQuestions = response.data;
        
        console.log(allQuestions)


        score = 0
        questionCounter = 0;
        progressWidth = 0;
        progressWidth2 = 0;

        question.innerText = allQuestions[questionCounter]['question']
        categories.innerText = allQuestions[questionCounter]['category']
        rightAnswer.innerText = allQuestions[questionCounter]['answer']

        $('#progressBar').width(progressWidth + '%');
        $('#progressBar2').width(progressWidth2 + '%');

        counter2.innerText = "Fråga " + questionCounter + " av 35";
        questionView.style.display = "block";
        startView.style.display = "none";


        questionCounter++

        setTimeout(() => {

            questionView.classList.remove('scale-0')
            questionView.classList.add('scale-100')

        }, 250);


        nextQuestion();

    })
};


function nextQuestion() {


    $('#progressBar').width(progressWidth + '%');

    if (questionCounter > 35 ) {

        scoreView.style.display = "block";
        questionView.style.display = "none";
        startView.style.display = "none";
        totalScore.style.display = "block";
        totalScore.innerText = score + " av 35 rätt";

    } else {

        question.innerText = allQuestions[questionCounter-1]['question']
        categories.innerText = allQuestions[questionCounter-1]['category']
        rightAnswer.innerText = allQuestions[questionCounter-1]['answer']
        questionView.style.display = "block";
        startView.style.display = "none";
        scoreView.style.display = "none";


        counter.innerText = "Fråga " + questionCounter + " av 35";
        counter2.innerText = "Fråga " + questionCounter + " av 35";

    }

}



getAnswerBtn.addEventListener('click', showAnswer)

function showAnswer() {


    setTimeout(() => {

        questionView.classList.remove('scale-100')
        questionView.classList.add('scale-0')

    }, 250);

    setTimeout(() => {

        answerView.classList.remove('scale-0')
        answerView.classList.add('scale-100')

    }, 250);

    $('#progressBar2').width(progressWidth2 + '%');

    document.body.style.backgroundColor = "#7678ED";
    questionView.style.display = "none";
    vector.style.display = 'none';
    vector2.style.display = 'none';
    answerView.style.display = "block";
    
    
    
    progressWidth = (questionCounter / allQuestions.length) * 100;
    progressWidth2 = (questionCounter / allQuestions.length) * 100;

}



yesBtn.addEventListener('click', ifRightAnswer)


function ifRightAnswer() {


    if (categories.textContent === 'Film & TV') {

        movieScore[correctMovies.length].classList.remove("bg-lightGrey");
        movieScore[correctMovies.length].classList.add("bg-lightGreen");

        correctMovies.push(1)

    }

    if (categories.textContent === 'Historia') {

        historyScore[correctHistory.length].classList.remove("bg-lightGrey");
        historyScore[correctHistory.length].classList.add("bg-lightGreen");

        correctHistory.push(1)

    }

    if (categories.textContent === 'Vetenskap') {

        scienceScore[correctScience.length].classList.remove("bg-lightGrey");
        scienceScore[correctScience.length].classList.add("bg-lightGreen");

        correctScience.push(1)

    }

    if (categories.textContent === 'Sport') {

        sportsScore[correctSports.length].classList.remove("bg-lightGrey");
        sportsScore[correctSports.length].classList.add("bg-lightGreen");

        correctSports.push(1)

    }
    if (categories.textContent === 'Geografi') {

        geographScore[correctGeoraph.length].classList.remove("bg-lightGrey");
        geographScore[correctGeoraph.length].classList.add("bg-lightGreen");

        correctGeoraph.push(1)

    }


    if (categories.textContent === 'Övrigt') {

        otherScore[correctOther.length].classList.remove("bg-lightGrey");
        otherScore[correctOther.length].classList.add("bg-lightGreen");

        correctOther.push(1)

    }

    if (categories.textContent === 'Musik') {

        musicScore[correctMusic.length].classList.remove("bg-lightGrey");
        musicScore[correctMusic.length].classList.add("bg-lightGreen");

        correctMusic.push(1)

    }


    setTimeout(() => {

        answerView.classList.remove('scale-100')
        answerView.classList.add('scale-0')

    }, 250);

    setTimeout(() => {

        questionView.classList.remove('scale-0')
        questionView.classList.add('scale-100')

    }, 250);



    document.body.style.backgroundColor = "#ffffff";
    answerView.style.display = "none";
    scoreView.style.display = "none";
    vector2.style.display = "block";
    questionView.style.display = "block";
    vector.style.display = "block";

    questionCounter++
    score++

    $("#progressBar").width(progressWidth);
    $("#progressBar2").width(progressWidth2);


    nextQuestion();

}




noBtn.addEventListener('click', ifWrongAnswer)


function ifWrongAnswer() {

    document.body.style.backgroundColor = "#ffffff";
    answerView.style.display = "none";
    scoreView.style.display = "none";
    vector2.style.display = "block";
    questionView.style.display = "none";
    vector.style.display = "block";


    questionCounter++



    setTimeout(() => {

        answerView.classList.remove('scale-100')
        answerView.classList.add('scale-0')

    }, 250);

    setTimeout(() => {

        questionView.classList.remove('scale-0')
        questionView.classList.add('scale-100')

    }, 250);




    $("#progressBar").width(progressWidth);
    $("#progressBar2").width(progressWidth2);

    nextQuestion();


}



oneMoreTimeBtn.addEventListener('click', oneMoreRound)


function oneMoreRound() {

    for (var i = 0; i < allCorrectScores.length; i++) {
        allCorrectScores[i].splice(0);
    }


    for (var i = 0; i <= 4; i++) {

        movieScore[i].classList.remove("bg-lightGreen");
        movieScore[i].classList.add("bg-lightGrey");

        otherScore[i].classList.remove("bg-lightGreen");
        otherScore[i].classList.add("bg-lightGrey");


        musicScore[i].classList.remove("bg-lightGreen");
        musicScore[i].classList.add("bg-lightGrey");

        geographScore[i].classList.remove("bg-lightGreen");
        geographScore[i].classList.add("bg-lightGrey");

        sportsScore[i].classList.remove("bg-lightGreen");
        sportsScore[i].classList.add("bg-lightGrey");

        scienceScore[i].classList.remove("bg-lightGreen");
        scienceScore[i].classList.add("bg-lightGrey");

        historyScore[i].classList.remove("bg-lightGreen");
        historyScore[i].classList.add("bg-lightGrey");
    }



    setTimeout(() => {

        answerView.classList.remove('scale-100')
        answerView.classList.add('scale-0')

    }, 250);

    setTimeout(() => {

        startView.classList.remove('scale-0')
        startView.classList.add('scale-100')

    }, 250);

    questionCounter = 0;
    score = 0;

    answerView.style.display = "none";
    questionView.style.display = "none";
    scoreView.style.display = "none";
    startView.style.display = "block";
    vector2.style.display = "block";
    vector.style.display = "block";


}