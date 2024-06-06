<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="keywords" content="Sleep, Insomnia, Sleep App, Sleep Tracking, Meditation, Mental health, Mindfulness, Stress and Anxiety"/>
	<meta name="description" content="Revive is designed to provide comprehensive support and guidance for individuals struggling with insomnia. Leveraging cutting-edge technology and evidence-based techniques, Revive aims to empower users to understand, manage, and improve their sleep patterns effectively."/>
	<meta name="author" content="Revive"/>

    <title>Revive | Your Personal Sleep Companion | Awaken Your Vitality. </title>

    <link rel="icon" href="../assets/images/favicon-revive.png" type="image/png">
    <link href="../assets/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    
    		<!--google fonts link-->
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
<style>
*{
  box-sizing: border-box;
}
:root{
    --brown: rgba(165, 155, 148, 0.4); 
    --blue:rgb(146, 159, 179);
}
       
body{
background-image: url("../assets/images/compic.jpg");
background-repeat: no-repeat;
background-position: center;
background-size:cover;
height:100vh;
}
 .header{
display:flex;
z-index:1000;
display: block;
}

.revive-logo{
max-width:160px;
height:auto;
}

 .banner{
 display: flex;
position:relative;
height:100vh;
overflow: hidden;
}
 
.reviewc{  
align-items: center;
background:var(--brown);
backdrop-filter: blur(12px);
border: 2px solid var(--brown);
border-radius: 20px;
box-shadow: 0 0 10px 2px rgba(100, 100, 100, 0.1);
overflow: hidden;
z-index:100;
 transition:height .2s ease;
 font-family:poppins;
}

.blank{
height:200px;
}

li .icon{
position: relative;
padding-right:1.1rem;
align-items: center;
font-size:1.3em;
color:#f5d348;
line-height: 27px;
}

.clientname{
 text-align: center;
font-family:poppins;
}


ul {
display: flex;
list-style: none;
}

ul li {
padding-left: 10px;
}

article p {
font-size: 15px;
font-weight: 100;
margin-bottom: 1rem;
font-family: system-ui;
text-align: center;
color:white;
}
.btn1{
width:100%;
height:45px;
background:rgb(91, 116, 139);
border:none;
 border-radius:20px;
cursor:pointer;
font-size:1.1em;
color:white;
font-weight:500;
font-family: poppins;
}
.btn1:hover{
background:rgb(101, 123, 144);
font-size:1.1em;
font-weight:500;
transition: .4s ease-in-out;
}

@media screen and (max-width: 991px) {
    .reviewc {
        padding: 20px;
    }
    .clientname {
        font-size: 18px;
    }
    .icon {
        font-size: 10px;
        padding-right:2rem;
    }
    .review {
        font-size: 14px;
    }
    .btn1 {
        font-size: 14px;
    }
}

@media screen and (max-width: 768px) {
    .reviewc {
        padding: 20px;
        margin:15px;
        width:95%;
    }
    .clientname {
        font-size: 18px;
    }
    .icon {
        font-size: 18px;
    }
    .review {
        font-size: 14px;
    }
    .btn1 {
        font-size: 14px;
    }
}

@media screen and (max-width: 568px) {
    .clientname {
        font-size: 16px;
    }
    .icon {
        font-size: 16px;
    }
    .review {
        font-size: 12px;
    }
    .btn1 {
        font-size: 14px;
    }
    .blank{
        height:120px;
    }
}

@media screen and (max-width: 320px) {
    .blank{
        height:200px;
    }
    .clientname {
        font-size: 14px;
    }
    .icon {
        font-size: 14px;
    }
    .review {
        font-size: 10px;
    }
    .btn1 {
        font-size: 12px;
    }
}
</style>
</head>
<body>

            <div class="revive main-container">

                <!--NAV SECTION-->
                            
                                    <div class="row header">
                                            <div class="col-2 revive-logo">
                                                    <a href="index.php"><img src="../assets/images/logo.PNG" class="revive-logo"/></a>
                                            </div>
                                            <div class="col-10"></div>
                                    </div>
                                  
                            <!--REVIEW SECTION-->
                            <div class="row blank"></div>
                            <div class="row">
                                        <div class="col-4"></div>
                                        <div class="col-4 reviewc animate__animated animate__fadeInUp" id="review">
                                            <div class="row">
                                                <div class="col clientname text-center">
                                                    <span style="font-size:20px; font-weight:600;color:#eee;">Oscar Innocent</span><br>
                                                
                                               <div class="align-center mx-5 px-5"> <ul>
                                                    <li><ion-icon name="star" class="icon"></ion-icon></li>
                                                    <li><ion-icon name="star" class="icon"></ion-icon></li>
                                                    <li><ion-icon name="star" class="icon"></ion-icon></li>
                                                    <li><ion-icon name="star" class="icon"></ion-icon></li>
                                                    <li><ion-icon name="star" class="icon"></ion-icon></li></div>
                                                </ul><hr style="border:1px solid white; opacity:0.6;">
                                            </div>
                                            <article>
                                                <p class="review px-4 animate__animated animate__fadeInUp" style="font-size:15px;">"As someone who struggles with insomnia, Revive has been a game-changer for me. The sleep tracking feature helps me understand my sleep patterns better, and the personalized recommendations have made a significant difference in my sleep quality. Thank you, Revive!"</p> 
                                            </article>
                                        </div>
                                        <div class="col-4"></div>
                                
                            </div></div>
                            
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                        <button type="submit" id="btnsubmit"class="btn1 my-4 animate__animated animate__fadeInUp">Continue</button>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
 
            </div>



            <script src="../assets/js/jquery.min.js"></script>
            <script>
                document.getElementById("btnsubmit").addEventListener("click", function() {
    window.location.href = "payment.php";
});
            </script>
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>