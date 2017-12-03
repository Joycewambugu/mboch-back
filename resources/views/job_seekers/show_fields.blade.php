<div class="col-xs-12">
    <div class="well well-sm">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <img src="{!! $jobSeeker->photo !!}" alt="" class="img-rounded img-responsive" />
            </div>
            <div class="col-sm-6 col-md-8">
                <h2>{!! $jobSeeker->name !!}</h2>
                <small><cite title="{!! $jobSeeker->current_location !!}">{!! $jobSeeker->current_location !!} <i class="glyphicon glyphicon-map-marker">
                </i></cite></small>
                
                <div class="row">
                    <div class="col col-md-6">
                    <i class="fa fa-user"></i> <strong> {!! $jobSeeker->gender !!}, {!! $jobSeeker->age() !!}</strong><br>
                <i class="fa fa-briefcase"></i> <strong> {!! $jobSeeker->experience_years !!} Years Job experience</strong><br>
                        <i class="glyphicon glyphicon-envelope"></i> {!! $jobSeeker->email !!}
                        <br />
                        <i class="glyphicon glyphicon-phone"></i><a href="tel:{!! $jobSeeker->phone !!}"> {!! $jobSeeker->phone !!}</a><br />
                        <i class="fa fa-id-card"></i> {!! $jobSeeker->national_id !!}<br />
                        
                    </div>
                    <div class="col col-md-6">                  
                        <table cellpadding="10px" cellspacing="10px">     
<tr><td style="padding:0 10px 0 10px;"><strong>Tribe: </strong> </td> <td>{!! $jobSeeker->tribe !!}  </td></tr>
<tr><td style="padding:0 10px 0 10px;"><strong>Education Level: </strong> </td> <td> {!! $jobSeeker->education_level !!}  </td></tr>
<tr><td style="padding:0 10px 0 10px;"><strong>Religion: </strong> </td> <td>{!! $jobSeeker->religion !!}  </td></tr>
<tr><td style="padding:0 10px 0 10px;"><strong>Marital Status: </strong></td> <td> {!! $jobSeeker->marital_status !!} </td></tr>
</table>
                    
                    </div>
                </div>
               <hr>
                <!-- <div class="row"> -->
                    <div class="col-md-12">
                        <h3>Summary</h3>
                    Joined {!! \Carbon\Carbon::parse($jobSeeker->created_at)->diffForHumans() !!}, <br>    
                    Speaks {!! $jobSeeker->spoken_languages !!},<br/>
                    Currently employment engagement: {!! $jobSeeker->employment_status !!},<br/>
                    Willing to serve up to {!! $jobSeeker->max_children !!} children<br/>
                    Known health issues: {!! $jobSeeker->health_conditions !!}<br/>
                    </div>
                <!-- </div> -->
                <!-- Split button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">
                        Social</button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span><span class="sr-only">Social</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Twitter</a></li>
                        <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                        <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Github</a></li>
                    </ul>
                    
                </div>
                <a href="/jobSeekers/{!! $jobSeeker->id !!}/edit" class="btn btn-info">
                    <i class="fa fa-edit"></i> Edit
                </a>
                    <a href="" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Delete
                </a>
            </div>
        </div>
    </div>
</div>

