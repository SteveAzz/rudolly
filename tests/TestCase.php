<?php

use SteveAzz\RuDolly\Cacheable;
use Illuminate\Database\Capsule\Manager as DB;

abstract class TestCase extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->setUpDatabases();
        $this->migrateTables();

        parent::setUp();
    }

    protected function makePost()
    {
        $post = new Post;
        $post->title = 'Some Title';
        $post->save();

        return $post;
    }

    private function migrateTables()
    {
        DB::schema()->create('posts', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
    }

    private function setUpDatabases()
    {

        $database = new DB();

        $database->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);

        $database->bootEloquent();
        $database->setAsGlobal();
    }
}

class Post extends \Illuminate\Database\Eloquent\Model
{
    use Cacheable;
}
