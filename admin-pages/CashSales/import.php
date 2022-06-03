<?php
/** This is just so intelliphene knows what $this relates to.
 *  @var WpDigitalDriveCompetitions\AdminPages\CashSales\Controller $this
 * */
?>
<form method="POST" class="mt-1" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <div class="card card-border p-0 w-100 mw-100">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title mb-0 text-uppercase">Import CSV</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <select
                                    name="product_id"
                                    class="js-states form-control selectpicker w-100 mw-100"
                                    data-live-search="true"
                                    data-selected="<?php echo $this->get("product_id"); ?>"
                                    required>
                                    <?php
                                        $allProducts = $this->getCompetitionProducts();
                                        if (count($allProducts) > 0) {
                                            foreach ($allProducts as $key => $product) {
                                                ?>
                                                    <option data-tokens="<?php echo $product['value']; ?>" value="<?php echo $product['value']; ?>">
                                                        <?php echo $product['label']; ?>
                                                    </option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <input type="file" name="cash_sales_data" id="importFile" class="form-control importCsvFile"/>
                            <small>only accepts in .csv format</small>
                        </div>
                    </div>
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
