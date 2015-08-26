<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        $formulario = new Application_Form_Contacto();
		$modelo = new Application_Model_Contacto();
		
		if($this->getRequest()->isPost())
		{
			if($formulario->isValid($this->_getAllParams()))
			{
				 $modelo->grabarDatos($formulario->getValues() );
				 $alldata = $this->getAllParams();
			
			
								$mail = new Zend_Mail('UTF-8');
								$mail->setBodyHtml('Detalle del Contacto'.'<br>'
								.'Nombre:'.$alldata['nombre'].'<br>'
								.'Cargo: '.$alldata['cargo'].'<br>'
								.'Correo Electrónico: '.$alldata['correo'].'<br>'
								.'Empresa:'.$alldata['empresa'].'<br>'
								.'Mensaje:'.$alldata['mensaje'].'<br>'
								);
						
						$mail->addTo('info@grupoinested.com', 'Grupo Inested Internacional Website');        
						$mail->setSubject('Contacto Website Grupo Inested');                
						$enviar = $mail->send();
						
						 if($enviar)
						 {
							$this->view->mensaje = '<div class="alert alert alert-success" color:black; height: 18px;">
														 <button type="button" class="close" data-dismiss="alert">&times;</button> 
														 Mensaje enviado con Éxito
												   </div>';
							$formulario->reset();
						 }
						 else
						 {
							$this->view->mensaje = '<div class="alert alert-error" color:black; height: 18px;">
														 <button type="button" class="close" data-dismiss="alert">&times;</button> 
														 Error, no se pudo enviar el mensaje
												   </div>';
							$formulario->reset();
						 } 
					
					   
			}
    
		}
			 $this->view->contacto = $formulario;
			 $this->view->powered = '<h6> Desarrollado por <a href="http://www.gimalca.com/">Gimalca Soluciones</a></h6>';
	}


}

