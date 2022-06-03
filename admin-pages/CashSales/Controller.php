<?php
/**
 * Controller for the dashboard
 */

declare(strict_types=1);

namespace WpDigitalDriveCompetitions\AdminPages\CashSales;
use WpDigitalDriveCompetitions\Helpers\AdminHelper;

/**
 * Controller for the dashboard
 */
class Controller extends AdminHelper
{
    /** Controller */
    protected string $controller = 'cash sales';

    /**
     * Index
     */
    public function actionIndex()
    {
        /** @var \WpDigitalDriveCompetitions\Models\TicketNumber $model */
        $model = $this->loadModel('TicketNumber', '\WpDigitalDriveCompetitions\Models\TicketNumber');
        $model->search();

        $this->buildPage(dirname(__FILE__) . '/index.php');
    }

    /**
     * View
     */
    public function actionView($id = null)
    {
        $id = $id ?: $this->getValue('id');

        /** @var \WpDigitalDriveCompetitions\Models\TicketNumber $model */
        $model = $this->loadModel('TicketNumber', '\WpDigitalDriveCompetitions\Models\TicketNumber');
        $postValues = $this->postValue($this->default_modelname);

        if ($postValues != null) {
            $isTicketNumberExists = $model->isTicketNumberExist( $postValues['ticket_number'],  $postValues['product_id']);
            if( $isTicketNumberExists > 0 ) {
                $result = false;
                $mergeErr = [
                    'ticket_number' => 'Ticket Number already exist!'
                ];
            }

            if( $id == null ) {
                $postValues['cash_sale'] = 1;
                $postValues['order_id'] = 0;
                $postValues['item_id'] = 0;
                $postValues['userid'] = 0;
                $store = $model->store($postValues);
            } else {
                $store = $model->update($id, $postValues);
            }

            if( $store ) {
                $result = true;
            } else {
                $result = false;
                $mergeErr = $model->errors;
            }

            if ($result == true) {
                $this->alerts['successes']['Updated'] = 'The record was successfully saved!';
            } else {
                $this->alerts['errors'] = array_merge($this->alerts['errors'], $model->errors, $mergeErr);
            }
        }

        $model->loadId($id);
        $this->buildPage(dirname(__FILE__) . '/view.php');
    }

    /**
     * Import
     */
    public function actionImport()
    {
        $mergeErr = [];

        /** @var \WpDigitalDriveCompetitions\Models\TicketNumber $model */
        $model = $this->loadModel('TicketNumber', '\WpDigitalDriveCompetitions\Models\TicketNumber');

        if( $_FILES ) {
            // Allowed mime types
            $fileMimes = array(
                'text/x-comma-separated-values',
                'text/comma-separated-values',
                'application/octet-stream',
                'application/vnd.ms-excel',
                'application/x-csv',
                'text/x-csv',
                'text/csv',
                'application/csv',
                'application/excel',
                'application/vnd.msexcel',
                'text/plain',
            );

            // Validate whether selected file is a CSV file
            if (!empty($_FILES['cash_sales_data']['name']) && in_array($_FILES['cash_sales_data']['type'], $fileMimes))
            {
                // Open uploaded CSV file with read-only mode
                $csvFile = fopen($_FILES['cash_sales_data']['tmp_name'], 'r');

                // Skip the first line
                fgetcsv($csvFile);

                // Parse data from CSV file line by line
                while ( ( $getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
                {

                    $baseOrderId = get_option('cash_sale_base_ticket_id');
                    $baseOrderIdPrefix = get_option('cash_sale_base_ticket_id_prefix');
                    $baseOrderIdSuffix = get_option('cash_sale_base_ticket_id_suffix');
                    $checkCashSale = $model->getlatestOrderId();

                    // Get row data
                    $fullName    = $getData[0];
                    $clubName    = $getData[1];
                    $email       = $getData[2];
                    $phoneNumber = $getData[3];
                    $productID   = $_POST['product_id'];
                    $orderIDFromDb = ($checkCashSale == NULL) ? $baseOrderId : $checkCashSale;
                    $removePrefix = $baseOrderIdPrefix ? str_replace( $baseOrderIdPrefix, "", $orderIDFromDb ) : $orderIDFromDb;
                    $removeSuffix = $baseOrderIdSuffix ? str_replace( $baseOrderIdSuffix, "", $removePrefix ) : $removePrefix;
                    $cleanOrderID = $removeSuffix;
                    $cleanOrderID += 1;
                    $theOrderID = "{$baseOrderIdPrefix}{$cleanOrderID}{$baseOrderIdSuffix}";

                    $request = [
                        'full_name' => $fullName,
                        'club_name' => $clubName,
                        'email' => $email,
                        'phone_number' => $phoneNumber,
                        'cash_sale' => 1,
                        'product_id' => (int)$productID,
                        'userid' => 0,
                        'order_id' => $theOrderID,
                        'item_id' => 0,
                    ];

                    $cashSaleStoring = $model->store($request);

                    if( $cashSaleStoring ) {
                        $result = true;
                    } else {
                        $result = false;
                        $mergeErr = [
                            'Data Error' => $model->errors
                        ];
                    }

                }
                // Close opened CSV file
                fclose($csvFile);
            } else {
                $result = false;
                $mergeErr = [
                    'CSV Format' => 'Invalid Format!'
                ];
            }
        }

        if ($result == true) {
            $this->alerts['successes']['Updated'] = 'The record was successfully saved!';
        } else {
            $this->alerts['errors'] = array_merge($this->alerts['errors'], $mergeErr);
        }

        $this->buildPage(dirname(__FILE__) . '/import.php');
    }

    public function getCompetitionProducts()
    {
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_type',
                    'field'    => 'slug',
                    'terms'    => 'competition',
                ),
            ),
        );

        $products = [];
        $product = new \WP_Query($args);
        if( $product->have_posts() ) {
            while( $product->have_posts() ) : $product->the_post();
                $products[] = [
                    'value' => get_the_ID(),
                    'label' => get_the_title()
                ];
            endwhile;
        }

        return $products;
    }
}
