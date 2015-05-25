<?php

/**
 * Section filter form base class.
 *
 * @package    NuevasFormas
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSectionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cover_img' => new sfWidgetFormFilterInput(),
      'publish'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'position'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'     => new sfValidatorPass(array('required' => false)),
      'url_name'  => new sfValidatorPass(array('required' => false)),
      'cover_img' => new sfValidatorPass(array('required' => false)),
      'publish'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'position'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('section_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Section';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'title'     => 'Text',
      'url_name'  => 'Text',
      'cover_img' => 'Text',
      'publish'   => 'Boolean',
      'position'  => 'Number',
    );
  }
}
