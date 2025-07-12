<?php
$error = "";
session_start();
require_once('server/security/getPath.php');
require_once('server/connection/connection.php');
include_once('server/security/verifyInput.php');

if(isset($_POST['signin'])) {
    $email_phone = verifyInput($_POST['email_phone']);
    $password = sha1(md5(verifyInput($_POST['password'])));

    $stmt = $connection->prepare("SELECT `ID`, `email`, `phone_number`, `password` FROM `ekgproject`.`userdata` WHERE (`email` = ? OR `phone_number` = ?) AND `password` = ? LIMIT 1");
    $stmt->bind_param('sss', $email_phone, $email_phone, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        include_once('server/security/generateToken.php');

        $user_data = $result->fetch_assoc();

        $token = gernerateToken(4);
        $ID = $user_data['ID'];
        $currentTimestamp = date("Y-m-d H:i:s");

        $update_stmt = $connection->prepare("UPDATE `ekgproject`.`userdata` SET `token`= ?, `lasted_login` = ? WHERE `ID` = ?");
        $update_stmt->bind_param('ssi', $token, $currentTimestamp, $ID);
        $update_stmt->execute();
        $update_stmt->close();

        $_SESSION['token'] = $token;
        $_SESSION['ID'] = $ID;

        header('Location: index');

    } else {
        $err = "Email/Phone Number or Password was wrong.";
    }

    $stmt->close();
}

$webHeader = "Signin";
?>

<!DOCTYPE html>
<html lang="en">

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
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto w-1/2 sm:max-w-sm">
            <form class="space-y-6" method="POST">
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Phone number/Email</label>
                    <div class="mt-2">
                        <input type="text" name="email_phone" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                            placeholder="Phone number/Email">
                    </div>
                </div>
                <div>
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
                        <button type="button" id="toggle-password"
                            class="absolute top-1/2 -translate-y-1/2 text-gray-500" style="right: 1rem;">
                            <div id="eye-icon">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                            </div>
                        </button>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-blue-700 px-4 py-3 text-sm/6 font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" name="signin">Sign
                        in</button>
                </div>
            </form>

            <script>
                const passwordInput = document.getElementById("password");
                const togglePasswordButton = document.getElementById("toggle-password");
                const eyeIcon = document.getElementById("eye-icon");

                togglePasswordButton.addEventListener("click", () => {
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        eyeIcon.innerHTML = `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`;
                    } else {
                        passwordInput.type = "password";
                        eyeIcon.innerHTML = `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`;
                    }
                });
            </script>

        </div>
    </div>
    <p class="absolute bottom-1 text-sm font-bold text-black" style="right: 1rem;">33BI10-02</p>
    <?php include_once("dist/components/script.php"); ?>
</body>

</html>