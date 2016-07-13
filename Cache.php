<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 13/07/2016
 * Time: 10:39
 */

namespace Framework;

use Framework\Base as Base;
//use Framework\Cache as Cache; //causes problems cf. Configuration.php
use Framework\Cache\Exception as Exception;

class Cache extends Base
{
    /**
     * @readwrite
     */
    protected $_type;

    /**
     * @readwrite
     */
    protected $_options;

    protected function _getExceptionForImplementation($method)
    {
        return new Exception\Implementation("{$method} not implemented");
    }

    public function initialize()
    {

        if (!$this->type) {
            throw new Exception\Argument("Invalid type");
        }

        switch ($this->_type) {
            case "memcached": {
                return new Cache\Driver\Memcached2($this->options);
                break;
            }
            default: {
                throw new Exception\Argument("Invalid type");
                break;
            }
        }
    }
}
