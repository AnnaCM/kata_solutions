<?php declare(strict_types=1);

namespace Tests;

use Kata\Exception\ValidationError;
use Kata\Tennis\Game as TennisGame;
use PHPUnit\Framework\TestCase;


class TennisGameTest extends TestCase
{
    private TennisGame $tennisGameClass;

    protected function setUp(): void
    {
        $this->tennisGameClass = new TennisGame();
    }

    /**
     * @test
     * @dataProvider scoreReportProvider
     */
    public function gameScore(int $firstPlayerPoints, int $secondPlayerPoints, string $expectedGameScore)
    {
        $this->assertSame(
            $expectedGameScore,
            $this->tennisGameClass->reportScore($firstPlayerPoints, $secondPlayerPoints)
        );
    }

    public function scoreReportProvider(): array
    {
        return [
            [0, 0, 'Love-all'],
            [1, 1, 'Fifteen-all'],
            [2, 2, 'Thirty-all'],

            [0, 1, 'Love-Fifteen'],
            [1, 0, 'Fifteen-Love'],
            [2, 0, 'Thirty-Love'],
            [0, 2, 'Love-Thirty'],
            [2, 1, 'Thirty-Fifteen'],
            [1, 2, 'Fifteen-Thirty'],
            [3, 0, 'Forty-Love'],
            [0, 3, 'Love-Forty'],
            [3, 1, 'Forty-Fifteen'],
            [1, 3, 'Fifteen-Forty'],
            [3, 2, 'Forty-Thirty'],
            [2, 3, 'Thirty-Forty'],

            [3, 3, 'Deuce'],

            [4, 3, 'Advantage'],
            [3, 4, 'Advantage']
        ];
    }

    /**
     * @test
     * @dataProvider invalidPointsProvider
     */
    public function invalidGameScore(int $firstPlayerPoints, int $secondPlayerPoints)
    {
        $this->expectException(ValidationError::class);
        $this->expectExceptionMessage('Invalid points provided');

        $this->tennisGameClass->reportScore($firstPlayerPoints, $secondPlayerPoints);
    }

    public function invalidPointsProvider(): array
    {
        return [
            [4, 4],
            [5, 4],
            [5, 5],
        ];
    }
}
