
@if(Session::has('flash_message'))

<script type="text/javascript">

	//swal("Good job!", "", "success");
	swal({
	  title: "Successful!",
	  text: "{{Session::get('flash_message')}}",
	  timer: 3500,
	  type: "success",
	  showConfirmButton: true
	});
</script>
@endif


@if(Session::has('danger_message'))

<script type="text/javascript">

	//swal("Good job!", "", "danger");

	swal({
	  title: "Error!",
	  text: "{{Session::get('danger_message')}}",
	  timer: 3500,
	  type: "error",
	  showConfirmButton: true
	});

</script>

@endif