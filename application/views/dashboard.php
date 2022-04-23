<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed'); 
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
    <style>
        .child{
            width:300px;
            height: 200px;
            background-color: #7c3636;
            border-radius:10%;
            /* display: none; */
            float: left;
            margin: auto 5%;
        }
        .child h3{
            line-height:30px;
            text-align:center;
            padding-top:5px; 
            color: #fff;
        }
        .sub_dashboard{
            margin: 10vh 17%;
            width: 100%;
        }
        .sub_child{
            width: 300px;
            height: 170px;
            background-color: #61ad9d;
            border-radius:10%;
            text-align:center;
            line-height:170px;
            font-size:4.2rem;
        }
    </style>
</head>
<body>
    <div class="all_dashboard">
        <div class="sub_dashboard">
            <div class="child">
                <h3>Doctor </h3>
                <a href="<?php echo base_url().'Main/getDoc'; ?>">
                <div class="sub_child">
                    <b><?= @$doc; ?></b>
                </div>
                </a>
            </div>
            <div class="child">
                <h3>Patient </h3>
                <a href="<?php echo base_url().'Main/getPatient'; ?>">
                <div class="sub_child">
                    <b><?= @$pat; ?></b>
                </div>
                </a>
            </div>
            <div class="child">
                <h3>Staff </h3>
                <a href="<?php echo base_url().'Main/getStaff'; ?>">
                <div class="sub_child">
                    <b><?= @$staff; ?></b>
                </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>