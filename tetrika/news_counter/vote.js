var vote;

$(document).ready(function(){
    $('.vote-bitton-minus-plus').click(function() { 
	
	voting = $(this).attr('id');
		sending_voting_table(voting);		
    });	
	
});

//----------- ФУНКЦИИ --------- //

//отправка в таблицу
function sending_voting_table(voting) {
voiting_id=voting.split("_");	
//отправка запроса
var formData = new FormData();
formData.append('vote', voting);

 
var request = new XMLHttpRequest();
function reqReadyStateChange() {
    if (request.readyState == 4 && request.status == 200)
       document.getElementById("vote-number_"+voiting_id[1]).innerHTML=request.responseText;
		// console.log(request.responseText);		 
		 //alert(voiting_id[1]);
}
 
request.open("POST", "/local/components/tetrika/news_counter/vote.php");
request.onreadystatechange = reqReadyStateChange;
request.send(formData);
}