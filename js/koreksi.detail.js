document.addEventListener('DOMContentLoaded', function() {

    const tabBtns = document.querySelectorAll('.tab-btn');
    const questionCards = document.querySelectorAll('.question-card');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tabBtns.forEach(b => b.classList.remove('tab-btn--active'));
            this.classList.add('tab-btn--active');
            const filter = this.dataset.filter;

            questionCards.forEach(card => {
                if (filter === 'all' || card.dataset.status === filter) {
                    card.style.display = '';
                    card.style.animation = 'fadeSlideIn 0.3s ease forwards';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
