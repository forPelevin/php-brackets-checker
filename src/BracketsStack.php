<?php


namespace Gukasov\BracketsChecker;

/**
 * Class BracketsStack
 * @package Gukasov\BracketsChecker
 */
class BracketsStack
{
    /**
     * @var array
     */
    protected $stack;

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
     * @return mixed
     */
    public function fetch()
    {
        return array_pop($this->stack);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->stack);
    }
}