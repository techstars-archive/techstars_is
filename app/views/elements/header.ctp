<h1><b>tech</b>stars is...</h1>
<ul id="nav">
    <li>
    <?= $this->Html->link('List Statements', array('controller' => 'statements', 'action' => 'index')); ?>
    </li>
    <li>
    <?= $this->Html->link('Add a new statement', array('controller' => 'statements', 'action' => 'add')); ?>
    </li>
    <li>
    <?= $this->Html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home')); ?>
    </li>
    <li style="float: right;">
    <?= $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
    </li>
</ul>
