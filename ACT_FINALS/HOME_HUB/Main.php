<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
     <!-- ........................GOOGLE FONTS........................ -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
<!-- ........................FONTAWESOME........................ -->

<script src="https://kit.fontawesome.com/9621c36e01.js" crossorigin="anonymous"></script>
<!-- ........................JQUERY........................ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      :root{
        --Orange: #ffa31a;
        --gray: #808080;
        --dark-gray: #292929;
        --black: #1b1b1b;
        --white: #ffffff;
        --green: #4CAF50;
        --red: #e74c3c;
        --Roboto: 'Roboto', sans-serif;
        --Rcond: 'Roboto Condensed', sans-serif;
      }
      * {
          font-family: var(--Roboto);
          margin: 0;
          padding: 0;
        
      }
      body{
        background-color: var(--black);
        display: flex;
        flex-direction: column;
      
      }

      hr{
        border-color: var(--black);
      }
      .nav{
        color: var(--white);
        width: 100vw;

      }
      .logo{

        justify-content: center;
        align-items: center;
        display: flex;
        gap: 20px;
        padding: 5px;
        
      }
      .text{ display: flex;
        gap: 20px;
        padding: 5px;
        font-size: 40px;
        font-weight: 700;
        color: #fff;
       
      }
      .text i {
        
        font-weight: 700;
        font-size: 40px;
        height: 40px;
        width: 40ox;
      }
      .home{
        padding: 5px;
      }
      .hub{
        padding: 5px;
      }
      .hub:hover{
        color: var(--black);
        background-color: #ffa31a;
      
        border-radius: 10px;
      }
      
      .content{

        display: flex;
        
        align-items: center;
        justify-content: space-around;
        margin-top: 50px;
      }

      .door{
        height: 500px;
        width: 300px;
        background-color: var(--gray);
        padding-top: 50px;
        border-radius: 183.5px 183.5px 34px 34px;
        margin-bottom: 20px;
      }
      .door div{
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .doorHeader{
        flex-direction: column;
        height: 50%;
        gap: 20px;
      }

      .doorIcon{
        width: 150px;
        height: 150px;
        background-color: var(--white);
        border-radius: 50%;
      }
      
      .doorIcon i{
        font-size: 50px;
      }

      .doorText{
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 20px;
      }

      .doorFooter{
        margin-top: 20px;
        flex-direction: column;
        font-size: 20px;
        font-weight: 500;
      }

      .statusWrap{
        display: flex;
    
        gap: 20px;
        margin-top: 10px;
      }

      .span{
        width: 150px;
        height: 10px;
        background-color: var(--green);
        border-radius: 10px;
      }
      .conWrap{
        display: flex;
        gap: 10px;
      }


      
      .doorFooter div{
        margin-top: 10px;
      }
      .indicator{
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 1px black solid;
        background-color: var(--green);
      }

      .indicator i{
        font-size: 10px;
      }

      .unlockedBtn, .lockedBtn , .buttonON, .buttonOFF{
  
        padding: 15px 25px;
        display: block;
        font-weight: bold;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px #999;
        width: 100px;
        background-color: var(--Orange);
      }



      /* .lockedBtn {
        display: block;
      } */
      .lockedBtn:hover {background-color: #c0392b}
      .lockedBtn:active {
        background-color: #3e8e41;
        box-shadow: 0 1px #666;
        transform: translateY(4px);
      }
        
      /* .unlockedBtn {

      display: block;

      } */
      .unlockedBtn:hover {background-color: #3e8e41;}

      .unlockedBtn:active {
        background-color: #c0392b;
        box-shadow: 0 1px #666;
        transform: translateY(4px);
      }
      .buttonON:hover{
background-color: #3e8e41;
      }
      .buttonOFF:hover{
background-color: #c0392b;
      }
      

      .btns{
        display: flex;
        gap: 20px;
      }

      
    </style>
  </head>
  <body>

  <div class="nav">
    <div class="logo">
      <div class="text"><i class="fa-solid fa-house"></i><div class="home">Home</div><div class="hub">Hub</div></div>
    </div>
  </div>
  <div class="content">


<div class="door">
<div class="doorHeader">
  <div class="doorIcon"><i class="fa-solid fa-door-open"></i></i></div>
  <div class="doorText">Front Door</div>
  <h2 id="status" style="color:#6f4a8e;">Loading Sensor</h2>
<p id="getStatus" hidden></p>

</div>
<hr>
<div class="doorFooter">

  <div class="statusWrap">
  <div class="statusTag">Status:</div>
  <div class="status" id="doorStat"></div>
  </div>
  <div class="span" id="spanInd"></div>

    
    <form action="updateDB.php" method="post" id="LOCK_ON" onsubmit="myFunction()">
      <input type="hidden" name="Stat" value="1"/>    
    </form>
    
    <form action="updateDB.php" method="post" id="LOCK_OFF">
      <input type="hidden" name="Stat" value="0"/>
    </form>
    
    <div class="btns">
    <button class="lockedBtn" name= "subject" type="submit" form="LOCK_ON" value="SubmitLEDON" id="lock_Btn">Unlock</button>
    <button class="unlockedBtn" name= "subject" type="submit" form="LOCK_OFF" value="SubmitLEDOFF" id="unlock_Btn">Lock</button>  

    

    </div>  
</div>
</div>

<!-- --------------------------------------------------------------------- -->

<div class="door">
<div class="doorHeader">
  <div class="doorIcon"><i class="fa-solid fa-lightbulb"></i></div>
  <div class="doorText">Light</div>
</div>
<hr>
<div class="doorFooter">

  <div class="statusWrap">
  <div class="statusTag">Status:</div>
  <div class="status" id="ledStat"></div>
  </div>
  <div class="span" id="ledSpanInd"></div>

  
  <form action="updateLED.php" method="post" id="LED_ON">
      <input type="hidden" name="ledState" value="1"/>    
    </form>
    
    <form action="updateLED.php" method="post" id="LED_OFF">
      <input type="hidden" name="ledState" value="0"/>
    </form>
    <div class="btns">
    <button class="buttonON" name= "subject" type="submit" form="LED_ON" value="SubmitLEDON" id="lightOnBtn">LED ON</button>
    <button class="buttonOFF" name= "subject" type="submit" form="LED_OFF" value="SubmitLEDOFF" id="lightOffBtn">LED OFF</button>   
    </div>
  </div>

    
    

    </div>  
</div>
</div>








  </div>



    <!-- --------------------------------------------------------------- -->

    
  </body>

  

<script src="jquery.min.js"></script>
<script>
  $(document).ready(function(){
     $("#getStatus").load("StatContainer.php");
    setInterval(function() {
      $("#getStatus").load("StatContainer.php");
    }, 500);
  });
</script>


<script>
  var myVar = setInterval(myTimer, 500);
  function myTimer() {
    var getStat = document.getElementById("getStatus").innerHTML;
    var Status = getStat;
    if (Status == 1) {
      document.getElementById("status").innerHTML = "Door Opened";
    }
    if (Status == 0) {
      document.getElementById("status").innerHTML = "Door Closed";
    }
    if (Status == "") {
      document.getElementById("status").innerHTML = "Waiting Sensor";
    }
  }
</script>  
<?php
  $Write="<?php $" . "updateStatus=''; " . "echo $" . "updateStatus;" . " ?>";
  file_put_contents('StatContainer.php',$Write);
?>


<script>
  var ajax = new XMLHttpRequest();
  var method = "GET";
  var url = "d_data.php";
  var async = true;

  ajax.open(method, url, async);

  ajax.send();

  ajax.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      // alert(this.responseText);
      var data = JSON.parse(this.responseText);
      console.log(data);

      
      var lockPin = data[0].Stat;
      var ledState = data[0].ledState;
     

        

const doorStat = document.getElementById("doorStat");
const doorCon = document.getElementById("doorCon");

const lockBtn = document.getElementById("lock_Btn");
const unlockBtn = document.getElementById("unlock_Btn");
const onBtn = document.getElementById("lightOnBtn");
const offBtn = document.getElementById("lightOffBtn");
const ledStat = document.getElementById("ledStat");

const span = document.getElementById("spanInd");
const ledSpan = document.getElementById("ledSpanInd");




if (lockPin == 1){
  doorStat.innerHTML="Unlocked";
  span.style.backgroundColor="#e74c3c";
  lockBtn.style.display="none";
}
else if (lockPin == 0){
  doorStat.innerHTML="Locked";
  span.style.backgroundColor="#4CAF50";
  unlockBtn.style.display="none";
}


if(ledState == 1){
  ledStat.innerHTML="ON";
  onBtn.style.display= "none";
  ledSpan.style.backgroundColor="#4CAF50";
}
else if(ledState == 0){
  ledStat.innerHTML="OFF";
  offBtn.style.display= "none";
  ledSpan.style.backgroundColor="#e74c3c";
}

    }
    
  }


</script>
</html>

