<?php

/**
 * Category form base class.
 *
 * @method Category getObject() Returns the current form's model object
 *
 * @package    NuevasFormas
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'cover_img'   => new sfWidgetFormInputText(),
      'publish'     => new sfWidgetFormInputCheckbox(),
      'slug'        => new sfWidgetFormInputText(),
      'position'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 100)),
      'description' => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'cover_img'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publish'     => new sfValidatorBoolean(array('required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'position'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Category', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Category', 'column' => array('slug'))),
        new sfValidatorDoctrineUnique(array('model' => 'Category', 'column' => array('position'))),
      ))
    );

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

}
