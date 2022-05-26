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
