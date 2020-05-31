(function($){
    $('.panaddpanier').click(function(e){
    	e.preventDefault();
    	$.get($(this).attr('href'),{},function(data){
             if (data.error) {
             	alert(data.message);
             }
             else
             {
             	if(confirm(data.message +' Voulez-vous consulter le panier'))
             	{
                       location.href= "shopping-cart.php";
             	}
             	else
             	{
             		$('#count').empty().append(data.count);
             	}
             }
    	},'json');
    	return false;
    });
})(jQuery);



