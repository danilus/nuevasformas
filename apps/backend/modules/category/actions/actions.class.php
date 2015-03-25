<?php

require_once dirname(__FILE__).'/../lib/categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/categoryGeneratorHelper.class.php';

/**
 * category actions.
 *
 * @package    NuevasFormas
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends autoCategoryActions
{
  public function executePromote(sfWebRequest $request) {
    $object = Doctrine::getTable('Category')->findOneById($request->getParameter('id'));
  
    $object->promote();
    $this->redirect('@category');
  }
  
  public function executeDemote(sfWebRequest $request) {
    $object = Doctrine::getTable('Category')->findOneById($request->getParameter('id'));
  
    $object->demote();
    $this->redirect('@category');
  }
}