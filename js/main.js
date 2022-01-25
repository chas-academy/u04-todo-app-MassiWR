
  $(document).ready(function(){
    $('.remove-to-do').click(function(){
        const id = $(this).attr('user_id');
        
        $.post("/delete.php", 
              {
                  id: id
              },
              (data)  => {
                 if(data){
                     $(this).parent().hide(600);
                 }
              }
        );
    });

       
});

