<?php

namespace Darling\PHPTextTypes\tests\interfaces\collections;

use \Darling\PHPTextTypes\interfaces\collections\NameCollection;

/**
 * The NameCollectionTestTrait defines common tests for
 * implementations of the NameCollection interface.
 *
 * @see NameCollection
 *
 */
trait NameCollectionTestTrait
{

    /**
     * @var NameCollection $nameCollection
     *                              An instance of a
     *                              NameCollection
     *                              implementation to test.
     */
    protected NameCollection $nameCollection;

    /**
     * Set up an instance of a NameCollection implementation to test.
     *
     * This method must also set the NameCollection implementation instance
     * to be tested via the setNameCollectionTestInstance() method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * protected function setUp(): void
     * {
     *     $this->setNameCollectionTestInstance(
     *         new \Darling\PHPTextTypes\classes\collections\NameCollection()
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the NameCollection implementation instance to test.
     *
     * @return NameCollection
     *
     */
    protected function nameCollectionTestInstance(): NameCollection
    {
        return $this->nameCollection;
    }

    /**
     * Set the NameCollection implementation instance to test.
     *
     * @param NameCollection $nameCollectionTestInstance
     *                              An instance of an
     *                              implementation of
     *                              the NameCollection
     *                              interface to test.
     *
     * @return void
     *
     */
    protected function setNameCollectionTestInstance(
        NameCollection $nameCollectionTestInstance
    ): void
    {
        $this->nameCollection = $nameCollectionTestInstance;
    }

}

