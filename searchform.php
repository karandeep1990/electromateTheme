<form action="" id="searchform" method="get" role="search">
	<div>
	<input type="text" id="s" name="s" class="textboxsearch" 
	value="<?php if( strlen($_GET['s']) == 0 ){echo 'Search';} else {echo $_GET['s'];} ?>"  
	onblur="if(this.value.length == 0 || this.value == '') this.value='Search';" onclick="this.value='';">

	<input type="submit" value="Go" class="submitsearch">
	</div>
</form>
