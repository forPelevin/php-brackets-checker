<?php

namespace Tests\Unit;

use Gukasov\BracketsChecker\BracketsChecker;
use Gukasov\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class BracketsCheckerTest extends TestCase
{
	/** @test */
	public function the_checker_can_define_correct_brackets_sequence()
	{
		$string = "((\t) \r ( \n))";

	    $checker = new BracketsChecker($string);

	    $this->assertTrue($checker->isCorrectSequence());
	}
	
	/** @test */
	public function the_checker_can_define_incorrect_brackets_sequence()
	{
		$string = '(( )) (() ';

		$checker = new BracketsChecker($string);

		$this->assertFalse($checker->isCorrectSequence());
	}

	/** @test */
	public function the_checker_throws_exception_if_string_contains_bad_chars()
	{
	    $this->expectException(InvalidArgumentException::class);

	    $string = "\n () (( d ))";

	    new BracketsChecker($string);
	}
}