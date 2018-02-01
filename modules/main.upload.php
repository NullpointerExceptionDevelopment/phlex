<?php

class uploading{
	function uploadscript(){
			$foldername = 'uploads';


			if (isset($_GET['action']) && !empty($_GET['action'])){
				if (($_GET['action'])==('delete')){
					if (isset($_GET['filename']) && !empty($_GET['filename'])){
						if(file_exists($foldername . "/" . $_GET['filename'])){
							unlink($foldername . "/" . $_GET['filename']);
							#echo '<script type="text/javascript">alert("Deleted!")</script>';
							die('<meta http-equiv="refresh" content="0; URL=phlex.php">');
						}
					}
				}elseif(($_GET['action'])==trim(('upload'))){
					if (empty($_GET['uploadfile'])){
						move_uploaded_file (
							$_FILES['uploadfile']['tmp_name'] ,
							$foldername . '/'. $_SESSION['username'] );
                            $_REQUEST['action']='';
							die('<meta http-equiv="refresh" content="0; URL=phlex.php">');
 
					}
				}
				if (!is_dir($foldername)){
					echo "<font color=red><b><h1>" . $foldername . " was not found!</h1></b></font>";
				}else{
					$files = scandir($foldername);
					foreach($files as $file) {
						if(($file)==(".")){

						}elseif(($file)==("..")){
						}elseif(($file)==(".htaccess")){

						}else{
						}
					}
			}
			//###################################################################################>
			}else{
				if (!is_dir($foldername)){
					echo "<font color=red><b><h1>" . $foldername . " was not found!</h1></b></font>";
				}else{
					$files = scandir($foldername);
					$ImageTypes = array(
						'png',
						'jpg',
						'jpeg',
						'gif');
				foreach($files as $file) {
						$Source = $foldername . "/" . $file;
			            $EXCE = strtolower(pathinfo($Source, PATHINFO_EXTENSION));
						if (in_array($EXCE,$ImageTypes)) {
						}
				}
				echo '</div>';
					foreach($files as $file) {

						if(($file)==(".")){
						}elseif(($file)==("..")){
						}elseif(($file)==(".htaccess")){

						}else{
						}
					}
				}
			}
	}
}
?>

