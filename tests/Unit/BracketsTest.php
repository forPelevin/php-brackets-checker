<?php


namespace Tests\Unit;

use Gukasov\BracketsChecker\Brackets;
use PHPUnit\Framework\TestCase;

class BracketsTest extends TestCase
{
    /** @test */
    public function it_can_define_brackets()
    {
        $brackets = new Brackets();

        $this->assertFalse($brackets->isOpening('s'));
        $this->assertFalse($brackets->isClosing('g'));

        $this->assertTrue($brackets->isOpening('('));
        $this->assertTrue($brackets->isClosing(')'));
    }

}