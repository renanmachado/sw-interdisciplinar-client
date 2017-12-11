<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
        <title>Clientes</title>
    </head>
    <body>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="card">
              <div class="card-block">
                <h3 class="card-title text-center">Cadastro cliente</h3>
                <p class="card-text text-center">Prencha todas informações com*</p>
            <form method="POST" action="{{ route('clients.store')}}">
                {{ csrf_field() }}
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Nome</label>
                  <input type="name" class="form-control" id="name" placeholder="Nome">
                </div>
                <div class="form-group col-md-6">
                  <label for="cpf">CPF</label>
                  <input type="cpf" class="form-control" id="cpf" placeholder="CPF">
                </div>
                <div class="form-group col-md-6">
                  <label for="cep">CEP</label>
                  <input type="cep" class="form-control" id="cep" placeholder="CEP">
                </div>
                <div class="form-group col-md-6">
                  <label for="andress">Endereço</label>
                  <input type="andress" disabled class="form-control" id="andress" placeholder="Endereço">
                </div>
                <div class="form-group col-md-6">
                  <label for="andress">Cidade</label>
                  <input type="city" disabled class="form-control" id="city" placeholder="Cidade">
                </div>
                 <div class="form-group col-md-6">
                  <label for="andress">Estado</label>
                  <input type="state" disabled class="form-control" id="state" placeholder="Estado">
                </div>
                <div class="form-group col-md-12">
                 <button type="submit" class="btn btn-primary">Salvar</button>
               </div>
              </div>
            </form>
            <div class="col-sm-12">
              <h3 class="card-title text-center">Listagem de clientes</h3>
              <table class="table table-inverse">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>CPF</th>
                      <th>CEP</th>
                      <th>Endereço</th>
                      <th>Cidade</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($clients as $client)
                    <tr>
                      <th scope="row">1</th>
                      <td>{{ $client['name'] }}</td>
                      <td>{{ $client['cpf'] }}</td>
                      <td>{{ $client['cep'] }}</td>
                      <td>{{ $client['address'] }}</td>
                      <td>{{ $client['city'] }}</td>
                      <td>{{ $client['state'] }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </body>
</html>
