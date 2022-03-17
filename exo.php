<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page de connexion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<h1>Connectez vous</h1>
    <?php include ("formulaire.php");
   ?>
    <?php
    class User{
        //propriétés
        private $idUser_;
        private $pseudo_; 
        private $password_;
        //méthodes
        public function __construct($id,$pseudo,$pass){
            $this->idUser_=$id;
            $this->pseudo_=$pseudo;
            $this->password_=$pass;
        }
        public function connexion($motdepass, $pseudo){
            if($motdepass==$this->password && $pseudo==$this->password_){
              return true;
            }else{
                return false;
            }
        }
        public function getPseudo(){
            return $this->pseudo_;
        }
    }
    ?>
<?php
$Base= new PDO('mysql:host=192.168.64.116; dbname=connexion','root','root');
$resultat=$Base->query("Select * from User");
$TabUser= array();
while($donnees=$resultat->fetch()){
    array_push($TabUser, new User($donnees['idUser'],$donnees['pseudo'],$donnees['password']));
}
?>

<?php
if(isset($_POST["submit"])){
    $reconnu=false;
    foreach($TabUser as $user){
        if($user->getPseudo==$_POST["pseudo"]){
            $reconnu=true;
            if($user->connexion($_POST["password"])){
            echo "Bienvenue".$_POST["pseudo"]."!";
            }else{
                echo "Veuillez vérifier votre mot de pass";
            }
        }
    }
    if(!$reconnu){
        echo "vous n'êtes pas enregistrés";
    }
}
?>

</body>
</html>
