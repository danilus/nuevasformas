<?php

/**
 * ModelImage filter form base class.
 *
 * @package    NuevasFormas
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseModelImageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'model_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Model'), 'add_empty' => true)),
      'filename' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'model_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Model'), 'column' => 'id')),
      'filename' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('model_image_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ModelImage';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'model_id' => 'ForeignKey',
      'filename' => 'Text',
    );
  }
}
