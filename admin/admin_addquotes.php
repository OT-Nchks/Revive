<?php
session_start();
require_once "partials/admin_header.php";
require_once "classes/Quotes.php";

$quote = new Quotes();
$categories = $quote->fetch_quotecategories();

?>


   
<style>

   *{
    padding: 0;
    margin: 0;
        box-sizing: border-box;
    }

    body{
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
        background: url(bg-image.jpg);
        background-size: cover;
        font-family:josefin sans;
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
    .container{
        width: 100%;
        max-width: 550px;
        border: 2px solid rgba(141, 127, 117,0.2);
        background:rgba(145, 125, 112, 0.381); 
        backdrop-filter: blur(9px);
        padding: 28px;
        margin: 0 28px;
        border-radius: 10px;
        box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.2);
    }

    .form-title{
        font-size: 24px;
        font-weight: 600;
        font-family:montserrat;
        text-align: center;
        padding-bottom: 6px;
        color: white;
        text-shadow: 2px 2px 2px rgb(141, 127, 117);
        border-bottom: solid 1px white;
    }

    .main-user-info{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px 0;
    }

    .user-input-box:nth-child(2n){
        justify-content: end;
    }

    .user-input-box{
        display: flex;
        flex-wrap: wrap;
        width: 50%;
        padding-bottom: 15px;
    }

    .user-input-box label{
        width: 95%;
        color: white;
        font-size: 13px;
        font-weight: 400;
        margin: 5px 0;
        font-family:montserrat;
    }

    .user-input-box input{
        height: 35px;
        width: 90%;
        border-radius: 7px;
        outline: none;
        border: 1px solid rgb(145, 125, 112);
        padding: 0 10px;
        background: rgba(145, 125, 112, 0.381); 
        color:rgb(45, 45, 45, 0.681); 
        font-size: 13.5px;
    }
    .user-input-box textarea{
        height: 85px;
        width: 90%;
        border-radius: 7px;
        outline: none;
        border: 1px solid rgb(145, 125, 112);
        padding: 0 10px;
        background: rgba(145, 125, 112, 0.381); 
        color:rgb(45, 45, 45, 0.681); 
        font-size: 13.5px;
    }

    .form-submit-btn input{
        cursor: pointer;
    }

    .form-submit-btn{
        margin-top: 7px;
    }

    
    .btn{
      display: block;
        border:2px solid #93826c;
          background:linear-gradient(125deg, #a79c85, #86b2ce, #a79c85); 
          box-shadow: inset 0 3px 5px rgba(107, 99, 82, 0.325);
          color:#fff;
          border-radius:10px;
          width: 100%;
          padding:7px 70px 7px 70px;
      }
      .btn:hover{
        color:#fff;
          font-weight:600;
          transition:0.5s;
      }
      #category{
        height: 35px;
        width: 90%;
        border-radius: 7px;
        outline: none;
        border: 1px solid rgb(145, 125, 112);
        padding: 0 10px;
        background: rgba(145, 125, 112, 0.381); 
        color:rgb(45, 45, 45, 0.881); 
        font-family: montserrat;
        font-size: 13px;
      }


    @media(max-width: 600px){
        .container{
            min-width: 280px;
            width: 80%;
        }

        .user-input-box{
            margin-bottom: 12px;
            width: 100%;
        }

        .user-input-box:nth-child(2n){
            justify-content: space-between;
        }

        .main-user-info{
            max-height: 380px;
            overflow: auto;
        }

        .main-user-info::-webkit-scrollbar{
            width: 0;
        }
    }

</style>   
      
    
   <main>


   <section class="music" id="main2" style="margin-top:6rem;">
            <div class="tab__content tab__content--active" data-tab="6">

            <a href="admin_quotelist.php"><i class="ri-arrow-left-s-line nav__link" style="border:2px solid white; border-radius:50%; padding:3px; font-weight:600;"></i></a>
            <h4 class="card__title" style="font-family:montserrat; font-size:19px;">View Quotes</h4>

            
        <!--FORM STARTS HERE-->

<div class="container">
      <h2 class="form-title" style="font-family:montserrat;">Add Quotes</h2>
      <form action="process/process_addquote.php" method="post" enctype="multipart/form-data" id="uploadForm">

      <?php

        if(isset($_SESSION["admin_errormessage"]) && !is_array($_SESSION["admin_errormessage"])){
                echo "<div class='alert alert-danger-var'>".$_SESSION["admin_errormessage"]. "</div>";
            
            unset($_SESSION["admin_errormessage"]);
        }
        ?>
            <div class="main-user-info">
          <div class="user-input-box">
            <label for="author">Author</label>
           <input type="text" name="author" id="author">
          </div>

          

          <div class="user-input-box">
            <label for="category">Category</label>

          <select name="category" id="category">
           <option value="">Select One</option>

           <?php
           foreach($categories as $QC){
           
               $QC_name = $QC["qcat_name"];
               $QC_id =$QC["qcat_id"];

               echo "<option value='$QC_id'>$QC_name</option>";
           }
            ?>
          </select>
          </div>
          
          <div class="user-input-box">
          <label for="message">Message</label>
           <textarea name="message" id="message" rows="9" placeholder="input quote..."></textarea>
          </div>

        <div class="user-input-box">
        <label for="customFile">Upload Cover Image</label>
           <input type="file" class="form-control" name="imagefile" id="customImgFile">
          </div>
        </div>
        
        <div class="form-submit-btn">
        <button type="submit" name="addBtn" value="upload" class="btn"><span style="color:#fff; font-family:poppins;">Add Quote</span></button>
        </div></div>
      </form>
    </div>
          </div>
</main>
</section>

          

     <script src="../assets/dashboard/assets/js/main.js"></script>
     <script src="../assets/font-awesome/js/all.min.js"></script>
     
  </body>
</html>