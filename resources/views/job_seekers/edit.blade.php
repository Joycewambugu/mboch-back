@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Job Seeker
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jobSeeker, ['route' => ['jobSeekers.update', $jobSeeker->id], 'method' => 'patch']) !!}

                        @include('job_seekers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection