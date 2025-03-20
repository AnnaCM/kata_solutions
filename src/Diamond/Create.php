<?php declare(strict_types=1);

namespace Kata\Diamond;

use Kata\Exception\ValidationError;

class Create
{
    const ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function print(string $widestPoint): string
    {
        if ($widestPoint == 'A') {
            throw new ValidationError('A diamond cannot be created with the supplied letter');
        }

        $index = strpos(self::ALPHABET, $widestPoint);
        $letters = str_split(substr(self::ALPHABET, 0, $index + 1));
        $outerSpaces = range($index, 0, -1);

        $repeatedPattern = [];
        $numberInnerSpaces = 1;
        for ($i = 0; $i < count($letters) - 1; $i++) {
            $repeatedPattern[$i][$i] = str_pad('', $outerSpaces[$i]);
            $repeatedPattern[$i][$i+1] = $letters[$i];

            if ($letters[$i] == 'A') {
                $repeatedPattern[$i][$i+2] = "\n";
            } else {
                $repeatedPattern[$i][$i+2] = str_pad('', $numberInnerSpaces);
                $repeatedPattern[$i][$i+3] = $letters[$i] . "\n";
                $numberInnerSpaces += 2;
            }
        }

        $widestPointRow = [[$letters[count($letters) - 1], str_pad('', $numberInnerSpaces), $letters[count($letters) - 1], "\n"]];

        $diamond = array_merge($repeatedPattern, $widestPointRow, array_reverse($repeatedPattern));
        unset($diamond[count($diamond) - 1][count($diamond[count($diamond) - 1]) - 1]);
        return implode('', array_map(function (array $row) { return implode('', $row); }, $diamond));
    }
}