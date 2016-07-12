	<div id="tweetArea">
		<div id="tweetTitleSub">team酒twitter</div>
		<div id="tweetTitle">酒なう</div>
		<div id="tweetBody">
			{foreach from=$tweetData->status key=k item=v}
				<p id="tweetStatus">
					<a href="http://twitter.com/{$v->user->screen_name}/status/{$v->id}"><img src="{$v->user->profile_image_url}" alt="{$v->user_id}" border=0></a>
					<b>{$v->user->screen_name} / {$v->user->name}</b> <br/>
					{$v->text}
				</p>
			{/foreach}
		</div>
		<a href="http://twitter.com"><img src="http://widgets.twimg.com/i/widget-logo.png" alt="twitter.com" border=0></a>
	</div>
