<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Section Entity.
 *
 * @property int $id
 * @property int $exam_id
 * @property \App\Model\Entity\Exam $exam
 * @property string $section_name
 * @property string $remark
 * @property int $created_by
 * @property \Cake\I18n\Time $creation_date
 * @property int $last_updated_by
 * @property \Cake\I18n\Time $last_update_date
 * @property \App\Model\Entity\Question[] $questions
 */
class Section extends Entity
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
