<?php
namespace DrdPlus\Properties\Native;

class InfravisionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_create_infravision()
    {
        $infravision = Infravision::getIt(true);
        $this->assertSame(true, $infravision->getValue());
        $this->assertSame('infravision', $infravision->getCode());

        $infravision = Infravision::getIt(false);
        $this->assertSame(false, $infravision->getValue());
    }
}
