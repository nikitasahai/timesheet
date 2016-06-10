<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<head>
	<title>
		timesheet
	</title>
</head>
<body>
<button id="new row" onclick='newrow()'> Add Row </button>


<h1>Form </h1>



<form name="form1" action="http:/laravel2/public/timesheet" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<table id="ptable">
    <tr>
    <th> projectname </th>
    <th> projecthours </th>
    <th> projectdesciption</th>
    </tr>
	<tr id="t1"> 
	 <td>
	 	<select name="projectnames[]"> 
	 	@foreach($projectnames as $projectname)
	 	<option  > {{$projectname->projectname}} </option>

	 	@endforeach	
	 	</select>
	 </td>
	 <td>
	 	<select name="projecthours[]"> 
	 	<?php for($i = 1; $i<9; $i++){ ?>
	 	<option> {{$i}} </option>
	 	<?php } ?>
	 	</select>
	 </td>
	 <td>
	 	<input type="text" name="description[]" value="description"> 
	 </td>
     <td>
         <button id="deleterow1" onclick="deleterow(this.id)"> deleterow </button>
     </td>
	</tr>
</table>

<input type= "submit" value="submit">
</form>
</body>

<script type="text/javascript">
	
function newrow(){

		// $.get("/laravel2/utils/get_project_names.php", function(data){
  //           window.p_names = JSON.parse(data);
  //       });

  var url = "/laravel2/utils/get_project_names.php";
        jQuery.extend({
    getValues: function(url) {      // target object whose variable will be overwritten if next 2 objects 
        var result = null;          //first object cant be false
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'JSON',
            async: false,
            success: function(data) {
                result = data;          //second object
            }
        });
       return result;
    }
});

var results1 = $.getValues(url);
//alert(results1);

var table = document.getElementById("ptable");
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        row.id = "t"+rowCount;
        var cell1 = row.insertCell(0);
        var element1 = document.createElement("select");
                element1.type = "text";
                element1.name = "projectnames[]";
                element1.className = "pname";
                element1.id = "p"+rowCount;
                for(var i = 0 ; i<results1.length; i++)
                {
                  var option = document.createElement("option");
                    option.text = results1[i];
                   element1.add(option);  
                }
                
                cell1.appendChild(element1);

        var cell2 = row.insertCell(1);
        var element2 = document.createElement("select");
                element2.type = "text";
                element2.name = "projecthours[]";
                element2.className = "name";
                element2.id = "h"+rowCount;
                for(var i = 1 ; i<9; i++)
                {
                  var option = document.createElement("option");
                    option.text = i;
                   element2.add(option);  
                }

                cell2.appendChild(element2);

        var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
                element3.type = "text";
                element3.name = "description[]";
                element3.className = "desc";
                element3.id = "d"+rowCount;
                cell3.appendChild(element3);

        var cell4 = row.insertCell(3);
        var element4 = document.createElement("button");
                element4.type = "button";
               element4.name = "deleterow";
                element4.innerHTML = "deleterow";
                element4.id = "deleterow"+rowCount;
                element4.onclick = function () { deleterow(this.id); };
                cell4.appendChild(element4); 

	}

 function deleterow(thisid) 
{
        
        console.log(thisid);
        var getindex = thisid.split("w");
        newid = getindex[1];
        //document.getElementById("items_table").deleteRow(0);
        //var exrow = document.getElementById("t"+id);
        //console.log("row: "+exrow);
        //row.parentNode.removeChild(row);
        $('#t' + newid).remove();

        var table = document.getElementById("ptable");
        var rowcount = table.rows.length;
        console.log("rowcount: "+rowcount);
        id = parseInt(newid);
        var i = 0;

        for(i=id; i<rowcount; i++  )
        {

            var nextid = i + 1;
            console.log("nextid: "+ nextid);
            document.getElementById("p"+nextid).setAttribute("id", "p"+i);
            document.getElementById("h"+nextid).setAttribute("id", "h"+i);
            document.getElementById("d"+nextid).setAttribute("id", "d"+i);

            document.getElementById("deleterow"+nextid).setAttribute("id", "deleterow"+i);
            document.getElementById("t"+nextid).setAttribute("id", "t"+i);

            //console.log("in deleterow: "+skuid);
        }
    
}   
</script>
</html>