<!-- File: src/Template/Articles/index.ctp -->

<h1>Citizen</h1>
<table>
    <tr>
        <th>Hello, Welcome to ISDP </th>
        <th>Created</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($citizen as $citizen): ?>
    <tr>
        <td>
            <?= $this->Html->link($citizen->name, ['action' => 'view', $citizen->name]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

