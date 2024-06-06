
<?php
require_once "partials/admin_header.php";
require_once "classes/Admin.php";
?>

<link rel="stylesheet" href="assets/style2.css">
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
        height: 90vh;
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
        height: 10%;
        background-color: rgba(104, 87, 60, 0.267);
        padding: .7rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size:13px;
    }

    .table__header .input-group {
        width: 35%;
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
        width: 45%;
        background-color: #fff8;
        box-shadow: 0 .1rem .4rem #0002;
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

    .export__file {
        position: relative;
    }

    .export__file .export__file-btn {
        display: inline-block;
        width: 2rem;
        height: 2rem;
        background: #fff6 url(assets/images/export.png) center / 80% no-repeat;
        border-radius: 50%;
        transition: .2s ease-in-out;
    }

    .export__file .export__file-btn:hover { 
        background-color: #c0b0a2;
        transform: scale(1.15);
        cursor: pointer;
    }

    .export__file input {
        display: none;
    }

    .export__file .export__file-options {
        position: absolute;
        right: 0;
        
        width: 12rem;
        border-radius: .5rem;
        overflow: hidden;
        text-align: center;

        opacity: 0;
        transform: scale(.8);
        transform-origin: top right;
        
        box-shadow: 0 .2rem .5rem #0004;
        
        transition: .2s;
    }

    .export__file input:checked + .export__file-options {
        opacity: 1;
        transform: scale(1);
        z-index: 100;
    }

    .export__file .export__file-options label{
        display: block;
        width: 100%;
        padding: .6rem 0;
        background-color: #f2f2f2;
        
        display: flex;
        justify-content: space-around;
        align-items: center;

        transition: .2s ease-in-out;
    }

    .export__file .export__file-options label:first-of-type{
        padding: 1rem 0;
        background-color: #a3d1e4 !important;
    }

    .export__file .export__file-options label:hover{
        transform: scale(1.05);
        background-color: #beb8ae;
        cursor: pointer;
    }

    .export__file .export__file-options img{
        width: 2rem;
        height: auto;
    }

</style>
<body>


      
<main class="main">
<!----- REGISTERED USERS TABLE STARTS HERE ----->
<main class="table" id="playlists_table">
        <section class="table__header" style="font-size:16px;">
            <h1>Registered Users</h1>
            <div class="input-group">
                <input type="search" placeholder="search users...">
                <img src="assets/images/search.png" alt="">
            </div>

            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="assets/images/pdf.png" alt=""></label>
                </div>
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
    $result = $users->fetch_users();
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
         <!----- REGISTERED USERS TABLE ENDS HERE ----->



         
         </div>
        <!--logout modal button-->
         <div id="logoutModal" class="modal">
            <div class="modal-content">
                <span class="close" id="close">&times;</span>
                <p class="modal-text">Are you sure you want to logout?</p>
                <div class="modal-buttons">
                    <button id="confirmLogout">Yes</button>
                    <button id="cancelLogout">No</button>
                </div>
            </div>
         <!--logout modal button-->
</main>




        <script src="assets/script.js"></script>
      <script src="../assets/dashboard/assets/js/main.js"></script>
     
   </body>
</html>