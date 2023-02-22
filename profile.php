
<?php
  
  include "php/user.php";
  if(isset($_SESSION['login'])){
    //user logged
    include "php/functions.php";
    echo resetBets();

  }else{
    //user offline
    echo "<script>location.href='login.php';</script>";
  }
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../../../favicon.ico"> -->
    <script src="assets/js/jquery.js"></script>
    <title>BET6COIN - Profile</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/chat.css" rel="stylesheet">

    <!-- Custom styles for this template 
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    ---- Include the above in your HEAD tag ---------->

    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  </head>
  <style type="text/css">
	.bg-color{ background: #696969 !important; }
	.text-color { color: #BEBEBE !important; }
	.bg-sec { background: #1874CD !important; }
	.text-sec { color: #1874CD !important; }
  </style>
  <body class=" all">
    <nav class="site-header bg-dark py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="index.php">
         <img src="assets/images/text4144.png" height="40" width="120" alt="6bet">
        </a>
        <!--<a class="py-2 d-none d-md-inline-block text-color" href="#">Tour</a>
        <a class="py-2 d-none d-md-inline-block text-color" href="#">Product</a>
        <a class="py-2 d-none d-md-inline-block text-color" href="#">Features</a>
        <a class="py-2 d-none d-md-inline-block text-color" href="#">Enterprise</a>
        <a class="py-2 d-none d-md-inline-block text-color" href="#">Support</a>
        <a class="py-2 d-none d-md-inline-block text-color" href="#">Pricing</a>-->
        <a href="#" class="return_ex"></a>
        <ul class='my-2'>
          <li>
              <button type='button' class='btn btn-outline-light bg-link text-primary my-profile' onclick="home()">Home</button>
          </li>
          <li>
              <button type='button' class='btn btn-outline-success bg-link text-light add_wallet'>Add wallet</button>
          </li>
           <li>
               <button type='button' class='exit btn btn-outline-primary bg-link text-light'>Logout</button>
          </li>
        </ul>
        
      </div>
    </nav>
    <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-10"><h1><?php user_id_login(); ?></h1></div>
     
    </div>
    <div class="row">
      <div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="assets/images/avatar/<?php my_avatar(); ?>" class="my-avatar img-circle img-thumbnail" alt="avatar">
        <!--<h6>Upload a different photo...</h6>-->
        <!--<input type="file" class="text-center center-block file-upload">-->
        <button type="button" class='btn btn-success btn-avatar'>Avatar list</button>
      </div></hr><br>       
          <div class="panel panel-default">

            <div class='box-avatar col-md'>
              <ul>
                <li>
                  <a href="#" class='avatar' id='av-1'><img src="assets/images/avatar/av-1.png" width="50" height="50" alt="avatar 1"></a>
                </li>
                 <li>
                  <a href="#" class='avatar' id='av-2'><img src="assets/images/avatar/av-2.png" width="50" height="50" alt="avatar 2"></a>
                </li>
                <li>
                  <a href="#" class='avatar' id='av-3'><img src="assets/images/avatar/av-3.png" width="50" height="50" alt="avatar 3"></a>
                </li>
                <li>
                  <a href="#" class='avatar' id='av-4'><img src="assets/images/avatar/av-4.png" width="50" height="50" alt="avatar 4"></a>
                </li>
                <li>
                  <a href="#" class='avatar' id='av-5'><img src="assets/images/avatar/av-5.png" width="50" height="50" alt="avatar 5"></a>
                </li>
                <li>
                  <a href="#" class='avatar' id='av-6'><img src="assets/images/avatar/av-6.png" width="50" height="50" alt="avatar 6"></a>
                </li>
                <li>
                  <a href="#" class='avatar' id='av-7'><img src="assets/images/avatar/av-7.png" width="50" height="50" alt="avatar 7"></a>
                </li>
                <li>
                  <a href="#" class='avatar' id='av-8'><img src="assets/images/avatar/av-8.png" width="50" height="50" alt="avatar 8"></a>
                </li>
                 <li>
                  <a href="#" class='avatar' id='av-9'><img src="assets/images/avatar/av-9.png" width="50" height="50" alt="avatar 9"></a>
                </li>
              </ul>

            </div>
            <!--<div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>-->
          </div>
        
          <!--<ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
              <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>-->
          
        </div><!--/col-3-->
      <div class="col-sm-9">
            <ul class="nav nav-tabs nav-profile">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li class="edit-level"><a data-toggle="tab" href="#my-level" class='my-level'>My Level</a></li>
                <li class="edit-profile"><a data-toggle="tab" href="#home">Edit</a></li>
                <li class="edit-skill"><a data-toggle="tab" href="#home">Skills</a></li>
            </ul>
          <div class='tab-content my-level-content'>
              <div class='box-level'>
                <table class='table table-striped'>
                    <thead>
                      <th>Nvl</th>
                      <th>Rolls</th>
                      <th>Stars</th>
                      <th>Gift</th>
                      <th>My</th>
                    </thead>
                    <tbody>
                      <tr class='tr-nv-1'>
                        <td class='text-dark'>1</td>
                        <td class='text-warning'>10000</td>
                        <td>★</td>
                        <td class='text-success bonus-nv-1'>0.00010000 BTC</td>
                        <td class='text-primary check1'>√</td>
                      </tr>
                      <tr class='tr-nv-2'>
                        <td class='text-dark'>2</td>
                        <td class='text-warning'>25000</td>
                        <td >★☆</td>
                        <td class='text-success bonus-nv-2'>0.00100000 BTC</td>
                        <td class='text-primary check2'>√</td>
                      </tr>
                       <tr class='tr-nv-3'>
                        <td class='text-dark'>3</td>
                        <td class='text-warning'>40000</td>
                        <td>★☆★</td>
                        <td class='text-success bonus-nv-3'>0.00600000 BTC</td>
                        <td class='text-primary check3'>√</td>
                      </tr>
                       <tr class='tr-nv-4'>
                        <td class='text-dark'>4</td>
                        <td class='text-warning'>70000</td>
                        <td>★☆★☆</td>
                        <td class='text-success bonus-nv-4'>0.01100000 BTC</td>
                        <td class='text-primary check4'>√</td>
                      </tr>
                       <tr class='tr-nv-5'>
                        <td class=text-dark'>5</td>
                        <td class='text-warning'>1000000</td>
                        <td>★☆★☆★</td>
                        <td class='text-success bonus-nv-5'>0.02500000 BTC</td>
                        <td class='text-primary check5'>√</td>
                      </tr>
                       <tr class='tr-nv-6'>
                        <td class='text-dark'>6</td>
                        <td class='text-warning'>1250000</td>
                        <td>★☆★☆★☆ <b>+</b></td>
                        <td class='text-success bonus-nv-6'>0.03000000 BTC</td>
                        <td class='text-primary check6'>√</td>
                      </tr>
                    </tbody>
                </table>
                <?php my_level(); ?>
              </div>
          </div>    
          <div class='col skills_user' style="display: none; max-height: 400px; overflow-y: auto;">
              <?php skill_user_valid(); ?>
          </div>
          <div class="tab-content edit-content" style="display: none;">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <!--<div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>-->
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control emailin" name="email" id="email" placeholder="you@email.com"  value="<?php user_email(); ?>" title="enter your email." disabled>
                              <small class='return_new_email' style="float: right;"></small>
                              <br>
                              <button class="edt-email btn btn-success " type="button">Edit email</button>
                              <hr>
                              <div class='form-group'>
                                <button type="button" class='btn btn-primary btn-edt-pw'>Edit password</button>
                              </div>
                          </div>
                        <div class='col-md-12 form-edit-pw'>
                          <h3>Change new password</h3>
                          <form class="form" method="post" name="edit-pw">
                            <div class='form-group'>
                                <input type="password" name="mypw" class="form-control pw" placeholder="Password">
                            </div>
                             <div class='form-group'>
                                <input type="password" name="newpw1" class="form-control new1" placeholder="New password">
                            </div>
                            <div class='form-group'>
                                <input type="password" name="newpw2" class="form-control new2" placeholder="Confirm password">
                            </div>
                           <div class='form-group'>
                                <div class='return_newpw'>
                                  
                                </div>
                            </div>
                            <div class='form-group' style="float: right;">
                               <button class="btn btn-success btn-save-pw" type="button">Save</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!--<div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>-->
                </form>
              
              
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
               <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                </form>
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
                
                
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
                </form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
        <script type="text/javascript" src="assets/js/scripts.js"></script>
  </body>
</html>
