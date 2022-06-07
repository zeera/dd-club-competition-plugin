<div class="row">
    <div class="col-12">
        <div class="card p-0 mw-100">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?php $product_name  = $this->product_data->name; ?>
                        <?php esc_attr_e('Entry Lists ('. $product_name .')', 'WpAdminStyle'); ?>
                    </div>
                    <div class="col-12 col-md-6 text-end">
                        <a
                            href="<?= WPDIGITALDRIVE_COMPETITIONS_SITEURL ?>/entry-list"
                            target="_blank"
                            class="btn btn-success fw-bold">
                            View Entry List
                            <svg width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 60.65 28.65 32 64 32H512C547.3 32 576 60.65 576 96V416C576 451.3 547.3 480 512 480H64C28.65 480 0 451.3 0 416V96zM160 256C160 238.3 145.7 224 128 224C110.3 224 96 238.3 96 256C96 273.7 110.3 288 128 288C145.7 288 160 273.7 160 256zM160 160C160 142.3 145.7 128 128 128C110.3 128 96 142.3 96 160C96 177.7 110.3 192 128 192C145.7 192 160 177.7 160 160zM160 352C160 334.3 145.7 320 128 320C110.3 320 96 334.3 96 352C96 369.7 110.3 384 128 384C145.7 384 160 369.7 160 352zM224 136C210.7 136 200 146.7 200 160C200 173.3 210.7 184 224 184H448C461.3 184 472 173.3 472 160C472 146.7 461.3 136 448 136H224zM224 232C210.7 232 200 242.7 200 256C200 269.3 210.7 280 224 280H448C461.3 280 472 269.3 472 256C472 242.7 461.3 232 448 232H224zM224 328C210.7 328 200 338.7 200 352C200 365.3 210.7 376 224 376H448C461.3 376 472 365.3 472 352C472 338.7 461.3 328 448 328H224z"/></svg>
                        </a>
                        <button
                            id="generateTicketNumber"
                            data-site-url="<?= get_rest_url() ?>"
                            data-product-id="<?= $this->product_data->id; ?>"
                            class="btn btn-info text-white fw-bold">
                            Generate Ticket Number
                            <svg class="ticket-icon d-inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16" fill="currentColor"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M128 160H448V352H128V160zM512 64C547.3 64 576 92.65 576 128V208C549.5 208 528 229.5 528 256C528 282.5 549.5 304 576 304V384C576 419.3 547.3 448 512 448H64C28.65 448 0 419.3 0 384V304C26.51 304 48 282.5 48 256C48 229.5 26.51 208 0 208V128C0 92.65 28.65 64 64 64H512zM96 352C96 369.7 110.3 384 128 384H448C465.7 384 480 369.7 480 352V160C480 142.3 465.7 128 448 128H128C110.3 128 96 142.3 96 160V352z"/></svg>
                            <svg class="loader d-none d-inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                <g transform="rotate(0 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.8814102564102564s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(30 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.8012820512820512s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(60 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.7211538461538461s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(90 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.641025641025641s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(120 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.5608974358974359s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(150 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.4807692307692307s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(180 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.4006410256410256s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(210 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.3205128205128205s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(240 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.24038461538461536s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(270 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.16025641025641024s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(300 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.08012820512820512s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <g transform="rotate(330 50 50)">
                                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="0s" repeatCount="indefinite"></animate>
                                    </rect>
                                </g>
                                <!-- [ldio] generated by https://loading.io/ -->
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th class="row-title text-center"><?php esc_attr_e( 'Ticket No.', 'WpAdminStyle' ); ?></th>
                            <th class="text-center"><?php esc_attr_e( 'Name', 'WpAdminStyle' ); ?></th>
                            <th class="text-center"><?php esc_attr_e( 'Order', 'WpAdminStyle' ); ?></th>
                        </tr>
                    </thead>
                    <?php if($this->ticketNumbers): ?>
                        <?php foreach($this->ticketNumbers as $key => $tmpData): ?>
                            <?php
                                $userData = get_userdata( $tmpData['userid'] );
                                $full_name = $userData ? $userData->first_name . ' ' . $userData->last_name : $tmpData['full_name'];
                            ?>
                            <tr valign="top">
                                <td scope="row" class="text-center" width=20%>
                                    <label for="tablecell">
                                        <?php esc_attr_e($tmpData['ticket_number'], 'WpAdminStyle'); ?>
                                    </label>
                                </td>
                                <td class="text-center"><?php esc_attr_e( $full_name, 'WpAdminStyle' ); ?></td>
                                <td class="text-center" width=10%>
                                    <?php
                                        if( $tmpData['cash_sale'] == 1 ) {
                                            $url = admin_url('admin.php?page=' . WPDIGITALDRIVE_COMPETITIONS_NAMESPACE . '_cash_sales&id='.$tmpData['id']);
                                        } else {
                                            $url = admin_url('post.php?post=' .$tmpData['order_id'].'&action=edit');
                                        }
                                    ?>
                                    <a href="<?= $url; ?>"  class="btn btn-primary" title="View Order">
                                        View Order
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td class="text-center" colspan="3">No Entry List</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function($) {
        $('body').on('click', '#generateTicketNumber', function(e) {
            e.preventDefault();
            var baseUrl = $(this).data('site-url');
            var apiUrl = `${baseUrl}wp/v2/generate-ticket-number`;
            var productID = $(this).data('product-id');
            $.ajax({
                url: apiUrl,
                type: 'POST',
                dataType: 'json',
                data: {
                    product_id: productID,
                },
                beforeSend: function(data) {
                    $('body').find('.ticket-icon').addClass('d-none');
                    $('body').find('.loader').removeClass('d-none');
                },
                success: function(data, xhr) {
                    $('body').find('.ticket-icon').removeClass('d-none');
                    $('body').find('.loader').addClass('d-none');
                    if (xhr == 'success') {
                    }
                },
                error: function(data) {
                    // alert('error');
                }
            });
        });
    });
</script>
