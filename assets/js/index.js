let wordsOriginalList = document.querySelector('.choosed-wordsset').dataset.words.split(' ');

let wordsList = new WordsList(wordsOriginalList);

let trainer = new Trainer();
trainer.updateWordsList(wordsList);
trainer.updateWordssetContainer();

document.querySelectorAll('.wordsset').forEach((wordsset) => {
    wordsset.addEventListener('click', (event) => {
        trainer.stop();

        let currentWordsset = document.querySelector('.choosed-wordsset');
        currentWordsset.classList.remove('choosed-wordsset');
        currentWordsset.classList.add('enumeration');

        // Обновление набора слов
        wordsList = new WordsList(event.target.dataset.words.split(' '));
        trainer.updateWordsList(wordsList);
        trainer.updateWordssetContainer();

        // Добавление нужных классов выбранному набору слов
        event.target.classList.add('choosed-wordsset');
        event.target.classList.remove('enumeration');
    });
});

document.querySelector('.begin').addEventListener('click', () => {
    trainer.start();
});

document.querySelector('.words-input').addEventListener('input', (event) => {
    let currentEnteredWord = event.target.value;
    let currentWord = document.querySelector('.highlight');
    
    let isWordCorrect = trainer.isWordCorrect(currentEnteredWord.trimRight());

    if (isWordCorrect) {
        currentWord.classList.add('correct-word');
        currentWord.classList.remove('wrong-word');        
    }
    else {
        currentWord.classList.add('wrong-word');
        currentWord.classList.remove('correct-word');
    }

    let isLastCharSpace = currentEnteredWord[currentEnteredWord.length - 1] == ' ';

    if (isLastCharSpace) {
        if (trainer.isWordCorrectFull(currentEnteredWord.trimRight())) {
            trainer.incrementRightWordsCount();
        } else {
            trainer.incrementWrongWordsCount();
        }

        trainer.wordsList.nextWord();
        trainer.wordsList.appendNewWord();

        trainer.updateWordssetContainer();

        event.target.value = '';
        
       
    }
});