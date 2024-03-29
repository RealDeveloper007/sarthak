<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <tbody>
        <tr>
            <th width="20%"><?php echo $this->lang->line('grade_name'); ?></th>
            <td><?php echo $grade->grade_name; ?></td>
        </tr>
              
        <tr>
            <th><?php echo $this->lang->line('basic_salary'); ?> </th>
            <td><?php echo $grade->basic_salary; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('house_rent'); ?> </th>
            <td><?php echo $grade->house_rent; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('transport'); ?> <?php echo $this->lang->line('allowance'); ?></th>
            <td><?php echo $grade->transport; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('medical'); ?> <?php echo $this->lang->line('allowance'); ?></th>
            <td><?php echo $grade->medical; ?></td>
        </tr>        
        <tr>
            <th><?php echo $this->lang->line('over_time_hourly_rate'); ?></th>
            <td><?php echo $grade->over_time_hourly_rate; ?></td>
        </tr>        
        <tr>
            <th><?php echo $this->lang->line('provident_fund'); ?></th>
            <td><?php echo $grade->provident_fund; ?></td>
        </tr>        
        <tr>
            <th><?php echo $this->lang->line('hourly_rate'); ?></th>
            <td><?php echo $grade->hourly_rate; ?></td>
        </tr>        
        <tr>
            <th><?php echo $this->lang->line('total'); ?> <?php echo $this->lang->line('allowance'); ?></th>
            <td><?php echo $grade->total_allowance; ?></td>
        </tr>        
        <tr>
            <th><?php echo $this->lang->line('total'); ?> <?php echo $this->lang->line('deduction'); ?></th>
            <td><?php echo $grade->total_deduction; ?></td>
        </tr>        
        <tr>
            <th><?php echo $this->lang->line('gross_salary'); ?></th>
            <td><?php echo $grade->gross_salary; ?></td>
        </tr>               
        <tr>
            <th><?php echo $this->lang->line('net_salary'); ?></th>
            <td><?php echo $grade->net_salary; ?></td>
        </tr>               
        <tr>
            <th><?php echo $this->lang->line('note'); ?></th>
            <td><?php echo $grade->note; ?></td>
        </tr>               
    </tbody>
</table>
