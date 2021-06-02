const wordssetsOriginalList = [...document.querySelectorAll('.wordsset')];
let search = document.querySelector('.search');
let wordssetsContainer = document.querySelector('.wordssets-container');

search.addEventListener('input', (e) => {
    wordssetsContainer.innerHTML = '';
    
    let searchText = e.target.value;

    let suitableWordssets = wordssetsOriginalList.filter((wordsset) => {
        return wordsset.textContent.search(searchText) != -1;
    });

    suitableWordssets.forEach((wordsset) => {
        wordssetsContainer.appendChild(wordsset);
    });

});