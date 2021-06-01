let currentURL = window.location.href;
let errorText = new URL(currentURL).searchParams.get('error');

let isHaveError = errorText.length > 0;

if (isHaveError) {
    let messanger = new Messanger(errorText);

    messanger.showMessage();
    
    setTimeout(messanger.destroyMessage, 3 * 1000); // 3 seconds
}