
<?php
  
  include "php/user.php";
  if(isset($_SESSION['login'])){
  
   //user logged

    include "php/functions.php";
    
    resetBets();
    reset_winlose();
    check_skill();
    att_days_skill();
  
    $log = $_SESSION['login'];
    $get_user = mysqli_query($con, "SELECT * FROM login WHERE login ='$log'");
 
    while ($get_log = mysqli_fetch_array($get_user)) {
      $get_ip = $get_log['ip'];
    }

    if($get_ip != $_SERVER['REMOTE_ADDR']){


      unset($_SESSION['login']);

      session_destroy();

      echo "<script>setTimeout(function(){ location.href='login.php'; }, 10);</script>";
        
      exit();
    }

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
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script src="assets/js/jquery.js"></script>
    <title>BET6COIN</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/chat.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  </head>
  <!--<style>
  @import url('https://fonts.googleapis.com/css?family=Ubuntu');
  </style> -->
  <style type="text/css">
	.bg-color{ background: #696969 !important; }
	.text-color { color: #BEBEBE !important; }
	.bg-sec { background: #1874CD !important; }
	.text-sec { color: #1874CD !important; }
  </style>
  <body class=" all">
   
    <button onclick="playAudio()" type="button" style="display: none;">Play Audio</button>
    <button onclick="pauseAudio()" type="button" style="display: none;">Pause Audio</button>
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
              <button type='button' class='btn btn-outline-light bg-link text-primary my-profile' onclick="profile()">Profile</button>
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
    <div class='short_dado'>

    </div>
      <form class='form-dado bg-dark' action="" method="post" style="display:none;">
        <div class="form-group form-dado-group">
          <h4 class='float-left text-light close-dado'>⌧</h4>
        </div>
        <div class="form-group form-dado-group">
          <h4 class='h4-j text-success'>Jogar dados</h4>
        </div>
        <div class='block-form-dado col-md'>
          <div class='form-group form-dado-group'>
              <label class='text-primary'>Amount bet</label>
              <input type="text" name="dado_user" class='form-control dado_amount_user' placeholder="Ex: 0.01">
              <input type="hidden" name="rate_dado_limit" class='form-control dado_rate_limit' value="<?php return_rate_dado(); ?>">
              <input type="hidden" name="rand_dado_short" class="rand_dado_short">
              <div class='text-light float-right'>Total para apostar: <a href="#totaldado" class="amount_acc_dado text-success"></a></div>
          </div>
          <div class="form-group form-dado-group">
             <label class='text-primary'>Rate</label>
              <select class="amount_rate form-control">
                <option selected="">Bet rate</option>
                <option value='1.25'>1.25</option>
                 <option value='1.45'>1.45</option>
                <option value='1.55'>1.55</option>
                <option value='2'>2</option>
              </select>
          </div>
          <div class="form-group form-dado-group">
              <label class='text-primary'>Num rand</label>
              <div class="col-md">
                <div class="row col-dado">
                  <a href="#dado1" class='img-dado1'><img src="assets/images/dados/dado1.png" width="35" height="35" alt="img1"></a>
                </div>
                <div class="row col-dado">
                  <a href="#dado2" class='img-dado2'><img src="assets/images/dados/dado2.png" width="35" height="35" alt="img2"></a>
                </div>
                <div class="row col-dado">
                  <a href="#dado3" class='img-dado3'><img src="assets/images/dados/dado3.png" width="35" height="35" alt="img3"></a>
                </div>
                <div class="row col-dado">
                  <a href="#dado4" class='img-dado4'><img src="assets/images/dados/dado4.png" width="35" height="35" alt="img4"></a>
                </div>
                <div class="row col-dado">
                  <a href="#dado5" class='img-dado5'><img src="assets/images/dados/dado5.png" width="35" height="35" alt="img5"></a>
                </div>
                <div class="row col-dado">
                  <a href="#dado6" class='img-dado6'><img src="assets/images/dados/dado6.png" width="35" height="35" alt="img6"></a>
                </div>
              </div>
              <input type="hidden" name="rand_user" class="form-control rand_user">
          </div>
          <div class='form-group form-dado-group'>
            <div class="return_dado_rate text-primary">
            
            </div>
          </div>
          <div class='form-group form-dado-group'>
            <div class='return_dado text-light float-right'>
            
            </div>
          </div>
           <div class='form-group form-dado-group'>
            <div class='return_dado_rand text-light float-left'>
            
            </div>
          </div>
          <hr>
          <div class='form-group form-dado-group group-btn'>
            <button type="button" class="btn btn-sm btn-primary j-dado">
              Jogar dado(s) ↺
            </button>
          </div>
          <div class='result_dado float-right'>
            
          </div>
      </div>
    </form>
    <div id="main" class="position-relative overflow-hidden text-center bg-light">
      <div class="col-md pv-click" style="position: fixed; z-index: 1000; width:80px; overflow: auto;">
        <div class='text-light col-md-12 mpv small'>Chat</div>
        <a href="#" class="att_chat_num" style="display: none;"><?php num_pv_rows(); ?></a>
        <a href="#" class="att_chat_num_old" style="display: none;"><?php num_pv_rows(); ?></a>
        <a href="#" class="att_chat_num_s" style="display: none;"><?php num_pv_rows_s(); ?></a>
        <a href="#" class="att_chat_num_old_s" style="display: none;"><?php num_pv_rows_s(); ?></a>
        <div class="box_list_sms text-center">
          <div class='list_pv' style="min-height: 150px;">
            <?php list_user_chat(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-12 p-lg-5 mx-auto"> <!-- my-5 -->
        <h1 class="display-4 font-weight-normal ">Bet 6 Coin</h1><blockquote>Crypto coin GAME <i class="fas fa-dice-six"></i></blockquote>
        <div class='row return_action_sk'></div>
        <p class="lead font-weight-normal text-color"><?php user_return(); ?>.</p>
       	<div class="container-fluid">
       	<div class="row" style=" z-index: 1000; margin: 5px 5px;">
	    	<img src="assets/images/lightonoff.png" width="35" height="35" class='luzon bg-link text-light' style="display:none;">
        <img src="assets/images/lightonoff.png" width="35" height="35" class='luzoff text-color'>
    	  <button type='button' class='deposit btn bg-dark text-light'><i class="fas fa-cart-plus"></i>Deposito</button>
        <button type='button' class='withdraw btn bg-dark text-light'><i class="fas fa-cart-arrow-down"></i>Retirada</button>
        <button type="button" class='btn btn-light btn-not'><i class="far fa-bell text-primary"></i></button>
      
        <div class='col btn-tk-user'>
          <button class='btn btn-outline-primary btn-tk-user btn-tk-user-o' type="button">Tickets abertos</button>
          <button class='btn btn-outline-success btn-tk-user btn-open-tk' type="button">Criar tickets</button>  
          <button class='btn btn-primary btn-sk-user btn-open-sk float-right' type="button">Skills</button>
        </div>
 
      </div>
       		<a href="#" style="display: none;" class='amountu'><?php echo amountu(); ?></a>
          <div class='col-md box-skills' style="display: none; margin: 2px 0px 5px 0px;">
              <div class='c_skills col-md-12'>
                <div class='return_buy_skill'></div>
                <div class='col-md sk-box'>
                    <div class='sk-buy box-skill1 bg-success'>
                      <p>Skill 2x + up leves</p>
                      <p>2 valido por 2 dias</p>
                      <div class='col text-center'>
                        <a href="#" class='price-1 text-light' rel='0.01'>0,01 BTC</a>
                      </div>
                      <button class='btn btn-outline-light btn-sk-1' type='button'>Comprar</button>
                    </div>
                </div>
                <div class='col-md sk-box'>
                    <div class='sk-buy box-skill2 bg-warning'>
                      <p>Skill 10% + win</p>
                      <p>valido por 7 dias</p>
                      <div class='col text-center'>
                        <a href="#" class='price-2 text-light' rel='0.10'>0,10 BTC</a>
                      </div>
                      <button class='btn btn-outline-light btn-sk-2' type='button'>Comprar</button>
                    </div>
                </div>
                <div class='col-md sk-box'>
                    <div class='sk-buy box-skill3 bg-primary'>
                      <p>Skill 15% + win</p>
                      <p>valido por 7 dias</p>
                      <div class='col text-center'>
                        <a href="#" class='price-3 text-light' rel='0.15'>0,15 BTC</a>   
                      </div>
                      <button class='btn btn-outline-light btn-sk-3' type='button'>Comprar</button>
                    </div>
                </div>
                <div class='col-md sk-box'>
                    <div class='sk-buy box-skill4 bg-dark'>
                      <p class='text-light'>Skill 25% + win</p>
                      <p class='text-light'>valido por 7 dias</p>
                      <div class='col text-center'>
                        <a href="#" class='price-4 text-light' rel='0.25'>0,25 BTC</a>   
                      </div>
                      <button class='btn btn-outline-light btn-sk-4' type='button'>Comprar</button>
                    </div>
                </div>
                 <div class='col-md sk-box'>
                    <div class='sk-buy box-skill5 bg-dado1'>
                      <p class='text-light'>Dado(s) Bet</p>
                      <p class='text-light'>1 Bet / dado</p>
                      <p>Max bet: <a href='#'>0.10 BTC</a></p>
                      <div class='col text-center'>
                        <a href="#" class='price-5 text-light' rel='0.05'>0,05 BTC</a>   
                      </div>
                      <button class='btn btn-outline-light btn-sk-5' type='button'>Comprar</button>
                    </div>
                </div>
                 <div class='col-md sk-box'>
                    <div class='sk-buy box-skill6 bg-dado2'>
                      <p class='text-primary'>Dado(s) Bet</p>
                      <p class='text-primary'>1 Bet / dado</p>
                      <p>Max bet: <a href='#' class='text-success'>0.25 BTC</a></p>
                      <div class='col text-center'>
                        <a href="#" class='price-6 text-primary' rel='0.13'>0,13 BTC</a>   
                      </div>
                      <button class='btn btn-outline-success btn-sk-6' type='button'>Comprar</button>
                    </div>
                </div>
              </div>
          </div>
       		<blockquote style="height: 110px;" class="bg-light text-color">
       			Amount: <div class="amount text-warning"> </div></blockquote>
       		 <p class="more-btc bg-light"></p>
       		<input type="text" name="bet" class="bet form-control col-md-4 p-lg-1 mx-auto my-2" placeholder="0.00000001">
            <input type="hidden" name="beta" class="beta form-control col-md-4 p-lg-1 mx-auto my-2">
          <div class="col-md"><input type="text" name="bet_rolls" value="" id="bet_rolls" class="bet_rolls form-control col-md-4 p-lg-1 mx-auto my-2" placeholder="Number / rolls">
          <div class="return_add">
            
          </div>
          <button type="button" class="btn btn-small btn-success add_rolls">Set / Add rolls</button></div>
	       	<a class="btn btn-light text-sec" id="betm" href="#a">BET +</a>
	       	<a class="btn btn-light" id="betl" href="#a">BET -</a>
	       	<a class="btn btn-link" id="betall" href="#a">BET ALL</a>
          <button type='button' id="btn-bets-co" class="btn btn-primary btn-bets-co">></button>
          <!--<button type='button' id="btn-bets-di" class="btn btn-primary btn-di"></button>-->
          <button type='button' id="btn-bets-dados" class="btn btn-primary btn-bets-dados">Jogar Dados ↺</button>
          <button type='button' class="btn btn-dark set-rolls">Set Rolls</button>
	       	<hr>
	       	<a href="#" class="rate"></a>
	       	<div class="porcent-rate text-success"></div>
	       	 <a class="btn btn-success betnow" href="#bet">BET</a>
	        <a class="btn btn-danger stopnow" href="#stop" onclick="stopBet()">STOP</a>
	        <a class="btn bg-sec text-light betnow-autobet" href="#auto">AUTO BET</a>
	        <a class="btn bg-sec text-light bet-reload" href="#reload" style="margin-bottom: 3px;">RELOAD</a><br>
	       	<a class="btn btn-outline-dark" id="x1" href="#betx1">90% WIN</a>
	        <a class="btn btn-outline-dark" id="x2" href="#betx2">75% WIN</a>
	        <a class="btn btn-outline-dark" id="x3" href="#betx3">50% WIN</a>
	        <a class="btn btn-outline-dark" id="x4" href="#betx4">33% WIN</a>
	        <a class="btn btn-outline-dark" id="x5" href="#betx5">25% WIN</a>
	        <a class="btn btn-outline-dark" id="x6" href="#betx6">10% WIN</a>
       	</div><hr>
        <button type='button' id="btn-inc-win" class="btn-inc-win btn btn-outline-primary ">Inc/Bet win</button>
        <button type='button' id="btn-inc-lose" class="btn-inc-lose btn btn-outline-danger ">Inc/Bet lose</button>
        <div class="col">
          <input type="number" name="inc-bet-win" value="" id="inc-win" class="inc-win form-control col-md-4 p-lg-1 mx-auto my-2" placeholder="incrase bet % win" >
          <input type="number" name="inc-bet-lose" value="" id="inc-lose" class="inc-lose form-control col-md-4 p-lg-1 mx-auto my-2" placeholder="incrase bet % lose">
          <button type='button' id="btn-inc-now-win" class="btn-inc-now-win btn btn-outline-success ">Inc Now </button>
          <button type='button' id="btn-inc-now-lose" class="btn-inc-now-lose btn btn-outline-success ">Inc Now </button>
          <p class="return_inc"></p>
        </div>
      </div>
      <button type='button' class='chat btn bg-sec text-light'><i class="far fa-comment-alt"></i>CHAT</button>
      <button type='button' class='transf btn bg-sec text-light'>Transferencia <i class="fas fa-handshake"></i></button>
    <div class="row cc">
      <div class="product-device box-shadow d-none d-md-block"></div>
      <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
    </div>
    <div class="col-md-11">
      <!-- rolls status -->
      <div class='return_rate' style='display:none;'>
        
      </div>
      <div class='return_rate_num' style="display: none;">
        
      </div>
       <div class='status-bets' style='float: right;'>
         
       </div>
       <div class='return-skill' style='display: none;'>
         <?php get_skill_rate(); ?>
       </div><!-- rolls status -->
       <div class='return_bets_status' style="display: none;">
         
       </div>
       <div class='bonus_col'>
        
       </div>
    </div>
    <div class="col">
        <div class="bg-dark card col-md-3 col-md chatbox" style="position: absolute; display: none; z-index: 1000; height: 500px; position: fixed; margin: -850px 18px;">
        <div class="row" style="padding: 0px 13px;">
           <ul>
            <li>
              <a href="#" class="text-light close-chat-box"><i class="fas fa-angle-down"></i>ₓ</a>
            </li>
            <!--<li>
              <a href="#" class="text-light chat-tools open-tolls"><i class="fas fa-cog"></i>☼</a>
            </li>-->
             <li style="position: absolute; float: right;">
             ON: <?php user_on(); ?>
            </li>
          </ul>
        </div>
        <div class="box-sms" style="height: 90%;">
          <?php return_sms_list(); ?>
        </div>
        <div class="return_sms">
          
        </div>
        <div class="row emoji-list">
            <ul style="margin: 0px auto !important;">
              <li id='1'>
                <a href='#' class="emoji-list-a" title="a"><img src="assets/images/icon/alien.png" width="20" height="20" alt="alien emoji"></a>
              </li>
              <li id='2'>
                  <a href='#' class="emoji-list-a" title="an"><img src="assets/images/icon/angry.png" width="20" height="20" alt="angry emoji"></a>
              </li>
              <li id='3'>
                  <a href='#' class="emoji-list-a" title="h"><img src="assets/images/icon/happy.png" width="20" height="20" alt="happy emoji"></a>
              </li>
               <li id='4'>
                 <a href='#' class="emoji-list-a" title="l"><img src="assets/images/icon/laughing.png" width="20" height="20" alt="laughing emoji"></a>
              </li>
               <li id='5'>
                  <a href='#' class="emoji-list-a" title="s"><img src="assets/images/icon/sad.png" width="20" height="20" alt="sad emoji"></a>
              </li>
              <li id='6'>
                  <a href='#' class="emoji-list-a" title="se"><img src="assets/images/icon/secret.png" width="20" height="20" alt="secret emoji"></a>
              </li>
              <li id='7'>
                  <a href='#' class="emoji-list-a" title="t"><img src="assets/images/icon/thinking.png" width="20" height="20" alt="thinking emoji"></a>
              </li>
              <li id='8'>
                  <a href='#' class="emoji-list-a" title="poo"><img src="assets/images/icon/poo.png" width="20" height="20" alt="poo emoji"></a>
              </li>
              <li id='9'>
                  <a href='#' class="emoji-list-a" title="s"><img src="assets/images/icon/smart.png" width="20" height="20" alt="smart emoji"></a>
              </li>
              <li id='10'>
                  <a href='#' class="emoji-list-a" title="k"><img src="assets/images/icon/kiss.png" width="20" height="20" alt="kiss emoji"></a>
              </li>
              <li id='11'>
                  <a href='#' class="emoji-list-a" title="d"><img src="assets/images/icon/dead.png" width="20" height="20" alt="dead emoji"></a>
              </li>
               <li id='12'>
                  <a href='#' class="emoji-list-a" title="m1"><img src="assets/images/icon/mari1.jpg" width="20" height="20" alt="mari1 emoji"></a>
              </li>
               <li id='13'>
                  <a href='#' class="emoji-list-a" title="m2"><img src="assets/images/icon/mari.png" width="20" height="20" alt="mari emoji"></a>
              </li>
            </ul>
        </div>
        <form class="form" method="post" name="sendSms" style="width: 100%; bottom: 0px !important;">
          <input type="hidden" name="iduser" value="<?php user_id(); ?>">
           <button type="button" class="btn btn-sm btn-success btn-send float-right">Enviar</button>
          <input type="text" name="sendsms" class="sms text-primary form-control" placeholder="Sua mensagem aqui"  style="width: 80%;">
        </form>
      </div>
      <div class="col-status col-md-12 bg-light" id="<?php my_rolls(); ?>">

        <nav class='nav-rolls'>
          <ul>
            <li>
              <a href="#mybets" class='text-success text-center bets-status'>Bets status</a>
            </li>
            <li>
               <a href="#global" class='text-success text-center bets-global'>global</a>
            </li>
            <li>
               <a href="#high" class='text-success text-center bets-high'>high</a>
            </li>
          </ul>
        </nav>
        <div class="col-md status-rolls"  style="max-height: 400px; overflow: auto;">
       
        </div>
        <div class="dv-rolls-high" id="<?php high_bets(); ?>"></div>
        <div class="dv-rolls-global" id="<?php global_bets(); ?>"></div>

        <div class="col-md status-rolls-global" style="max-height: 400px; overflow: auto; display: none;">
       
        </div>
        <div class="col-md status-rolls-high" style="max-height: 400px; overflow: auto; display: none;">
       
        </div>
      </div>
      <!-- exit code chat -->
    </div>

    <div class="modal modal-profile"  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-primary">Perfil </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="returnProfile">
            
          </div>
        </div>
         <!--<div class="return_sms_pv" style="max-height: 200px; overflow: auto !important;">
            
        </div> -->
        <div class='return_pv'></div>
        <div class="modal-footer">
            <div class='col-md'><button class='btn btn-primary float-right btn-sms' type='button'>Enviar sms</button></div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <div class="modal modal-pv"  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-primary">Chat </h5>
          <div class='status-pv-user row' style="margin-left: 72%;"></div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="return_sms_pv" style="max-height: 200px; overflow: auto !important;">
            
            </div> 
            <form class='form col-md' name='chat-pv'>
                <div class='form-group'>
                  <input type="hidden" name="id-receive-pv" class="id-receive-pv">
                  <input type="text" name="sms-pv1" placeholder="Escreva aqui ..." class='form-control sms-pv1 text-primary'>
                </div>
                <!--<div class='form-group'>
                  <button class='btn btn-primary' type='button'>Enviar</button>
                </div>-->
            </form>
        </div>

        <div class='return_pv'></div>
        <div class="modal-footer">
            <div class='col-md'><button class='btn btn-primary float-right btn-sms1' type='button'>Enviar sms</button></div>
        </div>
      </div>
    </div>
    </div>
  </div>
    <!-- start modals dep / with -->
  <div class="modal modal-dep" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title">Deposit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php return_deposit_form(); ?>
      </div>
      <div class="modal-footer">
        <button class='deposit-make btn btn-success'>Make deposit</button>
        <button type="button" class="close-sec btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    </div>
  </div>

  <div class="modal modal-with" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title">Retirada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php return_withdraw_form(); ?>
      </div>
      <div class="modal-footer">
        <button class='withdraw-make btn btn-success'>Make withdraw</button>
        <button type="button" class="close-sec btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    </div>
  </div>

  <div class="modal modal-deposit-list" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title">Deposit list</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class='dep-list'>
          <?php return_deposit_list(); ?>
        </div>
        <div class='box-status-deposit' style='float: left;'>
            <?php status_total_deposit(); ?>
        </div>
        <div class='box-btn' style='float: right !important;'>
          <button type='button' class='btn btn-outline-primary small v_page_dep' style='float:left !important;'>< Voltar</button>
          <button type='button' class='btn btn-outline-primary small p_page_dep' style='float:right !important;'>Avançar ></button>
        </div>
      </div>
      <div class="modal-footer">
        <!--<button class='withdraw-make btn btn-success'>Make withdraw</button>
        <button type="button" class="close-sec btn btn-secondary" data-dismiss="modal">Cancel</button>-->
      </div>
    </div>
    </div>
   
  </div>
  <div class="modal modal-withdraw-list" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary">Withdraw list</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="with-list">
            <?php return_with_list(); ?>
          </div>
          <div class='box-btn' style='float: right !important;'>
            <button type='button' class='btn btn-outline-primary small v_page_with' style='float:left !important;'>< Voltar</button>
            <button type='button' class='btn btn-outline-primary small p_page_with' style='float:right !important;'>Avançar ></button>
          </div>
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        </div>
      </div>
    </div>
  </div>


  <div class="modal modal-wallet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary">Add wallet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" method="post" name="form_add_wallet">
              <div class='form-group'>
                  <label>Address</label>
                  <input type="text" name="wallet" class='form-control wallet text-success' placeholder="Ex: Bk21kfKoW1F3f3FLGoe321caT1">
              </div>
              <div class='form-group'>
                <div class="return_add_wallet">
                  
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
         <div class='box-btn' style='float: right !important;'>
            <button type='button' class='btn btn-outline-primary small btn_add_wallet' style='float:left !important;'>Add</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal modal-tk-o" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary">Tickets abertos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php tickets_enviados_client(); ?>
        </div>
        <div class="modal-footer">
         <div class='box-btn' style='float: right !important;'>
            <button type='button' class='btn btn-outline-primary small v_page_out' style='float:left !important;'>< Voltar</button>
            <button type='button' class='btn btn-outline-primary small p_page_out' style='float:right !important;'>Avançar ></button>
          </div>
        </div>
      </div>
    </div>
  </div>

   <div class="modal modal-transf-list" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary">Extrato saida/ Transferencias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="box-out">
              <?php return_transf_list(); ?>
          </div>
        </div>
        <div class="modal-footer">
           <div class='box-btn' style='float: right !important;'>
            <button type='button' class='btn btn-outline-primary small v_page_out' style='float:left !important;'>< Voltar</button>
            <button type='button' class='btn btn-outline-primary small p_page_out' style='float:right !important;'>Avançar ></button>
          </div>
          <!--<button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        </div>
      </div>
    </div>
  </div>

  <div class="modal modal-not" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary">Notificaçoes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="box-out" style="height: 300px; overflow: auto !important;">
              <?php return_not(); ?>
          </div>
        </div>
        <div class="modal-footer">
           <div class='box-btn' style='float: right !important;'>
            <button type='button' class='btn btn-outline-primary small v_page_out' style='float:left !important;'>< Voltar</button>
            <button type='button' class='btn btn-outline-primary small p_page_out' style='float:right !important;'>Avançar ></button>
          </div>
          <!--<button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        </div>
      </div>
    </div>
  </div>

   <div class="modal modal-transf-list-in" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary">Extrato entrada / Transferencias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="box-in">
              <?php return_transf_list_in(); ?>
          </div>
        </div>
        <div class="modal-footer">
           <div class='box-btn' style='float: right !important;'>
            <button type='button' class='btn btn-outline-primary small v_page_in' style='float:left !important;'>< Voltar</button>
            <button type='button' class='btn btn-outline-primary small p_page_in' style='float:right !important;'>Avançar ></button>
          </div>
          <!--<button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        </div>
      </div>
    </div>
  </div>


   <div class="modal modal-transf" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary">Transferencia entre contas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form form-transf" method="post" name="form-transf">
            <div class="form-group">
                <label class="text-success">Login / Doador</label>
                <input type="text" name="login" class="form-control login-transf" value="<?php user_id_login(); ?>" disabled>
            </div>
             <div class="form-group">
                <label class="text-success">Login / Destinatario</label>
                <input type="text" name="login-receive" class="form-control login-receive text-primary" placeholder="Login a receber">
            </div>
             <div class="form-group">
                <label class="text-success">Valor</label>
                <input type="text" name="amount" class="form-control amount-transf text-primary" placeholder="Ex: 0.001">
                <p>Saldo a utilizar: <a href="#" class="amount_acc"><?php amountu(); ?></a></p>
            </div>
             <div class="form-group">
               <div class="return_transf"></div>
            </div>
             <div class="form-group">
                <button class="btn btn-success btn-transf" type="button">Transf now</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        </div>
      </div>
    </div>
  </div>

          <div class="modal modal-create-ticket" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-primary">Registre seu ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="ticket-line">
                  <form class="form" method="post" name="create_ticket">
                    <div class="form-group">
                        <label>Login</label>
                        <input class="form-control user_send" type="text" name="user_send" value="<?php user_id_login(); ?>" disabled>
                    </div>
                     <div class="form-group">
                        <label>Assunto:</label>
                        <input class="form-control assunto_tk" type="text" name="assunto_tk" placeholder="Qual sua duvida ou problema">
                    </div>
                     <div class="form-group">
                        <label>Pergunta:</label>
                        <textarea class="form-control text-success pergunta_tk" placeholder="Digite sua pergunta aqui."></textarea>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <div class="return_ticket_r">
                  
                </div>
                <button type="button" class="btn btn-primary btn-enviar-ticket">Enviar</button>
                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
              </div>
            </div>
          </div>
        </div>
  <!-- end modals dep / with -->

    <footer class="container-fluid bg-sec">
      <div class="row">
        <div class="col-12 col-md">
         <img src="assets/images/text4144.png" height="40" width="120" alt="6bet" style="margin: 2% 0px;">
        
         <circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
          <small class="d-block mb-3 text-light ">&copy; 2017-2018</small>
          <?php echo date("h:i:sa"); ?>
        </div>
        <div class="col-6 col-md">
          <h5>Status</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-light link-dep" href="#">Deposit list</a></li>
            <li><a class="text-light link-with" href="#">Withdraw list</a></li>
            <li><a class="text-light link-transf" href="#">Transf / out list</a></li>
             <li><a class="text-light link-transf-in" href="#">Transf / in list</a></li>
            <!--<li><a class="text-light link-bets" href="#">Bets list</a></li>-->
            <li><a class="text-dark link-logout" href="#">Logout</a></li>
            <!--<li><a class="text-light" href="#">Another one</a></li>
            <li><a class="text-light" href="#">Last time</a></li>-->
          </ul>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script type="text/javascript" src="assets/js/scripts.js"></script>
   
    <!--<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>-->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
