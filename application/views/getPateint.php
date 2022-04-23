<?php
 $this->load->view('welcome_message');
 $admin_name=$this->session->userdata('admin_name');

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
    if($admin_name=='doctor')
	    $this->table->set_heading('Sl No','Name','Mobile','DOB','Gender','Disease','Appointment Date','Appointment Registerd Date','Checkup Status','Action');
    else
	    $this->table->set_heading('Sl No','Name','Mobile','DOB','Gender','Disease','Appointment Date','Appointment Registerd Date','Checkup Status');
    $s=1;
    foreach($allPatients as $patient){
		
		/*if($patient->status  == 1){
				$statu =anchor('doc/admin/setstatus?status=0'.'&'.'id='.$pages->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('pages/admin/setstatus?status=1'.'&'.'id='.$pages->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}*/
        $x=$patient->checked_up_flag==1 ? 'check' : 'close';
        $y=$patient->checked_up_flag==1 ? 'blue' : 'red';
        $btn="<i class='fa fa-$x' style='text-align:center;font-size:28px;color:$y'></i>";
		$links = anchor(base_url() .'main/addPatientPrec/'.$patient->id,' ',array('title'=>'Add prescription','class'=>'fa fa-pencil fa-lg nav_icon'));
		// $links.= ' | '.anchor('contact/admin/appointment_remove/'.$pages->id,' ',array('title'=>'remove pages','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
        // if($pages->document!=''){
        // $download=anchor(base_url().'contact/admin/carrerFileDownload/'.$pages->document,'Download',array('title'=>'Download','class'=>'btn btn-primary'));
        // }else{
        //     $download='<strong>No CV</strong>';
        // }
    if($admin_name=='doctor')
        $this->table->add_row($s++,$patient->patients_name,$patient->phno,$patient->dob,$patient->gender,$patient->disease_name,$patient->apointment_date,$patient->register_date,$btn,$links);
	else
        $this->table->add_row($s++,$patient->patients_name,$patient->phno,$patient->dob,$patient->gender,$patient->disease_name,$patient->apointment_date,$patient->register_date,$btn);
        
	}
    ?>
    <div style="left:13%;position:absolute;width:70%;top:8vh;">
    <h2>
        All Patients &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:red;font-weight:700"><?= @$this->session->flashdata('prec_msg'); ?></span>
    </h2>
    <form action="<?php echo base_url().'Main/getPatient'; ?>" method="POST">
    <b style="text-align:center;margin-left:35%;font-size:2rem;">Select Date Wise &nbsp;<input type="date" name="date_filter" required id=""></b><input class="btn btn-info" style="margin-left:10px;" type="submit" name="submit" value="Submit">
    </form>
    <?php if($this->session->userdata('admin_name')!="medical" ){ ?>

    <button style="float:right;padding:10px 20px;margin-bottom:10px;" class="btn btn-primary"><a style="color:white;" href="<?php echo base_url().'Main/createPateint'; ?>">Add Pateint</a></button>
    <?php } ?>
    <?php echo $this->table->generate();?>

    </div>
</body>
</html>