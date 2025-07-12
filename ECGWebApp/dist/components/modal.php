<!-- Modal Section -->

<!-- Main modal -->
<div id="input-manual-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Input Manual - V.1.0.0
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="input-manual-modal">
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
                    Input Type: <span
                        class="items-center bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-1 rounded-full border-1 dark:bg-yellow-900 dark:text-yellow-300">JSON</span>
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <b>Example Input: </b> { "0_pre-RR": 147, "0_post-RR": 146, "0_pPeak": -0.106193247, "0_tPeak": 0.008675043, "0_rPeak": 0.888698411, "0_sPeak": -1.337905513, "0_qPeak": -0.132290722, "0_qrs_interval": 19, "0_pq_interval": 3, "0_qt_interval": 30, "0_st_interval": 8, "0_qrs_morph0": -0.132290722, "0_qrs_morph1": -0.017528816, "0_qrs_morph2": 0.272709217, "0_qrs_morph3": 0.886186978, "0_qrs_morph4": -0.11755667, "1_pre-RR": 147, "1_post-RR": 146, "1_pPeak": 0.057684614, "1_tPeak": 0.231448194, "1_rPeak": -0.050623575, "1_sPeak": -0.316419508, "1_qPeak": -0.050623575, "1_qrs_interval": 4, "1_pq_interval": 3, "1_qt_interval": 16, "1_st_interval": 9, "1_qrs_morph0": -0.050623575, "1_qrs_morph1": -0.050623575, "1_qrs_morph2": -0.131555082, "1_qrs_morph3": -0.21726277, "1_qrs_morph4": -0.285930398 }
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="input-manual-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
            </div>
        </div>
    </div>
</div>


