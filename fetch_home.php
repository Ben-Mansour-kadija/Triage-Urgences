<?php
include("db_connect.php");
if(isset($_COOKIE['userid'])&&$_COOKIE['useremail']){
	
	$userid=$_COOKIE['userid'];
$useremail=$_COOKIE['useremail'];          
				                     
						  
}
$date= date("d-m-y");
$sqluser ="SELECT * FROM tbl_patients ";
                 $retrieve = mysqli_query($db,$sqluser);
                $patients = mysqli_num_rows($retrieve);
				
				 $sql ="SELECT * FROM tbl_patients WHERE Gender='Female' ";
                 $retr = mysqli_query($db,$sql);
				 //$tcount1=0;$tcount2=0;$tcount3=0;$tcount4=0;$tcount5=0;$tcount6=0;$tcount7=0;
				 $females=0;
				while($found = mysqli_fetch_array($retr))
	            {   
              	   $dob= $found['DOB'];
				   
				             $year=date('y');
			                 $month=date('m');       //todays month
			                 $todayyear='20'.$year;   //this give me todays year
			              
			                 $bornmnth= substr($dob,5,2); //this gives me the born month			   
		                     $bornyear = substr($dob,0,4); //this gives me the born year			  
			               if($month>=$bornmnth)
			                 {			  	
			  	                $age=$todayyear-$bornyear;
			                 }
			             else{
			  	 				 $aged=$todayyear-$bornyear;
						   				  $age=$aged-1;
			                  }
			           if($age>=18){
			           	               $females=$females+1;
			                       }
				}	
				$sql ="SELECT * FROM tbl_patients WHERE  Gender='Male' ";
                 $retr = mysqli_query($db,$sql);
				 //$tcount1=0;$tcount2=0;$tcount3=0;$tcount4=0;$tcount5=0;$tcount6=0;$tcount7=0;
				 $males=0;
				while($found = mysqli_fetch_array($retr))
	            {   
              	   $dob= $found['DOB'];
				   
				             $year=date('y');
			                 $month=date('m');       //todays month
			                 $todayyear='20'.$year;   //this give me todays year
			              
			                 $bornmnth= substr($dob,5,2); //this gives me the born month			   
		                     $bornyear = substr($dob,0,4); //this gives me the born year			  
			               if($month>=$bornmnth)
			                 {			  	
			  	                $age=$todayyear-$bornyear;
			                 }
			             else{
			  	 				 $aged=$todayyear-$bornyear;
						   				  $age=$aged-1;
			                  }
			           if($age>=18){
			           	               $males=$males+1;
			                       }
				}	    
				$sql ="SELECT * FROM tbl_patients WHERE Gender='Male' ";
                 $retr = mysqli_query($db,$sql);
				 //$tcount1=0;$tcount2=0;$tcount3=0;$tcount4=0;$tcount5=0;$tcount6=0;$tcount7=0;
				 $mmales=0;
         $mmaless=0;

				while($found = mysqli_fetch_array($retr))
	            {   
              	   $dob= $found['DOB'];
				   
				             $year=date('y');
			                 $month=date('m');       //todays month
			                 $todayyear='20'.$year;   //this give me todays year
			              
			                 $bornmnth= substr($dob,5,2); //this gives me the born month			   
		                     $bornyear = substr($dob,0,4); //this gives me the born year			  
			               if($month>=$bornmnth)
			                 {			  	
			  	                $age=$todayyear-$bornyear;
			                 }
			             else{
			  	 				 $aged=$todayyear-$bornyear;
						   				  $age=$aged-1;
			                  }
			           if($age<=17){
			           	               $mmales=$mmales+1;
			                       }
                             if($age>=65){
                              $mmaless=$mmaless+1;
                         }
				}	       
				$sql ="SELECT * FROM tbl_patients WHERE Gender='Female' ";
                 $retr = mysqli_query($db,$sql);
				 //$tcount1=0;$tcount2=0;$tcount3=0;$tcount4=0;$tcount5=0;$tcount6=0;$tcount7=0;
				 $fmales=0;
         $fmaless=0;

				while($found = mysqli_fetch_array($retr))
	            {   
              	   $dob= $found['DOB'];
				   
				             $year=date('y');
			                 $month=date('m');       //todays month
			                 $todayyear='20'.$year;   //this give me todays year
			              
			                 $bornmnth= substr($dob,5,2); //this gives me the born month			   
		                     $bornyear = substr($dob,0,4); //this gives me the born year			  
			               if($month>=$bornmnth)
			                 {			  	
			  	                $age=$todayyear-$bornyear;
			                 }
			             else{
			  	 				 $aged=$todayyear-$bornyear;
						   				  $age=$aged-1;
			                  }
			           if($age<=17){
			           	               $fmales=$fmales+1;
			                       }
                             if($age>=65){
                              $fmaless=$fmaless+1;
                         }
				}	 	                      
				   $children=$fmales+$mmales;  
           $oldpeople=$fmaless+$mmaless;   
 
?>
                            
<style>
  
body { display: felx; -webkit-box-orient: vertical; 
-webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; }

.wrapper { display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-line-pack: center; align-content: center; }
body > p { font-family: "Satellite", "Roboto", sans-serif; 
font-size: 20px; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; 
justify-content: center; -ms-flex-line-pack: center; 
align-content: center; -webkit-box-align: center; -ms-flex-align: center;
 align-items: center; margin: 20px 40px; text-align: justify; }

.calendar { width: 1500px; height: 1500px; display: -webkit-box; 
display: -ms-flexbox; display: flex; -webkit-box-orient: vertical;
 -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; 
 font-family: "Satellite", "Roboto", sans-serif;
  border: 1px solid rgba(21, 21, 21, 0.12); -webkit-transform: scale(1); 
  transform: scale(1); box-shadow: 0px 0px 4px rgba(21, 21, 21, 0.21); 
  -ms-user-select: none; user-select: none; -moz-user-select: none; 
  -khtml-user-select: none; -webkit-user-select: none; -o-user-select: none; } .calendar.small { width: 370px; height: 370px; } .calendar.medium { width: 300px; height: 300px; } .calendar.large { width: 300px; height: 300px; } .year { width: calc(100% - 0px); display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; padding: 5px; font-size: 14px; } .year > span { -webkit-box-flex: 1; -ms-flex: 1; flex: 1; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-line-pack: center; align-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; text-transform: uppercase; } .year > div { cursor: pointer; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; -ms-flex-line-pack: center; align-content: center; } .month { width: calc(100% - 0px); display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; padding: 0px 5px; font-size: 40px; box-shadow: 0px 2px 6px rgba(21, 21, 21, 0.21); } .month > span { -webkit-box-flex: 1; -ms-flex: 1; flex: 1; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-line-pack: center; align-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; text-transform: uppercase; } .month > div { cursor: pointer; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; -ms-flex-line-pack: center; align-content: center; } .labels { width: 100%; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; } .labels > span { -webkit-box-flex: 1; -ms-flex: 1; flex: 1; font-size: 10px; text-transform: uppercase; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-line-pack: center; align-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; padding: 10px; } .days { -webkit-box-flex: 1; -ms-flex: 1; flex: 1; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; box-shadow: 0px 2px 6px -2px rgba(21, 21, 21, 0.21); } .row { width: 100%; -webkit-box-flex: 1; -ms-flex: 1; flex: 1; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; } .day { -webkit-box-flex: 1; -ms-flex: 1; flex: 1; padding: 2px; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; border-bottom: 1px solid rgba(21, 21, 21, .12); border-right: 1px solid rgba(21, 21, 21, .12); cursor: pointer; -webkit-transition: box-shadow 200ms ease-in-out; transition: box-shadow 200ms ease-in-out; } .day:last-child { border-right: none; } .day:hover { background-color: rgba(21, 21, 21, 0.012); box-shadow: inset 0px 0px 4px rgba(21, 21, 21, 0.21); } .day-radios { display: none; } .day-radios:checked + .day { background-color: rgba(21, 21, 21, 0.012); box-shadow: inset 0px 0px 4px rgba(21, 21, 21, 0.21); } .day > span { width: auto; font-size: 14px; color: rgba(21, 21, 21, 0.84); } .day.diluted { background-color: rgba(21, 21, 21, 0.021); box-shadow: inset 0px 0px 1px rgba(21, 21, 21, 0.12); } .day.diluted > span { width: auto; font-size: 12px; color: rgba(21, 21, 21, 0.73); }  .events { width: 300px; height: 300px; font-family: "Satellite", "Roboto", sans-serif; box-shadow: 0px 0px 4px rgba(21, 21, 21, 0.21); border: 1px solid rgba(21, 21, 21, 0.12); display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; -ms-user-select: none; user-select: none; -moz-user-select: none; -khtml-user-select: none; -webkit-user-select: none; -o-user-select: none; } .events.small { width: 200px; height: 200px; } .events.medium { width: 300px; height: 300px; } .events.large { width: 300px; height: 300px; } .date { width: calc(100% - 10px); display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; background-color: ' + this.calendar.colors[1] + '; color: ' + this.calendar.colors[3] + '; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; padding: 5px; font-size: 14px; } .date > span { -webkit-box-flex: 1; -ms-flex: 1; flex: 1; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-line-pack: center; align-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; text-transform: uppercase; } .date > div { cursor: pointer; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; -ms-flex-line-pack: center; align-content: center; } .rows { width: 100%; -webkit-box-flex: 1; -ms-flex: 1; flex: 1; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; overflow: hidden !important; } .list { width: 100%; -webkit-box-flex: 1; -ms-flex: 1; flex: 1; overflow-y: auto !important; padding: 0; margin: 0; color: rgba(21, 21, 21, 0.94); } .list > li { width: 100%; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; border-bottom: 1px solid rgba(21, 21, 21, 0.12); } .list > li:hover { box-shadow: inset 0px 0px 4px rgba(21, 21, 21, 0.21); } .list > li > div { display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-flex: 2; -ms-flex: 2; flex: 2; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; -ms-flex-line-pack: center; align-content: center; padding: 10px; border-right: 1px solid rgba(21, 21, 21, 0.12); } .time { font-size: 14px; } .m { font-size: 14px; text-transform: uppercase; padding-left: 5px; } .list > li > p { -webkit-box-flex: 4; -ms-flex: 4; flex: 4; margin: 10px; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: start; -ms-flex-pack: start; justify-content: flex-start; -webkit-box-align: center; -ms-flex-align: center; align-items: center; -ms-flex-line-pack: center; align-content: center; font-size: 18px; word-wrap: break-word; word-break: break-word; }
</style>
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="row-one widgettable">
			<div class="col-md-7 content-top-2 card" style="width:75%;height: 100%">
				<div class="agileinfo-cdr">
				
<style>


		/* Styles pour l'horloge */
		.clock {
		  width: 270px;
		  height: 270px;
		  position: absolute;
      top: -2%;
      left: 57%;
		  margin: 50px auto;
		}

		.clock-face {
		  position: absolute;
		  width: 100%;
		  height: 100%;
		  border-radius: 50%;
		  background: #fff;
		  box-shadow:
		    0 0 0 3px rgba(0,0,0,0.1),
		    0 0 10px rgba(0,0,0,0.2);
		}

		.hand {
		  width: 30%;
		  height: 6px;
		  position: absolute;
		  top: 48%;
      left: 20%;
		  transform-origin: 100%;
		  transform: rotate(90deg);
		  transition: all 0.05s;
		  transition-timing-function: cubic-bezier(0.1, 2.7, 0.58, 1);
		}

    

		.hour-hand {
		  background: Grey;
		  z-index: 1;
		}

		.minute-hand {
		  background: black;
		}

		.second-hand {
		  background: red;
		}


    .number {
  position: absolute;
  font-size: 20px;
  font-weight: bold;
  width: 20px;
  height: 20px;
  text-align: center;
  line-height: 20px;
  transform-origin: center;
}

.number-1 {
  top: 15%;
  left: 75%;
  transform: translate(-50%, -50%);
}
.number-2 {
  top: 30%;
  left: 85%;
  transform: translate(-50%, -50%);
}

.number-3 {
  top: 50%;
  left: 90%;
  transform: translate(-50%, -50%);
}

.number-4 {
  top: 72%;
  left: 85%;
  transform: translate(-50%, -50%);
}

.number-5 {
  top: 85%;
  left: 75%;
  transform: translate(-50%, -50%);
}

.number-6 {
  top: 90%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.number-7 {
  top: 85%;
  left: 25%;
  transform: translate(-50%, -50%);
}

.number-8 {
  top: 70%;
  left: 10%;
  transform: translate(-50%, -50%);
}

.number-9 {
  top: 50%;
  left: 5%;
  transform: translate(-50%, -50%);
}

.number-10 {
  top: 30%;
  left: 15%;
  transform: translate(-50%, -50%);
}

.number-11 {
  top: 15%;
  left: 25%;
  transform: translate(-50%, -50%);
}

.number-12 {
  top: 10%;
  left: 50%;
  transform: translate(-50%, -50%);
}



 
 </style>

<!-- Code pour le calendrier -->
<div id="calendarContainer"></div>

<!-- Code pour l'horloge -->
<div class="clock">
  <div class="clock-face">
    <div class="hand hour-hand"></div>
    <div class="hand minute-hand"></div>
    <div class="hand second-hand"></div>
  <div class="number number-1">1</div>
  <div class="number number-2">2</div>
  <div class="number number-3">3</div>
  <div class="number number-4">4</div>
  <div class="number number-5">5</div>
  <div class="number number-6">6</div>
  <div class="number number-7">7</div>
  <div class="number number-8">8</div>
  <div class="number number-9">9</div>
  <div class="number number-10">10</div>
  <div class="number number-11">11</div>
  <div class="number number-12">12</div>
  </div>
</div>


<!-- Script pour l'horloge -->
<script>
  function setDate() {
    const now = new Date();

    const seconds = now.getSeconds();
    const secondsDegrees = ((seconds / 60) * 360) + 90;
    const secondsHand = document.querySelector('.second-hand');
    secondsHand.style.transform = `rotate(${secondsDegrees}deg)`;

    const minutes = now.getMinutes();
    const minutesDegrees = ((minutes / 60) * 360) + ((seconds/60)*6) + 90;
    const minutesHand = document.querySelector('.minute-hand');
    minutesHand.style.transform = `rotate(${minutesDegrees}deg)`;

    const hours = now.getHours();
    const hoursDegrees = ((hours / 12) * 360) + ((minutes/60)*30) + 90;
    const hoursHand = document.querySelector('.hour-hand');
    hoursHand.style.transform = `rotate(${hoursDegrees}deg)`;
  }

  setInterval(setDate, 1000);
</script>


<style>
		.form-check-input[type="checkbox"] {
		  width: 2em;
		  height: 2em;
		  margin-top: 0.3em;
		  margin-left: 50%;
		  transform: translateX(-50%);
		}


    #b_1 {
  font-size: 30px;
  padding: 5px 5px;
  position: absolute;
  top: 41%;
  left: 62%;

}
.ma-classe-image {
  position: absolute;
  top: 55%;
  left: 15%;
  opacity: 0.07;
  width: 600px;
  height: 300px;

}


	</style>
  <style>
    .input-group-addon {
    font-size: 18px; /* ajustez la taille de la police selon votre préférence */
}

    </style>

<br><br><br>

<button type="button" class="btn btn-danger btn-lg"  id="b_1" data-toggle="modal" data-target="#staticBackdrop">
  		Can't Wait !
	</button>

	<div id="result-message"><?php  ?></div>
	<script>
    $('#b_1').on('click', function () {
  // désactiver le bouton
  $(this).prop('disabled', true);

  $.ajax({
    type : 'POST',
    url : "insert_patient.php",
    success : function(result) {
      $("#result-message").html(result);
    },
    complete: function() {
      // réactiver le bouton
      $('#b_1').prop('disabled', false);

      // supprimer l'événement click pour ne pas permettre de cliquer plusieurs fois
      $('#b_1').off('click');
    }
  });
});

  </script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>





<!--img src='CoeurECG.jpg' alt='Ma super image'class="ma-classe-image">-->
<img src='monimage1.png' alt='Ma super image'class="ma-classe-image">

					
						 <div id="calendarContainer"></div>
						  <!--<div id="organizerContainer" style="margin-left: 0px;"></div>-->
				     </div>
						
				</div>
			</div>

      
      
			<div class="col-md-3 stat">
				<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5 >Patients</h5>
					<label><?php echo$patients; ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
					<i class="fa fa-users fa-4x"></i>
				</div>
				 <div class="clearfix"> </div>
				</div>
        <div class="content-top-1" style="background-color:red" >
				<div class="col-md-6 top-content" >
					<h5 style="color:white">Being transferred</h5>
					<label><?php echo 15 ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
                <i class="fa fa-ambulance fa-4x"></i>
				</div>
				 <div class="clearfix"> </div>
				</div>
        <div class="content-top-1" style="background-color:skyblue">
				<div class="col-md-6 top-content" >
					<h5 style="color:white">Old people</h5>
					<label><?php echo$oldpeople; ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
                <i class="fa fa-user fa-4x"></i>
				</div>
				 <div class="clearfix"> </div>
				</div>
				<div class="content-top-1" style="background-color:orange">
				<div class="col-md-6 top-content" >
					<h5 style="color:white">Women</h5>
					<label><?php echo$females; ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
                <i class="fa fa-female fa-5x"></i>
				</div>
				 <div class="clearfix"> </div>
				</div>
				<div class="content-top-1" style="background-color:blue">
				<div class="col-md-6 top-content">
					<h5 style="color:white">Men</h5>
					<label><?php echo$males; ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
                    <i class="fa fa-male fa-5x" ></i>
				</div>
				 <div class="clearfix"> </div>
				</div>
				<div class="content-top-1" style="background-color:green">
				<div class="col-md-6 top-content">
					<h5 style="color:white">Children</h5>
					<label><?php echo$children; ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
					<i class="fa fa-child fa-5x"></i>
				</div>
				 <div class="clearfix"> </div>
				</div>
			</div>
			
			</div>
			
			<div class="clearfix"> </div>
		</div>
<div class="wrapper">






 
</div>
<script>
    /*
Full tutorial on how to use the Calendar Javascript Library

https://github.com/nizarmah/calendar-javascript-lib/blob/master/README.md
*/

function Calendar(id, size, labelSettings, colors) {
  this.id = id;
  this.size = size;
  this.labelSettings = labelSettings;
  this.colors = colors;

  months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]
  label = [ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" ];

  this.months = months;

  this.label = [];
  this.labels = []; 
  for (var i = 0; i < 7; i++)
    this.label.push(label[(label.indexOf(labelSettings[0]) + this.label.length >= label.length) ? Math.abs(label.length - (label.indexOf(labelSettings[0]) + this.label.length)) : (label.indexOf(labelSettings[0]) + this.label.length)]);
  for (var i = 0; i < 7; i++)
    this.labels.push(this.label[i].substring(0, (labelSettings[1] > 3) ? 3 : labelSettings[1]));

  this.date = new Date();

  this.draw();
  this.update();
}

Calendar.prototype.constructor = Calendar;

Calendar.prototype.draw = function () {
  backSvg = '<svg style="width: 24px; height: 24px;" viewBox="0 0 24 24"><path fill="' + this.colors[3] + '" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z"></path></svg>';
  nextSvg = '<svg style="width: 24px; height: 24px;" viewBox="0 0 24 24"><path fill="' + this.colors[3] + '" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"></path></svg>';

  theCalendar = document.createElement( "DIV");
  theCalendar.className = "calendar " + this.size;

  document.getElementById(this.id).appendChild(theCalendar);

  theContainers = [], theNames = [ 'year', 'month', 'labels', 'days' ];
  for (var i = 0; i < theNames.length; i++) {
    theContainers[i] = document.createElement( "DIV");
    theContainers[i].className = theNames[i];

    if (theNames[i] != "days") {
      if (theNames[i] != "month") {
        theContainers[i].style.backgroundColor = this.colors[1];
        theContainers[i].style.color = this.colors[3];

        if (theNames[i] != "labels") {
          backSlider = document.createElement("DIV");
          backSlider.id = this.id + "-year-back";
          backSlider.insertAdjacentHTML('beforeend', backSvg);
          theContainers[i].appendChild(backSlider);
          
          theText = document.createElement("SPAN");
          theText.id = this.id + "-" + theNames[i];
          theContainers[i].appendChild(theText);
          
          nextSlider = document.createElement("DIV");
          nextSlider.id = this.id + "-year-next";
          nextSlider.insertAdjacentHTML('beforeend', nextSvg);
          theContainers[i].appendChild(nextSlider);
        }
      } else {
        theContainers[i].style.backgroundColor = this.colors[0];
        theContainers[i].style.color = this.colors[2];

        backSlider = document.createElement("DIV");
        backSlider.id = this.id + "-month-back";
        backSlider.insertAdjacentHTML('beforeend', backSvg);
        theContainers[i].appendChild(backSlider);
        
        theText = document.createElement("SPAN");
        theText.id = this.id + "-" + theNames[i];
        theContainers[i].appendChild(theText);
        
        nextSlider = document.createElement("DIV");
        nextSlider.id = this.id + "-month-next";
        nextSlider.insertAdjacentHTML('beforeend', nextSvg);
        theContainers[i].appendChild(nextSlider);
      }
    }
  }

  for (var i = 0; i < this.labels.length; i++) {
    theLabel = document.createElement("SPAN");
    theLabel.id = this.id + "-label-" + (i + 1);
    theLabel.appendChild(document.createTextNode(this.labels[i]));

    theContainers[2].appendChild(theLabel);
  }

  theRows = [], theDays = [], theRadios = [];
  for (var i = 0; i < 6; i++) {
    theRows[i] = document.createElement("DIV");
    theRows[i].className = "row";
  }
  
  for (var i = 0, j = 0; i < 42; i++) {
    theRadios[i] = document.createElement("INPUT");
    theRadios[i].className = "day-radios";
    theRadios[i].type = "radio";
    theRadios[i].name = this.id + "-day-radios";
    theRadios[i].id = this.id + "-day-radio-" + (i + 1);

    theDays[i] = document.createElement("LABEL");
    theDays[i].className = "day";
    theDays[i].htmlFor = this.id + "-day-radio-" + (i + 1);
    theDays[i].id = this.id + "-day-" + (i + 1);

    theText = document.createElement("SPAN");
    theText.id = this.id + "-day-num-" + (i + 1);

    theDays[i].appendChild(theText);
  
    theRows[j].appendChild(theRadios[i]);
    theRows[j].appendChild(theDays[i]);

    if ((i + 1) % 7 == 0) {
      j++;
    }
  }

  for (var i = 0; i < 6; i++) {
    theContainers[3].appendChild(theRows[i]);
  }
  
  for (var i = 0; i < theContainers.length; i++) {
    theCalendar.appendChild(theContainers[i]);
  }

  document.getElementById(this.id).appendChild(theCalendar);
}

Calendar.prototype.update = function () {
  document.getElementById(this.id + '-year').innerHTML = this.date.getFullYear();
  document.getElementById(this.id + '-month').innerHTML = months[this.date.getMonth()];

  for (i = 1; i <= 42; i++) {
    document.getElementById(this.id + '-day-num-' + i).innerHTML = "";
    document.getElementById(this.id + '-day-' + i).className = this.id + " day";
  }

  firstDay = new Date(this.date.getFullYear(), this.date.getMonth(), 1).getDay();
  lastDay = new Date((this.date.getMonth() + 1 > 11) ? this.date.getFullYear() + 1 : this.date.getFullYear(), (this.date.getMonth() + 1 > 12) ? 0 : this.date.getMonth() + 1, 0).getDate();

  previousLastDay = new Date((this.date.getMonth() < 0) ? this.date.getFullYear() - 1 : this.date.getFullYear(), (this.date.getMonth() < 0) ? 11 : this.date.getMonth(), 0).getDate();

  if (firstDay != 0)
    for (i = 0, j = previousLastDay; i < this.label.indexOf(label[firstDay]); i++, j--) {
      document.getElementById(this.id + '-day-num-' + (1 + i)).innerHTML = j;
      document.getElementById(this.id + '-day-' + (1 + i)).className = this.id + " day diluted";
    }

  for (i = 1; i <= lastDay; i++) {
    document.getElementById(this.id + '-day-num-' + (this.label.indexOf(label[firstDay]) + i)).innerHTML = i;
    if (i == this.date.getDate())
      document.getElementById(this.id + '-day-radio-' + (this.label.indexOf(label[firstDay]) + i)).checked = true;
  }

  for (i = lastDay + 1, j = 1; (this.label.indexOf(label[firstDay]) + i) <= 42; i++, j++) {
    document.getElementById(this.id + '-day-num-' + (this.label.indexOf(label[firstDay]) + i)).innerHTML = j;
    document.getElementById(this.id + '-day-' + (this.label.indexOf(label[firstDay]) + i)).className = this.id + " day diluted";
  }
}

function Organizer(id, calendar) {
  this.id = id;
  this.calendar = calendar;

  this.draw();
  this.update();
}

Organizer.prototype = {
  constructor: Organizer,
  back: function (func) {
    date = this.calendar.date;
    lastDay = new Date((date.getMonth() + 1 > 11) ? date.getFullYear() + 1 : date.getFullYear(), (date.getMonth() + 1 > 12) ? 0 : date.getMonth() + 1, 0).getDate();
    previousLastDay = new Date((date.getMonth() < 0) ? date.getFullYear() - 1 : date.getFullYear(), (date.getMonth() < 0) ? 11 : date.getMonth(), 0).getDate();

    if (func == "day") {
      if (date.getDate() != 1) {
        this.changeDateTo(date.getDate() - 1);
      } else {
        this.back('month');
        this.changeDateTo(lastDay);
      }
    } else {
      if (func == "month") {
        if (date.getDate() > previousLastDay) {
          this.changeDateTo(previousLastDay);
        }
        if (date.getMonth() != 0)
          date.setMonth(date.getMonth() - 1);
        else {
          date.setMonth(11);
          date.setFullYear(date.getFullYear() - 1);
        }
      } else
        date.setFullYear(date.getFullYear() - 1);
    }
    
    this.calendar.update();  
    this.update();
  },
  next: function (func) {
    date = this.calendar.date;
    lastDay = new Date((date.getMonth() + 1 > 11) ? date.getFullYear() + 1 : date.getFullYear(), (date.getMonth() + 1 > 12) ? 0 : date.getMonth() + 1, 0).getDate();
    soonLastDay = new Date((date.getMonth() + 2 > 11) ? date.getFullYear() + 1 : date.getFullYear(), (date.getMonth() + 2 > 12) ? 0 : date.getMonth() + 2, 0).getDate();

    if (func == "day") {
      if (date.getDate() != lastDay) {
        date.setDate(date.getDate() + 1);
      } else {
        this.next('month');
        date.setDate(1);        
      }
    } else {
      if (func == "month") {
        if (date.getDate() > soonLastDay) {
          this.changeDateTo(soonLastDay);
        }
        if (date.getMonth() != 11)
          date.setMonth(date.getMonth() + 1);
        else {
          date.setMonth(0);
          date.setFullYear(date.getFullYear() + 1);
        }
      } else
        date.setFullYear(date.getFullYear() + 1);
    }
    
    this.calendar.update();
    this.update();
  },
  changeDateTo: function (theDay, theBlock) {
    if ((theBlock >= 31 && theDay <= 11) || (theBlock <= 6 && theDay >= 8)) {
      if (theBlock >= 31 && theDay <= 11)
        this.next('month');
      else if (theBlock <= 6 && theDay >= 8)
        this.back('month');
    }
    this.calendar.date.setDate(theDay);
    this.calendar.update();
    this.update();
    calendar = this.calendar;
    setTimeout(function () { calendar.update(); }, 10);
  }
}

Organizer.prototype.draw = function () {
  backSvg = '<svg style="width: 24px; height: 24px;" viewBox="0 0 24 24"><path fill="' + this.calendar.colors[3] + '" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z"></path></svg>';
  nextSvg = '<svg style="width: 24px; height: 24px;" viewBox="0 0 24 24"><path fill="' + this.calendar.colors[3] + '" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"></path></svg>';
  
  theOrganizer = document.createElement( "DIV");
  theOrganizer.className = "events " + this.calendar.size;

  theDate = document.createElement( "DIV");
  theDate.className = "date";
  theDate.style.backgroundColor = this.calendar.colors[1];
  theDate.style.color = this.calendar.colors[3];

  backSlider = document.createElement("DIV");
  backSlider.id = this.id + "-day-back";
  backSlider.insertAdjacentHTML('beforeend', backSvg);
  theDate.appendChild(backSlider);
  
  theText = document.createElement("SPAN");
  theText.id = this.id + "-date";
  theDate.appendChild(theText);
  
  nextSlider = document.createElement("DIV");
  nextSlider.id = this.id + "-day-next";
  nextSlider.insertAdjacentHTML('beforeend', nextSvg);
  theDate.appendChild(nextSlider);

  theRows = document.createElement( "DIV");
  theRows.className = "rows";

  theList = document.createElement("OL");
  theList.className = "list";
  theList.id = this.id + "-list";

  theRows.appendChild(theList);
  
  theOrganizer.appendChild(theDate);
  theOrganizer.appendChild(theRows);

  document.getElementById(this.id).appendChild(theOrganizer);
}

Organizer.prototype.update = function () {
  document.getElementById(this.id + "-date").innerHTML = this.calendar.months[this.calendar.date.getMonth()] + " " + this.calendar.date.getDate() + ", " + this.calendar.date.getFullYear();
  document.getElementById(this.id + "-list").innerHTML = "";
}

Organizer.prototype.list = function (data) {
  document.getElementById(this.id + "-list").innerHTML = "";

  content = ""; 
  for (var i = 0; i < data.length; i++) {
    content += '<li id="' + this.id + '-list-item-' + i + '"><div><span class="' + this.id + ' time" id="' + this.id + '-list-item-' + i + '-time">' + data[i].startTime + ' - ' + data[i].endTime + '</span><span class="' + this.id + ' m" id="' + this.id + '-list-item-' + i + '-m">' + data[i].mTime + '</span></div><p id="' + this.id + '-list-item-' + i + '-text">' + data[i].text + '</p></li>';
  }

  document.getElementById(this.id + "-list").innerHTML = content;
}

Organizer.prototype.setupBlock = function (blockId, theOrganizer, callback) {
  document.getElementById(calendarId + "-day-" + blockId).addEventListener('click', function () {
    if (document.getElementById(calendarId + "-day-num-" + blockId).innerHTML.length > 0) {
      theOrganizer.changeDateTo(document.getElementById(calendarId + "-day-num-" + blockId).innerHTML, blockId);
      callback();
    }
  });
}

Organizer.prototype.setOnClickListener = function (theCase, backCallback, nextCallback) {
  calendarId = this.calendar.id;
  organizerId = this.id;

  theOrganizer = this;

  switch (theCase) {
    case "days-blocks":
      for (i = 1; i <= 42; i++) {
        theOrganizer.setupBlock(i, theOrganizer, backCallback);
      }
      break;
    case "day-slider":
      document.getElementById(organizerId + "-day-back").addEventListener('click', function () {
        theOrganizer.back('day');
        backCallback();  
      });
      document.getElementById(organizerId + "-day-next").addEventListener('click', function () {
        theOrganizer.next('day');
        nextCallback();
      });
      break;
    case "month-slider":
      document.getElementById(calendarId + "-month-back").addEventListener('click', function () {
        theOrganizer.back('month');
        backCallback();
      });
      document.getElementById(calendarId + "-month-next").addEventListener('click', function () {
        theOrganizer.next('month');
        nextCallback();
      });
      break;
    case "year-slider":
      document.getElementById(calendarId + "-year-back").addEventListener('click', function () {
        theOrganizer.back('year');
        backCallback();
      });
      document.getElementById(calendarId + "-year-next").addEventListener('click', function () {
        theOrganizer.next('year');
        nextCallback();
      });
      break;
  }
};

// end of library
// full tutorial on how to use it is on GitHub
// https://github.com/nizarmah/Calendar-Javascript-Library/blob/master/README.md

/* end of library; everything is explained below; i'm sorry for the messy code and my bad practices; please criticise me */

var calendar = new Calendar("calendarContainer", "small", [ "Wednesday", 3 ], [ "#e91e63", "#c2185b", "#ffffff", "#f8bbd0" ]);
var organizer = new Organizer("organizerContainer", calendar);

currentDay = calendar.date.getDate(); // used this in order to make anyday today depending on the current today

// my best way of organizing data, maybe that can be the outcome of joining multiple tables in the database and then parsing them in such a manner, easier for the person to push use a date and the events of it
data = {
  years: [
    {
      int: 1999,
      months: [
        {
          int: 4,
          days: [
            {
              int: 28,
              events: [
                {
                  startTime: "6:00",
                  endTime: "6:30",
                  mTime: "pm",
                  text: "Weirdo was born"
                }
              ]
            }
          ]
        }
      ]
    },
    {
      int: (new Date().getFullYear()),
      months: [
        {
          int: (new Date().getMonth() + 1),
          days: [
            {
              int: (new Date().getDate()),
              events: [
                {
                  startTime: "6:00",
                  endTime: "7:00",
                  mTime: "am",
                  text: "This is scheduled to show today, anyday."
                },
                {
                  startTime: "5:45",
                  endTime: "7:15",
                  mTime: "pm",
                  text: "WIP Library"
                },
                {
                  startTime: "10:00",
                  endTime: "11:00",
                  mTime: "pm",
                  text: "Probably won't fix that (time width)"
                },
                {
                  startTime: "8:00",
                  endTime: "9:00",
                  mTime: "pm",
                  text: "Next spam is for demonstration purposes only"
                },
                {
                  startTime: "5:45",
                  endTime: "7:15",
                  mTime: "pm",
                  text: "WIP Library"
                },
                {
                  startTime: "10:00",
                  endTime: "11:00",
                  mTime: "pm",
                  text: "Probably won't fix that (time width)"
                },
                {
                  startTime: "5:45",
                  endTime: "7:15",
                  mTime: "pm",
                  text: "WIP Library"
                },
                {
                  startTime: "10:00",
                  endTime: "11:00",
                  mTime: "pm",
                  text: "Probably won't fix that (time width)"
                },
                {
                  startTime: "5:45",
                  endTime: "7:15",
                  mTime: "pm",
                  text: "WIP Library"
                },
                {
                  startTime: "10:00",
                  endTime: "11:00",
                  mTime: "pm",
                  text: "Probably won't fix that (time width)"
                },
                {
                  startTime: "5:45",
                  endTime: "7:15",
                  mTime: "pm",
                  text: "WIP Library"
                },
                {
                  startTime: "10:00",
                  endTime: "11:00",
                  mTime: "pm",
                  text: "Probably won't fix that (time width)"
                },
                {
                  startTime: "5:45",
                  endTime: "7:15",
                  mTime: "pm",
                  text: "WIP Library"
                },
                {
                  startTime: "10:00",
                  endTime: "11:00",
                  mTime: "pm",
                  text: "Probably won't fix that (time width)"
                }
              ]
            }
          ]
        }
      ]
    }
  ]
};

function showEvents() {
  theYear = -1, theMonth = -1, theDay = -1;
  for (i = 0; i < data.years.length; i++) {
    if (calendar.date.getFullYear() == data.years[i].int) {
      theYear = i;
      break;
    }
  }
  if (theYear == -1) return;
  for (i = 0; i < data.years[theYear].months.length; i++) {
    if ((calendar.date.getMonth() + 1) == data.years[theYear].months[i].int) {
      theMonth = i;
      break;
    }
  }
  if (theMonth == -1) return;
  for (i = 0; i < data.years[theYear].months[theMonth].days.length; i++) {
    if (calendar.date.getDate() == data.years[theYear].months[theMonth].days[i].int) {
      theDay = i;
      break;
    }
  }
  if (theDay == -1) return;
  theEvents = data.years[theYear].months[theMonth].days[theDay].events;  
  organizer.list(theEvents); // what's responsible for listing
}

showEvents();

organizer.setOnClickListener('day-slider', function () { showEvents(); console.log("Day back slider clicked"); }, function () { showEvents(); console.log("Day next slider clicked"); });
organizer.setOnClickListener('days-blocks', function () { showEvents(); console.log("Day block clicked"); }, null);
organizer.setOnClickListener('month-slider', function () { showEvents(); console.log("Month back slider clicked"); }, function () { showEvents(); console.log("Month next slider clicked"); });
organizer.setOnClickListener('year-slider', function () { showEvents(); console.log("Year back slider clicked"); }, function () { showEvents(); console.log("Year next slider clicked"); });
</script>

	