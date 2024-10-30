<?php
function wmc_calculator( $atts, $content = null){

$wmc_title_font = get_option('wmc_title_font',28);
$mortt_calc_back_color = get_option('mortt_calc_back_color','#fff');
$mortgage_title_color = get_option('mortgage_title_color','#000');
$mortt_border_color = get_option('mortt_border_color','#000');
$wmc_intfield_title_color = get_option('wmc_intfield_title_color','#000');
$cf_hover_color = get_option('cf_hover_color','#e8e7e7');
$wcf_enable_chart = get_option('wcf_enable_chart','true');
$wmc_result_title_color = get_option('wmc_result_title_color','#000');
$wmc_act_sch_btn_text_color = get_option('wmc_act_sch_btn_text_color','#f0f0f0');
$wmc_act_sch_btn_bg_color = get_option('wmc_act_sch_btn_bg_color','#2a9d8f');
$wmc_sch_btn_text_color = get_option('wmc_sch_btn_text_color','#f0f0f0');
$wmc_sch_btn_bg_color = get_option('wmc_sch_btn_bg_color','#1d3557');
$wmc_annu_tab_head_text_color = get_option('wmc_annu_tab_head_text_color','#000000');
$wmc_annu_tab_body_text_color = get_option('wmc_annu_tab_body_text_color','#000000');
$wmc_month_tab_head_text_color = get_option('wmc_month_tab_head_text_color','#000000');
$wmc_month_tab_body_text_color = get_option('wmc_month_tab_body_text_color','#000000');
$wcf_enable_month_annual_schedule = get_option('wcf_enable_month_annual_schedule','true');
$mortgage_title = get_option('mortgage_title','MORTGAGE CALCULATOR');
$wmc_month_pay_text = get_option('wmc_month_pay_text','Monthly Payment');
$wmc_total_pay_text = get_option('wmc_total_pay_text','Total Payment');
$wmc_total_interest_text = get_option('wmc_total_interest_text','Total interest');
$default_purchase_price = get_option('default_purchase_price','12000');
$min_purchase_price = get_option('min_purchase_price','1');
$max_purchase_price = get_option('max_purchase_price','10000000');
$default_roi = get_option('default_roi','8');
$min_roi = get_option('min_roi','1');
$max_roi = get_option('max_roi','30');
$default_loan_term = get_option('default_loan_term','5');
$min_loan_term = get_option('min_loan_term','1');
$max_loan_term = get_option('max_loan_term','30');


ob_start();
    ?>
    <style type="text/css">
        li.nav-tab.nav-tab-active {
            color: <?php echo esc_attr($wmc_act_sch_btn_text_color); ?>;
            background-color: <?php echo esc_attr($wmc_act_sch_btn_bg_color); ?>;
        }
        li.nav-tab {
            color: <?php echo esc_attr($wmc_sch_btn_text_color); ?>;
            background-color: <?php echo esc_attr($wmc_sch_btn_bg_color); ?>;
        }
        .wmc_main_div {
            background-color: <?php echo esc_attr($mortt_calc_back_color); ?>;
        }
        .wmc_inner_header h2 {
            color: <?php echo esc_attr($mortgage_title_color); ?>;
            font-size: <?php echo esc_attr($wmc_title_font); ?>px;
        }
        .wmc_inner_header:after {
            color: <?php echo esc_attr($mortt_border_color); ?>;
        }
        .wmc_calc_col .wmc_field_name {
            color: <?php echo esc_attr($wmc_intfield_title_color); ?>;
        }
        .wmc_calc_filed .wmc_conditions:hover {
            background-color: <?php echo esc_attr($cf_hover_color); ?>;
        }
        span.input-group-text {
            color: <?php echo esc_attr($wmc_result_title_color); ?>;
        }
        .mortgage_annual_schedule th {
            color: <?php echo esc_attr($wmc_annu_tab_head_text_color); ?>;
        }
        .mortgage_annual_schedule td {
            color: <?php echo esc_attr($wmc_annu_tab_body_text_color); ?>;
        }
        .mortgage_monthley_schedule th {
            color: <?php echo esc_attr($wmc_month_tab_head_text_color); ?>;
        }
        .mortgage_monthley_schedule td {
            color: <?php echo esc_attr($wmc_month_tab_body_text_color); ?>;
        }
    </style>
<div class="wmc_main_div">
    <section class="wmc_calc_header">
        <div class="wmc_title">
            <div class="wmc_inner_header">
                <h2 class="font-weight-bold"><?php echo esc_attr($mortgage_title); ?></h2>
            </div>
        </div>
        <div class="wmc_containers">
            <div id="wmc_calc_form" class="wmc_calc_form">
                <form class="wmc_invt_form">
                    <div class="wmc_containers_rows">
                        <div class="wmc_calc_col">
                            <div class="wmc_calc_div1">
                                <div class="wmc_calc_filed">
                                    <label for="" class="wmc_field_name"><?php echo esc_html('Purchase Price :','mortgage-calculator'); ?></label>
                                    <input type="number" name="wmc_purchase_price" placeholder="Your purchase price" id="wmc_purchase_price" class="wmc_conditions" value="<?php echo esc_attr($default_purchase_price); ?>" min="<?php echo esc_attr($min_purchase_price); ?>" max="<?php echo esc_attr($max_purchase_price); ?>">
                                </div>
                                <div class="wmc_calc_filed">
                                    <label class="wmc_field_name"><?php echo esc_html('Rate Of Interest (%):','mortgage-calculator'); ?></label>
                                    <input type="number" name="wmc_rate" placeholder="Interest rate" id="wmc_rate" class="wmc_conditions" value="<?php echo esc_attr($default_roi); ?>" min="<?php echo esc_attr($min_roi); ?>" max="<?php echo esc_attr($max_roi); ?>">
                                </div>
                            </div>
                            <div class="wmc_calc_div2">
                                <div class="wmc_calc_filed">
                                    <label class="wmc_field_name"><?php echo esc_html('Loan Term (Years)','mortgage-calculator'); ?></label>
                                    <input type="number" name="wmc_year" placeholder="Year" id="wmc_year" class="wmc_conditions" value="<?php echo esc_attr($default_loan_term); ?>" min="<?php echo esc_attr($min_loan_term); ?>" max="<?php echo esc_attr($max_loan_term); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <?php if($wcf_enable_chart == 'true'){ ?>
    <div class="wmc_result_div">
        <div class="wmc_heading">
            <h3><?php echo esc_html('Results','mortgage-calculator'); ?></h3>
        </div>

        <div class="wmc_summery">
            <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><?php echo esc_attr($wmc_month_pay_text); ?></span>
                  </div>
                  <div class="wmc_calc_monthley" id="monthly_payment1"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><?php echo esc_attr($wmc_total_pay_text); ?></span>
                  </div>
                  <div class="wmc_calc_monthley" id="monthly_payment2"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><?php echo esc_attr($wmc_total_interest_text); ?></span>
                  </div>
                  <div class="wmc_calc_monthley" id="monthly_payment3"></div>
                </div>
              </div>
          </div>

        <div class="wmc_chart">
            <canvas id="wmcChart" width="300" height="300"></canvas>
        </div>
        <?php if($wcf_enable_month_annual_schedule == 'true'){ ?>
        <div class="wmc_schedule_content">
            <div class="wmc_display_table">
                <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
                    <li id="wmc_display_annual" class="nav-tab nav-tab-active" data-tab="wmc-annual-schedule"><?php echo esc_html('Annual Schedule','mortgage-calculator'); ?></li>
                    <li id="wmc_display_month" class="nav-tab" data-tab="wmc-month-schedule"><?php echo esc_html('Monthly Schedule','mortgage-calculator'); ?></li>
                </ul>
            </div>
            <div id="wmc-annual-schedule" class="tab-content current">
                <div id="wmc_annual_result_table">

                </div>
            </div>
            <div id="wmc-month-schedule" class="tab-content">
                <div id="wmc_monthley_result_table">

                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php }else{ ?>
    <div class="wmc_result_div">
        <div class="wmc_heading">
            <h3><?php echo esc_html('Results','mortgage-calculator'); ?></h3>
        </div>
        <div class="wmc_summery">
            <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><?php echo esc_attr($wmc_month_pay_text); ?></span>
                  </div>
                  <div class="wmc_calc_monthley" id="monthly_payment1"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo esc_attr($wmc_total_pay_text); ?></span>
                    </div>
                    <div class="wmc_calc_monthley" id="monthly_payment2"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo esc_attr($wmc_total_interest_text); ?></span>
                    </div>
                    <div class="wmc_calc_monthley" id="monthly_payment3"></div>
                </div>
            </div>
        </div>
        <?php if($wcf_enable_month_annual_schedule == 'true'){ ?>
        <div class="wmc_schedule_content">
            <div class="wmc_display_table">
                <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
                    <li id="wmc_display_annual" class="nav-tab nav-tab-active" data-tab="wmc-annual-schedule"><?php echo esc_html('Annual Schedule','mortgage-calculator'); ?></li>
                    <li id="wmc_display_month" class="nav-tab" data-tab="wmc-month-schedule"><?php echo esc_html('Monthly Schedule','mortgage-calculator'); ?></li>
                </ul>
                
            </div>
            <div id="wmc-annual-schedule" class="tab-content current">
                <div id="wmc_annual_result_table">

                </div>
            </div>
            <div id="wmc-month-schedule" class="tab-content">
                <div id="wmc_monthley_result_table">

                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<?php
$output= ob_get_contents();
        ob_end_clean();
        return $output;
}
add_shortcode('wmc_calc','wmc_calculator');