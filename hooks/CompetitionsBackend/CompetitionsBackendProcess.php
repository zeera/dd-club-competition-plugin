<?php
declare(strict_types=1);

namespace WpDigitalDriveCompetitions\Hooks\CompetitionsBackend;

use WpDigitalDriveCompetitions\Helpers\AdminHelper;
use WpDigitalDriveCompetitions\Models\TicketNumber;

class CompetitionsBackendProcess extends AdminHelper
{
    /**
     * Adds "Import" button on module list page
     */
    public static function addCustomButton( $column, $postid )
    {
        if ( $column == 'action' ) {
            echo '<a href="'.WPDIGITALDRIVE_COMPETITIONS_SITEURL.'/wp-admin/admin.php?page=WpDigitalDriveCompetitions_entry_lists&product_id='. $postid .'" title="View Entry List">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z"/>
                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z"/>
                </svg>
                </a>';
        }
    }

    public static function showProductOrder($columns){
        //remove column
        unset( $columns['tags'] );

        //add column
        $columns['action'] = __( 'Action');

        return $columns;
    }

    public static function getPage( $key )
    {
        global $wpdb;
        $page = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM $wpdb->posts
                WHERE post_type = 'page'
                AND post_name
                LIKE '%s'", '%'. $wpdb->esc_like( $key ) .'%'
            ), OBJECT
        );

        return $page;
    }

    public static function createEntryListPage()
    {

        $self = new self;
        $page = $self::getPage('entry-lists');
        if ( count($page) <= 0 ) {
            $my_post = array(
                'post_title'   => 'Entry List',
                'post_name' => 'entry-lists',
                'post_content' => '[entry-lists-competition]',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_type'    => 'page'
            );
            wp_insert_post( $my_post );
        }
    }

    public static function generateTicketNumberAPI()
    {
        $version = '2';
        $namespace = 'wp/v' . $version;
        register_rest_route($namespace, '/generate-ticket-number', array(
            'methods'  => 'POST',
            'callback' =>  [self::class, "processTicketNumber"],
        ));
    }

    public static function processTicketNumber()
    {
        $ticketNumber = new TicketNumber;
        $adminHelper = new AdminHelper;
        $status = false;
        $groupedByEmail = [];
        $ticketNumbers = [];
        if( isset($_POST) ) {
            $allTickets = $ticketNumber->getAllTickets($_POST['product_id']);
            //shuffle array
            shuffle($allTickets);
            if( count($allTickets) > 0 ) {
                $ctr = 1;
                foreach ($allTickets as $key => $ticket) {
                    $request['ticket_number'] = $ctr;
                    $result = $ticketNumber->update($ticket['id'], $request);
                    $product_data = wc_get_product( $ticket['product_id'] );
                    if( !array_key_exists( $ticket['email'], $groupedByEmail) ) {
                        $groupedByEmail[$ticket['email']] = [
                            'subject' => get_bloginfo().' - Competition',
                            'competition_name' => $product_data->name,
                            'status' => 'ticket_numbers',
                            'ticket_numbers' => $ctr,
                        ];
                    } else {
                        $existingTicketNumber = $groupedByEmail[$ticket['email']]['ticket_numbers'];
                        $newTicketNumber = $existingTicketNumber.",".$ctr;
                        $data = [
                            'subject' => get_bloginfo().' - Competition',
                            'competition_name' => $product_data->name,
                            'status' => 'ticket_numbers',
                            'ticket_numbers' => $newTicketNumber,
                        ];
                        $groupedByEmail[$ticket['email']] = $data;
                    }
                    $ctr++;
                }
                self::processEmail($groupedByEmail);
                $status = true;
                return $status;
            } else {
                return $status;
            }
        }
    }

    public static function processEmail($request)
    {
        $competitionEmail = new CompetitionEmail;
        $adminHelper = new AdminHelper;
        $competitionEmail->setEmail($request, true);
        // for ($i = 1; $i <= $request; $i++) {
        //     $adminHelper->dd($request[$i], true, true);
        //     set_time_limit(20);
        //     sleep(2);
        // }
    }

    public static function customWooOrderNumbers($order_id)
    {
        $prefix = 'ON';
        $suffix = 'F';
        $new_order_id = $prefix . $order_id . $suffix;
        return $new_order_id;
    }
}
