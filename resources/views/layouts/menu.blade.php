<li class="{{ Request::is('subscriptionPlans*') ? 'active' : '' }}">
    <a href="{!! route('subscriptionPlans.index') !!}"><i class="fa fa-edit"></i><span>Subscription Plans</span></a>
</li>



<li class="{{ Request::is('jobSeekers*') ? 'active' : '' }}">
    <a href="{!! route('jobSeekers.index') !!}"><i class="fa fa-edit"></i><span>Job Seekers</span></a>
</li>

