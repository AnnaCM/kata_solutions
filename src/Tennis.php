<?php declare(strict_types=1);

namespace Kata;

class Tennis
{
    const POINT_SCORE_MAP = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    public function reportScoreForCurrentGame(int $firstPlayerPoints, int $secondPlayerPoints): string
    {
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
}
