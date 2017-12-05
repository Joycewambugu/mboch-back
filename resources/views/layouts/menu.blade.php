<li class="{{ Request::is('subscriptionPlans*') ? 'active' : '' }}">
    <a href="{!! route('subscriptionPlans.index') !!}"><i class="fa fa-edit"></i><span>Subscription Plans</span></a>
</li>



<li class="{{ Request::is('jobSeekers*') ? 'active' : '' }}">
    <a href="{!! route('jobSeekers.index') !!}"><i class="fa fa-edit"></i><span>Job Seekers</span></a>
</li>
<li class="{{ Request::is('passport*') ? 'active' : '' }}">
    <a href="{!! route('passport') !!}"><i class="fa fa-edit"></i><span>Mobile app clients</span></a>
</li>

<li class="{{ Request::is('employers*') ? 'active' : '' }}">
    <a href="{!! route('employers.index') !!}"><i class="fa fa-edit"></i><span>Employers</span></a>
</li>

<li class="{{ Request::is('jobSeekerExperiences*') ? 'active' : '' }}">
    <a href="{!! route('jobSeekerExperiences.index') !!}"><i class="fa fa-edit"></i><span>Job Seeker Experiences</span></a>
</li>

<li class="{{ Request::is('jobSeekerReferees*') ? 'active' : '' }}">
    <a href="{!! route('jobSeekerReferees.index') !!}"><i class="fa fa-edit"></i><span>Job Seeker Referees</span></a>
</li>

