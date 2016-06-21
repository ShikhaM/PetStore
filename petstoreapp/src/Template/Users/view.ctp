<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Login Session'), ['controller' => 'LoginSession', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login Session'), ['controller' => 'LoginSession', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pet Details'), ['controller' => 'PetDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pet Detail'), ['controller' => 'PetDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Fullname') ?></th>
            <td><?= h($user->fullname) ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Login Session') ?></h4>
        <?php if (!empty($user->login_session)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Start Time') ?></th>
                <th><?= __('Session Token') ?></th>
                <th><?= __('End Time') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->login_session as $loginSession): ?>
            <tr>
                <td><?= h($loginSession->id) ?></td>
                <td><?= h($loginSession->user_id) ?></td>
                <td><?= h($loginSession->start_time) ?></td>
                <td><?= h($loginSession->session_token) ?></td>
                <td><?= h($loginSession->end_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LoginSession', 'action' => 'view', $loginSession->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LoginSession', 'action' => 'edit', $loginSession->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LoginSession', 'action' => 'delete', $loginSession->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginSession->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pet Details') ?></h4>
        <?php if (!empty($user->pet_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Species') ?></th>
                <th><?= __('Subspecies') ?></th>
                <th><?= __('Dob') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Colour') ?></th>
                <th><?= __('Collection Location') ?></th>
                <th><?= __('Image Url') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->pet_details as $petDetails): ?>
            <tr>
                <td><?= h($petDetails->id) ?></td>
                <td><?= h($petDetails->user_id) ?></td>
                <td><?= h($petDetails->name) ?></td>
                <td><?= h($petDetails->species) ?></td>
                <td><?= h($petDetails->subspecies) ?></td>
                <td><?= h($petDetails->dob) ?></td>
                <td><?= h($petDetails->weight) ?></td>
                <td><?= h($petDetails->price) ?></td>
                <td><?= h($petDetails->description) ?></td>
                <td><?= h($petDetails->colour) ?></td>
                <td><?= h($petDetails->collection_location) ?></td>
                <td><?= h($petDetails->image_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PetDetails', 'action' => 'view', $petDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PetDetails', 'action' => 'edit', $petDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PetDetails', 'action' => 'delete', $petDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $petDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
