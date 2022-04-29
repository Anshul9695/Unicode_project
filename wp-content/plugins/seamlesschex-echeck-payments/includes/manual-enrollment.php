<?php

/*
 * This serves to build the manual enrollment only portion of the checkout page and outputs the routing and account number fields.
 */
if ($this->description) {
    echo wpautop(wptexturize(trim($this->description)));
}
if ($this->extra) {
    echo "<small>" . wptexturize(trim($this->extra)) . "</small>";
}


$fields = array();
$default_fields = array(
    
    'routing-number' => '<p class="form-row form-row-first validate-required ">
    <label for="' . esc_attr($this->id) . '-routing-number">' . __('Routing Number', 'woocommerce-gateway-seamlesschex') . ' <span class="required">*</span></label>
    <input id="' . esc_attr($this->id) . '-routing-number" class="input-text" type="text"  autocomplete="off" name="' . esc_attr($this->id) . '_routing_number" maxlength="9" />
    </p>',
    'account-number' => '<p class="form-row form-row-last validate-required ">
    <label for="' . esc_attr($this->id) . '-account-number">' . __('Account Number', 'woocommerce-gateway-seamlesschex') . ' <span class="required">*</span></label>
    <input id="' . esc_attr($this->id) . '-account-number" class="input-text" type="text" name="' . esc_attr($this->id) . '_account_number"  autocomplete="off"  maxlength="17" />
    </p>',
    
    
    'recurring' => '<p class="form-row form-row-first"><br>
    <label for="'. esc_attr($this->id) . '-recurring" class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
    <input id="' . esc_attr($this->id) . '-recurring" class="checkbox-recurring woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" 
    type="checkbox" name="' . esc_attr($this->id) . '_recurring" onclick="handleClick(this)"/>
    <span class="woocommerce-terms-and-conditions-checkbox-text">' . __('Recurring', 'woocommerce-gateway-seamlesschex')  . '<span class="tooltip"><i class="fas fa-info-circle"></i><span class="tooltiptext">Select to enable recurring payments.</span></span></label></p>',
    
    'recurring-cycle' => '<p class="form-row form-row-last recurring-hidden-block" style="display: none;">
    <label for="' . esc_attr($this->id) . '-recurring-cycle">' . __('Billing Period', 'woocommerce-gateway-seamlesschex') . '<span class="tooltip"><i class="fas fa-info-circle"></i><span class="tooltiptext">The recurring payment will occur with a selected frequency. The options available for recurring payments are daily, weekly, bi-weekly or monthly.</span></span></label>
    <select id="' . esc_attr($this->id) . '-recurring-cycle" class="woocommerce-form__select" autocomplete="off" name="' . esc_attr($this->id) . '_recurring_cycle" data-placeholder="Select an option…">
    <option value>Select an option…</option><option value="day">Day</option><option value="week">Week</option><option value="bi-weekly">Bi-weekly</option><option value="month">Month</option></select></p>',
    
    'recurring-start-date' => '<p class="form-row form-row-first recurring-hidden-block" style="display: none;">
    <label for="' . esc_attr($this->id) . '-recurring-start-date">' . __('Start Date', 'woocommerce-gateway-seamlesschex') . '<span class="tooltip"><i class="fas fa-info-circle"></i><span class="tooltiptext">The recurring payments will start on the day of its creation, if selected NULL. If a start date is entered, the recurring payment will start on the start date selected.</span></span></label>
    <input id="' . esc_attr($this->id) . '-recurring-start-date" class="input-text" type="text" placeholder="MM/DD/YY"  autocomplete="off" name="' . esc_attr($this->id) . '_recurring_start_date" maxlength="10" />
    </p>',
    
    'recurring-installments' => '<p class="form-row form-row-last recurring-hidden-block" style="display: none;">
    <label for="' . esc_attr($this->id) . '-recurring-installments">' . __('Duration', 'woocommerce-gateway-seamlesschex') . '<span class="tooltip"><i class="fas fa-info-circle"></i><span class="tooltiptext">Submit if you require the recurring payments to occur a specific number of times or to be indefinite.<br><b>0</b> - indefinite (ongoing until cancelled).<br><b>1, 2, 3...N</b> - number of recurring payments.</span></span></label>
    <input min="0" id="' . esc_attr($this->id) . '-recurring-installments" class="input-text" type="number"  autocomplete="off" name="' . esc_attr($this->id) . '_recurring_installments" value="0"/>
    </p>',
    

);
$fields = wp_parse_args($fields, apply_filters('woocommerce_gateway_seamlesschex_checkout_fields', $default_fields, $this->id));
$outputHTML = "<fieldset id='wc-" . esc_attr($this->id) . "-check-form' class='wc-credit-card-form wc-payment-form'>";


if (!$this->if_recurring) {
    unset(
            $fields['recurring'], 
            $fields['recurring-cycle'], 
            $fields['recurring-start-date'], 
            $fields['recurring-installments'] 
    );
}

foreach ($fields as $key => $field) {
    $outputHTML .= $field;
}
$outputHTML .= "<div class='clear'></div></fieldset>";

echo $outputHTML;
