<script id="template_parent_comment" type="nexus/template">
	<div style="overflow:hidden;margin-bottom: 10px;margin-top: 30px;">
		<img src="--avatar--" alt="" class="pull-left" style=" width: 65px; margin-right: 10px;">
		<p class="commenterName"> --name-- </p>
		<p class="commentContent"> --content-- </p>
		<a href="#" class="reply_comment" data-id="--id--" style="font-size: 12px; font-weight: 700;" >reply</a>
        <div id="comment_child--id--"></div>              
		<div class="clearfix"></div>
		<div id="comment_textarea--id--"></div> 
	</div>
</script>

<script id="template_child_comment" type="nexus/template">
	<div class="childCommentContainer">
		<img src="--avatar--" alt="" class="pull-left" style=" width: 65px; margin-right: 10px;">
		<p class="commenterName">--name--</p>
		<p class="commentContent">--content--</p>
		<a href="#" class="reply_comment" data-id="--parent_id--" style="font-size: 12px; font-weight: 700;" >reply</a> 
	</div>
</script>