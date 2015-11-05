<?php
namespace DrdPlus\Properties\Native;

class NativeRegenerationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_create_native_regeneration()
    {
        $nativeRegeneration = NativeRegeneration::getIt(true);
        $this->assertSame(true, $nativeRegeneration->getValue());
        $this->assertSame('native_regeneration', $nativeRegeneration->getCode());

        $nativeRegeneration = Infravision::getIt(false);
        $this->assertSame(false, $nativeRegeneration->getValue());
    }
}
