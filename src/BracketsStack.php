<?php


namespace Gukasov\BracketsChecker;

/**
 * Class BracketsStack
 * @package Gukasov\BracketsChecker
 */
class BracketsStack
{

    /**
     * The array of supported brackets
     * @var
     */
    protected $bracketTypes = [
        '()'
    ];


    /**
     * @var array
     */
    protected $stack;

    /**
     * @param string $char
     * @return bool
     */
    public function isOpeningBracket(string $char): bool
    {
        $openingBrackets = array_map(function ($brackets) {
            return $brackets[0];
        }, $this->bracketTypes);

        return in_array($char, $openingBrackets);
    }

    /**
     * @param string $bracket
     * @return BracketsStack
     */
    public function put(string $bracket): self
    {
        $this->stack[] = $bracket;

        return $this;
    }

    /**
     * @param string $char
     * @return bool
     */
    public function isClosingBracket(string $char): bool
    {
        $closingBrackets = array_map(function ($brackets) {
            return $brackets[1];
        }, $this->bracketTypes);

        return in_array($char, $closingBrackets);
    }

    /**
     * @param string $bracket
     */
    public function checkForClosing(string $bracket): bool
    {
        $openingBracket = array_pop($this->stack);

        $bracketsMap = array_reduce($this->bracketTypes, function ($carry, $brackets) {
            $carry[$brackets[1]] = $brackets[0];

            return $carry;
        }, []);


        return isset($bracketsMap[$bracket]) && $bracketsMap[$bracket] === $openingBracket;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->stack);
    }
}