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
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    protected function tearDown()
    {
        Mockery::close();
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
        $this->container->addConsumer('\\Not\\Existing\\Class');
    }

    /**
     * @expectedException \Net\Bazzline\Component\DependencyInjection\RuntimeException
     * @expectedExceptionMessage Consumer "Test\Net\Bazzline\Component\DependencyInjection\ContainerTest" already added.
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function AtestAddConsumerTwoTimes()
    {
        $this->container->addConsumer(__CLASS__);
        $this->container->addConsumer(__CLASS__);
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function testAddConsumer()
    {
        $this->container->addConsumer(__CLASS__);

        $this->assertTrue($this->container->hasConsumer(__CLASS__));
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function testAddConsumerWithDeclaration()
    {
        $definition = new Definition();

        $this->container->addConsumer(__CLASS__, '', $definition);

        $this->assertTrue($this->container->hasConsumer(__CLASS__));
        $this->assertTrue($this->container->hasDefinition(__CLASS__));
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function testAddConsumerWithSharedByDefault()
    {
        $this->container->addConsumer(__CLASS__);

        $objectOne = $this->container->getConsumer(__CLASS__);
        $objectTwo = $this->container->getConsumer(__CLASS__);
        $objectHashOne = spl_object_hash($objectOne);
        $objectHashTwo = spl_object_hash($objectTwo);

        $this->assertEquals($objectOne, $objectTwo);
        $this->assertTrue(($objectOne === $objectTwo));
        $this->assertEquals($objectHashOne, $objectHashTwo);
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function testAddConsumerWithDefinitionAndSharedByDefault()
    {
        $definition = Mockery::mock('Net\Bazzline\Component\DependencyInjection\Definition');
        $definition->shouldReceive('IsShared')
            ->andReturn(true)
            ->once();
        $this->container->addConsumer(__CLASS__, '', $definition);

        $objectOne = $this->container->getConsumer(__CLASS__);
        $objectTwo = $this->container->getConsumer(__CLASS__);
        $objectHashOne = spl_object_hash($objectOne);
        $objectHashTwo = spl_object_hash($objectTwo);

        $this->assertEquals($objectOne, $objectTwo);
        $this->assertTrue(($objectOne === $objectTwo));
        $this->assertEquals($objectHashOne, $objectHashTwo);
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function testAddConsumerWithDefinitionAndNotShared()
    {
        $definition = Mockery::mock('Net\Bazzline\Component\DependencyInjection\Definition');
        $definition->shouldReceive('IsShared')
            ->andReturn(false)
            ->once();
        $this->container->addConsumer(__CLASS__, '', $definition);

        $objectOne = $this->container->getConsumer(__CLASS__);
        $objectTwo = $this->container->getConsumer(__CLASS__);
        $objectHashOne = spl_object_hash($objectOne);
        $objectHashTwo = spl_object_hash($objectTwo);

        $this->assertEquals($objectOne, $objectTwo);
        $this->assertFalse(($objectOne === $objectTwo));
        $this->assertNotEquals($objectHashOne, $objectHashTwo);
    }
}