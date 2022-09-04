<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = random_int(10,500);
        $name = $this->faker->name();
        $spec_word = $this->faker->word();
        $spec=[];
        for ($i=0;$i<=rand(1,10);$i++){
            $word = [
                $name => $spec_word,
                ];
            array_push($spec,$word);
        }

        return [
            'name'=>$name,
            'category_id'=>rand(1,10),
            'sub_category_id'=>rand(1,30),
            'brand_id'=>rand(1,15),
            'product_highLight'=>$this->faker->word(),
            'product_code'=>random_int(10,100),
            'ordering'=>'cash on deli',
            'ingredient'=>'milk',
            'nutrient'=>'20ki',
            'product_specifications'=>json_encode($spec),
            'original_price'=> $price,
            'min_order'=>rand(1,5),
            'max_order'=>rand(50,100),
            'product_unit_value'=> $price,
            'prd_unit'=>random_int(200,500),
            'search_keyword'=> $name,
            'description'=>$this->faker->paragraph(),

        ];
    }
}
