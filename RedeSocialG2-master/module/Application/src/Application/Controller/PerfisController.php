<?php
namespace Application\Controller;

use Core\Controller\ActionController as ActionController;
use Zend\View\Model\ViewModel;

/**
* Controller Perfis
*
* @category Application
* @package  Controller
* @author   Ana Paula Binda <anapaulasif@unochapeco.edu.br>
* @license  Copyright <http://www.softwarecontracts.net/p05_copyright_patent_software.htm>
* @link     localhost
*/
class PerfisController extends ActionController
{
    /**
    *Função index
    *
    *@return void
    */
    public function indexAction()
    {
        
        return new ViewModel();
    }
    
    /**
    *Função para criar o layout
    *
    *@return void
    */
    public function layoutAction()
    {
         return new ViewModel();
    }
    
    /**
    *Função save
    *
    *@return void
    */
    public function saveAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $form = new \Application\Form\Perfil($em);
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $valores = $request->getPost();
            $perfil = new \Application\Entity\Perfil();
            
            $filtros = $perfil->getInputFilter();
            $form->setInputFilter($filtros);
            $filtros = $perfil->getInputFilter();
            $form->setData($valores);
            
            if (!$form->isValid()) {
                $values = $form->getData();
                
                try{
                    $perfil = $this->getService('Application\Service\Perfil')->savePerfil($values);
                }catch(\Exception $e){
                    echo $e->getMessage(); 
                    exit;
                }
                
                return $this->redirect()->toUrl('/');    
            }  
            
        }
        $id = (int) $this->params()->fromRoute('id', 0);
        if ($id > 0) {
            $usuario = $this->getService('Admin\Service\Usuario')->find($id);
            $form->bind($usuario);
        }

        return new ViewModel(array('form' => $form,'formUsuario' => $formUsuario));
    }


    /**
    *Função delete
    *
    *@return void
    */
    public function deleteAction()
    {
    
    }
    
}