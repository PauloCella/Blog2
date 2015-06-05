<?php

namespace Application\Entity;

use Core\Model\Entity as Entity;
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

/**
 * @ORM\Entity
 * @ORM\Table (name = "usuario")
 *
 * @category Application
 * @package  Entity
 * @author Paulo José Cella <paulocella@unochapeco.edu.br>
 */
class Usuario extends Entity {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column (type="string")
     *
     * @var string
     */
    protected $nome;

    /**
     * @ORM\Column (type="string")
     *
     * @var string
     */
    protected $sobrenome;

    /**
     * @ORM\Column (type="string")
     * 
     * @var string
     */
    protected $email;

    /**
     * 
     * @ORM\Column (type="string")
     * 
     * @var string
     */
    protected $celular;

    /**
     * 
     * @ORM\Column (type="string")
     * 
     * @var string
     * 
     */
    protected $senha;

    /**
     * 
     * @ORM\Column (type="datetime")
     * 
     * @var datetime
     */
    protected $dataNascimento;

    /**
     * 
     * @ORM\Column (type="string")
     * 
     * @var string
     */
    protected $sexo;

    /**
     * 
     * @ORM\Column (type="boolean")
     * 
     * @var boolean
     */
    protected $autenticado;

    /**
     * 
     * @ORM\Column (type="string")
     * 
     * @var string
     */
    protected $role;

    /**
     * @return id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * @param $sobrenome
     */
    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    /**
     * @return string
     */
    public function getSobrenome() {
        return $this->sobrenome;
    }

    /**
     * @param $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param $celular
     */
    public function setCelular($celular) {
        $this->celular = $celular;
    }

    /**
     * @return string
     */
    public function getCelular() {
        return $this->celular;
    }

    /**
     * @param $senha
     */
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    /**
     * @return string
     */
    public function getSenha() {
        return $this->senha;
    }

    /**
     * @param $dataNascimento
     */
    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return dateTime
     */
    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    /**
     * @param $sexo
     */
    public function setSexo($sexo) {
        $this->senha = $sexo;
    }

    /**
     * @return string
     */
    public function getSexo() {
        return $this->sexo;
    }

    /**
     * @param $autenticado
     */
    public function setAutenticado($autenticado) {
        $this->autenticado = $autenticado;
    }

    /**
     * @return boolean
     */
    public function getAutenticado() {
        return $this->autenticado;
    }

    /**
     * @param $role
     */
    public function setRole($role) {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * Filtros
     *
     * @return Zend\InputFilter\InputFilter
     */
    public function getInputFilter() {
        $input_filter = new InputFilter();
        $factory = new InputFactory();

        $input_filter->add(
                $factory->createInput(
                        array(
                            'name' => 'id',
                            'required' => false,
                            'filters' => array(
                                array(
                                    'name' => 'Int'
                                )
                            )
                        )
                )
        );


        $input_filter->add($factory->createInput(array(
                    'name' => 'nome',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                        array('name' => 'StringToLower',
                            'options' => array('encoding' => 'UTF-8')
                        ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => 3,
                                'max' => 100,
                            ),
                        ),
                    ),
                ))
        );

        $input_filter->add(
                $factory->createInput(array(
                    'name' => 'sobrenome',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                        array('name' => 'StringToLower',
                            'options' => array('encoding' => 'UTF-8')
                        ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => 3,
                                'max' => 100,
                            ),
                        ),
                    ),
                ))
        );

        $input_filter->add($factory->createInput(array(
                    'name' => 'email',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo E-mail não pode estar vazio')
                        ),
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => 3,
                                'max' => 255,
                                'message' => 'O campo E-mail deve ter mais que 3 caracteres e menos que 255',
                            ),
                        ),
                        array(
                            'name' => 'EmailAddress',
                            'options' => array('message' => 'Não parece ser um e-mail válido')
                        ),
                    ),
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                        array('name' => 'StringToLower',
                            'options' => array('encoding' => 'UTF-8')
                        ),
                    ),
        )));

        $input_filter->add(
                $factory->createInput(array(
                    'name' => 'celular',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 255,
                            ),
                        ),
                    ),
                ))
        );

        $input_filter->add(
                $factory->createInput(array(
                    'name' => 'senha',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 255,
                            ),
                        ),
                    ),
                ))
        );



        $input_filter->add(
                $factory->createInput(array(
                    'name' => 'dataNascimento',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'Date',
                            'options' => array(
                                'format' => 'd-m-Y'
                            ),
                        ),
                    ),
                ))
        );


        $input_filter->add(
                $factory->createInput(array(
                    'name' => 'sexo',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 100,
                            ),
                        ),
                    ),
                ))
        );

        $input_filter->add(
                $factory->createInput(array(
                    'name' => 'autenticado',
                    'required' => false,
                ))
        );



        $input_filter->add(
                $factory->createInput(array(
                    'name' => 'role',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 100,
                            ),
                        ),
                    ),
                ))
        );



        $this->input_filter = $input_filter;
        return $this->input_filter;
    }

}
