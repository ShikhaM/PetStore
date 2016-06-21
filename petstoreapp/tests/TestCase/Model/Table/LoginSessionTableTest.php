<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoginSessionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoginSessionTable Test Case
 */
class LoginSessionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoginSessionTable
     */
    public $LoginSession;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.login_session',
        'app.users',
        'app.pet_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LoginSession') ? [] : ['className' => 'App\Model\Table\LoginSessionTable'];
        $this->LoginSession = TableRegistry::get('LoginSession', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LoginSession);

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
