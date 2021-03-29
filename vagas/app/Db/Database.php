<?php


namespace App\Db;

use \PDO;

class Database
{

    const HOST = 'localhost';
    const NAME = 'projeto_vagas';
    const USER = 'root';
    const PASSWORD = '';

    /**
     * 
     */
    private $table;
    /**
     * @var PDO
     */
    private $connection;


    /**
     * @param string
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    public function setConnection()
    {
        try {
            //conexao com o banco
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASSWORD);
            #
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }


    /**
     *   @param array $values [field => value]
     *   @return integer
     */
    public function insert($values)
    {

        //dados  da query
        //campos da tabela
        $fields = array_keys($values);
        //valores a inserir
        $binds = array_pad([], count($fields), '?');
        print_r($binds);
        #print_r($values);
        //query
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (?,?,?,?)';
        echo $query;
        exit;
    }
}
