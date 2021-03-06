<?php

	/*
		This is an example class script proceeding secured API
		To use this class you should keep same as query string and function name
		Ex: If the query string value rquest=delete_user Access modifiers doesn't matter but function should be
		     function delete_user(){
				 You code goes here
			 }
		Class will execute the function dynamically;

		usage :

		    $object->response(output_data, status_code);
			$object->_request	- to get santinized input

			output_data : JSON (I am using)
			status_code : Send status message for headers

		Add This extension for localhost checking :
			Chrome Extension : Advanced REST client Application
			URL : https://chrome.google.com/webstore/detail/hgmloofddffdnphfgcellkdfbfbjeloo

		I used the below table for demo purpose.

		CREATE TABLE IF NOT EXISTS `users` (
		  `user_id` int(11) NOT NULL AUTO_INCREMENT,
		  `user_fullname` varchar(25) NOT NULL,
		  `user_email` varchar(50) NOT NULL,
		  `user_password` varchar(50) NOT NULL,
		  `user_status` tinyint(1) NOT NULL DEFAULT '0',
		  PRIMARY KEY (`user_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 	*/

	require_once("Rest.inc.php");

	class API extends REST {

		public $data = "";

    /*
    const DB_SERVER = "localhost";
		const DB_USER = "k015";
		const DB_PASSWORD = "(e";
		const DB = "5";
     */

     const DB_SERVER = "localhost";
		const DB_USER = "root";
		const DB_PASSWORD = "";
		const DB = "kronologger2015";





		private $db = NULL;

		public function __construct(){
			parent::__construct();				// Init parent contructor
			$this->dbConnect();					// Initiate Database connection
		}

		/*
		 *  Database connection
		*/
		private function dbConnect(){
			$this->db = mysql_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
			if($this->db)
				mysql_select_db(self::DB,$this->db);
		}

		/*
		 * Public method for access api.
		 * This method dynmically call the method based on the query string
		 *
		 */
		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404);				// If the method not exist with in this class, response would be "Page not found".
		}

		/*
		 *	Simple login API
		 *  Login must be POST method
		 *  email : <USER EMAIL>
		 *  pwd : <USER PASSWORD>
		 */

private function updateKron() {
 if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

     $appid = $this->_request['appid'];
     $secretkey = $this->_request['secretkey'];
     $lat = $this->_request['lat'];
     $lon = $this->_request['lon'];
     $contentKron = $this->_request['contentKron'];
     $contentKron = str_replace("+", " ", $contentKron);

     $fileUpload = $this->_request['fileUpload'];
     $fileUpload = parse_str(file_get_contents("php://input"),$fileUpload);
     $passwordInput = $this->_request['passwordInput'];
     $Md5password =  md5("kronologger".$passwordInput);



      $isthumbnail="0";
      $isPassword="0";
      $isAttachment="0";

      $sqlcekappid = " select appid ";
      $sqlcekappid = $sqlcekappid . " from thirdpartyapps ";
      $sqlcekappid = $sqlcekappid . " where appid='$appid' and secretkey='$secretkey' ";
      //  echo  $sqlcekappid;
       $get=mysql_query($sqlcekappid) or die('error applicationid');
       $result=mysql_fetch_array($get);
       $appid= $result['appid'];
       $bolehlanjut=1;
       if ($appid=="")
        {
            $mesasgerespond="Unknown Application Id !";
            $bolehlanjut=0;
        }
         if (empty($lat)) {
            $mesasgerespond=$mesasgerespond. " Latitude Cannot be blank ! ";
            $bolehlanjut=0;
        }
        if (empty($lon)) {
            $mesasgerespond=$mesasgerespond. " Longitude Cannot be blank !";
            $bolehlanjut=0;
        }
        if (empty($contentKron)) {
            $mesasgerespond=$mesasgerespond. " Messages Cannot be blank !";
            $bolehlanjut=0;
        }
          $inputContent  = makeClickableLinks($contentKron) ;

          if ($bolehlanjut==1) {

           $bolehupload=0;
           $r1=rand(1,9999999999);
           $r2=rand(1,9999999999);
           $r3=rand(1,99999999999);

         	$filename = basename($_FILES['fileUpload']['name']);
          $filename = $r1."-".$r2."-".$r3;
          $maximumsize=5000000000;
	        $checextensionkattachment =  substr(basename($_FILES['fileUpload']['name']), -3);
	        $checextensionkattachment = mb_strtolower($checextensionkattachment);

          $checextensionkattachment_4huruf =  substr(basename($_FILES['fileUpload']['name']), -4);
	        $checextensionkattachment_4huruf = mb_strtolower($checextensionkattachment_4huruf);


            $ceknilafilupload1 = $ceknilafilupload1. "Step 1 Nilai Boleh Upload " .$bolehupload ;

        	if ($checextensionkattachment_4huruf=="pptx") {
      		   $extension = "pptx";
			      $bolehupload = "1";
        	}

        	if ($checextensionkattachment_4huruf=="docx") {
		        $extension = "docx";
			      $bolehupload = "1";
        	}

         	if ($checextensionkattachment_4huruf=="xlsx") {
		          $extension = "xlsx";
			        $bolehupload = "1";
        	}

            $ceknilafilupload1 = $ceknilafilupload1. "Step 2 Nilai Boleh Upload " .$bolehupload ;

	if ($checextensionkattachment=="swf") {
		   $extension = "swf";
			$bolehupload = "1";
	}

	if ($checextensionkattachment=="ppt") {
		   $extension = "ppt";
			$bolehupload = "1";
	}


	if ($checextensionkattachment=="txt") {
		   $extension = "txt";
			$bolehupload = "1";
	}

	if ($checextensionkattachment=="mp3") {
		   $extension = "mp3";
			$bolehupload = "1";
	}

	if ($checextensionkattachment=="zip") {
		   $extension = "zip";
			$bolehupload = "1";
	}

	if ($checextensionkattachment=="doc") {
		   $extension = "doc";
			$bolehupload = "1";
	}

	if ($checextensionkattachment=="xls") {
		   $extension = "xls";
			$bolehupload = "1";
	}

	 if ( $_FILES["fileUpload"]["type"] == "video/mp4" ) {
        $extension = "mp4";
       	$bolehupload = "1";
    }

    if ( $_FILES["fileUpload"]["type"] == "image/gif" ) {
        $extension = "gif";
       	$bolehupload = "1";
    }

    if ( $_FILES["fileUpload"]["type"] == "image/png" ) {
        $extension = "png";
       	$bolehupload = "1";
    }

    if ( $_FILES["fileUpload"]["type"] == "image/pjpeg" || $_FILES["fileUpload"]["type"] == "image/jpeg" ) {
        $extension = "jpg";
      	$bolehupload = "1";
    }

    $ceknilafilupload1 = $ceknilafilupload1. "Step 3 Nilai Boleh Upload " .$bolehupload ;

	 if ( $_FILES["fileUpload"]["type"] == "application/pdf" ) {
        $extension = "pdf";
       	$bolehupload = "1";
    }


    if ( $bolehupload=="1" && $_FILES["fileUpload"]["size"] < $maximumsize )
		{
		 	$bolehupload = "1";
		}
    else {
            $bolehupload=0;
            $msgstatus=$msgstatus." File Attachment tidak berhasil diupload ";
            $msgstatus=$msgstatus. " Type Image URL Size = " . $_FILES["fileUpload"]["size"];
    }


    $ceknilafilupload1 = $ceknilafilupload1. "Step 10 Nilai Boleh Upload " .$bolehupload ;

    $target_path = "../files/";
    $target_path_penamaan_kedalamdatabase = "files/";
		$target_path = $target_path . $filename.".".$extension;
    $target_path_penamaan_kedalamdatabase = $target_path_penamaan_kedalamdatabase . $filename.".".$extension;

    $target_path_thumbnail = "../thumbnail/";
    $target_path_thumbnail = $target_path_thumbnail."th-".$filename.".".$extension;
    $target_path_thumbnail_penamaankedalamdatabase = "thumbnail/";
    $target_path_thumbnail_penamaankedalamdatabase = $target_path_thumbnail_penamaankedalamdatabase."th-".$filename.".".$extension;
    $db_thumbail =$target_path_thumbnail_penamaankedalamdatabase;


       if($bolehupload=="1" )
    {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_path) ;
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_path_thumbnail) ;



  	// File and new size
		 	$filename = $target_path;
      //gambar diresize dahulu khusus jpg atau png
      $target_path_thumbnail_penamaankedalamdatabase="";
        if ($extension=="jpg" || $extension=="png") {
         	$filename_thumbnail = $target_path_thumbnail;
         	list($width, $height) = getimagesize($filename);
         if ($width>$height) {
          $type="landscape";
          $newwidth = 220;
          $newheight = 100;

         }
         else  if ($width<$height) {
           $type="potrait";
           $newwidth = 220;
           $newheight = 350;
         }
         else {
           $type="rectangular";
           $newwidth = 220;
           $newheight = 220;
         }


         $thumb = imagecreatetruecolor($newwidth, $newheight);
         if ($extension=="jpg") {
          $source = imagecreatefromjpeg($filename);
         }    // tutup if ext = jpg

         if ($extension=="png") {
          $source = imagecreatefrompng($filename);
         }    // tutup if ext =png

          // Resize
          imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

          // Output
            if ($extension=="jpg") {
              imagejpeg($thumb,$filename_thumbnail);
              $isthumbnail="1";
              $target_path_thumbnail_penamaankedalamdatabase = $db_thumbail;
            }    // tutup if ext =jpg

           if ($extension=="png") {
              imagepng($thumb,$filename_thumbnail);
              $isthumbnail="1";
              $target_path_thumbnail_penamaankedalamdatabase = $db_thumbail;
            }    // tutup if ext =png


          } // tutup if exctension=jpg or extension==png;

        $isAttachment="1";

    }
    else {
        $filename="";
        $isAttachment="0";
        $isthumbnail="0";
        $target_path_penamaan_kedalamdatabase ="";
        $target_path_thumbnail_penamaankedalamdatabase="";

    }



	} // tutup ifbolehlanjut=1

	if ($bolehlanjut==1) {
			if ($passwordInput!="") {
				$passmd5 = md5("kronologger".$passwordInput);
        $isPassword="1";
			}
			else {
				$passmd5="";
        $isPassword="0";
			}
            $msgstatus = "Posting berhasil !";
            $divpanelclass="panel panel-success";
            $sql = " insert into shout ";
            $sql = $sql. " (appid, lat_shout,lon_shout ";
            $sql = $sql. " ,contentmsg, thumbnail, fileattachment ";
            $sql = $sql. " ,isPassword, isAttachment, isthumbnail ";
            $sql = $sql. " ,msgdate , passprotected ) ";
            $sql = $sql. " values ";
            $sql = $sql. " ('$appid', '$lat','$lon' ";
            $sql = $sql. " ,'$inputContent','$target_path_thumbnail_penamaankedalamdatabase','$target_path_penamaan_kedalamdatabase' ";
            $sql = $sql. " ,'$isPassword', '$isAttachment', '$isthumbnail' ";
            $sql = $sql. " ,now(),'$passmd5' ) ";
            $sql = $sql. " ";
            $sql = $sql. " ";
			//echo $sql;
            $execute1 = mysql_query($sql) or die('Error, pada waktu kirim posting');
          $result="PEFREFT!";
          $result=array('status' => "DONE", "msg" => "msgstatus = ".$msgstatus." filename=".$filename.", bolehuplod eprtama=".$ceknilafilupload1. " , your kron has been posted !!");
	        $this->response($this->json($result), 200);

        }
        else {
              $divpanelclass="panel panel-danger";

        } //tutup ifbolehlanjut=1 masuk ke database



}

private function uploadFile() {
    if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
       $image_url = $this->_request['fileUpload'];
       $image_url = parse_str(file_get_contents("php://input"),$image_url);

//    $filename = basename($_FILES[$image_url]['name']);
    $r1 = rand(1,9999999);
    $r2 = rand(2,919191919);
    $r3= rand(3,4443434);
    $filename = "API-".$r1."-".$r2."-".$r3;
    $maximumsize=5000000;
    $bolehupload=0;

     if ( $_FILES["fileUpload"]["type"] == "video/mp4" ) {
        $extension = "mp4";
       	$bolehupload = "1";
    }

    if ( $_FILES["fileUpload"]["type"] == "image/gif" ) {
        $extension = "gif";
       	$bolehupload = "1";
    }

    if ( $_FILES["fileUpload"]["type"] == "image/png" ) {
        $extension = "png";
       	$bolehupload = "1";
    }

    if ( $_FILES["fileUpload"]["type"] == "image/pjpeg" || $_FILES["fileUpload"]["type"] == "image/jpeg" ) {
        $extension = "jpg";
      	$bolehupload = "1";
    }

    if ($extension=="") {
         	$bolehupload = "0";
          $mesasgerespond= $mesasgerespond. " Extenstion File Tidak dikenal !";
    }

    if ($bolehupload=="1" &&  $_FILES["fileUpload"]["size"] > $maximumsize) {
          $bolehupload = "0";
          $mesasgerespond = $mesasgerespond . " File gede banget, maksimal 5Mb ";
    }

   if ($bolehupload=="1") {
    $target_path = "../files/";
   	$target_path = $target_path . $filename.".".$extension;
    $target_path_thumbnail = "../thumbnail/";
    $target_path_thumbnail = $target_path_thumbnail."TH-".$filename.".".$extension;
       }

      if ($bolehupload=="1" && move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_path))
        {

          move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_path_thumbnail) ;
          	$filename = $target_path;

                  //gambar diresize dahulu khusus jpg atau png
        if ($extension=="jpg" || $extension=="png") {
         	$filename_thumbnail = $target_path_thumbnail;
         	list($width, $height) = getimagesize($filename);
         if ($width>$height) {
          $type="landscape";
          $newwidth = 220;
          $newheight = 100;

         }
         else  if ($width<$height) {
           $type="potrait";
           $newwidth = 220;
           $newheight = 350;
         }
         else {
           $type="rectangular";
           $newwidth = 220;
           $newheight = 220;
         }


         $thumb = imagecreatetruecolor($newwidth, $newheight);
         if ($extension=="jpg") {
          $source = imagecreatefromjpeg($filename);
         }

         if ($extension=="png") {
          $source = imagecreatefrompng($filename);
         }

          // Resize
          imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

          // Output
            if ($extension=="jpg") {
              imagejpeg($thumb,$filename_thumbnail);
            }

           if ($extension=="png") {
              imagepng($thumb,$filename_thumbnail);
            }

          } // tutup if exctension=jpg or extension==png;



                  $sql = " insert into shout ";
            $sql = $sql. " (areaid,lat_shout,lon_shout, ";
            $sql = $sql. "  shoutname, contentshout, thumbnail, fileattachment, shoutdate, isapproved ) ";
            $sql = $sql. " values ";
            $sql = $sql. " ('$areaid_post','$lat_post','$lon_post' , ";
            $sql = $sql. " '$inputUsername','$inputContent','$filename_thumbnail','$filename',now(),'1' ) ";
            $sql = $sql. " ";
            $sql = $sql. " ";
            $execute1 = mysql_query($sql) or die('Error, pada waktu kirim posting');


          $result="AMANTA!";
          $result=array('status' => "BERHASIL", "msg" => "Hore !!");
	        $this->response($this->json($result), 200);
       }

         $mesasgerespond=$mesasgerespond. "Maaf, gagal coeg!";
        $error = array('status' => "Failed", "msg" => $mesasgerespond );
			$this->response($this->json($error), 400);
}


private function getFileAttachment() {
    if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

     $appid = $this->_request['appid'];
     $secretkey = $this->_request['secretkey'];
     $lat = $this->_request['lat'];
     $lon = $this->_request['lon'];
     $msgid = $this->_request['msgid'];
     $passwordInput = $this->_request['passwordInput'];

     $cekMd5revealpassword =  md5("kronologger".$passwordInput);

      $sqlcekappid = " select appid ";
      $sqlcekappid = $sqlcekappid . " from thirdpartyapps ";
      $sqlcekappid = $sqlcekappid . " where appid='$appid' and secretkey='$secretkey' ";
      //  echo  $sqlcekappid;
       $get=mysql_query($sqlcekappid) or die('error applicationid');
       $result=mysql_fetch_array($get);
       $appid= $result['appid'];
       $bolehlanjut=1;


       if ($appid=="")
        {
            $mesasgerespond="Unknown Application Id !";
            $bolehlanjut=0;
        }

        $sqlcekdescpostdate = " select msgdate ";
        $sqlcekdescpostdate = $sqlcekdescpostdate . " from shout ";
        $sqlcekdescpostdate = $sqlcekdescpostdate . " where msgid = '$msgid' ";
        $sqlcekdescpostdate = $sqlcekdescpostdate . " ";
         $get=mysql_query($sqlcekdescpostdate) or die('error cek_desc_postdate');
        $result=mysql_fetch_array($get);

        $sqlcekadapasswordkah = " select ispassword ";
        $sqlcekadapasswordkah = $sqlcekadapasswordkah . " from shout ";
        $sqlcekadapasswordkah = $sqlcekadapasswordkah . " where msgid = '$msgid' ";
        //echo $sqlcekadapasswordkah;
        $get=mysql_query($sqlcekadapasswordkah) or die('error cekispasswors');
        $result=mysql_fetch_array($get);
        $check_ispassword= $result['ispassword'];

        if ($check_ispassword=="0") {
          $querycheckpassword = " and passprotected='' ";
        }
        else {
           $querycheckpassword = " and passprotected='$cekMd5revealpassword' ";
        }


        if (empty($lat)) {
            $mesasgerespond=$mesasgerespond. " Latitude Cannot be blank ! ";
            $bolehlanjut=0;
        }

        if (empty($lon)) {
            $mesasgerespond=$mesasgerespond. " Longitude Cannot be blank !";
            $bolehlanjut=0;
        }


         if (empty($msgid)) {
            $mesasgerespond=$mesasgerespond. " MessagesID Cannot be blank ! ";
            $bolehlanjut=0;
        }

          if ($bolehlanjut==1)    {

          $lat_min = $lat - 0.012;
          $lat_max = $lat + 0.012;
          $lon_min = $lon - 0.012;
          $lon_max = $lon + 0.012;

          $sqlquery = " select ";
          $sqlquery = $sqlquery. " msgid, fileattachment , thumbnail, ";
          //$sqlquery = $sqlquery. " desctime as '$keteranganwaktu' , ";
          //$sqlquery = $sqlquery. " desctime, ";
          $sqlquery = $sqlquery. " isPassword, msgdate ";
          $sqlquery = $sqlquery. " from   shout  ";
          $sqlquery = $sqlquery. " where 1=1 ";
          $sqlquery = $sqlquery. " and msgid = '$msgid' ";
          $sqlquery = $sqlquery. $querycheckpassword;
          $sqlquery = $sqlquery. " and isAttachment='1' ";

          $sqlquery = $sqlquery. " and lat_shout between $lat_min and $lat_max ";
          $sqlquery = $sqlquery. " and lon_shout between $lon_min and $lon_max ";
          $sqlquery = $sqlquery. " order by msgid desc ";
          $sqlquery = $sqlquery. " limit 0,50 ";
          $sqlquery = $sqlquery. " ";
          $sqlquery = $sqlquery. " ";

       //   echo $sqlquery;
                  $sql = mysql_query($sqlquery, $this->db);
        if(mysql_num_rows($sql) > 0){
          $result = array();
          	while($rlt = mysql_fetch_array($sql,MYSQL_ASSOC)){
			  	    	$result[] = $rlt;
		        		} // tutup while
          	$this->response($this->json($result), 200);
         } // tutup if  mysql_num_rows


          } // tutup if bolehlanjut=1
} // tutup function


private function getKronMessages() {
    if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

        $lat = $this->_request['lat'];
        $lon = $this->_request['lon'];
        $appid = $this->_request['appid'];
        $secretkey = $this->_request['secretkey'];

        $sqlcekappid = " select appid ";
        $sqlcekappid = $sqlcekappid . " from thirdpartyapps ";
        $sqlcekappid = $sqlcekappid . " where appid='$appid' and secretkey='$secretkey' ";
      //  echo  $sqlcekappid;
        $get=mysql_query($sqlcekappid) or die('error applicationid');
        $result=mysql_fetch_array($get);
        $appid= $result['appid'];

        $bolehlanjut=1;
        if ($appid=="")
        {
            $mesasgerespond="Unknown Application Id !";
            $bolehlanjut=0;
        }

        if (empty($lat)) {
            $mesasgerespond=$mesasgerespond. " Latitude Cannot be blank ! ";
            $bolehlanjut=0;
        }

        if (empty($lon)) {
            $mesasgerespond=$mesasgerespond. " Longitude Cannot be blank !";
            $bolehlanjut=0;
        }


          if ($bolehlanjut==1)    {

          $lat_min = $lat - 0.012;
          $lat_max = $lat + 0.012;
          $lon_min = $lon - 0.012;
          $lon_max = $lon + 0.012;


          $sqlquery = " select ";
          $sqlquery = $sqlquery. " msgid, contentmsg , ";
          //$sqlquery = $sqlquery. " lat_shout , lon_shout ,    ";
          $sqlquery = $sqlquery. " msgdate, ";
          $sqlquery = $sqlquery. " isthumbnail, isAttachment  , isPassword ";
          $sqlquery = $sqlquery. " from   shout  ";
          $sqlquery = $sqlquery. " where lat_shout between $lat_min and $lat_max ";
          $sqlquery = $sqlquery. " and lon_shout between $lon_min and $lon_max ";
          $sqlquery = $sqlquery. " order by msgid desc ";
          $sqlquery = $sqlquery. " limit 0,50 ";
          $sqlquery = $sqlquery. " ";
          $sqlquery = $sqlquery. " ";

          //echo $sqlquery;
           $sql = mysql_query($sqlquery, $this->db);
        if(mysql_num_rows($sql) > 0){
          $result = array();
          	while($rlt = mysql_fetch_array($sql,MYSQL_ASSOC)){
			  	    	$result[] = $rlt;
		        		} // tutup while
          	$this->response($this->json($result), 200);
         } // tutup if  mysql_num_rows

          }   // tutup if bolehlanjut=1


   		$error = array('status' => "Failed", "msg" => $mesasgerespond );
			$this->response($this->json($error), 400);

}


private function updateInfo() {
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

        $areaid = $this->_request['areaid'];

        $shoutname = $this->_request['shoutname'];
        $shoutname = addslashes($shoutname);
        $shoutname = mysql_real_escape_string($shoutname);

        $contentshout = $this->_request['contentshout'];
        $contentshout = addslashes($contentshout);
        $contentshout = mysql_real_escape_string($contentshout);

        $publickey = $this->_request['publickey'];
        $secretkey = $this->_request['secretkey'];
        $bolehlanjut=1;

        $sqlcekappid = " select appid ";
        $sqlcekappid = $sqlcekappid . " from thirdpartyapps ";
        $sqlcekappid = $sqlcekappid . " where publickey='$publickey' and secretkey='$secretkey' ";
        $get=mysql_query($sqlcekappid) or die('error applicationid');
        $result=mysql_fetch_array($get);
        $appid= $result['appid'];


       if ($appid=="")
        {
            $mesasgerespond="Application Id Tidak Dikenal ! ";
            $bolehlanjut=0;
        }


        $sqlcekareaid = " select lat ";
        $sqlcekareaid = $sqlcekareaid . " from area ";
        $sqlcekareaid = $sqlcekareaid . " where areaid='$areaid' ";
        $get=mysql_query($sqlcekareaid) or die('err area id');
        $result=mysql_fetch_array($get);
        $lat= $result['lat'];

        if ($lat=="") {
            $mesasgerespond="Areaid Tidak dikenal, Latitude problem ! ";
            $bolehlanjut=0;

        }

        $sqlcekareaid = " select lon ";
        $sqlcekareaid = $sqlcekareaid . " from area ";
        $sqlcekareaid = $sqlcekareaid . " where areaid='$areaid' ";
        $get=mysql_query($sqlcekareaid) or die('error areaid ');
        $result=mysql_fetch_array($get);
        $lon= $result['lon'];

        if ($lon=="") {
            $mesasgerespond="Areaid Tidak dikenal, Longitude problem ! ";
            $bolehlanjut=0;

        }

        if ($shoutname=="") {
            $mesasgerespond="Nama Tidak Boleh kosong ! ";
            $bolehlanjut=0;
        }

        if ($contentshout=="") {
            $mesasgerespond="Pesan / Info Tidak Boleh kosong ! ";
            $bolehlanjut=0;
        }

        if ($bolehlanjut==1) {
          $sqlinsert = "insert into shout ";
          $sqlinsert = $sqlinsert . " (areaid,lat_shout,lon_shout, " ;
          $sqlinsert = $sqlinsert . "  shoutname,contentshout,shoutdate, ";
          $sqlinsert = $sqlinsert . " appid,isapproved)";
          $sqlinsert = $sqlinsert . "  values ";
          $sqlinsert = $sqlinsert . " ($areaid,'$lat','$lon', ";
          $sqlinsert = $sqlinsert . " '$shoutname','$contentshout',now(), ";
          $sqlinsert = $sqlinsert . " '$appid','1') ";
          $sqlinsert = $sqlinsert . " ";
          $sqlinsert = $sqlinsert . " ";

           mysql_query($sqlinsert );
    				$success = array('status' => "Success", "msg" => "Ok, Update Info berhasil masuk");
		    		$this->response($this->json($success),200);
        }




    	$error = array('status' => "Failed", "msg" => $mesasgerespond );
			$this->response($this->json($error), 400);

}



		/*
		 *	Encode array into JSON
		*/
		private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}

	// Initiiate Library

	$api = new API;
	$api->processApi();


function time_left($integer)

{ /* Returns a string of the amount of time the integer (in seconds) refers
to.
$timeleft=time_left(86400);
$timeleft='1 day'.
Will not return anything higher than weeks. False if $integer=0 or fails.
*/

$seconds=$integer;
if ($seconds/60 >=1)
	{
	$minutes=floor($seconds/60);
	if ($minutes/60 >= 1)
		{ # Hours
		$hours=floor($minutes/60);
		if ($hours/24 >= 1)
			{ #days
			$days=floor($hours/24);
			if ($days/7 >=1)
				{ #weeks
				$weeks=floor($days/7);
				if ($weeks>=2) $return="$weeks weeks";
				else $return="$weeks week";
				} #end of weeks
			$days=$days-(floor($days/7))*7;
			if ($weeks>=1 && $days >=1) $return="$return, ";
			if ($days >=2) $return="$return $days days";
			if ($days ==1) $return="$return $days day";
			} #end of days
		$hours=$hours-(floor($hours/24))*24;
		if ($days>=1 && $hours >=1) $return="$return, ";
		if ($hours >=2) $return="$return $hours hours";
		if ($hours ==1) $return="$return $hours hour";
		} #end of Hours
	$minutes=$minutes-(floor($minutes/60))*60;
	if ($hours>=1 && $minutes >=1) $return="$return, ";
	if ($minutes >=2) $return="$return $minutes minutes";
	if ($minutes ==1) $return="$return $minutes minute";
	} #end of minutes
$seconds=$integer-(floor($integer/60))*60;
if ($minutes>=1 && $seconds >=1) $return="$return, ";
if ($seconds >=2) $return="$return $seconds seconds";
if ($seconds ==1) $return="$return $seconds second";
$return="$return ";
return $return. " ago ";

}

 function clear_variable_post_get($namevariablel)
{
  $namevariablel = mysql_real_escape_string($namevariablel);
  //echo "<br>namevariablel = ".$namevariablel;
  $namevariablel = addslashes($namevariablel);
  //echo "<br>namevariablel = ".$namevariablel;
  $namevariablel=strip_tags($namevariablel);
    $return = $namevariablel;
  //echo "<br>return = ".$return;
  return $return;

}

 function makeClickableLinks($text) {
  $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_+.~#?&//=]+)',
  '<a target=_new href="\1">\1</a>', $text);
  $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_+.~#?&//=]+)',
  '\1<a target=_new href="http://\2">\2</a>', $text);
  $text = eregi_replace('([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3})',
  '<a href="mailto:\1">\1</a>', $text);
 return $text;

}



?>