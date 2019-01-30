<?php include('header.php'); ?>

<div class="container">
  <h2>CONNEXION</h2>
  <div class="row">
    <form method="POST" action="consultation.php" >
      <div class="form-group row">
        <label for="Identifiant">Identifiant :</label>
        <input type="text" class="form-control" name="Identifiant" value="" required>
      </div>
      <div class="form-group row">
        <label for="MotDePasse">Mot de passe :</label>
        <input type="password" class="form-control" name="MotDePasse" value="" required>
      </div>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </form>
  </div>
</div>

<?php
include('footer.php');
?>
