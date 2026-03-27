<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=reserver-salle");
    die("");
}

// On récupère les anciennes données si elles existent, puis on vide la session
$old = isset($_SESSION['sauvegarde_post']) ? $_SESSION['sauvegarde_post'] : array();
unset($_SESSION['sauvegarde_post']);
    
$sqlSalles = "SELECT s.*, m.chemin_fichier 
              FROM salles s 
              LEFT JOIN medias m ON s.image_principale_id = m.id 
              WHERE s.site_id = 2 AND s.statut = 'publie'";
$salles = parcoursRs(SQLSelect($sqlSalles));

// On récupère les créneaux autorisés par salle
$sqlCreneauxParSalle = "
    SELECT ds.salle_id, c.id, c.moment, c.debut, c.fin
    FROM disponibilites_salles ds
    JOIN creneaux c ON c.id = ds.id_creneau
    WHERE c.actif = 1
    ORDER BY ds.salle_id, c.debut ASC
";
$rowsCreneaux = parcoursRs(SQLSelect($sqlCreneauxParSalle));

$creneauxParSalle = [];
foreach ($rowsCreneaux as $row) {
    $salleId = $row['salle_id'];

    if (!isset($creneauxParSalle[$salleId])) {
        $creneauxParSalle[$salleId] = [];
    }

    $creneauxParSalle[$salleId][] = [
        'id' => $row['id'],
        'moment' => $row['moment'],
        'debut' => $row['debut'],
        'fin' => $row['fin']
    ];
}

// --- DÉBUT RÉCUPÉRATION DES BLOCS DE PAGE ---
// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Réserver une salle" (La Réserve) est 18
$page_id = 18;

// 3. On récupère TOUS les blocs de cette page
$stmt = $pdo->prepare("
    SELECT b.*, m.chemin_fichier, m.texte_alt 
    FROM blocs_page b 
    LEFT JOIN medias m ON b.media_publie_id = m.id 
    WHERE b.page_id = :page_id
");
$stmt->execute(['page_id' => $page_id]);
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 4. On réorganise les résultats par leur nom (titre_publie)
$blocs = [];
foreach ($resultats as $row) {
    $blocs[$row['titre_publie']] = $row;
}
// --- FIN RÉCUPÉRATION ---
?>

<?php if ($msg = valider("msg", "GET")): ?>
    <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem; text-align: center;">
        <?= htmlspecialchars($msg) ?>
    </div>
    
<?php endif; ?>

<?php if ($err = valider("err", "GET")): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem; text-align: center;">
        <?= htmlspecialchars($err) ?>
    </div>
<?php endif; ?>



    <section class="hero" style="background-image: url('<?= htmlspecialchars($blocs['hero_image']['chemin_fichier'] ?? 'assets/images/salle_reunion.jpg') ?>');">
        <div class="hero-content">
            <h1><?= $blocs['hero_titre']['contenu_texte_publie'] ?? 'Réserver une salle à La Réserve' ?></h1>
            <p><?= $blocs['hero_paragraphe_1']['contenu_texte_publie'] ?? 'La Réserve dispose de plusieurs salles et espaces qui peuvent accueillir vos réunions, ateliers, formations ou journées d’équipe.' ?></p>
            <p><?= $blocs['hero_paragraphe_2']['contenu_texte_publie'] ?? 'Nous mettons ces espaces à disposition des associations, collectivités, structures sociales, organismes de formation et entreprises, dans la mesure des disponibilités du lieu.' ?></p>
        </div>
    </section>
    

    <main class="container">

        <section class="content-section">
    <h2 class="section-title"><?= $blocs['salles_titre']['contenu_texte_publie'] ?? 'Les espaces à votre disposition' ?></h2>
    <div class="grid-3">
        <?php foreach ($salles as $salle): ?>
            <div class="card" style="display: flex; flex-direction: column;">
                <?php if (!empty($salle['chemin_fichier'])): ?>
                    <img src="../<?= htmlspecialchars($salle['chemin_fichier']) ?>" style="width:100%; height:200px; object-fit:cover; border-radius:8px 8px 0 0; margin:-1.5rem -1.5rem 1rem -1.5rem; max-width: calc(100% + 3rem);" alt="Photo de la salle">
                <?php endif; ?>
                <h3 style="margin-top:0;"><?= htmlspecialchars(stripslashes($salle['nom'])) ?></h3>
                <?php if ($salle['capacite']): ?>
                    <p><strong>Capacité :</strong> ~<?= htmlspecialchars($salle['capacite']) ?> personnes</p>
                <?php endif; ?>
                <p><strong>Équipement :</strong> <?= nl2br(htmlspecialchars(stripslashes($salle['equipements']))) ?></p>
                <div style="flex-grow: 1;">
                    <p><strong>Description :</strong> <?= nl2br(htmlspecialchars(stripslashes($salle['description']))) ?></p>
                </div>
                
                <button 
                    class="btn btn-primary btn-reserver" 
                    style="margin-top: 1rem;"
                    data-salle-id="<?= $salle['id'] ?>" 
                    data-salle-nom="<?= htmlspecialchars(stripslashes($salle['nom'])) ?>">
                    Réserver cette salle
                </button>
            </div>
        <?php endforeach; ?>
    </div>
    <p style="text-align: center; margin-top: 2rem;"><?= $blocs['salles_footer']['contenu_texte_publie'] ?? 'Lors de votre demande, nous vous aidons à choisir la salle la plus adaptée à votre événement.' ?></p>
</section>

        <section class="content-section" style="background-color: var(--white);">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['projets_titre']['contenu_texte_publie'] ?? 'Pour quels types de projets ?' ?></h2>
                    <p><?= $blocs['projets_intro']['contenu_texte_publie'] ?? 'Les salles de La Réserve peuvent accueillir par exemple :' ?></p>
                    <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                        <li><?= $blocs['projets_li_1']['contenu_texte_publie'] ?? 'des réunions d’équipe ou de coordination,' ?></li>
                        <li><?= $blocs['projets_li_2']['contenu_texte_publie'] ?? 'des journées de formation ou de sensibilisation à la transition,' ?></li>
                        <li><?= $blocs['projets_li_3']['contenu_texte_publie'] ?? 'des journées d’étude ou séminaires avec temps en salle + visite du site,' ?></li>
                        <li><?= $blocs['projets_li_4']['contenu_texte_publie'] ?? 'des ateliers participatifs avec des habitants ou des partenaires,' ?></li>
                        <li><?= $blocs['projets_li_5']['contenu_texte_publie'] ?? 'des événements associatifs (AG, rencontres, temps conviviaux)' ?></li>
                        <li><?= $blocs['projets_li_6']['contenu_texte_publie'] ?? 'des séminaires d’entreprise autour de la RSE, du climat, de la biodiversité…' ?></li>
                    </ul>
                    <div
                        style="margin-top: 2rem; padding: 1.5rem; background-color: var(--background-color); border-left: 5px solid var(--accent-color); border-radius: 4px;">
                        <p><strong><?= $blocs['projets_encart_titre']['contenu_texte_publie'] ?? 'Si vous le souhaitez, nous pouvons aussi vous proposer :' ?></strong></p>
                        <ul style="list-style: disc; margin-left: 1.5rem;">
                            <li><?= $blocs['projets_encart_li_1']['contenu_texte_publie'] ?? 'une visite guidée du site,' ?></li>
                            <li><?= $blocs['projets_encart_li_2']['contenu_texte_publie'] ?? 'un atelier nature, jardin ou alimentation animé par Nœux Environnement,' ?></li>
                        </ul>
                        <p><?= $blocs['projets_encart_footer']['contenu_texte_publie'] ?? 'en complément de votre temps en salle.' ?></p>
                    </div>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['projets_image']['chemin_fichier'] ?? 'assets/images/plan_vue_de_haut_locaux.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['projets_image']['texte_alt'] ?? 'Vue de haut des locaux') ?>">
                </div>
            </div>
        </section>

        <section class="content-section">
            <h2 class="section-title"><?= $blocs['comment_titre']['contenu_texte_publie'] ?? 'Comment réserver une salle ?' ?></h2>
            <div class="grid-3">
                <div class="card">
                    <h3><?= $blocs['etape1_titre']['contenu_texte_publie'] ?? 'Étape 1 – Faire une demande' ?></h3>
                    <p><?= $blocs['etape1_texte']['contenu_texte_publie'] ?? 'Vous remplissez le formulaire en cliquant sur "Réserver cette salle" ci-dessus.' ?></p>
                    <p style="font-size: 0.9rem; margin-top: 0.5rem;"><?= $blocs['etape1_subtexte']['contenu_texte_publie'] ?? 'Merci d\'ajouter des précisions en cas de demande ou de besoin particulier.' ?></p>
                </div>
                <div class="card">
                    <h3><?= $blocs['etape2_titre']['contenu_texte_publie'] ?? 'Étape 2 – Validation et confirmation' ?></h3>
                    <p><?= $blocs['etape2_texte']['contenu_texte_publie'] ?? 'L’équipe de La Réserve vous répond pour vérifier les disponibilités et ajuster la configuration. Si tout est OK, nous vous envoyons un récapitulatif par mail.' ?></p>
                </div>
                <div class="card">
                    <h3><?= $blocs['etape3_titre']['contenu_texte_publie'] ?? 'Étape 3 – Règlement via Trello' ?></h3>
                    <p><?= $blocs['etape3_texte']['contenu_texte_publie'] ?? 'Pour finaliser, vous recevez un lien externe Trello pour accéder à votre dossier et effectuer le paiement en ligne sécurisé.' ?></p>
                    <p style="font-size: 0.9rem; margin-top: 0.5rem;"><?= $blocs['etape3_subtexte']['contenu_texte_publie'] ?? 'Une fois validé, la réservation est confirmée.' ?></p>
                </div>
            </div>
            <p style="text-align: center; margin-top: 2rem; font-size: 0.9rem; color: #666;">
                <?= $blocs['comment_footer']['contenu_texte_publie'] ?? '🔒 Le paiement est géré via Trello sur un espace sécurisé externe. Aucune donnée bancaire n’est stockée sur le site de La Réserve.' ?>
            </p>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <div class="text-content">
                <h2><?= $blocs['infos_pratiques_titre']['contenu_texte_publie'] ?? 'Quelques informations pratiques' ?></h2>
                <ul style="list-style: disc; margin-left: 1.5rem;">
                    <li><?= $blocs['infos_pratiques_li_1']['contenu_texte_publie'] ?? '<strong>Horaires :</strong> les salles sont en général disponibles en journée (et parfois en soirée selon les possibilités).' ?></li>
                    <li><?= $blocs['infos_pratiques_li_2']['contenu_texte_publie'] ?? '<strong>Accès :</strong> La Réserve – 22 bis rue Nationale, 62290 Nœux-les-Mines (parking à proximité).' ?></li>
                    <li><?= $blocs['infos_pratiques_li_3']['contenu_texte_publie'] ?? '<strong>Matériel :</strong> vérifiez avec nous ce qui est disponible concernant le matériel et ce que vous devez apporter.' ?></li>
                    <li><?= $blocs['infos_pratiques_li_4']['contenu_texte_publie'] ?? '<strong>Ménage & rangement :</strong> la salle doit être rendue dans un état conforme à celui d’arrivée.' ?></li>
                </ul>
                
            </div>
        </section>

        <div id="modal-reservation" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 1000; justify-content: center; align-items: center; backdrop-filter: blur(2px);">
        <div style="background: white; padding: 2rem; border-radius: 12px; max-width: 650px; width: 95%; max-height: 90vh; overflow-y: auto; position: relative; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
            
            <span id="close-modal" style="position: absolute; top: 15px; right: 20px; font-size: 1.8rem; cursor: pointer; color: #666;">&times;</span>
            
            <h2 id="modal-titre" style="margin-top: 0; color: var(--primary-color); border-bottom: 2px solid #eee; padding-bottom: 10px;">Réserver une salle</h2>
            
        <form action="controleur.php" method="POST" style="...">
        
        <input type="hidden" name="action" value="traiter_reservation">
        
        <input type="hidden" name="salle_id" id="salle_id_input" value="">
        
        <div style="display:none;">
            <label>Ne pas remplir ce champ si vous êtes humain :</label>
            <input type="text" name="champ_piege" value="">
        </div>

                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Prénom *</label>
                        <input type="text" name="prenom" value="<?= htmlspecialchars($old['prenom'] ?? '') ?>" required style="width: 100%; padding: 0.7rem; border: 1px solid #ccc; border-radius: 5px;">
                    </div>
                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Nom *</label>
                        <input type="text" name="nom" value="<?= htmlspecialchars($old['nom'] ?? '') ?>" required style="width: 100%; padding: 0.7rem; border: 1px solid #ccc; border-radius: 5px;">
                    </div>
                </div>

                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Email *</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required style="width: 100%; padding: 0.7rem; border: 1px solid #ccc; border-radius: 5px;">
                    </div>
                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Téléphone</label>
                        <input type="text" name="telephone" value="<?= htmlspecialchars($old['telephone'] ?? '') ?>" style="width: 100%; padding: 0.7rem; border: 1px solid #ccc; border-radius: 5px;">
                    </div>
                </div>

                <div style="background: #f9f9f9; padding: 1rem; border-radius: 8px; border: 1px solid #eee;">
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Date souhaitée *</label>
                        <input type="date" id="date_voulue" name="date_voulue" required style="width: 100%; max-width: 200px; padding: 0.6rem; border: 1px solid #ccc; border-radius: 5px;">
                    </div>

                    <label style="display: block; font-weight: bold; margin-bottom: 8px;">Créneaux souhaités *</label>
                        <div id="zone-creneaux" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 0.8rem;">
                            <p style="margin: 0; color: #666;">Choisissez d’abord une salle.</p>
                        </div>
                </div>

                <div>
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Besoins matériels spécifiques</label>
                    <small id="char-count" style="color: #64748b;">150 caractères maximum</small>
                    <textarea name="besoin_materiel" 
                            maxlength="150" 
                            style="width: 100%; height: 80px;"></textarea>                </div>

                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; background: #eef9ff; padding: 10px; border-radius: 5px; border: 1px solid #bde4ff;">
                    <input type="checkbox" name="cuisine_pedagogique" value="1">
                    <strong>Option : Utilisation de la cuisine pédagogique</strong>
                </label>

                <div>
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Message / Précisions</label>
                    <textarea name="message" rows="3" style="width: 100%; padding: 0.7rem; border: 1px solid #ccc; border-radius: 5px; resize: vertical;"></textarea>
                </div>
                <div id="error-message" style="display: none; color: #dc3545; background-color: #f8d7da; padding: 0.5rem; border-radius: 4px; margin-bottom: 1rem; font-size: 0.9rem; border: 1px solid #f5c6cb;">
                    Veuillez sélectionner au moins un créneau horaire.
                </div>

                <button type="submit" class="btn btn-primary" ...>Envoyer la demande</button>

            </form>
        </div>
    </div>

    </main>

<script>
    const creneauxParSalle = <?= json_encode($creneauxParSalle, JSON_UNESCAPED_UNICODE) ?>;

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal-reservation');
    const form = modal.querySelector('form');
    const inputDate = document.getElementById('date_voulue');
    const inputSalleId = document.getElementById('salle_id_input');
    const zoneCreneaux = document.getElementById('zone-creneaux');

        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                modal.style.display = 'none';
            }
        });

    function majDisponibilites() {
    const date = inputDate.value;
    const salleId = inputSalleId.value;
    if (!date || !salleId) return;

    fetch(`get_occupations.php?salle_id=${salleId}&date=${date}`)
        .then(res => res.json())
        .then(idsPris => {
            const checkboxes = zoneCreneaux.querySelectorAll('input[name="id_creneau[]"]');

            checkboxes.forEach(cb => {
                const label = cb.closest('label');
                const isOccupe = idsPris.includes(parseInt(cb.value));

                const ancienBadge = label.querySelector('.status-label');
                if (ancienBadge) ancienBadge.remove();

                if (isOccupe) {
                    cb.disabled = true;
                    cb.checked = false;
                    label.style.opacity = '0.3';
                    label.style.pointerEvents = 'none';
                    label.style.color = 'red';
                    label.insertAdjacentHTML('beforeend', '<small class="status-label" style="font-weight:bold;"> (Indisponible)</small>');
                } else {
                    cb.disabled = false;
                    label.style.opacity = '1';
                    label.style.pointerEvents = 'auto';
                    label.style.color = 'inherit';
                }
            });
        });
}
function afficherCreneauxSalle(salleId) {
    const creneaux = creneauxParSalle[salleId] || [];

    if (creneaux.length === 0) {
        zoneCreneaux.innerHTML = '<p style="margin:0; color:#666;">Aucun créneau disponible pour cette salle.</p>';
        return;
    }

    zoneCreneaux.innerHTML = '';

    creneaux.forEach(creneau => {
        const label = document.createElement('label');
        label.style.display = 'flex';
        label.style.alignItems = 'center';
        label.style.gap = '0.5rem';
        label.style.fontWeight = 'normal';
        label.style.cursor = 'pointer';
        label.style.background = 'white';
        label.style.padding = '5px 10px';
        label.style.borderRadius = '4px';
        label.style.border = '1px solid #ddd';

        label.innerHTML = `
            <input type="checkbox" name="id_creneau[]" value="${creneau.id}">
            <span style="font-size: 0.9rem;">
                ${creneau.moment.charAt(0).toUpperCase() + creneau.moment.slice(1)} <br>
                <small style="color: #666;">${creneau.debut.substring(0,5)} - ${creneau.fin.substring(0,5)}</small>
            </span>
        `;

        zoneCreneaux.appendChild(label);
    });
}
    // Ouverture de la modale au clic sur un bouton "Réserver"
    document.querySelectorAll('.btn-reserver').forEach(btn => {
    btn.addEventListener('click', function() {
        const salleId = this.getAttribute('data-salle-id');

        inputSalleId.value = salleId;
        document.getElementById('modal-titre').textContent = 'Réserver : ' + this.getAttribute('data-salle-nom');

        afficherCreneauxSalle(salleId);
        modal.style.display = 'flex';
        majDisponibilites();
    });
});

    // Rafraîchir si l'utilisateur change la date
    inputDate.addEventListener('change', majDisponibilites);

    // Fermeture de la modale
    document.getElementById('close-modal').addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Sécurité : Vérifier qu'au moins un créneau est coché avant d'envoyer
    form.addEventListener('submit', function(e) {
        const coches = modal.querySelectorAll('input[name="id_creneau[]"]:checked');
        if (coches.length === 0) {
            e.preventDefault();
            alert("Veuillez choisir au moins un créneau horaire.");
        }
    });
});

window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});

document.addEventListener('keydown', function(event) {
    if (event.key === "Escape" && modal.style.display === 'flex') {
        modal.style.display = 'none';
    }
});
</script>