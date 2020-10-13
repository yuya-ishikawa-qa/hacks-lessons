<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->delete();
	$lesson_seeds = [
	[
		'name' => 'PHP HACKS',
		'amount' => '69800',
    ],
    [
        'name' => 'Skill Hacks',
        'amount' => '69800',
    ],
    [
        'name' => 'Blog Hacks',
        'amount' => '99800',
    ],
    [
        'name' => 'Movie Hacks',
        'amount' => '69800',
    ],
    [
        'name' => 'Design Hacks',       
        'amount' => '59800',        
    ],  
    [            
        'name' => 'Front Hacks',    
        'amount' => '149800',
    ],
    [  
        'name' => 'Health Hacks',
        'amount' => '39800',
    ],
    [
        'name' => 'Animation Hacks',
        'amount' => '59800',
    ],
    [
        'name' => 'Diet Hacks',
        'amount' => '99800',
    ],
    ];

    foreach($lesson_seeds as $lesson) {
    DB::table('lessons')->insert($lesson);
    }
    }
}