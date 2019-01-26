<?php
class BDD{

    private $bdd;

    /* accès à la base de donnée */
    public function accesBDD()
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=inscription;charset=utf8', 'root', 'root');
        }
        catch(Exception $e)
        {
            die('Erreur :') .$e-> getMessage();
        }
        return $bdd;
    }

    /* Insertion d'un candidat */
    public function insererCandidat ($nom, $prenom, $mail, $tel, $tel_portable, $adresse, $ville, $code_postal,
    $date_naissance, $niveau_etude, $id_adresse_ip, $resultat)
    {
        $bdd = $this->accesBDD();

        $req = $bdd->prepare("INSERT INTO CANDIDAT (nom, prenom, mail, tel, tel_portable, adresse, ville, code_postal,
        date_naissance, niveau_etude, id_adresse_ip, resultat) VALUES (:nom, :prenom, :mail, :tel, :tel_portable,
        :adresse, :ville, :code_postal, :date_naissance, :niveau_etude, :id_adresse_ip, :resultat)");
        $req->execute(array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'mail'=>$mail,
            'tel'=>$tel,
            'tel_portable'=>$tel_portable,
            'adresse'=>$adresse,
            'ville'=>$ville,
            'code_postal'=>$code_postal,
            'date_naissance'=>$date_naissance,
            'niveau_etude'=>$niveau_etude,
            'id_adresse_ip'=>$id_adresse_ip,
            'resultat'=>$resultat
        ));
        echo 'ok';
    }

    /* Lecture d'un candidat */
    public function lectureCandidat ($id)
    {
        $bdd = $this->accesBDD();

        $req = $bdd->prepare("SELECT * FROM candidat WHERE id_candidat=:id_candidat");
        $req->execute(array(
            'id_candidat'=>$id
        ));
        return $req->fetch();
    }

    /* Mise à jour candidat */
    public function miseAJourCandidat($id, $colonne, $valeur)
    {
        $bdd = $this->accesBDD();

        $req = $bdd->prepare("UPDATE candidat SET :colonne = :valeur WHERE id_candidat=:id");
        $req->execute(array(
            'colonne'=>$colonne,
            'valeur'=>$valeur,
            'id_candidat'=>$id
        ));
    }

    /* Vérification adresse ip */
    public function verificationIP($ip)
    {
        $bdd = $this->accesBDD();

        $req=$bdd->prepare("SELECT * FROM adresse_ip WHERE adresse_ip=:ip");
        $req->execute(array(
            'ip'=>$ip
        ));

        $donnees = $req->fetch();
        var_dump($donnees);
        if($donnees == 0){
            return false;
        }
        else
        {
            return true;
        }
    }

    /* Renvoi 5 questions aléatoires */
    public function listeQuestions(){
      $tabQuestionsId = array();

      $bdd = $this->accesBDD();
      $req = $bdd->prepare("SELECT * FROM questions ORDER BY RAND() LIMIT 5");
      $req->execute();

      while ($donnees = $req->fetch()) {
        array_push($tabQuestionsId, $donnees);
      }
      return $tabQuestionsId;
    }

    /* Renvoi la liste des réponses d'une question */
    public function listeReponses($id){
      $tabReponsesId= array();
      $bdd = $this->accesBDD();
      $req=$bdd->prepare("SELECT * FROM reponses WHERE id_question = ".$id);
      $req->execute();

      while ($donnees = $req->fetch()) {
        array_push($tabReponsesId, $donnees);
      }
      return $tabReponsesId;
    }
}
?>
