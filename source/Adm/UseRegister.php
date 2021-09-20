<?php 

namespace Source\Adm;

use PDO;
use PDOException;

class UserRegister{


    private $firstName;
    private $lastName;
    private $email;
    private $passward;
    
    private static $instance;


    public function __construct(){

        $this->firstName = filter_input(INPUT_POST, 'f_user', FILTER_SANITIZE_STRING);
        $this->lastName = filter_input(INPUT_POST, 'f_sobreNome', FILTER_SANITIZE_STRING);
        $this->email = filter_input(INPUT_POST, 'f_passwrd', FILTER_VALIDATE_EMAIL);
        $this->passward = filter_input(INPUT_POST, 'f_passwrd', FILTER_SANITIZE_STRING);

    }

    public function conectDB():PDO
    {

        try{
            self::$instance = new PDO(
                "mysql:host=localhost;dbname=goolbeeemprego",
                "root",
                "",
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ]
            );

        }catch(PDOException $exception){

            die("<h1>Não foi possível Conectar ao Banco!</h1>");

        }
        
        return self::$instance;

    }

    protected static function queryInsert(){

        try{

        
        $query = self::$instance->query(
            "INSERT INTO tb_usuario(nome_user, sobre_nome, password_user, email_user, acesso)
            VALUES(?, ?, ?, ?, 1)"
        );

        $bind = self::$instance->prepare($query)->execute([
            self::$instance->getFirstName(),
            self::$instance->getLastName(),
            self::$instance->getMail(),
            self::$instance->getPassward()
        ]);

        return "<p>Usuário cadastrado com sucesso!</p>";

        }catch(PDOException $exception){

            return "<p>Não foi possivel cadastrar o usário!</p>";
        }   

    } 

    

    public function getFirstName(){

        return $this->firstName;

    }

    public function setFirstName($firstName){

        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    }

    
    public function getLastName(){

        return $this->lastName;

    }

    public function setLastName($lastName){

        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    }

    public function getMail(){

        return $this->email;

    }

    public function setMail($email){

        if($this->email){

            $this->email = filter_var($email, FILTER_SANITIZE_STRING);
            return $this->email;
        
        }else{

            return $this->email = null;
        }
        
    }

    public function getPassward(){

        return $this->passward;

    }

    public function setPassward($passward){

        $this->passward = filter_var($passward, FILTER_SANITIZE_STRING);
    }

}


