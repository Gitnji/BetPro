<?php 
class Database {
    private $host = 'localhost';
    private $db_name = 'betpro';
    private $user = 'root';
    private $password = '';

    private $db_handler;
    private $error;

    public function __construct(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->db_handler = new PDO($dsn, $this->user, $this->password, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
        
    }
    public function getConnection(){
            return $this->db_handler;
        }
}

?>