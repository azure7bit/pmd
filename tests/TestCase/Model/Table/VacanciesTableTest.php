<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VacanciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VacanciesTable Test Case
 */
class VacanciesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vacancies',
        'app.companies',
        'app.branches',
        'app.organizations',
        'app.jobs',
        'app.applicant_job_lists',
        'app.applicants',
        'app.social_accounts',
        'app.users',
        'app.process_versions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vacancies') ? [] : ['className' => 'App\Model\Table\VacanciesTable'];
        $this->Vacancies = TableRegistry::get('Vacancies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vacancies);

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
