<?php

class Application_Form_Contacto extends Zend_Form {

    public function init() {
        
		/* nombre */
	   
        $this->addElement('text', 'nombre', array(
            'label' => 'Nombre',
            'size' => 48,
            'required' => true,
            
        ));

        $this->nombre->addValidator('notEmpty', true, array(
            'messages' => 'Campo Vacío',
     
        ));

        $this->nombre->addValidator('Alnum', true, array(
            'allowWhiteSpace' => true,
            'messages' => ' No se permiten Caracteres especiales'
        ));

        $this->nombre->addValidator('Alpha', true, array(
            'allowWhiteSpace' => true,
            'messages' => 'No se permiten Valores Numéricos'
        ));

		
		/* cargo */
		
		  $this->addElement('text', 'cargo', array(
            'label' => 'Cargo',
            'size' => 48,
            'required' => true,
            
        ));

        $this->cargo->addValidator('notEmpty', true, array(
            'messages' => 'Campo Vacío',
     
        ));

        $this->cargo->addValidator('Alnum', true, array(
            'allowWhiteSpace' => true,
            'messages' => ' No se permiten Caracteres especiales'
        ));

        $this->cargo->addValidator('Alpha', true, array(
            'allowWhiteSpace' => true,
            'messages' => 'No se permiten Valores Numéricos'
        ));
		
	
		/*email */

        $this->addElement('text', 'correo', array(
            'label' => 'Email',
            'size' => 48,
            'required' => true,
            'domain' => true,
            'allow' => Zend_Validate_Hostname::ALLOW_DNS,
            'mx' => true
        ));

        $this->correo->addValidators(array(
            array('NotEmpty', true, array(
                    'messages' => 'Campo Vacío'
                )),
            array('EmailAddress', true, array(
                    'messages' => array
                        (
                        'emailAddressInvalidFormat' => 'Correo no válido',
                        'hostnameInvalidHostname' => 'Correo no válido',
                        'hostnameLocalNameNotAllowed' => 'Correo no válido',
                        'emailAddressInvalidHostname' => 'Correo no válido',
                    )
        ))));

        $this->correo->setErrorMessages(array(
            'emailAddressInvalidFormat' => 'Correo no válido'
        ));
		
		/* empresa */
		
		  $this->addElement('text', 'empresa', array(
            'label' => 'Empresa',
            'size' => 48,
            'required' => true,
            
        ));

        $this->empresa->addValidator('notEmpty', true, array(
            'messages' => 'Campo Vacío',
     
        ));

        $this->empresa->addValidator('Alnum', true, array(
            'allowWhiteSpace' => true,
            'messages' => ' No se permiten Caracteres especiales'
        ));

      
       /* mensaje */

        $this->addElement('textarea', 'mensaje', array(
            'label' => 'Mensaje',
            'cols' => '45',
            'rows' => '4',
            'required' => true
        ));

        $this->mensaje->addValidator('notEmpty', true, array(
            'messages' => 'Campo Vacío'
        ));

		/* enviar */
		
        $this->addElement('submit', 'Enviar');
    }



public function addErrorclass()
    {
        foreach($this->getElements() as $element) {
            if($element->hasErrors()) {
                $element->setAttrib('class', 'form-error');
            }
        }
    }
    
    
}