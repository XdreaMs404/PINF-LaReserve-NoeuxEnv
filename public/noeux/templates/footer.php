<?php

if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

?>


<footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Noeux Environnement</h3>
                <p>Association de protection de la nature et d'insertion.</p>
                <p>22 bis Rue Nationale<br>62290 Nœux-les-Mines</p>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <p>Tél : 03 21 66 37 74</p>
                <p>Email : asso@noeuxenvironnement.fr</p>
            </div>
            <div class="footer-section">
                <h3>Liens Utiles</h3>
                <ul>
                    <li><a href="../login.php">Connexion</a></li>
                    <li><a href="index.php?view=mentions-legales">Mentions Légales</a></li>
                    <li><a href="index.php?view=contact">Nous contacter</a></li>
                    <li><a href="assets/docs/journal-asso-2025.pdf" target="_blank">Livret associatif</a></li>
                    <li><a href="index.php?view=nous-rejoindre">Recrutement</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Noeux Environnement. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>