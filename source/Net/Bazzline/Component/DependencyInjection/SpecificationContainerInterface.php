<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/*
    specification:
        constructor:
            'foo'
            'My\Other\Class'
        methodCalls:
            'setBar':
                'foo'
            'setUserAndScope':
                'My\User'
                'Basic'
                */
/**
 * Class SpecificationContainerInterface
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29
 */
interface SpecificationContainerInterface
{
    /**
     * @param string $methodName
     * @param array $arguments
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function addMethodCall($methodName, array $arguments);

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function getMethodCalls();

    /**
     * @param array $methodCalls[$methodName => array $constructorArguments[$name => $value]]
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function setMethodCalls(array $methodCalls);

    /**
     * @param array $argument
     * @param int $index
     * @return $this
     * @throw InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function addConstructorArgument($argument, $index);

    /**
     * @param array $arguments
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    public function setConstructorArguments(array $arguments);

    /**
     * @param int $index
     * @return mixed
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function getConstructorArgument($index);

    /**
     * @return array $constructorArguments[$index => array[$name => $value]]
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-20
     */
    public function getConstructorArguments();
}