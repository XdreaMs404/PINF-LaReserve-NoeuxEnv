<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=contact");
    die("");
}

require_once __DIR__ . '/../../../config/bootstrap.php';
use Services\Mailer;

$selected_subject = isset($_GET['subject']) ? $_GET['subject'] : '';
$feedback = '';
$feedback_type = ''; // 'success' or 'error'

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        $feedback = "Session invalide, veuillez recharger la page.";
        $feedback_type = "error";
    } else {
        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $tel = trim($_POST['telephone'] ?? '');
        $sujet = $_POST['sujet'] ?? 'general';
        $message_user = trim($_POST['message'] ?? '');

        // Validation de base
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $feedback = "L'adresse email n'est pas valide.";
            $feedback_type = "error";
        } elseif ($sujet === 'candidature' && empty($tel) && empty($email)) {
            $feedback = "Veuillez renseigner au moins un email ou un téléphone.";
            $feedback_type = "error";
        } else {
            // Construction du message final
            $messageFinal = "Sujet : $sujet\n";
            $messageFinal .= "Nom/Prénom : $nom\n";
            $messageFinal .= "Email : $email\n";
            $messageFinal .= "Téléphone : $tel\n\n";
            $messageFinal .= "Message :\n$message_user\n";

            // Branchement spécifique Animation Extérieure
            if ($sujet === 'animation_exterieure') {
                $lieu = trim($_POST['lieu'] ?? '');
                $date_souhaitee = trim($_POST['date_souhaitee'] ?? '');
                $effectif = trim($_POST['effectif'] ?? '');

                $messageFinal .= "\n\n---- DÉTAILS ANIMATION ----\n";
                $messageFinal .= "Lieu souhaité : " . ($lieu ?: "Non renseigné") . "\n";
                $messageFinal .= "Date souhaitée : " . ($date_souhaitee ?: "Non renseignée") . "\n";
                $messageFinal .= "Effectif prévu : " . ($effectif ?: "Non renseigné") . "\n";
                $messageFinal .= "---------------------------\n";
            }

            // Branchement spécifique Bénévolat
            if ($sujet === 'candidature') {
                $b_nom = trim($_POST['benevole_nom'] ?? '');
                $b_prenom = trim($_POST['benevole_prenom'] ?? '');
                $b_adresse = trim($_POST['benevole_adresse'] ?? '');
                $b_tel = trim($_POST['benevole_telephone'] ?? '');
                $b_prof = trim($_POST['benevole_profession'] ?? '');
                $b_savoir = isset($_POST['benevole_savoirfaire']) ? implode(', ', $_POST['benevole_savoirfaire']) : '(aucun)';
                $b_savoir_autre = trim($_POST['benevole_savoirfaire_autre'] ?? '');
                $b_envies = isset($_POST['benevole_envies']) ? implode(', ', $_POST['benevole_envies']) : '(aucune)';
                $b_envies_autre = trim($_POST['benevole_envies_autre'] ?? '');

                $messageFinal .= "\n\n---- CANDIDATURE BÉNÉVOLE ----\n";
                $messageFinal .= "Nom : " . ($b_nom ?: $nom) . "\n";
                $messageFinal .= "Prénom : $b_prenom\n";
                $messageFinal .= "Adresse : " . ($b_adresse ?: "(non renseignée)") . "\n";
                $messageFinal .= "Téléphone : " . ($b_tel ?: $tel) . "\n";
                $messageFinal .= "Profession : " . ($b_prof ?: "(non renseignée)") . "\n";
                $messageFinal .= "Savoir-faire : $b_savoir\n";
                if ($b_savoir_autre)
                    $messageFinal .= "Autre savoir-faire : $b_savoir_autre\n";
                $messageFinal .= "Envies : $b_envies\n";
                if ($b_envies_autre)
                    $messageFinal .= "Autre envie : $b_envies_autre\n";
                $messageFinal .= "-----------------------------\n";
            }

            // Envoi du mail
            $destinataire = "alexis.hecquet59@gmail.com"; // a changer avec contact@noeuxenvironnement.fr
            $objet = "[Site Noeux] " . ($sujet === 'candidature' ? "Candidature bénévole" : "Nouveau message") . " - $nom";

            // On limite la longueur
            $messageFinal = substr($messageFinal, 0, 3000);

            // 1. Enregistrement en Base de Données
            try {
                $pdo = Database::getConnection();
                $stmt = $pdo->prepare("
                    INSERT INTO messages_contact (site_id, nom, email, sujet, message, ip, date_creation) 
                    VALUES (:site_id, :nom, :email, :sujet, :message, :ip, NOW())
                ");
                $stmt->execute([
                    'site_id' => 1, // 1 = Noeux Environnement
                    'nom' => $sujet === 'candidature' ? ($b_nom ?: $nom) : $nom,
                    'email' => $email,
                    'sujet' => $sujet,
                    'message' => $messageFinal,
                    'ip' => $_SERVER['REMOTE_ADDR'] ?? ''
                ]);
            } catch (Exception $e) {
                // On ne bloque pas l'envoi de mail si la BDD échoue, mais on pourrait logger l'erreur
                // error_log("Erreur insertion BDD contact: " . $e->getMessage());
            }

            // 2. Envoi du mail
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
    /* Subject Cards Styling */
    .subject-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .subject-card {
        background: var(--white);
        border: 2px solid transparent;
        border-radius: var(--border-radius);
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: var(--shadow);
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 120px;
    }

    .subject-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
    }

    .subject-card.active {
        border-color: var(--primary-color);
        background-color: rgba(46, 125, 50, 0.05);
    }

    .subject-card h3 {
        color: var(--primary-color);
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .subject-card p {
        font-size: 0.85rem;
        color: #666;
    }

    /* Extra fields & Volunteer block animation */
    #extra-fields,
    #bloc-benevole {
        display: none;
        background: rgba(46, 125, 50, 0.05);
        padding: 1.5rem;
        border-radius: var(--border-radius);
        margin-bottom: 1.5rem;
        border-left: 4px solid var(--primary-color);
    }

    .checkbox-group {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 0.5rem;
        margin-top: 0.5rem;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
    }

    .checkbox-item input {
        width: auto;
    }
</style>


<!-- En-tête de la page -->
<section class="page-header"
    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/equipe_noeux_environnement.jpg');">
    <h1>Contact & Venir</h1>
</section>

<!-- Le contenu principal -->
<main class="container">
    <!-- Section 1 : Pourquoi nous contacter ? -->
    <section class="content-section" style="text-align: center;">
        <h2 class="section-title">Pourquoi souhaitez-vous nous contacter ?</h2>
        <p>Cliquez sur l'un des sujets ci-dessous pour accéder directement au formulaire correspondant.</p>

        <div class="subject-cards">
            <div class="subject-card" data-subject="general" onclick="selectSujet('general')">
                <h3>Question générale</h3>
                <p>Infos pratiques, horaires, projets...</p>
            </div>
            <div class="subject-card" data-subject="animation_exterieure" onclick="selectSujet('animation_exterieure')">
                <h3>Animation à l’extérieur</h3>
                <p>Demander une intervention dans votre structure ou sur un site naturel.</p>
            </div>
            <div class="subject-card" data-subject="visite_reserve"
                onclick="window.location.href='/reserve/index.php?view=contact&subject=visite'">
                <h3>Visite à La Réserve</h3>
                <p>Organiser une visite ou une animation sur notre écolieu.</p>
            </div>
            <div class="subject-card" data-subject="partenariat" onclick="selectSujet('partenariat')">
                <h3>Partenariat / Financement</h3>
                <p>Proposer un projet commun ou soutenir nos actions.</p>
            </div>
            <div class="subject-card" data-subject="candidature" onclick="selectSujet('candidature')">
                <h3>Candidature / Bénévolat</h3>
                <p>Rejoindre nos équipes ou devenir bénévole.</p>
            </div>
        </div>
    </section>

    <!-- Contact Grid -->
    <section class="content-section">
        <div class="contact-grid">
            <!-- Formulaire -->
            <div class="contact-form-container" id="form-contact">
                <h2>Votre message</h2>

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
                        <select id="sujet" name="sujet" onchange="updateFormBySujet(this.value)">
                            <option value="general" <?php echo ($selected_subject == 'general') ? 'selected' : ''; ?>>
                                Question générale</option>
                            <option value="animation_exterieure" <?php echo ($selected_subject == 'animation_exterieure') ? 'selected' : ''; ?>>Animation à l'extérieur</option>
                            <option value="partenariat" <?php echo ($selected_subject == 'partenariat') ? 'selected' : ''; ?>>Partenariat / Financement</option>
                            <option value="candidature" <?php echo ($selected_subject == 'candidature') ? 'selected' : ''; ?>>Candidature / Bénévolat</option>
                            <option value="autre" <?php echo ($selected_subject == 'autre') ? 'selected' : ''; ?>>Autre
                            </option>
                        </select>
                    </div>

                    <!-- Champs conditionnels pour l'animation extérieure -->
                    <div id="extra-fields">
                        <div class="form-group">
                            <label for="lieu">Lieu de l'animation souhaité</label>
                            <input type="text" id="lieu" name="lieu"
                                placeholder="Ex: École de l'Artois, parc communal...">
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label for="date_souhaitee">Date souhaitée</label>
                                <input type="date" id="date_souhaitee" name="date_souhaitee">
                            </div>
                            <div class="form-group">
                                <label for="effectif">Effectif prévu</label>
                                <input type="number" id="effectif" name="effectif" placeholder="Nombre de personnes">
                            </div>
                        </div>
                    </div>

                    <!-- BLOC BÉNÉVOLE -->
                    <section id="bloc-benevole">
                        <p style="margin-bottom: 1rem; font-style: italic;">Merci de remplir ces informations pour nous
                            aider à mieux vous connaître.</p>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label for="benevole_nom">Nom *</label>
                                <input type="text" id="benevole_nom" name="benevole_nom">
                            </div>
                            <div class="form-group">
                                <label for="benevole_prenom">Prénom *</label>
                                <input type="text" id="benevole_prenom" name="benevole_prenom">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="benevole_adresse">Adresse</label>
                            <input type="text" id="benevole_adresse" name="benevole_adresse">
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label for="benevole_telephone">Téléphone</label>
                                <input type="tel" id="benevole_telephone" name="benevole_telephone">
                            </div>
                            <div class="form-group">
                                <label for="benevole_profession">Profession / Études</label>
                                <input type="text" id="benevole_profession" name="benevole_profession">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Vos savoir-faire</label>
                            <div class="checkbox-group">
                                <label class="checkbox-item"><input type="checkbox" name="benevole_savoirfaire[]"
                                        value="Naturaliste"> Naturaliste</label>
                                <label class="checkbox-item"><input type="checkbox" name="benevole_savoirfaire[]"
                                        value="Communication"> Communication / Événementiel</label>
                                <label class="checkbox-item"><input type="checkbox" name="benevole_savoirfaire[]"
                                        value="Bricolage"> Bricolage</label>
                                <label class="checkbox-item"><input type="checkbox" name="benevole_savoirfaire[]"
                                        value="Transmission"> Transmettre des savoirs</label>
                                <label class="checkbox-item"><input type="checkbox" name="benevole_savoirfaire[]"
                                        value="Artistique"> Artistique</label>
                            </div>
                            <input type="text" name="benevole_savoirfaire_autre" placeholder="Autres savoir-faire..."
                                style="margin-top: 0.5rem;">
                        </div>

                        <div class="form-group">
                            <label>Nos savoir-faire et vos envies</label>
                            <div class="checkbox-group">
                                <label class="checkbox-item"><input type="checkbox" name="benevole_envies[]"
                                        value="Social"> Social (ateliers numériques, CV...)</label>
                                <label class="checkbox-item"><input type="checkbox" name="benevole_envies[]"
                                        value="Ecocitoyennete"> Écocitoyenneté (stands, animations)</label>
                                <label class="checkbox-item"><input type="checkbox" name="benevole_envies[]"
                                        value="Environnement"> Environnement (chantiers, jardinage)</label>
                            </div>
                            <input type="text" name="benevole_envies_autre" placeholder="Autres envies..."
                                style="margin-top: 0.5rem;">
                        </div>
                    </section>

                    <div class="form-group" id="main-nom-group">
                        <label for="nom">Nom, Prénom *</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required oninput="syncEmail(this.value)">
                    </div>
                    <div class="form-group" id="main-tel-group">
                        <label for="telephone">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone">
                    </div>
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" required
                            placeholder="Comment pouvons-nous vous aider ?"></textarea>
                    </div>
                    <div class="form-group" style="flex-direction: row; align-items: center; gap: 0.5rem;">
                        <input type="checkbox" id="consent" name="consent" required style="width: auto;">
                        <label for="consent" style="margin: 0; font-weight: normal; font-size: 0.9rem;">J’accepte
                            que mes données soient utilisées pour répondre à ma demande.</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>

            <!-- Infos & Accès -->
            <div class="contact-info">
                <div
                    style="background-color: var(--white); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem; box-shadow: var(--shadow);">
                    <h3>Coordonnées</h3>
                    <p><strong>Téléphone :</strong> 03 21 66 37 74</p>
                    <p><strong>Email :</strong> contact@noeuxenvironnement.fr </p>
                    <p><strong>Adresse :</strong><br>La Réserve – Nœux Environnement<br>22 bis rue
                        Nationale<br>62290 Nœux-les-Mines</p>
                </div>

                <div
                    style="background-color: var(--white); padding: 1.5rem; border-radius: 8px; box-shadow: var(--shadow);">
                    <h3>Venir à La Réserve</h3>
                    <p>La Réserve est le lieu d’accueil principal de Nœux Environnement.</p>
                    <ul style="list-style-type: disc; padding-left: 1.5rem; margin-top: 1rem;">
                        <li><strong>En voiture :</strong> stationnement possible à proximité.</li>
                        <li><strong>En transports :</strong> lignes de bus à proximité.</li>
                        <li><strong>À vélo / à pied :</strong> accès facile depuis le centre-ville.</li>
                    </ul>
                    <!-- Placeholder Map -->
                    <div
                        style="width: 100%; height: 200px; background-color: #ddd; margin-top: 1rem; display: flex; align-items: center; justify-content: center; border-radius: 4px;">
                        <span>Carte Google Maps</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
    function updateFormBySujet(value) {
        const extraFields = document.getElementById('extra-fields');
        const blocBenevole = document.getElementById('bloc-benevole');
        const mainNomGroup = document.getElementById('main-nom-group');
        const mainTelGroup = document.getElementById('main-tel-group');

        // Hide everything first
        extraFields.style.display = 'none';
        blocBenevole.style.display = 'none';
        mainNomGroup.style.display = 'block';
        mainTelGroup.style.display = 'block';

        // Reset required fields for all specific sections
        document.getElementById('benevole_nom').required = false;
        document.getElementById('benevole_prenom').required = false;
        document.getElementById('nom').required = true; // Default required for main name field

        if (value === 'animation_exterieure') {
            extraFields.style.display = 'block';
        } else if (value === 'candidature') {
            blocBenevole.style.display = 'block';
            mainNomGroup.style.display = 'none'; // Replaced by benevole_nom/prenom
            mainTelGroup.style.display = 'none'; // Replaced by benevole_telephone

            // Set required fields for volunteer mode
            document.getElementById('benevole_nom').required = true;
            document.getElementById('benevole_prenom').required = true;
            document.getElementById('nom').required = false; // Main name not required in volunteer mode
        }
    }

    function selectSujet(value) {
        const select = document.getElementById('sujet');
        if (select) {
            select.value = value;
            updateFormBySujet(value);

            // Highlight active card
            document.querySelectorAll('.subject-card').forEach(card => card.classList.remove('active'));
            const activeCard = document.querySelector(`.subject-card[data-subject="${value}"]`);
            if (activeCard) activeCard.classList.add('active');

            // Scroll to form
            document.getElementById('form-contact').scrollIntoView({ behavior: 'smooth' });
        }
    }

    // Optional: Sync email if needed, though usually redundant with a single form
    function syncEmail(value) {
        // Implementation if we had separate email fields, here we use the same one
    }

    // Check URL parameters on load
    window.addEventListener('load', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const subject = urlParams.get('subject');
        if (subject && subject !== 'visite_reserve') {
            selectSujet(subject);
        } else {
            // If no subject in URL or it's 'visite_reserve', initialize form based on current select value
            updateFormBySujet(document.getElementById('sujet').value);
        }
    });
</script>