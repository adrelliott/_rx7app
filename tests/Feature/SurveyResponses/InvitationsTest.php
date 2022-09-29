<?php

use App\Models\Invitation;

beforeEach(function() {
    $this->url = 'http://surveys.' . config('app.domain');
});

it('returns the homepage for surveys.domain/', function() {
    $response = $this->get($this->url);

    $response->assertStatus(200);
});

it('handles an invalid invitation by returning a friendly 404', function() {
    $response = $this->get($this->url . '/999999');

    $response->assertStatus(404)->assertSee('Oops');
});

it('returns status of 200 when given valid invitation id', function() {
    $invitation = Invitation::factory()->count(3)->create()->first();
    $response = $this->get($this->url . '/' . $invitation->id);

    $response->assertStatus(200);
});