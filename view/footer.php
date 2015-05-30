<div class="text-center">&copy FePO -- All rights Reseved 2015</div>
</body>
<script type="text/javascript" src="../public/js/jquery.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../public/js/npm.js"></script>
<!-- user defined javascripts -->
<script type="text/javascript" src="../public/js/validations.js"></script>
<script type="text/javascript" src="../public/js/view.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//---- model controllers ----//
		$('#btn-login').click(function(){
			$('#modal-login').modal('toggle')
		});
		$('#btn-signup').click(function(){
			$('#modal-signup').modal('toggle')
		});
		//---- end ------------------//

		// ---- navbar activator ---- //
		<?php 
			$break = array();
			$url = $_SERVER["REQUEST_URI"];
			$break = explode('/', $url);
			echo "var current_controller = '$break[3]';";
		?>

		if(current_controller == 'index.php'){
			$('#tab-home').addClass('active');
		}else if(current_controller == 'upload.php'){
			$('#tab-submit').addClass('active');
		}else if(current_controller == 'view.php'){
			$('#tab-view').addClass('active');
		}
		// ---- end ------------------//

		$('body').on('click','.btn', function () {
    		$btn = $(this).button('loading')
    		// business logic...
    		
  		});
  		// logging in / signing up as
  		$('body').on('change', '.login-signup-as', function(e){
  			value = $(this).val();
  			form = $(this).data('value');
  			if(value == 0){
  				$('.'+form).find('.user-fields').attr('disabled','');
  			}else{
  				$('.'+form).find('.user-fields').removeAttr('disabled');
  				if(value == 'teacher'){
  					$('.'+form).find('#id-field').attr('placeholder', 'Enter teacher no');
  				}else{
  					$('.'+form).find('#id-field').attr('placeholder', 'Enter student no');
  				}
  			}
  		});

  		validate_upload();
  		remarks();
	});
</script>
</html>