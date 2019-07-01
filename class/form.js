
$(document).ready(function(){
    $('#bs').click(function(){
      $('#ad').hide();
      $('#ch').hide();
      $('#tp').show();
      $('#lo').show();
    })
    $('#nbs').click(function(){
      $('#ad').show();
      $('#lo').hide();
      $('#ch').hide();
      $('#tp').hide();
    })
    
    $("input[type=checkbox][name=subscribe]").change(function() {
      if(this.checked) {
        $('#ad').hide();
        $('#ch').show();
        $('#tp').show();
    
      }else if(!this.checked) {
        $('#ch').hide();// Si la case est n'est pas cochée, on fait d'autres traitements
      }
    });
  });

