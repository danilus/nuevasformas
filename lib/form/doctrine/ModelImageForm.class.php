<?php

/**
 * ModelImage form.
 *
 * @package    NuevasFormas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ModelImageForm extends BaseModelImageForm
{
  public function configure()
  {
    $filenameSrc = '/uploads/images/'.$this->getObject()->filename;
    $this->widgetSchema['filename'] = new sfWidgetFormInputFileEditable(array('file_src' => $filenameSrc,
    'is_image'     => true,
    'edit_mode'    => !$this->isNew(),
    'delete_label' => 'Eliminar'));
     
    $this->validatorSchema['filename'] = new sfValidatorFile(array(
    'mime_types' => 'web_images',
    'path'       => sfConfig::get('sf_upload_dir').'/images/',
    'required'   => false));
    
    $this->validatorSchema['filename_delete'] = new sfValidatorBoolean();
  }
}
