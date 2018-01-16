<?php


namespace Tests\Unit;


use Gukasov\BracketsChecker\BracketsStack;
use PHPUnit\Framework\TestCase;

class BracketsStackTest extends TestCase
{
    /** @test */
    public function it_can_define_closing_bracket()
    {
        $bracketsStack = new BracketsStack();

        $this->assertTrue($bracketsStack->isClosingBracket(')'));

        $this->assertFalse($bracketsStack->isClosingBracket('('));

        $this->assertFalse($bracketsStack->isClosingBracket('s'));
    }
    
    /** @test */
    public function it_can_define_that_is_empty()
    {
        $bracketsStack = new BracketsStack();

        $this->assertTrue($bracketsStack->isEmpty());

        $bracketsStack->put('(');

        $this->assertFalse($bracketsStack->isEmpty());
    }
    
    /** @test */
    public function it_can_define_if_it_has_relevant_opening_bracket_for_closing_bracket()
    {
        $bracketsStack = new BracketsStack();
        $bracketsStack->put('(');

        $this->assertTrue($bracketsStack->checkForClosing(')'));
        $this->assertTrue($bracketsStack->isEmpty());
    }
}