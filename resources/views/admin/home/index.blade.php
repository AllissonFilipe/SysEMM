@extends('adminlte::page')

@section('title', 'Home')
    
@section('content_header')
    
@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
  @if(Auth::user()->tipo == "Coordenador")
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        
        <small>Painel Principal</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$total_alunos}}</h3>

              <p>Total de Estudantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-university"></i>
            </div>
            <a href="{{ route('admin.aluno') }}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$total_professores}}</h3>

              <p>Total de Professores</p>
            </div>
            <div class="icon">
              <i class="ion ion-man"></i>
            </div>
            <a href="{{ route('admin.user') }}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{$total_users}}</h3>

              <p>Total de Empregados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.user') }}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$total_turmas}}</h3>

              <p>Total de Turmas    </p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="{{ route('admin.turma') }}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
  </div>
  @else
    <div class="content-wrapper text-center">
      <h3><b>PERFIL PROFESSOR</b></h3>
      <h1><i class="fa fa-graduation-cap fa-5x" aria-hidden="true"></i></h1>
    </div>
  @endif
@stop