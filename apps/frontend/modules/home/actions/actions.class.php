<?php

/**
 * home actions.
 *
 * @package    NuevasFormas
 * @subpackage home
 * @author     Danilo R. Frid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request) {
    $this->sections = Doctrine_Query::create()
      ->from('Section s')
      ->where('s.publish = ?', true)
      ->orderBy('s.position asc')
      ->execute();
  }
}