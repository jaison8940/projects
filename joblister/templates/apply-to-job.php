<?php include 'includes/header.php'; ?>
  
  <h2 class="page-header">Apply To Job</h2>
  <form method="post" action="applytojob.php">
    <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
    <div class="form-group">
      <label>First Name*</label>
      <input type="text" class="form-control" name="fname" required>
    </div>

    <div class="form-group">
      <label>Last Name*</label>
      <input type="text" class="form-control" name="lname" required>
    </div>

    <div class="form-group">
      <label>DOB*</label>
      <input type="date" class="form-control" name="dob" required>
    </div>

    <div class="form-group">
      <label>Address*</label>
      <input type="text" class="form-control" name="address" required>
    </div>

    <div class="form-group">
      <label>City*</label>
      <input type="text" class="form-control" name="city" required>
    </div>

    <div class="form-group">
      <label>State*</label>
      <input type="text" class="form-control" name="state" required>
    </div>

    <div class="form-group">
      <label>Country*</label>
      <select id="country" class="form-control" name="country" required>
        <option value="">Select Country</option>
        <?php foreach ($countries as $country): ?>
          <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>


    <div class="form-group">
      <label>Highest Qualification*</label>
      <select id="qualification" class="form-control" name="qualification" required>
        <option value="">Select Qualification</option>
        <?php foreach ($qualifications as $qualification): ?>
          <option value="<?php echo $qualification->id; ?>"><?php echo $qualification->name; ?></option>
        <?php endforeach; ?>
              
      </select>
    </div>
    <div class="form-group" id="block1">
      <div class="form-group" id="course_part">
        <label>Course*</label>
        <select id="course" class="form-control block1 other" name="course">
          <option value="">Select Course</option>                
        </select>
      </div>
    
      <div class="form-group" id="specialization_part">
        <label>Specialization*</label>
        <select id="specialization" class="form-control block1 other" name="specialization">
          <option value="">Select</option>
          <?php foreach ($specializations as $specialization): ?>
            <option value="<?php echo $specialization->name; ?>"><?php echo $specialization->name; ?></option>
          <?php endforeach; ?>
          <option value="other">Other</option>
                
        </select>
      </div>

      <div class="form-group" id="college_part">
        <label>University/College*</label>
        <select id="college" class="form-control block1 other" name="university_or_college">
          <option value="">Select University/College</option>
          <?php foreach ($colleges as $college): ?>
            <option value="<?php echo $college->name; ?>"><?php echo $college->name; ?></option>
          <?php endforeach; ?>
                
        </select>
      </div>
      
      <div class="form-group">
        <label>Passing Year*</label>
        <input type="text" class="form-control block1" name="passing_year">
      </div>

      <div class="radio-inline">
        <label>Course Type*</label><br>
        <label class="radio-inline"><input class="block1" type="radio" name="ctype" value="Full Time"> Full Time</label>
        <label class="radio-inline"><input type="radio" name="ctype" value="Part Time"> Part Time</label>
        <label class="radio-inline"><input type="radio" name="ctype" value="Correspondence"> Correspondence</label>
      </div>

      <div class="form-group">
        <label>CGPA*</label>
        <input type="text" class="form-control block1" name="cgpa">
      </div>

      <div class="form-group">
        <label>Arrears, if any</label>
        <input type="text" class="form-control" name="arrear">
      </div>
    </div>

    <div class="form-group" id="block2">
      <div class="form-group">
        <label>Board*</label>
        <select id="board" class="form-control block2" name="board" >
          <option value="">Select</option>
          <?php foreach ($boards as $board): ?>
            <option value="<?php echo $board->name; ?>"><?php echo $board->name; ?></option>
          <?php endforeach; ?>
                
        </select>
      </div>

      <div class="form-group">
        <label>Year Of Passing*</label>
        <input type="text" class="form-control block2" name="yop" >
      </div>

      <div class="form-group">
        <label>Percentage*</label>
        <input type="text" class="form-control block2" name="percentage" >
      </div>

    </div>

    <div class="form-group">
      <label>Email*</label>
      <input type="email" class="form-control" name="email" required>
    </div>

    <div class="form-group">
      <label>Contact Number</label>
      <div class="input-group">
      <div class="input-group-btn">
        <button style="border: 1px solid #D3D3D3;" class="btn btn-default" type="submit" disabled><span id="ph_code">+91</span>
        </button>
      </div>
      <input type="text" class="form-control" name="contact_no">
    </div>
    
    <br>
    
    <input type="submit" class="btn btn-primary" value="Submit" name="submit">


  
  <script>
    
    $(document).ready(function(){

      $( "#block1" ).hide();
      $( "#block2" ).hide();
      

      $('#country').change(function(){
        var id = $(this).val();
        $.ajax({
          url: "applytojob.php",
          method: "POST",
          data: {
            country_id: id
            },
          success: function( result ) {

            $( "#college" ).html(result);
            
          }
        }); 
        $.ajax({
          url: "applytojob.php",
          method: "POST",
          data: 
          {
            country_id_for_phcode: id
            },
          success: function( result ) {
            $( "#ph_code" ).html(result);
          }
        });      
      });

      

      $('#qualification').change(function(){
        var id = $(this).val();
        
        if(id<4){
          $( "#block1" ).show();
          $( "#block2" ).hide();
          $('.block1').attr("required",true);
          $.ajax({
            url: "applytojob.php",
            method: "POST",
            data: {
              qualification_id: id
              },
            success: function( result ) {

              $( "#course" ).html(result);
            }
          });      
        }
        else{
          $( "#block1" ).hide();
          $( "#block2" ).show();
          $('.block2').attr("required",true);
        }
      });
      var flag1=0,flag2=0,flag3=0;
      $( ".other" ).change(function(){

        var course = $('#course').val();
        var specialization = $('#specialization').val();
        var university_or_college = $('#college').val();
        
        if(course == 'other' && flag1==0){
        $('#course_part').append('<div id="crs_other"><br><input  type="text" class="form-control block2" name="course_other" placeholder="Please enter your course"></div>');
          flag1=1;
        }
        else if(course != 'other'){
          $('#crs_other').remove();
          flag1=0;
        }
        if(specialization == 'other' && flag2==0){
          $('#specialization_part').append('<div  id="specialization_other"><br><input type="text" class="form-control block2" name="specialization_other" placeholder="Please enter your specialization"></div>');
          flag2=1;
        }
        else if(specialization != 'other'){
          $('#specialization_other').remove();
          flag2=0;
        }
        if(university_or_college == 'other' && flag3==0){
          $('#college_part').append('<div id="college_other"><br><input type="text" class="form-control block2"  name="college_other" placeholder="Please enter your University/College"></div>');
          flag3=1;
        }
        else if(university_or_college != 'other'){
          $('#college_other').remove();
          flag3=0;
        }

      });


    });
</script>

</form>
<?php include 'includes/footer.php'; ?>

