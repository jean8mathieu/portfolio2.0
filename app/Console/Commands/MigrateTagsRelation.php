<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\Tags;
use Illuminate\Console\Command;

class MigrateTagsRelation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jmdev:migrateTags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate tags to the morph relationship table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $projects = Project::query()
            ->with(['tags_old'])
            ->get();

        foreach($projects as $project) {
            $tags_ids = $project->tags_old->pluck('id');
            $project->tags()->sync($tags_ids);
        }
    }
}
