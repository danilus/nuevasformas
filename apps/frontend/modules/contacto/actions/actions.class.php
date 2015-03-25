<?php

/**
 * contacto actions.
 *
 * @package    NuevasFormas
 * @subpackage contacto
 * @author     Danilo R. Frid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request) {
    $this->form = new ContactoForm();
  }
  
  
  public function executeEnviarMensaje(sfWebRequest $request) {
    $this->form = new ContactoForm();
    if ($request->isMethod('post')):
      $this->form->bind($request->getParameter('contacto'));
      if ($this->form->isValid()):
        $cuerpo = 'Nombre:'."\n".$this->form->getValue('nombre')."\n\n";
        $cuerpo .= 'Email:'."\n".$this->form->getValue('email')."\n\n";
        $cuerpo .= 'Teléfono:'."\n".$this->form->getValue('telefono')."\n\n";
        $cuerpo .= 'Mensaje:'."\n".$this->form->getValue('mensaje')."\n";
        
        $from = array('info@nuevasformasmuebles.com.ar' => 'www.nuevasformasmuebles.com.ar');
        
        $ok = $this->getMailer()->composeAndSend(
          $from,
          array('nuevasformas.muebles@gmail.com', 'danilus@gmail.com'),
          $this->form->getValue('nombre').' se contactó desde el sitio web',
          $cuerpo
        );
        if($ok):
          $this->setTemplate('enviarMensajeComplete');
        else:
          $this->setTemplate('enviarMensajeFails');
        endif;
      else:
        $this->setTemplate('enviarMensajeInvalid');
      endif;
    endif;
  }
}