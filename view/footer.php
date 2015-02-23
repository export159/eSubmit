</body>
<script type="text/javascript" src="../public/js/jquery.js"></script>
<script type="text/javascript" src="../public/js/npm.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
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
	});
</script>
</html>