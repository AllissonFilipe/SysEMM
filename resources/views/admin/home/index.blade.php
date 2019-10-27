@extends('adminlte::page')

@section('title', 'Home')
    
@section('content_header')
    
@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
      <!-- /.row -->
     
      <!-- <div class="row">
    
        <section class="col-lg-12 connectedSortable">
         
          <div class="nav-tabs-custom">
        
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#LineChart" data-toggle="tab">Area</a></li>
              <li><a href="#donutChart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="ion ion-university"></i> Alunos</li>
            </ul>
            <div class="tab-content no-padding">
      
              <div id="LineChart" class="chart tab-pane active" style="position: relative; height: 500px"></div>
              CODIGO DO GRAFICO DE LINHA VAI AQUI

              <div id="donutChart" class="chart tab-pane" style="position: relative; height: 500px;"></div>
              CODIGO DO GRAFICO DE PIZZA VAI AQUI
            </div>
          </div>
        </section>
      </div> -->
    </section>
  </div>
@stop