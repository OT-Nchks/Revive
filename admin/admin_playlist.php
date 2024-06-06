
<?php
session_start();
require_once "partials/admin_header.php";
require_once "classes/Tracks.php";

$tracks =new Tracks();
$track = $tracks->fetch_tracks();

/*echo "<pre>";
print_r($categories);
echo "</pre>"; */
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
    a{
        color:#fff;
    }
    main.table {
        width: 76vw;
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
        width: 30%;
        height: 100%;
        background-color: #fff5;
        padding: 0 .8rem;
        border-radius: 2rem;
        font-size:10px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: .2s;
    }

    .table__header .input-group:hover {
        width: 40%;
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
        max-height: calc(88% - 1.2rem);
        background-color: #fffb;
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
        padding: 0.60rem;
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
        background-color: #fff6 !important;
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

    .status {
        padding: .3rem .3rem;
        border-radius: 1rem;
        text-align: center;
    }

    .status.edit {
        background-color: #86e49d;
        color: #006b21;
    }

    .status.delete {
        background-color: #d893a3;
        color: #b30021;
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


  <div class="container p-5 align-center">
   
   <section class="music" id="main2" style="margin-top:7rem; margin-left:18rem;">
         
          <div class="tab__content tab__content--active">

            
            <a href="admin_addmusic.php"><i class="ri-arrow-right-s-line" style="border:2px solid white; border-radius:50%; padding:3px; font-weight:600; margin-left:1rem;"></i></a>
            <h5 style="font-size:20px; margin-left:1rem;" class="card__title">Upload / Add Playlist</h5>
                        
              <br><br>


              <main class="table" id="playlists_table">
        <section class="table__header" style="font-size:16px;">
            <h1>All Playlists</h1>
            <div class="input-group">
                <input type="search" placeholder="search playlists...">
                <img src="assets/images/search.png" alt="">
            </div>

            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="assets/images/pdf.png" alt=""></label>
                    <!-- <label for="export-file" id="toCSV">CSV <img src="assets/images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="assets/images/excel.png" alt=""></label> -->
                </div>
            </div>
        </section>


        <section class="table__body">
            <table>
                <thead style="font-size:13px;">
                    <tr>
                        <!-- <th>S/N</th> -->
                        <th> Playlist Name</th>
                        <th> Track Name</th>
                        <th> Artist</th>
                        <th> Audio</th>
                        <th> Duration</th>
                        <th> Category </th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>

         
   
        <!--TO DISPLAY THE TRACKS WITH THE IMAGES ON A TABLE-->
        <?php
        if(is_array($track)){
            $counter = 1;
            foreach($track as $t){
                $T=$counter++;
        ?>
        <tr>
            <!-- <th><?php echo $T; ?></th> -->
            <td><?php echo $t['playlist_name']; ?></td>
            <td><img src="uploads/imageupload/<?php echo $t['track_image'];?>" width="50"> <?php echo $t['track_name']; ?></td>
            <td><?php echo $t['track_artist']; ?></td>
            <!-- <td></td> -->
            <td><?php echo $t['track_audio']; ?></td>
            <td><?php echo $t['track_duration']; ?></td>
            <td><strong><?php echo $t['cat_name']; ?><strong></td>
            <td>
                <a href="edit_tracks.php?id=<?php echo $t['track_id']; ?>" class="status edit">Edit</a> 
                <a onclick="return confirm('Are you sure you want to delete?')" href="deletetracks.php?id=<?php echo $t['track_id']; ?>" class="status delete">Delete</a>
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>










</section>
    </main>
    <script src="assets/script.js"></script>
   </body>
</html>