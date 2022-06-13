<?php
session_start();
//no one can access this page apart from the students /(security)
if ($_SESSION['utype'] == 'student') {
} else {
    echo "<script>alert('You must login first')</script>";
    echo "<script>location.href'studentlogin.php'</script>";
}
include "logbook_functions.php";

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: studentlogin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: studentlogin.php");
}
?>

<html>

<head>
    <title>StudentLogbook</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="templates/css/logbookstyle.css" />
</head>

<body>
    <?php
    //selecting week from table weeks
    $db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
    $query = "SELECT * FROM tbl_weeks";
    $select_all_weeks = mysqli_query($db, $query);
    ?>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <?php if (isset($_SESSION['user'])) : ?>
            <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
                </span><span style="font-family:serif"><?php echo $_SESSION['user']['fullname']; ?></span></div>
        <?php endif ?>

    </div>
    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="logbook.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Attachment Logbook</li>
                </a>
                <a class="menu_items_link" href="submitreports.php">
                    <li class="menu_items_list">Student Reports</li>
                </a>
                <a class="menu_items_link" href="logbook.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main">
        <form method="post" action="logbook.php">
            <div class="nav" style="width: 90%;">
                <div class="inputgroup">
                    <label for="weeks">WEEKS</label>
                    <select class="form-control" name="week_id" id="weeks">
                        <option value="">--- Choose Week ---</option>
                        <?php foreach ($select_all_weeks as $row) : ?>
                            <option value="<?php echo $row['week_id']; ?>"><?php echo $row['week_title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="inputgroup">
                    <input type="button" value="MONDAY" name="mon_days" onclick="myFunction()" class="btn">
                    <input type="button" value="TUESDAY" name="tue_days" onclick="myFunction1()" class="btn">
                    <input type="button" value="WEDNESDAY" name="wed_days" onclick="myFunction2()" class="btn">
                    <input type="button" value="THURSDAY" name="thur_days" onclick="myFunction3()" class="btn">
                    <input type="button" value="FRIDAY" name="fri_days" onclick="myFunction4()" class="btn">
                    <input type="button" value="SATURDAY" name="sat_days" onclick="myFunction5()" class="btn">
                    <button onclick="myFunction6()" type="button" class="btn">WEEK REMARK</button>
                </div>
                <div class="aside" style="width: 100%;">
                    <style>
                        textarea {
                            width: 90%;
                        }
                    </style>
                    <hr>
                    <label for="inputEmail4" style="color:black;">TODAY NOTES</label>
                    <input type="text" id="mon" name="mon_day" class="mon" value="MONDAY" placeholder="MONDAY" readonly />
                    <textarea type="text" id="bld" name="mon_notes" class="bld" placeholder="MONDAY NOTES"></textarea>
                    <input type="text" id="tue" name="tue_day" class="tue" value="TUESDAY" placeholder="TUESDAY" readonly />
                    <textarea type="text" id="cole" name="tue_notes" class="cole" placeholder="TUESDAY NOTES"></textarea>
                    <input type="text" id="wed" name="wed_day" class="tue" value="WEDNESDAY" placeholder="WEDNESDAY" readonly />
                    <textarea type="text" id="hrt" name="wed_notes" class="hrt" placeholder="WEDNESDAY NOTES"></textarea>
                    <input type="text" id="thur" name="thur_day" class="thur" value="THURSDAY" placeholder="THURSDAY" readonly />
                    <textarea type="text" id="thal" name="thur_notes" class="thal" placeholder="THURSDAY NOTES"></textarea>
                    <input type="text" id="fri" name="fri_day" class="fri" value="FRIDAY" placeholder="FRIDAY" readonly />
                    <textarea type="text" id="wt" name="fri_notes" class="wt" placeholder="FRIDAY NOTES"></textarea>
                    <input type="text" id="sat" name="sat_day" class="sat" value="SATURDAY" placeholder="SATURDAY" readonly />
                    <textarea type="text" id="ht" name="sat_notes" class="ht" placeholder="SATURDAY NOTES"></textarea>
                    <input type="text" id="remark" name="remark" class="remark" value="REMARK" placeholder="REMARK" readonly />
                    <textarea type="text" id="rmk" name="remarks_notes" class="rmk" placeholder="WEEKLY REMARK"></textarea>
                    <!-- buttons -->
                    <input type="submit" name="create_post" id="btn_save1" value="MONDAY SUBMIT" class="btn sv2">
                    <input name="create_post1" type="submit" id="btn_save2" value="TUESDAY SUBMIT" class="btn sv3">
                    <input name="create_post2" type="submit" id="btn_save3" value="WEDNESDAY SUBMIT" class="btn sv4">
                    <input name="create_post3" type="submit" id="btn_save4" value="THURSDAY SUBMIT" class="btn sv5">
                    <input name="create_post4" type="submit" id="btn_save5" value="FRIDAY SUBMIT" class="btn sv6">
                    <input name="create_post5" type="submit" id="btn_save6" value="SATURDAY SUBMIT" class="btn  sv7">
                    <input name="create_post6" type="submit" id="btn_save7" value="SUBMIT REMARK" class="btn  sv8">
                    <hr>
                </div>
            </div>
        </form>
        <div class="article">

            <table class="table table-striped" width="100%" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
                <tr>
                    <th><b>week/12</b></th>
                    <th><b>MONDAY</b></th>
                    <th><b>TUESDAY</b></th>
                    <th><b>WEDNESDAY</b></th>
                    <th><b>THURSDAY</b></th>
                    <th><b>FRIDAY</b></th>
                    <th><b>SATURDAY</b></th>
                    <th><b>Student Comments</b></th>
                    <th><b>LECTURER REMARKS</b></th>
                    <th><b>TRAINER REMARKS</b></th>
                </tr>
                <tbody id="show_data">
                    <?php
                    // if (isset($_SESSION['student_id'])) {
                    $student_id = $_SESSION['user']['student_id'];
                    // echo var_dump($student_id);
                    foreach ($select_all_weeks as $key => $t) {
                        echo "<tr>";
                        echo "<td>" . $t['week_title'] . "</td>";
                        $conn = mysqli_connect("localhost", "root", "meek", "dbsupervise");
                        $query12 = "SELECT * FROM logbookdata WHERE week_id='" . $t['week_id'] . "' AND student_id='" . $student_id . "' ";
                        $res = mysqli_query($conn, $query12);
                        $week_days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'REMARK', 'LEC_COMMENT', 'TRAINER_COMMENT');
                        $classes = array();
                        while ($row = mysqli_fetch_assoc($res)) {
                            $classes[$row['day_title']] = $row;
                        }
                        foreach ($week_days as $day) {
                            if (array_key_exists($day, $classes)) {
                                $row = $classes[$day];
                                echo  "<td  style='background-color:green;color:white;'>" . $row['day_notes'] . "<br>" . $row['created_at'] . "</td>";
                            } else {
                                echo "<td style='background-color:red;color:white;'>" . "Pending" . "</td>";
                            }
                        }
                        echo "</tr>";
                    }
                    // }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script>
    function myFunction() {
        var x = document.getElementById("bld");
        var z = document.getElementById("hrt");
        var y = document.getElementById("cole");
        var a = document.getElementById("thal");
        var b = document.getElementById("wt");
        var c = document.getElementById("ht");
        var d = document.getElementById("rmk");
        var e = document.getElementById("mon");
        var f = document.getElementById("tue");
        var g = document.getElementById("wed");
        var h = document.getElementById("thur");
        var i = document.getElementById("fri");
        var j = document.getElementById("sat");
        var k = document.getElementById("remark");
        var sv2 = document.getElementById("btn_save1");
        var sv3 = document.getElementById("btn_save2");
        var sv4 = document.getElementById("btn_save3");
        var sv5 = document.getElementById("btn_save4");
        var sv6 = document.getElementById("btn_save5");
        var sv7 = document.getElementById("btn_save6");
        var sv8 = document.getElementById("btn_save7");
        if (x.style.display === "none") {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            f.style.display = "none";
            g.style.display = "none";
            x.style.display = "block";
            y.style.display = "none";
            e.style.display = "block";
            z.style.display = "none";
            a.style.display = "none";
            sv2.style.display = "block";
            b.style.display = "none";
            d.style.display = "none";
            sv6.style.display = "none";
            c.style.display = "none";
            sv7.style.display = "none";
            sv3.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "none";
            sv8.style.display = "none";
        } else {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            x.style.display = "none";
            e.style.display = "none";
            a.style.display = "none";
            sv2.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            sv7.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
            sv6.style.display = "none";
            sv3.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "none";
        }
    }

    function myFunction1() {
        var h = document.getElementById("thur");
        var i = document.getElementById("fri");
        var j = document.getElementById("sat");
        var k = document.getElementById("remark");
        var g = document.getElementById("wed");
        var f = document.getElementById("tue");
        var d = document.getElementById("rmk");
        var a = document.getElementById("thal");
        var x = document.getElementById("cole");
        var y = document.getElementById("bld");
        var z = document.getElementById("hrt");
        var b = document.getElementById("wt");
        var c = document.getElementById("ht");
        var e = document.getElementById("mon");
        var sv2 = document.getElementById("btn_save1");
        var sv3 = document.getElementById("btn_save2");
        var sv4 = document.getElementById("btn_save3");
        var sv5 = document.getElementById("btn_save4");
        var sv6 = document.getElementById("btn_save5");
        var sv7 = document.getElementById("btn_save6");
        var sv8 = document.getElementById("btn_save7");
        if (x.style.display === "none") {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "block";
            x.style.display = "block";
            y.style.display = "none";
            e.style.display = "none";
            z.style.display = "none";
            a.style.display = "none";
            b.style.display = "none";
            sv4.style.display = "none";
            c.style.display = "none";
            sv7.style.display = "none";
            sv3.style.display = "block";
            sv2.style.display = "none";
            sv5.style.display = "none";
            sv6.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
        } else {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            e.style.display = "none";
            x.style.display = "none";
            y.style.display = "none";
            a.style.display = "none";
            b.style.display = "none";
            z.style.display = "none";
            c.style.display = "none";
            sv7.style.display = "none";
            sv4.style.display = "none";
            sv3.style.display = "none";
            sv2.style.display = "none";
            sv5.style.display = "none";
            sv6.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
        }
    }

    function myFunction2() {
        var h = document.getElementById("thur");
        var i = document.getElementById("fri");
        var j = document.getElementById("sat");
        var k = document.getElementById("remark");
        var g = document.getElementById("wed");
        var f = document.getElementById("tue");
        var d = document.getElementById("rmk");
        var a = document.getElementById("thal");
        var x = document.getElementById("hrt");
        var y = document.getElementById("bld");
        var z = document.getElementById("cole");
        var b = document.getElementById("wt");
        var c = document.getElementById("ht");
        var e = document.getElementById("mon");
        var sv4 = document.getElementById("btn_save3")
        var sv2 = document.getElementById("btn_save1");
        var sv3 = document.getElementById("btn_save2");
        var sv5 = document.getElementById("btn_save4");
        var sv6 = document.getElementById("btn_save5");
        var sv7 = document.getElementById("btn_save6");
        var sv8 = document.getElementById("btn_save7");
        if (x.style.display === "none") {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "block";
            f.style.display = "none";
            x.style.display = "block";
            sv4.style.display = "block";
            z.style.display = "none";
            e.style.display = "none";
            sv2.style.display = "none";
            y.style.display = "none";
            sv3.style.display = "none";
            sv5.style.display = "none";
            a.style.display = "none";
            b.style.display = "none";
            sv6.style.display = "none";
            c.style.display = "none";
            sv7.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
        } else {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            x.style.display = "none";
            sv4.style.display = "none";
            y.style.display = "none";
            e.style.display = "none";
            sv2.style.display = "none";
            z.style.display = "none";
            sv3.style.display = "none";
            a.style.display = "none";
            sv5.style.display = "none";
            b.style.display = "none";
            sv6.style.display = "none";
            c.style.display = "none";
            sv7.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
        }
    }

    function myFunction3() {
        var h = document.getElementById("thur");
        var i = document.getElementById("fri");
        var j = document.getElementById("sat");
        var k = document.getElementById("remark");
        var g = document.getElementById("wed");
        var f = document.getElementById("tue");
        var d = document.getElementById("rmk");
        var e = document.getElementById("mon");
        var x = document.getElementById("thal");
        var sv5 = document.getElementById("btn_save4");
        var a = document.getElementById("hrt");
        var y = document.getElementById("bld");
        var z = document.getElementById("cole");
        var b = document.getElementById("wt");
        var c = document.getElementById("ht");
        var sv4 = document.getElementById("btn_save3")
        var sv2 = document.getElementById("btn_save1");
        var sv3 = document.getElementById("btn_save2");
        var sv6 = document.getElementById("btn_save5");
        var sv7 = document.getElementById("btn_save6");
        var sv8 = document.getElementById("btn_save7");
        if (x.style.display === "none") {
            h.style.display = "block";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            x.style.display = "block";
            y.style.display = "none";
            e.style.display = "none";
            z.style.display = "none";
            a.style.display = "none";
            sv3.style.display = "none";
            b.style.display = "none";
            sv6.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "block";
            sv2.style.display = "none";
            sv6.style.display = "none";
            sv7.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
        } else {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            e.style.display = "none";
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            a.style.display = "none";
            b.style.display = "none";
            sv3.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "none";
            sv2.style.display = "none";
            sv6.style.display = "none";
            sv7.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
        }
    }

    function myFunction4() {
        var h = document.getElementById("thur");
        var i = document.getElementById("fri");
        var j = document.getElementById("sat");
        var k = document.getElementById("remark");
        var g = document.getElementById("wed");
        var f = document.getElementById("tue");
        var e = document.getElementById("mon");
        var d = document.getElementById("rmk");
        var x = document.getElementById("wt");
        var y = document.getElementById("bld");
        var z = document.getElementById("hrt");
        var a = document.getElementById("cole");
        var b = document.getElementById("thal");
        var c = document.getElementById("ht");
        var sv2 = document.getElementById("btn_save1");
        var sv3 = document.getElementById("btn_save2");
        var sv4 = document.getElementById("btn_save3");
        var sv5 = document.getElementById("btn_save4");
        var sv6 = document.getElementById("btn_save5");
        var sv7 = document.getElementById("btn_save6");
        var sv8 = document.getElementById("btn_save7");
        if (x.style.display === "none") {
            h.style.display = "none";
            i.style.display = "block";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            x.style.display = "block";
            y.style.display = "none";
            e.style.display = "none";
            z.style.display = "none";
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            sv3.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "none";
            sv6.style.display = "block";
            sv2.style.display = "none";

            sv7.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
        } else {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            e.style.display = "none";
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            sv3.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "none";
            sv6.style.display = "none";
            sv2.style.display = "none";
            sv7.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
        }
    }

    function myFunction5() {
        var h = document.getElementById("thur");
        var i = document.getElementById("fri");
        var j = document.getElementById("sat");
        var k = document.getElementById("remark");
        var g = document.getElementById("wed");
        var f = document.getElementById("tue");
        var d = document.getElementById("rmk");
        var e = document.getElementById("mon");
        var x = document.getElementById("ht");
        var y = document.getElementById("bld");
        var z = document.getElementById("hrt");
        var a = document.getElementById("cole");
        var b = document.getElementById("thal");
        var c = document.getElementById("wt");
        var sv2 = document.getElementById("btn_save1");
        var sv3 = document.getElementById("btn_save2");
        var sv4 = document.getElementById("btn_save3");
        var sv5 = document.getElementById("btn_save4");
        var sv6 = document.getElementById("btn_save5");
        var sv7 = document.getElementById("btn_save6");
        var sv8 = document.getElementById("btn_save7");
        if (x.style.display === "none") {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "block";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            x.style.display = "block";
            y.style.display = "none";
            e.style.display = "none";
            z.style.display = "none";
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            sv3.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "none";
            sv6.style.display = "none";
            sv7.style.display = "block";
            sv2.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";
        } else {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            e.style.display = "none";
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            sv3.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "none";
            sv6.style.display = "none";
            sv7.style.display = "none";
            sv2.style.display = "none";
            d.style.display = "none";
            sv8.style.display = "none";

        }
    }

    function myFunction6() {
        var h = document.getElementById("thur");
        var i = document.getElementById("fri");
        var j = document.getElementById("sat");
        var k = document.getElementById("remark");
        var g = document.getElementById("wed");
        var f = document.getElementById("tue");
        var r = document.getElementById("rmk");
        var x = document.getElementById("bld");
        var z = document.getElementById("hrt");
        var y = document.getElementById("cole");
        var a = document.getElementById("thal");
        var b = document.getElementById("wt");
        var c = document.getElementById("ht");
        var e = document.getElementById("mon");
        var sv2 = document.getElementById("btn_save1");
        var sv3 = document.getElementById("btn_save2");
        var sv4 = document.getElementById("btn_save3");
        var sv5 = document.getElementById("btn_save4");
        var sv6 = document.getElementById("btn_save5");
        var sv7 = document.getElementById("btn_save6");
        var sv8 = document.getElementById("btn_save7");
        if (r.style.display === "none") {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "block";
            g.style.display = "none";
            f.style.display = "none";
            r.style.display = "block";
            e.style.display = "none";
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            a.style.display = "none";
            sv2.style.display = "none";
            b.style.display = "none";
            // d.style.display = "none";
            sv6.style.display = "none";
            c.style.display = "none";
            sv7.style.display = "none";
            sv3.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "none";
            sv8.style.display = "block";
        } else {
            h.style.display = "none";
            i.style.display = "none";
            j.style.display = "none";
            k.style.display = "none";
            g.style.display = "none";
            f.style.display = "none";
            e.style.display = "none";
            r.style.display = "none";
            x.style.display = "none";
            a.style.display = "none";
            sv2.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            sv7.style.display = "none";
            // d.style.display = "none";
            sv8.style.display = "none";
            sv6.style.display = "none";
            sv3.style.display = "none";
            sv4.style.display = "none";
            sv5.style.display = "none";
        }
    }
</script>
</body>

</html>