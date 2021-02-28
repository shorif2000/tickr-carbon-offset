<?php

namespace Tests\Feature;

use Tests\TestCase;


class CarbonOffsetMembershipControllerTest extends TestCase
{

    public function testInvalidNonIntMonths()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-02-07&scheduleInMonths=x')
            ->assertStatus(400)
            ->assertJson(['scheduleInMonths' => ['The schedule in months must be an integer.']]);
    }

    public function testInvalidNoMonths()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-02-07&scheduleInMonths=')
            ->assertStatus(400)
            ->assertJson(['scheduleInMonths' => ['The schedule in months field is required.']]);
    }

    public function testInvalidDateFormat()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021/02/07&scheduleInMonths=5')
            ->assertStatus(400)
            ->assertJson(['subscriptionStartDate'=>['The subscription start date does not match the format Y-m-d.']]);

    }

    public function testInvalidNoDateFormat()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=&scheduleInMonths=5')
            ->assertStatus(400)
            ->assertJson(['subscriptionStartDate' => ['The subscription start date field is required.']]);
    }

    /**
     * A basic test the output with scheduleInMonths=5.
     * #1 Request
     * @return void
     */
    public function testFiveMonthsRequest()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-01-07&scheduleInMonths=5')
            ->assertStatus(200)
            ->assertJson(["2021-02-07", "2021-03-07", "2021-04-07", "2021-05-07", "2021-06-07"]);
    }

    /**
     * A basic test the output with scheduleInMonths=2.
     * #2 Request
     * @return void
     */
    public function testTwoMonthsRequest()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=1998-01-07&scheduleInMonths=2')
            ->assertStatus(200)
            ->assertJson(["1998-02-07", "1998-03-07"]);
    }

    /**
     * A basic test the output with scheduleInMonths=3 and all months don't have same days.
     * #3 Request
     * @return void
     */
    public function testThreeMonthsRequest()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2020-01-30&scheduleInMonths=3')
            ->assertStatus(200)
            ->assertJson(["2020-02-29", "2020-03-30", "2020-04-30"]);
    }

    /**
     * #4 Request
     */
    public function testNextMonthRequest()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2020-01-31&scheduleInMonths=1')
            ->assertStatus(200)
            ->assertJson(["2020-02-29"]);
    }

    /**
     * A basic test to return empty when scheduleInMonths=0.
     * #5 Request
     * @return void
     */
    public function testNoMonthsRequest()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-02-10&scheduleInMonths=0')
            ->assertStatus(200)
            ->assertJson([]);
    }

    /**
     * #6 Request
     */
    public function testFutureDateRequest()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate='.date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 day")).'&scheduleInMonths=0')
            ->assertStatus(400)
            ->assertJson(['subscriptionStartDate' => ['The subscription start date must be a date before or equal to '.date('Y-m-d') . '.']]);
    }

    /**
     * A basic test to see Error thrown with Status code when scheduleInMonths is out of range.
     * #7 Request
     * @return void
     */
    public function testMoreThanThirtySixMonths()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-02-07&scheduleInMonths=100')
            ->assertStatus(400)
            ->assertJson(['scheduleInMonths' => ['The schedule in months must be between 0 and 36.']]);
    }

    /**
     * A basic test the output with scheduleInMonths=3 and subscriptionStartDate is from a leap year.
     *
     * @return void
     */
    public function testLeapThreeMonthsRequest()
    {
        $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2020-01-31&scheduleInMonths=3')
            ->assertStatus(200)
            ->assertJson(["2020-02-29", "2020-03-31", "2020-04-30"]);
    }


}
