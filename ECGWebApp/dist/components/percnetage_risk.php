<div class="flex flex-col justify-center p-5 items-center">
    <?php if ($ECG_statusMessage_predicted < 10) { ?>
        <!-- <img src="https://media.canva.com/v2/image-resize/format:PNG/height:197/quality:100/uri:s3%3A%2F%2Fmedia-private.canva.com%2FCIYl8%2FMAGaNPCIYl8%2F1%2Fp.png/watermark:F/width:312?csig=AAAAAAAAAAAAAAAAAAAAAHDtp2aUr28Ztttkmv6Il1QPAc3iBuGsuRi2aUiHau7c&exp=1735363868&osig=AAAAAAAAAAAAAAAAAAAAAA1NxuA9domOzkV2Yffn-iuxFhl8hykXIrgFT_SwsEm2&signer=media-rpc&x-canva-quality=screen" -->
            <!-- alt="Image" class="w-auto h-auto mr-5 mb-3"> -->
    <?php } else if ($ECG_statusMessage_predicted >= 10 && $ECG_statusMessage_predicted < 90) { ?>
        <!-- <img src="https://media.canva.com/v2/image-resize/format:PNG/height:193/quality:100/uri:s3%3A%2F%2Fmedia-private.canva.com%2F2Rijo%2FMAGaOe2Rijo%2F1%2Fp.png/watermark:F/width:267?csig=AAAAAAAAAAAAAAAAAAAAAEok1XTVfJnPdYSjwbTRXq851gQm7CdwHb2drOBdyZZX&exp=1735367114&osig=AAAAAAAAAAAAAAAAAAAAAIhg1czjk7oEmYyNcp5UAsJ3a9NZ_ZNggidWka3sVycY&signer=media-rpc&x-canva-quality=screen" -->
            <!-- alt="Image" class="w-auto h-auto mr-5 mb-3"> -->
    <?php } else if ($ECG_statusMessage_predicted >= 90) { ?>
        <!-- <img src="https://media.canva.com/v2/image-resize/format:PNG/height:185/quality:100/uri:s3%3A%2F%2Fmedia-private.canva.com%2F1HL_w%2FMAGaOd1HL_w%2F1%2Fp.png/watermark:F/width:248?csig=AAAAAAAAAAAAAAAAAAAAAABABGopbsj19OwZTmU8NlxaGgbZd17X2G9mdYAKCpVv&exp=1735364446&osig=AAAAAAAAAAAAAAAAAAAAAMI7Trf5KtMKrnY1PQM43IoSJ6zsi-iaRwRh_qCkwz6U&signer=media-rpc&x-canva-quality=screen" -->
            <!-- alt="Image" class="w-auto h-auto mr-5 mb-3"> -->
    <?php } else { ?>
    <?php } ?>
    <h2 class="text-2xl font-bold text-gray-600 mb-3">Probability of Arrhythmia</h2>
    <h3 class="text-2xl font-semibold mb-3"><?php echo round($ECG_statusMessage_predicted, 4) . " %"; ?></h3>
    <p class="text-xs text-gray-500 mt-2">This is just a prediction. Please consult a specialist for an accurate diagnosis.</p>
    <!-- <?php //if ($ECG_statusMessage_predicted < 10) { ?>
        <div class="text-xl font-medium ">Within criteria: <span class="font-bold" style="color: #7ed957;">LOW</span></div>
    <?php //} else if ($ECG_statusMessage_predicted >= 10 && $ECG_statusMessage_predicted < 90) { ?>
            <div class="text-xl font-medium ">Within criteria: <span class="font-bold" style="color: #ff914d;">Medium</span>
            </div>
    <?php //} else if ($ECG_statusMessage_predicted >= 90) { ?>
                <div class="text-xl font-medium ">Within criteria: <span class="font-bold" style="color: #e21726;">High</span></div>
    <?php //} else { ?>
                <div class="text-xl font-medium"><span class="font-bold" style="color: #e21726;">Error</span></div>
    <?php //} ?> -->
</div>

