<?php
namespace Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;

/**
* Form Usuario
*
* @category Prime
* @package  Form
* @author   Mike Savegnago <mikesavegnago@unochapeco.edu.br>
*/
class Perfil extends Usuario
{
    public function __construct($em)
    {
        parent::__construct('perfil');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id'
        ));
       
        $this->add(array(
            'name' => 'statusRelacionamento',
            'type' => 'text',
            'options' => array(
                'label' => 'Status Relacionamento*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe o Status de Relacionamento',
                'id' => 'statusRelacionamento',
                'class' => 'form-control'
            )
        ));
        
        $this->add(array(
            'name' => 'profissao',
            'type' => 'text',
            'options' => array(
                'label' => 'Profissao*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe a Profissao',
                'id' => 'profissao',
                'class' => 'form-control'
            )
        ));
        
        $this->add(array(
            'name' => 'formacao',
            'type' => 'text',
            'options' => array(
                'label' => 'Formacao*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe a formação',
                'id' => 'formacao',
                'class' => 'form-control'
            )
        ));
        
         $this->add(array(
            'name' => 'ondeTrabalha',
            'type' => 'text',
            'options' => array(
                'label' => 'OndeTrabalha*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe onde trabalha',
                'id' => 'ondeTrabalha',
                'class' => 'form-control'
            )
        ));
     
  
         // puxar os fields de endereco
         
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-primary'
            )
        ));
        
    }
}
