 
    window.onload = function() {
        // Liste des IDs des compteurs de vues
        const viewIds = [
            'view-count-petit-singe', 'view-count-serpent-vert', 'view-count-leopard',
            'view-count-chevre', 'view-count-coq', 'view-count-vache', 'view-count-mouton',
            'view-count-canard-vert', 'view-count-canard-blanc', 'view-count-tortue',
            'view-count-baleine', 'view-count-dauphin', 'view-count-pingouin'
        ];
    
        // Initialiser chaque compteur de vues avec les valeurs du LocalStorage
        viewIds.forEach(function(id) {
            let count = localStorage.getItem(id) ? localStorage.getItem(id) : 0;
            document.getElementById(id).innerText = "Nombre de vues : " + count;
        });
    };
    
function incrementview(id) {
    // Récupérer le nombre de vues stocké dans le LocalStorage ou initialiser à 0
    let count = localStorage.getItem(id) ? parseInt(localStorage.getItem(id)) : 0;

    // Incrémenter le compteur de vues
    count++;

    // Mettre à jour le compteur de vues sur la page
    document.getElementById(id).innerText = "Nombre de vues : " + count;

    // Sauvegarder le nouveau nombre de vues dans le LocalStorage
    localStorage.setItem(id, count);
}
