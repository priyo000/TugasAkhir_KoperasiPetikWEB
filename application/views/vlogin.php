<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in - Koperasi PeTIK</title>
    <link rel = "icon" type = "image/png" href = "<?=base_url()?>assets/images/iconkoperasi.png">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php $this->load->view('_part/cssjs.php')?>
    <style>
        .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}

    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login</h3>
                    <form action="<?php echo base_url()?>index.php/login/aut" method="post">
                        <div class="form-group">
                            <input type="text" name="id" class="form-control" placeholder="NIM Anda *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" placeholder="Password Anda *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2" style="padding:0px;">
                    <img  src="<?=base_url()?>assets/images/priyopng.png" alt="Koperasi PeTIK" style="display:block;height:100%;width:100%;max-height:410px;max-width:410px;margin-left:auto;margin-right:auto;">
                </div>
            </div>
        </div>
    <?php $this->load->view('_part/footer.php')?>   
</div>
<?php $this->load->view('_part/js.php')?>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>