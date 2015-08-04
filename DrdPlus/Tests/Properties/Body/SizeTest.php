<?php
namespace DrdPlus\Tests\Properties\Body;

use DrdPlus\Properties\Body\Size;
use DrdPlus\Tests\Properties\TestWithMockery;

class SizeTest extends TestWithMockery
{

    /**
     * @test
     */
    public function I_can_create_size()
    {
        $size = new Size($value = 123);
        $this->assertSame($value, $size->getValue());
        $this->assertSame('size', $size->getCode());
    }
}
