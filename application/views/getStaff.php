<?php
 $this->load->view('welcome_message');
//  print_r($alldocs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	$template = array(
          'table_open'            => '<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">',

         'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

	$this->table->set_template($template);
	$this->table->set_heading('Sl No','Name','Mobile','MailId');
    $s=1;
    foreach($allStaffs as $patient){
		
		/*if($patient->status  == 1){
				$statu =anchor('doc/admin/setstatus?status=0'.'&'.'id='.$pages->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('pages/admin/setstatus?status=1'.'&'.'id='.$pages->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}*/

		// $links = anchor(base_url() .'contact/admin/appointment_view/'.$pages->id,' ',array('title'=>'View pages','class'=>'fa fa-eye fa-lg nav_icon'));
		// $links.= ' | '.anchor('contact/admin/appointment_remove/'.$pages->id,' ',array('title'=>'remove pages','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
        // if($pages->document!=''){
        // $download=anchor(base_url().'contact/admin/carrerFileDownload/'.$pages->document,'Download',array('title'=>'Download','class'=>'btn btn-primary'));
        // }else{
        //     $download='<strong>No CV</strong>';
        // }
        $this->table->add_row($s++,$patient->full_name,$patient->phno,$patient->mailid);
		
	}
    ?>
    <div style="left:15%;position:absolute;width:70%;top:8vh;">
    <h2>
        All Staffs
    </h2>
    <?php if($this->session->userdata('admin_name')=="admin" || $this->session->userdata('admin_name')=="medical" ){ ?>

    <button style="float:right;padding:10px 20px;margin-bottom:10px;" class="btn btn-primary"><a style="color:white;" href="<?php echo base_url().'Main/createstaff'; ?>">Add Staff</a></button>
    <?php } ?>
    <?php echo $this->table->generate();?>

    </div>
</body>
</html>