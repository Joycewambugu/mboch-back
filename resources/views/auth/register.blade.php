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
<form id="msform" >
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Personal Details</li>
    <li>Extra Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="tel" name="name  " placeholder="Your official names" />
    <input type="tel" name="phone  " placeholder="Your phone number" />
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="Password" />
    <input type="password" name="password_confirmation" placeholder="Confirm Password" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">Some information about yourself</h3>
    <div class="form-group col-sm-12">
       <label for="gender"> Gender:         
        <label class="radio-inline">
            <input type="radio" name="gender" value="male"  /> male
        </label>
    
        <label class="radio-inline">
            <input type="radio" name="gender" value="male" /> female
        </label>
    </div>
    <input type="date" name="date_of_birth" placeholder="date of birth" />
    <div class="form-group col-sm-12">
            <label class="edu_level" for="education_level">
        Highest Level of education: 
        </label>
        <select name="education_level" id="education_level">
            <option value="primary">Primary</option>
            <option value="secondary">Secondary</option>
            <option value="college">College</option>
            <option value="university">University</option>
        </select>
    </div>
    <input type="text" name="current_location" placeholder="current location" />
    <input type="text" name="tribe" placeholder="tribe" />
    <!-- <input type="text" name="photo" placeholder="photo" /> -->
    <input type="text" name="national_id" placeholder="national id" />

    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
            <h2 class="fs-title">We want to know more about you</h2>
        <h3 class="fs-subtitle">More details to help you get the perfect job</h3>
    <input type="text" name="experience_years" placeholder="experience years" />
    <input type="text" name="spoken_languages" placeholder="spoken languages" />
    <input type="text" name="religion" placeholder="religion" />
    <input type="text" name="employment_status" placeholder="employment status" />
    <input type="text" name="marital_status" placeholder="marital status" />
    <input type="text" name="max_children" placeholder="max children" />
    <input type="text" name="health_conditions" placeholder="health conditions" />

    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>
 <script src='js/jquery-2.2.4.min.js'></script>
 <script src="js/bootstrap.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

  

    <script  src="js/signup.js"></script>




</body>

</html>
