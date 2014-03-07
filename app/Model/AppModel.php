<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	     /** 
         * checks is the field value is unqiue in the table 
         * note: we are overriding the default cakephp isUnique test as  
		 * the original appears to be broken // go trough all columns and get their values from the parameters
         * 
         * @param string $data Unused ($this->data is used instead) 
         * @param mixed $fields field name (or array of field names) to 
		 * validate 
         * @return boolean true if combination of fields is unique 
         */ 
        function checkUnique($data, $fields) { 
				// check if the param contains multiple columns or a single one
                if (!is_array($fields)) { 
                        $fields = array($fields); 
                } 
				// go trough all columns and get their values from the parameters
				foreach($fields as $key) { 
                        $unique[$key] = $this->data[$this->name][$key]; 
                } 
                // primary key value must be different from the posted value
                /*if (isset($this->data[$this->name][$this->primaryKey])) { 
                        $unique[$this->primaryKey] = "<>".$this->data[$this->name][$this->primaryKey]; 

                }*/
                // use the model's isUnique function to check the unique rule 
/*				debug($data);
                debug($fields);
                debug($unique);
		        debug($this->isUnique($unique, false));
*/				return $this->isUnique($unique, false); 
        } 
	     /** 
         *  Since the method is created in the AppModel base class, you can invoke it 
         * from every model in your application. When saving a record, you can simply call...
         * 
         *     $slug = $this->generateSlug ('my title');
         * 
         *...from within your models, or...
         * 
         *     $slug = $this->MyModel->generateSlug ('my title');
         * 
         * ...from within your controllers, right before you insert new data.
         * 
         * Note that you have to pass the id from the current record when you're modifying 
         * existing records, so it can exclude that from its check, like this:
         *     $slug = $this->generateSlug ('my title', 10);
         * 
         * @param string $string, $id 
         * @return slugified string
         */ 
		function createSlug($string, $id = null) {
			$slug = Inflector::slug($string, '-');
			$slug = strtolower($slug);

			$i = 0;
			$params = array(
			  'conditions' => array($this->name.'.slug' => $slug), 
			  'fields' => array($this->name.'.id', $this->name.'.slug'));

			if (!is_null($id)) 
			  $params['conditions']['not'] = array($this->name.'.id'=>$id);
			

			while (count($this->find('all', $params)))  {
			  $i++;
			  $params['conditions'][$this->name . '.slug'] = $slug."-".$i;
			}
			if ($i) $slug .= "-".$i;

			return $slug;
		}
} 

