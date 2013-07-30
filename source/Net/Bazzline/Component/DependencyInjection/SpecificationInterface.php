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
 * Class SpecificationInterface
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29
 */
interface SpecificationInterface
{
    /**
     * @param MethodCallInterface $methodCall
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function addMethodCall(MethodCallInterface $methodCall);

    /**
     * @return array|MethodCallInterface[]
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function getMethodCalls();

    /**
     * @param array|MethodCallInterface[]
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function setMethodCalls(array $methodCalls);

    /**
     * @param mixed $value
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function addConstructorArgument($value);

    /**
     * @param array $parameters
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    public function setConstructorArguments(array $parameters);

    /**
     * @return array $constructorParameters[$index => array[$name => $value]]
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-20
     */
    public function getConstructorArguments();
}