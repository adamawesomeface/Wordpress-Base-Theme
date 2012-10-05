$(document).ready(function() {

	//$('.container').hide().delay(400).fadeIn(1000);

	/* Help make the Navigation Work Crossbrowser */
	$("#nav ul").css({display: "none"}); // Opera Fix
	$("#nav li").hover(function(){
	$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(); },function(){ $(this).find('ul:first').css({visibility: "hidden"}); });
	
	/* Make our Search Work */
        $('#searchsubmit').click(function() {
            $('#searchform').submit();
        });
		
	(function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
	
	$('a.lightbox').colorbox({rel:'group1'});

});
