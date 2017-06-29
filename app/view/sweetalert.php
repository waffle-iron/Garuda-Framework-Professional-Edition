<?php $_SESSION['sys_run_app'] ?? exit('403 You dont have permission to access / on this server...'); ?>
<?=

/*
* 	Contoh simple template HTML 
* 	Sudah termasuk Meta Name, Description, Img, dll  
*	Sudah termasuk include bootstrap , JQuery , dan GF-1.js
*/
_title("Sweet Alert");


_openBody();
include 'head.php';
?>

		
		<hr>
		<div class="container">
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#collapse1">Switch Alert</a>
					</h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse">
					<ul class="list-group">
						<li class="list-group-item"><button type="button" class="btn btn-primary btn-xs" onclick="basic();">Basic Alert</button></li>
						<li class="list-group-item"><button type="button" class="btn btn-success btn-xs" onclick="success();">Success Alert</button></li>
						<li class="list-group-item"><button type="button" class="btn btn-default btn-xs" onclick="prompt();">Prompt Alert</button></li>
						<li class="list-group-item">	<button type="button" class="btn btn-danger btn-xs" onclick="confirmBasic();">Confirm Basic</button></li>
						<li class="list-group-item"><button type="button" class="btn btn-danger btn-xs" onclick="confirmCancel();">Confirm Cancel</button>
						</li>
					</ul>
					<div class="panel-footer"></div>
				</div>
			</div>
		</div>
		</div>
		
		<script type="text/javascript">
		  // standart
			function basic(){
					 swal("Where are you ?");
			}


			function success(){
				 swal("Good job!", "You clicked the button!", "success");
			}


			function prompt(){
						swal({
							 title: "An input!",
							 text: "Write something interesting:",
							 type: "input",
							 showCancelButton: true,
							 closeOnConfirm: false,
							 animation: "slide-from-top",
							 inputPlaceholder: "Write something"
							 },
							 function(inputValue){
							 if (inputValue === false) return false;

							 if (inputValue === "") {
							 swal.showInputError("You need to write something!");
							 return false
					 }

					 swal("Nice!", "You wrote: " + inputValue, "success");


				 swal({
					 title: "Sweet!",
					 text: "Here's a custom image.",
					 imageUrl: full_url+"app/view/vendor/icon/test.png"
				 });
					 });
			}
			function confirmBasic(){
						swal({
						title: "Are you sure?",
						text: "You will not be able to recover this imaginary file!",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
						},
						function(){
						swal("Deleted!", "Your imaginary file has been deleted.", "success");
						});
			}
			function confirmCancel(){
							swal({
							title: "Are you sure?",
							text: "You will not be able to recover this imaginary file!",
							type: "warning",
							showCancelButton: true,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "Yes, delete it!",
							cancelButtonText: "No, cancel plx!",
							closeOnConfirm: false,
							closeOnCancel: false
							},
							function(isConfirm){
									if (isConfirm) {
										swal("Deleted!", "Your imaginary file has been deleted.", "success");
									} else {
										swal("Cancelled", "Your imaginary file is safe :)", "error");
									}
							});
			}

			function html(){

			}

		</script>


		<?=
		_createModal("login","Login ","Please Login");
		?>

<?=
_closeBody();
