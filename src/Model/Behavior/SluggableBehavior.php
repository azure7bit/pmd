<?php
  namespace App\Model\Behavior;

  use Cake\Event\Event;
  use Cake\ORM\Behavior;
  use Cake\ORM\Entity;
  use Cake\ORM\Query;
  use Cake\Utility\Inflector;

  class SluggableBehavior extends Behavior
  {
    protected $_defaultConfig = [
      'field' => 'name',
      'slug' => 'slug',
      'unique' => true,
      'length' => 255,
      'update' => false,
      'trigger' => false,
      'replacement' => '-',
      'implementedFinders' => [
        'slugged' => 'findSlug',
        'superSlug' => 'slug',
      ]
    ];

    public function slug(Entity $entity)
    {
      $config = $this->config();
      $value = $entity->get($config['field']);
      $entity->set($config['slug'], Inflector::slug($value . rand(99,22), $config['replacement']));
    }

    public function beforeSave(Event $event, Entity $entity)
    {
      $this->slug($entity);
    }
  }