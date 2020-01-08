<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Surfing Competition Event',
            'category_id' => 3,
            'slug' => str_slug('surfing'),
            'content' => 'Venue: Kuta Beach Bali


            Date: 31st December 2019
            
            
            Come And Join Us!
            
            
            Special Guest:
            Joji
            Rich Brian
            NIKI
            and many more',
        ]);

        Post::create([
            'title' => 'BMX Competition Event',
            'category_id' => 2,
            'slug' => str_slug('bmx-racing'),
            'content' => 'Venue: GBK Senayan Jakarta


            Date: 4th January 2020
            
            
            Come And Join Us!
            
            
            Special Guest:
            Coldplay
            Maroon 5
            and many more',
        ]);

        Post::create([
            'title' => 'Tutorial KickFlip',
            'category_id' => 5,
            'slug' => str_slug('Tutorial'),
            'content' => '1. Get the right foot position. The first thing you need to look at is your foot placement.
            2. Ollie. Hopefully you already know how to ollie, but just to recap.
            3. Use your front foot to flick the board. While you are in the air, slide your front foot towards the front heel-side edge of the board. Kick your leg out, flicking the edge of your deck with your baby toe. This is what gives it its spin.
            4. Catch the skateboard with your back foot, then your front. Once the skateboard has completed a full rotation in the air, catch it with your back foot and slam it towards the ground. Once your back foot hits the board, your front foot should follow suit.
            5. Bend your knees as you land. As your board hits the ground, bend your knees in order to absorb the shock.
            6. Practice, practice practice. Kickflips are the most difficult of the basic tricks, so it can take a while to get them down perfectly. Dont let yourself get frustrated - just keep practicing until you get it right.',
        ]);
    }
}
