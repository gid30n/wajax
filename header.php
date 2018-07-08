<?php //custom wabtn queue
    //db initialize
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'xx');
	define('DB_PASSWORD', 'xx');
	define('DB_DATABASE', 'xx');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	?>
	
	<?php
	//ob_start();
    //custom wabtn queue
//get link when clicked not first run data query

if(isset($_REQUEST['link'])){ //contact cs for wa btn

 			$getnomor=$_GET['link'];
		
	        $query2 = mysqli_query($db, "UPDATE wabtn SET status = '1'  WHERE value_cs = ".$getnomor." ");
            
	        if ($query2) {

     		 $redir = $getnomor;
             echo $redir;
			 die();

	        }else{
	         echo "gagal update status nomor wa <br>";
			 die();
	        }
	        echo $redir;
	        exit();
	    }

	    if(isset($_REQUEST['nomorbaru'])){
	     $query1="SELECT * FROM wabtn ORDER BY RAND()";
		 $result=mysqli_query($db,$query1);

		 foreach ($result as $key => $r) {
		 	
		 	$status = $r['status'];
		 	$nomorwa = $r['value_cs'];
		 	//echo $nomorwa;

		 	if ($status == '0') { //cek status if = 0
		 		$readyno = $nomorwa;    //set variable ready no as nomor wa
		 	}else{

		 		if (empty($readyno)) { //if ready no empty means all status = 1
					//echo "sebuah nomor aktif"; 
					$query3 = mysqli_query($db, "UPDATE wabtn SET status = '0'"); //set query update status reset to 0
		 		} 
		 		
		 	} 

		 }

		 $fixnomor = $readyno;
		 echo $fixnomor;
		 exit();

	    }
		
    ?>