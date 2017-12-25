<?php

namespace Gukasov\BracketsChecker;

use Gukasov\BracketsChecker\Exceptions\InvalidArgumentException;

class BracketsChecker
{

	protected $string;

	public function __construct(string $str)
	{
		$this->string = $str;

		$this->checkString();
	}

	public function isCorrectSequence()
	{
		// use string that contains only brackets for checking
		$bracketsString = preg_replace('~[^\(\)]~', '', $this->string);

		$stringLength = mb_strlen($bracketsString);

		$counter = 0;

		for ($i = 0; $i < $stringLength; $i++) {
			$bracketsString[$i] === '('
				? $counter++
				: $counter--;

			// counter has negative value if sequence is broken
			if ($counter < 0) {
				return false;
			}
		}

		// as a result count of opened brackets
		// must be equally to count of closed brackets
		return $counter === 0;
	}

	protected function checkString()
	{
		if (preg_match('~[^\s\(\)]~', $this->string)) {
			throw new InvalidArgumentException;
		}
	}
}