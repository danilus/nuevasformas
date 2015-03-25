<?php

/**
 * muebles actions.
 *
 * @package    NuevasFormas
 * @subpackage muebles
 * @author     Danilo R. Frid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mueblesActions extends sfActions
{
  public function preExecute() {
//    $this->categories = Doctrine::getTable('Category')->findByDql('publish= ?', true);
    $this->categories = Doctrine_Query::create()
      ->from('Category c')
      ->where('c.publish = ?', true)
      ->orderBy('c.position asc')
      ->execute();
  }
  
  
  public function executeIndex(sfWebRequest $request) {
    $this->selected_category = $this->categories[0];
    $this->selected_model = $this->selected_category->Models[0];
  }
  
  
  public function executeCategory(sfWebRequest $request) {
    $this->selected_category = $this->getRoute()->getObject();
    $this->selected_model = $this->selected_category->Models[0];
    $this->setTemplate('index');
  }
  
  
  public function executeModel(sfWebRequest $request) {
    $this->selected_model = $this->getRoute()->getObject();
    $this->selected_category = $this->selected_model->getCategory();
    $this->setTemplate('index');
  }


  public function executeDetails(sfWebRequest $request) {
//    $this->selected_model = $this->getRoute()->getObject();
//    $this->selected_model = Doctrine::getTable('model')->findOneBySlug($request->getParameter('slug'));
    $this->selected_model = Doctrine::getTable('gallery')->findOneBySlug($request->getParameter('slug'));
//    $this->image = Doctrine::getTable('modelImage')->findOneById($request->getParameter('image_id', $this->selected_model->Images[0]->id));
    $this->image = Doctrine::getTable('photos')->findOneById($request->getParameter('image_id', $this->selected_model->Photos[0]->id));
//    $this->img = new sfImage(sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->image->getFilename(), 'image/jpg');
    $this->img = new sfImage(sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'gallery'.DIRECTORY_SEPARATOR.'thumbnail'.DIRECTORY_SEPARATOR.'500_'.$this->image->getPicpath(), 'image/jpg');
  }
}