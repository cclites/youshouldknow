<div class="voteBar container height1">
	
    @include('voteBar/voteTitle')
       
    <ul>
        @include('voteBar/voteDescription')
        @include('voteBar/voteBarResult')
    </ul>
    
    <button type="button" data-bind="{{$link}}" class="btn-lg">More info from GovTrack.us</button>
</div>