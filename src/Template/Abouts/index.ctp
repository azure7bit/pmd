<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('New About Page'), ['action' => 'add']) ?></li>
    <li><?= $this->Html->link(__('List About Page'), ['controller' => 'Abouts', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('New Vacancy'), ['controller' => 'Abouts', 'action' => 'add']) ?></li>
  </ul>
</nav>
<div class="abouts index large-9 medium-8 columns content">
  <h3><?= __('Abouts') ?></h3>
  <table cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <th><?= $this->Paginator->sort('id') ?></th>
        <th><?= $this->Paginator->sort('title') ?></th>
        <th><?= $this->Paginator->sort('content') ?></th>
        <th><?= $this->Paginator->sort('created_by') ?></th>
        <th><?= $this->Paginator->sort('created_date') ?></th>
        <th><?= $this->Paginator->sort('updated_by') ?></th>
        <th><?= $this->Paginator->sort('updated_date') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($abouts as $about): ?>
        <tr>
          <td><?= $this->Number->format($about->id) ?></td>
          <td><?= h($about->title) ?></td>
          <td><?= h($about->content) ?></td>
          <td><?= $this->Number->format($about->created_by) ?></td>
          <td><?= h($about->created_date) ?></td>
          <td><?= $this->Number->format($about->updated_by) ?></td>
          <td><?= h($about->updated_date) ?></td>
          <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $about->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $about->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $about->id], ['confirm' => __('Are you sure you want to delete # {0}?', $about->id)]) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="paginator">
    <ul class="pagination">
      <?= $this->Paginator->prev('< ' . __('previous')) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
  </div>
</div>
