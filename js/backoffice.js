document.addEventListener('DOMContentLoaded', () => {
    // Gestion des onglets
    const navLinks = document.querySelectorAll('.nav-link');
    const tabContents = document.querySelectorAll('.tab-content');

    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Désactiver tous les onglets
            navLinks.forEach(l => l.classList.remove('active'));
            tabContents.forEach(tab => tab.classList.remove('active'));
            
            // Activer l'onglet cliqué
            this.classList.add('active');
            document.getElementById(this.dataset.tab).classList.add('active');
        });
    });

    // Gestion des modales
    const createButtons = document.querySelectorAll('.btn-create');
    const modals = document.querySelectorAll('.modal');
    const closeButtons = document.querySelectorAll('.close');

    createButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const modalId = btn.dataset.modal;
            document.getElementById(modalId).style.display = 'block';
        });
    });

    closeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            btn.closest('.modal').style.display = 'none';
        });
    });

    // Fermer la modale en cliquant en dehors
    window.addEventListener('click', (event) => {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });

    // Gestion du formulaire de création/modification
    const bonusForm = document.getElementById('bonus-form');
    bonusForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Logique d'envoi des données (AJAX/Fetch)
        const formData = {
            id: document.getElementById('bonus-id').value,
            name: document.getElementById('bonus-name').value,
            description: document.getElementById('bonus-description').value
        };

        // Exemple de logique (à remplacer par votre logique backend)
        console.log('Données du formulaire :', formData);
        
        // Fermer la modale
        bonusForm.closest('.modal').style.display = 'none';
    });

    // Fonction pour charger les données (à implémenter avec votre backend)
    function loadData(type) {
        // Exemple de chargement de données
        fetch(`/api/${type}`)
            .then(response => response.json())
            .then(data => {
                // Remplir le tableau correspondant
                const list = document.getElementById(`${type}-list`);
                list.innerHTML = ''; // Vider la liste existante
                
                data.forEach(item => {
                    const row = `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.description}</td>
                            <td>
                                <button class="btn-update" onclick="editItem('${type}', ${item.id})">✏️</button>
                                <button class="btn-delete" onclick="deleteItem('${type}', ${item.id})">🗑️</button>
                            </td>
                        </tr>
                    `;
                    list.innerHTML += row;
                });
            });
    }

    // Fonctions d'édition et de suppression (à personnaliser)
    window.editItem = (type, id) => {
        // Logique d'édition
        console.log(`Éditer ${type} ${id}`);
    };

    window.deleteItem = (type, id) => {
        // Logique de suppression
        console.log(`Supprimer ${type} ${id}`);
    };

    // Charger les données de la première section par défaut
    loadData('bonus');
});
