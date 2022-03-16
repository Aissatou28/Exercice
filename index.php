<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php include ("formulaire.php") ?>
   
    <?php
        try{
            $MaBase= new PDO('mysql:host=192.168.1.66; dbname=ucomment','root','root');
            if(isset($_GET["submit"])){
                if(!empty($_GET["idUser"]) && !empty($_GET["Nom"])){
                    echo "Vous êtes bien connectés";
                }else{
                    echo "Veuillez remplir tous les champs";
                }
            }else{
                echo "Veuillez vérifier vos informations de connexion";
            }
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    ?>
</body>
</html>