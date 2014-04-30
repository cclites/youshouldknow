<?php
    $bill = $_SESSION["model"]["bill"];
?>
<div class="voteBar">
    @include('voteBar/voteTitle')
  
    <ul>
        @include('voteBar/voteDescription')
	    @include('voteBar/VoteBarResult')	
    </ul>
    
    <button type="button" data-bind="{{$bill->link}}" class="btn-lg">More info from GovTrack.us</button>
</div>