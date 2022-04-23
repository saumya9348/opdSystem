<?php

$this->load->view('welcome_message');
 
$admin_name=$this->session->userdata('admin_name');
$medical_pf_id= $this->session->userdata('medical_pf_id');
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
    <section class="pt_presc">
        <form method="POST" action="<?php echo base_url('Main/addPatientPrec').'/'.$p_pk_id ; ?>">
            <h3>Pateint Name - <?= @$pdata[0]->patients_name ?> </h3><br>
            <h4>Write Prescription</h4>
            <textarea name="prec" id="prec" cols="70" rows="10"><?= @$pdata[0]->prescription ?></textarea><br>
            <input class="btn btn-success" type="submit" name="submit" id="">

        </form>
    </section>
</body>
</html>