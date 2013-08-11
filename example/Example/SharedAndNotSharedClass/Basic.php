<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-11 
 */

namespace Example\SharedAndNotSharedClass;

/**
 * Class Basic
 *
 * @package Example\SharedAndNotSharedClass
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-11
 */
class Basic
{
    /**
     * @var mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    protected $myProperty;

    /**
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function getMyProperty()
    {
        return $this->myProperty;
    }

    /**
     * @param mixed $myProperty
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function setMyProperty($myProperty)
    {
        $this->myProperty = $myProperty;

        return $this;
    }
}