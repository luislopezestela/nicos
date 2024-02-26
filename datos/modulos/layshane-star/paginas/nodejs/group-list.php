<div class="group-messages-wrapper messages-wrapper {{#if onwer}}  pull-right {{else}} pull-left {{/if}} "
	id="messageId_{{chatmsgId}}" data-group-tmessage-id="{{chatmsgId}}">
	<div class="message {{#if onwer}} outgoing pull-right {{else}} incoming pull-left {{/if}}">
		{{#unless onwer}}
		<p class="message-group_owner"><a href="{{username}}"
				data-ajax="?link1=timeline&u={{username}}">{{username}}</a>
		</p>
		{{/unless}}
		{{#if chatMsgTxt}}
			<p class="message-text" dir="auto">
				{{!-- <?php if($wo['chatMessage']['type_two'] == 'contact'): 
						$json = json_decode(trim(htmlspecialchars_decode($wo['chatMessage']['text'])), true);
						echo $json['Value'] . ' (' . $json['Key'] . ')';
					?> --}}
				{{#if hasHTML}}
				{{{chatMsgTxt}}}
				{{else}}
				{{chatMsgTxt}}
				{{/if}}
			</p>
		{{/if}}
		<div class="message-media" style="background: {{backgroundColor}}">
			{{#if mediaHTML}}
				<div class="message-media">
					<div class="clear"></div>
					{{{mediaHTML}}}
				</div>
			{{/if}}
			{{!-- $media = array('type' => 'chatMessage', 'storyId' => $wo['chatMessage']['id'], 'filename' => $wo['chatMessage']['media'], 'name' => $wo['chatMessage']['mediaFileName']); 
					echo Wo_DisplaySharedFile($media, 'chat');    --}}
			{{!-- <?php if (!empty($wo['chatMessage']['stickers'])): ?> --}}
			{{!-- <?php if (strpos('.mp4', $wo['chatMessage']['stickers'])) { ?> --}}
			{{!-- <video autoplay loop><source src="<?php echo $wo['chatMessage']['stickers']; ?>" type="video/mp4"></video> --}}
		</div>
		<div class="clear"></div>
		{{!-- <div class="message-media">
			<?php  
				if(isset($wo['chatMessage']['media']) && !empty($wo['chatMessage']['media'])) {
					$media = array('type' => 'chatMessage', 'storyId' => $wo['chatMessage']['id'], 'filename' => $wo['chatMessage']['media'], 'name' => $wo['chatMessage']['mediaFileName']); 
					echo lui_DisplaySharedFile($media, 'chat');   
				} 
			?>
		</div> --}}
	</div>
	<div class="clear"></div>
	{{#if selfMsg}}
	<div class="message-seen text-right message-details"></div>
	<div class="clear"></div>
	{{/if}}
	<div class="message-typing message-details"></div>
</div>
<div class="clear"></div>