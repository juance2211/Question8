<?php
    header('Content-Type: application/JSON');                
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST'){
		$data=json_decode(file_get_contents('php://input')); 
		$x = $data->values[0];
		$y = $data->values[1];
		$op = $data->operation;
		$total = 0;
		if (($x!=null) and ($y!=null)) {
			if ($op == 'sum'){
				$total = $x + $y;
				$arr = array('Result' => $total, 'Status' => 'OK');
			}
			else if ($op == 'subtraction'){
				$total = $x - $y;
				$arr = array('Result' => $total, 'Status' => 'OK');
			}
			else if ($op == 'multiplication'){
				$total = $x*$y;
				$arr = array('Result' => $total, 'Status' => 'OK');
			}
			else if ($op == 'division')
					if ($y!=0) {
						$total = $x / $y;
						$arr = array('Result' => $total, 'Status' => 'OK');
					}
					else $arr = array('Result' => $x, 'Status' => 'error');
				else $arr = array('Result' => $x, 'Status' => 'error');
			}

		else 
			$arr = array('Result' => $x, 'Status' => 'error');
	}
	else 
		$arr = array('Result' => $x, 'Status' => 'error');
	$json_response = json_encode($arr);
	echo $json_response;

	
?> 