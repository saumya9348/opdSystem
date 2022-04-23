<?php
 $this->load->view('welcome_message');
$medical_pf_id= $this->session->userdata('medical_pf_id');
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 </head>
 <body>
     <div style="width:40%;margin:10vh 30%;">
     <form class="" method="POST" action="<?php echo base_url()."Main/disease" ; ?>">
     <input type="hidden" name="medical_name" id="sel1" value="<?= @$medical_pf_id;  ?>" >

        <div class="form-group">
            <label for="desease">Desease Name</label>
            <input type="text" class="form-control" name="desease" id="desease">
        </div>
        <div class="form-group">
            <label for="Fees">Fees Amount</label>
            <input type="text" class="form-control" name="Fees" id="Fees">
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>
     </div>
 </body>

 </html>