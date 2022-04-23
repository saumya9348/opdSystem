<?php
  $url='';
  $dynamicName='';
 switch(@$flag){
  case "createstaff":
    $dynamicName='Staff';
    $url="Main/createstaff";
    break;
  case "createdoc":
    $dynamicName='Doctor';
    $url="Main/createdoc";
    break;
  case "createMedical":
    $dynamicName='Medical';
    $url="Main/createMedical";
    break;
  case "createPateint":
    $dynamicName='Pateint';
    $url="Main/createPateint";
    break;
  default:
    break;
 }
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>
<body>
<div style="width:40%;margin:10vh 30%;" >
<h1 style="margin-left:20%;"><?php echo @$dynamicName; ?> Registration Form</h1><br>
<form method="POST" action="<?php echo base_url().$url ; ?>">
<div class="form-group">
    <label for="fullname"> <?php echo (@$flag=='createMedical') ? 'Medical Name' : 'Full Name'; ?></label>
    <input type="text" class="form-control" name="fullname" id="fullname" required placeholder="Full Name">
  </div>


  <div class="form-group">
    <label for="user_name"><?php echo (@$flag=='createMedical') ? 'Medical User Id' : 'User Id'; ?></label>
    <input type="text" class="form-control" name="user_name" id="user_name" required placeholder="Enter User Name">
  </div>

<!-- for doctor speciality -->
  <?php if(@$flag=='createdoc' && $admin_name=='medical'){ ?>
    <div class="form-group">
    <label for="speciality">Doctor Speciality</label>
    <input type="text" class="form-control" name="speciality" id="speciality" required placeholder="Eg : Orthopedic Surgeon">
  </div>
  <?php } ?>

<!-- for medcal name -->
  <?php if((@$flag=='createdoc' or @$flag=='createstaff') && $admin_name=='admin'){ ?>
  <div class="form-group">
  <label for="sel1">Select Medical</label>
  <select required class="form-control" name="medical_name" id="sel1">
    <option>Select ..</option>
    <?php foreach($getMedical as $medical){ ?>
    <option value="<?php echo $medical->id; ?>"><?php echo $medical->medical_name; ?></option>
    <?php } ?>
  </select>
  </div>
      <?php }else{ ?>
        <input type="hidden" name="medical_name" id="sel1" value="<?= @$medical_pf_id;  ?>" >
        <?php } ?>

<!-- for emailid -->

  <?php if($flag!='createPateint'){ ?>
  <div class="form-group">
    <label for="Email1">Email address</label>
    <input type="email" class="form-control" name="Email1" id="Email1" required placeholder="Enter email">
  </div>
  <?php } ?>

<!-- for phone no -->

  <?php if(@$flag!='createMedical'){ ?>
  <div class="form-group">
    <label for="ph_no">Phone No</label>
    <input type="text" class="form-control" name="ph_no" id="ph_no" required placeholder="Mobile No">
  </div>
  <?php } ?>

<!-- for dob -->

  <?php if(@$flag=='createPateint'){ ?>
    <div class="form-group">
    <label for="dob">DOB</label>
    <input type="date" class="form-control" name="dob" id="dob" required >
  </div>

  <!-- doc name -->
  <div class="form-group">
  <label for="">Select Doctor</label>
  <select required class="form-control" name="doc_name" id="">
    <option>Select ..</option>
    <?php foreach($getDoctors as $doc){ ?>
    <option value="<?php echo $doc->id; ?>"><?php echo $doc->doc_name; ?></option>
    <?php } ?>
  </select>
  </div>

  <div class="form-group">
    <label for="appoint_date">Appointment Date</label>
    <input type="date" class="form-control" name="appoint_date" id="appoint_date" >
  </div>
  <!-- doc -->

    <?php if($admin_name=='admin'){  ?>

  <div class="form-group">
  <label for="sel1">Medical</label>
  <select required class="form-control" name="medical_name" id="sel1">
    <option>Select ..</option>
    <?php foreach($getMedical as $medical){ ?>
    <option value="<?php echo $medical->id; ?>"><?php echo $medical->medical_name; ?></option>
    <?php } ?>
  </select>
  </div>
      
      <?php }else{ ?>
        <input type="hidden" name="medical_name" id="sel1" value="<?= @$medical_pf_id;  ?>" >
      <?php } ?>

  <div class="form-group">
  <label for="sel2">Disease</label>
  <select required class="form-control" name="disease" id="sel2">
    <option>Select ..</option>
    <?php //foreach($getMedical as $medical){ ?>
    <option value="<?php //echo $medical->id; ?>"><?php //echo $medical->medical_name; ?></option>
    <?php //} ?>
  </select>
  </div>

      <!-- gender -->
      <div class="form-group">
  <label for="">Gender</label> <input type="radio" class="gender" name="gender" value="Male" id=""> Male  <input class="gender" type="radio" value="Female" name="gender" id="">Female
  
  </div>

  <?php } ?>

  <!-- password -->
  <div class="form-group">
    <label for="Password1">Password</label>
    <input type="password" class="form-control" name="Password1" required id="Password1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="exampleCheck1" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
<?php if(@$flag=='createPateint'){ ?>
<script>
  $(document).ready(function(){
      let admin_name='<?php echo $admin_name ?>';
      if(admin_name=='admin'){
      $('#sel1').change(function(){
          $.ajax({
              url:'<?php echo base_url()."Main/gatDisease"; ?>',
              data:{medical_name:$('#sel1').val()},
              type:'post',
              datatype:'html',
              success:function(res2){
                $('#sel2').empty().append(res2);
              }
          });
      });
      }else{
        $.ajax({
              url:'<?php echo base_url()."Main/gatDisease"; ?>',
              data:{medical_name:'<?php echo $medical_pf_id ?>'},
              type:'post',
              datatype:'html',
              success:function(res2){
                $('#sel2').empty().append(res2);
              }
          });
      }
  });
</script>
<?php } ?>

</html>