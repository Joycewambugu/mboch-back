@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Job Seeker Experience
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jobSeekerExperience, ['route' => ['jobSeekerExperiences.update', $jobSeekerExperience->id], 'method' => 'patch']) !!}

                        @include('job_seeker_experiences.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection