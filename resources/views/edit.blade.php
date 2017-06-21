@extends('shared._template_contacts')
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
@section('content')
<div class="formulario-cadastro">
	<div class="container">
		<form accept-charset="UTF-8" action="/contact/edit" id="contact-form-edit" method="post">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="contact_id" type="hidden" value="{{ $contact->id }}">
			<br>
			<div class='form-row'>
				<div class='form-group required'>
					<div class='error form-group hide'>
						<div class='alert-danger alert'>
							Corrija os erros e tente novamente.
						</div>
					</div>
					<label class='control-label'>Nome</label>
					<input type="text" name="firstName" class="form-control" placeholder="Ex: Jorge Henrique" value="{{ $contact->first_name }}">
				</div>
			</div>
			<div class='form-row'>
				<div class='form-group card required'>
					<label class='control-label'>Sobrenome</label>
					<input type="text" name="lastName" class="form-control" placeholder="Ex: Santana" value="{{ $contact->last_name }}">
				</div>
			</div>
			<div class='form-row'>
				<div class='form-group card required'>
					<label class='control-label'>E-mail</label>
					<input type="text" name="email" class="form-control" placeholder="Ex: henriique.ti@email.com" value="{{ $contact->email }}">
				</div>
			</div>
			<div class='form-row'>
				<div class='form-group cvc required'>
					<label class='control-label'>Nascimento</label>
					<input type="text" name="date" class="form-control" placeholder="Ex: 30/06/1991" value="{{ $formatedDate }}">
				</div>
				<div class='form-group expiration required'>
					<label class='control-label'>Cargo</label>
					<input type="text" name="job" class="form-control" placeholder="Ex: Suporte" value="{{ $contact->job }}">
				</div>
				<div class='form-group expiration required'>
					<label class='control-label'>Empresa</label>
					<input type="text" name="company" class="form-control" placeholder="Ex: Google" value="{{ $contact->company }}">
				</div>
				<div class='form-group expiration required'>
					<label class='control-label'>Telefone</label>
					<input type="text" name="phone" class="form-control" placeholder="Ex:888-888-888" value="{{ $contact->phone }}">
				</div>
				<div class='form-group expiration required'>
					<label class='control-label'>Celular</label>
					<input type="text" name="cellphone" class="form-control" placeholder="Ex: 888-999-555-6" value="{{ $contact->cellphone }}">
				</div>
				<div class='form-group expiration required'>
					<label class='control-label'>Bairro</label>
					<input type="text" name="neighborhood" class="form-control" placeholder="Ex: Campo Grande" value="{{ $contact->neighborhood }}">
				</div>
				<div class='form-group expiration required'>
					<label class='control-label'>Cidade</label>
					<input type="text" name="city" class="form-control" placeholder="Ex: Rio de Janeiro" value="{{ $contact->city }}">
				</div>
				<div class='form-group expiration required'>
					<label class='control-label'>Estado</label>
					<input type="text" name="state" class="form-control" placeholder="Ex: Rio de Janeiro" value="{{ $contact->state }}">
				</div>
				<div class='form-group expiration required'>
					<label class='control-label'>Observação</label>
					<textarea class='form-control card-expiry-year' placeholder='Observação' name="obs" rows="10" type='textarea'">{{ $contact->obs }}</textarea>
				</div>
			</div>


			<div class='form-row'>
				<div class='form-group'>
					<label class='control-label'></label>
				</div>
			</div>
			<button class='form-control btn btn-primary' type='submit'> Salvar Contato</button>
		</form>   
	</div>
</div>
@endsection

<script type="text/javascript">
	$('#contact-form-edit').submit(function()
	{
		
	});
</script>