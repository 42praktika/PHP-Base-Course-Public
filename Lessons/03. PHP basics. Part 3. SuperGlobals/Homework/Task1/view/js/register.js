document.querySelector('.btnar').addEventListener('click', () => {
    let data = document.querySelector('.txtar').value;
    check(data);
});

function check(input) {
    if (input === 'We\'re both English teachers. Is there anything you hate about teaching English? There\'s' +
        ' actually not much that I hate about teaching English but there is one thing which drives me balmy,' +
        ' and annoys me more than anything else. And that\'s correcting the same mistake over, and over, and over' +
        ' again. And it seems that every country in which I\'ve worked, every nationality of English language' +
        ' learners have one mistake that they always make over and over again. In Hungary, when you say "How are' +
        ' you?" to a Hungarian student, they\'ll reply in English "I\'m feeling myself well", which is a direct' +
        ' translation from Hungarian but sounds rather strange and a little bit rude in English, and I must have' +
        ' corrected that mistake millions of times while I was there. The same students again and again and again' +
        ' and again, so the repetition of making the same correction really, really gets my goat. How about you?' +
        ' What do you hate about teaching? I really wouldn\'t say I hate something about teaching, but I definitely' +
        ' think there are things that waste my time when I\'m teaching. After every lesson, I very carefully' +
        ' right up a lesson plan, bring all those materials together, put it in a little plastic wallet and' +
        ' store it away in a folder, and I know full well I will never open that folder to read about that' +
        ' lesson again. I kind of approach every lesson as fresh and new and try and come up with something' +
        ' different and every time I\'m writing them all up, doing all this paperwork and I really don\'t ' +
        'need to. I need to get in control of myself and stop doing that. You told me what you most dislike' +
        ' about teaching, but I\'m sure you love this job. What are some things you like about English teaching?' +
        ' I think the thing I like the most about teaching is what I call the "Ah-hah" moment when you\'re ' +
        'studying a language point with a class or a student and you can almost see physically the moment' +
        ' they understand, the moment they\'re able to make sense of the language or they can do the task that ' +
        'you\'ve asked them to do, and you can almost see a light bulb go off above their head, "Ah-hah! Now I ' +
        'understand." and I love that. I love the surge of confidence that gives the students and also makes ' +
        'me feel really good that I helped them to reach that point. What do you love about teaching Tom? ' +
        'The thing I really love is right at the end of the course, when the students come up to you after a ' +
        'long time of haranguing about homework and about being late and about correction and drilling and ' +
        'the students come up and say, "Teacher, we\'re all going to dinner at the end of the course. Do you ' +
        'want to come with us?" and that must makes me smile. Now, I know I\'m saying this to you Jess, but ' +
        'I know there\'s a lot of people out there listening to this. It really makes my heart warm to go and ' +
        'have some social time with the students at the end of a long course. So the thing you like most about ' +
        'teaching is when the teaching is finished? Oh, you\'ve got me on that one, yes.') {
        alert("Вы успешно зарегистрировались!");
    } else {
        alert("Неправильно!");
    }
}

const divTimer = document.querySelector('.timer');
let timeOut = 25;

timer = setInterval(function () {
    let seconds = timeOut % 60;
    if (timeOut <= 0) {
        clearInterval(timer);
        document.querySelector('.txtar').value = '';
        timeOut = 25;
        location.reload();
    } else {
        let strTimer = `${seconds}`;
        divTimer.innerHTML = strTimer;
    }
    --timeOut;
}, 1000);

document.querySelector('.timer-btn').addEventListener('click', () => {
    if (timeOut <= 59) {
        timeOut = timeOut + 10;
    } else {
        timeOut = 59;
    }
});
