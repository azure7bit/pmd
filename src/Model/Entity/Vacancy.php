<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vacancy Entity.
 *
 * @property int $id
 * @property int $vacancy_id
 * @property string $vacancy_code
 * @property string $vacancy_name
 * @property int $company_id
 * @property \App\Model\Entity\Company $company
 * @property int $branch_id
 * @property \App\Model\Entity\Branch $branch
 * @property int $organization_id
 * @property \App\Model\Entity\Organization $organization
 * @property int $job_id
 * @property \App\Model\Entity\Job $job
 * @property string $people_category_code
 * @property string $employment_category_code
 * @property \Cake\I18n\Time $valid_date_from
 * @property \Cake\I18n\Time $valid_date_to
 * @property int $required_personnel
 * @property string $vacancy_status_code
 * @property string $remark
 * @property int $process_version_id
 * @property \App\Model\Entity\ProcessVersion $process_version
 * @property int $created_by
 * @property \Cake\I18n\Time $creation_date
 * @property int $last_updated_by
 * @property \Cake\I18n\Time $last_update_date
 * @property \App\Model\Entity\Vacancy[] $vacancies
 */
class Vacancy extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
