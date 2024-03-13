<?php



class DbConnect
{

    private static $instance;
    private const USER = 'root';
    private const PASS = 'root';

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host=127.0.0.1;port=8889;dbname=SocialMedia', self::USER, self::PASS);
        }
        return self::$instance;
    }
}
