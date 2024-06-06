<?php
session_start();
require_once "admin_guard.php";
require_once "partials/admin_header.php";
require_once "classes/Admin.php";


#instantiate the class
$admin1= new Admin();

$adminData = $admin1->get_admin_by_id($_SESSION["adminonline"]);

if (!empty($adminData)) {

    if (isset($adminData[0]["admin_username"])) {
        $username = ucfirst($adminData[0]["admin_username"]);
    } else {
        $username = "Unknown";
    }
} else {
    $username = "Unknown";
}
?>


<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: montserrat;
    }

    @media print {
    .table, .table__body {
    overflow: visible;
    height: auto !important;
    width: auto !important;
    }
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size:13px;
    }

    main.table {
        width: 74vw;
        height: 40vh;
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        color:rgb(90, 72, 52);
        overflow: hidden;
        margin-left:1rem;
        
    }

    .table__header {
        width: 100%;
        height: 20%;
        background-color: rgba(104, 87, 60, 0.267);
        padding: .7rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size:13px;
    }

    .table__header .input-group {
        width: 15%;
        height: 100%;
        background-color: #fff5;
        padding: 0 .8rem;
        border-radius: 2rem;
        font-size:12px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: .2s;
    }

    .table__header .input-group:hover {
        width: 20%;
        background-color: #fff8;
        box-shadow: 0 .1rem .4rem #0002;
    }
    button{
    background:none;
    font-weight:600;
    cursor:pointer;
    color:rgb(95, 65, 50);
    }
    .table__header .input-group img {
        width: 1.2rem;
        height: 1.2rem;
    }

    .table__header .input-group input {
        width: 100%;
        padding: 0 .5rem 0 .3rem;
        background-color: transparent;
        border: none;
        outline: none;
    }

    .table__body {
        width: 98%;
        max-height: calc(79% - 1.2rem);
        background-color: rgb(220, 225, 220,0.6);
        margin: .65rem auto;
        border-radius: .6rem;
        overflow: auto;
        overflow: overlay;
    }


    .table__body::-webkit-scrollbar{
        width: 0.5rem;
        height: 0.5rem;
    }

    .table__body::-webkit-scrollbar-thumb{
        border-radius: .5rem;
        background-color: #0004;
        visibility: hidden;
    }

    .table__body:hover::-webkit-scrollbar-thumb{ 
        visibility: visible;
    }


    table {
        width: 100%;
        font-size:11px;
    }

    td img {
        width: 36px;
        height: 36px;
        margin-right: .5rem;
        border-radius: 50%;
        vertical-align: middle;
    }

    table, th, td {
        border-collapse: collapse;
        padding: 0.85rem;
        text-align: left;
    }

    thead th {
        position: sticky;
        top: 0;
        left: 0;
        background-color: #b4ab9bfe;
        cursor: pointer;
        text-transform: capitalize;
    }

    tbody tr:nth-child(even) {
        background-color: #0000000b;
    }

    tbody tr {
        --delay: .1s;
        transition: .5s ease-in-out var(--delay), background-color 0s;
    }

    tbody tr.hide {
        opacity: 0;
        transform: translateX(100%);
    }

    tbody tr:hover {
        background-color: #fffb !important;
    }

    tbody tr td,
    tbody tr td p,
    tbody tr td img {
        transition: .2s ease-in-out;
    }

    tbody tr.hide td,
    tbody tr.hide td p {
        padding: 0;
        font: 0 / 0 sans-serif;
        transition: .2s ease-in-out .5s;
    }

    tbody tr.hide td img {
        width: 0;
        height: 0;
        transition: .2s ease-in-out .5s;
    }

    /*form*/
    #main2 {
    row-gap: 1.5rem;
    margin-inline: 1.5rem;
    margin-top: -1rem;
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

        textarea{
        height: 85px;
        width: 90%;
        border-radius: 7px;
        outline: none;
        border: 1px solid rgb(145, 125, 112);
        padding: 0 10px;
        background: rgba(145, 125, 112, 0.381); 
        color:rgb(210, 210, 210, 0.881); 
        font-size: 13.5px;
        }
        textarea::placeholder{
        color:rgb(180, 180, 180); 
        font-size: 13.5px;
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
            width:90%;
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
        /*form ends*/

    @media (max-width: 1000px) {
        td:not(:first-of-type) {
            min-width: 12.1rem;
        }
    }

    thead th span.icon-arrow {
        display: inline-block;
        width: 1.3rem;
        height: 1.3rem;
        border-radius: 50%;
        border: 1.4px solid transparent;
        
        text-align: center;
        font-size: 1rem;
        
        margin-left: .5rem;
        transition: .2s ease-in-out;
    }

    thead th:hover span.icon-arrow{
        border: 1.4px solid #90bcde;
    }

    thead th:hover {
        color: #a9e5ff;
    }

    thead th.active span.icon-arrow{
        background-color: transparent;
        color: #90bcde;
    }

    thead th.asc span.icon-arrow{
        transform: rotate(180deg);
    }

    thead th.active,tbody td.active {
        color: #90bcde;
    }
</style>
<body>




      

      <!--DASHBOARD SECTION -->
      <main class="main">

         <!--BANNER SECTION-->
         <div class="tab__content tab__content--active" data-tab="1">
         <section class="banner">
            <article class="banner__card">
               <a href="#" class="banner__link">
                  <img src="assets/images/adminbanner1.jpg" alt="image" class="banner__img">
                  <div class="banner__shadow"></div>
   
                  <div class="banner__data">
                  <h2 class="animate__animated animate__fadeInUp banner__title" id="greeting">Welcome, <?php echo $username?>!</h2>
                     <span class="banner__category"></span>
                  </div>
               </a>
            </article>
         </section>

        <br><br><br><br>


      <!----- REGISTERED USERS TABLE STARTS HERE ----->
<main class="table" id="playlists_table">
        <section class="table__header" style="font-size:16px;">
            <h1>New Users</h1>
            <div class="input-group">
                <button><a href="userstab.php">View All Users</a></button>
            </div>
        </section>


        <section class="table__body">
            <table>
                <thead style="font-size:13px;">
                    <tr>
                        <th>S/N</th>
                        <th> Full Name</th>
                        <th> Email</th>
                        <th> Gender</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>


    <?php
    $users = new Admin();
    $result = $users->fetch_recent_users();
    $sn =1;
    foreach($result as $r){
?>
   
        <tbody>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $r['user_fname']." ".$r['user_lname']; ?></td>
                <td><?php echo $r['user_email']; ?></td>
                <td><?php echo $r['user_gender']; ?></td>
                <td><?php echo $r['state_name']; ?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
</section>
    </div>



    <!--NOTIFICATION FORM-->
<section id="main2">
        <div class="row" style="margin-top:3rem;">
            <button style="background:#e0dacd; padding:0.6rem; border-radius:0.7rem;">Add Notification</button>

            <div class="input-box">
                <form method="post" id="frm" class="form-container">
                    <div style="margin-top:1rem;">
                        <textarea name="comm" id="comm" class="form-control" rows="9" placeholder="comment here"></textarea>

                        <div class="row" style="margin-top:1rem;">
                            <button type="submit" id="submit" class="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
      </main>





<script src="../assets/dashboard/assets/js/swiper-bundle.min.js"></script>
<script src="../assets/dashboard/assets/js/main.js"></script>
<script src="..assets/jquery.js"></script>
<script src="../assets/font-awesome/js/all.min.js"></script>



<script>
      /*---GREETING BASED ON TIME---*/
    function getGreeting() {
    const currentTime = new Date();
    const currentHour = currentTime.getHours();
    
    if (currentHour >= 1 && currentHour < 12) {
        return "Good morning";
    } else if (currentHour >= 12 && currentHour < 17) {
        return "Good afternoon";
    } else {
        return "Good evening";
    }
    }
    
    // Get the greeting message
    const greeting = getGreeting();
    
    // Updating the banner to include the greeting
    document.getElementById('greeting').innerText = `${greeting}, Admin <?php echo $username?>!`;

</script>

<script>
    document.getElementById('submit').addEventListener('click', function(e) {
        e.preventDefault();

        let userInput = document.getElementById('comm').value;
        if (userInput.trim() === "") {
            alert("Comment cannot be empty");
            return;
        }

        let insert_xhr = new XMLHttpRequest();
        insert_xhr.open('POST', 'insert.php', true);

        insert_xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        insert_xhr.onreadystatechange = function() {
            if (insert_xhr.readyState === 4) {
                if (insert_xhr.status === 200) {
                    try {
                        let get_data = JSON.parse(insert_xhr.responseText);
                        if (get_data.status === 'added') {
                            alert("Notification added");
                            document.getElementById('comm').value = ''; // Clear the textarea after successful insertion
                        } else {
                            alert("Failed to add notification");
                        }
                    } catch (e) {
                        alert("Error parsing JSON response: " + e.message);
                    }
                } else {
                    alert("Request failed with status: " + insert_xhr.status);
                }
            }
        };

        let formdata = "msg=" + encodeURIComponent(userInput);
        insert_xhr.send(formdata);
    });
</script>     

   </body>
</html>