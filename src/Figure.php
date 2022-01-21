<?php

class Figure {
    protected $isBlack;

    public function __construct($isBlack) {
        $this->isBlack = $isBlack;
    }

    public function getIsBlack()
    {
        return $this->isBlack;
    }

    /** @noinspection PhpToStringReturnInspection */
    public function __toString() {
        throw new \Exception("Not implemented");
    }
}
