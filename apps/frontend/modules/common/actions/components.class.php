<?php

/**
 * common components.
 *
 * @package    NuevasFormas
 * @subpackage common
 * @author     Danilo R. Frid
 * @version    SVN: $Id: components.class.php $
 */

class commonComponents extends sfComponents
{ 
  public function executeSectionsForMenu(sfWebRequest $request) {
    $this->sections = Doctrine_Query::create()
      ->from('Section s')
      ->where('s.publish = ?', true)
      ->orderBy('s.position asc')
      ->execute();
  }
}