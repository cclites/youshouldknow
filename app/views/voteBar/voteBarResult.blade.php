<table class="table vote">
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
	  	    <td class="yea">
	  	       {{ $v['Yea'] }}
	  	    </td>
	  	    <td class="nay">
	  	    	{{ $v['Nay'] }}
	  	    </td>
	  	    <td class="nv">
	  	    	{{ $v['Not Voting'] }}
	  	    </td> 
	    </tr>
	@endforeach
</table>
