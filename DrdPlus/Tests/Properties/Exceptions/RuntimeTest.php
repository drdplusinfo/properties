<?php
namespace DrdPlus\Properties\Exceptions;

class RuntimeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function is_interface()
    {
        $this->assertTrue(interface_exists(Runtime::class));
    }
    /**
     * @test
     * @expectedException \DrdPlus\Properties\Exceptions\Exception
     */
    public function extends_local_exception_interface()
    {
        throw new TestLogicInterface();
    }

    /**
     * @test
     * @expectedException \DrdPlus\Properties\Exceptions\TestRuntimeInterface
     */
    public function is_not_logic_exception_interface()
    {
        try {
            throw new TestRuntimeInterface();
        } catch (Logic $shouldNotBeCached) {
            $this->fail('Runtime exception interface must not be a logic exception interface.');
        }
    }

}

/** inner */
class TestRuntimeInterface extends \Exception implements Runtime
{

}
