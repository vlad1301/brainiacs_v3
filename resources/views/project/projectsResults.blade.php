<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All task results</title>

</head>
<body>

<div class="container">

    @yield('content')

    <h2>Basic HTML Table</h2>

    <table style="width:100%">

        <?php echo $number ?>

        <tr>
            <th>ID</th>
            <th>Data si ora interogare</th>
            <th>Keyword</th>
            <th>URL</th>
            <th>Pozitia</th>
            <th>Locatia</th>
            <th>Motorul de cautare</th>
            <th>Data</th>
        </tr>

        @foreach ($results as $result)

            <tr>
                <td align="center">{{$result['id']}}</td>
                <td align="center">{{$result['result_datetime']}}</td>
                <td align="center">{{$result['post_key']}}</td>
                <td align="center">{{$result['result_url']}}</td>
                <td align="center">{{$result['result_position']}}</td>
                <td align="center">{{$result['result_loc_id']}}</td>
                <td align="center">{{$result['result_se_id']}}</td>


            </tr>

        @endforeach

    </table>

</div>

<div class="container">
    @yield('footer')

</div>
</body>
</html>
