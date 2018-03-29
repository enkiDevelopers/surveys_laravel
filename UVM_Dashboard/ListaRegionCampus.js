/*		//url:"https://uvmmejoraporti.mx/UVM_Dashboard/ListaRegionCampus.php?idE=2",
		//url:"https://uvmmejoraporti.mx/UVM_Dashboard/ListaRegionCampus.php?idE=2&Region='Sur'",
*/

$(document).ready(function (){//Nombre de la funcion ordenadora quiza quitar
	
	$.ajax({
		url: "https://uvmmejoraporti.mx/UVM_Dashboard/ListaRegionCampus.php?idE=2",
		//url: "https://uvmmejoraporti.mx/UVM_Dashboard/ListaRegionCampus.php?idE=2&Region='Sur'",
			method: "GET",
		success: function(data) {
			//console.log("entro a success");
			//console.log(data);
			//var Rubro = [];//Va antes de Avance en la consulta
			var RegionL = [];//Lista sin relaciones. Depurada de duplicados
			var CampusL = [];//Lista sin relaciones. Depurada de duplicados
			var Region = [];
			var Campus = [];
			
			for(var i in data) {
				if (data[i].Region !== undefined){//Lista depurada
					if (RegionL.indexOf(data[i].Region) == -1 ){
					RegionL.push(data[i].Region);}
					//console.log(Region[i]);	
					}
				/*if (data[i].Campus !== undefined){//Lista Semidepurada, No hay repeticiones pero estan TODOS LOS CAMPUS
					if (CampusL.indexOf(data[i].Campus) == -1 ){
					CampusL.push(data[i].Campus);}
					//console.log(Region[i]);	
					}*/
				
				if (data[i].Region !== undefined){//Solo acepta registros definidos
					Region.push(data[i].Region);}
					//console.log(Region[i]);
				if (data[i].Campus !== undefined){//Solo acepta registros definidos
					Campus.push(data[i].Campus);}
					//console.log(Campus[i]);
			}
			
			for (var i in RegionL){
				console.log(RegionL[i]);
			}

//Esto hace la lista desplegable			
var myDiv = document.getElementById("LaLista");
//Create and append select list
var selectList = document.createElement("select");
selectList.id = "ListRegion";
myDiv.appendChild(selectList);

//Create and append the options
//<option selected value="0"> Elige una opción </option> //así se debe ver. solo nota. borrar
    var option = document.createElement("option");
    option.value = 0;
    option.text = "Elige una opcion";
    selectList.appendChild(option);
	
for (var i = 0; i < RegionL.length; i++) {
    option = document.createElement("option");
    option.value = RegionL[i];
    option.text = RegionL[i];
    selectList.appendChild(option);
}

		
		},//limite de Succes
		error: function(data) {
			console.log("La operacion fallo");
			console.log(data);
		}
		});
		});