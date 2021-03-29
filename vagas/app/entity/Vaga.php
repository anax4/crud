<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Vaga
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string;
     */
    public $titulo;

    /**
     * @var string
     */
    public $descricao;

    /**
     * @var string(s/n)
     */
    public $ativo;
    /*
    * @var string
    */
    public $data;

    /*
    *   @return boolean 
    */
    public function cadastrar()
    {
        //Definir a data
        $this->data = date('Y-m-d H:i:s');

        //inserir a vaga no banco
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data
        ]);
        #print_r($obDatabase);
        // echo '<pre>';
        // print_r($this);
        //echo '</pre>';
        //atribuir o id da vaga na instancia

        //retornar sucesso

    }

    /**
     * 
     * 
     * @param string
     * @param string
     * @param string
     *  
     */
    public static function getVagas($where = null, $order = null, $limit = null)
    {
        //retorna
        return (new Database('vagas'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
        #define o tipo de parametro FETCH_CLASS
    }


    /**
     * 
     * @param  integer $id
     * @return Vaga
     */
    public static function getVaga($id)
    {
        return (new Database('vagas'))->select('$id = ' . $id)


            ->fetchObject(self::class);
    }
}
