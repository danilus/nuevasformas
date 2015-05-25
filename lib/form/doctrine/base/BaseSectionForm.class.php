<?php

/**
 * Section form base class.
 *
 * @method Section getObject() Returns the current form's model object
 *
 * @package    NuevasFormas
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSectionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'title'     => new sfWidgetFormInputText(),
      'url_name'  => new sfWidgetFormInputText(),
      'cover_img' => new sfWidgetFormInputText(),
      'publish'   => new sfWidgetFormInputCheckbox(),
      'position'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'     => new sfValidatorString(array('max_length' => 100)),
      'url_name'  => new sfValidatorString(array('max_length' => 100)),
      'cover_img' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publish'   => new sfValidatorBoolean(array('required' => false)),
      'position'  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Section', 'column' => array('title'))),
        new sfValidatorDoctrineUnique(array('model' => 'Section', 'column' => array('url_name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Section', 'column' => array('position'))),
      ))
    );

    $this->widgetSchema->setNameFormat('section[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Section';
  }

}
