<?php

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


    public static function  connectUser($mail, $password):User|null
    {
    $db = DbConnect::getInstance();
   $query = $db->prepare('SELECT  name , mail , password , id FROM user WHERE mail = ? AND password = ?');
   $query->execute([$mail, $password]);
   $result = $query->fetchAll();
   if (count($result) === 0) {
    return null;
   }
   else {
    return new User 
   }

    return new User ($name ,  $mail ,$password);
    }
}


