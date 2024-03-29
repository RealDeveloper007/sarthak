<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <tbody>
        <tr>
            <th width="20%"><?php echo $this->lang->line('subject'); ?> <?php echo $this->lang->line('name'); ?></th>
            <td><?php echo $subject->name; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('subject'); ?> <?php echo $this->lang->line('code'); ?></th>
            <td><?php echo $subject->code; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('author'); ?></th>
            <td><?php echo $subject->author; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('type'); ?></th>
            <td><?php echo $this->lang->line($subject->type); ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('class'); ?></th>
            <td><?php echo $subject->class_name; ?>   </td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('teacher'); ?></th>
            <td><?php echo $subject->teacher; ?>   </td>
        </tr>
        <!--<tr>
            <th><?php echo $this->lang->line('pass_mark'); ?></th>
            <td><?php echo $subject->pass_mark; ?>   </td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('full_mark'); ?></th>
            <td><?php echo $subject->full_mark; ?>   </td>
        </tr>-->
        <tr>
            <th><?php echo $this->lang->line('note'); ?></th>
            <td><?php echo $subject->note; ?>   </td>
        </tr>
    </tbody>
</table>
