
$(document).ready(function(){
   $(document).on('change','#numberofteam',function(){
   	$val=$('#numberofteam').val();

   	var dummy = '<div class="form-row teamnames"> <div class="form-group col-md-12"> <input type="text" name=teams[] class="form-control" placeholder="Team Name"  required> </div></div>';


    $adddiv=$val-$('.teamnames').length;
    if($adddiv<0){

    	$finalindex=$('.teamnames').length+$adddiv;
      $('#teams > div.teamnames').each(function(index){ 
         if($finalindex<=index){$(this).remove()}
      }) 
    }else{
    	for (var i = 0; i < $adddiv; i++) {
    		$('#teams').append(dummy);
    	}
    	 
    }

                       


   })
});