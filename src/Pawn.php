<?php

class Pawn extends Figure {
    public function __toString() {
        return $this->isBlack ? '♟' : '♙';
    }

    public function checkAllowedMoves($xFrom, $yFrom, $xTo, $yTo, $board)
    {
        $yNext = $this->getIsBlack() ? $yFrom - 1 : $yFrom + 1;
        $yNext2 = $this->getIsBlack() ? $yFrom - 2 : $yFrom + 2;
        $xLeft = chr(ord($xFrom) - 1);
        $xRight = chr(ord($xFrom ) + 1);

        $allowed = [];

        if (isset($board[$xLeft][$yNext])) {
            $allowed[] = [$xLeft, $yNext];
        }

        if (isset($board[$xRight][$yNext])) {
            $allowed[] = [$xRight, $yNext];
        }

        if (!isset($board[$xFrom][$yNext])) {
            $allowed[] = [$xFrom, $yNext];
        }

        if (!isset($board[$xFrom][$yNext]) && !isset($board[$xFrom][$yNext2]) && ($yFrom == 2 || $yFrom == 7)) {
            $allowed[] = [$xFrom, $yNext2];
        }

        if (!in_array([$xTo, $yTo], $allowed)) {
            throw new \Exception('Пешка так не ходит');
        }
    }
}
