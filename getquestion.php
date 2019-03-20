<?php
include 'cn.php';
//$qid = $_GET["qid"];

if(isset($_GET["qid"]) && is_numeric($_GET["qid"]))
{
     $qid = $_GET["qid"];
}else{
     $qid ="1";
}

//Connect to Database
$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }


$qry ='select * from questions where id = ' . $qid . ' order by id ASC limit 2' ;
echo "qry=". $qry;
//Get the question and answer
$rs = mysqli_query($con,$qry);
$row = mysqli_fetch_row($rs);

                                                                                                                             
{

     $question = $row[2];
     $answer = $row[5];
	 $curid = $row[0];
	 $cat = $row[8];
	 $grade = $row[7];
     
	 $qry = 'SELECT * FROM questions WHERE id >'. $curid .' ORDER BY id ASC limit 1';
	 //echo "qry=" .$qry;
     //Get next question
     $NxtRs = mysqli_query($con, $qry);
     $NxtRow = mysqli_fetch_row($NxtRs);
     if($NxtRow)
     {
	   $Nxtid = $NxtRow[0];
	   $NxtQues = $NxtRow[2];
      }

     ?><h4><a href="gradeindex.php?grade= <?= $grade ?>" > Grade <?= $grade ?> </a> -> <?= $cat ?></h4>
	 
	 <h3><?= $question ?> </h3>
	 <div id ="<?= $Nxtid ?>" class="Qclass">
	 <button id="btn1">check ans</button></div>
<?php
}
//Close db connection
 unset($row);
 unset($NxtRow);
 mysqli_free_result($rs);
 mysqli_free_result($NxtRs);
 mysqli_close($con);

?>

