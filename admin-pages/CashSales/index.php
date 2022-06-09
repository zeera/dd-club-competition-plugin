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

$datas = $this->data;
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
                <div class="row align-items-center">
                    <div class="col">
                    <?php esc_attr_e('Cash Sales', 'WpAdminStyle'); ?>
                    </div>
                    <div class="col text-end">
                        <a
                            href="javascript:;"
                            data-site-url="<?= get_rest_url() ?>"
                            data-product-id="<?= $this->product_data->id; ?>"
                            class="btn btn-dark fw-bold export">
                            Export to csv
                            <svg class="csv-icon d-inline" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 0V128C224 145.7 238.3 160 256 160H384V448C384 483.3 355.3 512 320 512H64C28.65 512 0 483.3 0 448V64C0 28.65 28.65 0 64 0H224zM80 224C57.91 224 40 241.9 40 264V344C40 366.1 57.91 384 80 384H96C118.1 384 136 366.1 136 344V336C136 327.2 128.8 320 120 320C111.2 320 104 327.2 104 336V344C104 348.4 100.4 352 96 352H80C75.58 352 72 348.4 72 344V264C72 259.6 75.58 256 80 256H96C100.4 256 104 259.6 104 264V272C104 280.8 111.2 288 120 288C128.8 288 136 280.8 136 272V264C136 241.9 118.1 224 96 224H80zM175.4 310.6L200.8 325.1C205.2 327.7 208 332.5 208 337.6C208 345.6 201.6 352 193.6 352H168C159.2 352 152 359.2 152 368C152 376.8 159.2 384 168 384H193.6C219.2 384 240 363.2 240 337.6C240 320.1 231.1 305.6 216.6 297.4L191.2 282.9C186.8 280.3 184 275.5 184 270.4C184 262.4 190.4 256 198.4 256H216C224.8 256 232 248.8 232 240C232 231.2 224.8 224 216 224H198.4C172.8 224 152 244.8 152 270.4C152 287 160.9 302.4 175.4 310.6zM280 240C280 231.2 272.8 224 264 224C255.2 224 248 231.2 248 240V271.6C248 306.3 258.3 340.3 277.6 369.2L282.7 376.9C285.7 381.3 290.6 384 296 384C301.4 384 306.3 381.3 309.3 376.9L314.4 369.2C333.7 340.3 344 306.3 344 271.6V240C344 231.2 336.8 224 328 224C319.2 224 312 231.2 312 240V271.6C312 294.6 306.5 317.2 296 337.5C285.5 317.2 280 294.6 280 271.6V240zM256 0L384 128H256V0z"/></svg>
                            <svg class="loader d-none d-inline" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                <g transform="rotate(0 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.8814102564102564s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(30 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.8012820512820512s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(60 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.7211538461538461s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(90 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.641025641025641s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(120 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.5608974358974359s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(150 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.4807692307692307s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(180 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.4006410256410256s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(210 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.3205128205128205s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(240 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.24038461538461536s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(270 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.16025641025641024s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(300 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.08012820512820512s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(330 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="0s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <!-- [ldio] generated by https://loading.io/ -->
                            </svg>
                        </a>
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
            </div>
            <div class="card-body">
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
<script>
    jQuery(function($) {
        $('body').on('click', '.export', function() {
            var baseUrl = $(this).data('site-url');
            var apiUrl = `${baseUrl}wp/v2/export`;
            var productID = $(this).data('product-id');
            $.ajax({
                url: apiUrl,
                type: 'POST',
                dataType: 'json',
                data: {
                    product_id: null,
                },
                beforeSend: function(data) {
                    $('.export').find('.csv-icon').addClass('d-none');
                    $('.export').find('.loader').removeClass('d-none');
                },
                success: function(data, xhr) {
                    $('.export').find('.csv-icon').removeClass('d-none');
                    $('.export').find('.loader').addClass('d-none');
                    /*
                    * Make CSV downloadable
                    */
                    var downloadLink = document.createElement("a");
                    var fileData = ['\ufeff'+data];

                    var blobObject = new Blob(fileData,{
                        type: "text/csv;charset=utf-8;"
                    });

                    var url = URL.createObjectURL(blobObject);
                    downloadLink.href = url;
                    var nowDate		= new Date();
                    var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
                    var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
                    var nowYear		= nowDate.getFullYear();
                    var formatDate	= nowMonth + "-" + nowDay + "-" + nowYear;
                    downloadLink.download = `cash-sales-${formatDate}.csv`;

                    /*
                    * Actually download CSV
                    */
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);
                },
                error: function(data) {
                    // alert('error');
                }
            });
        });
    });
</script>
