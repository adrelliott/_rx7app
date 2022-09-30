<?php

use App\Models\Invitation;
use Illuminate\Support\Facades\URL;

beforeEach(function() {
    $this->url = 'http://surveys.' . config('app.domain');
});

// returns homepage for surveys.domain.com

// returns status of 200

// etc

// what else?

/** treat this as your todo list and the passing tests are the checklist */

it('returns the homepage for surveys.domain/', function() {
    $response = $this->get($this->url);

    $response->assertStatus(200);
});

it('returns status of 200 when given valid invitation id', function() {
    $invitation = Invitation::factory()->count(3)->create()->first();
    $signedUrl = URL::signedRoute('show-survey', ['invitation' => $invitation->id]);

    $response = $this->get($signedUrl);
    $response->assertStatus(200);
});

it('will display friendly 403 error page when signed url for invitation is invalid', function() {
    $invitation = Invitation::factory()->count(3)->create()->first();
    $response = $this->get($this->url . '/' . $invitation->id);

    $response->assertStatus(403)
        ->assertSee("Are you sure that link is right?");
});

it('will display a friendly 404 error page when signed url is correct, but invitation not found', function() {
    $signedUrl = URL::signedRoute('show-survey', ['invitation' => 100]);
    $response = $this->get($signedUrl);

    $response->assertStatus(404)
        ->assertSee("Can't seem to find an invitation using that link.");
});