<?php
require_once "../../bdd/Bdd.php";

$bdd = new Bdd();
?>
<html>
<table id="myTable" class="display">
                            <thead>
                            <tr>
                                <th>ID bloc heure</th>
                                <th>date</th>
                                <th>heure debut</th>
                                <th>heure fin</th>
                                <th>prof</th>
                                <th>classe</th>
                                <th>matiere</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $req = $bdd->getBdd()->query( 'SELECT bloc_heure.*, matiere.matiere FROM bloc_heure INNER JOIN matiere ON bloc_heure.ref_matiere=matiere.id_matiere');
                            $res = $req->fetch();
                            var_dump($res);
                            while ($res = $req->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $res['id_bh']; ?></td>
                                    <td><?php echo $res['date']; ?></td>
                                    <td><?php echo $res['heure_debut']; ?></td>
                                    <td><?php echo $res['heure_fin']; ?></td>
                                    <td><?php echo $res['ref_professeur']; ?></td>
                                    <td><?php echo $res['ref_classe']; ?></td>
                                    <td><?php echo $res['matiere']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
</html>