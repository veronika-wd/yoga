const form = document.getElementById('startForm');
    const modal = document.getElementById('modal');
    const closeModalBtn = document.getElementById('closeModal');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const name = form.name.value.trim();
        const phone = form.phone_number.value.trim();

        if (name === '' || phone === '') {
            alert('Пожалуйста, заполните все поля.');
            return;
        }
        modal.style.display = 'flex';
        form.reset();
    });
    closeModalBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });