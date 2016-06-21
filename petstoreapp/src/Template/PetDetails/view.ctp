<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pet Detail'), ['action' => 'edit', $petDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pet Detail'), ['action' => 'delete', $petDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $petDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pet Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pet Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="petDetails view large-9 medium-8 columns content">
    <h3><?= h($petDetail->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $petDetail->has('user') ? $this->Html->link($petDetail->user->id, ['controller' => 'Users', 'action' => 'view', $petDetail->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($petDetail->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Species') ?></th>
            <td><?= h($petDetail->species) ?></td>
        </tr>
        <tr>
            <th><?= __('Subspecies') ?></th>
            <td><?= h($petDetail->subspecies) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($petDetail->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Colour') ?></th>
            <td><?= h($petDetail->colour) ?></td>
        </tr>
        <tr>
            <th><?= __('Collection Location') ?></th>
            <td><?= h($petDetail->collection_location) ?></td>
        </tr>
        <tr>
            <th><?= __('Image Url') ?></th>
            <td><?= h($petDetail->image_url) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($petDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= $this->Number->format($petDetail->weight) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($petDetail->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Dob') ?></th>
            <td><?= h($petDetail->dob) ?></td>
        </tr>
    </table>
</div>
