<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-29 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class MethodCallInterface
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-29
 */
interface MethodCallInterface
{
    /**
     * @param mixed $value
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    public function addParameter($value);

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    public function getMethodName();

    /**
     * @return array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    public function getParameters();

    /**
     * @param string $name
     * @return $this
     * @throws InvalidArgumentException - empty string provided
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    public function setMethodName($name);

    /**
     * @param array $values
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    public function setParameters(array $values);
}