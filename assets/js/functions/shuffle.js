function removeDuplicatedElements(elements) {
    return elements.filter((value, index) => elements.indexOf(value) == index);
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min; //Максимум не включается, минимум включается
}

function getIntervals(elements) {
    let intervals = [];
    
    for (i = 0; i < elements.length - 1; i++) {
        if (elements[i + 1] - elements[i] > 1) {
            intervals.push([elements[i], elements[i + 1]]);
        }
    }

    return intervals;
}

function shuffle(elements) {
    let randomIndexes = []

    let firstIndex = 0;
    let lastIndex = elements.length - 1;

    let intervals = [[firstIndex, lastIndex]];

    while (randomIndexes.length !== elements.length) {
        intervals.forEach((oneInterval) => {
            let from = oneInterval[0];
            let to = oneInterval[1];

            for (let i = from; i <= to; i++) {
                randomIndexes.push(getRandomInt(from, to));
            }
        });

        randomIndexes = removeDuplicatedElements(randomIndexes);

        if (! randomIndexes.includes(0)) {
            randomIndexes.push(0);
        }

        if (! randomIndexes.includes(lastIndex)) {
            randomIndexes.push(lastIndex);
        }

        let randomIndexesSorted = [...randomIndexes].sort((a, b) => {
            return a - b;
        });

        intervals = getIntervals(randomIndexesSorted);
    }

    let shuffledElements = [];

    for (let i = 0; i < elements.length; i++) {
        shuffledElements[randomIndexes[i]] = elements[i];
    }

    return shuffledElements;
}