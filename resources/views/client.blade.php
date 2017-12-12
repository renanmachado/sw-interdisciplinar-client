<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <title>Clientes</title>
        <style type="text/css">
            /* LOADER 2 */
            .loader-background {
                background-color: #fff;
                width: 100%;
                height: 100%;
                position: absolute;
                z-index: 5;
                display: none;
            }
            .loader {
                left: calc(50% - 50px);
                top: calc(50% - 48px);
                width: 100px;
                height: 96px;
                position: absolute;
            }
            #loader-2 span{
              display: inline-block;
              width: 20px;
              height: 20px;
              border-radius: 100%;
              background-color: #3498db;
              margin: 35px 5px;
            }

            #loader-2 span:nth-child(1){
              animation: bounce 1s ease-in-out infinite;
            }

            #loader-2 span:nth-child(2){
              animation: bounce 1s ease-in-out 0.33s infinite;
            }

            #loader-2 span:nth-child(3){
              animation: bounce 1s ease-in-out 0.66s infinite;
            }

            @keyframes bounce{
              0%, 75%, 100%{
                -webkit-transform: translateY(0);
                -ms-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0);
              }

              25%{
                -webkit-transform: translateY(-20px);
                -ms-transform: translateY(-20px);
                -o-transform: translateY(-20px);
                transform: translateY(-20px);
              }
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="loader-background">
                <div class="loader" id="loader-2">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
            </div>
            <div class="col-sm-1">
            </div>

            <div class="col-sm-10">
                <div class="card">
                    <div class="card-block">
                        <h3 class="card-title text-center">Cadastro de clientes</h3>
                        <p class="card-text text-center">Preencha todas informações com*</p>
                        <form method="POST" action="{{ route('clients.store')}}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label for="name">Nome*</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome" value="{{old('name')}}"> 
                                    @if ($errors->has('name'))
                                        <small class="form-text text-muted alert-danger">{{ $errors->first('name') }}</small> 
                                    @else
                                        <small class="form-text text-muted">Campo obrigatório!</small> 
                                    @endif
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('cpf') ? ' has-danger' : '' }}">
                                    <label for="cpf">CPF*</label>
                                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" value="{{old('cpf')}}"> 
                                    @if ($errors->has('cpf'))
                                        <small class="form-text text-muted alert-danger">{{ $errors->first('cpf') }}</small> 
                                    @else
                                        <small class="form-text text-muted">Campo obrigatório!</small> 
                                    @endif
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('cep') ? ' has-danger' : '' }}">
                                    <label for="cep">CEP*</label>
                                    <input type="text" name="cep" class="form-control" id="cep" placeholder="CEP" value="{{old('cep')}}"> 
                                    @if ($errors->has('cep'))
                                        <small class="form-text text-muted alert-danger">{{ $errors->first('cep') }}</small> 
                                    @else
                                        <small class="form-text text-muted">Campo obrigatório!</small> 
                                    @endif
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label for="address">Endereço*</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Endereço" value="{{old('address')}}"> 
                                    @if ($errors->has('address'))
                                        <small class="form-text text-muted alert-danger">{{ $errors->first('address') }}</small> 
                                    @else
                                        <small class="form-text text-muted">Campo obrigatório!</small> 
                                    @endif
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('city') ? ' has-danger' : '' }}">
                                    <label for="city">Cidade*</label>
                                    <input type="text" name="city" readonly="readonly" class="form-control" id="city" placeholder="Cidade" value="{{old('city')}}"> 
                                    @if ($errors->has('city'))
                                        <small class="form-text text-muted alert-danger">{{ $errors->first('city') }}</small> 
                                    @else
                                        <small class="form-text text-muted has-danger">Campo obrigatório!</small> 
                                    @endif
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('state') ? ' has-danger' : '' }}">
                                    <label for="state">Estado*</label>
                                    <input type="text" name="state" readonly="readonly" class="form-control" id="state" placeholder="Estado" value="{{old('state')}}"> 
                                    @if ($errors->has('state'))
                                        <small class="form-text text-muted alert-danger">{{ $errors->first('state') }}</small> 
                                    @else
                                        <small class="form-text text-muted has-danger">Campo obrigatório!</small> 
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
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
                </div>
            </div>
        </div>
        <script>            
            $(function() {
                $("#cep").on('focusout', function() {
                    $(".loader-background").css("display", "block");
                    $.ajax({
                        type: "GET",
                        url: "https://viacep.com.br/ws/"+ $(this).val() +"/json/",
                    })
                    .done(function( data ) {
                        if (data.erro == true) {
                            alert('Cep incorreto!');
                        } else {
                            $('#state').val(data.uf);
                            $('#city').val(data.localidade);
                            $('#address').val(data.logradouro);
                        }
                    })
                    .fail(function() {
                        alert('Cep incorreto');
                    })
                    .always(function() {
                        setTimeout(function() {
                           $(".loader-background").css("display", "none"); 
                       }, 1000);
                    });
                });
            });
        </script>
    </body>
</html>
