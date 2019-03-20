<?php include 'cn.php';
      include 'top.php' ;
?>

  <!-- Page
  ================================================== -->
  
  
  <div class="row">
      <div class="span3 clearfix">
	   <div class="separator">	</div><!-- separator -->
	      
   <div class="widget widget-list well">
          
          <ul class="nav nav-list">
		  <li><a href="gradeindex.php?grade=Pre-K"><i class="fa fa-edit fa-lg"></i> Pre-K</a></li>
		  <li><a href="gradeindex.php?grade=K"><i class="fa fa-edit fa-lg"></i> Grade K</a></li>
          <li><a href="gradeindex.php?grade=1"><i class="fa fa-edit fa-lg"></i> Grade 1</a></li>
          <li><a href="gradeindex.php?grade=2"><i class="fa fa-edit fa-lg"></i> Grade 2</a></li>
          <li><a href="gradeindex.php?grade=3"><i class="fa fa-edit fa-lg"></i> Grade 3</a></li>
          <li><a href="gradeindex.php?grade=4"><i class="fa fa-edit fa-lg"></i> Grade 4</a></li>
        </ul>
        </div><!-- widget -->
	    		         
	  </div><!-- span3 -->
   
	  <div class="span9">
	   <div class="separator">	 
        </div><!-- separator -->
<div class="row">
<div class="span8">
<?php
$tempskillid = 1;
$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo 'Failed to connect to MySQL: ' , mysqli_connect_error();
 }
 $grade = $_GET['grade'];  ?>      

<H3><?php  echo 'Grade ' , $grade;   ?></h3>

	 
<div style="float: left; width: 47%; margin-right:3%;">
<?php		
$qry ="select * from category where catid in (select distinct catid from skills where grade='" . $grade . "') order by catid" ;
$rs = mysqli_query($con,$qry);
$num = $rs->num_rows;

if ( $num % 2 != 0) 
  {
    $num = $num + 1;
  }
$divider  = $num / 2;
$i = 0;

$skill_array = array();

if(isset($_SESSION['USER'])){
	$user = $_SESSION['USER'];
	list($uname , $uid ) = explode("/", $user);
	$qry = "select SKILLID from report where USERID=$uid";
	$result = mysqli_query($con,$qry);
		
	while($row = mysqli_fetch_array($result))
	{
    $skill_array[] = $row['SKILLID'];
	}
	
	unset($row);
	mysqli_free_result($result);	
   }

while($row = mysqli_fetch_array($rs))
 {
    $i++;
	$qry1 = "select * from skills where grade='" . $grade . "' and catid=" . $row[0];  
 ?> 
  
    <h4><?php echo $row[1]; ?></h4>
	<form id="form1" name="form1" action="question.php" method="POST">
     <input type="hidden" name="skillid" value="1">
     </form>
	<ul>
	
	<?php 
	$rs1 = mysqli_query($con,$qry1);
	while($row1 = mysqli_fetch_array($rs1))
	{
	  $img = "img/add.png";
	  if (in_array($row1[0],$skill_array )) {
	    $img = "img/valid.png";
		}
       	  
	?>
         
    <li class="listspacing">
     <img src="<?php echo $img ?>" style="vertical-align:middle" width="15" height="15"> 
	 <a class="tooltip" id="i_<?php echo $row1[0] ?>" href="javascript:DoPost('<?php echo $row1[0]; ?>');" ><?php echo $row1['Title'] ;    ?></a>
	<?php
	}  //end of innerwhile
	
	unset($row1);
	mysqli_free_result($rs1);
	?>
	</ul>
<?php if( $i == $divider) 
	{
	?>
	</div> <!-- end of margin-->
<div style="float: right; width: 47%; margin-left:3%;">
     
	 <?php
	
	}
   
 } //end of outerwhile
 unset($skill_array);
 unset($row);
 mysqli_free_result($rs);
 mysqli_close($con);
?>
 
   

</div> <!-- end of margin -->
<div style="clear:both">
</div>
<p>&nbsp;</p>

 </div>
		  <!-- span8 end -->
    </div> <!-- row end-->

	  </div><!-- span9 -->
	</div><!-- row entry-page -->
	
	
	    <!-- DIVIDER -->
      	<div class="row margin10-40">
      	  <div class="span3"><div class="border-5-1"></div></div>
      	  <div class="span9"><div class="border-5-1 hide-border"></div>
		  <!-- <ul class="social-icons">
	      <li class="pinterest" ><a href="http://pinterest.com/zergev/"></a></li>      
          <li class="twitter"><a href="http://twitter.com"></a></li>
	      <li class="dribbble"><a href="http://dribbble.com"></a></li>
	      <li class="facebook"><a href="http://facebook.com"></a></li>
	      <li class="google"><a href="http://plus.google.com"></a></li>
	      <li class="linkedin"><a href="http://linkedin.com"></a></li>
	      <li class="behance"><a href="http://behance.net"></a></li>
	      <li class="rss"><a href="#"></a></li>
	    </ul>-->
		  
		  </div>
    	</div><!-- row -->	
	<!-- ============================================================================================= -->

	<script language="javascript"> 

    $(function() {
      $(document).tooltip({
        items: '.tooltip',
        show: 120,
        hide: 500,
		width:'auto',
        position: { my: 'left center', at: 'right+15 top+15' },
		
        content: function( callback ) {
          var ARTid = this.id.split('_')[1];
		  var TTtmr = setTimeout( function() {
            $.ajax({
              type: 'get',
              url: 'ajax.php',
              data: 'var='+ARTid,
              success: function( data ) { callback( data ); }
            }); 
          }, 800 );
          $('.tooltip').mouseleave( function() { clearTimeout( TTtmr ); } );
        }
      });
    });

	 function DoPost(skillid){
	  $('input[name=skillid]').val(skillid);
     $('form#form1').submit();
  }
  
   
</script>

 <!-- Footer
================================================== -->
<?php include 'footer.html' ?>