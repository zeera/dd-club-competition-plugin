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
                        <button
                            class="btn btn-success fw-bold">
                            Export PDF
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="16" height="16" fill="currentColor"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M88 304H80V256H88C101.3 256 112 266.7 112 280C112 293.3 101.3 304 88 304zM192 256H200C208.8 256 216 263.2 216 272V336C216 344.8 208.8 352 200 352H192V256zM224 0V128C224 145.7 238.3 160 256 160H384V448C384 483.3 355.3 512 320 512H64C28.65 512 0 483.3 0 448V64C0 28.65 28.65 0 64 0H224zM64 224C55.16 224 48 231.2 48 240V368C48 376.8 55.16 384 64 384C72.84 384 80 376.8 80 368V336H88C118.9 336 144 310.9 144 280C144 249.1 118.9 224 88 224H64zM160 368C160 376.8 167.2 384 176 384H200C226.5 384 248 362.5 248 336V272C248 245.5 226.5 224 200 224H176C167.2 224 160 231.2 160 240V368zM288 224C279.2 224 272 231.2 272 240V368C272 376.8 279.2 384 288 384C296.8 384 304 376.8 304 368V320H336C344.8 320 352 312.8 352 304C352 295.2 344.8 288 336 288H304V256H336C344.8 256 352 248.8 352 240C352 231.2 344.8 224 336 224H288zM256 0L384 128H256V0z"/></svg>
                        </button>
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
                                            $url = WPDIGITALDRIVE_COMPETITIONS_SITEURL.'/wp-admin/post.php?post='.$tmpData['order_id'].'&action=edit';
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
