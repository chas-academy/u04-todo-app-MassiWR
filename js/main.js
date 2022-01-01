
$(".task_input").hide();
jQuery(document).ready(function() {
    $("#add-btn-desc").click( function() {
        $(".task_input").toggle(500);  
        $("#add-btn-desc").hide();
        return false;  
    });
});

