<?php
session_start();
include("db_connect.php");
if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}


if(isset($_COOKIE['userid'])){$userid=$_COOKIE['userid'];}


   

				   
				
		      		
 if(isset($_POST['addmember']))
				   {
						$pagex = mysqli_real_escape_string($db,$_POST['page']);
						if($_POST['memail']!=''&&$_POST['mfname']!=''&&$_POST['msname']!=''&&$_POST['mphone']!=''&&$_POST['minstitution']!=''&&$_POST['mpassword']!='')
						 {              
						  
						 $mfname = mysqli_real_escape_string($db,$_POST['mfname']);
					  $msname = mysqli_real_escape_string($db,$_POST['msname']);		
					$memail=mysqli_real_escape_string($db,$_POST['memail']);
					  $mphone =mysqli_real_escape_string($db,$_POST['mphone']);
					   $minstititution = mysqli_real_escape_string($db,$_POST['minstitution']);
						 $mpassword = mysqli_real_escape_string($db,$_POST['mpassword']);
									  
		 
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
							   
							   $check="SELECT * FROM tbl_users WHERE Firstname='$mfname' && Sirname='$msname'";
						       $checks=mysqli_query($db,$check);
						  $found=mysqli_num_rows($checks);
							  if($found==0)
							  {
							  	$query = "INSERT INTO tbl_users (Firstname,Sirname,Mtitle,Email,Password,Phone,Role,Online) ".
                            "VALUES ('$mfname','$msname', '$mtitle','$memail','$mpassword','$mphone','$minstititution','Offline')";
                                 $db->query($query) or die('Error1, query failed');	
								 
								  $sqluser ="SELECT * FROM tbl_users WHERE Password='$mpassword' && Sirname='$msname'  ";
                                   $retrieved = mysqli_query($db,$sqluser);
                                 while($found = mysqli_fetch_array($retrieved))
	                              {
                                 	 $userid=$found['id']; 			              
				  	              }
								 $enter="INSERT INTO tbl_userprivilages (Userid) 
                               	     VALUES('$userid')";
                                  $db->query($enter);
								 
							     $memberadd="tyy";					  
			                     $_SESSION['memberadded']=$memberadd;
                                    header("Location:$pagex");  //member added successfully
				 
			  
			  
							  }else{
							  	$_SESSION['memberexist']="member already exist";
                                 header("Location:$pagex");  
				 
							  }
				}else{
					$_SESSION['emptytextboxes']="Not all text boxes were completed";
                                 header("Location:$pagex");  
				 
				    }
               
          
				}
               
 					 
?>