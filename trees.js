/**
 * 
 */
class Tree{
	static insertTree(id){
		document.getElementById("infoAboutInsertTree").innerHTML= "Päringut hakatakse tegema...";
		let request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (request.readyState === XMLHttpRequest.DONE){
				let response = JSON.parse(request.responseText);
				document.getElementById("infoAboutInsertTree").innerHTML= "Tehtud.";//response.status_message + " ("+ response.status+")";
				if (1 === id){
					document.getElementById("numberOfMaples").innerHTML = response[id - 1].amount;
				}else{
					document.getElementById("numberOfBirches").innerHTML = response[id - 1].amount;
				}
			}
		};
		request.onerror = function(e){
			document.getElementById("infoAboutInsertTree").innerHTML= "võrguviga";
		}
		// Kui sul jookseb muul domeenil, muus väratis, siis see info tuleb siin vahetada:
		request.open("POST", "http://puud.kalmer.focal.rog:2/put-5-into-database-get-data-return.php", true);
		request.setRequestHeader('Content-Type', 'application/json');
		let requestData = {
				"batch":[{
					"trees_id": id
					}
				]
		};
		request.send(JSON.stringify(requestData));
	}
}
document.getElementById("buttonForTreeAcer").onclick = function(){
	Tree.insertTree(1);
}
document.getElementById("buttonForTreeBirch").onclick = function(){
	Tree.insertTree(2);
}
