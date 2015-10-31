/**
 * Created by Reindert Vetter on 9-7-2015.
 */

var content_add_holder = $('.content-add');
$(document).bind('keydown', function(event) {
    if( event.altKey ) {
        content_add_holder.show();
    }
}).bind('keyup', function(event) {
    content_add_holder.hide();
});