<?php


namespace App\Db;

use \PDO;
use \PDOStatement;

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
     *   metodo responsavel por executar a query
     * @param string
     * @param array 
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
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

        # dados  da query
        //campos da tabela
        $fields = array_keys($values);
        //valores a inserir
        $binds = array_pad([], count($fields), '?');
        #print_r($binds);
        #print_r($values);
        //query
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        //executa o insert
        $this->execute($query, array_values($values));

        //RETORNA O ULTIMO ID INSERIDO
        return $this->connection->lastInsertId();
        //echo $query;
        //exit;
    }

    /**
     *  @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     *
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null)
    {
        //dados da query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY  ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        //select da query
        $query = 'SELECT * FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query);
    }
}
