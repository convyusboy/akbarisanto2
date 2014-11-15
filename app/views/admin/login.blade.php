@extends('layouts.admin')

@section('content')

<div class="page-content">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="login-container">

        <div class="position-relative">

          <div id="login-box" class="login-box visible widget-box no-border">
            <div class="widget-body">
              <div class="widget-main">

                <div class="space-6">
                </div>

                <div>
                  {{ $errors->first('username') }}
                  {{ $errors->first('password') }}
                  @if(Session::has('message'))
                  <div id="message">{{ Session::get('message') }}</div>
                  @endif
                </div>

                {{ Form::open(array('id' => 'login_form')) }}
                <fieldset>
                  <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                      {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
                      <i class="icon-user"></i>
                    </span>
                  </label>

                  <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                      {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                      <i class="icon-lock"></i>
                    </span>
                  </label>

                  <div class="space"></div>

                  <div class="clearfix">
                    <label class="inline">
                      <input type="checkbox" class="ace" name="remember"/>
                      <span class="lbl"> Ingat saya</span>
                    </label>

                    <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                      <i class="icon-key"></i>
                      Login
                    </button>
                  </div>

                  <div class="space-4"></div>
                </fieldset>
                {{ Form::close() }}

              </div><!-- /widget-body -->
            </div><!-- /login-box -->

          </div><!-- /position-relative -->
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>

@stop