<?php

namespace App\Entity;

use App\Db\Database;

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
        $obDatabase->insert([
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data
        ]);
        #print_r($obDatabase);

        //atribuir o id da vaga na instancia

        //retornar sucesso

    }
}
