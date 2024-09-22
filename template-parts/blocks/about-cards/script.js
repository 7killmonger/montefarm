document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.card-expand');
    
    cards.forEach(card =>{
        card.addEventListener('click', function(){
            const cardContent = card.querySelector('.card-content');
            cardContent.classList.add('expanded');
            console.log('clicked');
        });
    })

});