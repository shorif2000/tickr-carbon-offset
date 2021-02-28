<?php

namespace App\Domains;

class SubscriptionMembership extends Membership
{

    public $subscriptionStartDate;
    public $scheduleInMonths;

    public function __construct( string $subscriptionStartDate, int $scheduleInMonths)
    {
        $this->subscriptionStartDate = $subscriptionStartDate;
        $this->scheduleInMonths = $scheduleInMonths;
    }
}
