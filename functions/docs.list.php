<?php
	
	$sourceFolder = '../docs';
	$arrayExtensions = array("pdf","docx", "xlsx");
	$arrayDateFiles = [];
	$arrayDateFolders = [];

	/* SHOW FOLDERS AND FILES */

	function showFiles($local){
		if(is_dir($local)){

			$open = opendir($local);

			echo '<table class="table table-bordered table-docs">';
				echo '<tbody>';
					
					echo '<tr class="text-center thead-dark">';
						echo '<th scope="row">Tipo</th>';
						echo '<th scope="row">Nome</th>';
						echo '<th scope="row">Data de Modificação</th>';
						//CHECK ADMIN
                        if($_SESSION['type']){
							echo '<th scope="row">Excluir</th>';
						}
					echo '</tr>';
					

					while($folder = readdir($open)){

						$array = array("pdf","docx", "xlsx");
        		
		        		$parts = explode('.', $folder);

		        		//if(is_dir($local.$folder) && $folder != '.' && $folder != '..'){
		        		//if (!(is_array($parts) && count($parts) > 1) && $folder != '.' && $folder != '..'){
		        		if (!(0 < count(array_intersect(array_map('strtolower', explode(' ', end($parts))), $array))) 
		        			&& $folder != '.' && $folder != '..'){

		        			echo '<tr class="text-center">';
		        				echo '<th scope="row">';
		        					echo '<a href="folder.show.php?dir='.$local.$folder.'/" target="show" class="list-group-item-action">';
		        						echo '<i class="icon-folder-alt icon"></i>';
		        					echo '</a>';
		        				echo '</th>';
		        				
		        				echo '<th scope="row">';
		        					echo '<a href="folder.show.php?dir='.$local.$folder.'/" target="show" class="list-group-item-action">';
						        		echo $folder;
						        	echo '</a>';
		        				echo '</th>';

		        				echo '<th scope="row">';
		        					echo '<a href="folder.show.php?dir='.$local.$folder.'/" target="show" class="list-group-item-action">';
						        		 echo date ("d/m/Y - H:i:s", filemtime($local.$folder));
						        	echo '</a>';
		        				echo '</th>';
		        				
		        				//CHECK ADMIN
                        		if($_SESSION['type']){
			        				echo '<th scope="row">';
			        					echo '<a href="../functions/folder.delete.php?delete='.$local.$folder.'" target="show" class="text-danger list-group-item-action btn-trash">';
							        		echo '<i class="bi bi-trash"></i>';
							        	echo '</a>';
			        				echo '</th>';
                        		}
							echo '</tr>';		        			
		        		}
		        		/* check exists files */
		        		else if(((0 < count(array_intersect(array_map('strtolower', explode(' ', end($parts))), $array))) 
		        				&& $folder != '.' && $folder != '..')){
		        			echo '<tr class="text-center">';
		        				echo '<th scope="row">';
		        					echo '<a href="../functions/file.pdf.open.php?dir='.$local.$folder.'" target="_blank" class="list-group-item-action">';
		        						echo '<i class="icon-doc icon"></i>';
		        					echo '</a>';
		        				echo '</th>';

		        				echo '<th scope="row">';
		        					echo '<a href="../functions/file.pdf.open.php?dir='.$local.$folder.'" target="_blank" class="list-group-item-action">';
						        		echo $folder;
						        	echo '</a>';
		        				echo '</th>';

		        				echo '<th scope="row">';
		        					echo '<a href="../functions/file.pdf.open.php?dir='.$local.$folder.'" target="_blank" class="list-group-item-action">';
						        		 echo date ("d/m/Y - H:i:s", filemtime($local.$folder));
						        	echo '</a>';
		        				echo '</th>';

		        				//CHECK ADMIN
                        		if($_SESSION['type']){
			        				echo '<th scope="row">';
			        					echo '<a href="../functions/file.delete.php?delete='.$local.$folder.'" target="show" class="text-danger list-group-item-action">';
							        		echo '<i class="bi bi-trash"></i>';
							        	echo '</a>';
			        				echo '</th>';
			        			}
							echo '</tr>';
		        		}
		        		/* end check exists files */
		        	}
				echo '</tbody>';
			echo '</table>';        	
        }
    }

    function listDocsTypes(){
		$types = array( 'pdf' );
		$path = '../docs';
		$dir = new DirectoryIterator($path);
		foreach ($dir as $fileInfo) {
			$ext = strtolower( $fileInfo->getExtension() );
			if( in_array( $ext, $types ) ) echo $fileInfo->getFilename();
		}
	}

    function listFiles($local){
        if(is_dir($local)){ 
            echo '<div class="content d-flex justify-content-center">';
            	echo '<ul class="list-group mt-5 text-white">';
            		echo '<li class="list-group-item d-flex justify-content-between align-content-center">';
            			echo '<div class="d-flex flex-row">';
            				echo '<img src="../assets/img/folder/icon_folder.png" width="40" />';
            				echo '<div class="ml-2">';
					            $open = opendir($local);
					            while($folder = readdir($open)){
					                if(is_dir($local.$folder) && $folder != '.' && $folder != '..'){
					                	echo '<h6 class="mb-0">';
					                		echo '<a href="exibe.php?dir='.$local.$folder.'" target="exibe">'.$folder.'</a>';
					                	echo '</h6>';

					                    /*echo '<li><a href="exibe.php?dir='.$local.$folder.'" target="exibe">'.$folder.'</a><ul>';
					                        Show_files($local.$folder.'/');
					                    echo '</ul></li>';
					                    */
					                }
					            }
            				echo '</div>';
            			echo '</div>';
            		echo '</li>';
            	echo '</ul>';
            echo '</div>';
        }
	}

	function listFolderFiles($dir){
		$ffs = scandir($dir);

		unset($ffs[array_search('.', $ffs, true)]);
		unset($ffs[array_search('..', $ffs, true)]);

		// prevent empty ordered elements
		if (count($ffs) < 1)
			return;

		echo '<ol>';
		foreach($ffs as $ff){
			echo '<li>'.$ff;
			if(is_dir($dir.'/'.$ff)) 
				listFolderFiles($dir.'/'.$ff);
			echo '</li>';
		}
		echo '</ol>';
	}

    /* --------- END --------- */

    /* OPEN AND DOWNLOAD DOCS */

    function openPDFFile($filename){

		//Limpa (apaga) o buffer de saída (Para abrir ou baixar PDF no Chorme tem que usar essa função)
		ob_clean();
		
		// Header content type 
		header('Content-type: application/pdf'); 
		  
		//header('Content-Disposition: inline; filename="' . $filename . '"'); 
		//header('Content-Disposition: inline; filename=' . $filename);
		header("Content-Disposition: inline; filename=\"$filename\"");
		  
		header('Content-Transfer-Encoding: binary'); 
		  
		header('Accept-Ranges: bytes'); 
		  
		// Read the file 
		@readfile($filename); 
	}

	function downloadPDFFile($file){
		
		ob_clean();
		//flush();
		//header("Content-Type: application/octet-stream"); 
		header("Content-Type: application/pdf"); 

		//$file = $_GET["file"]  . ".pdf"; 

		$filename = explode('/', $file);
		
		//header("Content-Disposition: attachment; filename=" . urlencode(str_replace(' ', '_', end($filename))));    
		header("Content-Disposition: attachment; filename=" . str_replace(' ', '_', end($filename)));    
		header("Content-Type: application/download"); 
		header("Content-Description: File Transfer");             
		header("Content-Length: " . filesize($file)); 
		
		flush(); // This doesn't really matter. 
		
		$fp = fopen($file, "r"); 
		while (!feof($fp)) { 
			echo fread($fp, 65536); 
			flush(); // This is essential for large downloads 
		}
		
		fclose($fp);
	}

	/* --------- END --------- */

	/* CREATE FOLDER */

	function createFolder($dir){
		
		//is_dir	= Check is directory
		//mkdir		= Create a directory
		//scandir	= List the directory
		//rmdir		= Remove the directory

		//verify directory not exists
		if(!is_dir($dir)){
			//create directory
			mkdir($dir, 0755, true);
		}

	}

	/* ---- END ---- */

	/* REMOVE FOLDER */

	function removeFolder($dirname) {
		if (is_dir($dirname)) {
			$dir = new RecursiveDirectoryIterator($dirname, RecursiveDirectoryIterator::SKIP_DOTS);
			foreach (new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST) as $object) {
				if ($object->isFile()) {
					unlink($object);
				} elseif($object->isDir()) {
					rmdir($object);
				} else {
					throw new Exception('Unknown object type: '. $object->getFileName());
				}
			}
			rmdir($dirname); // Now remove myfolder
		} else {
			throw new Exception('This is not a directory');
		}
	}

	/* ---- END ---- */

	/* REMOVE FILE */
	function removeFile($filename) {

		if(unlink($filename)){
			echo 'The file '.$filename.' has been deleted';
		} else{
			throw new Exception('This is not a file');
		}
	}

	/* ---- END ---- */

	/* UPLOAD FILES */

	function uploadFile($filename, $source) {
		
		if(($filename)){
			move_uploaded_file($filename['tmp_name'], $source.'/'.$filename['name']);
		} else{
			throw new Exception('This is not a file');
		}
		
	}

	/* ---- END ---- */

	/* SEARCH FILES */

	function showFilesSearch($dir, $valueSearch){

		$valueSearch = strtolower($valueSearch);

		$dir = new DirectoryIterator($dir);

		foreach ($dir as $fileInfo) {
			
			if($fileInfo->isDot()) continue;

			if ($fileInfo->isFile()){
				//echo $fileInfo->getFilename() . "<br>\n";
				//$result[]= $fileInfo->getFilename();

				$fileNameStrLower = strtolower($fileInfo->getFilename());
														
				if($fileNameStrLower == $valueSearch || str_contains($fileNameStrLower, $valueSearch)){
					//echo $fileInfo->getFilename() . "<br>\n";	
					printHtmlTableFiles($fileInfo);
					continue;
				}
			}

			if ($fileInfo->isDir()){
				//echo $fileInfo->getFilename() . "<br>\n";
				//$result[]= $fileInfo->getFilename();

				$folderNameStrLower = strtolower($fileInfo->getFilename());
														
				if($folderNameStrLower == $valueSearch || str_contains($folderNameStrLower, $valueSearch)){
					//echo $fileInfo->getFilename() . "<br>\n";
					printHtmlTableFolders($fileInfo);
					continue;
				}

				showFilesSearch($fileInfo->getPathname(), $valueSearch);
			}
		}
	}

	function showFilesSearch2($dir, $search){
		$ffs = scandir($dir);

		unset($ffs[array_search('.', $ffs, true)]);
		unset($ffs[array_search('..', $ffs, true)]);

		// prevent empty ordered elements
		if (count($ffs) < 1)
			return;


		echo '<ol>';
		foreach($ffs as $ff){
			//echo $ff;
			if(strtolower($ff) == strtolower($search) || str_contains(strtolower($ff), strtolower($search))){
				
				echo '<li>'.$ff;

				if(is_dir($dir.'/'.$ff)) 
					showFilesSearch2($dir.'/'.$ff, $search);
				echo '</li>';
				
			}
		}
		echo '</ol>';
	}

	function showFilesSearch3($list, $valueSearch){

    	if(isset($list)){
    		echo '<table class="table table-bordered table-docs">';
				echo '<tbody>';
					
					echo '<tr class="text-center thead-dark">';
						echo '<th scope="row">Tipo</th>';
						echo '<th scope="row">Nome</th>';
						echo '<th scope="row">Data de Modificação</th>';
						//CHECK ADMIN
                        if($_SESSION['type']){
							echo '<th scope="row">Excluir</th>';
						}
					echo '</tr>';

		        	//$parts = explode(".", $folder);

			    	foreach ($list as $key => $value) {
						$valueStrLower = strtolower($value);
						$valueSearch = strtolower($valueSearch);
														
						if($valueStrLower == $valueSearch || str_contains($valueStrLower, $valueSearch)){
								
								$filename = explode("/", $value);

								//echo end($filename), '</br>';

								echo '<tr class="text-center">';
		        				echo '<th scope="row">';
		        					echo '<a href="../functions/file.pdf.open.php?dir='.$value.'" target="_blank" class="list-group-item-action">';
		        						echo '<i class="icon-doc icon"></i>';
		        					echo '</a>';
		        				echo '</th>';

		        				echo '<th scope="row">';
		        					echo '<a href="../functions/file.pdf.open.php?dir='.$value.'" target="_blank" class="list-group-item-action">';
						        		echo end($filename);
						        	echo '</a>';
		        				echo '</th>';

		        				echo '<th scope="row">';
		        					echo '<a href="../functions/file.pdf.open.php?dir='.$value.'" target="_blank" class="list-group-item-action">';
						        		 echo date ("d/m/Y - H:i:s", filemtime($value));
						        	echo '</a>';
		        				echo '</th>';

		        				//CHECK ADMIN
                        		if($_SESSION['type']){
			        				echo '<th scope="row">';
			        					echo '<a href="../functions/file.delete.php?delete='.$value.'" target="show" class="text-danger list-group-item-action">';
							        		echo '<i class="bi bi-trash"></i>';
							        	echo '</a>';
			        				echo '</th>';
			        			}
							echo '</tr>';
				        } else{
				        	echo '<tr class="text-center">';
		        				echo '<th colspan="4" scope="row" class="text-warning">';
		        					echo 'Nenhum arquivo encontrado!';
		        				echo '</th>';
		        			echo '</tr>';

		        			//CHECK ADMIN
                        	if($_SESSION['type']){
			        			echo '<tr class="text-center">';
			        				echo '<th colspan="4" scope="row" class="text-warning">';
			        					echo 'Nenhum arquivo encontrado!';
			        				echo '</th>';
			        			echo '</tr>';
			        		} else{
			        			echo '<tr class="text-center">';
		        				echo '<th colspan="3" scope="row" class="text-warning">';
		        					echo 'Nenhum arquivo encontrado!';
		        				echo '</th>';
		        			echo '</tr>';
			        		}

		        			break;
				        }
					}
				echo '</tbody>';
			echo '</table>';      	
		}

    }

	/* ---- END ---- */


	/* LIST LAST DATEMODIFIED */

	function max5AttributeInArray($array, $key) {
        
        array_multisort (array_column($array, $key), SORT_ASC, $array);

        $max5 = array_slice($array,-5,5);

        array_multisort (array_column($max5, $key), SORT_DESC, $max5);

        return $max5;
    }

    function min5AttributeInArray($array, $key) {
        
        array_multisort (array_column($array, $key), SORT_ASC, $array);
        
        $min5 = array_slice($array,0,5);

        array_multisort (array_column($min5, $key), SORT_DESC, $min5);

        return $min5;
    }

	function maxAttributeInArray($array) {
        
        $init=array('max'=>$array[0]);

        $max = array_reduce($array, function($result, $item) {
            ($result['max']['mTime'] > $item['mTime'])?:$result['max']=$item;
            return $result; 
        }, $init);

        return $max;
    }

    function minAttributeInArray($array, $prop, $param) {
        
        $init=array('min'=>$array[0]);

        $max = array_reduce($array, function($result, $item) {
            ($result['min']['mTime'] < $item['mTime'])?:$result['min']=$item;
            return $result; 
        }, $init);

        return $max;
    }

    function maxAttributeInArrayBkp($array, $prop) {
        return max(array_column($array, $prop));
    }
	
	function showLastModifiedFiles($folder){
		
		$path = $folder;
		$files = array();
		$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
		//$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
		foreach($objects as $name => $object){
			//if($object->isDot()) continue;

			if ($object->isFile()){
				//echo "$name <br>\n";
				//echo date ("d/m/Y - H:i:s", $value->getMTime()), '</br>';
				//$files[] = $object;

				$files[] = [
					'pathName' => $object->getPathname(), 
					'fileName' => $object->getFileName(), 
					'mTime' => $object->getMTime()
				];
			}

			//isDir
			if ($object->isDir()){
				//echo "$name <br>\n";
				//$files[] = $object;
			}
		}

		/* SELECT FILES EXTENSIONS */
		$array = array("pdf","docx", "xlsx");

		$filesReturn = array();
        		
		foreach ($files as $key => $value) {
			$parts = explode('.', $value['fileName']);
			
			if ((0 < count(array_intersect(array_map('strtolower', explode(' ', end($parts))), $array)))){
				//$value['fileName'] . ' - '. date ("d/m/Y - H:i:s",  $value['mTime'];
				//echo $value['fileName'], '</br>';
				$filesReturn[] = [
						'pathName' => $value['pathName'], 
						'fileName' => $value['fileName'], 
						'mTime' => $value['mTime']
				];
			}
			
		}

		$filesReturn = max5AttributeInArray($filesReturn, 'mTime');

		return $filesReturn;
	}

	function showLastModifiedFilesBkp($folder){
		
		$path = $folder;
		$files = array();
		$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
		//$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
		foreach($objects as $name => $object){
			//echo "$name . <br>\n";

			//if($object->isDot()) continue;

			if ($object->isFile()){
				//echo "$name <br>\n";
				//echo date ("d/m/Y - H:i:s", $value->getMTime()), '</br>';
				$files[] = $object;
			}

			//isDir
			if ($object->isDir()){
				//echo "$name <br>\n";
				//$files[] = $name;
			}
		}
		return $files;
	}

	/* ---- END ---- */

	/* ---- PRINT FRAGMENT HTML TABLE DOCS ---- */

	function printHtmlTableFiles($fileInfo){

		echo '<tr class="text-center">';
			echo '<th scope="row">';
				echo '<a href="../functions/file.pdf.open.php?dir='.$fileInfo->getPathname().'" target="_blank" class="list-group-item-action">';
					echo '<i class="icon-doc icon"></i>';
				echo '</a>';
			echo '</th>';

			echo '<th scope="row">';
				echo '<a href="../functions/file.pdf.open.php?dir='.$fileInfo->getPathname().'" target="_blank" class="list-group-item-action">';
					echo $fileInfo->getFilename();
				echo '</a>';
			echo '</th>';

			echo '<th scope="row">';
				echo '<a href="../functions/file.pdf.open.php?dir='.$fileInfo->getPathname().'" target="_blank" class="list-group-item-action">';
					 echo date ("d/m/Y - H:i:s", $fileInfo->getMTime());
				echo '</a>';
			echo '</th>';

			//CHECK ADMIN
			if($_SESSION['type']){
				echo '<th scope="row">';
					echo '<a href="../functions/file.delete.php?delete='.$fileInfo->getPathname().'" target="show" class="text-danger list-group-item-action">';
						echo '<i class="bi bi-trash"></i>';
					echo '</a>';
				echo '</th>';
			}

		echo '</tr>';
	}

	function printHtmlTableFolders($fileInfo){

		echo '<tr class="text-center">';
			echo '<th scope="row">';
				echo '<a href="../functions/file.pdf.open.php?dir='.$fileInfo->getPathname().'/" target="_blank" class="list-group-item-action">';
					echo '<i class="icon-folder-alt icon"></i>';
				echo '</a>';
			echo '</th>';

			echo '<th scope="row">';
				echo '<a href="folder.show.php?dir='.$fileInfo->getPathname().'/" target="show" class="list-group-item-action">';
					echo $fileInfo->getFilename();
				echo '</a>';

				echo '<a href="folder.show.php?dir='.$fileInfo->getPathname().'/" target="show" class="list-group-item-action">';
		        echo '</a>';
			echo '</th>';

			echo '<th scope="row">';
				echo '<a href="folder.show.php?dir='.$fileInfo->getPathname().'/" target="show" class="list-group-item-action">';
					 echo date ("d/m/Y - H:i:s", $fileInfo->getMTime());
				echo '</a>';
			echo '</th>';

			//CHECK ADMIN
			if($_SESSION['type']){
				echo '<th scope="row">';
					echo '<a href="folder.show.php?dir='.$fileInfo->getPathname().$fileInfo->getFilename().'/" target="show" class="text-danger list-group-item-action">';
						echo '<i class="bi bi-trash"></i>';
					echo '</a>';
				echo '</th>';
			}

		echo '</tr>';

	}

	/* ---- END ---- */
?>