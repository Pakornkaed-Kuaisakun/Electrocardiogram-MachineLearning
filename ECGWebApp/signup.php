<?php
$error = "";
session_start();
require_once('server/security/getPath.php');
require_once('server/connection/connection.php');
include_once('server/security/verifyInput.php');

$webHeader = "Signup";

if(isset($_POST['signup'])) {
    $thai_firstname = verifyInput($_POST['thai_firstname']);
    $thai_lastname = verifyInput($_POST['thai_lastname']);
    $eng_firstname = verifyInput($_POST['eng_firstname']);
    $eng_lastname = verifyInput($_POST['eng_lastname']);
    $birthdate = verifyInput($_POST['birthdate']);
    $email = verifyInput($_POST['email']);
    $phone_number = verifyInput($_POST['phone_number']);
    $password = sha1(md5(verifyInput($_POST['password'])));
    $confirm_password = sha1(md5(verifyInput($_POST['confirm_password'])));

    if($password == $confirm_password) {
        $stmt = $connection->prepare("SELECT `email` FROM `ekgproject`.`userdata` WHERE `email` = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if($result->num_rows === 0) {
            $stmt = $connection->prepare("INSERT INTO `ekgproject`.`userdata` (`thai_firstname`, `thai_lastname`, `eng_firstname`, `eng_lastname`, `email`, `phone_number`, `birth_date`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->bind_param('ssssssss', $thai_firstname, $thai_lastname, $eng_firstname, $eng_lastname, $email, $phone_number, $birthdate, $password);
            $stmt->execute();

            if($stmt) {
                $success = 'Success';
            } else {
                $err = 'Something went wrong.';
            }
            $stmt->close();
        } else {
            $err = 'This email have already.';
        }
    } else {
        $err = 'Password does not match.';
    }
}

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
    <?php include_once("dist/components/navbar-unsignined.php"); ?>
    <div class="container px-8 py-8 md:px-24 lg:px-36 pt-5 max-w-full mx-auto flex flex-col items-center">
        <div class="sm:mx-auto w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Sign up to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto w-1/2 sm:max-w-sm">
            <form class="space-y-6" method="POST">
                <!-- Thai firstname/lastname -->
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="thai_firstname" class="block text-sm/6 font-medium text-gray-900">ชื่อจริง (ภาษาไทย)</label>
                        <div class="mt-2">
                            <input type="thai_firstname" name="thai_firstname" id="thai_firstname" autocomplete="off" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="thai_lastname" class="block text-sm/6 font-medium text-gray-900">นามสกุล (ภาษาไทย)</label>
                        <div class="mt-2">
                            <input type="thai_lastname" name="thai_lastname" id="thai_lastname" autocomplete="off" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>
                <!-- English firstname/lastname -->
                <div class="grid md:grid-cols-2 md:gap-6 mt-1">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="eng_firstname" class="block text-sm/6 font-medium text-gray-900">Firstname (English)</label>
                        <div class="mt-2">
                            <input type="eng_firstname" name="eng_firstname" id="eng_firstname" autocomplete="off" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="eng_lastname" class="block text-sm/6 font-medium text-gray-900">Lastname (English)</label>
                        <div class="mt-2">
                            <input type="eng_lastname" name="eng_lastname" id="eng_lastname" autocomplete="off" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>
                <!-- Birthdate/Email/Phone number -->
                 <div class="grid md:grid-cols-3 md:gap-6 mt-1">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="birthdate" class="block text-sm font-medium text-gray-900">Birthdate</label>
                        <div class="mt-2">
                            <input type="date" name="birthdate" id="birthdate" autocomplete="off" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="off" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="abc@mail.com">
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="phone_number" class="block text-sm font-medium text-gray-900">Phone Number</label>
                        <div class="mt-2">
                            <input type="tel" name="phone_number" id="phone_number" autocomplete="off" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="+66 (Thailand)">
                        </div>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6 mt-1">
                    <div class="relative z-0 w-full mb-5 group">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                            <!-- <div class="text-sm">
                                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                            </div> -->
                        </div>
                        <div class="mt-2 relative">
                            <input type="password" name="password" id="password" autocomplete="current-password" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                placeholder="••••••••">
                            <button type="button" id="toggle-password-1"
                                class="absolute top-1/2 -translate-y-1/2 text-gray-500" style="right: 1rem;">
                                <div id="eye-icon-1">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <div class="flex items-center justify-between">
                            <label for="confirm-password" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
                            <!-- <div class="text-sm">
                                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                            </div> -->
                        </div>
                        <div class="mt-2 relative">
                            <input type="password" name="confirm_password" id="confirm-password" autocomplete="off" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                placeholder="••••••••">
                            <button type="button" id="toggle-password-2"
                                class="absolute top-1/2 -translate-y-1/2 text-gray-500" style="right: 1rem;">
                                <div id="eye-icon-2">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-blue-700 px-4 py-3 text-sm/6 font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" name="signup">Sign up</button>
                </div>
            </form>

            <script>
                const passwordInput1 = document.getElementById("password");
                const passwordInput2 = document.getElementById("confirm-password");
                const togglePasswordButton1 = document.getElementById("toggle-password-1");
                const eyeIcon1 = document.getElementById("eye-icon-1");
                const eyeIcon2 = document.getElementById("eye-icon-2");
                const togglePasswordButton2 = document.getElementById("toggle-password-2");

                togglePasswordButton1.addEventListener("click", () => {
                    if (passwordInput1.type === "password") {
                        passwordInput1.type = "text";
                        eyeIcon1.innerHTML = `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`;
                    } else {
                        passwordInput1.type = "password";
                        eyeIcon1.innerHTML = `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`;
                    }
                });

                togglePasswordButton2.addEventListener("click", () => {
                    if (passwordInput2.type === "password") {
                        passwordInput2.type = "text";
                        eyeIcon2.innerHTML = `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`;
                    } else {
                        passwordInput2.type = "password";
                        eyeIcon2.innerHTML = `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`;
                    }
                });
            </script>

        </div>
    </div>
    <?php include_once("dist/components/script.php"); ?>
    <p class="absolute bottom-1 text-sm font-bold text-black" style="right: 1rem;">33BI10-02</p>
</body>

</html>