<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #5e17eb;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
    <td><h2>
  <?php $image_path = '/upload/spsschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="200">

    </h2></td>
    <td><h2>Syrian Private School ERP</h2>
<p>Damascus - Mazzeh</p>
<p>Phone : +963 996 027 503</p>
<p>Email : info@sps.com</p>
<p> <b>Student Result Report </b> </p>

    </td> 
  </tr>
  
   
</table>
 <br> <br>
 <strong>Result of : </strong> {{ $allMarks['0']['exam_type']['name'] }} 
 <br> <br>
<table id="customers">
   
  <tr>    
    <td width="50%"> <h4>Student Id: {{ $allMarks['0']['student']['id_no'] }}</h4></td>
    <td width="50%"> <h4>Student Name: {{ $allMarks['0']['student']['name'] }}</h4> </td>
  </tr>
  <tr>    
    <td width="50%"> <h4>Year/Session: {{ $allMarks['0']['year']['name'] }}</h4>  </td>
    <td width="50%"> <h4> Class: {{ $allMarks['0']['student_class']['name'] }}</h4> </td>
  </tr>
</table>
<br>
<table id="customers" border="1" style="border-color: #ffffff;" width="100%" cellpadding="1" cellspacing="1">
<thead>
  <tr>
    <th class="text-center">SL</th>

    <th class="text-center">Subject</th>
    <th class="text-center">Get Marks</th>
    <th class="text-center">Letter Grade</th>
  </tr>
</thead>

<tbody>
@foreach($allMarks as $key => $mark)
@php
  $subject = $mark['assign_subject']['school_subject']['name'];
  $get_mark = $mark->marks;
  $grade_marks = App\Models\MarksGrade::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=',(int)$get_mark ]])->first();
  $grade_name = $grade_marks->grade_name;
@endphp
<tr>
  <td class="text-center">{{ $key+1 }}</td>

  <td class="text-center">{{ $subject }}</td>
  <td class="text-center">{{ $get_mark }}</td>
  <td class="text-center">{{ $grade_name }}</td>
  </tr>
@endforeach
</tbody>
          </table>

<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

 
 

</body>
</html>
