<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version6 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('gallery', 'gallery_category_id_category_id', array(
             'name' => 'gallery_category_id_category_id',
             'local' => 'category_id',
             'foreign' => 'id',
             'foreignTable' => 'category',
             'onUpdate' => '',
             'onDelete' => 'RESTRICT',
             ));
        $this->createForeignKey('photos', 'photos_gallery_id_gallery_id', array(
             'name' => 'photos_gallery_id_gallery_id',
             'local' => 'gallery_id',
             'foreign' => 'id',
             'foreignTable' => 'gallery',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('gallery', 'gallery_category_id', array(
             'fields' => 
             array(
              0 => 'category_id',
             ),
             ));
        $this->addIndex('photos', 'photos_gallery_id', array(
             'fields' => 
             array(
              0 => 'gallery_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('gallery', 'gallery_category_id_category_id');
        $this->dropForeignKey('photos', 'photos_gallery_id_gallery_id');
        $this->removeIndex('gallery', 'gallery_category_id', array(
             'fields' => 
             array(
              0 => 'category_id',
             ),
             ));
        $this->removeIndex('photos', 'photos_gallery_id', array(
             'fields' => 
             array(
              0 => 'gallery_id',
             ),
             ));
    }
}