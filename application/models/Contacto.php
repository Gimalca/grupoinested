<?php

class Application_Model_Contacto extends Zend_Db_Table_Abstract
{
     protected $_name = 'contacto';
     protected $_primary = 'id';
     
        public function grabarDatos($datos)
        {   
                $row = $this->createRow();
                $row->nombre_contacto = $datos['nombre'];
                $row->cargo_contacto = $datos['cargo'];
                $row->correo = $datos['correo'];
                $row->empresa = $datos['empresa'];
                $row->mensaje = $datos['mensaje'];
                
                return $row->save();
        }
        
        public function grabarNewsletter()
        {
                $row = $this->createRow();
        }
    
}
