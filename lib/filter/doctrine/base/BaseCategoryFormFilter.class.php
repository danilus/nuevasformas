<?php

/**
 * Category filter form base class.
 *
 * @package    NuevasFormas
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(),
      'cover_img'   => new sfWidgetFormFilterInput(),
      'publish'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'slug'        => new sfWidgetFormFilterInput(),
      'position'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'cover_img'   => new sfValidatorPass(array('required' => false)),
      'publish'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'slug'        => new sfValidatorPass(array('required' => false)),
      'position'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'description' => 'Text',
      'cover_img'   => 'Text',
      'publish'     => 'Boolean',
      'slug'        => 'Text',
      'position'    => 'Number',
    );
  }
}
