<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-11 
 */

namespace Test\Net\Bazzline\Component\DependencyInjection;

use Net\Bazzline\Component\DependencyInjection\Container;
use Net\Bazzline\Component\DependencyInjection\Definition;

/**
 * Class ContainerTest
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-11
 */
class ContainerTest extends TestCase
{
    /**
     * @var \Net\Bazzline\Component\DependencyInjection\Container
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    protected $container;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    protected function setUp()
    {
        $this->container = new Container();
    }

    /**
     * @expectedException \Net\Bazzline\Component\DependencyInjection\RuntimeException
     * @expectedExceptionMessage Class "\Not\Existing\Class" does not exists.
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function testAddConsumerWithNotExistingClass()
    {
        $this->container->register('\\Not\\Existing\\Class');
    }

    /**
     * @expectedException \Net\Bazzline\Component\DependencyInjection\RuntimeException
     * @expectedExceptionMessage Consumer "Test\Net\Bazzline\Component\DependencyInjection\ContainerTest" already added.
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function testAddConsumerTwoTimes()
    {
        $this->container->register(__CLASS__);
        $this->container->register(__CLASS__);
    }

    /**
     * @expectedException \Net\Bazzline\Component\DependencyInjection\InvalidArgumentException
     * @expectedExceptionMessage Not supported so far.
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function testAddConsumerWithDeclaration()
    {
        $this->container->register(__CLASS__, '', new Definition());
    }
}