<?php $searchString = (get_search_query()) ? get_search_query() : 'Search...'; ?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
  <div>
    <input type="text" value="<?php echo $searchString; ?>" <?php echo ($searchString == 'Search...') ? 'onclick="javascript:this.value=\'\'"' : ''; ?> name="s" id="s" class="textBox" />
     <a id="searchsubmit"><span>Search</span></a>
  </div>
</form>
