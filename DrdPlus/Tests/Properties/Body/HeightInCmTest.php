<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Tests\Properties\TestWithMockery;

class HeightInCmTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_create_height_in_cm()
    {
        $size = new HeightInCm($value = 123);
        $this->assertSame((float)$value, $size->getValue());
        $this->assertSame('height_in_cm', $size->getCode());
    }
}
