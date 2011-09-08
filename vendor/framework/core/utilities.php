<?php

	class Utilities {
		
		public function to_array($object){
			$obj_2_array = array();
			foreach ($object as $k => $v){
				$obj_2_array[$key] = $value;
			}
			
			return $obj_2_array;
		}
		
		public function find_key_value($haystack, $needle){
			$found = false;
			foreach ($haystack as $key => $value){
				if(is_array($value)){
					find_key_value($value);
				}else{
					if ($key == $term){
						$found = true;
						goto end;
					}
				}
			}
			end:
			return $found;
		}
		
	}

?>