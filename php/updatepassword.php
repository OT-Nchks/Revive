<?php
session_start();
require_once "user_guard.php";
require_once "../partials/dashboard_header.php";
require_once "../classes/User.php";

$user1= new User();
$user_details = $user1->get_current_user($_SESSION["useronline"]);

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $user = new User();
    $user_details = $user->get_current_user($user_id);

    if (!$user_details) {
        echo "Error: User not found.";
        exit();
    }
}

?>


<style>
        body{
            font-family:poppins, sans-serif;
        }
        fieldset{
        margin-top:2rem;
        font-size:14px;
        padding:1rem;
        margin:1rem;
        }
        .alert-danger-var{
    color:#FF5B61;
    font-size:13.5px;
    border:1px solid #FF5B61;
    background: #FFD7DD;
    border-radius:10px;
    padding:10px 10px 10px 10px;
    justify-content: center;
    margin-bottom: 10px;
    }
    .alert-success-var{
    color:rgb(35, 119, 42);
    font-size:13.5px;
    border:1px solid rgb(153, 206, 154);
    background: rgb(153, 206, 154);
    border-radius:10px;
    padding:10px 10px 10px 10px;
    justify-content: center;
    margin-bottom: 10px;
    }
        #main2 {
    row-gap: 1.5rem;
    margin-inline: 1.5rem;
    margin-top: -1rem;
    }
    

        .row{
        width:  350px;
        height:auto;
        border-radius: 10px;
        border: 2px solid rgba(141, 127, 117,0.2);
        background:rgba(145, 125, 112, 0.1); 
        backdrop-filter: blur(9px);
        padding-top: 0px;
        box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.2);
        z-index:100;
        }
    
        p{
            font-weight: 400;
            font-size: 12px;
            color:#d7cdbb;
        }
        .right{
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        
        }
        .input-box{
        width: 330px;
        box-sizing: border-box;
        }

        .form-control{
            display: flex;
            flex-direction: column;
            position: relative;
            padding: 35px 4px 0 10px;  
            border-bottom: 2px solid #e0dacf;
        }
    input{
            height: 60px;
            width: 100%;
            font-size:14px;
            background: gray;
            opacity:0.5;
            border: none;
            border-radius: 10px;
            border-bottom: 1px solid #e0dacf;
            outline: none;
            margin-bottom: 1px;
            color:white;
        }

    
        label{
            position: absolute;
            color:#fff;
            top: 10px;
            left: 10px;
            font-size:11px;
            pointer-events: none;
            transition: .5s;
            padding-bottom:5rem;
            margin-bottom:2rem;
            z-index:1;
        }

        .form-control input:focus ~ label
        {
            top: -10px;
            font-size: 13px;
        }
        .form-control input:valid ~ label
        {
        top: -10px;
        font-size: 13px;
        }
        .form-control:focus, .form-control:valid{
            border-bottom: 1px solid #93b2d7;
        }

        .submit{
            width:100%;
            border: none;
            outline: none;
            height: 45px;
            color:white;
            background: #93b2d7d7;
            border-radius: 20px;
            transition: .4s;
            font-size:14px;
        }
        .submit:hover{
            opacity: 0.8;
            font-weight: 600;
            color: #fff;
        }
        .copyright{
            text-align: center;
        }
        
    
    
        @media only screen and (max-width: 768px){
    
            .text{
            position: absolute;
            top: 70%;
            text-align: center;
            }
            p, i{
                font-size: 12px;
            }
            .form-container header{
            font-size:24px;
            }
            .row{
            max-width:500px;
            width: 100%;
            height:auto;
            }
            fieldset{
            font-size:12px;
            }
        .copyright{
            text-align: center;
        }
        .flex{
            font-size:14px;
        }
        }
</style>


<main class="main">
    <!----- ASSESSMENT FORM STARTS HERE ----->
    <section class="music" id="main2" style="margin-bottom:-1rem;">
        <div class="tab__content tab__content--active" data-tab="6">
            <div class="flex">
                <a href="profiletab.php"><i class="ri-arrow-left-s-line nav__link" style="border:2px solid white; border-radius:50%; padding:3px; font-weight:600;"></i></a>
                <h4 class="card__title">Change Password</h4>
            </div>

            <div class="container">

                            <?php
                              if(isset($_SESSION['errormessage'])&& is_array($_SESSION['errormessage'])){
                                $err = $_SESSION['errormessage'];
                                foreach($err as $er){
                                  echo "<div class ='alert alert-danger-var'>".$er."</div>";
                                }
                                unset($_SESSION['errormessage']);
                              }
                              ?>


                <div class="input-box">
                    <form class="form-container" id="updateForm" method="post" action="../process/process_updatepwd.php">
                            <div class="row" style="margin-top:1rem;">
                            <label for="current_password">Current Password</label>
                            
                            <input type="password" class="form-control" id="currentPassword" name="current_password" />
                            <!-- <i class="fa fa-eye" aria-hidden="true" id="togglePassword"></i> -->
                             </div>

                            <div class="row" style="margin-top:1rem;">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="newPassword" required />
                            <div class="invalid-feedback" id="newPasswordError"></div>
                            </div>

                            <div class="row" style="margin-top:1rem;">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirmPassword" required />
                            <div class="invalid-feedback" id="confirmPasswordError"></div>
                            </div>

                            <input type="hidden" class="form-control" name="id" value="<?php echo $user_details['user_id'];?>"/>
                        

                        <div style="margin-top:2rem;">
                            <button type="submit" class="submit btn btn-info" id="updateBtn" name="updateBtn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>



