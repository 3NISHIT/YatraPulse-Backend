<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminContentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_forms_create_related_records(): void
    {
        $user = User::factory()->create();

        $destinationId = $this->postJson('/api/adddestination', [
            'name' => 'Kyoto',
            'country' => 'Japan',
            'image' => 'https://example.com/kyoto.jpg',
            'description' => 'Historic streets, temples, and gardens.',
        ])->assertCreated()
            ->assertJsonPath('data.name', 'Kyoto')
            ->json('data.id');

        $tourId = $this->postJson('/api/addtour', [
            'destination_id' => $destinationId,
            'title' => 'Kyoto cultural escape',
            'slug' => 'kyoto-cultural-escape',
            'price' => 340.50,
            'duration' => 4,
            'description' => 'Explore Kyoto with a local guide.',
            'inclusions' => 'Guide and breakfast',
            'exclusions' => 'Flights',
        ])->assertCreated()
            ->assertJsonPath('data.price', 340.5)
            ->json('data.id');

        $this->postJson('/api/additineraries', [
            'tour_id' => $tourId,
            'day_number' => 1,
            'title' => 'Arrival and old town',
            'description' => 'Meet your guide and explore the old town.',
        ])->assertCreated()
            ->assertJsonPath('data.day_number', 1);

        $travelDate = now()->addDays(5)->toDateString();
        $this->postJson('/api/addbooking', [
            'user_id' => $user->id,
            'tour_id' => $tourId,
            'travel_date' => $travelDate,
            'total_travelers' => 2,
            'total_price' => 681.00,
            'status' => 'pending',
        ])->assertCreated()
            ->assertJsonPath('data.total_price', 681);

        $this->postJson('/api/addbooking', [
            'tour_id' => $tourId,
            'travel_date' => now()->addDays(6)->toDateString(),
            'total_travelers' => 1,
            'total_price' => 340.50,
        ])->assertCreated()
            ->assertJsonPath('data.user_id', null);

        $this->assertDatabaseHas('itineraries', ['tour_id' => $tourId, 'day_number' => 1]);
        $this->assertDatabaseHas('destinations', ['id' => $destinationId, 'image' => 'https://example.com/kyoto.jpg']);
        $this->assertDatabaseHas('tours', ['id' => $tourId, 'price' => '340.50']);
        $this->assertDatabaseHas('bookings', ['user_id' => $user->id, 'tour_id' => $tourId, 'total_price' => '681.00']);
    }

    public function test_destination_validation_prevents_incomplete_records(): void
    {
        $this->postJson('/api/adddestination', [
            'name' => 'Kyoto',
            'country' => 'Japan',
            'description' => 'Historic streets, temples, and gardens.',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['image']);

        $this->assertDatabaseCount('destinations', 0);
    }
}
