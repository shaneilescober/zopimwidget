<form id="pg_zopim_form" name = "zopimwidgetform">
	<!-- message box -->			
	<div id="plugin_validation_message" style="display:none"></div>	
	<!-- input area -->		
	<input type="hidden" name="return_url" value="<?php echo $sUrl; ?>" />
	<div id="pg_zopim_container">
		<iframe id="pg_zopim_iframe" src="http://dashboard.zopim.com/" width="100%" height = "600px" border="0" frameBorder="0" ></iframe>
	</div>
	<div id="pg_zopim_input_area">
		<br />
		<table style = "width: 100%">
			<tr>
				<td><label class="pg_zopim_label">Copy and paste the code here from <strong>Zopim &raquo; Settings &raquo; Embed widget on my site</strong></label></td>
				<td align = "right"><span class="neccesary" class = "require">*</span> Required</td>
			</tr>
		</table>
		<br />
		<table>
			<tr>
				<td valign = "top" style = "color:red">*</td>
				<td><textarea id="pg_zopim_textarea" name="pg_zopim_textarea" style = "width: 400px; height: 200px; resize:none" fw-filter = "isFill"></textarea></td>
			</tr>
		</table>
	</div>
	
	<table id = "customize_y_n">
		<tr>
			<td class = "label">Customize your Zopim Widget?</td>
			<td class = "inputArea">
				<input type = "radio" name = "customize" value = "Yes" onclick="PLUGIN_Zopim_setup.customize('Yes')">Yes&nbsp;&nbsp;&nbsp;
				<input type = "radio" name = "customize" value = "No" onclick="PLUGIN_Zopim_setup.customize('No')" checked="true">No
			</td>
		</tr>
	</table>
	
	<div id = "customize_widget" style = "display:none">
		<table id = "genSettings">
			<th style = "text-align:left">General Settings</th>
			<tr>
				<td class = "label">Position</td>
				<td class = "inputArea">
					<select name = "position" class = "inputBoxes">
						<option value = "Bottom Right">Bottom Right</option>
						<option value = "Bottom Left">Bottom Left</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class = "label">Hide chat bar when offline</td>
				<td><input type = "checkbox" name = "hide_offline" value = "1">&nbsp;This prevents visitors from sending you offline messages</td>
			</tr>
		</table>
		
		<table id = "bubbleSettings">
			<th style = "text-align:left">Help Bubble Settings</th>
			<tr>
				<td class = "label">Bubble Title:</td>
				<td class = "inputArea"><input type = "text" name = "bubbleTitle" class = "inputBoxes" fw-filter = "isFill" id = "bubbleTitle" maxlength = "20" /></td>
			</tr>
			<tr>
				<td class = "label">Bubble Message:</td>
				<td class = "inputArea"><input type = "text" name = "bubbleMsg" class = "inputBoxes" fw-filter = "isFill" id = "bubbleMsg" maxlength = "40"/></td>
			</tr>
		</table>
		
		<table id = "windowSettings">
			<th style = "text-align:left">Color &amp; Theme Settings</th>
			<tr>
				<td class = "label">Choose a color for the chat window:</td>
				<td class = "inputArea">
					<select name = "wcolor" class = "inputBoxes">
						<option value = "#faf4e3">Default Color</option>
						<option value = "#ffffff">White</option>
						<option value = "#000000">Black</option>
						<option value = "#ff0000">Red</option>
						<option value = "#00ff00">Green</option>
						<option value = "#0000ff">Blue</option>
						<option value = "#ffff00">Yellow</option>
					</select>
				</td>
			</tr>
		</table>
		
		<table id = "greetingSettings">
			<th style = "text-align:left">Greeting Message Settings</th>
			<tr>
				<td><input type = "checkbox" name = "usegreetingmsg" checked = "true" value = "1">&nbsp;Use these greeting messages </td>
			</tr>
			<tr>
				<td>Message Show on Chat Bar<hr></td>
				<table id = "msgChatBar">
					<tr>
						<td class = "label">Online</td>
						<td class = "inputArea"><input type = "text" name = "online_msgChatBar" class = "inputBoxes" fw-filter = "isFill" id = "online_msgChatBar" maxlength = "20" /></td>
					</tr>
					<tr>
						<td class = "label">Away</td>
						<td class = "inputArea"><input type = "text" name = "away_msgChatBar" class = "inputBoxes" fw-filter = "isFill" id = "away_msgChatBar" maxlength = "20" /></td>
					</tr>
					<tr>
						<td class = "label">Offline</td>
						<td class = "inputArea"><input type = "text" name = "offline_msgChatBar" class = "inputBoxes" fw-filter = "isFill" id = "offline_msgChatBar" maxlength = "20" /></td>
					</tr>
				</table>
			</tr>
			<tr>
				<td>Message Show on Chat Panel<hr></td>
				<table id = "msgChatPanel">
					<tr>
						<td class = "label">Online</td>
						<td class = "inputArea"><textarea name = "online_msgChatPanel"  class = "inputBoxes" fw-filter = "isFill" id = "online_msgChatPanel" maxlength = "100" /></textarea></td>
					</tr>
					<tr>
						<td class = "label">Away</td>
						<td class = "inputArea"><textarea name = "away_msgChatPanel" class = "inputBoxes" fw-filter = "isFill" id = "away_msgChatPanel" maxlength = "100" /></textarea></td>
					</tr>
					<tr>
						<td class = "label">Offline</td>
						<td class = "inputArea"><textarea name = "offline_msgChatPanel" class = "inputBoxes" fw-filter = "isFill" id = "offline_msgChatPanel" maxlength = "100" /></textarea></td>
					</tr>
				</table>
			</tr>
		</table>
		
	</div>
	<!--Save / reset -->
	<div class="tbl_lb_wide_btn">
		<a class="btn_apply" onclick="PLUGIN_Zopim_setup.saveSetting(this.form)" title="Save changes" href="#" id="pluginSaveSettings">Save</a>
		<a href="#" class="add_link" title="Reset to default" onclick="PLUGIN_Zopim_setup.resetDefault();return false;">Reset to Default</a>
		<?php if ($bExtensionView === 1){ ?>
            <?php echo '<a href="/admin/sub/?module=ExtensionPageManage&code=' . ucfirst(APP_ID) . '&etype=MODULE" class="add_link" title="Return to Manage Zopim Widget">Return to Manage Zopim Widget</a>
            <a href="/admin/sub/?module=ExtensionPageMyextensions" class="add_link" title="Return to My Extensions">Return to My Extensions</a>'; ?>
        <?php } ?>
	</div>
</form>