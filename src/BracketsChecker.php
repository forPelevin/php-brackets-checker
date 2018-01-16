<?php

namespace Gukasov\BracketsChecker;

/**
 * Class BracketsChecker
 * @package Gukasov\BracketsChecker
 */
class BracketsChecker
{

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

            if ($bracketsStack->isOpeningBracket($char)) {
                $bracketsStack->put($char);

                continue;
            }

            if ($bracketsStack->isClosingBracket($char)) {
                $hasOpeningBracket = $bracketsStack->checkForClosing($char);

                if (! $hasOpeningBracket) {
                    return false;
                }

                continue;
            }

            throw new \InvalidArgumentException("The string contains invalid char: {$char}");
        }

        return $bracketsStack->isEmpty();
    }
}