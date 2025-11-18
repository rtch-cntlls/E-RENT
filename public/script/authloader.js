const form = document.querySelector('form');
const loginBtn = document.getElementById('loginBtn');
const btnText = document.getElementById('btnText');
const btnSpinner = document.getElementById('btnSpinner');

form.addEventListener('submit', function() {
    loginBtn.disabled = true;
    btnText.textContent = 'Logging in...';
    btnSpinner.classList.remove('d-none');
});