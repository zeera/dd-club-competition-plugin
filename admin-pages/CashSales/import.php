<?php
/** This is just so intelliphene knows what $this relates to.
 *  @var WpDigitalDriveCompetitions\AdminPages\CashSales\Controller $this
 * */
?>
<form method="POST" class="mt-5" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <div class="card card-border p-0 w-100 mw-100">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title mb-0 text-uppercase">Import CSV</h4>
                </div>
                <div class="card-body">
                    <input type="file" name="cash_sales_data" id="importFile" class="form-control importCsvFile"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card p-2 m-0 mw-100 w-100 text-right align-items-end bg-light">
                <div class="row">
                    <?php if( $this->isAdmin() ): ?>
                        <div class="col">
                            <button type="submit" class="btn btn-outline-info px-5 fw-bold">Submit</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</form>
