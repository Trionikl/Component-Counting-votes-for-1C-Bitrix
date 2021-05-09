<?
	namespace UserRating\MyTables; 
	
	$parameters = array(
	'select' => array('ID', 'RATING_VOTING_ID', 'VALUE')
	);
	
	$vote = NenRatingVoteTable::getList($parameters)->fetchAll();  // выборка из БД		
	
		foreach ($arResult[ITEMS] as $key => $value)
		{
		$arResult[ITEMS][$key][VOTE]=voiceFun($arResult[ITEMS][$key][ID], $vote);
			
		}		
	
	//-------------------------------------//
	function voiceFun($id, &$vote) {
		foreach ($vote as $key => $value)
		{
			if($vote[$key][RATING_VOTING_ID]==$id) {
			return $vote[$key][VALUE];				
			}
			
		}	
	}	
	
?>