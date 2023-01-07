<?php
include_once "../model/schedule.php";
include_once "../model/subject.php";
include_once "../model/teacher.php";
include_once '../common/database.php';
//include_once 'common.php';
if (isset($_POST['deleteSchedule'])) {
    $isToast = true;
    $_SESSION['idDelete'] = $_POST['deleteSchedule'];
    $allSchedule = getAllSchedule();
    $allSubject = get_all_subjects();
    $allTeacher = get_all_teachers();
    include_once "../views/schedule_search.php";
}
if (isset($_POST['confirmDelete'])) {
    deleteSchedule($_SESSION['idDelete']);
    allSchedule();
}
if (isset($_POST['schedule_search'])) {
    searchSchedule();
} else {
    allSchedule();
}

function searchSchedule()
{
    $school_year = $_POST['school_year'];
    $subject_name = $_POST['subject_name'];
    $teacher_name = $_POST['teacher_name'];
    $scheduleResult = scheduleSearch($school_year, $subject_name, $teacher_name);
    $allSubject = get_all_subjects();
    $allTeacher = get_all_teachers();
    include_once "../views/schedule_search.php";
}

function allSchedule()
{
    $allSchedule = getAllSchedule();
    $allSubject = get_all_subjects();
    $allTeacher = get_all_teachers();
    include_once "../views/schedule_search.php";
}
