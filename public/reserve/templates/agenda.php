<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=agenda");
    exit();
}
?>


    <section class="hero" style="background-color: var(--primary-color);">
        <div class="hero-content">
            <h1>Agenda</h1>
            <p>Retrouvez ici tous les rendez-vous à La Réserve : visites, ateliers, marchés, événements, journées professionnelles…</p>
        </div>
    </section>

    <main class="container">

        <section class="content-section">
            <h2 class="section-title">Les prochains rendez-vous</h2>
            
            <div id='calendar'></div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <div class="text-content">
                <h2>Quels événements à La Réserve ?</h2>
                <ul style="list-style: disc; margin-left: 1.5rem;">
                    <li><strong>Visites guidées</strong> : découverte de l’écolieu.</li>
                    <li><strong>Ateliers jardin & nature</strong> : sol, biodiversité, bricolage.</li>
                    <li><strong>Ateliers alimentation</strong> : cuisine, anti-gaspillage.</li>
                    <li><strong>Événements tout public</strong> : fêtes, marchés.</li>
                    <li><strong>Journées professionnelles</strong> : visites techniques.</li>
                </ul>
            </div>
        </section>

        <section class="content-section" style="text-align: center;">
            <h2 class="section-title">Proposer un événement</h2>
            <p>Vous êtes une association, une collectivité, une entreprise ? Vous souhaitez organiser un événement à La Réserve ?</p>
            <a href="index.php?view=contact" class="btn btn-primary" style="margin-top: 1rem;">Contactez-nous pour en discuter</a>
        </section>

    </main>

    <script>
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
                    url: 'templates/get_calendar.php', 
                    format: 'ics'
                },
                eventClick: function(info) {
                    alert('Événement : ' + info.event.title + '\nDescription : ' + (info.event.extendedProps.description || 'Pas de description'));
                    info.jsEvent.preventDefault(); // Empêche de quitter la page
                }
            });
            calendar.render();
        });
    </script>


