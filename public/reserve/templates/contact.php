<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=contact");
    die("");
}


require_once __DIR__ . '/../../../config/bootstrap.php';
use Services\Mailer;

// --- DÉBUT RÉCUPÉRATION DES BLOCS DE PAGE ---
// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Contact" (La Réserve) est 19
$page_id = 19;

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

$selected_subject = isset($_GET['subject']) ? $_GET['subject'] : '';
$feedback = '';
$feedback_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        $feedback = "Session invalide, veuillez recharger la page.";
        $feedback_type = "error";
    } else {
        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $structure = trim($_POST['structure'] ?? '');
        $telephone = trim($_POST['telephone'] ?? '');
        $sujet = $_POST['sujet'] ?? 'general';
        $message_user = trim($_POST['message'] ?? '');
        $champ_piege = $_POST['champ_piege'] ?? '';

        if (!empty($champ_piege)) {
            $feedback = "Erreur de validation anti-spam.";
            $feedback_type = "error";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $feedback = "L'adresse email n'est pas valide.";
            $feedback_type = "error";
        } else {
            // Concatenation
            $messageFinal = "Sujet : $sujet\n";
            $messageFinal .= "Nom/Prénom : $nom\n";
            $messageFinal .= "Structure : " . ($structure ?: "Non renseignée") . "\n";
            $messageFinal .= "Email : $email\n";
            $messageFinal .= "Téléphone : " . ($telephone ?: "Non renseigné") . "\n\n";

            $messageFinal .= "Message :\n$message_user\n";

            // Envoi du mail
            $destinataire = "contact@noeuxenvironnement.fr";
            if (!isset($objet)) { // Si pas déjà défini par le bloc réservation
                $objet = "[Site Reserve] Contact - $sujet - $nom";
            }

            // Limite
            $messageFinal = substr($messageFinal, 0, 3000);

            // 1. Stockage BDD
            try {
                $pdo = Database::getConnection();
                $stmt = $pdo->prepare("
                    INSERT INTO messages_contact (site_id, nom, email, sujet, message, ip, date_creation) 
                    VALUES (:site_id, :nom, :email, :sujet, :message, :ip, NOW())
                ");
                $stmt->execute([
                    'site_id' => 2, // 2 = La Réserve
                    'nom' => $nom,
                    'email' => $email,
                    'sujet' => $sujet,
                    'message' => $messageFinal,
                    'ip' => $_SERVER['REMOTE_ADDR'] ?? ''
                ]);
            } catch (Exception $e) {
                // Log error if needed
            }

            // 2. Envoi Mail
            if (Mailer::sendMail($destinataire, $objet, nl2br(htmlspecialchars($messageFinal)), $messageFinal)) {
                $feedback = "Merci, votre demande a bien été envoyée.";
                $feedback_type = "success";
            } else {
                $feedback = "Une erreur est survenue lors de l'envoi de l'email.";
                $feedback_type = "error";
            }
        }
    }
}
?>

<style>
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    .contact-form {
        background-color: var(--white);
        padding: 2rem;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: var(--secondary-color);
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-family: inherit;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 150px;
    }

    /* Subject Cards */
    .subject-cards {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    @media (min-width: 768px) {
        .subject-cards {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .subject-card {
        background-color: var(--white);
        padding: 1.5rem;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        text-align: center;
        cursor: pointer;
        transition: transform 0.2s, border-color 0.2s;
        border: 2px solid transparent;
    }

    .subject-card:hover {
        transform: translateY(-3px);
        border-color: var(--primary-color);
    }

    .subject-card h3 {
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    .subject-card p {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 1rem;
    }

    .subject-card .btn-select {
        display: inline-block;
        padding: 0.5rem 1rem;
        background-color: var(--secondary-color);
        color: var(--white);
        border-radius: 20px;
        font-size: 0.8rem;
        text-decoration: none;
    }
</style>



<section class="hero" style="background-image: url('<?= htmlspecialchars($blocs['hero_image']['chemin_fichier'] ?? 'assets/images/lareservehero_bellephoto_nuit.jpg') ?>');">
    <div class="hero-content">
        <h1><?= $blocs['hero_titre']['contenu_texte_publie'] ?? 'Contact' ?></h1>
        <p><?= $blocs['hero_paragraphe_1']['contenu_texte_publie'] ?? 'Une question ? Un projet de visite ou d’animation ? Une réservation de salle ?' ?></p>
        <p><?= $blocs['hero_paragraphe_2']['contenu_texte_publie'] ?? 'Cette page vous permet de nous écrire facilement, en précisant le motif de votre demande. Nous vous répondrons dans les meilleurs délais.' ?></p>
    </div>
</section>

<main class="container">

    <section class="content-section">
        <h2 class="section-title"><?= $blocs['sujets_titre']['contenu_texte_publie'] ?? 'Que souhaitez-vous faire ?' ?></h2>
        <div class="subject-cards">
            <div class="subject-card" onclick="selectSubject('general')">
                <h3><?= $blocs['sujet_general_titre']['contenu_texte_publie'] ?? 'Question générale' ?></h3>
                <p><?= $blocs['sujet_general_desc']['contenu_texte_publie'] ?? 'Une question sur La Réserve, le lieu, un projet, une info pratique…' ?></p>
                <span class="btn-select"><?= $blocs['contact_btn_choisir_1']['contenu_texte_publie'] ?? 'Choisir ce sujet' ?></span>
            </div>
            <div class="subject-card" onclick="selectSubject('visite')">
                <h3><?= $blocs['sujet_visite_titre']['contenu_texte_publie'] ?? 'Visite ou animation' ?></h3>
                <p><?= $blocs['sujet_visite_desc']['contenu_texte_publie'] ?? 'Organiser une visite guidée, une animation scolaire, un atelier ou une journée pro.' ?></p>
                <span class="btn-select"><?= $blocs['contact_btn_choisir_2']['contenu_texte_publie'] ?? 'Choisir ce sujet' ?></span>
            </div>
            <div class="subject-card" onclick="selectSubject('location')">
                <h3><?= $blocs['sujet_location_titre']['contenu_texte_publie'] ?? 'Réservation de salle' ?></h3>
                <p><?= $blocs['sujet_location_desc']['contenu_texte_publie'] ?? 'Utiliser une salle de La Réserve pour une réunion, une formation, un événement…' ?></p>
                <span class="btn-select"><?= $blocs['contact_btn_choisir_3']['contenu_texte_publie'] ?? 'Choisir ce sujet' ?></span>
            </div>
            <div class="subject-card" onclick="selectSubject('marche')">
                <h3><?= $blocs['contact_sujet_marche_titre']['contenu_texte_publie'] ?? 'Marché & alimentation' ?></h3>
                <p><?= $blocs['contact_sujet_marche_desc']['contenu_texte_publie'] ?? 'Question sur le marché, les retraits de commandes, les liens avec Nœux Environnement.' ?></p>
                <span class="btn-select"><?= $blocs['contact_btn_choisir_4']['contenu_texte_publie'] ?? 'Choisir ce sujet' ?></span>
            </div>
            <div class="subject-card" onclick="selectSubject('projet')">
                <h3><?= $blocs['contact_sujet_projet_titre']['contenu_texte_publie'] ?? 'Partenariat / projet' ?></h3>
                <p><?= $blocs['contact_sujet_projet_desc']['contenu_texte_publie'] ?? 'Proposer un projet commun, un partenariat, une expérimentation, un événement partagé.' ?></p>
                <span class="btn-select"><?= $blocs['contact_btn_choisir_5']['contenu_texte_publie'] ?? 'Choisir ce sujet' ?></span>
            </div>
        </div>
    </section>

    <section class="content-section" id="form-section">
        <h2 class="section-title"><?= $blocs['contact_form_titre']['contenu_texte_publie'] ?? 'Formulaire de contact' ?></h2>
        <div class="contact-grid">
            <div>
                <?php if ($feedback): ?>
                    <div class="feedback <?= $feedback_type ?>"
                        style="padding: 1rem; margin-bottom: 1rem; border-radius: var(--border-radius); <?= $feedback_type === 'success' ? 'background: #e8f5e9; color: #2e7d32;' : 'background: #ffebee; color: #c62828;' ?>">
                        <?= htmlspecialchars($feedback) ?>
                    </div>
                <?php endif; ?>

                <form class="contact-form" method="post">
                    <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
                    <div class="form-group">
                        <label for="sujet">Sujet de la demande</label>
                        <select id="sujet" name="sujet">
                            <option value="general" <?php echo ($selected_subject == 'general') ? 'selected' : ''; ?>>Question générale</option>
                            <option value="visite" <?php echo ($selected_subject == 'visite') ? 'selected' : ''; ?>>Visite / Animation</option>
                            <option value="marche" <?php echo ($selected_subject == 'marche') ? 'selected' : ''; ?>>Marché & Alimentation locale</option>
                            <option value="projet" <?php echo ($selected_subject == 'projet') ? 'selected' : ''; ?>>Partenariat / Projet</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom / Prénom *</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="structure">Structure (facultatif)</label>
                        <input type="text" id="structure" name="structure"
                            placeholder="Association, école, collectivité...">
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone (facultatif)</label>
                        <input type="tel" id="telephone" name="telephone">
                    </div>

                    <div style="display:none;">
                        <label>Si vous êtes humain, laissez ce champ vide :</label>
                        <input type="text" name="champ_piege" value="">
                    </div>

                    <div class="form-group">
                        <label for="message">Votre message *</label>
                        <textarea id="message" name="message" required
                            placeholder="Merci de préciser quelques éléments : type de public, dates, besoins..."></textarea>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: normal;">
                            <input type="checkbox" required> J’accepte que mes données soient utilisées uniquement pour
                            répondre à ma demande.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer la demande</button>
                </form>
            </div>

            <div>
                <div
                    style="background-color: var(--white); padding: 2rem; border-radius: var(--border-radius); box-shadow: var(--shadow);">
                    <h2><?= $blocs['contact_coordonnees_titre']['contenu_texte_publie'] ?? 'Nos coordonnées' ?></h2>
                    <div style="width: 100%; height: 250px; margin-top: 1rem; border-radius: 4px; overflow: hidden; box-shadow: var(--shadow);">
                        <?= $blocs['contact_iframe_map']['contenu_texte_publie'] ?? '<iframe width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen src="https://maps.google.com/maps?q=22%20bis%20Rue%20Nationale,%2062290%20Noeux-les-Mines&t=&z=15&ie=UTF8&iwloc=&output=embed"></iframe>' ?>
                    </div>
                    <p><?= $blocs['contact_coordonnees_intro']['contenu_texte_publie'] ?? 'Vous pouvez aussi nous joindre :' ?></p>
                    <ul style="list-style: none; margin-top: 1rem;">
                        <li style="margin-bottom: 0.5rem;">📞 <strong>Par téléphone :</strong> <?= $blocs['contact_coordonnees_tel']['contenu_texte_publie'] ?? '03 21 66 37 74' ?>
                        </li>
                        <li style="margin-bottom: 0.5rem;">📧 <strong>Par mail :</strong> <?= $blocs['contact_coordonnees_mail']['contenu_texte_publie'] ?? 'contact@noeuxenvironnement.fr' ?></li>
                        <li style="margin-bottom: 0.5rem;">📍 <strong>Sur place :</strong><br>
                            <?= $blocs['contact_coordonnees_adresse']['contenu_texte_publie'] ?? 'La Réserve – 22 bis rue Nationale<br>62290 Nœux-les-Mines' ?></li>
                    </ul>

                    <h3 style="margin-top: 2rem; font-size: 1.2rem; color: var(--primary-color);"><?= $blocs['contact_delais_titre']['contenu_texte_publie'] ?? 'Délais de réponse' ?></h3>
                    <p style="margin-top: 0.5rem;"><?= $blocs['contact_delais_texte_1']['contenu_texte_publie'] ?? 'Nous faisons notre possible pour répondre rapidement à vos demandes. En période de forte activité (événements, saisons agricoles, vacances…), le délai peut être un peu plus long.' ?></p>
                    <p style="margin-top: 0.5rem;"><?= $blocs['contact_delais_texte_2']['contenu_texte_publie'] ?? 'Si vous n’avez pas de réponse après quelques jours, n’hésitez pas à nous relancer.' ?></p>
                </div>
            </div>
        </div>
    </section>

</main>



<script>
    // Function to select subject and scroll to form
    function selectSubject(value) {
        if (value === 'location') {
            window.location.href = 'index.php?view=reserver-salle';
            return;
        }
        const select = document.getElementById('sujet');
        if (select) {
            select.value = value;
            document.getElementById('form-section').scrollIntoView({ behavior: 'smooth' });
        }
    }

    // Attach event listener to select
    document.getElementById('sujet').addEventListener('change', function () {
    });

    // Check URL parameters on load
    window.onload = function () {
        const urlParams = new URLSearchParams(window.location.search);
        const subject = urlParams.get('subject');

        // Default update based on current select value (if prefilled or default)
        const currentVal = document.getElementById('sujet').value;

        if (subject) {
            selectSubject(subject);
        }
    };
</script>