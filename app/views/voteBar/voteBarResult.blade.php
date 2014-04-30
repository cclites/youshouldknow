<?php
   $results = $_SESSION["model"]["result"];
   $keys = array_keys($results);
?>

<table class="table">
	<tr>
	    <th>Party</th>
	    <th>Yea</th>
	    <th>Nay</th>
	    <th>Not Voting</th>
	</tr>
	
	@foreach ($keys as $key)
	    <tr>
	        <td>	
	  	        {{ $key }}
	  	    </td>
	  	    <td>
	  	        {{  $results[$key]["Yea"] }}
	  	    </td>
	  	    <td>
	  	        {{  $results[$key]["Nay"] }}
	  	    </td>
	  	    <td>
	  	        {{  $results[$key]["Not Voting"] }}
	  	    </td>
	    </tr>
	@endforeach  
	
</table>
