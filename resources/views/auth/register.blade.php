<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TodayNanny | Registration Page</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet">

  
      <link rel="stylesheet" href="css/signup.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

        <div class="register-box">
                <div class="register-logo">
                    <a href="{{ url('/home') }}"><b>T</b>oday<b>N</b>anny</a>
                </div>
                </div>
<!-- multistep form -->
<form id="msform"  method="post" action="{{ url('/register') }}">
    {!! csrf_field() !!}
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Personal Details</li>
    <li>Finish</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <input type="text" name="name" placeholder="Your official names" />

        
    </div>

    <div class="form-group has-feedback{{ $errors->has('phone') ? ' has-error' : '' }}">
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
        <input type="tel" name="phone" placeholder="Your phone number" />
    </div>
    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <input type="text" name="email" placeholder="Email" />
    </div>
    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input type="password" name="password" placeholder="Password" />
    </div>
    <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
        <input type="password" name="password_confirmation" placeholder="Confirm Password" />
    </div>
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">Some information about yourself</h3>
    <div class="form-group col-sm-12">
        <div class="form-group has-feedback{{ $errors->has('gender') ? ' has-error' : '' }}">
            @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
            {{--  <label for="gender"> Gender:         
                <label class="radio-inline">
                    <input type="radio" name="gender" value="male"  /> male
                </label>
            
                <label class="radio-inline">
                    <input type="radio" name="gender" value="male" /> female
                </label>
            </label>  --}}
            {{--  <div class="row">  --}}
                <div class="col-xs-12">
                  <br> Gender:
                  <br>
                  <div class="btn-group btn-group-horizontal" data-toggle="buttons">
                    <label class="btn active">
                      <input type="radio" name='gender' checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span>  Male</span>
                    </label>
                    <label class="btn">
                      <input type="radio" name='gender'><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> Female</span>
                    </label>
                  </div>
            
                </div>
            </div>
        </div>
        <label>Date of Birth: </label>
        <div class="input-group date" data-provide="datepicker" id="datepicker">
            <input type="text" class="form-control" name="date_of_birth" >
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    
    {{--  <div class="form-group col-sm-12">
        <div class="form-group has-feedback{{ $errors->has('education_level') ? ' has-error' : '' }}">
          
            <label class="edu_level" for="education_level">Highest Level of education:</label>
            <select name="education_level" id="education_level">
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="college">College</option>
                <option value="university">University</option>
            </select>
            @if ($errors->has('education_level'))
                <span class="help-block">
                    <strong>{{ $errors->first('education_level') }}</strong>
                </span>
            @endif
        </div>
    </div>  --}}
    <input type="text" name="current_location" placeholder="current location" />
    {{--  <input type="text" name="tribe" placeholder="tribe" />  --}}
    <!-- <input type="text" name="photo" placeholder="photo" /> -->
    {{--  <input type="text" name="national_id" placeholder="national id" />  --}}

    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
   
    </fieldset>
    <fieldset>
            <h2 class="fs-title">Terms</h2>
        <h3 class="fs-subtitle">Just one more thing</h3>
        <div class="checkbox icheck">
                <label>
                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
            </div>
    {{--  <input type="text" name="experience_years" placeholder="experience years" />
    <input type="text" name="spoken_languages" placeholder="spoken languages" />
    <input type="text" name="religion" placeholder="religion" />
    <input type="text" name="employment_status" placeholder="employment status" />
    <input type="text" name="marital_status" placeholder="marital status" />
    <input type="text" name="max_children" placeholder="max children" />
    <input type="text" name="health_conditions" placeholder="health conditions" />  --}}

    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
    
  </fieldset>
</form>
 <script src='js/jquery-2.2.4.min.js'></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  

    <script  src="js/signup.js"></script>
<script>
        $(function () {
            $("#datepicker").datepicker({
                format: 'yyyy-mm-dd',
                endDate: '-18y'
            });
        });
</script>
</body>

</html>
