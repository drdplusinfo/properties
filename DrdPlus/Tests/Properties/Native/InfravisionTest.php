<?php
namespace DrdPlus\Properties\Native;

class InfravisionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_create_infravision()
    {
        $infravision = new Infravision(true);
        $this->assertSame(true, $infravision->getValue());
        $this->assertSame('infravision', $infravision->getCode());

        $infravision = new Infravision(false);
        $this->assertSame(false, $infravision->getValue());
    }
}
