class WordsList {
    constructor(words) {
        this.originalWordsList = words;
        this.currentWordsList = this.generateCurrentWordsList();
    }
    
    generateCurrentWordsList() {
        return shuffle(this.originalWordsList); // shuffle() from /assets/js/functions/shuffle.js
    }

    nextWord() {
        this.currentWordsList.shift();
    }

    appendNewWord() {
        let minIndex = 0;
        let maxIndex = this.originalWordsList.length;
        let index = Math.floor(Math.random() * (maxIndex - minIndex)) + minIndex;
        
        let newWord = this.originalWordsList[index];

        this.currentWordsList.push(newWord);
    }

    getCurrentWord() {
        return this.currentWordsList[0];
    }

    getCurrentWordsList() {
        return this.currentWordsList;
    }
}