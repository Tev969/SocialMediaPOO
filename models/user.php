<?php
include './dbConnect.php';
class User
{
    protected string $name;
    protected string $mail;
    protected string $password;
    protected int $id;




    public function __construct(string $name, string $mail, string $password)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }


    // je vérifie si un utilisateur existe , avec les infos mail password , 
    // je regarde dans la BDD si cet utilisateur exite en comparant
    // les infos qu'il m'envoie avec celle déjà en bdd
    // si il existe on lui créer un new user avec les infos de la bdd / 
    // si non renoie null


    public static function  connectUser($mail, $password): User|null
    {
        $db = DbConnect::getInstance();
        $query = $db->prepare('SELECT  name , mail , password , id FROM user WHERE mail = ? AND password = ?');
        $query->execute([$mail, $password]);
        $result = $query->fetchAll();
        if (count($result) === 0) {
            return null;
        } else {
            $name = $result[0]['name'];
            $mail = $result[0]['mail'];
            $password = $result[0]['password'];

            return new User($name, $mail, $password);
        }
    }

    public static function registerUser($name, $mail, $password)
    {
        $db = DbConnect::getInstance();
        $query = $db->prepare('INSERT INTO user(name , mail , password) VALUES(? , ? , ?)');
        $query->execute([$name, $mail, $password]);
        
        return new User($name, $mail, $password);
    }
}


User::registerUser('Arthur', 'Arthur@gmail.fr', 'azety');


var_dump(User::connectUser('legabinsoucieux@gmail.com', 'azert123'));
