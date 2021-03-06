<?php

/**
 * BaseModelImage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $model_id
 * @property string $filename
 * @property Model $Model
 * 
 * @method integer    getModelId()  Returns the current record's "model_id" value
 * @method string     getFilename() Returns the current record's "filename" value
 * @method Model      getModel()    Returns the current record's "Model" value
 * @method ModelImage setModelId()  Sets the current record's "model_id" value
 * @method ModelImage setFilename() Sets the current record's "filename" value
 * @method ModelImage setModel()    Sets the current record's "Model" value
 * 
 * @package    NuevasFormas
 * @subpackage model
 * @author     Danilo R. Frid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseModelImage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('model_image');
        $this->hasColumn('model_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('filename', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Model', array(
             'local' => 'model_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}