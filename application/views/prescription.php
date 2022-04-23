<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
          .prescription{
    /* background-image:url(../img/doc_symbol.png) ;   */
    /* background-color:rgb(104, 53, 53); */

    }
    #prec_logo{
        position: absolute;
        z-index: -1;
        opacity: .3;
        left: 30%;
        top:20%;
        height: 700px;
        width: 700px;
    }
    .doc_detail{
        font-size: 2.1rem;
        float: right;
        margin-top:-80px;
        margin-right:180px;
    font-weight:700;
    font-family: 'Bree Serif', serif;
    color:rgb(66, 37, 37);
    }
    .mein_h{
        display: flex;
        justify-content: space-between;
        margin: 30px 40px;
        height:100px;
    }
.med_name{
    font-size: 2.6rem;
    font-weight:700;
    font-family: 'Bree Serif', serif;
    color:red;

}
.pt_presc{
    margin: 15% 20%;
}
.sen_name{
    font-size: 1.5rem;
    font-weight:700;
    font-family: 'Bree Serif', serif;
    color:rgb(33, 66, 138);
    text-align: center;
}
.presc_name{
    font-size: 1.2rem;
    font-weight:600;
    margin: 20px 20%;
}
    </style>
</head>
<body class="prescription">
    <header>
        <!-- <img src="<?php echo base_url(); ?>Assets/img/doc_symbol.png" id="prec_logo" alt=""> -->
        <div class="mein_h">
            <div class="med_name">
                <?= $report[0]->medical_name ?>
            </div>
            <div class="doc_detail" style="color:red;">
            <?= $report[0]->doc_name ?> <br>
            <?= $report[0]->d_ph ?>
            </div>
        </div>
        
    </header>

    <hr>
    
    <section class="sen_name">
        Name - <?= $report[0]->patients_name ?> &nbsp; &nbsp;  Sex - <?= $report[0]->gender ?>  &nbsp; &nbsp; DOB <?= $report[0]->dob ?> &nbsp; &nbsp; Mobile No - <?= $report[0]->p_ph ?> <br>
     </section>
     <hr>
     <section class="presc_name">
         <span style="font-size: 1.9rem;color:red;" >Rx:</span> <br><br>
         <?= $report[0]->prescription ?>
     </section>
</body>
</html>