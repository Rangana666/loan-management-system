<?php
// Get CPU cores
$cpuCores = shell_exec('nproc');

// Get total and used RAM
$ramInfo = shell_exec('free -m | grep Mem | awk \'{print $2, $3}\'');
list($totalRAM, $usedRAM) = explode(' ', $ramInfo);

// Get total and used storage
$storageInfo = shell_exec('df -h / | tail -n 1 | awk \'{print $2, $3}\'');
list($totalStorage, $usedStorage) = explode(' ', $storageInfo);

// Calculate percentages
$ramPercentage = ($usedRAM / $totalRAM) * 100;
$storagePercentage = ($usedStorage / $totalStorage) * 100;
?>




        

        <div class="row">
            <!-- CPU -->
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-body bg-light ">
                        <h4 class="card-title">CPU Cores</h4>
                        <p class="card-text"><?php echo $cpuCores; ?></p>
                    </div>
                </div>
            </div>

            <!-- RAM -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <h4 class="card-title">Total RAM</h4>
                        <p class="card-text"><?php echo $totalRAM; ?> MB</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                style="width: <?php echo $ramPercentage; ?>%;" aria-valuenow="<?php echo $ramPercentage; ?>"
                                aria-valuemin="0" aria-valuemax="100">
                                <?php echo round($ramPercentage, 2); ?>%
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Storage -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <h4 class="card-title">Total Storage</h4>
                        <p class="card-text"><?php echo $totalStorage; ?></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                style="width: <?php echo $storagePercentage; ?>%;" aria-valuenow="<?php echo $storagePercentage; ?>"
                                aria-valuemin="0" aria-valuemax="100">
                                <?php echo round($storagePercentage, 2); ?>%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (popper.js and bootstrap.js are required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

