<?php

namespace Tests\Feature;

use App\Models\Attribute;
use App\Models\Sku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SkuApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_skus(): void
    {
        $this->get(route('sku.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_sku(): void
    {
        $sku = Sku::factory()->create();

        $this->get(route('sku.show', [
                'sku' => $sku->id
            ]))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $sku->id,
                    'unit_amount' => $sku->unit_amount
                ]
            ]);
    }
}
