<?php
session_start();
require_once "admin_guard.php";
require_once "partials/admin_header.php";
require_once "classes/Admin.php";

$admin1= new Admin();
$admin_details = $admin1->get_current_admin($_SESSION["adminonline"]);

if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];
    $admin = new Admin();
    $admin_details = $admin->get_current_admin($admin_id);

    if (!$admin_details) {
        echo "Error: User not found.";
        exit();
    }
}

if (isset($_SESSION['errormessage'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['errormessage'] . "</div>";
    unset($_SESSION['errormessage']); 
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
                <a href="admin_profiletab.php"><i class="ri-arrow-left-s-line nav__link" style="border:2px solid white; border-radius:50%; padding:3px; font-weight:600;"></i></a>
                <h4 class="card__title">Account Details</h4>
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

                              if(isset($_SESSION['errormsg'])&& is_array($_SESSION['errormessage'])){
                               echo "<div class='alert alert-danger-var'>". $_SESSION['errormessage'] ."</div>";
                                unset( $_SESSION['errormessage']);
                                }
                              ?>

                <div class="input-box">
                    <form class="form-container" id="updateForm" method="post" action="../process/process_updateadmin.php">
                        <div class="row" style="margin-top:1rem;">
                            <label for="firstname">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($admin_details['admin_username']);?>"/>
                        </div>

                        <div class="row" style="margin-top:0.8rem;">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" name="email" value="<?php echo htmlspecialchars($admin_details['admin_email']);?>" />
                        </div>

                            <input type="hidden" class="form-control" name="id" value="<?php echo $admin_details['admin_id'];?>"/>
                        

                        <div style="margin-top:2rem;">
                            <button type="submit" class="submit btn btn-info" id="updateBtn" name="updateBtn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>



