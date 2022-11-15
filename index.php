<?php

require "dbBroker.php";
require "model/korisnik.php";

session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
    $usr = $_POST['username'];
    $pas = $_POST['password'];

  
  
    $korisnik = new Korisnik(1, $usr, $pas);
    
    $odg = Korisnik::logInUser($korisnik, $conn); 

    if($odg->num_rows==1){
        echo  `
        <script>
        console.log( "Uspešno ste se logovali");
        </script>
        `;
       $_SESSION['korisnik_id'] = $korisnik->id;
        header('Location: home.php');
        exit();
    }else{
        echo `
        <script>
        console.log( "Neuspesno prijavljivanje!");
        </script>
        `;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Prijavljivanje</title>

    </head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
            <div class="mb-3">
                            <label >Korisnicko ime</label>
                          
                            <input type="text" name="username" class="form-control"  required>
                            </div>
                            
                            <div class="mb-3">
                            <label >Lozinka</label>
                            <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_user" class="btn btn-primary">Prijavi se</button>
                            </div>

            </form>
        </div>

        
    </div>
</body>
</html>