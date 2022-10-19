<!DOCTYPE html>
<html>

<head>
    <title>Dean's Listers - {{ $courses->course_code }} </title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
            position: relative;
        }

        .table2 td,
        th {
            border: none;
            text-align: center;
        }

        .table1 {
            margin: 0 auto;
        }

        .table1 td,
        th {
            padding: 10px;
            border: 1.5px solid black;
            font-size: 13px;
        }

        .table1 tr th {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            border: 1.5px solid black;
        }

        .table3 {
            margin: 0 auto;
            border: none;
        }

        .table3 td,
        th {
            border: none;
            font-size: 14px;
            font-weight: normal;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        hr {
            width: 95%;
            height: 1px;
            border: 0;
            border-top: 1px solid rgb(112, 111, 111);
            margin-top: 110px;
            padding: 0;
        }

        /**footer**/
        h4 {
            overflow: hidden;
            text-align: center;
        }

        h4:before,
        h4:after {
            background-color: #000;
            content: "";
            display: inline-block;
            height: 1px;
            position: relative;
            vertical-align: middle;
            width: 50%;
        }

        h4:before {
            right: 0.5em;
            margin-left: -50%;
        }

        h4:after {
            left: 0.5em;
            margin-right: -50%;
        }
    </style>
</head>

<body>
    <div style="width: 95%; margin: 0 auto;">
        <div style="width:15%;float:left;margin-right:20px;">
            <img src="admin/img/puplogopdf.png" width="100%" alt="">
        </div>
        <div style="font-family: Times New Roman;float:left;">
            <p>Republic of the Philippines <br>
                <b>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</b> <br>
                Office of the Vice President for Branches and Satellite Campuses <br>
                <b>TAGUIG BRANCH</b><br>
            </p>
        </div>
    </div>
    <hr />
    <table class="table3">
        <tr>
            <th colspan="2" style="text-align: left; font-size:22px;font-weight:bold;">List of Dean's Lister -
                {{ $courses->course }}</th>

        </tr>
        <tr>
            <th style="text-align: left;"><b>Year: </b>{{ request()->route('year_level') }}</th>
            <th style="text-align: right;"><b>Date Printed:</b> {{ date('Y-m-d') }}</th>
            <td></td>
        </tr>
    </table>
    <table class="table1">
        <thead>
            <tr>
                <th>Student Number</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Course</th>
                <th>1st Sem GWA</th>
                <th>2nd Sem GWA</th>
            </tr>
        </thead>

        <body>
            @foreach ($students as $stud)
                <tr>
                    <td align="center">{{ $stud->users->stud_num }}</td>
                    <td>{{ $stud->users->last_name }}</td>
                    <td>{{ $stud->users->first_name }}</td>
                    <td align="center">{{ $stud->courses->course_code }}</td>
                    <td align="center">{{ $stud->gwa_1st }}</td>
                    <td align="center">{{ $stud->gwa_2nd }}</td>
                </tr>
            @endforeach
        </body>
    </table>
    <br>
    <div style="width: 95%; margin: 0 auto;">
        <h4><i>NOTHING FOLLOWS</i></h4>
    </div>
    <table class="table2">
        <tr>
            <td>Signed by:</td>
            @foreach (getSignatories()->take(3) as $list)
                <td>
                    <div class="img-sig">
                        <img src="{{ public_path('uploads/signature/' . $list->signature) }}" width="100" />
                    </div>
                    <b>{{ $list->rep_name }}</b><br>
                    {{ $list->position }}
                </td>
            @endforeach
        </tr>
        <tr>
            <td>Noted by:</td>
            @foreach (getSignatories() as $list)
                @if ($loop->last)
                    <td colspan="3" align="center" height="110">
                        <div class="img-sig">
                            <img src="{{ public_path('uploads/signature/' . $list->signature) }}" width="100" />
                        </div>
                        <b>{{ $list->rep_name }}</b><br>
                        {{ $list->position }}
                    </td>
                @endif
            @endforeach
        </tr>
    </table
</body>

</html>
