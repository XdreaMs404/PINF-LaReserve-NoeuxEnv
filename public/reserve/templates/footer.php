<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php");
	die("");
}
?>

<footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>La Réserve</h3>
                <p>Écolieu vivant de l'Artois.</p>
                <p>Un projet porté par Nœux Environnement.</p>
                <p>22 bis Rue Nationale<br>62290 Nœux-les-Mines</p>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <p>Tél : 03 21 66 37 74</p>
                <p>Email : contact@noeux-environnement.fr</p>
            </div>
            <div class="footer-section">
                <h3>Liens Utiles</h3>
                <ul>
                    <li><a href="../login.php">Connexion</a></li>
                    <li><a href="index.php?view=chiffres-amenagements">Chiffres & Aménagements</a></li>
                    <li><a href="index.php?view=contact">Nous contacter</a></li>
                    <li><a href="index.php?view=mentions-legales">Mentions Légales</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 La Réserve - Nœux Environnement. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>