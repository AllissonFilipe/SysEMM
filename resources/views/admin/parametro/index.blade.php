@extends('adminlte::page')

@section('title', 'Parâmetro')

@section('content_header')

<h1>Parâmetros</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Parâmetro</a></li>
</ol>
@stop

@section('content')
    @if(Auth::user()->tipo == "Coodenador")
        <div class="box">
            <div class="box-header">
                <a href="{{route('parametro.create')}}" class="btn btn-warning">
                    <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
                <div style="float: right;" class="form-group input-group">
                    <form action="{{ route('admin.parametro') }}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Buscar Parâmetro"><span class="input-group-btn">
                                <button type="submit" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <br><br>
            </div>
            @if (session('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('message') }}
            </div>
            @endif
            <div class="box-body">
                <div>
                    <br />
                    <h5><b>Total: {{$total}}</b></h5>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr style="background-color: #ffdab3;">
                                    <th id="center">Código</th>
                                    <th>Chave</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parametros as $parametro)
                                <tr>
                                    <td id="center">{{$parametro->id}}</td>
                                    <td title="Chave">{{$parametro->chave}}</td>
                                    <td title="Tipo">{{$parametro->tipo}}</td>
                                    @if($parametro->valor_inteiro)
                                        <td title="Valor Inteiro">{{$parametro->valor_inteiro}}</td>
                                    @endif
                                    @if($parametro->valor_decimal)
                                        <td title="Valor Decimal">{{$parametro->valor_decimal}}</td>
                                    @endif
                                    @if($parametro->valor_data)
                                        <td title="Valor Data">{{$parametro->valor_data}}</td>
                                    @endif
                                    @if($parametro->valor_logico)
                                        <td title="Valor Lógico">{{$parametro->valor_logico}}</td>
                                    @endif
                                    @if($parametro->valor_texto)
                                        <td title="Valor Texto">{{$parametro->valor_texto}}</td>
                                    @endif
                                    <td id="center">
                                        <!-- Botão para acionar modal -->
                                        <button data-toggle="modal" data-target="#ModalCentralizado<?php echo ($parametro->id); ?>" class="btn btn-primary">
                                            Visualizar
                                        </button>&nbsp;
                                        <a href="{{route('parametro.edit', $parametro->id)}}" data-toggle="tooltip" data-placement="top" title="Alterar" class="btn btn-success">Editar</a>
                                        &nbsp;<form style="display: inline-block;" method="POST" action="{{route('parametro.delete', $parametro->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
                                            {{method_field('DELETE')}}{{ csrf_field() }}
                                            <button class="btn btn-danger" type="submit" >
                                                Apagar
                                            </button></form>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="ModalCentralizado<?php echo ($parametro->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="TituloModalCentralizado">Parâmetro</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="text-center">
                                                    <b>Chave :</b> {{$parametro->chave}}<br>
                                                    <b>Tipo :</b> {{$parametro->tipo}}<br>
                                                    @if($parametro->valor_inteiro)
                                                        <b>Valor :</b> {{$parametro->valor_inteiro}}<br>
                                                    @endif
                                                    @if($parametro->valor_decimal)
                                                        <b>Valor :</b> {{$parametro->valor_decimal}}<br>
                                                    @endif
                                                    @if($parametro->valor_data)
                                                        <b>Valor :</b> {{$parametro->valor_data}}<br>
                                                    @endif
                                                    @if($parametro->valor_logico)
                                                        <b>Valor :</b> {{$parametro->valor_logico}}<br>
                                                    @endif
                                                    @if($parametro->valor_texto)
                                                        <b>Valor :</b> {{$parametro->valor_texto}}<br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>

                        {!! $parametros->links() !!}
                    </div>
                </div>
            </div>
    @else
        <div class="text-center">
            <p><h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1></p>
            <p><h2>Você não tem acesso a esta página !</h2></p>
        </div>
    @endif
@stop