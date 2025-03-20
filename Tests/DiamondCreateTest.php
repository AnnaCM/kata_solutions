<?php declare(strict_types=1);

namespace Tests;

use Kata\Diamond\Create as DiamondCreate;
use Kata\Exception\ValidationError;
use PHPUnit\Framework\TestCase;


class DiamondCreateTest extends TestCase
{
    private DiamondCreate $diamondCreateClass;

    protected function setUp(): void
    {
        $this->diamondCreateClass = new DiamondCreate();
    }

    /**
     * @test
     * @dataProvider suppliedLetterProvider
     */
    public function printDiamond(string $suppliedLetter, string $expectedDiamond)
    {
        $this->assertSame(
            $expectedDiamond,
            $this->diamondCreateClass->print($suppliedLetter)
        );
    }

    public function suppliedLetterProvider(): array
    {
        return [
            ['B', " A\nB B\n A"],
            ['C', "  A\n B B\nC   C\n B B\n  A"],
            ['D', "   A\n  B B\n C   C\nD     D\n C   C\n  B B\n   A"],
            ['E', "    A\n   B B\n  C   C\n D     D\nE       E\n D     D\n  C   C\n   B B\n    A"],
            ['F', "     A\n    B B\n   C   C\n  D     D\n E       E\nF         F\n E       E\n  D     D\n   C   C\n    B B\n     A"],
            ['H', "       A\n      B B\n     C   C\n    D     D\n   E       E\n  F         F\n G           G\nH             H\n G           G\n  F         F\n   E       E\n    D     D\n     C   C\n      B B\n       A"],
            ['K', "          A\n         B B\n        C   C\n       D     D\n      E       E\n     F         F\n    G           G\n   H             H\n  I               I\n J                 J\nK                   K\n J                 J\n  I               I\n   H             H\n    G           G\n     F         F\n      E       E\n       D     D\n        C   C\n         B B\n          A"],
            ['N', "             A\n            B B\n           C   C\n          D     D\n         E       E\n        F         F\n       G           G\n      H             H\n     I               I\n    J                 J\n   K                   K\n  L                     L\n M                       M\nN                         N\n M                       M\n  L                     L\n   K                   K\n    J                 J\n     I               I\n      H             H\n       G           G\n        F         F\n         E       E\n          D     D\n           C   C\n            B B\n             A"],
            ['P', "               A\n              B B\n             C   C\n            D     D\n           E       E\n          F         F\n         G           G\n        H             H\n       I               I\n      J                 J\n     K                   K\n    L                     L\n   M                       M\n  N                         N\n O                           O\nP                             P\n O                           O\n  N                         N\n   M                       M\n    L                     L\n     K                   K\n      J                 J\n       I               I\n        H             H\n         G           G\n          F         F\n           E       E\n            D     D\n             C   C\n              B B\n               A"],
            ['S', "                  A\n                 B B\n                C   C\n               D     D\n              E       E\n             F         F\n            G           G\n           H             H\n          I               I\n         J                 J\n        K                   K\n       L                     L\n      M                       M\n     N                         N\n    O                           O\n   P                             P\n  Q                               Q\n R                                 R\nS                                   S\n R                                 R\n  Q                               Q\n   P                             P\n    O                           O\n     N                         N\n      M                       M\n       L                     L\n        K                   K\n         J                 J\n          I               I\n           H             H\n            G           G\n             F         F\n              E       E\n               D     D\n                C   C\n                 B B\n                  A"],
            ['V', "                     A\n                    B B\n                   C   C\n                  D     D\n                 E       E\n                F         F\n               G           G\n              H             H\n             I               I\n            J                 J\n           K                   K\n          L                     L\n         M                       M\n        N                         N\n       O                           O\n      P                             P\n     Q                               Q\n    R                                 R\n   S                                   S\n  T                                     T\n U                                       U\nV                                         V\n U                                       U\n  T                                     T\n   S                                   S\n    R                                 R\n     Q                               Q\n      P                             P\n       O                           O\n        N                         N\n         M                       M\n          L                     L\n           K                   K\n            J                 J\n             I               I\n              H             H\n               G           G\n                F         F\n                 E       E\n                  D     D\n                   C   C\n                    B B\n                     A"],
            ['X', "                       A\n                      B B\n                     C   C\n                    D     D\n                   E       E\n                  F         F\n                 G           G\n                H             H\n               I               I\n              J                 J\n             K                   K\n            L                     L\n           M                       M\n          N                         N\n         O                           O\n        P                             P\n       Q                               Q\n      R                                 R\n     S                                   S\n    T                                     T\n   U                                       U\n  V                                         V\n W                                           W\nX                                             X\n W                                           W\n  V                                         V\n   U                                       U\n    T                                     T\n     S                                   S\n      R                                 R\n       Q                               Q\n        P                             P\n         O                           O\n          N                         N\n           M                       M\n            L                     L\n             K                   K\n              J                 J\n               I               I\n                H             H\n                 G           G\n                  F         F\n                   E       E\n                    D     D\n                     C   C\n                      B B\n                       A"],
            ['Z', "                         A\n                        B B\n                       C   C\n                      D     D\n                     E       E\n                    F         F\n                   G           G\n                  H             H\n                 I               I\n                J                 J\n               K                   K\n              L                     L\n             M                       M\n            N                         N\n           O                           O\n          P                             P\n         Q                               Q\n        R                                 R\n       S                                   S\n      T                                     T\n     U                                       U\n    V                                         V\n   W                                           W\n  X                                             X\n Y                                               Y\nZ                                                 Z\n Y                                               Y\n  X                                             X\n   W                                           W\n    V                                         V\n     U                                       U\n      T                                     T\n       S                                   S\n        R                                 R\n         Q                               Q\n          P                             P\n           O                           O\n            N                         N\n             M                       M\n              L                     L\n               K                   K\n                J                 J\n                 I               I\n                  H             H\n                   G           G\n                    F         F\n                     E       E\n                      D     D\n                       C   C\n                        B B\n                         A"],
        ];
    }

    /** @test */
    public function printDiamondWithInvalidLetter()
    {
        $this->expectException(ValidationError::class);
        $this->expectExceptionMessage('A diamond cannot be created with the supplied letter');

        $this->diamondCreateClass->print('A');
    }
}
