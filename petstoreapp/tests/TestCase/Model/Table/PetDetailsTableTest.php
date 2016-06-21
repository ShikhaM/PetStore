<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PetDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PetDetailsTable Test Case
 */
class PetDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PetDetailsTable
     */
    public $PetDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pet_details',
        'app.users',
        'app.login_session'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PetDetails') ? [] : ['className' => 'App\Model\Table\PetDetailsTable'];
        $this->PetDetails = TableRegistry::get('PetDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PetDetails);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
