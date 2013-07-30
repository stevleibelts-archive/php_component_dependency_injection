<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-31 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class BuilderInterface
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-31
 */
interface BuilderInterface extends DefinitionAwareInterface
{
    /**
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-31
     */
    public function getClassName();

    /**
     * @param string $className
     * @return $this
     * @throws InvalidArgumentException - if provided class does not exists
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-31
     */
    public function setClassName($className);

    /**
     * Builds class by provided definition.
     *
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-31
     */
    public function build();
}