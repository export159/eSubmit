<div>&copy FePO Programmers All rights Reseved 2015</div>
</body>
<script type="text/javascript" src="../public/js/jquery.js"></script>
<script type="text/javascript" src="../public/js/npm.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
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

		$('.btn').on('click', function () {
    		$btn = $(this).button('loading')
    		// business logic...
    		
  		})
	});
</script>
</html>