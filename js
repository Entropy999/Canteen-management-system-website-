
  var tableNode,idvar1=0,idvar2=0,idvar=0; 
  function createTable(){ 
	var tab=document.getElementById("table");
	if(tab==null){
		   	  tableNode=document.createElement("table");
		       tableNode.setAttribute("id","table") 
 
	}
 
    var myTable = document.getElementById("table");
	var tableValue="";
	if(myTable!=null){
		
	      for (var i=0;i<myTable.rows.length;i++){
	          var value1 = myTable.rows[i].cells[0].getElementsByTagName("input")[0].value;
	          if(value1==null||value1==""||value1.trim().length == 0){
				  Tools.showAlert('', 2000);
	    	      return;  
		       }
	          var value2 = myTable.rows[i].cells[1].getElementsByTagName("input")[0].value;
	          if(value2==null||value2==""||value2.trim().length == 0){
				  Tools.showAlert('', 2000);
		    	    return;  
			  }
	          var value3 = myTable.rows[i].cells[2].getElementsByTagName("input")[0].value;
	          if(value3==null||value3==""||value3.trim().length == 0){
				  Tools.showAlert('', 2000);
		    	    return;  
			  }
	          var value4 = myTable.rows[i].cells[3].getElementsByTagName("input")[0].value;
	          if(value4==null||value4==""||value4.trim().length == 0){
				  Tools.showAlert('',  2000);
		    	    return; 
			  }
	      }
	      
	      if(myTable.rows.length>7){
			  Tools.showAlert('', '已达到行数上限！', 2000);
				return;
			}
	      
	}
    var row=1;
	   var cols=4;
	  
	   for(var x=0;x<row;x++){ 
	    var trNode=tableNode.insertRow(); 
	     var tdNode=trNode.insertCell(); 
	     idvar++;
	     tdNode.innerHTML='<input style="width:85%;overflow:hidden;" type="text" name="casefys" id="medicineName'+idvar+'" value="" />'; 
	     var tdNode=trNode.insertCell(); 
	     idvar++;
	     tdNode.innerHTML='<input style="width:85%;overflow:hidden;" type="text" name="casefys" id="dosage'+idvar+'" value="" />'; 
	     var tdNode=trNode.insertCell(); 
	     idvar++;
	     tdNode.innerHTML='<input style="width:85%;overflow:hidden;" type="text" name="casefys" id="startDate'+idvar+'" value=""   onclick="showDatePicker(this)"/>'; 
	     var tdNode=trNode.insertCell(); 
	     idvar++;
	     tdNode.innerHTML='<input style="width:85%;overflow:hidden;" type="text" name="casefys" id="endDate'+idvar+'"  value=""  onclick="showDatePicker(this)"/>'; 
	   } 
 
	   document.getElementById("div1").appendChild(tableNode);	   
  }  
 
 
  function delRow(){ 
	    
	   var tab=document.getElementById("table");
	   if(tab==null){ 
			  Tools.showAlert('', '删除的表不存在！', 2000);
	    return; 
	   } 

	   
	   var rows=tab.rows.length;

	   if (rows >= 1 && rows <= tab.rows.length) { 
	    tab.deleteRow(rows-1); 
	    }else{ 
			  Tools.showAlert('', '删除的行不存在！', 2000);
	     return ; 
	    }   
	  } 
  
