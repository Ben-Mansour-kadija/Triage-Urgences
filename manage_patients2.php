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
			  //$institution = $found['Institution'];	
			  $emails = $found['Email'];
			  	   $id= $found['id'];			  
          	   $role= $found['Role'];	
			    $profile='';
   
  	    }
}else{
	 header('location:index.php');
      exit;

}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Triage SAU System</title>
<link rel="stylesheet" href="css/reset.min.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" type="text/css" href="css/style2.css" />


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

<!-- chart -->
<script src="admin/js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
 
 <!-- <script src="jquery.js"></script> -->    
<link href="css/animate.min.css" rel="stylesheet"/>   
      <link rel="stylesheet" href="css/bootstrap-dropdownhover.css">

   
<link rel="stylesheet" href="data-table/jquery.dataTables.min.css"/>
 <link rel="stylesheet" href="data-table/buttons.dataTables.min.css"/>      


   <script src='data-table/jquery-1.12.4.js'></script>
   <script src='data-table/jquery.dataTables.min.js'></script>
   <script src='data-table/dataTables.buttons.min.js'></script>
   <script src='data-table/buttons.flash.min.js'></script>
   <script src='data-table/jszip.min.js'></script>
   <script src='data-table/pdfmake.min.js'></script>
   <script src='data-table/vfs_fonts.js'></script>
   <script src='data-table/buttons.html5.min.js'></script>
   <script src='data-table/buttons.print.min.js'></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">





      <script>
      
      
         $(document).ready(function() {
    $('#example').DataTable( {
        
    } );
        } );
      
      </script>

 	<!-- requried-jsfiles-for owl -->
									<!-- //requried-jsfiles-for owl -->
</head> 

			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">PATIENTS</h4>
					<!-- start content_slider -->
				<div class="alert alert-info">
                             <i class="fa fa-envelope"></i>&nbsp;This screen displays patients records use the search box to spool more records
                         </div>
					
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>No</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Location</th>                
                <th>Triage Infos</th>
				<th>Modifie</th>
                
            </tr>
        </thead>
        <tbody>
        	 <?php   $sqlmember ="SELECT * FROM tbl_patients  ORDER BY id DESC ";
			       $retrieve = mysqli_query($db,$sqlmember);
				                    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                       $title=$found['Mtitle'];$firstname=$found['Firstname'];$sirname=$found['Sirname'];
                       $phone=$found['Phone'];$location=$found['Location'];$picname=$found['Middlename'];
                       $id=$found['id']; $dob=$found['DOB'];$Next_of_kin=$found['Guardian'];$NextKphone=$found['NextKphone'];
			                $count=$count+1;   $gender=$found['Gender'];$relation=$found['Relation'];
			              $names= $title.' '.$firstname." ".$sirname;
					  
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
		$date=date('y-m-d');

				        echo"<tr>  
				             <td>$count</td>                                         
                             <td>$title $firstname $sirname</td>        	
                             <td>$age</td>
                             <td>$gender</td>
			                 <td>$location</td>
			                 	
							 <td>
                             <a data-toggle='modal' data-id='$id' class='open-Info btn btn-info' title='informations utilisateur'     >
                             <span class='glyphicon glyphicon-info-sign' style='color:white;'></span>
                             </a>
                             </td>
							 <td>
                              <a data-toggle='modal' data-id='$id' data-p1='$firstname' data-p2='$sirname'
							  data-p3='$title' data-p4='$picname' data-p5='$phone' data-p6='$location' 
							  data-p7='$dob' data-p8='$gender' data-p9='$Next_of_kin' data-p10='$NextKphone' data-p11='$relation' class='open-Editpatient btn btn-primary' title='modifier patient' href='#Modifie_patient'>
                              <span class='glyphicon glyphicon-edit' style='color:white;'></span>
                                </a>
                             </td>

						  			                 
			                 		 
                             </tr>"; 
					 
					 } 
		
		           	?>
            </tbody>
        
    </table>
                           
				        </div>
		
				</div>
