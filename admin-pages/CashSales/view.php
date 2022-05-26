<?php
/** This is just so intelliphene knows what $this relates to.
 *  @var WpDigitalDriveCompetitions\AdminPages\CashSales\Controller $this
 * */
?>
<form method="post" class="mt-5">
    <div class="row">
        <div class='col'>
            <?php $this->inputHidden('id'); ?>
            <div class="row">
                <div class="col">
                    <div class="card p-0 m-0 mw-100 w-100">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title mb-0 text-uppercase fs-3">Cash Sales Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-md-4">
                                    <?php
                                        $this->inputText(
                                            'full_name', [
                                                'label'=> 'Full Name',
                                                'htmlclass' => 'form-control input-sm w-100 mw-100 mt-1',
                                                'value' => $this->get("full_name")
                                            ]
                                        );
                                    ?>
                                </div>
                                <div class="col col-md-4">
                                    <?php
                                        $this->inputEmail(
                                            'email', [
                                                'label'=> 'Email',
                                                'htmlclass' => 'form-control input-sm w-100 mw-100 mt-1',
                                                'value' => $this->get("email")
                                            ]
                                        );
                                    ?>
                                </div>
                                <div class="col col-md-4">
                                    <?php
                                        $this->inputText(
                                            'phone_number', [
                                                'label'=> 'Phone Number',
                                                'htmlclass' => 'form-control input-sm w-100 mw-100 mt-1',
                                                'value' => $this->get("phone_number")
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col col-md-4">
                                    <div class="form-group">
                                        <label> Select Product </label> <br>
                                        <select
                                            name="TicketNumber[product_id]"
                                            class="js-states form-control selectpicker w-100 mw-100"
                                            data-live-search="true"
                                            data-selected='<?php echo $this->get("product_id"); ?>'>
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
                                <div class="col col-md-4">
                                    <?php
                                        $this->inputText(
                                            'club_name', [
                                                'label'=> 'Club Name',
                                                'htmlclass' => 'form-control input-sm w-100 mw-100 mt-1',
                                                'value' => $this->get("club_name")
                                            ]
                                        );
                                    ?>
                                </div>
                                <div class="col col-md-4">
                                    <?php
                                        $this->inputText(
                                            'ticket_number', [
                                                'label'=> 'Ticket Number',
                                                'htmlclass' => 'form-control input-sm w-100 mw-100 mt-1',
                                                'value' => $this->get("ticket_number")
                                            ]
                                        );
                                    ?>
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
        </div>
    </div>
</form>
