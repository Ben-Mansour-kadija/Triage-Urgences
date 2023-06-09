<?php
 
 $db = new mysqli("localhost","root","");
   if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  } 
     
	 $db->query("CREATE DATABASE IF NOT EXISTS `Clinic2`");
	 
             mysqli_select_db($db,"Clinic2");              

						 
			 $table2="CREATE TABLE IF NOT EXISTS tbl_users (id int(11) NOT NULL auto_increment,
                                  Firstname varchar(300)NOT NULL, 
                                  Sirname varchar(300)NOT NULL,
                                  Mtitle Varchar(30)NOT NULL, 
                                  Pic_name Varchar(30)NOT NULL,                                
                                  Phone varchar(30)NOT NULL,                                 
                                  Email varchar(300)NOT NULL,
                                  Password varchar(300)NOT NULL,
                                  Role varchar(30)NOT NULL,
                                  State varchar(30)NOT NULL, 
                                  Online varchar(300)NOT NULL,
                                  Time bigint(30)NOT NULL,                         
                                  PRIMARY KEY(id) )";
                         $db->query($table2); 
						 
        $table3="CREATE TABLE IF NOT EXISTS tbl_patients (id int(11) NOT NULL auto_increment,
                                  Mtitle Varchar(30)NOT NULL,
                                  Firstname varchar(300)NOT NULL,
                                  Middlename varchar(300)NOT NULL, 
                                  Sirname varchar(300)NOT NULL,                                 
                                  Gender Varchar(30)NOT NULL,
                                  Phone varchar(30)NOT NULL,                          
                                  NextKphone varchar(300)NOT NULL,                                  
                                  DOB varchar(300)NOT NULL,                                  
                                  Location varchar(300)NOT NULL,                                                                  
                                  Relation varchar(300)NOT NULL,                                  
                                  Guardian varchar(300)NOT NULL,
                                  Score varchar(300)NOT NULL,
                                  Comment varchar(300)NOT NULL,
                                  Date varchar(300)NOT NULL,                                
                                  PRIMARY KEY(id) )";
                         $db->query($table3);  
                                                    
                                  
                       
			$table9="CREATE TABLE IF NOT EXISTS tbl_userlogs (id int(11) NOT NULL auto_increment,
                                  Userid varchar(300)NOT NULL, 
                                  Machineip varchar(300)NOT NULL,
                                  Login varchar(300)NOT NULL,
                                  Logout varchar(300)NOT NULL,
                                  Activities varchar(3000)NOT NULL,
                                  Count varchar(3000)NOT NULL,
                                  PRIMARY KEY(id) )";
                         $db->query($table9); 
						 
                       $table3="CREATE TABLE IF NOT EXISTS tbl_userprivilages (id int(11) NOT NULL auto_increment,
                                  Userid Varchar(30)NOT NULL,
                                  Adduser varchar(3000)NOT NULL,
                                  Manageuser varchar(3000)NOT NULL,
                                  Logactivities varchar(3000)NOT NULL,
                                  Addpatient varchar(3000)NOT NULL,
                                  Editpatient varchar(3000)NOT NULL,
                                  Managepatient varchar(3000)NOT NULL,
                                  Tripatient varchar(3000)NOT NULL,
                                                                 
                                  PRIMARY KEY(id) )";
                         $db->query($table3);  
                         
                        
         
                          $stableZ="CREATE TABLE IF NOT EXISTS Excelfiles (id int(11) NOT NULL auto_increment,
                 ids varchar(30)NOT NULL,name varchar(1000)NOT NULL,type varchar(30)NOT NULL,
                 Size decimal(10)NOT NULL,content longblob NOT NULL,
                 PRIMARY KEY(id) )";
               $db->query($stableZ); 
			          		                
		
					$sql="SELECT * FROM tbl_users ";					
                   $result=mysqli_query($db,$sql);
                   $rowcount=mysqli_num_rows($result);
                     
                       if($rowcount==0)
                         {
                           $enter="INSERT INTO tbl_users (Password,Email,Firstname,Sirname,Mtitle,Phone,Role,State) VALUES('1234554321','test@clinic.com','Khadija','Ben Mansour','Miss','0999107724','System developper','Super')";
                                  $db->query($enter);
                            $enter="INSERT INTO tbl_users (Password,Email,Firstname,Sirname,Mtitle,Phone,Role) VALUES('12345','test11@clinic.com','Hedi','Ben Mansour','Dr','0888876600','Nurse')";
                                  $db->query($enter);  
                            $querydy = "INSERT INTO Excelfiles (ids,name,type,Size) ".
                                 "VALUES ('1','patients.csv','application/vnd.ms-excel','76')";                                 
                                     $db->query($querydy) or die('Errorr, query failed to upload');	
									 
						    
				    
                             
                         }
                     
					 		

?>