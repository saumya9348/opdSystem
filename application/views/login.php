
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('Assets/css/style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>

    </style>
  </head>
<body class="main_login_frmm">
<div class="login_form" >
<h1 style="margin-left:20%;"> Login Form</h1><br>
<form method="POST" action="<?php echo base_url()."Main/login" ; ?>">
<div class="form-group login_cont">
  <label for="sel1">Select Admin</label>
  <select required class="form-control" name="admin_name" id="sel1">
    <option>Select ..</option>
    <option value="medical">Medical Admin</option>
    <option value="staff">Staff</option>
    <option value="doctor">Doctor</option>
  </select>
  </div>
  <div class="form-group login_cont">
  <label for="logoptn">Login Option</label>
  <select class="form-control" name="logoptn" id="logoptn" required>
    <option>Select ..</option>
    <option value="uid">Userid</option>
    <option value="eid">EmailID</option>
  </select>
  </div>
  <div class="form-group login_cont">
    <label for="user_name">User Id / Mail ID</label>
    <input type="text" class="form-control" name="user_name" id="user_name" required placeholder="Enter User Name">
  </div>
  <div class="form-group login_cont">
    <label for="Password1">Password</label>
    <input type="password" class="form-control" name="Password1" required id="Password1" placeholder="Password">
  </div><br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>