<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($citizen->name) ?></h1>
<p><?= h($citizen->nid) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $citizen->name]) ?></p>