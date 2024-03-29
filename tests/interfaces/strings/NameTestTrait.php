<?php

namespace Darling\PHPTextTypes\tests\interfaces\strings;

use Darling\PHPTextTypes\classes\strings\Text as TextToConvertToAName;
use Darling\PHPTextTypes\interfaces\strings\Name;
use Darling\PHPTextTypes\interfaces\strings\Text;
use Darling\PHPTextTypes\tests\interfaces\strings\SafeTextTestTrait;

/**
 * The NameTestTrait defines common tests for implementations of the
 * Name interface.
 *
 * @see Name
 *
 */
trait NameTestTrait
{
    /**
     * The SafeTextTestTrait defines common tests for implementations
     * of the Darling\PHPTextTypes\interfaces\strings\SafeText interface.
     *
     * @see Darling\PHPTextTypes\interfaces\strings\SafeText
     */
    use SafeTextTestTrait;

    /**
     * @var Name $name An instance of an implementation of the Name
     *                 interface to test.
     */
    private Name $name;

    /**
     * Modify a string, insuring only the following characters
     * exist in the resulting string:
     *
     * - Alphanumeric characters: A-Z, a-z, and 0-9
     * - Underscores: _
     * - Hyphens: -
     * - Periods: .
     *
     * Unsafe characters will be replaced with underscores.
     *
     * A consecutive sequence of 2 or more unsafe characters will be
     * replaced by a single underscore.
     *
     * A consecutive sequence of 2 or more underscores will be
     * replaced by a single underscore.
     *
     * A consecutive sequence of 2 or more hyphens will be replaced
     * by a single hyphen.
     *
     * A consecutive sequence of 2 or more periods will be replaced
     * by a single period.
     *
     * If the original string is empty, then the modified string will
     * be the numeric character: 0
     *
     * The resulting string will always start with an alphanumeric
     * character.
     *
     * If the original string does not start with an alphanumeric
     * character, then the first alphanumeric character in the
     * original string will be the first character of the of the
     * resulting string.
     *
     * If the original string does not contain any alphanumeric
     * characters than the resulting string will be the numeric
     * character: 0
     *
     * @return string
     *
     * @example
     *
     * ```
     * $string = '!Foo bar Baz..bin!@#Bar--foo____%$#@#$%^&*Bazzer';
     *
     * echo $this->makeStringSafe($string);
     * // example output: Foo_bar_Baz.bin_Bar-foo_Bazzer
     *
     * $string = '';
     *
     * echo $this->makeStringSafe($string);
     * // example output: 0
     *
     * $string = '_';
     *
     * echo $this->makeStringSafe($string);
     * // example output: 0
     *
     * $string = '-';
     *
     * echo $this->makeStringSafe($string);
     * // example output: 0
     *
     * $string = '.';
     *
     * echo $this->makeStringSafe($string);
     * // example output: 0
     *
     * $string = '(#$*%*';
     *
     * echo $this->makeStringSafe($string);
     * // example output: 0
     *
     * ```
     *
     */
    protected function makeStringSafe(string $string): string
    {
        $string = parent::makeStringSafe($string);
        $string = substr(
            $string,
            $this->positionOfFirstAlphanumericCharacter($string),
            170
        );
        return match(
            empty($string) ||
            $string === '_' ||
            $string === '-' ||
            $string === '.'
        ) {
            true => strval(0),
            default => $string
        };
    }

    /**
     * Return the implementation of the Name interface to test.
     *
     * @return Name
     *
     * @see Name
     *
     * @example
     *
     * ```
     * $this->nameTestInstance();
     *
     * ```
     *
     */
    protected function nameTestInstance(): Name
    {
        return $this->name;
    }

    /**
     * Determine the position of the first alphanumeric character
     * in a string.
     *
     * @return int
     *
     * @example
     *
     * ```
     * echo $this->positionOfFirstAlphanumericCharacter('_Foo');
     * // example output: 1
     *
     * ```
     */
    protected function positionOfFirstAlphanumericCharacter(
        string $string
    ): int
    {
        $stringLength = mb_strlen($string);
        for(
            $firstAlphanumericCharacterIndex = 0;
            $firstAlphanumericCharacterIndex < $stringLength;
            $firstAlphanumericCharacterIndex++
        ) {
            if(
                ctype_alnum(
                    $string[$firstAlphanumericCharacterIndex]
                )
            ) {
                break;
            };
        }
        return $firstAlphanumericCharacterIndex;
    }

    /**
     * Set an instance of an implementation of the Name interface
     * to test.
     *
     * @return void
     *
     * @see Name
     *
     * @example
     *
     * ```
     * $this->setNameTestInstance(
     *     new \Darling\PHPTextTypes\classes\strings\Name(
     *         new \Darling\PHPTextTypes\classes\strings\Text('Name')
     *     )
     * );
     *
     * ```
     *
     */
    public function setNameTestInstance(Name $name): void
    {
        $this->name = $name;
    }

    /**
     * Test that a Name always begins with an alphanumeric character.
     *
     * @return void
     *
     * @covers \Darling\PHPTextTypes\classes\strings\Name::__toString()
     *
     */
    public function test_Name_always_begins_with_an_alphanumeric_character(): void
    {
        $text = new TextToConvertToAName(
            $this->randomChars()
        );
        $this->setUpWithSpecificText($text);
        $this->assertTrue(
            ctype_alnum(substr($this->nameTestInstance(), 0, 1)),
            $this->testFailedMessage(
                $this->nameTestInstance(),
                '',
                'A Name must always start with an alphanumeric ' .
                'character'
            )
        );
    }

    /**
     * Test that the length of a Name less than or equal to 170.
     *
     * @return void
     *
     * @covers \Darling\PHPTextTypes\classes\strings\Name::length()
     *
     */
    public function test_that_the_length_of_a_Name_is_less_than_or_equal_to_170(): void
    {
        $text = new TextToConvertToAName(
            str_shuffle(
                str_repeat('1234567890', 100) .
                $this->randomChars()
            )
        );
        $this->setUpWithSpecificText($text);
        $this->assertLessThanOrEqual(
            170,
            $this->nameTestInstance()->length(),
            $this->testFailedMessage(
                $this->nameTestInstance(),
                '',
                'A Name\'s length must be less than or equal to 170'
            )
        );
    }

    /**
     * Test that the length of a Name is always at least 1.
     *
     * @return void
     *
     * @covers \Darling\PHPTextTypes\classes\strings\Name::length()
     *
     */
    public function test_that_the_length_of_a_Name_is_always_at_least_1(): void
    {
        $strings = ['', ' ', '.', '-', '_', $this->randomChars()];
        $text = new TextToConvertToAName(
            $strings[array_rand($strings)]
        );
        $this->setUpWithSpecificText($text);
        $this->assertGreaterThanOrEqual(
            1,
            $this->nameTestInstance()->length(),
            $this->testFailedMessage(
                $this->nameTestInstance(),
                '',
                'A Name\'s length must be greater than or equal to 1'
            )
        );
    }

}

