<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title> Inventory Management System </title>
  </head>
  <body>
    <div class="container" >
        <div class="row justify-content-md-center mt-5" >
            <div class="col-sm-12 col-md-5">
                
                <h2 class="text-center">Inventory System</h2>
                
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <form  class="form-inline p-5 mt-4 border border-dark rounded" action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <label for="username">Username</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>" class="form-control" >
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2 mb-4">
                        <div class="col-md-4">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" name="password" placeholder="Password" value="<?= set_value('password') ?>" class="form-control" >
                        </div>
                    </div>    
                    <div class="d-grid">
                         <button type="submit" class="btn btn-primary">Signin</button>
                    </div>     
                </form>
            </div>
              
        </div>
    </div>
  </body>
</html>