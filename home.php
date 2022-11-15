<?php

require "dbBroker.php";
require "model/gost.php";

session_start();
if (!isset($_SESSION['korisnik_id'])) {
    header('Location: index.php');
    exit();
}

$podaci = Gost::getAll($conn);
if (!$podaci) {
    echo "Nastala je greška pri preuzimanju podataka iz baze!";
    die();
}
if ($podaci->num_rows == 0) {
    echo "Nema sacuvanih gosiju!";
    die();
} else {

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Rezervacije apartmana</title>
  </head>
  <body>
  <div class="modal fade" id="questAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodaj gosta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="post" id="dodajGosta"> 
    <!-- method post moze da se doda kod forme
            i action ="#" i to nas samo vraca na home stranicu
-->
      <div class="modal-body">
        <div class="alert alert-warning d-none"></div>
        <div class="mb-3">
            <label for="">Ime</label>
            <input type="text" name="name" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="">Prezime</label>
            <input type="text" name="surname" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="">Mejl</label>
            <input type="text" name="email" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="">Telefon</label>
            <input type="text" name="phone" class="form-control" />
        </div>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
        <button type="submit" class="btn btn-primary">Sacuvaj gosta</button>
      </div>
      </form>

    </div>
  </div>
</div>

   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>  EVIDENCIJA GOSTIJU
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#questAddModal">
Dodaj gosta
</button>
                    </h4>

                </div>
                <div class="card-body">

                <table id="glavnaTabela" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ime</th>
                                <th>Prezime</th>
                                <th>Mejl</th>
                                <th>Telefon</th>
                                <th>Operacije</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                      while ($red = $podaci->fetch_array()) :
                    ?>
                        <tr>
                            <td><?php echo $red["id"] ?></td>
                            <td><?php echo $red["name"] ?></td>
                            <td><?php echo $red["surname"] ?></td>
                            <td><?php echo $red["email"] ?></td>
                            <td><?php echo $red["phone"] ?></td>
                            <td>
                                            <button type="button" value="<?=$student['id'];?>" class="viewGuestBtn btn btn-info btn-sm">Pogledaj</button>
                                            <button type="button" value="<?=$student['id'];?>" class="editGuestBtn btn btn-success btn-sm">Izmeni</button>
                                            <button type="button" value="<?=$student['id'];?>" class="deleteGuestBtn btn btn-danger btn-sm">Obrisi</button>
                                        </td>

                        </tr>



                                    <?php
                                    endwhile;
                            }
                            ?>
                            
                        </tbody>
                    </table>


            </div>
        </div>
    </div>
   </div>
   </div>
 

   <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js" ></script>

    
    
  </body>
</html>