
<?php
include_once "libs/maLibSQL.pdo.php";
include_once "libs/maLibUtils.php";
include_once "libs/modele.php";

// On récupère les salles pour le formulaire ci-dessous
$tab = valider("tab") ?: "en_cours";
$reservations = listerReservationsParStatut($tab);
$salles = listerSalles();
$creneaux = listerCreneaux();
$sallesAvecCreneaux = listerSallesAvecCreneaux();

$salleAEditer = null;
if ($tab == "modifier_salle") {
    $id_salle_edit = valider("id");
    if ($id_salle_edit) {
        $sqlSalle = "SELECT * FROM salles WHERE id = " . intval($id_salle_edit);
        $resEdit = SQLSelect($sqlSalle);
        if ($resEdit instanceof PDOStatement) {
            $resEdit->setFetchMode(PDO::FETCH_ASSOC);
            $salleAEditer = $resEdit->fetch();
        }
    }
}
?>

<?php
$page_title = 'Dashboard Réservations';
require_once __DIR__ . '/../includes/header.php';
?>
<link rel="stylesheet" href="style.css">
<style>.container { box-shadow: none; margin: 0; max-width: 100%; }</style>
    <div class="header">
            <h1>Demandes de réservation</h1>
            <a href="../index.php" class="btn btn-secondary">Retour Dashboard</a>
        </div>
    
    <div class="tabs-container">
        <a href="index.php?tab=en_cours" class="<?= $tab == 'en_cours' ? 'active' : '' ?>">En cours</a>
        <a href="index.php?tab=confirme" class="<?= $tab == 'confirme' ? 'active' : '' ?>">Confirmées</a>
        <a href="index.php?tab=refuse" class="<?= $tab == 'refuse' ? 'active' : '' ?>">Refusées / Supprimées</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Date & Heure souhaitées</th>
                    <th>Date de demande</th>
                    <th>Salle</th>
                    <th>Client</th>
                    <th>Option cuisine pédagogique</th>
                    <th>Matériel & Message</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $res): ?>
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">
                            <span class="date-badge"><?= date('d/m/Y', strtotime($res['date_voulue'])) ?></span>
                            <span style="font-size: 0.85rem; color: #64748b;">
                                <?= substr($res['debut'], 0, 5) ?> — <?= substr($res['fin'], 0, 5) ?>
                            </span>
                        </td>
                        <td style="text-align: center; vertical-align: middle;"><?= date("d/m/Y H:i", strtotime($res['date_demande'])) ?></td>
                        <td style="text-align: center; vertical-align: middle;">
                            <span class="salle-name"><?= htmlspecialchars($res['nom_salle'] ?? 'Inconnue') ?></span>
                        </td>
                        <td class="client-info" style="text-align: center; vertical-align: middle;">
                            <b><?= htmlspecialchars($res['prenom'] . " " . $res['nom']) ?></b><br>
                            <span>📧 <?= htmlspecialchars($res['email']) ?></span><br>
                            <span>📞 <?= htmlspecialchars($res['telephone']) ?></span>
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <?php if (isset($res['cuisine_pedagogique']) && $res['cuisine_pedagogique'] == 1): ?>
                                <span style="color: #065f46; font-weight: bold; background: #d1fae5; padding: 4px 8px; border-radius: 6px; font-size: 0.75rem;">
                                    OUI 
                                </span>
                            <?php else: ?>
                                <span style="color: #000000; font-weight: bold; background: #fa9689; padding: 4px 8px; border-radius: 6px; font-size: 0.75rem;">NON</span>
                            <?php endif; ?>
                        </td>

                        <td style="text-align: center; vertical-align: middle;">
                            <?php if ($res['besoin_materiel']): ?>
                                <b>Besoin matériel :</b>
                                <div class="besoin-materiel-text"> <?= htmlspecialchars($res['besoin_materiel']) ?></div>
                            <?php endif; ?>
                            
                            <?php if ($res['message']): ?>
                                <b>Message :</b>
                                <div class="msg-bubble">"<?= htmlspecialchars($res['message']) ?>"</div>
                            <?php endif; ?>
                        </td>
            
                                        

                       <td style="text-align: center; vertical-align: middle;">
                            <div class="actions-group">
                                <?php if ($res['validation'] == 0): ?>
                                    <span class="badge badge-warning">En attente</span>
                                    <?php if (Auth::hasRole('redacteur')): ?>
                                    <div style="height: 5px;"></div> <a href="index.php?valider_id=<?= $res['id'] ?>&tab=<?= $tab ?>" onclick="return confirm('Confirmer ?');" class="btn btn-success btn-sm">Valider</a>
                                    <a href="index.php?refuser_id=<?= $res['id'] ?>&tab=<?= $tab ?>" onclick="return confirm('Refuser ?');" class="btn btn-danger btn-sm">Refuser</a>
                                    <?php endif; ?>

                                <?php elseif ($res['validation'] == 1): ?>
                                    <span class="badge badge-success">Confirmée</span>
                                    <?php if (Auth::hasRole('redacteur')): ?>
                                    <div style="height: 5px;"></div>
                                    <a href="index.php?retablir_id=<?= $res['id'] ?>&tab=<?= $tab ?>" class="btn btn-secondary btn-sm">En attente</a>
                                    <a href="index.php?supprimer_id=<?= $res['id'] ?>&tab=<?= $tab ?>" onclick="return confirm('Supprimer définitivement ?');" class="btn btn-danger btn-sm" style="background: #fecaca; color: #991b1b;">Supprimer</a>
                                    <?php endif; ?>

                                <?php elseif ($res['validation'] == -1): ?>
                                    <span class="badge badge-danger">Refusée</span>
                                    <?php if (Auth::hasRole('redacteur')): ?>
                                    <div style="height: 5px;"></div>
                                    <a href="index.php?retablir_id=<?= $res['id'] ?>&tab=<?= $tab ?>" class="btn btn-secondary btn-sm">En attente</a>
                                    <a href="index.php?supprimer_id=<?= $res['id'] ?>&tab=<?= $tab ?>" onclick="return confirm('Supprimer ?');" class="btn btn-danger btn-sm">Supprimer définitivement</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if (empty($reservations)): ?>
            <div style="padding: 40px; text-align: center; color: #94a3b8;">
                Aucune réservation pour le moment.
            </div>
        <?php endif; ?>
    </div>
</div>



    <br>
    <br>
    <?php if (Auth::hasRole('redacteur')): ?>
        <h2>Gestion des créneaux</h2>
        <div class="admin-card">
    <h3>➕ Créer un créneau</h3>

    <form action="index.php?tab=salles_creneaux" method="POST" class="form-inline-admin">
        <div class="form-group-admin">
            <label>Heure de début</label>
            <input type="time" name="debut" class="input-admin" required>
        </div>

        <div class="form-group-admin">
            <label>Heure de fin</label>
            <input type="time" name="fin" class="input-admin" required>
        </div>


        <button type="submit" name="action" value="creer_creneau"
            class="btn btn-success btn-sm"
            >
            Créer le créneau
        </button>
    </form>
</div>
        <div class="admin-card">
    <h3>Supprimer un créneau complet</h3>

    <form action="index.php?tab=salles_creneaux" method="POST" class="form-inline-admin" onsubmit="return confirm('Supprimer ce créneau partout ? Cette action retirera aussi toutes ses associations aux salles.');">
        <div class="form-group-admin">
            <label>Créneau à supprimer</label>
            <select name="id_creneau" class="input-admin" required>
                <option value="">Choisir un créneau...</option>
                <?php foreach(($creneaux ?? []) as $c): ?>
                    <option value="<?= $c['id'] ?>">
                        <?= htmlspecialchars(substr($c['debut'], 0, 5) . " - " . substr($c['fin'], 0, 5) . " (" . $c['moment'] . ")") ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" name="action" value="supprimer_creneau"
                class="btn btn-danger btn-sm"
                >
            Supprimer le créneau
        </button>
    </form>
</div>
        <div class="admin-card">
            <h3>🔗 Associer un créneau à une salle</h3>

            <form action="index.php?tab=salles_creneaux" method="POST" class="form-inline-admin">
                <div class="form-group-admin">
                    <label>Salle concernée</label>
                    <select name="salle_id" class="input-admin" required>
                        <option value="">Choisir une salle...</option>
                        <?php foreach(($salles ?? []) as $s): ?>
                            <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group-admin">
                    <label>Créneau</label>
                    <select name="id_creneau" class="input-admin" required>
                        <option value="">Choisir un créneau...</option>
                        <?php foreach(($creneaux ?? []) as $c): ?>
                            <option value="<?= $c['id'] ?>">
                                <?= htmlspecialchars(substr($c['debut'], 0, 5) . " - " . substr($c['fin'], 0, 5)) ?>
                            </option>   
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" name="action" value="associer_creneau_salle"
                        class="btn btn-secondary btn-sm"
                        >
                    Associer
                </button>
            </form>
        </div>

        <div class="card">
    <?php if (!empty($sallesAvecCreneaux)): ?>

        <?php
        $sallesGroupees = [];

        foreach ($sallesAvecCreneaux as $ligne) {
            $idSalle = $ligne['salle_id'];

            if (!isset($sallesGroupees[$idSalle])) {
                $sallesGroupees[$idSalle] = [
                    'nom_salle' => $ligne['nom_salle'],
                    'creneaux' => []
                ];
            }

            if (!empty($ligne['debut']) && !empty($ligne['fin'])) {
                $sallesGroupees[$idSalle]['creneaux'][] = [
                    'id_creneau' => $ligne['creneau_id'],
                    'debut' => $ligne['debut'],
                    'fin' => $ligne['fin'],
                    'moment' => $ligne['moment']
                ];
            }
        }
        ?>

        <div class="salles-groupes">
            <?php foreach ($sallesGroupees as $idSalle => $salle): ?>
                <div class="salle-bloc">
                    <div style="display:flex; justify-content:space-between; align-items:center; gap:15px; margin-bottom:10px;">
                        <h3 class="salle-titre" style="margin:0;"><?= htmlspecialchars($salle['nom_salle']) ?></h3>

                        <form action="index.php?tab=salles_creneaux" method="POST" onsubmit="return confirm('Supprimer cette salle ? Ses associations de créneaux seront supprimées, et les réservations garderont une salle vide.');" style="margin:0; display:flex; gap:10px;">
                            <a href="index.php?tab=modifier_salle&id=<?= $idSalle ?>" class="btn btn-secondary btn-sm" >Modifier</a>
                            <input type="hidden" name="action" value="supprimer_salle">
                            <input type="hidden" name="salle_id" value="<?= $idSalle ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>

                    <?php if (!empty($salle['creneaux'])): ?>
                        <ul class="liste-creneaux-salle">
                            <?php foreach ($salle['creneaux'] as $creneau): ?>
                                <li class="ligne-creneau-salle">
                                    <div>
                                        <span class="creneau-horaire">
                                            <?= substr($creneau['debut'], 0, 5) ?> - <?= substr($creneau['fin'], 0, 5) ?>
                                        </span>
                                    </div>

                                    <form action="index.php?tab=salles_creneaux" method="POST" onsubmit="return confirm('Retirer ce créneau de cette salle ?');" style="margin:0;">
                                        <input type="hidden" name="action" value="desassocier_creneau_salle">
                                        <input type="hidden" name="salle_id" value="<?= $idSalle ?>">
                                        <input type="hidden" name="id_creneau" value="<?= $creneau['id_creneau'] ?>">
                                        <button type="submit" class="btn-action btn-small-action">Désassocier</button>
                                    </form>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="aucun-creneau">Aucun créneau associé</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <div style="padding: 40px; text-align: center; color: #94a3b8;">
            Aucune association salle / créneau pour le moment.
        </div>
    <?php endif; ?>
</div>

</div>
<br>
    <br>
    <h2>Gestion des salles</h2>
<div class="admin-card">
    <?php if ($salleAEditer): ?>
        <h3>Modifier la salle : <?= htmlspecialchars($salleAEditer['nom']) ?></h3>
        <form action="index.php?tab=salles_creneaux" method="POST" enctype="multipart/form-data" class="form-inline-admin">
            <input type="hidden" name="salle_id" value="<?= $salleAEditer['id'] ?>">
            
            <div class="form-group-admin">
                <label>Nom de la salle</label>
                <input type="text" name="nom_salle" class="input-admin" value="<?= htmlspecialchars($salleAEditer['nom']) ?>" required>
            </div>
            
            <div class="form-group-admin">
                <label>Capacité</label>
                <input type="number" name="capacite_salle" class="input-admin" value="<?= htmlspecialchars($salleAEditer['capacite'] ?? '') ?>" min="1">
            </div>

            <div class="form-group-admin" style="min-width: 260px;">
                <label>Équipements</label>
                <textarea name="equipements_salle" class="input-admin" rows="3"><?= htmlspecialchars($salleAEditer['equipements'] ?? '') ?></textarea>
            </div>

            <div class="form-group-admin" style="min-width: 260px;">
                <label>Description</label>
                <textarea name="description_salle" class="input-admin" rows="3"><?= htmlspecialchars($salleAEditer['description'] ?? '') ?></textarea>
            </div>

            <div class="form-group-admin">
                <label>Image de présentation (optionnel)</label>
                <input type="file" name="image_salle" accept="image/*" class="input-admin">
                <?php if ($salleAEditer['image_principale_id']): ?>
                    <small style="color: #64748b;">(Une image est déjà existante. Chargez-en une nouvelle pour la remplacer.)</small>
                <?php endif; ?>
            </div>

            <button type="submit" name="action" value="editer_salle" class="btn btn-secondary btn-sm" >
                Enregistrer les modifications
            </button>
            <a href="index.php?tab=salles_creneaux" class="btn btn-danger btn-sm" >Annuler</a>
        </form>

    <?php else: ?>
        <h3>Ajouter une salle</h3>
        <form action="index.php?tab=salles_creneaux" method="POST" enctype="multipart/form-data" class="form-inline-admin">
            <div class="form-group-admin">
                <label>Nom de la salle</label>
                <input type="text" name="nom_salle" class="input-admin" required>
            </div>

            <div class="form-group-admin">
                <label>Capacité</label>
                <input type="number" name="capacite_salle" class="input-admin" min="1">
            </div>

            <div class="form-group-admin" style="min-width: 260px;">
                <label>Équipements</label>
                <textarea name="equipements_salle" class="input-admin" rows="3"></textarea>
            </div>

            <div class="form-group-admin" style="min-width: 260px;">
                <label>Description</label>
                <textarea name="description_salle" class="input-admin" rows="3"></textarea>
            </div>

            <div class="form-group-admin">
                <label>Image de présentation (optionnel)</label>
                <input type="file" name="image_salle" accept="image/*" class="input-admin">
            </div>

            </button>
        </form>
    <?php endif; ?> <!-- Possible preexisting endif -->
    <?php endif; ?> <!-- Closures for the Auth redacteur block -->
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>