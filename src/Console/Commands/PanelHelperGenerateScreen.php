<?php

namespace Guptarakesh198\Panelhelper\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Filesystem\Filesystem;

class PanelHelperGenerateScreen extends Command
{
    protected $signature = 'panelhelper:create-screen {name}';

    protected $description = 'Generate a Screen from parameters.';

    protected $files;

    public $title;

    public $sidebar_menu_class;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $this->comment(' _____       _             _        _____             _        ');
        $this->comment('|  __ \     | |           | |      / ____|           | |       ');
        $this->comment('| |__) |__ _| | _____  ___| |__   | |  __ _   _ _ __ | |_ __ _ ');
        $this->comment('|  _  // _` | |/ / _ \/ __| `_ \  | | |_ | | | | `_ \| __/ _` |');
        $this->comment('| | \ \ (_| |   <  __/\__ \ | | | | |__| | |_| | |_) | || (_| |');
        $this->comment('|_|  \_\__,_|_|\_\___||___/_| |_|  \_____|\__,_| .__/ \__\__,_|');
        $this->comment('                                                | |            ');
        $this->comment('                                                |_|            ');

        $this->title = $this->ask('What is your screen title?');

        $this->sidebar_menu_class = $this->ask('What is your screen sidebar menu class?');

        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }

    }

    public function getStubPath()
    {
        return __DIR__ . '/../../../stubs/screen.stub';
    }

    public function getStubVariables()
    {
        return [
            //'NAMESPACE'         => 'App\\Interfaces',
            //'CLASS_NAME'        => $this->getSingularClassName($this->argument('name')),
            'TITLE' => $this->title,
            'sidebar_menu_class' => $this->sidebar_menu_class,
        ];
    }

    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    public function getStubContents($stub , $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('$'.$search.'$' , $replace, $contents);
        }
        return $contents;
    }

    public function getSourceFilePath()
    {
        return base_path('resources\\views') .'\\' .$this->getViewPathName($this->argument('name')) . '.blade.php';
    }

    public function getViewPathName($name)
    {
        $parts = explode('.',$name);
        return implode('\\',$parts);
    }

    protected function makeDirectory($path)
    {
        if(!$this->files->isDirectory($path)){
            $this->files->makeDirectory($path, 0777, true, true);
        }
        return $path;
    }

}
