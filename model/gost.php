<?php
class Gost{
    public $id;   
    public $name;   
    public $surname;   
    public $email;   
    public $phone;
    
    public function __construct($id=null, $name=null, $surname=null, $email=null, $phone=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
    }

  

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM gosti";
        return $conn->query($query);
    }


    public static function getById($id, mysqli $conn){
        $query = "SELECT * FROM gosti WHERE id=$id";

        $niz = array();
        if($objBaze = $conn->query($query)){
            while($red = $objBaze->fetch_array(1)){
                $niz[]= $red;
            }
        }

        return $objBaze;

    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM gosti WHERE id=$this->id";
        return $conn->query($query);
    }

   
    public function update($id, mysqli $conn)
    {
        $query = "UPDATE gosti set name = $this->name,surname = $this->surname,email = $this->email,phone = $this->phone WHERE id=$id";
        return $conn->query($query);
    }

 
    public static function add(Gost $gost, mysqli $conn)
    {
        $query = "INSERT INTO gosti(name, surname, email, phone) VALUES('$gost->name','$gost->surname','$gost->email','$gost->phone')";
        return $conn->query($query);
    }
}

?>