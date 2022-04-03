<form method="post" action="../../traitement/devoir/traitementDelete.php">
    <div class="row justify-content-center">
        <div class="col-md-12 form-group">
            <div class="col-lg-12 mx-auto text-left">
                <table id="myTable" class="display">
                    <thead>
                    <tr>
                        <th>ID Devoir</th>
                        <th>Titre</th>
                        <th>Recapitulatif</th>
                        <th>Deadline</th>
                        <th>Classe</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $req = $bdd->getBdd()->query
                    ('SELECT d.*,c.classe 
                                            FROM devoir AS d
                                            INNER JOIN classe AS c
                                            ON d.ref_classe=c.id_classe');
                    while ($res = $req->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $res['id_devoir']; ?></td>
                            <td><?php echo $res['titre']; ?></td>
                            <td><?php echo $res['recapitulatif']; ?></td>
                            <td><?php echo $res['deadline']; ?></td>
                            <td><?php echo $res['classe']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="id_professeur">Devoir</label>
                    <select class="form-control" name="id_professeur" id="id_professeur">
                        <option></option>
                        <?php
                        $req = $bdd->getBdd()->query('SELECT * FROM devoir');
                        while($res=$req->fetch()){
                            ?>
                            <option value="<?php echo $res['id_devoir'];?>"><?php echo $res['id_devoir'].". ".$res['titre'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Supprimer" class="btn btn-primary btn-lg px-5">


                    <div class="col-md-12 form-group">
                        <label for="classe">Matiere</label>
                        <select class="form-control" name="matiere" id="matiere">
                            <option value="<?php echo $res['ref_matiere'];?>" selected><?php echo $res['ref_matiere'];?></option>
                            <?php
                            $req = $bdd->getBdd()->prepare
                            ('SELECT mp.*, m.matiere
                                        FROM matiereprofesseur AS mp
                                        INNER JOIN matiere AS m
                                        ON mp.ref_matiere = m.id_matiere
                                        WHERE mp.ref_professeur = :ref_professeur ');
                            $req->execute(array(
                                'ref_professeur' => $_SESSION['id']
                            ));
                            while ($res=$req->fetch()){
                                ?>
                                <option value="<?php echo $res['ref_matiere'];?>"><?php echo $res['ref_matiere'].". ".$res['matiere'];?></option>
                            <?php } ?>
                        </select>
                    </div>