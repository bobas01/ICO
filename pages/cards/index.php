<!-- <?php include '../../Include/navbar.php'; ?> -->

<div class="container">
    <h1>Gestion des Cartes</h1>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success'] ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error'] ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <a href="/cards/create" class="btn btn-primary mb-3">Créer une nouvelle carte</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Règle</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cards as $card): ?>
                <tr>
                    <td><?= $card['id'] ?></td>
                    <td><?= htmlspecialchars($card['name']) ?></td>
                    <td><?= htmlspecialchars($card['description']) ?></td>
                    <td><?= htmlspecialchars($card['rules']) ?></td>
                    <td><?= htmlspecialchars($card['type']) ?></td>
                    <td>
                        <a href="/cards/edit/<?= $card['id'] ?>" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="/cards/delete/<?= $card['id'] ?>" method="POST" style="display:inline-block;">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'views/partials/footer.php'; ?>
