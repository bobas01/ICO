<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Back Office - ICO Board Game</title>
    <link rel="stylesheet" href="../css/custom-backoffice.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-title">Back Office</div>
            <nav>
                <div class="nav-group">
                    <div class="nav-group-title">Cartes</div>
                    <a class="nav-link active" data-tab="cartes-bonus">Cartes Bonus</a>
                    <a class="nav-link" data-tab="cartes-roles">Cartes Rôles</a>
                    <a class="nav-link" data-tab="cartes-action">Cartes Action</a>
                </div>
                
                <div class="nav-group">
                    <div class="nav-group-title">Gestion</div>
                    <a class="nav-link" data-tab="distribution-cartes">Distribution des Cartes</a>
                    <a class="nav-link" data-tab="materiel">Matériel</a>
                </div>
                
                <div class="nav-group">
                    <div class="nav-group-title">Communication</div>
                    <a class="nav-link" data-tab="evenements">Événements</a>
                    <a class="nav-link" data-tab="jeux-extensions">Jeux et Extensions</a>
                    <a class="nav-link" data-tab="articles">Articles</a>
                </div>
            </nav>
        </div>
        
        <div class="main-content">
            <!-- Cartes Bonus -->
            <div id="cartes-bonus" class="tab-content active">
                <div class="content-header">
                    <h2>Cartes Bonus</h2>
                    <button class="btn-create" data-modal="bonus-modal">+ Créer Carte Bonus</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="bonus-list">
                        <!-- Liste des cartes bonus sera générée dynamiquement -->
                    </tbody>
                </table>
            </div>

            <!-- Cartes Action -->
<div id="cartes-action" class="tab-content">
    <div class="content-header">
        <h2>Cartes Action</h2>
        <button class="btn-create" data-modal="action-modal">+ Créer Carte Action</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="action-list">
            <!-- Liste des cartes action -->
        </tbody>
    </table>
</div>

<!-- Distribution des Cartes -->
<div id="distribution-cartes" class="tab-content">
    <div class="content-header">
        <h2>Distribution des Cartes</h2>
        <button class="btn-create" data-modal="distribution-modal">+ Créer Distribution</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de la Distribution</th>
                <th>Date</th>
                <th>Nombre de Cartes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="distribution-list">
            <!-- Liste des distributions de cartes -->
        </tbody>
    </table>
</div>

<!-- Matériel -->
<div id="materiel" class="tab-content">
    <div class="content-header">
        <h2>Matériel</h2>
        <button class="btn-create" data-modal="materiel-modal">+ Ajouter Matériel</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Quantité</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="materiel-list">
            <!-- Liste du matériel -->
        </tbody>
    </table>
</div>

<!-- Événements -->
<div id="evenements" class="tab-content">
    <div class="content-header">
        <h2>Événements</h2>
        <button class="btn-create" data-modal="evenement-modal">+ Créer Événement</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="evenement-list">
            <!-- Liste des événements -->
        </tbody>
    </table>
</div>

<!-- Jeux et Extensions -->
<div id="jeux-extensions" class="tab-content">
    <div class="content-header">
        <h2>Jeux et Extensions</h2>
        <button class="btn-create" data-modal="jeu-modal">+ Ajouter Jeu/Extension</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Année</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="jeu-list">
            <!-- Liste des jeux et extensions -->
        </tbody>
    </table>
</div>

<!-- Articles -->
<div id="articles" class="tab-content">
    <div class="content-header">
        <h2>Articles</h2>
        <button class="btn-create" data-modal="article-modal">+ Créer Article</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date de Publication</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="article-list">
            <!-- Liste des articles -->
        </tbody>
    </table>
</div>

<!-- Modales pour chaque section -->
<!-- Distribution des Cartes Modal -->
<div id="distribution-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Créer/Modifier Distribution</h3>
            <span class="modal-close">&times;</span>
        </div>
        <form id="distribution-form" class="modal-form">
            <input type="hidden" id="distribution-id">
            
            <div class="form-group">
                <label for="distribution-name">Nom de la Distribution</label>
                <input type="text" id="distribution-name" required>
            </div>
            
            <div class="form-group">
                <label for="distribution-date">Date</label>
                <input type="date" id="distribution-date" required>
            </div>
            
            <div class="form-group">
                <label for="distribution-cards">Nombre de Cartes</label>
                <input type="number" id="distribution-cards" required>
            </div>
            
            <div class="modal-actions">
                <button type="button" class="btn-cancel">Annuler</button>
                <button type="submit" class="btn-save">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<!-- Modales similaires pour chaque section -->
<div id="action-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Créer/Modifier Carte Action</h3>
            <span class="modal-close">&times;</span>
        </div>
        <form id="action-form" class="modal-form">
            <input type="hidden" id="action-id">
            
            <div class="form-group">
                <label for="action-name">Nom</label>
                <input type="text" id="action-name" required>
            </div>
            
            <div class="form-group">
                <label for="action-description">Description</label>
                <textarea id="action-description"></textarea>
            </div>
            
            <div class="modal-actions">
                <button type="button" class="btn-cancel">Annuler</button>
                <button type="submit" class="btn-save">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<!-- Autres modales à ajouter de manière similaire -->

            <div id="cartes-roles" class="tab-content">
                <div class="content-header">
                    <h2>Cartes Rôles</h2>
                    <button class="btn-create" data-modal="roles-modal">+ Créer Carte Rôle</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="roles-list">
                        <!-- Liste des cartes rôles -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modales -->
    <div id="bonus-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Créer/Modifier Carte Bonus</h3>
                <span class="modal-close">&times;</span>
            </div>
            <form id="bonus-form" class="modal-form">
                <input type="hidden" id="bonus-id">
                
                <div class="form-group">
                    <label for="bonus-name">Nom</label>
                    <input type="text" id="bonus-name" required>
                </div>
                
                <div class="form-group">
                    <label for="bonus-description">Description</label>
                    <textarea id="bonus-description"></textarea>
                </div>
                
                <div class="modal-actions">
                    <button type="button" class="btn-cancel">Annuler</button>
                    <button type="submit" class="btn-save">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script src="js/backoffice.js"></script>
</body>
</html>
