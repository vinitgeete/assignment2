<?php
$input = json_decode(file_get_contents('flatterendjson.json'));

$inputSort = array();

foreach($input as $value) {
	
    $inputSort[$value->id] = $value; 
    
}
sort($inputSort);

$hirarchicalArr = array();

foreach($inputSort as $key => $catLevelZero) {
	
    if($catLevelZero->parent == 0){
    	
        $children = array();	
        
        foreach($inputSort as $key => $catLevelTwo){
        	
            if($catLevelTwo->parent != 0 && $catLevelTwo->parent == $catLevelZero->id) { 				
                $children[] = array('id' => $catLevelTwo->id, 'parent' => $catLevelTwo->parent, 'name' => $catLevelTwo->name);  
			   }
        }	
        
        $hirarchicalArr[]= array('id' => $catLevelZero->id, 'parent' => $catLevelZero->parent, 'name' => $catLevelZero->name, 'children' => $children );
    }
}

echo json_encode($hirarchicalArr);
?>