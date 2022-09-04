<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Index>
 */
class IndexFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'image' => 'https://source.unsplash.com/random/150x150',
            'id_wp' => $this->faker->unique()->randomNumber(4, false),
            'refine' => $this->faker->randomElement(['5', '6', '7']),
            'type' => $this->faker->randomElement(['dress', 'weapon', 'badge', 'pet']),
            'weapon_type' => $this->faker->randomElement(['melee','pistol','throw','spray','dolly','depoy','sniper','bow','shotgun','rocket','rifle']),
            'weapon_element' => $this->faker->randomElement(['electric','ice','fire','phisical','energy','poison']),
            'awaken' => $this->faker->randomElement(['awaken', 'non_awaken']),
            'label' => $this->faker->randomElement(['meta', 'keep', 'lebur']),
            'dismantle' => $this->faker->randomElement(['yes', 'no']),
            'skill_1' => $this->faker->word(),
            'skill_1_desc' => $this->faker->paragraphs(2),
            'skill_2' => $this->faker->word(),
            'skill_2_desc' => $this->faker->paragraphs(2),
        ];
    }
}