@if(count($errors))

<script type="text/javascript">

	//swal("Good job!", "", "danger");

	swal({
	  title: "Validation Error!",
	  text: "Invalid Input submited to form",
	  timer: 2000,
	  type: "error",
	  showConfirmButton: false
	});

</script>
	<ul class="list-group bg-danger">
	@foreach($errors->all() as $error)

	<li class="bg-danger text-danger list-group-item">
	  {{$error}}
	</li>
	@endforeach
	</ul>
@endif