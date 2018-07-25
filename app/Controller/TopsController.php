<?php
App::uses('AppController', 'Controller', 'User');

/**
 * Tops controller
 *
 * @property Tops $Tops
 */
class TopsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array();

    /**
     * index method
     *
     * @return void
     */
	public function index() {
        $this->set('results',array());
	}
	
}