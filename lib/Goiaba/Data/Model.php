<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Data;

use Goiaba\Util\Validator as Validator;

/**
 * This class serves has a gateway between a data source
 * and an application model. It allows for CRUD.
 */
class Model {

    /**
     * Once instantiated, this model will run through a validator.
     * If model properties validate, then isValid will be set to true.
     */
    public $isValid = false;

    /**
     * DB table associated with model
     */
    public $table = string; 

    /**
     * DB table schema associated with model
     */
    public $schema = array(); 

    /**
     * DB table fields associated with model
     */
    public $fields = array();

    /**
     * Once instantiated, this class should:
     * 1. map DB table fields to model object. 
     * ...
     */
    public function __construct() 
    {
        $this->map();
    }

    /**
     * This method is meant to create a new model object, 
     * optionally saving it to the DB. 
     *
     * @param array $type 
     * @param array $options
     * @return mixed Model object if valid model was called but no saved,
     *         boolean if there was a successful (or not) to 'INSERT',
     *         NULL if invalid create ran on an invalid/unexistent model.
     */
    public static function create(array $data = array(), array $options = array()) 
    {
    }

    /**
     * DB reads, 'SELECT' clause of a query.
     *
     * @param string $type Possible values are 'all', 'one', 'count'.
     * @param array $options Possible values are 'conditions', 'fields', 'order', 'limit'
     * @return mixed A collection of data models, a single model, 'int' count, or 'NULL' 
     */
    public static function read($type, array $options = array()) 
    {
    }

    /**
     * Updates a stuff in the DB
     *
     * @param array $data An array of key/value pairs that specifies the new data with which
                    the records will be updated. 'SET' clause of an 'UPDATE' query.
     * @param array $conditions An array that specifies via key/value pairs 
     *              what records to be updated.
     * @return booelan Returns 'true' if the update succeeded. 'false' otherwise. 
     */
    public static function update(array $data = array(), array $conditions = array()) 
    {
    }

    /**
     * Deletes model data
     *
     * @param object $model to delete
     * @param array $options Options
     * @return boolean Sucess.
     */
    public static function delete($model, array $options = array()) 
    {
    }

    /**
     * Map model object to DB table
     *
     * @return boolean 
     */
    private function map()
    {
    }

    public static function validate($model) {
        Validator::validateModel();
    }
}
