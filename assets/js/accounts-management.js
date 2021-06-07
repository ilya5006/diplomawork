let search = document.querySelector('.search');
let accountsContainer = document.querySelector('.accounts-management-container');
let accounts = [...accountsContainer.querySelectorAll('a')];

search.addEventListener('input', (event) => {
    let accountName = event.target.value;

    let suitableAccounts = accounts.filter((account) => {
        return account.textContent.search(accountName) != -1;
    });

    accountsContainer.innerHTML = '';

    suitableAccounts.forEach((account) => {
        accountsContainer.appendChild(account);
    });
});
