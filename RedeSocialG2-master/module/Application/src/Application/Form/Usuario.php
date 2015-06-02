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
class Usuario extends Form
{
    public function __construct($em)
    {
        parent::__construct('usuario');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id'
        ));
        
        
        $this->add(array(
            'name' => 'nome',
            'type' => 'text',
            'options' => array(
                'label' => 'Nome*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe o nome',
                'id' => 'nome',
                'class' => 'form-control'
            )
        ));
        
        $this->add(array(
            'name' => 'sobrenome',
            'type' => 'text',
            'options' => array(
                'label' => 'Sobrenome*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe o sobrenome',
                'id' => 'sobrenome',
                'class' => 'form-control'
            )
        ));
        
        $this->add(array(
            'name' => 'email',
            'type' => 'text',
            'options' => array(
                'label' => 'Email*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe o email',
                'id' => 'email',
                'class' => 'form-control'
            )
        ));
        
         $this->add(array(
            'name' => 'celular',
            'type' => 'text',
            'options' => array(
                'label' => 'Celular*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe o celular',
                'id' => 'celular',
                'class' => 'form-control'
            )
        ));
        
        $this->add(array(
            'name' => 'senha',
            'type' => 'password',
            'options' => array(
                'label' => 'Senha*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe a senha',
                'id' => 'senha',
                'class' => 'form-control'
            )
        ));
       
        
        $this->add(array(
            'name' => 'role',
            'type' => 'select',
            'options' => array(
                'label' => 'Perfil:*',
                'value_options' => array('EDITOR' => 'EDITOR', 'ADMIN' => 'ADMIN')
            ),
            'attributes' => array(
                'class' => 'form-control'
            )
        ));
        
        
         $this->add(array(
            'name' => 'data_nascimento',
            'type' => 'text',
            'options' => array(
                'label' => 'Data de Nascimento*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe a data de nascimento',
                'id' => 'data_nascimento',
                'class' => 'form-control'
            )
        ));
        
        
         $this->add(array(
            'name' => 'sexo',
            'type' => 'text',
            'options' => array(
                'label' => 'Sexo*'
            ),
            'attributes' => array(
                'placeholder' => 'Informe o sexo',
                'id' => 'sexo',
                'class' => 'form-control'
            )
        ));
        
         $this->add(array(
            'name' => 'autenticado',
            'type' => 'checkbox',
            'options' => array(
                'label' => 'Autenticacao*'
            ),
            'attributes' => array(
                'placeholder' => 'sim ou nao',
                'id' => 'autenticacao',
                'class' => 'form-control'
            )
        ));
        
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
