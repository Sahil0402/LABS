<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Marksheet</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Provisional Marksheet</h1>

    <div class="collegeInfo">
        <img src="./assets/logo.png" height="150" width="150">
        <p>Bansilal Ramnath Agarwal Charitable Trust's <br>
            <b class="b1">Vishwakarma Institute of Technology0, Pune</b> <br>
            <span style="font-size: 0.8em;">(An Autonomous Institute affiliated to Savitribai Phule Pune
                University)</span><br>
            666, Upper Indiranagar, Bibwewadi, Pune, Maharashtra, INDIA - 411 037 <br>
        </p>
    </div>

    <div class="studentInfo">
        <div>
            <!-- <table>
                <tr>
                    <td colspan="2">Name: <b>SHENDURKAR SAHIL MANOJ</b></td>
                </tr>
                <tr>
                    <td>PRN: <b>12120035</b></td>
                    <td>Mother's Name: <b>Aruna</b></td>
                </tr>
                <tr>
                    <td colspan="2">Program: <b>Bachelor of Technology</b></td>
                </tr>
                <tr>
                    <td colspan="2">Branch: <b>B.Tech-Computer Engineering</b></td>
                </tr>
                <tr>
                    <td>Class: <b>SY</b></td>
                    <td>Semester: <b>1</b></td>
                </tr>
                <tr>
                    <td colspan="2"> <b> Month and Year of Exam: Feb,2022 </b></td>
                </tr>
                <tr>
                    <td colspan="2">Semester Result Date: <b>28-Feb-2022</b></td>
                </tr>
            </table> -->
            <?php
            // SQL query to retrieve data from the stu_info table
            $sql = "SELECT * FROM stu_info WHERE prn_no='12120035'";

            // Execute the query and get the result set
            $result = mysqli_query($conn, $sql);

            // Check if there are any results
            if (mysqli_num_rows($result) > 0) {
                // Output table header

                // Output table rows
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<table>";

                    echo "<tr>
                        <td colspan='2'>Name: <b>" . $row["name"] . "</b></td>
                      </tr>";
                    echo "<tr>
                        <td>PRN: <b>" . $row["prn_no"] . "</b></td>
                        <td>Mother's Name: <b>" . $row["mother_name"] . "</b></td>
                      </tr>";
                    echo "<tr>
                        <td colspan='2'>Program: <b>" . $row["program"] . "</b></td>
                      </tr>";
                    echo "<tr>
                        <td colspan='2'>Branch: <b>" . $row["branch"] . "</b></td>
                      </tr>";
                    echo "<tr>
                        <td>Class: <b>" . $row["class"] . "</b></td>
                        <td>Semester: <b>" . $row["semester"] . "</b></td>
                      </tr>";
                    echo "<tr>
                        <td colspan='2'>Month and Year of Exam: <b>" . $row["month_year_of_exam"] . "</b></td>
                      </tr>";
                    echo "<tr>
                        <td colspan='2'>Semester Result Date: <b>" . $row["semester_result"] . "</b></td>
                      </tr>";
                }

                // Output table footer
                echo "</table>";
            } else {
                echo "No results found.";
            }

            ?>
        </div>
        <div></div>
        <div>
            <img src="./assets/pic.JPG" height="150" width="150">
        </div>
    </div>
    <div class="marksTable">
        <!-- <table>
            <tr>
                <td><b>Sr.No</b></td>
                <td><b>Course code</b></td>
                <td><b>Course Title</b></td>
                <td><b>Credits</b></td>
                <td><b>Grades</b></td>
            </tr>
            <tr>
                <td>1</td>
                <td>CS2202</td>
                <td>DATA STRUCTURES</td>
                <td>5</td>
                <td>A</td>
            </tr>
            <tr>
                <td>2</td>
                <td>CS2207</td>
                <td>SOFTWARE DEVELOPMENT PROJECT-I</td>
                <td>4</td>
                <td>A</td>
            </tr>
            <tr>
                <td>3</td>
                <td>CS2209</td>
                <td>ENGINEERING DESIGN AND INNOVATION-III</td>
                <td>3</td>
                <td>A</td>
            </tr>
            <tr>
                <td>4</td>
                <td>CS2225</td>
                <td>THEORY OF COMPUTATION</td>
                <td>5</td>
                <td>A</td>
            </tr>
            <tr>
                <td>5</td>
                <td>CS2226</td>
                <td>SOFTWARE ENGINEERING</td>
                <td>5</td>
                <td>A+ </td>
            </tr>
            <tr>
                <td>6</td>
                <td>CS2227</td>
                <td>DATABASE MANAGEMENT SYSTEM</td>
                <td>5</td>
                <td>A</td>
            </tr>
        </table> -->
        <?php
        $totalMarks = 0;
        global $totalMarks;

        // Select the data from the "result_data" table
        $sql = "SELECT * FROM result_data";
        $result = mysqli_query($conn, $sql);

        // Display the data in an HTML table
        echo "<table>
        <tr>
            <td><b>Sr.No</b></td>
            <td><b>Course code</b></td>
            <td><b>Course Title</b></td>
            <td><b>Credits</b></td>
            <td><b>Grades</b></td>
        </tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $marks_obtained = ($row['mse_marks']) + ($row['ese_marks']);
                $totalMarks += $marks_obtained;
                if ($marks_obtained >= 90) {
                    $grade = 'A+';
                } elseif ($marks_obtained >= 80 && $marks_obtained <= 89) {
                    $grade = 'A';
                } elseif ($marks_obtained >= 70 && $marks_obtained <= 79) {
                    $grade = 'B+';
                } elseif ($marks_obtained >= 60 && $marks_obtained <= 69) {
                    $grade = 'B';
                } elseif ($marks_obtained >= 50 && $marks_obtained <= 59) {
                    $grade = 'C+';
                } elseif ($marks_obtained >= 40 && $marks_obtained <= 49) {
                    $grade = 'C';
                } else {
                    $grade = 'F';
                }
                echo "<tr>
            <td>" . $row["sr_no"] . "</td>
            <td>" . $row["course_code"] . "</td>
            <td>" . $row["course_title"] . "</td>
            <td>" . $row["credits"] . "</td>
            <td>" . $grade . "</td>
          </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No results found</td></tr>";
        }
        echo "</table>";

        // Close the database connection
        mysqli_close($conn);
        ?>

    </div>
    <div class="examInfoContainer">
        <h2>Grade Points:</h2>
        <div class="examInfo_1">
            <p>
                <b>A+</b> : (Excellent / Outstanding): 10 <br>
                <b>B+</b> : (Good): 8 <br>
                <b>C+</b> : (Above Average): 6 <br>
                <b>D </b>: (Below Average): 4 <br>
                <b>XX </b>: (Detained): 0 <br>
                <b>P </b>: (Audit Course Passed): 0 <br>
            </p>

            <p>
                <b>A</b>: (Very Good): 9 <br>
                <b>B</b>: (Fair): 7 <br>
                <b>C</b>: (Average): 5 <br>
                <b>F</b>: (Fail): 0 <br>
                <b>II</b>: (Absent): 0 <br>
                <b>NP</b>: (Audit Course Not Passed): 0
            </p>
        </div>
        <h2>Abbrevation</h2>
        <div class="examInfo_2">
            <p>
                <b>SGPA+</b> : (Semester Grade Point Average)<br>
                <b>#</b> : (More than one attemps)<br>
            </p>

            <p>
                <b>CGPA</b>: (Cumulative Grade Point Average)<br>
            </p>
        </div>
        <div class="examInfo_3">
            <table class="center">
                <tr>
                    <td colspan="4">Current Semester Record</td>
                </tr>
                <tr>
                    <td>Course</td>
                    <td>Credits Registered</td>
                    <td>Credits Earned</td>
                    <td>SGPA</td>
                </tr>
                <tr>
                    <td>Comp</td>
                    <td>27</td>
                    <td>27</td>
                    <td><?php echo (($totalMarks / 600) * 100) / 10; ?></td>
                </tr>
            </table>
            <table class="center">
                <tr>
                    <td colspan="3">Cumulative Semester</td>
                </tr>
                <tr>
                    <td>Credits Registered</td>
                    <td>Credits Earned</td>
                    <td>CGPA</td>
                </tr>
                <tr>
                    <td>27</td>
                    <td>27</td>
                    <td><?php echo (($totalMarks / 600) * 100) / 10; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="d2">
        <img src="./assets/sign.jpeg" height="100" width="100">
    </div>
    <h3 class="d2">Controller of Examinations</h3>
</body>

</html>