<script type="text/javascript">


    $(document).ready(function(){

      var counter = 2;

      var counter1 = <?php echo 1; ?>;
    
      $("#addButton").click(function () {
        
      if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
        }


  var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "https://thelocalbrowse.com/assets_front/js/filename.js"; 
    document.getElementsByTagName("head")[0].appendChild(script); 

      
      var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter );

                newTextBoxDiv.after().html('<p style="color:red;">Course '+ counter + '</p><div class="row"><div class="col-lg-6"> <div class="form-group"> <label for="exampleInputPassword1">Course Header</label> <input type="text" name="course_header[]" class="form-control" required> </div></div><div class="col-lg-6"> <div class="form-group"> <label for="exampleInputPassword1">Course Category</label> <input type="text" name="course_cat[]" class="form-control" required> </div></div></div><div class="row"><div class="col-lg-6"> <div class="form-group"> <label for="exampleInputPassword1">Video Link</label> <input type="text" name="video_llink[]" class="form-control" required> </div></div><div class="col-lg-6"> <div class="form-group"> <label for="exampleInputPassword1">Duration</label> <input type="text" name="duration[]" class="form-control" required> </div></div></div><div class="col-lg-12"> <div class="form-group"> <label for="exampleInputPassword1">Course Content</label> <textarea name="course_content[]" id="course_content'+counter+'" style="border-radius: 10px;" class="form-control mceEditor" rows="3" ></textarea> </div></div><div class="col-lg-12"> <div class="form-group"> <label for="exampleInputPassword1">Details</label> <textarea name="details[]" id="details'+counter+'" style="border-radius: 10px;" class="form-control mceEditor" rows="3" ></textarea> </div></div><br>');
            
      newTextBoxDiv.appendTo("#TextBoxesGroup");
        
        counter++;
      });

      $("#removeButton").click(function () {
        if(counter==1){
            alert("No more textbox to remove");
            return false;
        }   
          counter--;
      
          $("#TextBoxDiv" + counter).remove();
    });
    
    $("#getButtonValue").click(function () {
    
      var msg = '';
      for(i=1; i<counter; i++){
        msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
      }
        alert(msg);
    });
    
  });
</script>