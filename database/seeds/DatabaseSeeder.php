<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FilmsTableSeeder::class);
    }
}


class FilmsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();
        DB::table('films')->delete();
        DB::table('films_genres')->delete();
        DB::table('films_comments')->delete();

        $genres = [
            'comedy',
            'fantastic',
            'thriller',
            'science',
            'historic',
            'romance',
            'animation',
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert(['name' => $genre]);
        }


        DB::table('films')->insert([
            'slug' => 'rush-hour',
            'name' => 'Rush Hour',
            'description' => 'Film about two cops',
            'release_date' => '2002-05-01',
            'rating' => '4',
            'ticket_price' => '$7',
            'country' => 'USA',
            'photo_url' => '/img/rush-hour-513981518d11b.png',
        ]);

        DB::table('films')->insert([
            'slug' => 'men-in-black',
            'name' => 'Men in black',
            'description' => 'Film about aliens',
            'release_date' => '2000-06-20',
            'rating' => '5',
            'ticket_price' => '$9',
            'country' => 'USA',
            'photo_url' => '/img/592564a51413b-men-in-black-52152ead75def.jpg',
        ]);

        DB::table('films')->insert([
            'slug' => 'spanch-bob',
            'name' => 'Spanch Bob',
            'description' => 'Film about yellow spanch',
            'release_date' => '1999-05-01',
            'rating' => '3',
            'ticket_price' => '$2',
            'country' => 'USA',
            'photo_url' => '/img/1363697573_spanch-bob.jpg',
        ]);

        $film1 = DB::table('films')->where('slug', '=', 'rush-hour')->select('id')->first();
        $film2 = DB::table('films')->where('slug', '=', 'men-in-black')->select('id')->first();
        $film3 = DB::table('films')->where('slug', '=', 'spanch-bob')->select('id')->first();

        // Genres
        DB::table('films_genres')->insert(['film_id' => $film1->id, 'genre_id' => DB::table('genres')->where('name', '=', 'comedy')->select(['id'])->first()->id]);
        DB::table('films_genres')->insert(['film_id' => $film1->id, 'genre_id' => DB::table('genres')->where('name', '=', 'thriller')->select(['id'])->first()->id]);
        DB::table('films_genres')->insert(['film_id' => $film2->id, 'genre_id' => DB::table('genres')->where('name', '=', 'comedy')->select(['id'])->first()->id]);
        DB::table('films_genres')->insert(['film_id' => $film2->id, 'genre_id' => DB::table('genres')->where('name', '=', 'fantastic')->select(['id'])->first()->id]);
        DB::table('films_genres')->insert(['film_id' => $film3->id, 'genre_id' => DB::table('genres')->where('name', '=', 'animation')->select(['id'])->first()->id]);

        //Comments
        DB::table('films_comments')->insert(['film_id' => $film1->id, 'author_name' => 'Jackie Chan', 'comment_body' => 'Nice film about me =)']);
        DB::table('films_comments')->insert(['film_id' => $film2->id, 'author_name' => 'Will Smith', 'comment_body' => 'It`s great, want to review it forever']);
        DB::table('films_comments')->insert(['film_id' => $film3->id, 'author_name' => 'Captain', 'comment_body' => 'Are you ready, children?']);


    }

}