<?php

/** This is just so intelliphene knows what $this relates to.
 *  @var WpDigitalDriveCompetitions\AdminPages\CashSales\Controller $this
 * */

/**
 * This is a default ajax search function that relies upon the .js file
 * It is quite flexible, but please dig into the function for more info.
 * The css for the table does rely upon bootstrap classes, so if you are not using bootstrap you will need to set the bootstrap
 * css classes in question to get it looking right
 *
 * This will also add the appropriate inline js and the normal required js include file for this.
 */
$this->addAjaxSearch([
    'id' => 'ajaxsearch',
    'destination' => admin_url('admin-ajax.php') . '?action=' . WPDIGITALDRIVE_COMPETITIONS_AJAX_PREFIX . 'adminAjax',
    'search_fields' => ['namebox' => 'namebox'],
]);

$box1options = $this->getOption('search_options');

$datas = $this->data['results'];
?>
<!-- <div class="row">
	<div class="col">
		<div class="card card-border p-0">
			<div class="card-header bg-dark text-white">
				<h4 class="card-title mb-0 text-uppercase">Search</h4>
			</div>
			<div class="card-body">
				<?php $this->inputSearchField('namebox', ['options' => $box1options, 'htmlclass' => 'form-select input-sm w-100 mw-100 mt-2']); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col memberdisplaybox">
		<div class="card card-border w-100 mw-100 p-0">
			<div class="card-header bg-dark text-white">
				<h4 class="card-title mb-0">Results</h4>
			</div>
			<div class="card-body" style="overflow: auto">
				<div class="row">
					<div class="col-md-12">
						<div id="filterlist"></div>
					</div>
				</div>
                <div class="row align-items-end justify-content-end text-end">
                    <div class="col">
                        <a
                            href="<?= admin_url('admin.php?page=' . WPDIGITALDRIVE_COMPETITIONS_NAMESPACE . '_cash_sales&add=1') ?>"
                            class="btn btn-warning">
                            <strong>Add Cash Sale</strong>
                        </a>
                        <a
                            href="<?= admin_url('admin.php?page=' . WPDIGITALDRIVE_COMPETITIONS_NAMESPACE . '_cash_sales&import=1') ?>"
                            class="btn btn-success">
                            <strong>Import CSV</strong>
                        </a>
                    </div>
                </div>
				<?php $this->createTable([], $this->getOption('columns')); ?>
				<?php $this->addAjaxExport('ajaxsearch'); ?>
				<br />
			</div>
		</div>
	</div>
</div> -->
<div class="row">
    <div class="col-12">
        <div class="card w-100 mw-100 p-0">
            <div class="card-header">
                Cash Sales
            </div>
            <div class="card-body">
                <div class="row align-items-end justify-content-end text-end my-3">
                    <div class="col">
                        <a
                            href="<?= admin_url('admin.php?page=' . WPDIGITALDRIVE_COMPETITIONS_NAMESPACE . '_cash_sales&add=1') ?>"
                            class="btn btn-warning">
                            <strong>Add Cash Sale</strong>
                        </a>
                        <a
                            href="<?= admin_url('admin.php?page=' . WPDIGITALDRIVE_COMPETITIONS_NAMESPACE . '_cash_sales&import=1') ?>"
                            class="btn btn-success">
                            <strong>Import CSV</strong>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table
                        data-ppp-options="<?php echo get_option('data_per_page_options') ? get_option('data_per_page_options') : ''; ?>"
                        data-ppp="<?php echo get_option('data_per_page') ? get_option('data_per_page') : ''; ?>"
                        id="cashSaleIndexTable"
                        class="table table-striped cashSaleIndexTable" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>Order ID</th>
                                <th>Full Name</th>
                                <th>Club Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Product Name</th>
                                <th>Upload Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($datas as $key => $data) {
                                    $product_data = wc_get_product( $data['product_id'] );
                                    ?>
                                        <tr>
                                            <td>
                                                <a
                                                    class="fw-bold text-decoration-none link-info"
                                                    href="<?= admin_url('admin.php?page=' . WPDIGITALDRIVE_COMPETITIONS_NAMESPACE . '_cash_sales&id='.$data['id']) ?>">
                                                    <?php echo $data['order_id']; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $data['full_name']; ?></td>
                                            <td><?php echo $data['club_name']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['phone_number']; ?></td>
                                            <td><?php echo $product_data->name; ?></td>
                                            <td><?php echo $data['date_created']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                        <tfoot class="table-dark">
                            <tr>
                            <th>Order ID</th>
                                <th>Full Name</th>
                                <th>Club Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Product Name</th>
                                <th>Upload Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
