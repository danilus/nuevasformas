<?php

/**
 * Gallery form base class.
 *
 * @method Gallery getObject() Returns the current form's model object
 *
 * @package    NuevasFormas
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGalleryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'title'       => new sfWidgetFormInputText(),
      'cover_img'   => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'price'       => new sfWidgetFormInputText(),
      'publish'     => new sfWidgetFormInputCheckbox(),
      'promote'     => new sfWidgetFormInputCheckbox(),
      'slug'        => new sfWidgetFormInputText(),
      'position'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'cover_img'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 4000)),
      'price'       => new sfValidatorInteger(),
      'publish'     => new sfValidatorBoolean(array('required' => false)),
      'promote'     => new sfValidatorBoolean(array('required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'position'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Gallery', 'column' => array('title'))),
        new sfValidatorDoctrineUnique(array('model' => 'Gallery', 'column' => array('slug'))),
        new sfValidatorDoctrineUnique(array('model' => 'Gallery', 'column' => array('position', 'category_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('gallery[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gallery';
  }

}
