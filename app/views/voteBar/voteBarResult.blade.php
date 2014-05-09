<table class="table">
	<tr>
	    <th>Party</th>
	    <th>Yea</th>
	    <th>Nay</th>
	    <th>Not Voting</th>
	</tr>
	
	@foreach ($result as $r=>$v)
	    <tr>
	        <td>	
	  	        {{ $r }}
	  	    </td>
	  	    <td>
	  	       {{ $v['Yea'] }}
	  	    </td>
	  	    <td>
	  	    	{{ $v['Nay'] }}
	  	    </td>
	  	    <td>
	  	    	{{ $v['Not Voting'] }}
	  	    </td> 
	    </tr>
	@endforeach
</table>
