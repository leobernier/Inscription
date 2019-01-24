<?php 
class BDD{

    private $bdd;

    /* accès à la base de donnée */
    function accesBDD()
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test-inscription;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur :') $e-> getMessage();
        }
        return $bdd;
    }

    /* Insertion d'un candidat */
    public function insererCandidat ($nom, $prenom, $mail, $tel, $tel_portable, $adresse, $ville, $code_postal, 
    $date_naissance, $niveau_etude, $adresse_ip, $resultat)
    {
        $bdd = $this->accesBDD();

        $req = $bdd->prepare("INSERT INTO CANDIDAT VALUES (:nom, :prenom, :mail, :tel, :tel_portable, :adresse,
        :ville, :code_postal, :date_naissance, :niveau_etude, :adresse, :resultat)");
        $req->execute(array(
            'prenom'=>$prenom, 
            'mail'=>$mail, 
            'tel'=>$tel, 
            'tel_portable'=>$tel_portable, 
            'adresse'=>$adresse, 
            'ville'=>$ville, 
            'code_postal'=>$code_postal, 
            'date_naissance'=>$date_naissance,
            'niveau_etude'=>$niveau_etude, 
            'adresse'=>$adresse_ip, 
            'resultat'=>$resultat
            'nom'=>$nom, 
        ));
    }

    /* Lecture d'un candidat */
    public function lectureCandidat ($id)
    {
        $bdd = $this->accesBDD();

        $req = $bdd->prepare("SELECT * FROM candidat WHERE id_candidat=:id");
        $req->execute(array(
            'id_candidat'=>$id
        ));
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

        $req=$bdd->prepare("SELECT * FROM adresse_ip WHERE ip=:ip");
        $req->execute(array(
            'ip'=>$ip
        ));

        $donnees = count($req);
        if($donnees == 0){
            return false;
        }
        else
        {
            return true;
        }
    }
}
?>