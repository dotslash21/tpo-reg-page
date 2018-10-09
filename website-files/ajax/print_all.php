<?php

/**
 * AjaxPage
 *
 * Response- Admin Print all Security Check
 *
 * Created by IntelliJ IDEA.
 * User: Arkadip
 * Date: 10/05/18
 * Time: 12:40 PM
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $return = [];

    if ($_POST['chk'] == 1) {

        session_start();
        if (isset($_SESSION['admin_id'])) {

            define('_incFuncwwrfbhdjrt', true);
            require '../inc2357v3cn425073p4y53w79/func.php';

            $token = $_POST['token'];
            $degree = $_POST['degree'];
            $course = $_POST['course'];
            if (XCSRF::varifycsrf('ad-clg-det', $token)) {

                //Always return Json format
                header('Content-Type: application/json');

                $return['done'] = XCSRF::mkcsrf('ad-print-all');

                $re_deg = array();
                $return['course'] = array();


                if ($degree == 'all') {
                    $return['degree']['1'] = "degree[]=" . $degree;
                    $return['degree']['count'] = 1;
                } else {
                    $de_count = count($degree);
                    $de_return = '';
                    $return['degree']['count'] = $de_count;
                    for ($i = 0; $i < $de_count; $i++) {
                        $return['degree'][$i] = "degree[]=" . Filter::String(clean($degree[$i]));
                    }
                }

                if ($course == 'all') {
                    $return['course']['1'] = "course[]=" . $course;
                    $return['course']['count'] = 1;
                } else {
                    $crs_count = count($course);
                    $crs_return = '';
                    $return['course']['count'] = $crs_count;
                    for ($i = 0; $i < $crs_count; $i++) {
                        $return['course'][$i] = "course[]=" . Filter::String(clean($course[$i]));
                    }
                }
            } else {
                $return['error'] = "Not varfied";
            }
        } else {
            $return['error'] = "Admin is not logged in";
        }
    } else {
        $return['error'] = "Check is not verified";
    }

    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;
}