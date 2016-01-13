<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity.
 *
 * @property int $id
 * @property int $section_id
 * @property \App\Model\Entity\Section $section
 * @property string $question_name
 * @property string $question_type
 * @property int $created_by
 * @property \Cake\I18n\Time $creation_date
 * @property int $last_updated_by
 * @property \Cake\I18n\Time $last_update_date
 */
class About extends Entity
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

    protected function _getTitle(){
        return $this->_properties['TITLE'];
    }

    protected function _getContent(){
        return $this->_properties['CONTENT'];
    }
}