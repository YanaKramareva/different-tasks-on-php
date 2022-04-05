<?php

namespace App;

class Subscription
{
    private $subscriptionPlanName;

    public function __construct($subscriptionPlanName)
    {
        $this->subscriptionPlanName = $subscriptionPlanName;
    }

    public function hasProfessionalAccess()
    {
        return $this->subscriptionPlanName === 'professional';
    }

    public function hasPremiumAccess()
    {
        return $this->subscriptionPlanName === 'premium';
    }
}
