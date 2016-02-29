<?php

class RoboFile extends \Robo\Tasks
{
    /**
     * Watch `src` and `tests` -> run tests whenever there is a change
     */
    public function watch()
    {
        $this->test();

        $this
            ->taskWatch()
            ->monitor(
                ['src', 'tests'],
                function () {
                    $this->test();
                }
            )
            ->run();
    }

    /**
     * Run test suite
     */
    public function test()
    {
        $this
            ->taskPHPUnit('vendor/bin/phpunit')
            ->configFile('phpunit.xml')
            ->run();
    }
}
