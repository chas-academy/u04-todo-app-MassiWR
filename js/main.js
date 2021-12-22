$(".task_input").hide();
jQuery(document).ready(function() {
    
    $(".add_desc").click( function() {
        $(".task_input").toggle(500);  
        return false;  
    });
});


