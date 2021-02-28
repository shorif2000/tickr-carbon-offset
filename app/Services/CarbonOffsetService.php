<?php

namespace App\Services;

use App\Domains\Membership;
use \DateInterval;
use \DateTime;
use \Exception;

class CarbonOffsetService
{
    public function getSchedule(Membership $subscriptionMembership): array
    {
        $schedules = [];
        for ($i = 1; $i <= $subscriptionMembership->scheduleInMonths; $i++) {

            try {
                $date = new DateTime($subscriptionMembership->subscriptionStartDate);
            } catch (Exception $ex) {
                throw $ex;
            }
            $origDay = $date->format("d");
            $date->add(new DateInterval('P' . $i . 'M'));
            $newDay = $date->format("d");

            if ($origDay != $newDay) {
                $date->sub(new DateInterval('P' . $newDay . 'D'));
            }

            $schedules[] = $date->format('Y-m-d');

        }

        return $schedules;
    }
}
