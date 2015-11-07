<?php $this->load->view('_blocks/header'); ?>
  <div class="row">
    
    
    
   <?php
    if(!empty($groups))
    {
      echo '<table class="table table-hover table-bordered table-condensed">';
     foreach($groups as $group)
        {
          echo '<tr>';
          echo '<td>'.$group->id.'</td><td>'.anchor('user/index/'.$group->id,$group->name).'</td><td>'.$group->description.'</td><td>'.anchor('group/edit/'.$group->id,'<span class="glyphicon glyphicon-pencil"></span>');
          if(!in_array($group->name, array('admin','members'))) echo ' '.anchor('admin/groups/delete/'.$group->id,'<span class="glyphicon glyphicon-remove"></span>');
          echo '</td>';
          echo '</tr>';
        }      echo '</table>';
    }
  ?>
  </div>
<?php $this->load->view('_blocks/footer'); ?>
