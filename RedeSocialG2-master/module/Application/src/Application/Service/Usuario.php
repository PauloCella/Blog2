<?php

namespace Admin\Service;

use Core\Service\Service;
use Core\Model\EntityException as EntityException;

/**
* Service Save Entityes
*
* @category Admin
* @package  Service
* @author   Paulo José Cella <paulocella@unochapeco.edu.br> 
* @link     localhost 
 */
class Usuario extends Service
{

    public function saveUsuario($values)
    {
        
        $values = new \Usuario();
        var_dump($values);exit;
        
        if( (int) $values['id'] > 0)
            $cidade = $this->find($values['id']);
        else
            $cidade = new \Admin\Model\Cidade();
        $cidade->setDescricao($values['descricao']);
        $uf = $this->getService('Admin\Service\Uf')->find($values['uf']);
        $cidade->setUf($uf);
        $this->getObjectManager()->persist($cidade);
        try{
            $this->getObjectManager()->flush();
        }catch(\Exception $e){
            throw new EntityException('Erro ao salvar dados');
        }

        return $cidade;        
    }



}
