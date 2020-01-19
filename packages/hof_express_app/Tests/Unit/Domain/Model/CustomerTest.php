<?php
namespace TravisLykes\HofExpressApp\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Travis Lykes <hello@travislykes.com>
 */
class CustomerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TravisLykes\HofExpressApp\Domain\Model\Customer
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \TravisLykes\HofExpressApp\Domain\Model\Customer();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getUserIdReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getUserId()
        );
    }

    /**
     * @test
     */
    public function setUserIdForIntSetsUserId()
    {
        $this->subject->setUserId(12);

        self::assertAttributeEquals(
            12,
            'userId',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPhonenumberReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPhonenumber()
        );
    }

    /**
     * @test
     */
    public function setPhonenumberForStringSetsPhonenumber()
    {
        $this->subject->setPhonenumber('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'phonenumber',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAddressReturnsInitialValueForAddress()
    {
        self::assertEquals(
            null,
            $this->subject->getAddress()
        );
    }

    /**
     * @test
     */
    public function setAddressForAddressSetsAddress()
    {
        $addressFixture = new \TravisLykes\HofExpressApp\Domain\Model\Address();
        $this->subject->setAddress($addressFixture);

        self::assertAttributeEquals(
            $addressFixture,
            'address',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUserReturnsInitialValueForFrontendUser()
    {
    }

    /**
     * @test
     */
    public function setUserForFrontendUserSetsUser()
    {
    }
}
