<?php
/*
*  Tab for Voce Theme Framework's Function Buidler
*/
?>
<style>.function-boiler{display:none;}</style>
<table class="form-table voce-function-builder">
	<tr valign="top">
		<th scope="row" valign="top">What do you want to do?<br />
			<select name="options" id="options">
				<option value="1">Interesting Idea</option>
				<option value="2">Option #1</option>
				<option value="3">Option #2</option>
				<option value="4">Option #3</option>
			</select>
		</th>
		<td>
			<div class="function-boiler" style="display:block;" id="1">
				Information will show here...
			</div>
			<div class="function-boiler" id="2">
				This is the answer for Option #1
			</div>
			<div class="function-boiler" id="3">
				The second answer is a little different for option 2.
			</div>
			<div class="function-boiler" id="4">
				The final answer for option 3 is a bit different as well.
			</div>
		</td>
	</tr>
</table>
<script>
	document.getElementById('options').onchange = function(){
		var i = 1;
		var myDiv = document.getElementById(i);
		while(myDiv){
			myDiv.style.display = 'none';
			myDiv = document.getElementById(++i);
		}
		document.getElementById(this.value).style.display = 'block';
	};
</script>