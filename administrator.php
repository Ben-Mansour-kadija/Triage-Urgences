<?php 
session_start();
include("db_connect.php");

if(isset($_COOKIE['userid'])&&$_COOKIE['useremail']){
	
	$userid=$_COOKIE['userid'];
$useremail=$_COOKIE['useremail'];

$sqluser ="SELECT * FROM tbl_users WHERE Password='$userid' && Email='$useremail'";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
			  $userstate = $found['State'];	
			  $emails = $found['Email'];
			  	   $id= $found['id'];
          	   $role= $found['Role'];	
		          $profile='';
		 } 
}else{
	 header('location:index.php');
      exit;
     }
 //$profile='';
?>
<!DOCTYPE HTML>
<html>
<head>
 <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">

<title>SAU Triage System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap Core CSS -->
<link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="admin/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='admin/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="admin/js/jquery-1.11.1.min.js"></script>
<script src="admin/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 


<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>





 
</head>
<script type="text/javascript">
 $(document).on("click", ".open-Privilages", function () {
     var myTitle = $(this).data('ik');
       var myT = $(this).data('id');
       var myp1 = $(this).data('p1');
       var myp2 = $(this).data('p2');
       var myp3 = $(this).data('p3');
       var myp4 = $(this).data('p4');
       var myp5 = $(this).data('p5');
       var myp6 = $(this).data('p6');
       var myp7 = $(this).data('p7');       
       
       
     $(".modal-title #oldname").val(myTitle);
     $(".modal-body #userid").val(myT);
     //$(".modal-body #user").val('checked');
  
     if(myp1=="Yes"){ $(".modal-body #adduser").html('<input type="checkbox" class="form-control" name="adduser" value="" checked >'); }else{ $(".modal-body #adduser").html('<input type="checkbox" class="form-control" name="adduser" value="">'); }
     if(myp2=="Yes"){ $(".modal-body #manageusers").html('<input type="checkbox" class="form-control"  name="manageuser" value="" checked >'); }else{$(".modal-body #manageusers").html('<input type="checkbox" class="form-control"  name="manageuser" value="">'); }
     if(myp3=="Yes"){ $(".modal-body #logact").html('<input type="checkbox" class="form-control"  name="logactivities" value="" checked >'); }else{$(".modal-body #logact").html('<input type="checkbox" class="form-control"  name="logactivities" value="">'); }
     if(myp4=="Yes"){ $(".modal-body #addpat").html('<input type="checkbox" class="form-control" name="addpatient" value="" checked>'); }else{ $(".modal-body #addpat").html('<input type="checkbox" class="form-control" name="addpatient" value="">'); }
     if(myp5=="Yes"){ $(".modal-body #editpat").html('<input type="checkbox" class="form-control" name="editpatients" value="" checked>'); }else{$(".modal-body #editpat").html('<input type="checkbox" class="form-control"  name="editpatients" value="">'); }
     if(myp6=="Yes"){ $(".modal-body #managepat").html('<input type="checkbox" class="form-control" name="managep" value="" checked>'); }else{$(".modal-body #managepat").html('<input type="checkbox" class="form-control"  name="managep" value="">'); }
     if(myp7=="Yes"){ $(".modal-body #tripatient").html('<input type="checkbox" class="form-control" name="tripatient" value="" checked >'); }else{ $(".modal-body #tripatient").html('<input type="checkbox" class="form-control" name="tripatient" value="">'); }

}); 
 </script>
<script type="text/javascript">
 $(document).on("click", ".open-Updatepicture", function () {
     var myTitle = $(this).data('id');
     $(".modal-body #bookId").val(myTitle);
     
}); 
 </script>
 <script type="text/javascript">
 $(document).on("click", ".open-Passwords", function () {
     var myTitle = $(this).data('ik');
       var myT = $(this).data('id');
     $(".modal-title #oldtpatientname").val(myTitle);
     $(".modal-body #oldpassword").val(myT);
     
}); 

 </script>

<script type="text/javascript">
var track_page = 1; //track user click as page number, righ now page number 1
load_contents(track_page); //load content

$("#load_more_button").click(function (e) { //user clicks on button
	track_page++; //page number increment everytime user clicks load button
	load_contents(track_page); //load content
});

//Ajax load function
function load_contents(track_page){
	//$('.animation_image').show(); //show loading image
	
	$.post( 'fetch_home.php', {'page': track_page}, function(data){	
		 	
		$("#results").append(data); //append data into #results element		
				//hide loading image
		$('.animation_image').hide(); //hide loading image once data is received
	});  
	
	    
}

</script>
<script type="text/javascript">


$(document).on("click", ".addpatient", function () { //user clicks on button
               			//$(".results").html("Yes we can");
                          //$("#results").html("Yes we can"); 
                         var  track_page = 3;
                          $.post( 'fetch_patient.php', {'page': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
          });

$(document).on("click", ".completer_données", function () { //user clicks on button
               			//$(".results").html("Yes we can");
                          //$("#results").html("Yes we can"); 
                         var  track_page = 60;
                          $.post( 'completer_données.php', {'page': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
          });
          
$(document).on("click", ".managepatients1", function () { //user clicks on button
               			//$(".results").html("Yes we can");
                          //$("#results").html("Yes we can"); 
                         var  track_page = 100;
                          $.post( 'manage_patients1.php', {'page': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
          });

          $(document).on("click", ".managepatients2", function () { //user clicks on button
               			//$(".results").html("Yes we can");
                          //$("#results").html("Yes we can"); 
                         var  track_page = 90;
                          $.post( 'manage_patients2.php', {'page': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
          });

          $(document).on("click", ".managepatients3", function () { //user clicks on button
               			//$(".results").html("Yes we can");
                          //$("#results").html("Yes we can"); 
                         var  track_page = 80;
                          $.post( 'manage_patients3.php', {'page': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
          });
          

 $(document).on("click", ".managepatients", function () { //user clicks on button
               			 var  track_page = 70;                         
                       // window.alert(track_page);
                          $.post( 'manage_patients.php', {'standard': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
                     });

      
          
      $(document).on("click", ".manageusers", function () { //user clicks on button
               			var classstandard ="67";                          
                	                             
                       
                          $.post( 'user.php', {'standard': classstandard}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
				                 
				           });
				                 var optionValue='chart';
 		 $.ajax({
 		 	    type :'POST',
                  url: "register.php",
                 data: {loadid:optionValue},
               success: function(result) {               
                                            $("#errors1").html(result);
                                          }
                });
                
                var optionValue='group';
 		 $.ajax({
 		 	    type :'POST',
                  url: "register.php",
                 data: {loadgroup:optionValue},
               success: function(result) {               
                                            $("#groupshow").html(result);
                                          }
                });    
 $(document).on("click", ".openreports", function () { //user clicks on button
               			  var track_page = 8;                       
                        
                          $.post( 'logsreport.php', {'drugid': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
          });
</script>

<script type="text/javascript"> 
            $(document).on("click", ".open-Delete", function () {
                                  var myValue = $(this).data('id');
                                  var myid = $(this).data('ix');

                                        swal({
                                         title: "Are you sure?",
                                         text: "You want to remove this staff from the system!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, remove!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                  	var vals=myValue;
                                                    var vals2=myid;

                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "register.php",
                                                      data: { Valuedel: vals,valu3:vals2},
                                                      success: function(result) {
                                                    //  if(result==098){
                                                      	
                                                      	var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "user.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Deleted!", text: "Staff has been deleted from the system.", type: "success"});

                   $("#results").html(result);
				}
			});
                                                      	
                                                                //  }

                                                       }
                                                  }); } else {
	                                                           swal("Cancelled", "This Staff is safe :)", "error");
                                                          }
                                         });
                                       
                                       });
</script>
<script type="text/javascript"> 
            $(document).on("click", ".open-Delete3", function () {
                                  var myValue = $(this).data('id');
                                  var myid = $(this).data('ix');

                                        swal({
                                         title: "Are you sure?",
                                         text: "You want to remove this patient from the system!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, remove!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                    

                                                  	var vals=myValue;
                                                    var vals2=myid;

                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "register.php",
                                                      data: { Valuede3: vals,valu3:vals2},
                                                      success: function(result) {
                                                     // if(result==098){
                                                      	
                                                      	var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "manage_patient.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Deleted!", text: "Patient has been deleted from the system.", type: "success"});

                   $("#results").html(result);
				}
			});
                                                      	
                                                                //  }

                                                       }
                                                  }); } else {
	                                                           swal("Cancelled", "This Patient is safe :)", "error");
                                                          }
                                         });
                                       
                                       });
 </script>   
 
 
 <script>
  $(document).on("click", ".open_tripatient", function () { //user clicks on button
    // Set session variable
    //<!?php $_SESSION['insert_wait'] = "hhh"; ?>
    
    // Show the modal
    $('#staticBackdrop').modal('show');
  });
</script>




<script type="text/javascript"> 
            $(document).on("click", ".open-Deleted2", function () {
                                  var myValue = $(this).data('id');
                                  var myid = $(this).data('ix');
                                        swal({
                                         title: "Are you sure?",
                                         text: "You want to delete this staff log record!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, remove!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                  	var vals=myValue;
                                                  	var vals2=myid;
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "register.php",
                                                      data: { Valuedel2: vals,valu3:vals2},
                                                      success: function(result) {
                                                                                    	var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "logsreport.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Log report deleted.", type: "success"});

                   $("#results").html(result);
				}
			});
                                                                          
                                                                                                     	                        
                                                                 

                                                       }
                                                  }); 
                                                  } else {
	                                                           swal("Cancelled", "This Staff is safe :)", "error");
                                                          }
                                         });
                                       
                                       });
                
                </script>

 
<?php if(isset($_SESSION['memberadded'])){?>
 <script type="text/javascript"> 
 	        
            $(document).ready(function(){ 
                                    swal({
                                         title: "User added successfully",
                                         text: "Do you want to add another one?",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                           $('#Useradd').modal('show');
                                                     }                                          
                                          });
                                         
                                      });
                </script>       
              

           <?php 
	   session_destroy();		
		    }?>
		    <?php if(isset($_SESSION['memberexist'])){?>
                <script type="text/javascript"> 
            
                               
                                $(document).ready(function(){ 
                                    swal({
                                         title: "Not successful",
                                         text: "User arleady exist.Try again?",
                                         type: "warning",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                           $('#Useradd').modal('show');
                                                     }                                          
                                          });
                                         
                                      });
                </script>
           <?php 
       	   session_destroy();}  
           ?>
<?php if(isset($_SESSION['patientexist'])){?>
                <script type="text/javascript"> 
            
                               
                                $(document).ready(function(){ 
                                    swal({
                                         title: "Not successful",
                                         text: "Patient arleady exist.Try again?",
                                         type: "warning",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                        var  track_page = 3;
                          $.post( 'fetch_patient.php', {'page': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
                                      }                                          
                                          });
                                         
                                      });
                </script>
           <?php 
       	   session_destroy();}  
           ?>

            <?php if(isset($_SESSION['emptytextboxes'])){?>
                <script type="text/javascript"> 
        
                               
                               $(document).ready(function(){ 
                                    swal({
                                         title: "Not successful",
                                         text: "You did not fill all the textboxes.Try again?",
                                         type: "warning",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                           $('#Useradd').modal('show');
                                                     }                                          
                                          });
                                         
                                      });
                </script>
           <?php 
       	   session_destroy();}  
           ?>

<?php if(isset($_SESSION['emptytextboxespatient'])){?>
                <script type="text/javascript"> 
        
                               
                               $(document).ready(function(){ 
                                    swal({
                                         title: "Not successful",
                                         text: "You did not fill all the needed textboxes.Try again?",
                                         type: "warning",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) { 
                                        var  track_page = 3;
                          $.post( 'fetch_patient.php', {'page': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
                                                     }                                          
                                          });
                                         
                                      });
                </script>
           <?php 
       	   session_destroy();}  
           ?>

           <?php if(isset($_SESSION['subject'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){ 
                                    swal({
                                         title: "User removed successfully",
                                         text: "Do you want to remove another one?",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="administrator.php?id=2";
                                                     } 
                                           else {
                                                        window.location ="administrator.php";
                                                 }
                                         });
                                         
                                                    });
                </script>
           <?php 
       	   session_destroy();}  
           ?>
           
           
           <?php if(isset($_SESSION['addpetient'])){?>
                <script type="text/javascript"> 
                	$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "fetch_patient.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {
					
                   $("#results").html(result);
                   
                                   swal({
                                         title: "Patient has been registered",
                                         text: "Do you want to view registered patient OR Triage",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "View Patients",
                                        cancelButtonColor: "blue",
                                        cancelButtonText: "Triage",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                         buttonsStyling: false,
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                           var  track_page = 70;                       
                                                           $.post( 'manage_patients.php', {'standard': track_page}, function(data){			
		                                                         $("#results").html(data); //append data into #results element		
				                                                  });
                                                     }      
                                                 else{                                      	
   
                                        //code des pop_up de triage
                                        $('#triage').modal('show');
                                      }      
                                                     
                                          }  
                       
                                                     
                                                     
                                           
                                          );

	
				}
			});

		});
          

                    </script>
      <?php  session_destroy(); }?>

      <?php if(isset($_SESSION['complited'])){?>
                <script type="text/javascript"> 
                	$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "completer_données.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {
					
                   $("#results").html(result);
                   
                                   swal({
                                         title: "Patient details has been updated",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "ok",
                                        closeOnConfirm: true,
                                         buttonsStyling: false,
                                        },  
                                          );

	
				}
			});

		});
          

                    </script>
      <?php  session_destroy(); }?>

  <?php if(isset($_SESSION['priv'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "user.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "System user privilages updated.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>


      




      <?php 
	if(isset($_SESSION['send_1']) || isset($_SESSION['send_2'])){

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic2";
$connhl7 = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($connhl7->connect_error) {
  die("Connection failed: " . $connhl7->connect_error);
}

// Exécution de la requête SQL
$resultat1212 = $connhl7->query("SELECT Score FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
// Vérification du résultat
if ($resultat1212) {
	// Récupération de la première ligne du résultat
	$row1212 = $resultat1212->fetch_assoc();
	// Stockage du résultat dans la variable
	$Score = $row1212['Score'];
} else {
	echo "Erreur lors de l'exécution de la requête SQL du score : " . $connhl7->error;
	exit();

}
if($Score >= 10){
	$case="Immidiate Admission";
  }else if($Score > 5){
	$case="Very Urgent Case";
  }else if($Score >= 1){
	$case="Urgent Case";
  }else{
	$case="Non-Urgent Case";
  }


  

// Exécution de la requête SQL
$resultat000 = $connhl7->query("SELECT id FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
// Vérification du résultat
if ($resultat000) {
	// Récupération de la première ligne du résultat
	$row000 = $resultat000->fetch_assoc();
	// Stockage du résultat dans la variable
	$patientID = $row000['id'];
} else {
	echo "Erreur lors de l'exécution de la requête SQL du id : " . $connhl7->error;
	exit();
}


  // Exécution de la requête SQL
  $resultat111 = $connhl7->query("SELECT Mtitle FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat111) {
	  // Récupération de la première ligne du résultat
	  $row111 = $resultat111->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $Mtitle = $row111['Mtitle'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du Mtitle : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat222 = $connhl7->query("SELECT Firstname FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat222) {
	  // Récupération de la première ligne du résultat
	  $row222 = $resultat222->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $patientName = $row222['Firstname'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du Firstname : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat333 = $connhl7->query("SELECT Middlename FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat333) {
	  // Récupération de la première ligne du résultat
	  $row333 = $resultat333->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $Middlename = $row333['Middlename'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL Middlename : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat444 = $connhl7->query("SELECT Sirname FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat444) {
	  // Récupération de la première ligne du résultat
	  $row444 = $resultat444->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $Sirname = $row444['Sirname'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du Sirname : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat555 = $connhl7->query("SELECT Gender FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat555) {
	  // Récupération de la première ligne du résultat
	  $row555 = $resultat555->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $sex = $row555['Gender'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du Gender : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat666 = $connhl7->query("SELECT Phone FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat666) {
	  // Récupération de la première ligne du résultat
	  $row666 = $resultat666->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $homePhoneNumber = $row666['Phone'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du Phone : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat777 = $connhl7->query("SELECT NextKphone FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat777) {
	  // Récupération de la première ligne du résultat
	  $row777 = $resultat777->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $nk1PhoneNumber = $row777['NextKphone'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du NextKphone : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat888 = $connhl7->query("SELECT DOB FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat888) {
	  // Récupération de la première ligne du résultat
	  $row888 = $resultat888->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $dateOfBirth = $row888['DOB'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du DOB : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat999 = $connhl7->query("SELECT Location FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat999) {
	  // Récupération de la première ligne du résultat
	  $row999 = $resultat999->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $patientAddress = $row999['Location'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du Location : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat1010 = $connhl7->query("SELECT Relation FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat1010) {
	  // Récupération de la première ligne du résultat
	  $row1010 = $resultat1010->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $nk1Relationship = $row1010['Relation'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du Relation : " . $connhl7->error;
	  exit();
  }
  
  // Exécution de la requête SQL
  $resultat1111 = $connhl7->query("SELECT Guardian FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat1111) {
	  // Récupération de la première ligne du résultat
	  $row1111 = $resultat1111->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $nk1Name = $row1111['Guardian'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du Guardian : " . $connhl7->error;
	  exit();
  }
  
  
  // Exécution de la requête SQL
  $resultat1313 = $connhl7->query("SELECT Comment FROM tbl_patients ORDER BY id DESC LIMIT 1");
  
  // Vérification du résultat
  if ($resultat1313) {
	  // Récupération de la première ligne du résultat
	  $row1313 = $resultat1313->fetch_assoc();
	  // Stockage du résultat dans la variable
	  $obxObservationValue = $row1313['Comment'];
  } else {
	  echo "Erreur lors de l'exécution de la requête SQL du Comment : " . $connhl7->error;
	  exit();
  }
  
  
  
  $primaryLanguage = "Arabe";
  $obxAb = "Ab";
  $dateTime = date('YmdHis'); // Génère une chaîne AAAAMMJJHHMMSS représentant la date et l'heure actuelles
  $obxReferenceRange =$case;
  
  // Construire le message HL7 en utilisant les variables
  $message = "MSH|^~&|SAU^Triage^System|SAU^Triage^System-INTERFACE|emergency^unites-SYSTEM|emergency^unites-INTERFACE|$dateTime||ADT^A05|1234|P|2.4|\r" .
			 "PID|||$patientID|$Mtitle^$patientName^$Middlename^$Sirname|$dateOfBirth|$sex|||$patientAddress||$homePhoneNumber||$primaryLanguage||\r" .
			 "NK1||$nk1Name|$nk1Relationship|$patientAddress|$nk1PhoneNumber|||\r" .
			 "OBX|||le^score^est^$Score||$obxObservationValue|$obxReferenceRange|$obxAb|\r";
  
  $directory = 'C:\xampp\htdocs\trah\FLUX_TSAUS_EMU\import';
  if (!is_dir($directory)) {
	  echo "Le répertoire $directory n'existe pas.";
  } else {
	  $date = date('Y-m-d H:i:s'); // date et heure actuelles
	  $filename = $patientID.'_'.$dateTime.'_HL7'.'.HL7'; // nom de fichier significatif
	  $filepath = $directory . '/' . $filename;
	  $myfile = fopen($filepath, "a") or die("Unable to open file!");
	 
	  $txt = $message;
	  fwrite($myfile, $txt);
	  fclose($myfile);
	  //echo "Le fichier $filename a été créé avec succès dans le répertoire $directory.";
  }



  $connhl7->close();

  $_SESSION['hl7']="hhhhhhh";



  session_destroy();		

}

?>


      <?php if(isset($_SESSION['hl7'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "administrator.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Hl7 message sent", type: "success"});

                   //$("#results").html(result);
				}
			});

		});
                    </script>
      <?php /* session_destroy(); */}?>


      <?php if(isset($_SESSION['comp'])) {?>
<script type="text/javascript">
		var  track_page = 60;
                          $.post( 'completer_données.php', {'page': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });

                    </script>
      <?php  session_destroy(); }?>


      <?php if(isset($_SESSION['wait'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "administrator.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					$('#second-modal_wait').modal('show');

				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>

      <?php if(isset($_SESSION['triage'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "administrator.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					$('#second-modal_triage').modal('show');

				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>

     <?php if(isset($_SESSION['pass'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "user.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Staff password successfully changed.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?> 
 

      <?php if(isset($_SESSION['Modifie_user'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "user.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Staff informations successfully changed.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>



      <?php if(isset($_SESSION['Modifie_patient'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "manage_patients.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Patient informations successfully changed.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>
 


<div id="Passwords" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
                    Reset Password of <input style="border: none;background:#222d32" type="text" id="oldusername" value="" readonly="readonly" />
	    	
        	</center></h4>
      </div>
      <div class="modal-body" >
        <center>
             
        	<form method="post" action="register.php" enctype='multipart/form-data'>        		
            <p style="margin-bottom:10px;">&nbsp;Old Password:<input name='oldpassword' type='text' id='oldpassword' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Password:<input name='newpassword' type='text' id='newpass'></p> 
        	                                                        	      		
           
        </center>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Reset" id="amendreceipt" name="resetpass"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>
  
 
  <script type="text/javascript">
 $(document).on("click", ".open-Edituser", function () {
     var myTitle = $(this).data('id');
       var myp1 = $(this).data('p1');
       var myp2 = $(this).data('p2');
       var myp3 = $(this).data('p3');
       var myp4 = $(this).data('p4');
       var myp5 = $(this).data('p5');
       var myp6 = $(this).data('p6');
       var myp7 = $(this).data('p7'); 
     $(".modal-title #oldtpatientname").val(myTitle);
     $(".modal-body #oldfname").val(myp1);
     $(".modal-body #oldsirname").val(myp2);
     $(".modal-body #oldmtiltle").val(myp3);
     $(".modal-body #oldpicname").val(myp4);
     $(".modal-body #oldphone").val(myp5);
     $(".modal-body #oldemail").val(myp6);
     $(".modal-body #oldrole").val(myp7);

     
}); 

 </script>


<script type="text/javascript">
 $(document).on("click", ".open-Editpatient", function () {
     var myTitle = $(this).data('id');
       var myp1 = $(this).data('p1');
       var myp2 = $(this).data('p2');
       var myp3 = $(this).data('p3');
       var myp4 = $(this).data('p4');
       var myp5 = $(this).data('p5');
       var myp6 = $(this).data('p6');
       var myp7 = $(this).data('p7');
       var myp8 = $(this).data('p8');
       var myp9 = $(this).data('p9');
       var myp10 = $(this).data('p10');
       var myp11 = $(this).data('p11'); 
     $(".modal-title #oldtpatientname").val(myTitle);
     $(".modal-body #oldfname").val(myp1);
     $(".modal-body #oldsirname").val(myp2);
     $(".modal-body #oldmtiltle").val(myp3);
     $(".modal-body #oldpicname").val(myp4);
     $(".modal-body #oldphone").val(myp5);
     $(".modal-body #oldlocation").val(myp6);
     $(".modal-body #olddob").val(myp7);
     $(".modal-body #oldgender").val(myp8);
     $(".modal-body #oldNext_of_kin").val(myp9);
     $(".modal-body #oldNextKphone").val(myp10);
     $(".modal-body #oldrelation").val(myp11);


     
}); 

 </script>



<script type="text/javascript">
 $(document).on("click", ".open-Passwordss", function () {
     
       var myT = $(this).data('id');
     var myTitle = $(this).data('ie');
       var myp = $(this).data('if');
       var mym = $(this).data('ig');
       var myn = $(this).data('ih');
       var myk = $(this).data('ij');
       var mykm = $(this).data('ik');
      var myAc = $(this).data('ia'); 
       
       $("#oldname").html(myTitle);
       $("#oldname").html(myTitle);
       //$(".modal-body #userid").val(myT);
       $("#oldpass").html(mykm);
       $("#ss").html(myp);     
       $("#bb").html(mym);
       $("#cc").html(myn);
       $("#dd").html(myk);
       $("#staffid").html(myT); 
       $("#act").html(myAc);
}); 
 </script>
 
 



<div id="Modifie_user" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
                    Modifie User <input style="border: none;background:#222d32" type="text" id="oldusername" value="" readonly="readonly" />
	    	
        	</center></h4>
      </div>
      <div class="modal-body" >
        <center>
             
        	<form method="post" action="register.php" enctype='multipart/form-data'>        		
            <p style="margin-bottom:10px;">&nbsp;Old First name:<input name='oldfname' type='text' id='oldfname' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New First name:<input name='newfname' type='text' id='newfname'></p> 
        	                                                        	      		
          <p style="margin-bottom:10px;">&nbsp;Old Sirname:<input name='oldsirname' type='text' id='oldsirname' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Sirname:<input name='newsirname' type='text' id='newsirname'></p> 
          <p style="margin-bottom:10px;">&nbsp;Old Mtitle:<input name='oldmtitle' type='text' id='oldmtitle' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Mtitle:<input name='newmtitle' type='text' id='newmtitle'></p> 

          <p style="margin-bottom:10px;">&nbsp;Old Pic_name:<input name='oldpicname' type='text' id='oldpicname' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Pic_name:<input name='newpicname' type='text' id='newpicname'></p> 
          <p style="margin-bottom:10px;">&nbsp;Old Phone:<input name='oldphone' type='text' id='oldphone' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Phone:<input name='newphone' type='text' id='newphone'></p> 

          <p style="margin-bottom:10px;">&nbsp;Old Email:<input name='oldemail' type='text' id='oldemail' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Email:<input name='newemail' type='text' id='newemail'></p> 
                    <p style="margin-bottom:10px;">&nbsp;Old Role:<input name='oldrole' type='text' id='oldrole' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Role:<input name='newrole' type='text' id='newrole'></p> 
                  	          
        </center>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Save" id="amendreceipt" name="Modifie_user"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>


  <div id="Modifie_patient" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
                    Modifie Patient <input style="border: none;background:#222d32" type="text" id="oldusername" value="" readonly="readonly" />
	    	
        	</center></h4>
      </div>
      <div class="modal-body" >
        <center>
             
        	<form method="post" action="register.php" enctype='multipart/form-data'>        		
            <p style="margin-bottom:10px;">&nbsp;Old First name:<input name='oldfname' type='text' id='oldfname' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New First name:<input name='newfname' type='text' id='newfname'></p> 
        	                                                        	      		
          <p style="margin-bottom:10px;">&nbsp;Old Sirname:<input name='oldsirname' type='text' id='oldsirname' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Sirname:<input name='newsirname' type='text' id='newsirname'></p> 
          <p style="margin-bottom:10px;">&nbsp;Old Mtitle:<input name='oldmtitle' type='text' id='oldmtitle' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Mtitle:<input name='newmtitle' type='text' id='newmtitle'></p> 

          <p style="margin-bottom:10px;">&nbsp;Old Middlename:<input name='oldpicname' type='text' id='oldpicname' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Middlename:<input name='newpicname' type='text' id='newpicname'></p> 
          <p style="margin-bottom:10px;">&nbsp;Old Phone:<input name='oldphone' type='text' id='oldphone' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Phone:<input name='newphone' type='text' id='newphone'></p> 

          <p style="margin-bottom:10px;">&nbsp;Old location:<input name='oldlocation' type='text' id='oldlocation' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New location:<input name='newlocation' type='text' id='newlocation'></p> 
                    <p style="margin-bottom:10px;">&nbsp;Old dob:<input name='olddob' type='text' id='olddob' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New dob:<input name='newdob' type='text' id='newdob'></p> 
                  	    
          <p style="margin-bottom:10px;">&nbsp;Old gender:<input name='oldgender' type='text' id='oldgender' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New gender:<input name='newgender' type='text' id='newgender'></p> 
                  	    
          <p style="margin-bottom:10px;">&nbsp;Old Next_of_kin:<input name='oldNext_of_kin' type='text' id='oldNext_of_kin' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Next_of_kin:<input name='newNext_of_kin' type='text' id='newNext_of_kin'></p> 
                  	    
          <p style="margin-bottom:10px;">&nbsp;Old NextKphone:<input name='oldNextKphone' type='text' id='oldNextKphone' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New NextKphone:<input name='newNextKphone' type='text' id='newNextKphone'></p> 
                  
          <p style="margin-bottom:10px;">&nbsp;Old Relation:<input name='oldRelation' type='text' id='oldRelation' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Relation:<input name='newRelation' type='text' id='newRelation'></p> 
              
        </center>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Save" id="amendreceipt" name="Modifie_patient"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>
  


 <div id="Privilages" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
                    Add/Change Privilages of <input style="border: none;background:#222d32" type="text" id="oldname" value="" readonly="readonly" />
	    	
        	</center></h4>
      </div>
      <div class="modal-body" >
        <center>
             
        	<form method="post" action="register.php" enctype='multipart/form-data'>        		
     <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Add System User
    <span id='adduser'></span>
   </span>
   
      <span class="input-group-addon"><span class="fa fa-users"></span>&nbsp;Manage System Users
      <span id='manageusers'></span>
   </span>
     
    <span class="input-group-addon"><span class="fa fa-file-pdf-o"></span>&nbsp;View Log Activities
    <span id='logact'></span>
   </span>
  </div>
  
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Add Patients
    <span id='addpat'></span>
   </span>
      <span class="input-group-addon"><span class="fa fa-edit"></span>&nbsp;Edit Patients
   <span id='editpat'></span>
   </span>
      <span class="input-group-addon"><span class="fa fa-trash"></span>&nbsp;Remove Patients
   <span id='managepat'></span>
   </span>
   </div>
   <div class="input-group" style="margin-bottom:10px">
  <span class="input-group-addon"><span class="fa fa-edit"></span>&nbsp;Triage
    <span id='tripatient'></span>
   </span>
   </div>
   
 
              	 <input type="hidden" name="userid" value="" id="userid"/>                                                        	      		
                                                        	      		

        </center>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Save" id="amendreceipt" name="Userprivilages"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>

<div class="modal" id="displaydrug">
			<span class="close-modal">
							<button type="submit" class="btn btn-success" id="PrintButton" onclick="PrintPage()"><span class='glyphicon glyphicon-print' style="color: white"></span> </button>&nbsp;
							<button type="submit" class="btn btn-danger"  data-dismiss="modal"><span class='glyphicon glyphicon-remove' style="color: white"></span> </button>

			</span>
			<div class="inner_section">
				<div id="record_container" class="record_container">
								<h3 class="title">Triage des urgences</h3><br>
								Phone: <br>
								Email: 			
			                    <label style="float: right"><?php echo date('l jS \of F Y ');?></label>

				 	<table class="table" >
                         
                        <tr class="table_row table_part">
                            <td class="table_column">
                                LOG INFORMATION
                            </td>
                        </tr>
                        
                        
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column">
                                Username
                            </td>
                            <td class="table_column table_head s-column">
                                User role
                            </td>
                            <td class="table_column table_head s-column">
                                IP Address
                            </td>
                            <td class="table_column s-column">
                              <span id="staffid"></span>
                            </td>
                            <td class="table_column s-column">
                               <span id="oldpass"></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="ss"></span>
                            </td>
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column">
                                Login
                            </td>
                            <td class="table_column table_head s-column">
                                Logout
                            </td>
                            <td class="table_column table_head s-column">
                                Number of Activities
                            </td>
                            <td class="table_column s-column">
                                <span id="bb"></span>
                            </td>
                            <td class="table_column s-column">
                                 <span id="cc"></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="oldname"></span>
                            </td>
                        </tr>
                        
                        <tr class="table_row clearfix">
                            <td class="table_column table_head l-column">
                               Activity List
                            </td>
                            <td class="table_column l-column">
                              <span id="act"></span>
                            </td>
                        </tr>
                        
                        
                        
                        
                        </div>
                        </table>

					
				</div>
			</div>
		</div>


 <div id="Useradd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	ADD USER TO THE SYSTEM
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      	<center> 
        		<form method="post" action="upload.php" enctype='multipart/form-data' style="width: 98%;">        		

            	
      	        <p style="margin-bottom:10px;">  
        	      <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="pro">&nbsp;Pro&nbsp;&nbsp; &nbsp; &nbsp;</span>
        	    <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="dr">&nbsp;Dr &nbsp; &nbsp;&nbsp;&nbsp;</span>
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mr">&nbsp;Mr &nbsp; &nbsp; &nbsp;&nbsp;</span>        		
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mrs">&nbsp;Mrs &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="miss">&nbsp;Miss</span>
        		</p>
        		                                                           	      		
                 <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Firstname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mfname"></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Surname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="msname"></span></p>
        		<p style="margin-bottom:10px;"><span style="font-weight: bold; font-size: 18px;">Staff Desgnation:
        		<select style='width:273px; height:35px; color:black' name="minstitution" >
        			            				       <option>Medical Doctor</option>
            				                           <option >Receptionist</option>
            				                           <option >Administrator</option>
                                               <option >Nurse</option>

            				            

            			</select>        		
        		</span></p>
        		
        		
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Email addr:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="email" name="memail"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Phone:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="number" name="mphone"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Password:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="password" name="mpassword"></span></p>
        	     <p ><span style="font-size: 18px; font-weight: bold;">Repeat Password:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="password" name="mpassword"></span></p>
        		          	 <input type="hidden" name="page" value="administrator.php"/>                                                        	      		
                                                         	      		
         </center>
      </div>
      <div class="modal-footer">
       <input type="submit" class="btn btn-success" value="Save" id="addmember" name="addmember"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>  
  <!--modal de triage -->
  <div id="triage" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
                    Triage <input style="border: none;background:#222d32" type="text" id="oldname" value="" readonly="readonly" />
	    	
        	</center></h3>
      </div>
      <div class="modal-body" >
        <center>
             
        	<form method="post" action="register.php" enctype='multipart/form-data' >        		
     <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Chest pain <br><br>
    <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='4' name="qcm_group1" style="transform: scale(2.5);" style="display: block;" >
          <br>  
          </span>
   </span>
   
      <span class="input-group-addon"   ><span class="fa fa-edit"></span>&nbsp;Loss of consciousness<br><br>
      <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='4' name="qcm_group2" style="transform: scale(2.5);" style="display: block;" >
          <br>  
          </span>
   </span>
     
    <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Poisoning<br><br>
    <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='4' name="qcm_group3" style="transform: scale(2.5);" style="display: block;" >
          <br>  
          </span>
   </span>
  </div>
  
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;&nbsp; Hustle &nbsp;&nbsp; <br><br>
    <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='4' name="qcm_group4" style="transform: scale(2.5);" style="display: block;">
          <br>  
          </span>
   </span>
      <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp; Burn or electrocution <br><br>
      <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='4' name="qcm_group5" style="transform: scale(2.5);"style="display: block;" >
          <br>  
          </span>
   </span>
      <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Serious trauma<br><br>
      <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='4' name="qcm_group6" style="transform: scale(2.5);"style="display: block;" >
          <br>  
          </span>
   </span>
   </div>

   <div class="input-group" style="margin-bottom:20px">
    <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Open fracture<br><br>
    <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='4' name="qcm_group7" style="transform: scale(2.5);" style="display: block;">
          <br>  
          </span>
   </span>


      <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Externalized bleeding<br><br>
      <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='4' name="qcm_group8" style="transform: scale(2.5);"style="display: block;"  >
          <br>  
          </span>
   </span>
   </div>

   <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;COPD asthma<br><br>
    <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='2' name="qcm_group9" style="transform: scale(2.5);" style="display: block;">
          <br>  
          </span>
   </span>
      <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Chronic Kidney Failure<br><br>
      <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='2' name="qcm_group10" style="transform: scale(2.5);" style="display: block;">
          <br>  
          </span>
   </span>
      <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Diabetes<br><br>
      <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='2' name="qcm_group11" style="transform: scale(2.5);" style="display: block;">
          <br>  
          </span>
   </span>
   </div>

   <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Cardiac history<br><br>
    <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='2' name="qcm_group12" style="transform: scale(2.5);" style="display: block;">
          <br>  
          </span>
   </span>
      <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Cirrhosis<br><br>
      <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='2' name="qcm_group13" style="transform: scale(2.5);" style="display: block;">
          <br>  
          </span>
   </span>
      <span class="input-group-addon"  ><span class="fa fa-edit"></span>&nbsp;Referred patient<br><br>
      <span id='' class="form-group form-check" >
           <input type="checkbox" class="form-check-input" id="exampleCheck1" value='2' name="qcm_group14" style="transform: scale(2.5);" style="display: block;">
          <br>  
          </span>
   </span>
   </div>
   
   
 
              	 <input type="hidden" name="userid" value="" id="userid"/>                                                        	      		
                                                        	      		

        </center>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="View Result" id="btn-second-modal_triage" name="btn_triage"   > &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>

  

  <!-- Modal 2 triage -->
<div class="modal fade" id="second-modal_triage" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="second-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background:#222d32">
        <h3 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;" id="second-modal-label">Triage Results</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" >

          <?php  $conn = mysqli_connect("localhost", "root", "", "clinic2");

          $query = "SELECT * FROM tbl_patients ORDER BY id DESC LIMIT 1";
         $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
          $somme = $row['Score'];
            } else {
             $somme = 0; // ou une autre valeur par défaut si la table est vide
             }

         mysqli_close($conn);

          ?>



          <label><b>Your Score is: <?php  echo $somme; ?></b></label><br><br>
          
          <?php
            if($somme >= 10){
              $resultat ='<div class="alert alert-danger  w3-blue w3-card" style="background-color: blue;" role="alert"><span style="color:white;font-weight:bold;">Immediate Admission</span></div>';
              echo $resultat;
              $case="Immidiate Admission";
            }else if($somme > 5){
              $resultat ='<div class="alert alert-warning w3-red w3-card" style="background-color: red;" role="alert"><span style="color:white;font-weight:bold;">Very Urgent Case</span></div>';
              echo $resultat;
              $case="Very Urgent Case";
            }else if($somme >= 1){
              $resultat ='<div class="alert alert-primary  w3-yellow  w3-card " style="background-color: yellow;" role="alert"><span style="color:white;font-weight:bold;"> Urgent Case</span></div>';
              echo $resultat;
              $case=" Urgent Case";
            }else{
              $resultat ='<div class="alert alert-success w3-green w3-card" style="background-color: green;" role="alert"><span style="color:white;font-weight:bold;">Non-Urgent Case</span></div>';
              echo $resultat;
              $case="Non-Urgent Case";
            }
          ?>
          <table border="2" cellpadding="5" cellspacing="5" width="90%" align="center"  style="border-collapse: collapse; font-size: 20px; text-align: center;">
            <tr style="text-align: center;"><th style="center;">&nbsp;&nbsp;&nbsp;Triage &nbsp;&nbsp;&nbsp;score</th><th class="w3-gray" style="background-color: #f2f2f2; font-weight: bold; center; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; >10 </th><th class="w3-red" style="background-color: #ff9a9e; color: white; font-weight: bold; center;">&nbsp;&nbsp;&nbsp;&nbsp; 5-9</th><th class="yellow" style="background-color: #fffecf; font-weight: bold;center;">&nbsp;&nbsp;&nbsp;&nbsp; 1-4</th><th class="w3-green" style="background-color: #b0e57c; font-weight: bold;center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</th></tr>
            <tr>
              <td style="font-weight: bold;">priority</td><td class="w3-gray" style="background-color: #f2f2f2;"> I: Shocking</td><td class="w3-red" style="background-color: #ff9a9e; color: white;"> II: Very Urgent</td><td class="w3-yellow" style="background-color: #fffecf;"> III: Urgent</td><td class="w3-green" style="background-color: #b0e57c;"> IV: Non-urgent</td>
            </tr>
            <tr> 
              <td style="font-weight: bold;">Time limit</td><td class="w3-gray" style="background-color: #f2f2f2;"> Immediate</td><td class="w3-red" style="background-color: #ff9a9e; color: white;"> <10 min </td> <td class="w3-yellow" style="background-color: #fffecf;"> <60 min</td><td class="w3-green" style="background-color: #b0e57c;"> <240 min</td>
            </tr>
          </table><br><br> 
          <form method="post" action="register.php"> 
          <div class="form-group">
  <label for="eventual-comment_triage">Eventual Comment:</label>
  <textarea class="form-control" id="eventual-comment_triage" name="eventual-comment_triage" rows="3"></textarea>
</div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" value="Send HL7 message" id="send_triagee" name="send_triage"   > &nbsp;
      </div>
      </form>
    </div>
  </div>
</div>












<!-- Modal 1  triage can't wait -->
<div class="modal fade"  id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"  style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <h3 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;" id="staticBackdropLabel"> Patient who Can't Wait for the inscription ! </h3>
        <input style="border: none;background:#222d32" type="text" id="oldname" value="" readonly="readonly" />
	    	
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        
      <form method="post" action="register.php" enctype='multipart/form-data' >
    <div class="row" style="margin-bottom:10px">
        <div class="col" >
            <span class="input-group-addon" ><span class="fa fa-user-plus"></span>&nbsp;Chest pain</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck1"value='4' name="qcm_groupp21" >
           </span>
        </div>
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Loss of consciousness</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck2" value='4' name="qcm_groupp22" >
           </span>
        </div>
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Poisoning</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck3" value='4' name="qcm_groupp23" >
           </span>
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Burn or electrocution</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck4" value='4' name="qcm_groupp24">
           </span>
        </div>
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Hustle</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck5" value='4' name="qcm_groupp25" >
           </span>
        </div>
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Serious trauma</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck6" value='4' name="qcm_groupp26">
           </span>
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Open fracture</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck7" value='4' name="qcm_groupp27" >
           </span>
        </div>
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Externalized bleeding</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck8" value='4' name="qcm_groupp.28" >
           </span>
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;COPD asthma</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck9" value='2' name="qcm_groupp29" >
           </span>
        </div>
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Chronic Kidney Failure</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck10" value='2' name="qcm_groupp210" >
           </span>
        </div>
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Diabetes</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck11" value='2' name="qcm_groupp211">
           </span>
        </div>
        </div>
        <div class="row" style="margin-bottom:10px">
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Cardiac history</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck12" value='2' name="qcm_groupp212">
           </span>
        </div>
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Cirrhosis</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck13" value='2' name="qcm_groupp213">
           </span>
        </div>
        <div class="col">
            <span class="input-group-addon"><span class="fa fa-user-plus"></span>&nbsp;Referred patient</span>
            <span class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck14" value='2' name="qcm_groupp214" > 

           </span>
        </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="btn_wait" value="View result"  id="btn-second-modal_wait" class="btn btn-primary" >
        <!--button id="btn-second-modal" type="button" name="submit" class="btn btn-primary"  >View Result </button>-->


        
      </div>
    </div>
  </div>
</div>


<!-- Modal 2 can't wait  -->
<div class="modal fade" id="second-modal_wait" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="second-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background:#222d32">
        <h3 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;" id="second-modal-label">Triage Results</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" >
          <?php  $conn = mysqli_connect("localhost", "root", "", "clinic2");

           $query = "SELECT * FROM tbl_patients ORDER BY id DESC LIMIT 1";
           $result = mysqli_query($conn, $query);

             if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
              $somme = $row['Score'];
            } else {
              $somme = 0; // ou une autre valeur par défaut si la table est vide
           }

            mysqli_close($conn);
 
            ?>

          <label><b>Your score is: <?php  echo $somme; ?></b></label><br><br>
          
          <?php
            if($somme >= 10){
              $resultat ='<div class="alert alert-danger  w3-blue w3-card" style="background-color: blue;" role="alert"><span style="color:white;font-weight:bold;">Immidiate Admission</span></div>';
              echo $resultat;
              $case="Immidiate Admission";
            }else if($somme > 5){
              $resultat ='<div class="alert alert-warning w3-red w3-card" style="background-color: red;" role="alert"><span style="color:white;font-weight:bold;">Very Urgent Case</span></div>';
              echo $resultat;
              $case="Very Urgent Case";
            }else if($somme >= 1){
              $resultat ='<div class="alert alert-primary  w3-yellow  w3-card " style="background-color: yellow;" role="alert"><span style="color:white;font-weight:bold;">Urgent Case</span></div>';
              echo $resultat;
              $case="Urgent Case";
            }else{
              $resultat ='<div class="alert alert-success w3-green w3-card" style="background-color: green;" role="alert"><span style="color:white;font-weight:bold;">Non-Urgent Case</span></div>';
              echo $resultat;
              $case="Non-Urgent Case";
            }
          ?>
          <table border="2" cellpadding="5" cellspacing="5" width="90%" align="center"  style="border-collapse: collapse; font-size: 20px; text-align: center;">
            <tr style="text-align: center;"><th style="center;">&nbsp;&nbsp;&nbsp;Triage &nbsp;&nbsp;&nbsp;score</th><th class="w3-gray" style="background-color: #f2f2f2; font-weight: bold;center ;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; >10 </th><th class="w3-red" style="background-color: #ff9a9e; color: white; font-weight: bold; center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5-9</th><th class="yellow" style="background-color: #fffecf; font-weight: bold;center;">&nbsp;&nbsp;&nbsp;&nbsp; 1-4</th><th class="w3-green" style="background-color: #b0e57c; font-weight: bold;center ;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</th></tr>
            <tr>
              <td style="font-weight: bold;">priority</td><td class="w3-gray" style="background-color: #f2f2f2;"> I: Shocking</td><td class="w3-red" style="background-color: #ff9a9e; color: white;"> II: Very Urgent</td><td class="w3-yellow" style="background-color: #fffecf;"> III: Urgent</td><td class="w3-green" style="background-color: #b0e57c;"> IV: Non-Urgent</td>
            </tr>
            <tr> 
              <td style="font-weight: bold;" >Time limit</td><td class="w3-gray" style="background-color: #f2f2f2;"> Immédiate</td><td class="w3-red" style="background-color: #ff9a9e; color: white;"> <10 min </td> <td class="w3-yellow" style="background-color: #fffecf;"> <60 min</td><td class="w3-green" style="background-color: #b0e57c;"> <240 min</td>
            </tr>
          </table><br><br>  
          <form method="post" action="register.php" >
          <div class="form-group">
  <label for="eventual-comment_wait">Eventual Comment:</label>
  <textarea class="form-control" id="eventual-comment_wait" name="eventual-comment_wait" rows="3"></textarea>
</div>
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" value="Complete patient details" id="send_waitt" name="send_wait"   > &nbsp;
      </div>
      </form>
    </div>
  </div>
</div>











 


<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse" >
          <div class="navbar-header">
            <button  type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <br>
            <br>
           </div>
        
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header" style="margin-top:10px">
              	
              	 <h4></h4>
              </li>
              <li class="treeview">
                <a href="administrator.php" class=''>
                <i class="fa fa-home"></i> <span>Home </span>
                <i class="fa fa-angle-left pull-right"></i><small class="label pull-right label-info1"><?php  ?></small></a>
                
              </li>
                <?php
               
              $sql ="SELECT * FROM tbl_userprivilages WHERE Userid='$id' ";
                 $retr = mysqli_query($db,$sql);
                  while($found = mysqli_fetch_array($retr))
	             {
                     $adduser = $found['Adduser'];$manageuser= $found['Manageuser'];
					$logact= $found['Logactivities']; $addpat= $found['Addpatient'];
	        		$editpat = $found['Editpatient'];$managepat= $found['Managepatient'];$tripatient = $found['Tripatient'];																	   
				} 
			 ?>



			 <?php if($addpat=='Yes' || $editpat=="Yes" || $managepat=='Yes'){
               	  ?>
				  <li class="treeview">
                <a href="#">                
                   <i class="fa fa-users"></i>
                <span>Patients</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                <?php if($addpat=='Yes'){ echo"<li><a href='#'   class='addpatient' ><i class='fa fa-plus'></i>Add patient(Form)</a></li>"; }?>
                <?php if($managepat=='Yes' && $editpat=="Yes"){ echo"<li><a href='#' class='managepatients'><i class='fa fa-plus'></i>Find patient</a></li>";}?>
                <?php if($managepat=='Yes' && $editpat!=="Yes"){ echo"<li><a href='#' class='managepatients1'><i class='fa fa-plus'></i>Find patient</a></li>";}?>
                <?php if($managepat!=='Yes' && $editpat=="Yes"){ echo"<li><a href='#' class='managepatients2'><i class='fa fa-plus'></i>Find patient</a></li>";}?>
                <?php if($managepat!=='Yes' && $editpat!=="Yes"){ echo"<li><a href='#' class='managepatients3'><i class='fa fa-plus'></i>Find patient</a></li>";}?>

                </ul>
              </li>
				
              
              <?php } ?>
                  
                <?php 
               if($tripatient=='Yes'){?>
              <li class="treeview">
                <a href="#" class=''>
                <i class="fa fa-sort"></i>
                <span>Triage SAU</span>
                <i class="fa fa-angle-left pull-right"></i>
                <small class="label pull-right label-primary"></small></a>
                </a>
                <ul class="treeview-menu">
                <?php if($tripatient=='Yes'){ echo"<li><a href='#'   class='completer_données' ><i class='fa fa-plus'></i>Compléter données patient (Form)</a></li>"; }?>
                <?php if ($tripatient == 'Yes') { ?>
                  <button type="button" class="btn btn-danger" id="b_2" data-toggle="modal" data-target="#staticBackdrop">
  		             Can't Wait !
	               </button>
	               <div id="result-message"><?php  ?></div>
	               <script>
    $('#b_2').one('click', function () {
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
          $('#b_2').prop('disabled', false);
        }
      });
    
    });
  </script>
               <?php } ?>
                 </ul>
              </li>
              <?php } ?>

              </li>
              
               <?php 
               if($adduser=='Yes' || $logact=="Yes" || $manageuser=='Yes'){?>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Set up</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                <?php if($adduser=='Yes'){ echo"<li><a data-toggle='modal' data-id='' href='#Useradd' class='open-adduser' ><i class='fa fa-plus'></i>Add System User</a></li>"; }?>
                <?php if($manageuser=='Yes'){ echo"<li><a href='#'   class='manageusers' ><i class='fa fa-plus'></i>Manage System Users</a></li>"; }?>
                <?php if($logact=='Yes'){ echo"<li><a href='#' class='openreports' ><i class='fa fa-plus'></i>Users Log Activity</a></li>"; }?>
                 </ul>
              </li>
              <?php } ?>
                </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section">
			<div class="header-left" >
				<!--toggle button start-->
				<button id="showLeftPush" style="background-color: black"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
			
				
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				<div class="search-box" >
					<form class="input" >
						
					</form>
				</div><!--//end-search-box-->
				
				<div class="profile_details" >		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
								<span class="prfil-img">
										<?php   
										
                                                if($profile!=""){
												                 
																	echo"<img src='multimedia/pictures/$profile' height='50px' width='50px' alt=''>";	   
												             }
												        else{
												           	echo"<img src='admin/images/profile.png' height='50px' width='50px' alt=''>";	   
														     	
												             }										
										?>
										 </span> 
									<div class="user-name" >
										<p style="color:#1D809F;"><?php if(isset($sirname))
                                            {echo"<strong>".$firstname." ".$sirname."! </strong>";} ?>
				                         </p>
										<span><?php if(isset($sirname)){echo$role;} ?> &nbsp;<img src='admin/images/dot.png' height='15px' width='15px' alt=''>
										</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								 <li>
                                  <a data-toggle='modal' data-id='<?php echo$id; ?>' href='#Updatepicture' class='open-Updatepicture'><i class="fa fa-user"></i>Change profile picture</a>
                                 </li>
								<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper"  >
			<div class="main-page" style="">
		
		 <span id="results"><!-- results appear here --></span>

				
		</div>
				
	
		<div>
			&nbsp;
			</div>
			</div>
		</div>
	<!--footer-->
	<div class="footer">
	   <p>  <a href="#" target="">Triage des urgences</a></p>		
	</div>
    <!--//footer-->
	</div>
		
		<!-- Classie --><!-- for toggle left push menu script -->
		<script src="admin/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
			
	<!--scrolling js-->
	<script src="admin/js/jquery.nicescroll.js"></script>
	<script src="admin/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- side nav js -->
	<script src='admin/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- for index page weekly sales java script -->
	
	
	<!-- Bootstrap Core JavaScript -->
   <script src="admin/js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->



</body>
<script type="text/javascript">

	function PrintPage() {
		window.print();
	}
	
	 
</script>
</html>

<?php
if(isset($_GET['gs'])) 
          {	           
			  $id=$_GET['gs'];
              $query = "SELECT name,type,Size,content FROM Excelfiles WHERE id='$id' ";         
         $result = mysqli_query($db,$query) or die('Error, query failed');		 
     list($name, $type, $content) = mysqli_fetch_array($result);
	       $path = 'multimedia/'.$name;
		   $size = filesize($path);
	     header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header("Content-length:". $size);
         header("Content-type:". $type);
         header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
		 header('Content-Transfer-Encoding: binary');
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
     ob_clean();
       flush();
	       readfile('multimedia/'.$name);	
                mysqli_close();
                exit;      
	}
?>		  