<?

$servername = "localhost";
$username = "theolive_jmadmin";
$password = "tVcW;g&K0_QZ";
$dbname = "theolive_jmullen";
	

// get records from Import table
$sqlImport = "select FirstName, LastName, FirstVisitdate, Gender as gender, DOB, Age, CurrentAddress, NoFixedAbode as NFA, TelNo, RegDisable as RegDisabled, HelpFromOthers, HowDidyouhearaboutTOB as WhereHeardOfTOB,
NatInsNo as NatInsuranceNo, WeededOut, EtnicityDesc as Ethnicity  from  mdbImportGuests15May";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = $conn->query($sqlImport);

if ($result->num_rows > 0) {
	
	 while($row = $result->fetch_assoc()) 
	 {
	//	 var_dump($row) . "<hr/>";
		
		
		
		
		
	$sqlInsert =  "insert into guests (
						FirstName, 
						LastName, 
						FirstVisitdate, 
						gender, 
						Age, 
						CurrentAddress, 
						NFA, 
						TelNo, 
						RegDisabled, 
						HelpFromOthers, 
						WhereHeardOfTOB, 
						NatInsuranceNo, 
						WeededOut, 
						Ethnicity 
						) values (
							
						'".	mysqli_real_escape_string($conn,$row["FirstName"]) ."' , 
						'".	mysqli_real_escape_string($conn,$row["LastName"]) ."' , 
						'".	$row["FirstVisitdate"] ."' , 
						'".	$row["gender"] ."' ,
						'".	$row["Age"] ."' ,
						'".	mysqli_real_escape_string($conn,$row["CurrentAddress"]) ."' , 
						'".	$row["NFA"] ."' ,
						'".	$row["TelNo"] ."' ,
						'".	$row["RegDisabled"] ."' , 
						'".	$row["HelpFromOthers"] ."' ,
						'".	$row["WhereHeardOfTOB"] ."' ,
						'".	$row["NatInsuranceNo"] ."' ,
						'".	$row["WeededOut"] ."' ,
						'".	$row["Ethnicity"] ."' 							
							
						)";
	
	
//	$sqlInsert = mysql_real_escape_string($conn, $sqlInsert);
	
	
						if (mysqli_query($conn, $sqlInsert)) {
					echo "New record created successfully <br/>";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
	
		
	//	echo $sqlInsert . "<br/><br/>";
		 
		 }

}


?>
