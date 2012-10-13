<?php echo $this->element('header'); ?>

<table>

<tr>
<th><?php echo $this->Paginator->sort('ID', 'id'); ?></th>
<th><?php echo $this->Paginator->sort('Body', 'body'); ?></th>
<th><?php echo $this->Paginator->sort('Name', 'name'); ?></th>
<th><?php echo $this->Paginator->sort('Type', 'type'); ?></th>
<th><?php echo $this->Paginator->sort('Company', 'company'); ?></th>
<th><?php echo $this->Paginator->sort('Created', 'created'); ?></th>
<th><?php echo $this->Paginator->sort('Status', 'status'); ?></th>
<th>Actions</th>
</tr>

   <?php foreach ($statements as $statement): ?>
   <tr>
   <td>
   <?= $statement['Statement']['id']; ?>
   </td>
   <td>
   <?= $this->Html->link(substr($statement['Statement']['body'], 0, 25),
                         array('controller' => 'statements', 'action' => 'edit', $statement['Statement']['id'])); ?>
   </td>
   <td>
   <?= substr($statement['Statement']['name'], 0, 15); ?>
   </td>   
   <td>
   <?php
   switch($statement['Statement']['type']) {
   case Statement::TYPE_MENTOR:
       echo "Mentor";
       break;
   case Statement::TYPE_FOUNDER:
       echo "Founder";
       break;
   case Statement::TYPE_ASSOCIATE:
       echo "Associate";
       break;
   case Statement::TYPE_HACKSTAR:
       echo "HackStar";
       break;
   case Statement::TYPE_STAFF:
       echo "Staff";
       break;
   default:
       echo "";
   }
   ?>
   </td>
   <td>
   <?= substr($statement['Statement']['company'], 0, 15); ?>
   </td>
   <td>
   <?= $statement['Statement']['created']; ?>
   </td>
   <td>
   <?= $statement['Statement']['status'] == Statement::STATUS_APPROVED ? 'Approved' : 'Pending'; ?>
   </td>   
   <td>
   <?php
   if ($statement['Statement']['status'] == Statement::STATUS_PENDING) {
       echo $this->Html->link('Approve', array('action' => 'approve', $statement['Statement']['id']));
   }
   ?>
   <?= $this->Html->link('Edit', array('action' => 'edit', $statement['Statement']['id'])); ?>
   <?= $this->Html->link('Delete', array('action' => 'delete', $statement['Statement']['id']), null, 'Are you sure?'); ?>
   </td>
   <?php endforeach; ?>
   </tr>

</table>
<br />
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
&nbsp;&nbsp;&nbsp;
<?php echo $this->Paginator->numbers(); ?>
&nbsp;&nbsp;&nbsp;   
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
<br />
