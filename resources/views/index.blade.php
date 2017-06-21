@extends('shared._template_contacts')

@section('content')
	<fieldset>
		<legend>
			Lista de Contatos
		</legend>
		  	<div class="form-group">
				<input type="text" id="myInput" onkeyup="filtrar();" placeholder="Buscar por ....." title="Digite sua busca aqui" class="form-control  input-sm">
			</div>
			<div class="flash-message">
			    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
			      @if(Session::has('alert-' . $msg))
			      	<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
			      @endif
			    @endforeach
			</div>
			<a href="/cadastro"><span class="btn btn-success" style="float: right; margin-bottom: 5px;">Novo Contato</span></a>
			<table class="table table-striped" id="contacts">
				<tr>
					<th>Nome</th>
					<th>Sobrenome</th>
					<th>E-mail</th>
					<th>Nascimento</th>
					<th>Cargo</th>
					<th>Empresa</th>
					<th>Telefone</th>
					<th>Celular</th>
					<th>Bairro</th>
					<th>Cidade</th>
					<th>Estado</th>
					<th>Observações</th>
					<th>Ação</th>
				</tr>
				@if(isset($contacts) || $contacts)
					@foreach($contacts as $contact)
						<tr>
							<td>{{ $contact->first_name }}</td>
							<td>{{ $contact->last_name }}</td>
							<td>{{ $contact->email }}</td>
							<td>{{ $contact->date }}</td>
							<td>{{ $contact->job }}</td>
							<td>{{ $contact->company }}</td>
							<td>{{ $contact->phone }}</td>
							<td>{{ $contact->cellphone }}</td>
							<td>{{ $contact->neighborhood }}</td>
							<td>{{ $contact->city }}</td>
							<td>{{ $contact->state }}</td>
							<td>{{ $contact->obs }}</td>
							<td>
								<a href="/alterar/{{ $contact->id }}"><span class="btn btn-warning" style="float: right;">Editar </span></a>
								<a href="/contact/remove/{{ $contact->id }}"><span class="btn btn-danger" style="float: right;">X</span></a>
							</td>
						</tr>
					@endforeach
				@endif
			</table>
	</fieldset>
	<fieldset>
		<legend>
			ANIVERSÁRIO NOS PRÓXIMOS 30 DIAS
		</legend>
		<table class="table table-striped">
				<tr>
					<th>Nome</th>
					<th>Sobrenome</th>
					<th>Nascimento</th>
				</tr>
				@if(isset($birthdays) || $birthdays)
					@foreach($birthdays as $birthday)
						<tr>
							<td>{{ $birthday->first_name }}</td>
							<td>{{ $birthday->last_name }}</td>
							<td>{{ $birthday->date }}</td>
						</tr>
					@endforeach
				@endif
			</table>
	</fieldset>			
@endsection
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript">
	// function filtrar() {
	//   var input, filter, table, tr, td, td2, td3, i;
	//   var arr = [];
	//   input = document.getElementById("myInput");
	//   filter = input.value.toUpperCase();
	//   table = document.getElementById("contacts");
	//   tr = table.getElementsByTagName("tr");
	//   for (i = 0; i < tr.length; i++) {
	//   	console.log(tr.length)
	//     arr = tr[i].getElementsByTagName("td")[i];
	//     console.log(arr);
	//     if (arr) {
	//       if (arr.innerHTML.toUpperCase().indexOf(filter) > -1 ) {
	//         tr[i].style.display = "";
	//       } else {
	//         tr[i].style.display = "none";
	//       }
	//     }       
	//   }
	// }

function filtrar() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("contacts");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
