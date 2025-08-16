function filterCards(category) {
    const cards = document.querySelectorAll('.cause-card');
    const buttons = document.querySelectorAll('.filter-buttons button');

    buttons.forEach(btn => btn.classList.remove('active'));

    // Jo click kiya usko active karo
    event.target.classList.add('active');

    // Filter logic
    cards.forEach(card => {
        if (category === 'all' || card.classList.contains(category)) {
            card.classList.add('show');
        } else {
            card.classList.remove('show');
        }
    });
}
