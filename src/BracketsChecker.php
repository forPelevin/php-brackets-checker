<?php

namespace Gukasov\BracketsChecker;

/**
 * Class BracketsChecker
 * @package Gukasov\BracketsChecker
 */
/**
 * Class BracketsChecker
 * @package Gukasov\BracketsChecker
 */
class BracketsChecker
{

    /**
     * @var Brackets
     */
    protected $brackets;

    /**
     * BracketsChecker constructor.
     */
    public function __construct()
    {
        $this->brackets = new Brackets();
    }

    /**
     * @param string $string
     * @return string
     */
    public function clearSpacesIn(string $string): string
    {
        return preg_replace('/[\s]/', '', $string);
    }

    /**
     * @param string $string
     */
    protected function isValidString(string $string)
    {
        if (!$string) {
            throw new \InvalidArgumentException('The given string is empty');
        }
    }

    /**
     * @param string $string
     * @return bool
     */
    public function isCorrectSequence(string $string): bool
    {
        $this->isValidString($string);

        $bracketsString = $this->clearSpacesIn($string);

        $bracketsStack = new BracketsStack();

        for ($i = 0; $i < mb_strlen($bracketsString); $i++) {
            $char = $bracketsString[$i];

            if ($this->brackets->isOpening($char)) {
                $bracketsStack->put($char);

                continue;
            }

            if ($this->brackets->isClosing($char)) {
                $openingBracket = $bracketsStack->fetch();

                $sameType = $this->brackets->isSame($openingBracket, $char);

                if (! $sameType) {
                    return false;
                }

                continue;
            }

            throw new \InvalidArgumentException("The string contains invalid char: {$char}");
        }

        return $bracketsStack->isEmpty();
    }
}