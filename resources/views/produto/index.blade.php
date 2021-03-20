<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>






<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<script>
    function ConfirmDelete() {
        return confirm('Tem certeza que deseja excluir este registro?');
    }
</script>



<div class="container">


    <a class="btn btn-block btn-success btn-lg" href="{{ URL::to('produto/create') }}">Criar</a>
    <p></p>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Produtos</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categoria</th>
                                    <th>Nome</th>
                                    <th>Descricao</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($produtos as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->categoria->nome }}</td>
                                    <td>{{ $value->nome }}</td>
                                    <td>{{ $value->descricao }}</td>

                                        <td><a class="btn btn-info" href="{{ URL::to('produto/' . $value->id) }}">Visualizar</a></td>

                                        <td><a class="btn btn-warning" href="{{ URL::to('produto/' . $value->id . '/edit') }}">Editar</a></td>

                                        <td>
                                        {{ Form::open(array('url' => 'produto/' . $value->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Excluir', array('class' => 'btn btn-danger')) }}
                                        {{ Form::close() }}
                                        </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>
                        {{-- $produtos->links() --}}

                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <!--
                <div class="box-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Ver todos os itens</a>
                </div>
                -->
                <!-- /.box-footer -->
            </div>
        </div>
    </div>



</div>






            </div>
        </div>
    </body>
</html>


