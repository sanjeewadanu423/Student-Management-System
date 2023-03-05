{{-- {{ dd($gpa) }} --}}

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $student1->name }}</h2>
            </div>
        </div>


    </div>



    <table class="table table-bordered" >
        <tr>

            <th>Subject Name</th>
            <th>Marks</th>
            <th>GPA</th>

        </tr>
	    @foreach ($student as $mark)
	    <tr>

	        <td>{{ $mark->subject_name}}</td>
	        <td>{{ $mark->mark}}</td>
	        <td>{{ $mark->gpa }}</td>

	    </tr>
	    @endforeach
    </table>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Your GPA is : {{$gpa}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Your Subject Average is : {{$avg}}</h2>
            </div>
        </div>
    </div>



