<?php include('header.php');?>

<div class="container">
  <h2>Formulaire d'inscription</h2>
  <div class='row'>
    <form method="POST" action="enregistrementInscription.php" >
      <div class="form-group row">
        <label for="Nom">Nom :</label>
        <input type="text" class="form-control" name="Nom" value="" required>
      </div>
      <div class="form-group row">
        <label for="Prenom">Prénom :</label>
        <input type="text" class="form-control" name="Prenom" value="" required>
      </div>
      <div class="form-group row">
        <label for="email">Email :</label>
        <input type="email" class="form-control" name="Email" aria-describedby="emailHelp" placeholder="Entrer email" required>
      </div>
      <div class="form-group row">
        <label for="Telephone">Téléphone :</label>
        <input type="telNo" class="form-control" name="Telephone" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required>
      </div>
      <div class="form-group row">
        <label for="Telephone_Portable:">Téléphone Portable :</label>
        <input type="text" class="form-control" name="Telephone_portable" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required>
      </div>
      <div class="form-group row">
        <label for="Adresse">Adresse :</label>
        <input type="text" class="form-control" name="Adresse" value="" required>
      </div>
      <div class="form-group row">
        <label for="Ville">Ville :</label>
        <input type="text" class="form-control" name="Ville" value="" required>
      </div>
      <div class="form-group row">
        <label for="Code_postal">Code postal :</label>
        <input type="text" class="form-control" name="Code_postal" pattern="[0-9]{5}" value="" required>
      </div>
      <div class="form-group row">
        <label for="Date_naissance">Date de naissance :</label>
        <input type="date" class="form-control" name="Date_naissance" placeholder="jj/mm/aaaa" required>
      </div>
      <div class="form-group row">
        <label for="Niveau_etude">Niveau d'étude :</label>
        <input type="text" class="form-control" name="Niveau_etude" required>
      </div>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </form>
  </div>
</div>

<?php include('footer.php'); ?>
