<?php

namespace Tests\Unit;

use Gukasov\BracketsChecker\BracketsChecker;
use PHPUnit\Framework\TestCase;

/**
 * Class BracketsCheckerTest
 * @package Tests\Unit
 */
class BracketsCheckerTest extends TestCase
{

    /** @test */
    public function the_checker_can_define_correct_brackets_sequence()
    {
        $checker = new BracketsChecker();

        $this->assertTrue($checker->isCorrectSequence("((\t) \r ( \n ))"));
    }

    /** @test */
    public function the_checker_can_define_incorrect_brackets_sequence()
    {
        $checker = new BracketsChecker();

        $this->assertFalse($checker->isCorrectSequence('(( )) (() '));
    }

    /** @test */
    public function the_checker_throws_exception_if_string_contains_bad_chars()
    {
        $this->expectException(\InvalidArgumentException::class);

        $checker = new BracketsChecker();
        $checker->isCorrectSequence("\n () (( d ))");
    }

    /** @test */
    public function the_checker_throws_exception_if_string_is_empty()
    {
        $this->expectException(\InvalidArgumentException::class);

        $checker = new BracketsChecker();
        $checker->isCorrectSequence('');
    }
}