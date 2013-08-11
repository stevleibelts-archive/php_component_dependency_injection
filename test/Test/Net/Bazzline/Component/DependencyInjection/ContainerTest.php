<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-11 
 */

namespace Test\Net\Bazzline\Component\DependencyInjection;

use Net\Bazzline\Component\DependencyInjection\Container;

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
    public function testTryToAddNotExistingClass()
    {
        $this->container->addConsumer('\\Not\\Existing\\Class');
    }
}