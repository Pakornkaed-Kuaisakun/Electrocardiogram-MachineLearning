<?php if (isset($err)) { ?>

    <script type="text/javascript">
        setTimeout(function () {
            let timerInterval;
            Swal.fire({
                title: "Error",
                icon: 'error',
                text: '<?php echo $err; ?>',
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false,
            });
        }, 100);
    </script>

<?php } else if (isset($error) && $error == "LOGIN") { ?>
        <script type="text/javascript">
            setTimeout(function () {
                Swal.fire({
                    title: "Please Login To Continue",
                    showCloseButton: false,
                    showConfirmButton: false,
                    html: `<div class="flex flex-row items-center justify-center font-bold text-base">
                            <a href="signin" class="block py-3 px-4 text-black hover:text-gray-700 rounded hover:bg-gray-200 mr-2" style="border: 1px solid black;">Sign in </a>
                            <a href="signup" class="block py-3 px-4 text-black hover:text-gray-700 rounded hover:bg-gray-200 ml-2" style="border: 2px solid black;">Sign up</a>
                            </div>`
                });
            }, 100);
        </script>

<?php } else if (isset($success)) { ?>
            <script type="text/javascript">
                setTimeout(function () {
                    let timerInterval;
                    Swal.fire({
                        title: "Success",
                        icon: 'success',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                    });
                }, 100);
            </script>
<?php } else if (isset($ECG_statusMessage_error)) { ?>
                <script type="text/javascript">
                    setTimeout(function () {
                        Swal.fire({
                            title: "Error",
                            icon: 'error',
                            text: '<?php echo $ECG_statusMessage_error; ?>',
                            showCloseButton: true,
                            showConfirmButton: false,
                        });
                    }, 100);
                </script>
<?php } else if (isset($ECG_statusMessage_predicted)) { ?>
                    <script type="text/javascript">
                        setTimeout(function () {
                            Swal.fire({
                                html: `<?php include_once('dist/components/percnetage_risk.php'); ?>`,
                                showCloseButton: true,
                                showConfirmButton: false,
                            });
                        }, 100);
                    </script>
<?php } ?>