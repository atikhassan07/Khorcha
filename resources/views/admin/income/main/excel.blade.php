
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
