<?php
class FileUtil{
	
	public function upload($inputName, $path='templates/car/images', $rename=true){
		$name = $_FILES[$inputName]['name'];
		if ($rename) {
			//đổi tên file
			$tmp = explode('.', $name);
			$ext = end($tmp);
			$new_name = 'HP-'.time().'.'.$ext;
			$name = $new_name;
		}
		
		$tmp_name = $_FILES[$inputName]['tmp_name'];
		$pathUpload = $_SERVER['DOCUMENT_ROOT'].'/'.$path.'/'.$name;
		
		move_uploaded_file($tmp_name, $pathUpload);
		return $name;
	}
}
?>
	