<?php

namespace App\Console\Commands;

use App\Project;
use App\Result;
use App\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use RestClient;
use RestClientException;

class RetrieverCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'retriever:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        /*  $results_compare=DB::table('results')->get('result_post_id');
          dd($results_compare);*/
        //SCOTI DIN BD
        $jobs = DB::table('tasks')->get();
        $job_task_ids = array();
        /*        dd($results_compare);*/

        foreach ($jobs as $job) {
            /*            $task_id=$job->id;*/
            $job_task_verified=$job->verified;
                if (!$job_task_verified){
                    $job_tasks = $job->task_API_id;
                    /*            $project_id = $job->project_id;*/
                    /*            $task_keyword_id=$job->keyword_id;*/
                    $job_task_ids[] = $job_tasks;
                }
            }

        require('C:\xampp\htdocs\brainiacs_v3\resources\files\RestClient.php');
        $api_url = 'https://api.dataforseo.com/';
        try {
            //Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/
            $client = new RestClient($api_url, null, 'revenco_andrei@yahoo.com', 'FlMtt4RWJK7697VU');
        } catch (RestClientException $e) {
            echo "\n";
            print "HTTP code: {$e->getHttpCode()}\n";
            print "Error code: {$e->getCode()}\n";
            print  $e->getTraceAsString();
            echo "\n";
            exit();
        }

        foreach ($job_task_ids as $job_task_id):
            $serp_result = $client->get('v2/srp_tasks_get/' . $job_task_id);

            $results = $serp_result['results']['organic']/*['0']['result_url']*/
            ;

            $project_retriever = Project::all();
            foreach ($project_retriever as $project) {
                $domain = $project->domain;



                foreach ($results as $result) {

                /*                $user_id=DB::table('tasks')->where('task_API_id', $result['task_id'])->value('user_id');*/


                    $pos1 = strpos ($result['result_url'], $domain);


                    if ($pos1 !== false) {


    $task_id = Task::where('task_API_id', 'LIKE', $result['task_id'])->value('id');
    $user_id = Task::where('task_API_id', 'LIKE', $result['task_id'])->value('user_id');
    $project_id = Task::where('task_API_id', 'LIKE', $result['task_id'])->value('project_id');

    $result_time = substr($result['result_datetime'], 0, 15);
    /*                    'result_datetime'=>$result['result_datetime']*/
    /*                    $substring = substr($string,$start,$length);*/
    Result::create(['task_id' => $task_id, 'keyword_id' => $result['key_id'], 'project_id' => $project_id, 'user_id' => $user_id, 'result_task_id' => $result['task_id'],
        'result_post_id' => $result['post_id'], 'result_se_id' => $result['se_id'], 'result_loc_id' => $result['loc_id'], 'key_id' => $result['key_id'],
        'post_key' => $result['post_key'], 'result_position' => $result['result_position'], 'result_datetime' => $result_time, 'result_url' => $result['result_url']]);

    $task_verified=Task::where('task_API_id', 'LIKE',$result['task_id'])->get();
    foreach ($task_verified as $verified){
        $verified->verified='1';
            $verified->save();
    }
    /*$task_verified->verified='true';
    $task_verified->save();*/

//Update Tasks = verified = 1]
                    }
                }

            }
            endforeach;

    }



}
