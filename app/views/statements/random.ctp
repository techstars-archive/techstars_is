<?= $this->Html->tag('h1', '"' . $statement['Statement']['body'] . '"'); ?>

<?= $this->Html->tag('h2', $statement['Statement']['name']); ?>

<?php
    switch($statement['Statement']['type']) {
    case Statement::TYPE_MENTOR:
        $type = 'Mentor';
        break;
    case Statement::TYPE_FOUNDER:
        $type = 'Founder';
        break;
    case Statement::TYPE_ASSOCIATE:
        $type = 'Associate';
        break;
    case Statement::TYPE_HACKSTAR:
        $type = 'HackStar';
        break;
    case Statement::TYPE_STAFF:
        $type = 'TechStars Staff';
        break;
    default:
        $type = '';
}
echo $this->Html->tag('h3', $type);

if (!empty($statement['Statement']['company'])) {
    echo $this->Html->tag('h3', "(" . $statement['Statement']['company'] . ")");
}


?>
