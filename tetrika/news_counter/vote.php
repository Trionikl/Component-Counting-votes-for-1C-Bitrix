<?namespace UserRating\MyTables; 
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");//ядро битрикса;
	
	//подключаю таблицы
	require ('tables/nen_rating_vote.php'); 
	
		$vote = $_POST['vote'];
		//echo $vote;
		$voteArr = explode("_", $vote);
	
	//ip адрес в БД
	$parameters = array(
    'select' => array('ID', 'IP'),
    'filter' => array('=IP' => $_SERVER['REMOTE_ADDR'], '=RATING_VOTING_ID' => $voteArr[1])
	);
	
	$rows = NenIpAddressTable::getList($parameters)->fetchAll();  // выборка из БД
	
	//если не пустой
	if ($rows)
	{	
		echo "Вы уже голосовали";	
	}
	else {
		$result = NenIpAddressTable::add(array(
		'IP' => $_SERVER['REMOTE_ADDR'],
		'RATING_VOTING_ID' => $voteArr[1]
		));
		$count_sn=0;
		$count=0;
		
		$parameters = array(
		'select' => array('ID', 'RATING_VOTING_ID', 'VALUE'),
		'filter' => array('=RATING_VOTING_ID' => $voteArr[1])
		);
		
		$rows = NenRatingVoteTable::getList($parameters)->fetchAll();  // выборка из БД
		
		//если не пустой
		if ($rows)
		{	
			$id=$rows[0][ID];
			$count_sn = $rows[0][VALUE];	
			
			$result = NenRatingVoteTable::update($id, array(
			'VALUE' => countValue($voteArr[0],$count, $count_sn) 
			));		
		}
		else {
			$result = NenRatingVoteTable::add(array(
			'RATING_VOTING_ID' => $voteArr[1],
			'VALUE' => countValue($voteArr[0],$count, $count_sn) 
			));
		}	
		
	}
	//---------------------------------------------//
	
	function countValue($votestr,$count, $count_sn)
	{
		
		if($votestr=="voteBittonMinus")
		{
			$count = $count_sn-1;
		}
		else {
			$count = $count_sn+1;
		}  
		
		echo $count;
		
		return $count;
		}	
		
		
		
		
	?>	