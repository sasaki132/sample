<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MyblogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MyblogsTable Test Case
 */
class MyblogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MyblogsTable
     */
    public $Myblogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Myblogs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Myblogs') ? [] : ['className' => MyblogsTable::class];
        $this->Myblogs = TableRegistry::getTableLocator()->get('Myblogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Myblogs);

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
}
