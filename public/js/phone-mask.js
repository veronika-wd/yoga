function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('eye-icon');

    if (input.type === 'password') {
        input.type = 'text';
        icon.innerHTML = `
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                <line x1="1" y1="1" x2="23" y2="23"/>
            `;
    } else {
        input.type = 'password';
        icon.innerHTML = `
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
            `;
    }
}

// Маска телефона
const phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    let formatted = '';

    if (value.length > 0) {
        if (value[0] === '8') value = '7' + value.slice(1);
        if (value[0] !== '7') value = '7' + value;

        formatted = '+7';
        if (value.length > 1) formatted += ' (' + value.slice(1, 4);
        if (value.length > 4) formatted += ') ' + value.slice(4, 7);
        if (value.length > 7) formatted += '-' + value.slice(7, 9);
        if (value.length > 9) formatted += '-' + value.slice(9, 11);
    }

    e.target.value = formatted;
});

phoneInput.addEventListener('focus', function(e) {
    if (!e.target.value) {
        e.target.value = '+7';
    }
});
