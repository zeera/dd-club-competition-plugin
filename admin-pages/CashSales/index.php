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
?>


<div class="row">
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
</div>
