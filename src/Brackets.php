<?php


namespace Gukasov\BracketsChecker;


/**
 * Class Brackets
 * @package Gukasov\BracketsChecker
 */
class Brackets
{

    /**
     * @var array
     */
    protected $types = [
        '()'
    ];

    /**
     * @param string $char
     * @return bool
     */
    public function isClosing(string $char): bool
    {
        $closingBrackets = array_map(function ($brackets) {
            return $brackets[1];
        }, $this->types);

        return in_array($char, $closingBrackets);
    }

    /**
     * @param string $char
     * @return bool
     */
    public function isOpening(string $char): bool
    {
        $openingBrackets = array_map(function ($brackets) {
            return $brackets[0];
        }, $this->types);

        return in_array($char, $openingBrackets);
    }

    /**
     * @param $openingBracket
     * @param $closingBracket
     * @return bool
     */
    public function isSame($openingBracket, $closingBracket): bool
    {
        foreach ($this->types as $brackets) {
            if ("{$openingBracket}{$closingBracket}" === $brackets) {
                return true;
            }
        }

        return false;
    }
}