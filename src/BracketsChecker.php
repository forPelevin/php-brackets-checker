<?php

namespace Gukasov\BracketsChecker;

use Gukasov\BracketsChecker\Exceptions\InvalidArgumentException;

/**
 * Class BracketsChecker
 * @package Gukasov\BracketsChecker
 */
class BracketsChecker
{

	/**
	 * @var string
	 */
	protected $string;

	/**
	 * BracketsChecker constructor.
	 * @param string $str
	 * @throws InvalidArgumentException
	 */
	public function __construct(string $str)
	{
		$this->string = $str;

		$this->checkString();
	}

	/**
	 * @return bool
	 */
	public function isCorrectSequence(): bool
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

	/**
	 * @throws InvalidArgumentException
	 */
	protected function checkString()
	{
		if (preg_match('~[^\s\(\)]~', $this->string)) {
			throw new InvalidArgumentException;
		}
	}
}