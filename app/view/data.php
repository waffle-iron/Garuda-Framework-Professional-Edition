<?php defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...'); ?>
<?=

/*
* 	Contoh simple template HTML 
* 	Sudah termasuk Meta Name, Description, Img, dll  
*	Sudah termasuk include bootstrap , JQuery , dan GF-1.js
*/

_title("Home");


_openBody();


/*
*  Lihat lokasi file pada "System/GF_HTHML.php"
*/

include 'head.php';

?>
<hr>
<div class="container">
 	<div id="message_status"></div>
<div class="form-group">
  <label for="txt_name">Name:</label>
  <input type="text" class="form-control" id="txt_name" placeholder="Username" onkeypress="enterSave(event);">
</div>
<div class="form-group">
  <label for="txt_email">Email:</label>
  <input type="text" class="form-control" id="txt_email" placeholder="Email" onkeypress="enterSave(event);">
</div>
<div class="form-group">
  <label for="txt_pwd">Password:</label>
  <input type="password" class="form-control" id="txt_pwd" placeholder="Password" onkeypress="enterSave(event);">
</div>
<div class="form-group">
 
  <button type="button" id="btn_save" onclick="saveData();" class="btn btn-primary">Save </button>
</div>
	
</div>


<div class="container">
    
 
	<div id="#load_data_table"></div>
	
</div>
<?=
/*
* Contoh membuat Modal Bootstrap
*/
_createModal("editData","Edit Data",
		'
		<div id="message_edit"></div>
		<input type="text" class="form-control" id="txt_edit_name" placeholder="Username" onkeypress="enterEdit(event);"> </br>
		<input type="text" class="form-control" id="txt_edit_email"  placeholder="Email"	onkeypress="enterEdit(event);"></br>
		<input type="text" class="form-control" id="txt_edit_password" 	placeholder="Password" onkeypress="enterEdit(event);"></br>
		<button type="button" id="btn_edit" class="btn btn-warning btn-md" onclick="editData();">Edit</button></td>
		');
?>
<script>
	_focus("txt_name");
	

  function enterSave(e){
        if (e.keyCode == 13) 
        {
            saveData();
        }
    }

    function enterEdit(e){
    	if (e.keyCode == 13) 
        {
            editData();
        }
    }

	function saveData()
	{
		// _getValById("id") = document.getValueById("id")
		var name  = _getValById("txt_name");
		var email = _getValById("txt_email");
		var pswd  = _getValById("txt_pwd");


		if (name==='')
		{
			_writeAlert("message_status","Nama masih kosong !","danger");
			_focus("txt_name");
			return;
		}
		if (email==='')
		{
			_writeAlert("message_status","Email masih kosong !","danger");
			_focus("txt_email");
			return;
		}
		if (_checkEmail(email) == false)
		{
			_writeAlert("message_status","Email tidak valid !","danger");
			_focus("txt_email");
			return;
		}
		if (pswd==='')
		{
			_writeAlert("message_status","Password masih kosong !","danger");
			_focus("txt_pwd");
			return;
		}

		// Ajax Post
		_requestPOST(full_url+"ajax-insert","u="+name+"&e="+email+"&p="+pswd+"",function(res){
				
					if (res==='T')
					{
						_writeAlert("message_status","Berhasil Menyimpan Data","success");
						_clear("txt_name");
						_clear("txt_email");
						_clear("txt_pwd");
						loadData();
					}	
					else if (res==='F')
					{
						_writeAlert("message_status","Gagal Menyimpan Data","danger");
					}
					
		});
	}


	function deleteData(id_user){
		swal({
			title: "Anda yakin mau hapus data ini ?",
			text: "Data yang dihapus tidak akan lorem ipsum",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes ! Hapus Aja !",
			closeOnConfirm: false
		},
		function(){

		
			if (id_user==='')
			{
				_writeAlert("message_status","ID Data Tidak Ada","danger");
				return;
			}
			// Ajax Post
			_requestPOST(full_url+"ajax-delete","id="+id_user+"", function(res){
				if (res==='T')
				{
					swal("Deleted!", "Data sudah dihapus !", "success");
					loadData();
				}	
				else
				{
					_writeAlert("message_status","Gagal Menghapus Data","danger");
				}

			});
		
			
		});
	}

    var id_user_edit;
	function showModalEdit(id_user){

		id_user_edit = id_user;

		$('#editData').modal("show");
		
	}

	function editData(){
		var name_edit = _getValById("txt_edit_name");
		var email_edit = _getValById("txt_edit_email");
		var pswd_edit = _getValById("txt_edit_password");

		if (name_edit==='')
		{
			_writeAlert("message_edit","Nama masih kosong !","danger");
			_focus("txt_edit_name");
			return;
		}
		if (email_edit==='')
		{
			_writeAlert("message_edit","Email masih kosong !","danger");
			_focus("txt_edit_email");
			return;
		}
		if (_checkEmail(email_edit) == false)
		{
			_writeAlert("message_edit","Email tidak valid !","danger");
			_focus("txt_edit_email");
			return;
		}
		if (pswd_edit==='')
		{
			_writeAlert("message_edit","Password masih kosong !","danger");
			_focus("txt_edit_password");
			return;
		}


		if (id_user_edit==='')
			{
				_writeAlert("message_edit","ID Data Tidak Ada","danger");
				return;
			}
			// AJAX Get
			_requestGET(full_url+"ajax-update/"+id_user_edit+"/"+name_edit+"/"+email_edit+"/"+pswd_edit+"", function(res){
				if (res==='T')
				{
					swal("Updated !", "Data sudah diubah !", "success");
					_clear("txt_edit_name");
					_clear("txt_edit_email");
					_clear("txt_edit_password");
					loadData();
				}	
				else
				{
					_writeAlert("message_edit","Gagal Mengubah Data","danger");
				}

			});
	}

	// contoh  token
	var token = _randomStr();

	function loadData(){
		_printTo("#load_data_table",""); 
		// AJAX Post
		_requestPOST(full_url+"load-data","token="+token+"",function(res){
			if (res != 'F')
			{
				_printTo("#load_data_table",res);
			}
			else
			{
				_printTo("#load_data","");
			}
			
		});
	}

	loadData();
</script>

<?=
_closeBody();
