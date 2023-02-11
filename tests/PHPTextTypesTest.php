<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Darling\PHPTextTypes\traits\PHPUnitConfigurationTests;
use Darling\PHPTextTypes\traits\PHPUnitTestMessages;
use Darling\PHPTextTypes\traits\PHPUnitRandomValues;

/**
 * Defines common methods that may be useful to all
 * PHPTextTypes test classes.
 *
 * All PHPTextTypes test classes must extend from
 * this class.
 *
 * This class also serves as an example of how the traits
 * provided by this library can be used in a phpunit test
 * class.
 *
 */
class PHPTextTypesTest extends TestCase
{
    use PHPUnitConfigurationTests;
    use PHPUnitTestMessages;
    use PHPUnitRandomValues;
}

