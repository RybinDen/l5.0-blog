@extends('layouts.app')

@section('title')
Запрос сброса пароля
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h1>Запрос сброса пароля</h1></div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Внимание! Вы допустили ошибку.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
<form class="form-horizontal" role="form" method="POST" action="/password/email">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">

<label class="col-md-4 control-label">Ваш адресс электронной почты:</label> 
<div class="col-md-6">
<input class="form-control" type="email" name="email" value="{{old('email')}}" required>
</div></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Отправить ссылку для сброса пароля
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection