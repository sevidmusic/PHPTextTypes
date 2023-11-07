<?php

namespace Darling\PHPTextTypes\tests\interfaces\collections;

use \Darling\PHPTextTypes\interfaces\collections\SafeTextCollection;
use \Darling\PHPTextTypes\classes\strings\SafeText;

/**
 * The SafeTextCollectionTestTrait defines common tests for
 * implementations of the SafeTextCollection interface.
 *
 * @see SafeTextCollection
 *
 */
trait SafeTextCollectionTestTrait
{

    /**
     * @var SafeTextCollection $SafeTextCollection An instance of a
     *                                     SafeTextCollection
     *                                     implementation to test.
     */
    protected SafeTextCollection $SafeTextCollection;

    /**
     * @var array<int, SafeText> $expectedCollection
     *                           The array of SafeText instances that
     *                           is expected to be returned by the
     *                           SafeTextCollection instance being
     *                           tested's collection() method.
     */
    private array $expectedCollection = [];

    /**
     * Set up an instance of a SafeTextCollection implementation to test.
     *
     * This method must set the SafeTextCollection implementation
     * instance to be tested via the setSafeTextCollectionTestInstance()
     * method.
     *
     * This method must also set the array of SafeText instances that is
     * expected to be returned by the SafeTextCollection instance being
     * tested's collection() method via the setExpectedCollection()
     * method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * public function setUp(): void
     * {
     *     $this->setExpectedCollection(
     *         [
     *             new Name(new Text($this->randomChars())),
     *             new Name(new Text($this->randomChars())),
     *             new Name(new Text($this->randomChars())),
     *             new Name(new Text($this->randomChars())),
     *             new Name(new Text($this->randomChars())),
     *         ]
     *     );
     *     $this->setSafeTextCollectionTestInstance(
     *         new SafeTextCollection(
     *             ...$this->expectedCollection(),
     *         )
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the SafeTextCollection implementation instance to test.
     *
     * @return SafeTextCollection
     *
     */
    protected function SafeTextCollectionTestInstance(): SafeTextCollection
    {
        return $this->SafeTextCollection;
    }

    /**
     * Set the SafeTextCollection implementation instance to test.
     *
     * @param SafeTextCollection $SafeTextCollectionTestInstance An instance
     *                                                  of an
     *                                                  implementation
     *                                                  of the
     *                                                  SafeTextCollection
     *                                                  interface to
     *                                                  test.
     *
     * @return void
     *
     */
    protected function setSafeTextCollectionTestInstance(
        SafeTextCollection $SafeTextCollectionTestInstance
    ): void
    {
        $this->SafeTextCollection = $SafeTextCollectionTestInstance;
    }

    /**
     * Set the array of SafeText instances that is expected to be
     * returned by the SafeTextCollection instance being tested's
     * collection() method.
     *
     * @param array<int, SafeText> $collection
     *
     * @return void
     *
     */
    protected function setExpectedCollection(array $collection): void
    {
        $this->expectedCollection = $collection;
    }

    /**
     * Return the array of SafeText instances that is expected to be
     * returned by the SafeTextCollection instance being tested's
     * collection() method.
     *
     * @return array<int, SafeText>
     *
     */
    protected function expectedCollection(): array
    {
        return $this->expectedCollection;
    }

    /**
     * Test collection() returns the expected array of SafeText instances.
     *
     * @return void
     *
     * @covers SafeTextCollection->collection()
     *
     */
    public function test_collection_returns_the_expected_array_of_Name_instances(): void
    {
        $this->assertEquals(
            $this->expectedCollection(),
            $this->SafeTextCollectionTestInstance()->collection(),
            $this->testFailedMessage(
                $this->SafeTextCollectionTestInstance(),
                'collection',
                'return the expected array of SafeText instances'
            ),
        );
    }

    abstract protected static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $object, string $method, string $message): string;
}

