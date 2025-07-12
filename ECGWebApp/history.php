<?php
session_start();
require_once('server/connection/connection.php');
require_once('server/security/getPath.php');
include_once('server/security/checkLogin.php');

checkLogin();

$webHeader = 'History';
$subBreadcramb = 'History';

$ID = $_SESSION['ID'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('dist/components/head.php'); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <?php include_once('dist/components/sweet_alert.php'); ?>
</head>

<body class="bg-gray-50 text-gray-900 font-sans">
    <?php include_once("dist/components/navbar-signined.php"); ?>
    <?php include_once("dist/components/sidebar.php"); ?>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-center mb-6">History</h1>
        <div class="overflow-x-auto shadow-lg rounded-lg w-full">
            <table id="search-table" class="min-w-full w-full bg-white shadow-md rounded-lg">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Timestamp</th>
                        <th class="py-3 px-4 text-left">JSON Input</th>
                        <th class="py-3 px-4 text-left">Probability of Arrhythmia (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_history = $connection->prepare("SELECT * FROM `ekgproject`.`history` WHERE `user_ID` = ?");
                    $query_history->bind_param('i', $ID);
                    $query_history->execute();
                    $result = $query_history->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='border-b bg-gray-200 hover:bg-opacity-75'>
                                    <td class='py-3 px-4 font-semibold'>$row[ID]</td>
                                    <td class='py-3 px-4'>$row[timestamp]</td>
                                    <td class='py-3 px-4'><button class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded' data-id='$row[ID]' data-modal-target='detail-json-input' data-modal-toggle='detail-json-input'>Show Details</button></td>
                                    <td class='py-3 px-4 font-semibold'>" . round($row['result'], 4) . "%</td>
                                </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <p class="absolute bottom-1 text-sm font-bold text-black" style="right: 1rem;">33BI10-02</p>
    <div id="detail-json-input" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Show Details
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="detail-json-input">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-md leading-relaxed text-gray-600 dark:text-gray-400">
                        ID: <span id="modalID"
                            class="items-center bg-yellow-100 text-yellow-800 text-sm font-bold me-2 px-4 py-1 rounded border-1 dark:bg-yellow-900 dark:text-yellow-300"></span>
                    </p>
                    <p class="text-md leading-relaxed text-gray-600 dark:text-gray-400">
                        Time Stamp: <span class="items-center text-sm font-bold me-2 px-2.5 py-1 underline"
                            id="modalTimestamp"></span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        <b>JSON Input</b>
                    <div class="border-2 border-black p-3">
                        <span id="modalJsonInput" class="text-wrap"></span>
                    </div>
                    </p>
                    <p class="flex items-center text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Probability of Arrhythmia: <span id="modalResult" class="font-bold ml-2 p-1"></span>
                        <span id="modalBadgeAlert"></span>
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="detail-json-input" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        if (document.getElementById("search-table")) {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: true,
                classes: {
                    wrapper: "datatables_wrapper w-full m-3"
                }
            });
        }
    </script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('[data-modal-toggle="detail-json-input"]').forEach(button => {
                button.addEventListener('click', async (event) => {
                    const data_id = button.getAttribute('data-id');
                    const user_id = <?php echo $_SESSION['ID']; ?>;

                    try {
                        const response = await fetchJSONInput(data_id, user_id);
                        const result = parseFloat(response[0].result);

                        // Select modal elements
                        const modalID = document.getElementById('modalID');
                        const modalTimestamp = document.getElementById('modalTimestamp');
                        const modalJsonInput = document.getElementById('modalJsonInput');
                        const modalResult = document.getElementById('modalResult');

                        // Populate modal fields
                        modalID.textContent = data_id;
                        modalTimestamp.textContent = response[0].timestamp;
                        modalJsonInput.innerHTML = createTable(response[0].input);
                        modalResult.textContent = `${result.toFixed(4)} %`;

                        applyProbabilityBadge(result);
                    } catch (error) {
                        console.error('Error fetching JSON input:', error);
                    }
                });
            });

            function fetchJSONInput(data_id, user_id) {
                return new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.open('GET', `server/getData/get_json_input.php?dataID=${data_id}&userID=${user_id}`, true);
                    xhr.onload = () => {
                        if (xhr.status === 200) {
                            try {
                                const response = JSON.parse(xhr.responseText);
                                resolve(response); // Resolve with the JSON data
                            } catch (e) {
                                reject('Error parsing JSON response');
                            }
                        } else {
                            reject('Failed to fetch JSON input');
                        }
                    };
                    xhr.onerror = () => reject('Error making the request');
                    xhr.send();
                });
            }

            function createTable(jsonString) {
                let tableHTML = `
            <table class="w-full table-auto border-collapse text-left text-sm">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 border-b">Parameter</th>
                        <th class="px-4 py-2 bg-gray-100 border-b">0</th>
                        <th class="px-4 py-2 bg-gray-100 border-b">1</th>
                    </tr>
                </thead>
                <tbody>
        `;

                try {
                    const jsonObject = JSON.parse(jsonString);
                    const params = {};

                    for (let key in jsonObject) {
                        if (jsonObject.hasOwnProperty(key)) {
                            const parts = key.split('_');
                            const index = parts[0];
                            const paramKey = parts.slice(1).join('_');

                            if (!params[paramKey]) {
                                params[paramKey] = { 0: '', 1: '' };
                            }
                            params[paramKey][index] = jsonObject[key];
                        }
                    }

                    for (let param in params) {
                        if (params.hasOwnProperty(param)) {
                            tableHTML += `
                        <tr>
                            <td class="px-4 py-2 border-b">${param}</td>
                            <td class="px-4 py-2 border-b">${params[param][0]}</td>
                            <td class="px-4 py-2 border-b">${params[param][1]}</td>
                        </tr>
                    `;
                        }
                    }

                    tableHTML += `</tbody></table>`;
                } catch (error) {
                    tableHTML = `<p class="text-red-500">Error parsing JSON: ${error.message}</p>`;
                }

                return tableHTML;
            }
            });

    </script>
</body>

</html>