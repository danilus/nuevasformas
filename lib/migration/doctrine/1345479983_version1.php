<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version1 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('category', 'position', 'integer', '8', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('category', 'position');
    }
}