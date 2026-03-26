<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=agenda");
    exit();
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Agenda" est 17
$page_id = 17;

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
?>

    <section class="hero agenda-bg-primary" style="<?php if(!empty($blocs['agenda_hero_img']['chemin_fichier'])) echo 'background-image: url(\''.htmlspecialchars($blocs['agenda_hero_img']['chemin_fichier']).'\');'; ?>">
        <div class="hero-content">
            <h1><?= $blocs['agenda_hero_h1']['contenu_texte_publie'] ?? 'Agenda' ?></h1>
            <p><?= $blocs['agenda_hero_p']['contenu_texte_publie'] ?? 'Retrouvez ici tous les rendez-vous à La Réserve : visites, ateliers, marchés, événements, journées professionnelles…' ?></p>
        </div>
    </section>

    <main class="container">

        <section class="content-section">
            <h2 class="section-title"><?= $blocs['agenda_h2_1']['contenu_texte_publie'] ?? 'Les prochains rendez-vous' ?></h2>
            
            <div id='calendar'></div>
        </section>

        <section class="content-section agenda-bg-white">
            <div class="text-content">
                <h2><?= $blocs['agenda_h2_2']['contenu_texte_publie'] ?? 'Quels événements à La Réserve ?' ?></h2>
                <ul class="agenda-list">
                    <li><?= $blocs['agenda_li_1']['contenu_texte_publie'] ?? '<strong>Visites guidées</strong> : découverte de l’écolieu.' ?></li>
                    <li><?= $blocs['agenda_li_2']['contenu_texte_publie'] ?? '<strong>Ateliers jardin & nature</strong> : sol, biodiversité, bricolage.' ?></li>
                    <li><?= $blocs['agenda_li_3']['contenu_texte_publie'] ?? '<strong>Ateliers alimentation</strong> : cuisine, anti-gaspillage.' ?></li>
                    <li><?= $blocs['agenda_li_4']['contenu_texte_publie'] ?? '<strong>Événements tout public</strong> : fêtes, marchés.' ?></li>
                    <li><?= $blocs['agenda_li_5']['contenu_texte_publie'] ?? '<strong>Journées professionnelles</strong> : visites techniques.' ?></li>
                </ul>
            </div>
        </section>

        <section class="content-section" style="text-align: center;">
            <h2 class="section-title"><?= $blocs['agenda_h2_3']['contenu_texte_publie'] ?? 'Proposer un événement' ?></h2>
            <p><?= $blocs['agenda_p_1']['contenu_texte_publie'] ?? 'Vous êtes une association, une collectivité, une entreprise ? Vous souhaitez organiser un événement à La Réserve ?' ?></p>
            <a href="<?= htmlspecialchars($blocs['agenda_a_1']['url_publie'] ?? 'index.php?view=contact') ?>" class="btn btn-primary" style="margin-top: 1rem;">
                <?= $blocs['agenda_a_1']['contenu_texte_publie'] ?? 'Contactez-nous pour en discuter' ?>
            </a>
        </section>

    </main>

    <div id="agendaModal" class="agenda-modal-overlay">
        <div class="agenda-modal">
            <button class="agenda-modal-close" onclick="closeAgendaModal()">&times;</button>
            <h3 id="agendaModalTitle">Titre de l'événement</h3>
            <p id="agendaModalDesc">Description de l'événement</p>
        </div>
    </div>

    <script>
        // Fonction pour fermer la modale
        function closeAgendaModal() {
            document.getElementById('agendaModal').style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                buttonText: {
                    today: "Aujourd'hui",
                    month: "Mois",
                    week: "Semaine"
                },
                events: {
                    url: 'api/get_calendar.php', 
                    format: 'ics'
                },
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); // Empêche le comportement par défaut

                    // On remplit la modale avec les infos de l'événement
                    document.getElementById('agendaModalTitle').innerText = info.event.title;
                    var description = info.event.extendedProps.description || 'Pas de description disponible pour cet événement.';
                    document.getElementById('agendaModalDesc').innerText = description;
                    
                    // On affiche la modale
                    document.getElementById('agendaModal').style.display = 'flex';
                }
            });
            calendar.render();

            // Fermer la modale si on clique à l'extérieur
            var modalOverlay = document.getElementById('agendaModal');
            window.onclick = function(event) {
                if (event.target == modalOverlay) {
                    closeAgendaModal();
                }
            }
        });
    </script>