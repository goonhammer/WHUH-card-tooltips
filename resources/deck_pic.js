jQuery(document).ready(function($) {
    $('.whuw_deck_embedded a').mouseover(function(event) {
	$(this).parents('.whuw_deck').find('img.on_page').attr('src',$(this).attr('src'));
        event.stopPropagation();
    });
});
