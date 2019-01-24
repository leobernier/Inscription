<?php include('header.php')?>

<h2>Formulaire d'inscription</h2>
<form>
  <div class="form-group">
    <label for="Nom">Nom:</label>
    <input type="text" name="Nom" value="">
  </div>
  <div class="form-group">
    <label for="Prénom">Prénom:</label>
    <input type="text" name="Prénom" value="">
  </div>
  <div class="form-group">
    <label for="Date_naissance">Date de Naissance:</label>
    <input type="date" name="Date_naissance" placeholder="jj/mm/aaaa">
  </div>
  <div class="form-group">
    <label for="Adresse">Adresse:</label>
    <input type="text" name="Adresse" value="">
  </div>   
  <div class="form-group">
    <label for="Ville">Ville:</label>
    <input type="text" name="Ville" value="">
  </div>   
  <div class="form-group">
    <label for="Code_postale">Code postale:</label>
    <input type="text" name="Code_postale" value="">
  </div>   
  <div class="form-group">
    <label for="Telephone">Tél:</label>Tél : 
    <input type="text" name="Telephone" value="">
  </div>   
  <div class="form-group">
    <label for="Telephone_Portable:">Tél Portable:</label>
    <input type="text" name="Telephone_portable" value="">
  </div>   <div class="form-group">
  <div class="form-group">
    <label for="email">Email :</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrer email">
  </div>
  <div class="form-group">
  </div>
  <div class="form-group">
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>






<?php include('footer.php') ?>