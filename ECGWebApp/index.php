<?php
$error = "";
session_start();
require_once('server/security/getPath.php');
require_once('server/connection/connection.php');
include_once('server/model/ML/sendData.php');

$webHeader = 'Index';
$subBreadcramb = 'Lead II & Lead V';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include_once('dist/components/head.php'); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <?php include_once('dist/components/sweet_alert.php'); ?>
</head>

<body class="bg-white text-black overflow-y-hidden" data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0"
    data-aos-offset="0" data-aos-anchor-placement="top">
    <?php if (isset($_SESSION['ID']) && isset($_SESSION['token'])) {
        include_once("dist/components/navbar-signined.php");
        include_once("dist/components/sidebar.php");
    } else {
        include_once("dist/components/navbar-unsignined.php");
    } ?>
    <div class="container px-8 md:px-24 lg:px-36 pt-5 max-w-full mx-auto flex flex-col items-center">
        <form class="max-w-xl w-full flex flex-col items-center" method="post" id="ECG-Form">
            <label for="message"
                class="block mb-2 text-2xl font-bold text-gray-900 text-center">Prediction</label>
            <textarea id="message" rows="5"
                class="block p-5 w-full text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-500 focus:ring-blue-500 focus:border-blue-500 shadow [.validated_&]:invalid:border-pink-600 [.validated_&]:invalid:ring-2 [.validated_&]:invalid:ring-pink-200"
                placeholder="Write your thoughts here..." required name="ecg-data"></textarea>
            <div class="flex flex-row items-center justify-center w-full">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-xl px-6 py-3 me-2 mb-2 mt-3 w-1/2 text-center"
                    name="ecg-send-data">Predict</button>
                <button data-modal-target="input-manual-modal" data-modal-toggle="input-manual-modal"
                    class="text-white font-semibold rounded-lg text-xl px-2 py-3 me-2 mb-2 mt-3 hover:bg-gray-200"
                    type="button" data-tooltip-target="tooltip-right" data-tooltip-placement="right">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="tooltip-right" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Click for see input manual.
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </form>
    </div>
    <p class="absolute bottom-1 text-sm font-bold text-black" style="right: 1rem;">33BI10-02</p>
    <?php include_once("dist/components/modal.php"); ?>
    <?php include_once("dist/components/dev/devTools.php"); ?>
</body>

</html>