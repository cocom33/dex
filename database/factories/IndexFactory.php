<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Index>
 */
class IndexFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->image(),
            'id_wp' => $this->faker->id_wp(),
            'refine' => $this->faker->refine(),
            'type' => $this->faker->type(),
            'weapon_type' => $this->faker->weapon_type(),
            'weapon_element' => $this->faker->weapon_element(),
            'awaken' => $this->faker->awaken(),
            'label' => $this->faker->label(),
            'dismantle' => $this->faker->dismantle(),
            'skill_1' => $this->faker->skill_1(),
            'skill_1_desc' => $this->faker->skill_1_desc(),
            'skill_2' => $this->faker->skill_2(),
            'skill_2_desc' => $this->faker->skill_2_desc(),
        ];
    }
}
