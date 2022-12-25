@if ($message = Session::get('success'))

<div class="alert alert-success alert-block" style="text-align: center;">

	<button type="button" class="close" data-bs-dismiss="alert" style="float: left;">>×</button>

        <strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block" style="text-align: center;">

	<button type="button" class="close" data-bs-dismiss="alert" style="float: left;">>×</button>

        <strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-block" style="text-align: center;">

	<button type="button" class="close" data-bs-dismiss="alert" style="float: left;">>×</button>

	<strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('info'))

<div class="alert alert-info alert-block" style="text-align: center;">

	<button type="button" class="close" data-bs-dismiss="alert" style="float: left;">>×</button>

	<strong>{{ $message }}</strong>

</div>

@endif


@if ($errors->any())

<div class="alert alert-danger" style="text-align: center;">

	<button type="button" class="close" data-bs-dismiss="alert" style="float: left;">>×</button>

	Please check the form below for errors

</div>

@endif
