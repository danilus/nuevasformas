<?php

/**
 * Model form.
 *
 * @package    NuevasFormas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ModelForm extends BaseModelForm
{
  public function configure()
  {
    $coverImgFileSrc = '/uploads/models/'.$this->getObject()->cover_img;
    $this->widgetSchema['cover_img'] = new sfWidgetFormInputFileEditable(array('file_src' => $coverImgFileSrc,
    'is_image' => true,
    'edit_mode' => !$this->isNew(),
    'delete_label' => 'Eliminar'));
     
    $this->validatorSchema['cover_img'] = new sfValidatorFile(array(
    'mime_types' => 'web_images',
    'path' => sfConfig::get('sf_upload_dir').'/models/',
    'required' => false));
    $this->validatorSchema['cover_img_delete'] = new sfValidatorBoolean();
    
    
    $this->widgetSchema['name']->setAttribute('class', 'large-style');
    $this->widgetSchema['description']->setAttribute('class', 'large-style');
    $this->widgetSchema['price']->setAttribute('class', 'short-style');
    $this->widgetSchema['position']->setAttribute('class', 'short-style');
  }
}
