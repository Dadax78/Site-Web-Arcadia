// Fonction pour incrémenter le compteur de vues
function incrementView(counterId) {
    // Récupérer l'élément du compteur
    var counter = document.getElementById(counterId);
    
    // Récupérer la valeur actuelle du compteur depuis localStorage
    var currentCount = localStorage.getItem(counterId) ? parseInt(localStorage.getItem(counterId)) : 0;
    
    // Incrémenter la valeur du compteur
    currentCount++;
    
    // Mettre à jour l'affichage du compteur sur la page
    counter.innerText = "Nombre de vues : " + currentCount;
    
    // Sauvegarder la nouvelle valeur dans le localStorage
    localStorage.setItem(counterId, currentCount);
}

// Lorsque la page est chargée, mettre à jour les compteurs avec les valeurs stockées
window.onload = function() {
    var counters = [
        'view-count-girafe',
        'view-count-lion',
        'view-count-elephant',
        'view-count-gnou',
        'view-count-tigre',
        
    ];

    // Pour chaque compteur, récupérer la valeur stockée et l'afficher
    counters.forEach(function(counterId) {
        var storedCount = localStorage.getItem(counterId);
        if (storedCount !== null) {
            document.getElementById(counterId).innerText = "Nombre de vues : " + storedCount;
        }
    });
};
