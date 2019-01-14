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
        
        foreach($inputSort as $key => $catLevelOne){
        	
            if($catLevelOne->parent != 0 && $catLevelOne->parent == $catLevelZero->id) { 				
                $children[] = array('id' => $catLevelOne->id, 'parent' => $catLevelOne->parent, 'name' => $catLevelOne->name);  
			   }
        }	
        
        $hirarchicalArr[]= array('id' => $catLevelZero->id, 'parent' => $catLevelZero->parent, 'name' => $catLevelZero->name, 'children' => $children );
    }
}

echo json_encode($hirarchicalArr);
?>