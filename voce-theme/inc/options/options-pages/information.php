<?php
/*
*  Tab for Voce Theme Framework's Information and Notes
*/
?>
<table class="form-table voce-information">
	<tr valign="top">
		<th scope="row" valign="top"><?php printf(__('Latest %s News:', 'voce'), THEME_NAME); ?></th>
		<td>
			<p>Information about release 2.0...</p>
			<ol>
				<li>The meta box settings area for pages/posts has been completely rewritten.  This is so it will be easier to provide similar solutions for Gutenberg and non-Gutenberg sites.</li>
				<li>GridCSS is fully incorporated into the theme, but its not optimized yet, but will be in future bump releases.</li>
			</ol>

			<p>Several things of note from prior releases:
				<ul>
					<li style="list-style:disc;margin-left:25px;">There is a built-in page template for Page Builder systems that allows the Page Builder to take over the entire area for the theme.</li>
					<li style="list-style:disc;margin-left:25px;">There are three menu areas that can be activated and utilized depending on the site being built.</li>
					<li style="list-style:disc;margin-left:25px;">Most functions in core Voce Theme code can be overwritten simply by declaring those function names in your child theme's <em>functions.php</em> file.</li>
					<li style="list-style:disc;margin-left:25px;">This theme has support built-in for iTheme's LoopBuddy.  This means full support for LoopBuddy to manipulate the regular post/page query system.</li>
				</ul>
			</p>
		</td>
	</tr>
</table>