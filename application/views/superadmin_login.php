<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo base_url(); ?>Assets/css/style.css" rel="stylesheet">
    <title>Document</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
.all_super_link{
        width:100%;
    }
    .xyz{
        margin: 50px 30%;
    }
    .aa{
        margin-top:35px;
        margin-left:25%;
        width:50%;
        background-color: cyan;
    }
    </style>
</head>
<body>
    <section class="super-admin">
    </section>
    <div class="admin_login_sec">
        <!-- <form >
            <div class="all_super_link">
            Login Option <select name="logoptn" id="logoptn">
                <option value="">Select Option</option>
                <option value="uid">User ID</option>
                <option value="mail_id">Mail ID</option>
            </select>
            </div>
            <br>
            id<input type="text" name="user_name" id="user_name"><br>
            pw<input type="text" name="Password1" id="Password1"><br>
            <input type="hidden" name="admin_name" value="admin" id="admin_name">
            <input type="submit" name="submit" id="">


            </form> -->



        <div class="xyz">
        <form action="<?php echo base_url()."Main/login" ; ?>" method="post">
        <h3>Super Admin Login</h3>
            <div class="form-group">
                <label for="logoptn">Login Option</label>
                <select class="form-control all_super_link" name="logoptn" required id="logoptn">
                        <option value="">Select Option</option>
                        <option value="uid">User ID</option>
                        <option value="mail_id">Mail ID</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_name">Userid / EmailID</label>
                <input type="text" class="form-control all_super_link" required name="user_name" id="user_name" aria-describedby="emailHelp" placeholder="Enter email Or User Id">
            </div>
            <div class="form-group">
                <label for="Password1">Password</label>
                <input type="password" class="form-control all_super_link" required name="Password1" id="Password1" placeholder="Password">
            </div>
            <input type="hidden" name="admin_name" value="admin" id="admin_name">
            <div class="form-group">
            <input type="submit" class="form-control all_super_link aa" style="" name="submit" id="">

            </div>
        </div>
        </form>
    </div>
    
</body>
</html>