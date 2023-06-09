<?php
session_start();
include("db_connect.php");
if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}


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
			   $ttle= $found['Mtitle'];	
			    $profile="";
              $authorizer=$ttle.' '.$firstname.' '.$sirname;
  	    }
}
            
 if(isset($_POST['Userprivilages'])){
 	          $userid =mysqli_real_escape_string($db,$_POST["userid"]);	        //password variable               
       			      //$adduser = mysqli_real_escape_string($db,$_POST["adduser"]); //Sirname variable
           if (isset($_POST["adduser"])) {  $adduser="Yes"; } else { $adduser="No"; }
           if (isset($_POST["manageuser"])){ $edituser="Yes"; }  else {$edituser="No";}
           if (isset($_POST["logactivities"])) {$logactivities="Yes"; } else {$logactivities="No"; }
           if (isset($_POST["addpatient"])) {  $addpatient="Yes"; } else { $addpatient="No"; }
           if (isset($_POST["editpatients"])){ $editpatients="Yes"; }  else {$editpatients="No";}
           if (isset($_POST["managep"])) {$managep="Yes"; } else {$managep="No"; }
           if (isset($_POST["tripatient"])) {  $tripatient="Yes"; } else { $tripatient="No"; }

		   
		  $sqln="SELECT * FROM tbl_userprivilages WHERE Userid='$userid' ";
                   $resultn=mysqli_query($db,$sqln);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {
                             	 $enter="UPDATE tbl_userprivilages SET Adduser='$adduser',Manageuser='$edituser',Logactivities='$logactivities',
                             	 Addpatient='$addpatient',Editpatient='$editpatients',Managepatient='$managep',Tripatient='$tripatient'
                             	  WHERE Userid='$userid' ";
                                  $db->query($enter);
								  
                                  $_SESSION['priv']="Pamzey";
								  
								 header("Location:administrator.php");
								                             
                         }
                      else{
                      	     	  $enter="INSERT INTO tbl_userprivilages (Userid,Adduser,Manageuser,Logactivities,Addpatient,Editpatient,Managepatient,Tripatient) 
                               	     VALUES('$userid','$adduser','$edituser','$logactivities','$addpatient','$editpatients','$managep','$tripatient')";
                                  $db->query($enter);
								   $_SESSION['priv']="Pamzey";
								  
								 header("Location:administrator.php");
					
								
					      }                
                     }  
					 
					
					
			
                 
if(isset($_POST['submited2'])){
	if($_POST['dob']!=''&&$_POST['fname']!=''&&$_POST['lname']!=''&&$_POST['phone']!=''&&$_POST['gender']!=''&&$_POST['village']!='')
   {
			  $fname = mysqli_real_escape_string($db,$_POST["fname"]);      //first name variable
			  $mname = mysqli_real_escape_string($db,$_POST["mname"]);	//middle name variable
			  $sname =mysqli_real_escape_string($db,$_POST["lname"]);	        //last name variable
			  $gender = mysqli_real_escape_string($db,$_POST["gender"]);       //gender variable			  
              $phone =mysqli_real_escape_string($db,$_POST["phone"]);       //patient_phone variable
			  $kphone = mysqli_real_escape_string($db,$_POST["kphone"]);      //Next_of_kin_phone variable
	          $guardian= mysqli_real_escape_string($db,$_POST["guardian"]);//Next_of_kin_name variable			 
			 $village = mysqli_real_escape_string($db,$_POST["village"]);       //village variable				 
			 $relationship = mysqli_real_escape_string($db,$_POST["relationshipd"]);	//Next_of_kin_relation_ship variable
			  $dob = mysqli_real_escape_string($db,$_POST["dob"]);	        //Dob variable
		     
			
			 if (isset($_POST["mr"]))
                                 {
     	                           $mtitle="Mr";
								 }
                 elseif(isset($_POST["miss"]))
                                 {     	
		                           $mtitle="Miss";
                                  }
                 elseif(isset($_POST["mrs"]))
                                   {     	
		                      $mtitle="Mrs";
                                   }	 
                 elseif (isset($_POST["dr"]))
                                  {
     	
		                           $mtitle="Dr";
								  }
			    elseif (isset($_POST["pro"]))
                               {   $mtitle="Pro";
								  }
				               else	
				               {
				               	$mtitle="";
				               }
							   
							     $date= date("d-m-y");
   
		  $sql="SELECT * FROM tbl_patients WHERE Firstname='$fname' && Sirname='$sname' && DOB='$dob'";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                                           						
							 $sqln = "INSERT INTO tbl_patients (Mtitle,Firstname,Middlename,Sirname,Gender,Phone,NextKphone,DOB,Location,Guardian,Relation,Date)
			               VALUES ('$mtitle','$fname','$mname','$sname','$gender','$phone','$kphone','$dob','$village','$guardian','$relationship','$date')";
		                     $db->query($sqln);
							          $_SESSION['addpetient']="KK";
								  
								 header("Location:administrator.php");
								 
					        $activity="Registered new patient ".$mtitle." ".$fname.' '.$sname." ";	   
 	               
								                             
                         }
						else{
							$_SESSION['patientexist']="patient already exist";
						   header("Location:administrator.php");  
		   
						}

					}else{
							$_SESSION['emptytextboxespatient']="Not all text boxes were completed";
										 header("Location:administrator.php");  
						 
							}      
                     } 


if(isset($_POST['submitedd3'])){
						if($_POST['dob']!=''&&$_POST['fname']!=''&&$_POST['lname']!=''&&$_POST['phone']!=''&&$_POST['gender']!=''&&$_POST['village']!='')
					   {
								  $fname = mysqli_real_escape_string($db,$_POST["fname"]);      //first name variable
								  $mname = mysqli_real_escape_string($db,$_POST["mname"]);	//middle name variable
								  $sname =mysqli_real_escape_string($db,$_POST["lname"]);	        //last name variable
								  $gender = mysqli_real_escape_string($db,$_POST["gender"]);       //gender variable			  
								  $phone =mysqli_real_escape_string($db,$_POST["phone"]);       //patient_phone variable
								  $kphone = mysqli_real_escape_string($db,$_POST["kphone"]);      //Next_of_kin_phone variable
								  $guardian= mysqli_real_escape_string($db,$_POST["guardian"]);//Next_of_kin_name variable			 
								 $village = mysqli_real_escape_string($db,$_POST["village"]);       //village variable				 
								 $relationship = mysqli_real_escape_string($db,$_POST["relationshipd"]);	//Next_of_kin_relation_ship variable
								  $dob = mysqli_real_escape_string($db,$_POST["dob"]);	        //Dob variable
								 
								
								 if (isset($_POST["mr"]))
													 {
														$mtitle="Mr";
													 }
									 elseif(isset($_POST["miss"]))
													 {     	
													   $mtitle="Miss";
													  }
									 elseif(isset($_POST["mrs"]))
													   {     	
												  $mtitle="Mrs";
													   }	 
									 elseif (isset($_POST["dr"]))
													  {
							 
													   $mtitle="Dr";
													  }
									elseif (isset($_POST["pro"]))
												   {   $mtitle="Pro";
													  }
												   else	
												   {
													   $mtitle="";
												   }
												   
													 $date= date("d-m-y");

													 $sqql="SELECT MAX(id) as last_id FROM tbl_patients";
													 $resulten=mysqli_query($db,$sqql);                    
													 if ($resulten) {
														$row = mysqli_fetch_assoc($resulten);
														$last_patient_id = $row['last_id'];
														} else {
															echo "Erreur lors de l'exécution de la requête: " . mysqli_error($db);
														
														}

							  $sql="SELECT * FROM tbl_patients WHERE Firstname='$fname' && Sirname='$sname' && DOB='$dob'";
									   $resultn=mysqli_query($db,$sql);                    
											 if($rowcount=mysqli_num_rows($resultn)==0)
											 {                                           						
												 $sqln = "UPDATE `tbl_patients` SET `Mtitle`='$mtitle',`Firstname`='$fname',`Middlename`='$mname',`Sirname`='$sname',`Gender`='$gender',`Phone`='$phone',`NextKphone`='$kphone',`DOB`='$dob',`Location`='$village',`Relation`='$relationship',`Guardian`='$guardian',`Date`='$date' WHERE id=$last_patient_id";
												 $db->query($sqln);
														  $_SESSION['complited']="KkK";
														  header("Location:administrator.php");  

													  $_SESSION['send_1']="ttttttttttt";
													 header("Location:administrator.php");
													 
												$activity="Complete patient details ".$mtitle." ".$fname.' '.$sname." ";	   
										
																				 
											 }
											else{
												$_SESSION['patientexist']="patient already exist";
											   header("Location:administrator.php");  
							   
											}
					
										}else{
												$_SESSION['emptytextboxespatient']="Not all text boxes were completed";
															 header("Location:administrator.php");  
											 
												}      
										 } 
					


  if(isset($_POST['Valuedel'])){ 	
	
	 $id=$_POST['Valuedel'];
	                $sql="SELECT * FROM tbl_users WHERE id='$id' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
      	                 $activity="Staff ".$fname.' '.$oname." deleted from the system";			       
	   
 	 $querry="SELECT * FROM tbl_users WHERE id='$id' ";
                     $results=mysqli_query($db,$querry);
                    $checks=mysqli_num_rows($results);
                     if($checks!=0)
                     {
      	 	                    $enters="DELETE FROM tbl_users  WHERE id='$id'";
                                 $db->query($enters);
                                 
								   $enters1="DELETE FROM tbl_userprivilages  WHERE Userid='$id'";
                                 $db->query($enters1);
                               
				      }
	             echo"098"; 
 } 
if(isset($_POST['Valuedel2'])){
	
	$id=$_POST['Valuedel2'];
	$userid=$_POST['valu3'];
	                $sql="SELECT * FROM tbl_users WHERE id='$userid' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
      	                 $activity="Staff ".$fname.' '.$oname." logs deleted from the system";			       
	   
 	 $querry="SELECT * FROM tbl_userlogs WHERE id='$id' ";
                     $results=mysqli_query($db,$querry);
                    $checks=mysqli_num_rows($results);
                     if($checks!=0)
                     {
      	 	                    $enters="DELETE FROM tbl_userlogs WHERE id='$id'";
                                 $db->query($enters);
                               
				      }
	  	
	
	             echo"098"; 
 }
 if(isset($_POST['Valuede3'])){ 	
	
	$id=$_POST['Valuede3'];
				   $sql="SELECT * FROM tbl_patient WHERE id='$id' ";
				  $resultn=mysqli_query($db,$sql);                    
						if($rowcount=mysqli_num_rows($resultn)!=0)
						{                                           						
							while($found = mysqli_fetch_array($resultn))
								  {
									$fname = $found['Firstname'];
									$oname = $found['Sirname'];
								  } 			                             
						}
						  $activity="Patient ".$fname.' '.$oname." deleted from the system";			       
	  
	 $querry="SELECT * FROM tbl_patient WHERE id='$id' ";
					$results=mysqli_query($db,$querry);
				   $checks=mysqli_num_rows($results);
					if($checks!=0)
					{
								  $enters="DELETE FROM tbl_patient  WHERE id='$id'";
								$db->query($enters);
								
								  
					 }
				echo"099"; 
} 
if(isset($_POST['resetpass'])){
	 	                  
						  $oldpass=$_POST['oldpassword'];
	                      $newpass=$_POST['newpassword'];	 							
	 	                   $pager=$_POST['page'];  
	 	                   
						   $sql="SELECT * FROM tbl_users WHERE Password='$oldpass' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                            
	 	                           $qulikes = "UPDATE tbl_users Set Password='$newpass' WHERE Password='$oldpass' ";
						            $db->query($qulikes) or die('Errorr, query failed');
		                        
		                          $activity="Changed password of .".$fname.' .'.$onam;			       
		
						            $_SESSION['pass']="okjs";				
                                    header("Location:administrator.php");
 }

 if(isset($_POST['Modifie_user'])){
	 	                  
	$oldfname=$_POST['oldfname'];
	$newfname=$_POST['newfname'];
	$oldsirname=$_POST['oldsirname'];
	$newsirname=$_POST['newsirname'];
	$oldmtitle=$_POST['oldmtitle'];
	$newmtitle=$_POST['newmtitle'];

	$oldpicname=$_POST['oldpicname'];
	$newpicname=$_POST['newpicname'];
	$oldphone=$_POST['oldphone'];
	$newphone=$_POST['newphone'];
	
	$oldemail=$_POST['oldemail'];
	$newemail=$_POST['newemail'];
	$oldrole=$_POST['oldrole'];
	$newrole=$_POST['newrole'];
									 
	  $pager=$_POST['page'];  
	  
	 $sql="SELECT * FROM tbl_users WHERE Firstname='$oldfname' ";
$resultn=mysqli_query($db,$sql);                    
   if($rowcount=mysqli_num_rows($resultn)!=0)
   {                                           						
	   while($found = mysqli_fetch_array($resultn))
			 {
			   $fname = $found['Firstname'];
			   $oname = $found['Sirname'];
			 } 			                             
   }
	  if($newfname!=''){
			  $qulikes = "UPDATE tbl_users Set Firstname='$newfname' WHERE Firstname='$oldfname' ";
			  $db->query($qulikes) or die('Errorr, query failed');
		  
			  $activity="Changed Firstname of .".$fname.' .'.$onam;	 
			  $_SESSION['Modifie_user']="okjs";				
			 }
			 if($newpicname!=''){

			  $qulikes = "UPDATE tbl_users Set Pic_name='$newpicname' WHERE Pic_name='$oldpicname' ";
			  $db->query($qulikes) or die('Errorr, query failed');
		
			  $activity="Changed Pic_name of .".$fname.' .'.$onam;
			  $_SESSION['Modifie_user']="okjs";				
			 }
			 if($newsirname!=''){ 
			  $qulikes = "UPDATE tbl_users Set Sirname='$newsirname' WHERE Sirname='$oldsirname' ";
			  $db->query($qulikes) or die('Errorr, query failed');
	  
			  $activity="Changed Sirname of .".$fname.' .'.$onam;
			  $_SESSION['Modifie_user']="okjs";				
			 }
			 if($newmtitle!=''){    
			  $qulikes = "UPDATE tbl_users Set Mtitle='$newmtitle' WHERE Mtitle='$oldmtitle' ";
			  $db->query($qulikes) or die('Errorr, query failed');
	
			  $activity="Changed Mtitle of .".$fname.' .'.$onam;
			  $_SESSION['Modifie_user']="okjs";				
			 }
			 if($newemail!=''){   
			  $qulikes = "UPDATE tbl_users Set Email='$newemail' WHERE Email='$oldemail' ";
			  $db->query($qulikes) or die('Errorr, query failed');
  
			   $activity="Changed Email of .".$fname.' .'.$onam;	
			   $_SESSION['Modifie_user']="okjs";				
			 }
			 if($newphone!=''){
			   $qulikes = "UPDATE tbl_users Set Phone='$newphone' WHERE Phone='$oldphone' ";
			   $db->query($qulikes) or die('Errorr, query failed');

			   $activity="Changed phone of .".$fname.' .'.$onam;
			   $_SESSION['Modifie_user']="okjs";				
			 }
			 if($newrole!=''){  
			   $qulikes = "UPDATE tbl_users Set Role='$newrole' WHERE Role='$oldrole' ";
			   $db->query($qulikes) or die('Errorr, query failed');
		  
			   $activity="Changed Role of .".$fname.' .'.$onam;			       


			   $_SESSION['Modifie_user']="okjs";	
			 }			
			   header("Location:administrator.php");
}


if(isset($_POST['Modifie_patient'])){
	 	                  
	$oldfname=$_POST['oldfname'];
	$newfname=$_POST['newfname'];

	$oldsirname=$_POST['oldsirname'];
	$newsirname=$_POST['newsirname'];

	$oldmtitle=$_POST['oldmtitle'];
	$newmtitle=$_POST['newmtitle'];
  
	$oldpicname=$_POST['oldpicname'];
	$newpicname=$_POST['newpicname'];

	$oldphone=$_POST['oldphone'];
	$newphone=$_POST['newphone'];
	
	$oldlocation=$_POST['oldlocation'];
	$newlocation=$_POST['newlocation'];

	$olddob=$_POST['olddob'];
	$newdob=$_POST['newdob'];

	$oldgender=$_POST['oldgender'];
	$newgender=$_POST['newgender'];

	$oldNext_of_kin=$_POST['oldNext_of_kin'];
	$newNext_of_kin=$_POST['newNext_of_kin'];

	$oldNextKphone=$_POST['oldNextKphone'];
	$newNextKphone=$_POST['newNextKphone'];

	$oldrelation=$_POST['oldrelation'];
	$newrelation=$_POST['newrelation'];

	
					 
	  $pager=$_POST['page'];  
	  
	 $sql="SELECT * FROM tbl_patients WHERE Firstname='$oldfname' ";
  $resultn=mysqli_query($db,$sql);                    
	 if($rowcount=mysqli_num_rows($resultn)!=0)
	 {                                           						
	   while($found = mysqli_fetch_array($resultn))
		 {
		   $fname = $found['Firstname'];
		   $oname = $found['Sirname'];
		 } 			                             
	 }
	  if($newfname!=''){
		  $qulikes = "UPDATE tbl_patients Set Firstname='$newfname' WHERE Firstname='$oldfname' ";
		  $db->query($qulikes) or die('Errorr, query failed');
		
		  $activity="Changed Firstname of .".$fname.' .'.$onam;	 
		  $_SESSION['Modifie_patient']="okjs";				
		 }
		 if($newpicname!=''){
  
		  $qulikes = "UPDATE tbl_patients Set Middlename='$newpicname' WHERE Middlename='$oldpicname' ";
		  $db->query($qulikes) or die('Errorr, query failed');
	  
		  $activity="Changed Middlename of .".$fname.' .'.$onam;
		  $_SESSION['Modifie_patient']="okjs";				
		 }
		 if($newsirname!=''){ 
		  $qulikes = "UPDATE tbl_patients Set Sirname='$newsirname' WHERE Sirname='$oldsirname' ";
		  $db->query($qulikes) or die('Errorr, query failed');
	  
		  $activity="Changed Sirname of .".$fname.' .'.$onam;
		  $_SESSION['Modifie_patient']="okjs";				
		 }
		 if($newmtitle!=''){    
		  $qulikes = "UPDATE tbl_patients Set Mtitle='$newmtitle' WHERE Mtitle='$oldmtitle' ";
		  $db->query($qulikes) or die('Errorr, query failed');
	
		  $activity="Changed Mtitle of .".$fname.' .'.$onam;
		  $_SESSION['Modifie_patient']="okjs";				
		 }
		 if($newlocation!=''){   
		  $qulikes = "UPDATE tbl_patients Set location='$newlocation' WHERE location='$oldlocation' ";
		  $db->query($qulikes) or die('Errorr, query failed');
	
		   $activity="Changed location of .".$fname.' .'.$onam;	
		   $_SESSION['Modifie_patient']="okjs";				
		 }
		 if($newphone!=''){
		   $qulikes = "UPDATE tbl_patients Set Phone='$newphone' WHERE Phone='$oldphone' ";
		   $db->query($qulikes) or die('Errorr, query failed');
  
		   $activity="Changed phone of .".$fname.' .'.$onam;
		   $_SESSION['Modifie_patient']="okjs";				
		 }
		 if($newdob!=''){  
		   $qulikes = "UPDATE tbl_patients Set dob='$newdob' WHERE dob='$olddob' ";
		   $db->query($qulikes) or die('Errorr, query failed');
		
		   $activity="Changed dob of .".$fname.' .'.$onam;			       
  
  
		   $_SESSION['Modifie_patient']="okjs";	
		 }			

		 if($newgender!=''){  
		  $qulikes = "UPDATE tbl_patients Set gender='$newgender' WHERE gender='$oldgender' ";
		  $db->query($qulikes) or die('Errorr, query failed');
	   
		  $activity="Changed gender of .".$fname.' .'.$onam;			       
 
 
		  $_SESSION['Modifie_patient']="okjs";	
		}			
		if($newNext_of_kin!=''){  
		  $qulikes = "UPDATE tbl_patients Set Next_of_kin='$newNext_of_kin' WHERE Next_of_kin='$oldNext_of_kin' ";
		  $db->query($qulikes) or die('Errorr, query failed');
	   
		  $activity="Changed Next_of_kin of .".$fname.' .'.$onam;			       
 
 
		  $_SESSION['Modifie_patient']="okjs";	
		}			
		if($newNextKphone!=''){  
		  $qulikes = "UPDATE tbl_patients Set NextKphone='$newNextKphone' WHERE NextKphone='$oldNextKphone' ";
		  $db->query($qulikes) or die('Errorr, query failed');
	   
		  $activity="Changed NextKphone of .".$fname.' .'.$onam;			       
 
 
		  $_SESSION['Modifie_patient']="okjs";	
		}			
		if($newrelation!=''){  
		  $qulikes = "UPDATE tbl_patients Set relation='$newrelation' WHERE relation='$oldrelation' ";
		  $db->query($qulikes) or die('Errorr, query failed');
	   
		  $activity="Changed relation of .".$fname.' .'.$onam;			       
 
 
		  $_SESSION['Modifie_patient']="okjs";	
		}			
		   header("Location:administrator.php");
  }



if(isset($activity)){			  
								   $login=$_COOKIE['login'];
	                                $user=$_COOKIE['user'];
	   	                            
								   $query = "SELECT * FROM tbl_userlogs WHERE Login='$login' && Userid='$user' ";
                      $result =mysqli_query($db,$query) or die('Error, query failed');
                        if( mysqli_num_rows($result) != 0)                         
                         {
                         	while($found = mysqli_fetch_array($result))
                         	{
                         		   $useractions= $found['Activities'];
								   $count= $found['Count'];
							}
				           if($useractions==''){
				           	          
									  $queryz = "UPDATE tbl_userlogs Set Activities='$activity',Count='1'  WHERE Login='$login' && Userid='$user' ";                        
                                    $db->query($queryz) or die('Errorr, query failed to upload');	
					        
				           }else{
				           	                     $count=$count+1;
				           	             $arry=explode('\n',$useractions);
                                      		array_push($arry,$activity);                                                      
                                                       $addaction=implode('\n',$arry);
                                       	$queryz = "UPDATE tbl_userlogs Set Activities='$addaction',Count='$count'  WHERE Login='$login' && Userid='$user' ";                        
                                    $db->query($queryz) or die('Errorr, query failed to upload');	
					           
                                      	
						   }  }
                                    }
 ?> 




<?php

if(isset($_POST['btn_wait'])) {
	$somme=0;
	$response = ""; // initialiser la variable de réponse


// Vérifie si le formulaire a été soumis
if (isset($_POST['qcm_groupp21']) || isset($_POST['qcm_groupp22']) || isset($_POST['qcm_groupp23']) || isset($_POST['qcm_groupp24']) || isset($_POST['qcm_groupp25']) || isset($_POST['qcm_groupp26']) || isset($_POST['qcm_groupp27']) || isset($_POST['qcm_groupp28']) || isset($_POST['qcm_groupp29']) || isset($_POST['qcm_groupp210']) || isset($_POST['qcm_groupp211']) || isset($_POST['qcm_groupp212']) || isset($_POST['qcm_groupp213']) || isset($_POST['qcm_groupp214'])) {
  // Récupère les valeurs des cases cochées et les échappe
  $qcm_groupp21 = isset($_POST['qcm_groupp21']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp21']) : 0;
  $qcm_groupp22 = isset($_POST['qcm_groupp22']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp22']) : 0;
  $qcm_groupp23 = isset($_POST['qcm_groupp23']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp23']) : 0;
  $qcm_groupp24 = isset($_POST['qcm_groupp24']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp24']) : 0;
  $qcm_groupp25 = isset($_POST['qcm_groupp25']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp25']) : 0;
  $qcm_groupp26 = isset($_POST['qcm_groupp26']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp26']) : 0;
  $qcm_groupp27 = isset($_POST['qcm_groupp27']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp27']) : 0;
  $qcm_groupp28 = isset($_POST['qcm_groupp28']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp28']) : 0;
  $qcm_groupp29 = isset($_POST['qcm_groupp29']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp29']) : 0;
  $qcm_groupp210 = isset($_POST['qcm_groupp210']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp210']) : 0;
  $qcm_groupp211 = isset($_POST['qcm_groupp211']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp211']) : 0;
  $qcm_groupp212 = isset($_POST['qcm_groupp212']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp212']) : 0;
  $qcm_groupp213 = isset($_POST['qcm_groupp213']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp213']) : 0;
  $qcm_groupp214 = isset($_POST['qcm_groupp214']) ? mysqli_real_escape_string($db, $_POST['qcm_groupp214']) : 0;


  // Calcule la somme des options
  $somme =$somme+ $qcm_groupp21 + $qcm_groupp22 + $qcm_groupp23 + $qcm_groupp24+ $qcm_groupp25+ $qcm_groupp26+ $qcm_groupp27+ $qcm_groupp28+ $qcm_groupp29+ $qcm_groupp210+ $qcm_groupp211+ $qcm_groupp212+ $qcm_groupp213+ $qcm_groupp214;

  // Affiche le second modal avec la somme
  //$_SESSION['tri'] = "triage";
  //header("Location:administrator.php#second-modal_wait");

// return the sum as JSON
//header('Content-Type: application/json');
//echo json_encode(array('somme' => $somme));
//exit();




// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic2";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Récupérer l'ID du dernier patient enregistré
$query = "SELECT MAX(id) as last_id FROM tbl_patients";
$result1 = mysqli_query($conn, $query);

if ($result1) {
$row = mysqli_fetch_assoc($result1);
$last_patient_id = $row['last_id'];
} else {
    echo "Erreur lors de l'exécution de la requête: " . mysqli_error($conn);
}

// Ajouter le commentaire à la dernière ligne ajoutée
$query = "UPDATE tbl_patients SET Score='$somme' WHERE id=$last_patient_id";

$result1 = mysqli_query($conn, $query);

if ($result1) {
  echo "Le score a été enregistré avec succès.";
} else {
  echo "Erreur lors de l'enregistrement du score: " . mysqli_error($conn);
}

$conn->close();

$_SESSION['wait']="waiit";

header("Location:administrator.php");





}
else{

	$somme=0;

	// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic2";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Récupérer l'ID du dernier patient enregistré
$query = "SELECT MAX(id) as last_id FROM tbl_patients";
$result11 = mysqli_query($conn, $query);

if ($result11) {
$row = mysqli_fetch_assoc($result11);
$last_patient_id = $row['last_id'];
} else {
    echo "Erreur lors de l'exécution de la requête: " . mysqli_error($conn);
}

// Ajouter le commentaire à la dernière ligne ajoutée
$query = "UPDATE tbl_patients SET Score='$somme' WHERE id=$last_patient_id";

$result11 = mysqli_query($conn, $query);

if ($result11) {
  echo "Le score a été enregistré avec succès.";
} else {
  echo "Erreur lors de l'enregistrement du score: " . mysqli_error($conn);
}

$conn->close();

$_SESSION['wait']="waiit";

header("Location:administrator.php");






}
}
?>






<?php

if(isset($_POST['btn_triage'])) {
	$somme=0;
	$response = ""; // initialiser la variable de réponse


// Vérifie si le formulaire a été soumis
if (isset($_POST['qcm_group1']) || isset($_POST['qcm_group2']) || isset($_POST['qcm_group3']) || isset($_POST['qcm_group4']) || isset($_POST['qcm_group5']) || isset($_POST['qcm_group6']) || isset($_POST['qcm_group7']) || isset($_POST['qcm_group8']) || isset($_POST['qcm_group9']) || isset($_POST['qcm_group10']) || isset($_POST['qcm_group11']) || isset($_POST['qcm_group12']) || isset($_POST['qcm_group13']) || isset($_POST['qcm_group14'])) {
  // Récupère les valeurs des cases cochées et les échappe
  $qcm_group1 = isset($_POST['qcm_group1']) ? mysqli_real_escape_string($db, $_POST['qcm_group1']) : 0;
  $qcm_group2 = isset($_POST['qcm_group2']) ? mysqli_real_escape_string($db, $_POST['qcm_group2']) : 0;
  $qcm_group3 = isset($_POST['qcm_group3']) ? mysqli_real_escape_string($db, $_POST['qcm_group3']) : 0;
  $qcm_group4 = isset($_POST['qcm_group4']) ? mysqli_real_escape_string($db, $_POST['qcm_group4']) : 0;
  $qcm_group5 = isset($_POST['qcm_group5']) ? mysqli_real_escape_string($db, $_POST['qcm_group5']) : 0;
  $qcm_group6 = isset($_POST['qcm_group6']) ? mysqli_real_escape_string($db, $_POST['qcm_group6']) : 0;
  $qcm_group7 = isset($_POST['qcm_group7']) ? mysqli_real_escape_string($db, $_POST['qcm_group7']) : 0;
  $qcm_group8 = isset($_POST['qcm_group8']) ? mysqli_real_escape_string($db, $_POST['qcm_group8']) : 0;
  $qcm_group9 = isset($_POST['qcm_group9']) ? mysqli_real_escape_string($db, $_POST['qcm_group9']) : 0;
  $qcm_group10 = isset($_POST['qcm_group10']) ? mysqli_real_escape_string($db, $_POST['qcm_group10']) : 0;
  $qcm_group11 = isset($_POST['qcm_group11']) ? mysqli_real_escape_string($db, $_POST['qcm_group11']) : 0;
  $qcm_group12 = isset($_POST['qcm_group12']) ? mysqli_real_escape_string($db, $_POST['qcm_group12']) : 0;
  $qcm_group13 = isset($_POST['qcm_group13']) ? mysqli_real_escape_string($db, $_POST['qcm_group13']) : 0;
  $qcm_group14 = isset($_POST['qcm_group14']) ? mysqli_real_escape_string($db, $_POST['qcm_group14']) : 0;


  // Calcule la somme des options
  $somme =$somme+ $qcm_group1 + $qcm_group2 + $qcm_group3 + $qcm_group4+ $qcm_group5+ $qcm_group6+ $qcm_group7+ $qcm_group8+ $qcm_group9+ $qcm_group10+ $qcm_group11+ $qcm_group12+ $qcm_group13+ $qcm_group14;

  // Affiche le second modal avec la somme
  //$_SESSION['tri'] = "triage";
  //header("Location:administrator.php#second-modal_triage");

// return the sum as JSON
//header('Content-Type: application/json');
//echo json_encode(array('somme' => $somme));
//exit();



// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic2";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Récupérer l'ID du dernier patient enregistré
$query = "SELECT MAX(id) as last_id FROM tbl_patients";
$result2 = mysqli_query($conn, $query);
if($result2){
$row = mysqli_fetch_assoc($result2);
$last_patient_id = $row['last_id'];
}
else{
    echo "Erreur lors de l'exécution de la requête: " . mysqli_error($conn);

}
// Ajouter le commentaire à la dernière ligne ajoutée
$query = "UPDATE tbl_patients SET Score='$somme' WHERE id=$last_patient_id";

$result2 = mysqli_query($conn, $query);

if ($result2) {
  echo "Le score a été enregistré avec succès.";
} else {
  echo "Erreur lors de l'enregistrement du score: " . mysqli_error($conn);
}

$conn->close();
$_SESSION['triage']="triiage";


header("Location:administrator.php");


}

else{

	$somme=0;

	// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic2";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Récupérer l'ID du dernier patient enregistré
$query = "SELECT MAX(id) as last_id FROM tbl_patients";
$result22 = mysqli_query($conn, $query);

if ($result22) {
$row = mysqli_fetch_assoc($result22);
$last_patient_id = $row['last_id'];
} else {
    echo "Erreur lors de l'exécution de la requête: " . mysqli_error($conn);
}

// Ajouter le commentaire à la dernière ligne ajoutée
$query = "UPDATE tbl_patients SET Score='$somme' WHERE id=$last_patient_id";

$result22 = mysqli_query($conn, $query);

if ($result22) {
  echo "Le score a été enregistré avec succès.";
} else {
  echo "Erreur lors de l'enregistrement du score: " . mysqli_error($conn);
}

$conn->close();

$_SESSION['triage']="triiage";

header("Location:administrator.php");






}

}
?>





<?php
if(isset($_POST['send_wait'])) {

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic2";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Récupérer la valeur de la zone de texte
$comment = $_POST["eventual-comment_wait"];

// Récupérer l'ID du dernier patient enregistré
$query = "SELECT MAX(id) as last_id FROM tbl_patients";
$result3 = mysqli_query($conn, $query);
if ($result3) {
$row = mysqli_fetch_assoc($result3);
$last_patient_id = $row['last_id'];
} else {
	echo "Erreur lors de l'exécution de la requête: " . mysqli_error($conn);

}
// Ajouter le commentaire à la dernière ligne ajoutée
$query = "UPDATE tbl_patients SET Comment='$comment' WHERE id=$last_patient_id";

$result3 = mysqli_query($conn, $query);

if ($result3) {
  echo "Le commentaire a été enregistré avec succès.";
} else {
  echo "Erreur lors de l'enregistrement du commentaire: " . mysqli_error($conn);
}



$conn->close();

//$_SESSION['send_1']="ttttttttttt";
$_SESSION['comp']="ttttt";


header("Location:administrator.php");


}
?>


<?php
if(isset($_POST['send_triage'])) {

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic2";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Récupérer la valeur de la zone de texte
$comment = $_POST["eventual-comment_triage"];

// Récupérer l'ID du dernier patient enregistré
$query = "SELECT MAX(id) as last_id FROM tbl_patients";
$result4 = mysqli_query($conn, $query);
if ($result4) {
$row = mysqli_fetch_assoc($result4);
$last_patient_id = $row['last_id'];
} else {
	echo "Erreur lors de l'exécution de la requête: " . mysqli_error($conn);

}
// Ajouter le commentaire à la dernière ligne ajoutée
$query = "UPDATE tbl_patients SET Comment='$comment' WHERE id=$last_patient_id";

$result4 = mysqli_query($conn, $query);

if ($result4) {
  echo "Le commentaire a été enregistré avec succès.";
} else {
  echo "Erreur lors de l'enregistrement du commentaire: " . mysqli_error($conn);
}


$conn->close();

$_SESSION['send_2']="Ppppppppppp";



header("Location:administrator.php");


}
?>












