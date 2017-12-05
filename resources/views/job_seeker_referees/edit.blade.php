@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Job Seeker Referee
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jobSeekerReferee, ['route' => ['jobSeekerReferees.update', $jobSeekerReferee->id], 'method' => 'patch']) !!}

                        @include('job_seeker_referees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection