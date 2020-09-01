<?php


namespace Controllers;


use Models\User;

class Register
{
    public function create()
    {
        $view = './views/register/create.php';

        return compact('view');
    }

    public function store()
    {
        //Collecte et validation des données
        //À vous pour la validation

        //⚠️ ce qui suit est très imprudent ! Il faut valider les données avant !
        $nameStr = trim($_POST['name']);
        if(strlen($nameStr) < 4){
            $_SESSION["errors"]["name"] = "Le pseudo doit avoir au moins 4 caracters.";
        }
        $nameStr = htmlentities(htmlspecialchars($nameStr));
        $name = $nameStr;


        $email = trim($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errors"]["email"] = "le mail est pas valide"; 
        }
        

        $password = trim($_POST['password']);

        if(strlen($password ) < 8) {
            $_SESSION["errors"]["password"] = "trop court"; 
        }

        if(!preg_match('#^[^A-Z]*([A-Z].*)#',$password)){
            $_SESSION["errors"]["password"] = "Majuscule =)"; 
        }

        if(!preg_match('#^[^0-9]*([0-9].*)#',$password)){
            $_SESSION["errors"]["password"] = "Bouuuuuh Il faut des nombtres  =)"; 
        }

        $confirm_password = trim($_POST['confirm_password']); 

        if($confirm_password !== $password){
            $_SESSION["errors"]["confirm_password"] = "C'est pas les mêmes"; 

        }
        //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        


      
        if($_SESSION['errors'] === [] && is_array($_SESSION['errors'])){
                //Sauvegarde de l’utilisateur
                $userModel = new User();
                $userModel->save(compact('name', 'email', 'password'));
                echo "coucou"; 


                header('Location: index.php');
                exit();
        } 


        $_SESSION['old']['name'] = $nameStr;
        $_SESSION['old']['password'] = $password;
        $_SESSION['old']['confirm_password'] = $confirm_password;
        $_SESSION['old']['email'] = $email;



          //? Redirection en cas d'erreur 
        $view = './views/register/create.php';
        echo $view; 
        return compact('view');


    }
}
