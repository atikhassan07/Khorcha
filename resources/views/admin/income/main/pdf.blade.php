<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1 class="text-center text-primary" style="font-family: fantasy;">Income Information</h1>
    <hr>
    <table class="table table-bordered table-striped table-hover custom_table" id="example">
        <thead class="table-dark">
        <tr>
            <th>SL NO:</th>
            <th>Title</th>
            <th>Income Category Name</th>
            <th>Ammount</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $key=> $income)
            <tr>
                <td>{{$key+1 }}</td>
                <td>{{ $income->title }}</td>
                <td>{{ $income->rel_to_incategory->incate_name }}</td>
                <td>{{ $income->ammount }}</td>
            </tr>
            @endforeach


        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>
