<?php
session_start();
require_once('server/connection/connection.php');
require_once('server/security/getPath.php');
include_once('server/security/checkLogin.php');

checkLogin();

$webHeader = "Project Infomation - Abstract";
$subBreadcramb = 'Project Infomation - Abstract';

$ID = $_SESSION['ID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('dist/components/head.php'); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <link rel="stylesheet" href="https://flowbite.com/docs/flowbite.css?v=2.5.2a">
    <?php include_once('dist/components/sweet_alert.php'); ?>
</head>

<body class="bg-white text-black overflow-y-hidden" data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0"
    data-aos-offset="0" data-aos-anchor-placement="top">
    <?php include_once("dist/components/navbar-signined.php"); ?>
    <?php include_once("dist/components/sidebar.php"); ?>
    <div class="container p-8 md:px-24 lg:px-36 pt-5 max-w-full mx-auto flex flex-col items-center">
        <div class="container p-8 md:px-24 lg:px-36 pt-5 max-w-full mx-auto flex flex-col items-center">
            <h1 class="text-2xl font-bold text-center mb-6">Project Abstract</h1>

            <p class="text-lg mb-4 leading-relaxed" style="text-align: justify; text-indent: 2em;">
                Cardiovascular disease is a condition that causes changes in heart rate, resulting in a heartbeat that
                is too fast, too slow, or irregular. Today, around 17 million people around the world die each year from
                heart disease. In Thailand, about 59,000 people are diagnosed with heart disease every year, and the
                number continues to rise. This disease can be life-threatening if not treated in time. However, it can
                be cured if detected early and treated properly.
            </p>

            <p class="text-lg mb-4 leading-relaxed" style="text-align: justify; text-indent: 2em;">
                Nowadays, medical technology has improved and Machine Learning is being used to help diagnose
                cardiovascular disease. This project studies and compares different Machine Learning models such as
                <strong>RFC, DTC, SVM, MNB, GNB, BNB,</strong> and <strong>XGBC</strong>. The dataset used is the
                <strong>MIT-BIH Arrhythmia dataset</strong>. The models are divided into test, train, and validation
                sets using Cross-validation to get the most accurate results.
            </p>

            <p class="text-lg mb-4 leading-relaxed" style="text-align: justify; text-indent: 2em;">
                After this process, the researcher calculates the Prediction efficiency of each model. The model with
                the highest efficiency will be chosen and developed into a <strong>Web Application</strong>. This
                application will help medical staff and interested users to analyze cardiovascular disease more easily,
                quickly, and accurately.
            </p>

        </div>

    </div>
</body>