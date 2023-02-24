
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>	



 <form action="" method="post" id="pan_form">

			<div id="calculator_form">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="salery-cal-label">Employee's Full Name <small title="required" class="text-danger" >*</small></label>
							<input class="form-control required" name="name" id="name" placeholder="Enter Employee's Full Name*">
							
						</div >
					</div> 
						<div class="col-md-3">
						<div class="form-group">
							<label class="salery-cal-label"  >Date Of Birth<small title="required" class="text-danger">*</small></label>
							<input class="form-control required" name="date_of_birth" id="dob" placeholder="yyyy-mm-dd">
								</div >
					</div> 
						<div class="col-md-3">
						<div class="form-group">
							<label class="salery-cal-label"  >Candidate's PAN <small title="required" class="text-danger">*</small></label>
							<input class="form-control required" id="pancard" name="pan"  placeholder="Enter Employee's PAN*">
						<!--<input class="form-control" id="api_params_id_number" name="api_params[id_number]" oninput="enable_button(event)" onkeydown="return event.key != &#39;Enter&#39;;" placeholder="Eg. ABCDE1234F" type="text">	-->
						</div >
					</div>
						<div class="col-md-2">
			    			<div class="form-group">
								<!--<a class="btn btn-warning"  href='javascript:;' onclick='clear_pan_details();'  style="width: 40%;">Clear PAN</a>-->
						<!--<input type="submit" class="btn btn-success" value="get_pan_holder_name" name="verify" style="width: 40%;">-->
						                <button class="btn btn-primary"  id='form_submit' type="submit" name="verify" style="margin-top:30px;">Verify PAN</button>
						                <span id="pan_response"></span>
								<!--<a class="btn btn-success" value="get_pan_holder_name" name="verify" style="width: 40%;">Verify PAN</a>-->
							</div>
			    		</div>
			    	
			    	
					</div>
				
            </div>
        </form>


			<form>
	
				<div class="row">
					    
					<div class="col-md-4">
						<div class="form-group">
							<label class="salery-cal-label">Offer Issue Date <small title="required" class="text-danger">*</small></label>
							<input class="form-control required" name="idate" id="doi" placeholder="yyyy-mm-dd">
							
						</div >
					</div> 
					<div class="col-md-4">
						<div class="form-group">
						<label class="salery-cal-label">Offer Valid Date <small title="required" class="text-danger">*</small></label>
							<input class="form-control required" name="vdate" id="dov" placeholder="yyyy-mm-dd">
						</div >
					</div>
					<div class="col-md-4">
						<label class="salery-cal-label">Proposed Joining Date <small title="required" class="text-danger">*</small></label>
							<input class="form-control required" name="jdate" id="doj" placeholder="yyyy-mm-dd">
							
					</div >
					</div>
				<div class="row">
				 
					<div class="col-md-4">
						<div class="form-group">
						<label class="salery-cal-label">Recruiter's Name <small title="required" class="text-danger">*</small></label>
							<input class="form-control required" name="rname" id="rname" placeholder="Enter Recruiter's Name*">
						</div >
					</div>
						<div class="col-md-3">
					<div class="form-group">
					    		<label class="salery-cal-label">PAN Status<small title="required" class="text-danger">*</small></label>

								<input name="pan_status" id="pan_status" value="" class="form-control" placeholder="PAN Status">
							</div>
							</div>
								<div class="col-md-5">
					    	<div class="form-group">
					<label class="salery-cal-label">Comment<small title="required" class="text-danger">*</small></label>
							<textarea class="form-control required" name="comment" id="comment" placeholder="Enter Comments Here*"></textarea>
						</div>	
					</div>
				</div>
				<div class="row">

					<div class="col-lg-12">
						<div class="form-group">
							<button class="btn btn-primary" value="submit" id='detail_form_submit' type="submit" name="submit" style="margin-left:20rem;width:30rem;margin-top:2rem;"> &nbsp;&nbsp;Submit &nbsp;&nbsp; </button>
						</div>
					</div>
                </div>
			</form>

<script type="text/javascript">  
  $(document).ready(function(){
	  	$('#form_submit').click(function(e){
	  		e.preventDefault();
		    let name = $('#name').val();
		    let dob = $('#dob').val();
		    let pancard = $('#pancard').val();
		
		    let action ="verify pan";

			$.ajax({
				url:'submit-form.php',
				method:'post',
				data:{name:name, dob:dob,pancard:pancard,action:action},
				success: function(res){
					if (res == 'verified') {
						$('#form_submit').hide();
						$('#pan_response').text('pan verified');
						$('#pan_status').val('pan verified');
					}else{
						$('#pan_response').text('pan verified');
						$('#pan_status').val('pan verified');

					}
			console.log(res);	
				}
			})

	  		
	  	})

	  	$('#detail_form_submit').click(function(e){
	  		e.preventDefault();
		    let dov = $('#dov').val();
		    let doi = $('#doi').val();
		    let doj = $('#doj').val();
		    let rname = $('#rname').val();
		    let comment = $('#comment').val();
		    let pan_status = $('#pan_status').val();
		    let action ="submit_data";

			$.ajax({
				url:'submit-form.php',
				method:'post',
				data:{doj:doj, doi:doi,dov:dov,rname:rname,comment:comment,pan_status:pan_status,action:action},
				success: function(res){
					// if (res == 'inserted') {
					
					// }else{
						
					// }
			console.log(res);	
				}
			})

	  		
	  	})



  })


</script>