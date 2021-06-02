new Selectable({
    filter: '.word',
    appendTo: '.words-container'
});

let deleteWords = (words) => {
    words.forEach((word) => {
        word.remove();
    });
}

let addWord = (wordText) => {
    let word = document.createElement('p');
    word.classList.add('word');
    word.classList.add('ui-selectable');
    
    word.textContent = wordText;

    document.querySelector('.words-container').insertAdjacentElement('beforeEnd', word);
}

let updateWordsset = async (words, idWordsset) => {
    let formData = new FormData();
    
    formData.append('wordsset', words);
    formData.append('id', idWordsset);

    return await fetch('/model/update-wordsset.php', {
        body: formData,
        method: 'POST'
    })
}

document.querySelector('.delete').addEventListener('click', () => {
    let selectedWords = document.querySelectorAll('.ui-selected');

    deleteWords(selectedWords);
});


document.querySelector('.update').addEventListener('click', async () => {
    let words = document.querySelectorAll('.word');

    words = [...words]
        .map((word) => word.textContent)
        .join(' ');


    let idWordsset = new URL(location.href).searchParams.get('id');
    

    await updateWordsset(words, idWordsset);

    window.location.reload();
});

document.querySelector('.add-new-word').addEventListener('click', () => {
    let word = document.querySelector('.enter-new-word').value;

    if (word.length == 0) {
        return;
    }

    addWord(word);

    document.querySelector('.enter-new-word').value = '';

    // new object because new words are not tracked
    new Selectable({
        filter: '.word',
        appendTo: '.words-container'
    });
});