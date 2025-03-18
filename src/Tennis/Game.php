<?php declare(strict_types=1);

namespace Kata\Tennis;

use Kata\Exception\ValidationError;

class Game
{
    const POINT_SCORE_MAP = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    public function reportScore(int $firstPlayerPoints, int $secondPlayerPoints): string
    {
        $this->validatePoints($firstPlayerPoints, $secondPlayerPoints);

        if ($firstPlayerPoints == $secondPlayerPoints) {
            if ($firstPlayerPoints == 3) {
                return 'Deuce';
            }

            return self::POINT_SCORE_MAP[$firstPlayerPoints] . '-all';
        }

        if (
            ($firstPlayerPoints == 3 && $secondPlayerPoints == 4) ||
            ($firstPlayerPoints == 4 && $secondPlayerPoints == 3)
        ) {
            return 'Advantage';
        }

        return self::POINT_SCORE_MAP[$firstPlayerPoints] . '-' . self::POINT_SCORE_MAP[$secondPlayerPoints];
    }

    private function validatePoints(int $firstPlayerPoints, int $secondPlayerPoints)
    {
        if (
            (($firstPlayerPoints == 4) && ($secondPlayerPoints == 4)) ||
            $firstPlayerPoints > 4 ||
            $secondPlayerPoints > 4
        ) {
            throw new ValidationError('Invalid points provided');
        }
    }
}
