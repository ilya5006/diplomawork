class Trainer {
    updateWordsList(wordsList) {
        this.wordsList = wordsList;
        this.rightWordsCount = 0;
        this.wrongWordsCount = 0;
    }

    isWordCorrect(word) {
        let currentWord = wordsList.getCurrentWord();
        return currentWord.search(word) == 0;
    }

    isWordCorrectFull(word) {
        let currentWord = wordsList.getCurrentWord();
        return (this.isWordCorrect(word)) && (word.length == currentWord.length);
    }

    start() {
        document.querySelector('.words-input').removeAttribute('disabled');

        this.timer = setTimeout(() => {
            this.showResult();
        }, 1000 * 60); // one minute
    }

    stop() {
        document.querySelector('.words-input').setAttribute('disabled', '');
        clearTimeout(this.timer);
        this.dropRightWordsCount();
        this.dropWrongWordsCount();
    }

    showResult() {
        document.querySelector('.words-container').innerHTML = `
            <p>Количество правильно введёных слов за минуту: ${this.getRightWordsCount()}</p>
            <p>Количество неправильно введёных слов за минуту: ${this.getWrongWordsCount()}</p>

        `;
    }

    updateWordssetContainer() {
        let wordssetContainer = document.querySelector('.words-container');
        wordssetContainer.innerHTML = '';
    
        let currentWordsList = this.wordsList.getCurrentWordsList();

        currentWordsList.forEach((word, i) => {
            let wordContainer = document.createElement('p');
            wordContainer.textContent = word;
    
            if (i == 0) {
                wordContainer.classList.add('highlight');
            }
    
            wordssetContainer.appendChild(wordContainer);
        });
    }

    incrementRightWordsCount() {
        this.rightWordsCount++;
    }

    dropRightWordsCount() {
        this.rightWordsCount = 0;
    }

    getRightWordsCount() {
        return this.rightWordsCount;
    }

    incrementWrongWordsCount() {
        this.wrongWordsCount++;
    }

    dropWrongWordsCount() {
        this.wrongWordsCount = 0;
    }

    getWrongWordsCount() {
        return this.wrongWordsCount;
    }
}