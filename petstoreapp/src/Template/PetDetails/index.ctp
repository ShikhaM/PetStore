<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pet Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="petDetails index large-9 medium-8 columns content">
    <h3><?= __('Pet Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('species') ?></th>
                <th><?= $this->Paginator->sort('subspecies') ?></th>
                <th><?= $this->Paginator->sort('dob') ?></th>
                <th><?= $this->Paginator->sort('weight') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('colour') ?></th>
                <th><?= $this->Paginator->sort('collection_location') ?></th>
                <th><?= $this->Paginator->sort('image_url') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($petDetails as $petDetail): ?>
            <tr>
                <td><?= $this->Number->format($petDetail->id) ?></td>
                <td><?= $petDetail->has('user') ? $this->Html->link($petDetail->user->id, ['controller' => 'Users', 'action' => 'view', $petDetail->user->id]) : '' ?></td>
                <td><?= h($petDetail->name) ?></td>
                <td><?= h($petDetail->species) ?></td>
                <td><?= h($petDetail->subspecies) ?></td>
                <td><?= h($petDetail->dob) ?></td>
                <td><?= $this->Number->format($petDetail->weight) ?></td>
                <td><?= $this->Number->format($petDetail->price) ?></td>
                <td><?= h($petDetail->description) ?></td>
                <td><?= h($petDetail->colour) ?></td>
                <td><?= h($petDetail->collection_location) ?></td>
                <td><?= h($petDetail->image_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $petDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $petDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $petDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $petDetail->id)]) ?>
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
