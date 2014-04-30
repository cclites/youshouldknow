<?php
    $bill = $_SESSION["model"]["bill"];
?>
<div class="bill">
    <h3>Related Information</h3>
    <article >
	    <span>{{ $bill->title }}</span>
	    <br><br>
	    <button type="button" data-bind="{{$bill->thomas_link}}" class="btn-lg">Library of Congress</button>
    </article>
</div>