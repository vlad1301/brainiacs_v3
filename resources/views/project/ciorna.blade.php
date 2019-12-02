
{{--Edit page vechi--}}
<!DOCTYPE html>
<html>
<head>
    <title>Set keyword</title>

    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<br />
<form method="post" action="{{ route('projects.update', $project->id) }}" autocomplete="off">
    @method('PATCH')

    {{ csrf_field() }}
    <h3 align="center">Keywords</h3><br />
    <div class="container box">
        <div class="form-group">
            <textarea rows="2" cols="50"  name="keyword" id="keyword" class="form-control input-lg" placeholder="Cuvant cheie" /></textarea>
            <div id="cuvant_cheie">
            </div>
        </div>
    </div>

    <div class="container box">
        <div class="form-group">
            <input type="submit">
            {{-- <button type="submit"  class="btn btn-primary btn-lg" onclick="window.location='{{ route("view_projects") }}'">SAVE</button>
             <input type="submit"  class="btn btn-primary btn-lg"  value="CANCEL">CANCEL--}}
        </div>
    </div>

</form>
</body>
</html>

{{--END OF Edit page vechi--}}



{{--
public function view_projects_results($id)
{

$url_s = DB::table('projects')->get();
/*        dd($url_s);*/
/*        $results=array();*/
foreach($url_s as $url) {

$rezultate = $url->domain;
/*            dd($rezultate);*/

/* $results []= SerpResult::where('resultUrl', 'LIKE', "%{$rezultate}%")->get();*/

}
$results = Result::where('result_url', 'LIKE', "%{$rezultate}%")->get();
/* $results = DB::table('results')->where('result_url', 'alotractari.ro')->get();*/


/*        $results = SerpResult::where('resultUrl', 'LIKE', "%{$rezultate}%")->groupBy('task_id')->get();*/


/*        $results =DB::table('serp_results')->where('resultUrl', 'LIKE', "%{$rezultate}%")->groupBy('resultDatetime')->get();*/

/*        $results =DB::table('serp_results')->where('resultUrl', 'LIKE', "%{$rezultate}%")->get();*/

/*        dd($results);*/
$number=count($results);

return view('project.projectsResults', compact('results', 'number'));

--}}
}
