@extends('layouts.front')
@section('styles')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection
@section('category')
	<div class="col-md-1 bg-success text-center side-heading">
		<h4>U</h4><h4>P</h4><h4>D</h4><h4>A</h4><h4>T</h4><h4>E</h4>
		<hr class="divider">
		<h4>P</h4><h4>R</h4><h4>O</h4><h4>F</h4><h4>I</h4><h4>L</h4><h4>E</h4>
	</div>
@endsection
@section('content')
	<div class="well well-sm col-md-offset-2 col-md-12 content-holder">
		<div class="row">
			<div class="col-md-4 profile-img-holder">
			<a href="#" id="img_panel" class="profile-pic">
				<div class="profile-pic" style="background-image: url('{{ asset('images').'/'.$user->user_image  }}')" >

				    <span class="glyphicon glyphicon-camera"></span>
				    <span>Change Image</span>
				</div>
			</a>
			</div>
			<div class="col-md-8">
				<h2>{{$user->name}}</h2>
				<hr class="divider">
				<i>Description:</i> <h5>{{$user->description}}</h5>
				<h5><i>Gender : </i> {{$user->gender}}</h5>
			</div>
		</div>
		<div class="row">
			<div class="update-window col-md-12">
			<h3 class="text-center">Update Details</h3>
					<input type="text" placeholder="Full Name" value="{{$user->name}}" name="name" class="form-data-control" disabled><button class="btn btn-md btn-info btn-update" id="nameUpdate">Update</button>

					<input type="text" placeholder="Gender" value="{{$user->gender}}" name="gender" class="form-data-control" disabled><button class="btn btn-md btn-info btn-update" id="genderUpdate">Update</button>					

					<textarea placeholder="New Description"  name="description" class="form-data-control" style="resize:none;" disabled>{{$user->description}}</textarea><button class="btn btn-md btn-info btn-textarea" id="descUpdate">Update</button>

					<input type="email" placeholder="New Email" value="{{$user->email}}" name="email" class="form-data-control" disabled><button class="btn btn-md btn-info btn-update" id="mailUpdate">Update</button>

					<input type="password" placeholder="New Password" value="Password is Confidential" name="password" class="form-data-control" disabled><button class="btn btn-md btn-info btn-update" id="passUpdate">Update</button>
			</div>
		</div>
		<div id="update-form-container">
			<h2 id="update-heading"></h2>
		</div>
		<div id="update-image-container" class="update-image-container">
			<form action="{{route('users.imageUpdate', $user->username)}}" method="POST" enctype="multipart/form-data" id="UploadForm">
			{{csrf_field()}}
			            <input name="user_image" id="img_selector" type="file" class="btn btn-primary btn-md" />
			            <td><input type="submit"  id="SubmitButton" value="Upload" class="btn btn-success btn-md" /></td>
			</form>
			<div id="progressbox">
			    <div id="progressbar"></div >
			    <div id="statustxt">0%</div >
			</div>
			<div id="output"></div>
		</div>
	</div>
@endsection
@push('scripts')
	<script>
		$('#img_panel').click(function(){
			$('#img_selector').trigger("click");
			$('#SubmitButton').css('visibility', 'visible');
		});
	</script>
	<script>
	$(document).ready(function(){
		function createForm(action, inputName, updateItem){
			var form = document.createElement("form");
			form.setAttribute('method',"POST");
			form.setAttribute('action', action);
			form.setAttribute('id', "update-form");


			if(inputName == "name"){
				document.getElementById("update-heading").innerHTML = "Enter Full Name";
				var input = document.createElement("input");
				input.setAttribute('type', 'text');
				input.setAttribute('placeholder', 'Full Name');
				input.setAttribute('class', "form-control text-center");
				input.setAttribute('name', inputName);

				form.appendChild(input);
			}
			if(inputName == "gender"){
				document.getElementById("update-heading").innerHTML = "Select the Gender";
					var optionList = ["male", "female"];
					console.log(optionList[0]);
				    var combo = $("<select></select>").attr("id", "gender").attr("name", "gender").attr("class", "form-control text-center");

				    $.each(optionList, function (i, el) {
				        combo.append("<option>" + el + "</option>");
				    });

			}
			
			if(inputName == "email"){
				document.getElementById("update-heading").innerHTML = "Enter Your New Email";
				var input = document.createElement("input");
				input.setAttribute('type', 'email');
				input.setAttribute('placeholder', 'Email');
				input.setAttribute('class', "form-control text-center");
				input.setAttribute('name', inputName);

				form.appendChild(input);
			}

			if(inputName == "description"){
				document.getElementById("update-heading").innerHTML = "Enter New Description";
				var input = document.createElement("textarea"); //input element, text
				input.setAttribute('class', 'form-control text-center');
				input.setAttribute('name',inputName);

				form.appendChild(input);
			}
			if(inputName == "password"){
				document.getElementById("update-heading").innerHTML = "Enter New Password";
				var input = document.createElement("input"); //input element, text
				input.setAttribute('type',"password");
				input.setAttribute('class', 'form-control text-center');
				input.setAttribute('placeholder', 'New Password')
				input.setAttribute('name',inputName);

				var inputConfirm = document.createElement("input"); //input element, text
				inputConfirm.setAttribute('type',"password");
				inputConfirm.setAttribute('placeholder', "Confirm Password");
				inputConfirm.setAttribute('class', 'form-control text-center');
				inputConfirm.setAttribute('name',"password_confirmation");

				form.appendChild(input);
				form.appendChild(inputConfirm);
			}
			
			var submit = document.createElement("input"); //input element, Submit button
			submit.setAttribute('type',"submit");
			submit.setAttribute('value',updateItem);
			submit.setAttribute('class', "btn btn-md btn-info");				
			
			//Cancel Button
			var cancel = document.createElement("div");
			var t = document.createTextNode("Cancel");
			cancel.setAttribute('class', "btn btn-md btn-danger");
			cancel.setAttribute('id', "cancelButton");
			cancel.setAttribute('onclick', "location.reload();");
			cancel.appendChild(t);

			form.appendChild(submit);
			form.appendChild(cancel);

			//and some more input elements here
			//and dont forget to add a submit button

			$('#update-form-container').css('display','block');
			document.getElementById('update-form-container').appendChild(form);
			$("#update-form").prepend(combo);
			var csrf_token = $(' <?php echo csrf_field(); ?> ');
			$("#update-form").prepend(csrf_token);
		}

		//On click of different update button
		$('#nameUpdate').click(function(){
			createForm('{{ route('users.nameUpdate', $user->id) }}', 'name', 'Update Name')
		});
		$('#descUpdate').click(function(){
			createForm('{{ route('users.descUpdate', $user->id) }}', 'description', 'Update Description');
		});

		$('#genderUpdate').click(function(){
			createForm('{{ route('users.genderUpdate', $user->id) }}', 'gender', 'Update Gender');
		});

		$('#mailUpdate').click(function(){
			createForm('{{ route('users.emailUpdate', $user->id) }}', 'email', 'Update Email');
		});
		$('#passUpdate').click(function(){
			createForm('{{ route('users.passwordUpdate', $user->id) }}', 'password', 'Update Password');
		});

	});
	</script>
	<script>
    $(document).ready(function() {
		    //elements
		    var progressbox     = $('#progressbox');
		    var progressbar     = $('#progressbar');
		    var statustxt       = $('#statustxt');
		    var submitbutton    = $("#SubmitButton");
		    var myform          = $("#UploadForm");
		    var output          = $("#output");
		    var completed       = '0%';

		    $(myform).ajaxForm({
		        beforeSend: function() { //brfore sending form
		        submitbutton.attr('disabled', ''); // disable upload button
		        statustxt.empty();
		        progressbox.slideDown(); //show progressbar
		        progressbar.width(completed); //initial value 0% of progressbar
		        statustxt.html(completed); //set status text
		        statustxt.css('color','#000'); //initial color of status text
		        },
		        uploadProgress: function(event, position, total, percentComplete) { //on progress
		        progressbar.width(percentComplete + '%') //update progressbar percent complete
		        statustxt.html(percentComplete + '%'); //update status text
		        if(percentComplete>50)
		        {
		            statustxt.css('color','#fff'); //change status text to white after 50%
		        }
		    },
		    complete: function(response) { // on complete
		    output.html(response.responseText); //update element with received data
		    myform.resetForm();  // reset form
		    submitbutton.removeAttr('disabled'); //enable submit button
		    progressbox.slideUp(); // hide progressbar
			}
	});
	});
	</script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
@endpush