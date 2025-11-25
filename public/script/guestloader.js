document.addEventListener('DOMContentLoaded', function() {
    function attachFormLoader(formId, btnId, spinnerId) {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', function() {
                const btn = document.getElementById(btnId);
                const spinner = document.getElementById(spinnerId);
                spinner.classList.remove('d-none');
                btn.setAttribute('disabled', true);
            });
        }
    }

    attachFormLoader('loginForm', 'loginBtn', 'loginSpinner');
    attachFormLoader('registerForm', 'registerBtn', 'registerSpinner');
});
