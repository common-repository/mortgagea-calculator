<?php 
add_action( 'admin_menu', 'mortgage_calculator_generator_admin_menu' );

function mortgage_calculator_generator_admin_menu(  ) { 
    add_menu_page(
        'mortgage Calculator', // page <title>Title</title>
        'mortgage Calculator', // menu link text
        'manage_options', // capability to access the page
        'mortgage_calculator_generator', // page URL slug
        'mortgage_calculator_generator_page', // callback function /w content
        'dashicons-calculator', // menu icon
        14
    );
}

function mortgage_calculator_generator_page(  ) { 
    if(isset($_REQUEST['succes']))
     {
        echo '<div class="notice notice-success is-dismissible">
                    <p>setting saved successfully.</p>
                </div>';
     }
?>

<div class="wmc_main_container">
    <div class="inner_div">
        <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
            <li class="nav-tab nav-tab-active" data-tab="wmc-tab-general"><?php echo __('General','wmc-calculator');?></li>
            <li class="nav-tab" data-tab="wmc-tab-text-settings"><?php echo __('Texts','wmc-calculator');?></li>
        </ul>
        
<?php
settings_fields( 'mortgage_calculator_generator' );
do_settings_sections( 'mortgage_calculator_generator' );
?>
    <form action='<?php echo get_permalink(); ?>' method='post'>
        <div id="wmc-tab-general" class="tab-content current">
            <div class="wmc_style_setting">
                <table class="form-table" role="presentation">
                    <h1><?php echo esc_html('Mortgage Calculator Style Generator','mortgage-calculator'); ?></h1>
                    <tbody>
                        
                        <tr class="font-size">
                            <th scope="row">
                                <label for="blogname"><?php echo esc_html('Title Text Color','mortgage-calculator'); ?></label>
                            </th>
                            <td>
                                <input type="text" id="mortgage_title_color" class="color-picker" data-default-color="#000"data-alpha-enabled="true"  name="mortgage_title_color" value="<?php echo get_option('mortgage_title_color','#000',true); ?>">
                            </td>
                        </tr>
                        <tr class="font-size">
                            <th scope="row">
                                <label for="blogname"><?php echo esc_html('Title Font Size','mortgage-calculator'); ?></label>
                            </th>
                            <td>
                                <input type="text" id="wmc_title_font" name="wmc_title_font" value="<?php echo esc_attr(get_option('wmc_title_font','28',true)); ?>"><label>  value in px.</label>
                            </td>
                        </tr>
                        <tr class="font-size">
                            <th scope="row">
                                <label for="blogname"><?php echo esc_html('Title Border Color','mortgage-calculator'); ?></label>
                            </th>
                            <td>
                                <input type="text" id="mortt_border_color" class="color-picker" data-default-color="#000" data-alpha-enabled="true" name="mortt_border_color" value="<?php echo get_option('mortt_border_color','#000',true); ?>">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="wmc_body_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Calculator Body','mortgage-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Calculator Background Color','mortgage-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="mortt_calc_back_color" class="color-picker" data-default-color="#fff" data-alpha-enabled="true" name="mortt_calc_back_color" value="<?php echo get_option('mortt_calc_back_color','#fff',true); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Input Field Title Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_intfield_title_color" name="wmc_intfield_title_color" data-default-color="#000" data-alpha-enabled="true" class="color-picker" value="<?php echo esc_attr(get_option('wmc_intfield_title_color','#000')); ?>">
                        </td>
                    </tr>
                    
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Form Field Hover Color','mortgage-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="cf_hover_color" class="color-picker" data-default-color="#e8e7e7" data-alpha-enabled="true" name="cf_hover_color" value="<?php echo get_option('cf_hover_color','#e8e7e7',true); ?>">
                        </td>
                    </tr>
                    
                </table>
            </div>
            <div class="wmc_chart_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Chart Style','mortgage-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Display Result With Chart','mortgage-calculator');?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="wcf_enable_chart" value="true" <?php checked('true', get_option("wcf_enable_chart",'true')); ?>><label><?php echo esc_html('Display result with chart.','mortgage-calculator');?></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Select Chart Type','mortgage-calculator');?></th>
                        <td>
                            <input type="radio" name="wmc_chart_type" value="doughnut_chart" <?php checked('doughnut_chart',get_option('wmc_chart_type')); ?> checked><label><?php echo esc_html('Doughnut Chart','mortgage-calculator');?></label>
                            <input type="radio" name="wmc_chart_type" value="pie_chart" <?php checked('pie_chart',get_option('wmc_chart_type')); ?>><label><?php echo esc_html('Pie Chart','mortgage-calculator');?></label>
                            <input type="radio" name="wmc_chart_type" value="bar_chart" <?php checked('bar_chart',get_option('wmc_chart_type')); ?>><label><?php echo esc_html('Bar Chart','mortgage-calculator');?></label>
                            <input type="radio" name="wmc_chart_type" value="polar_area_chart" <?php checked('polar_area_chart',get_option('wmc_chart_type')); ?>><label><?php echo esc_html('Polar Area Chart','mortgage-calculator');?></label>
                            
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Monthley Payment Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_monthley_color" name="wmc_monthley_color" data-alpha-enabled="true" data-default-color="rgb(124, 100, 195)" class="color-picker" value="<?php echo get_option('wmc_monthley_color','rgb(124, 100, 195)'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Total Payment Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_totalpayment_color" name="wmc_totalpayment_color" data-alpha-enabled="true" data-default-color="rgb(72, 152, 255)" class="color-picker" value="<?php echo get_option('wmc_totalpayment_color','rgb(72, 152, 255)'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Total Interset Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_totalinterset_color" name="wmc_totalinterset_color" data-alpha-enabled="true" data-default-color="rgb(136, 221, 155)" class="color-picker" value="<?php echo get_option('wmc_totalinterset_color','rgb(136, 221, 155)'); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="wmc_result_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Result Setting','mortgage-calculator'); ?></h1>
                    <tr class="font-size">
                        <th><?php echo esc_html('Title Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_result_title_color" name="wmc_result_title_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo get_option('wmc_result_title_color','#000000'); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="wmc_schedule_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Schedule Sttting','mortgage-calculator'); ?></h1>
                    <tr class="font-size">
                        <th><?php echo esc_html('Active Schedule Button Text Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_act_sch_btn_text_color" name="wmc_act_sch_btn_text_color" data-alpha-enabled="true" data-default-color="#f0f0f0" class="color-picker" value="<?php echo get_option('wmc_act_sch_btn_text_color','#f0f0f0'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Active Schedule Button Background Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_act_sch_btn_bg_color" name="wmc_act_sch_btn_bg_color" data-alpha-enabled="true" data-default-color="#2a9d8f" class="color-picker" value="<?php echo get_option('wmc_act_sch_btn_bg_color','#2a9d8f'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Schedule Button Text Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_sch_btn_text_color" name="wmc_sch_btn_text_color" data-alpha-enabled="true" data-default-color="#f0f0f0" class="color-picker" value="<?php echo get_option('wmc_sch_btn_text_color','#f0f0f0'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Schedule Button Background Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_sch_btn_bg_color" name="wmc_sch_btn_bg_color" data-alpha-enabled="true" data-default-color="#1d3557" class="color-picker" value="<?php echo get_option('wmc_sch_btn_bg_color','#1d3557'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Annual Schedule Table Heading Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_annu_tab_head_text_color" name="wmc_annu_tab_head_text_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo get_option('wmc_annu_tab_head_text_color','#000000'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Annual Schedule Table Body Text Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_annu_tab_body_text_color" name="wmc_annu_tab_body_text_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo get_option('wmc_annu_tab_body_text_color','#000000'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Monthley Schedule Table Heading Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_month_tab_head_text_color" name="wmc_month_tab_head_text_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo get_option('wmc_month_tab_head_text_color','#000000'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Monthley Schedule Table Body Text Color','mortgage-calculator'); ?></th>
                        <td>
                            <input type="text" id="wmc_month_tab_body_text_color" name="wmc_month_tab_body_text_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo get_option('wmc_month_tab_body_text_color','#000000'); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Enable Schedules','mortgage-calculator');?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="wcf_enable_month_annual_schedule" value="true" <?php checked('true', get_option("wcf_enable_month_annual_schedule",'true')); ?>><label><?php echo esc_html('Enable monthly and annual schedule','mortgage-calculator');?></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Enable Annual Schedule','mortgage-calculator');?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="wcf_enable_annual_schedule" value="true" <?php checked('true', get_option("wcf_enable_annual_schedule",'true')); ?>><label><?php echo esc_html('Enable Annual Schedule','mortgage-calculator');?></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Enable Monthly Schedule','mortgage-calculator');?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="wcf_enable_monthly_schedule" value="true" <?php checked('true', get_option("wcf_enable_monthly_schedule",'true')); ?>><label><?php echo esc_html('Enable monthly Schedule','mortgage-calculator');?></label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="wmc-tab-text-settings" class="tab-content">
            <div class="wmc_generel_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('General Option','mortgage-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Header Title Text','mortgage-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="mortgage_title" name="mortgage_title" value="<?php echo get_option('mortgage_title','MORTGAGE CALCULATOR'); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="wmc_generel_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Result Setting','mortgage-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Monthly Payment Text','mortgage-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="wmc_month_pay_text" name="wmc_month_pay_text" disabled value="<?php echo get_option('wmc_month_pay_text','Monthly Payment'); ?>">
                             <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/mortgage-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Total Payment Text','mortgage-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="wmc_total_pay_text" name="wmc_total_pay_text" disabled value="<?php echo get_option('wmc_total_pay_text','Total Payment'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/mortgage-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Total interest Text','mortgage-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="wmc_total_interest_text" name="wmc_total_interest_text" disabled value="<?php echo get_option('wmc_total_interest_text','Total interest'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/mortgage-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="wmc_generel_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Chart Setting','mortgage-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Monthly Payment Text','mortgage-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="wmc_chart_month_pay_text" name="wmc_chart_month_pay_text" disabled value="<?php echo get_option('wmc_chart_month_pay_text','Monthly Payment'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/mortgage-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Total Payment Text','mortgage-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="wmc_chart_total_pay_text" name="wmc_chart_total_pay_text" disabled value="<?php echo get_option('wmc_chart_total_pay_text','Total Payment'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/mortgage-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Total interest Text','mortgage-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="wmc_chart_total_interest_text" name="wmc_chart_total_interest_text" disabled value="<?php echo get_option('wmc_chart_total_interest_text','Total interest'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/mortgage-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="wmc_generel_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Form Setting','mortgage-calculator'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Purchase Price','mortgage-calculator'); ?></th>
                        <td>
                            <label class="wmc_form_body">
                                <input type="number" id="default_purchase_price" name="default_purchase_price" value="<?php echo get_option('default_purchase_price','12000'); ?>"><label class="wmc_back_desc"><?php echo esc_html('Default Purchase Price','mortgage-calculator'); ?></label>
                            </label>
                            <label class="wmc_form_body">
                                <input type="number" id="min_purchase_price" name="min_purchase_price" value="<?php echo get_option('min_purchase_price','1'); ?>"><label class="wmc_back_desc"><?php echo esc_html('Minimum Purchase Price','mortgage-calculator'); ?></label>
                            </label>
                            <label class="wmc_form_body">
                                <input type="number" id="max_purchase_price" name="max_purchase_price" value="<?php echo get_option('max_purchase_price','10000000'); ?>"><label class="wmc_back_desc"><?php echo esc_html('Maximum Purchase Price','mortgage-calculator'); ?></label>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Rate Of Interest','mortgage-calculator'); ?></th>
                        <td>
                            <label class="wmc_form_body">
                                <input type="number" id="default_roi" name="default_roi" value="<?php echo get_option('default_roi','8'); ?>"><label class="wmc_back_desc"><?php echo esc_html('Default Rate Of Interest','mortgage-calculator'); ?></label>
                            </label>
                            <label class="wmc_form_body">
                                <input type="number" id="min_roi" name="min_roi" value="<?php echo get_option('min_roi','1'); ?>"><label class="wmc_back_desc"><?php echo esc_html('Minimum Rate Of Interest','mortgage-calculator'); ?></label>
                            </label>
                            <label class="wmc_form_body">
                                <input type="number" id="max_roi" name="max_roi" value="<?php echo get_option('max_roi','30'); ?>"><label class="wmc_back_desc"><?php echo esc_html('Maximum Rate Of Interest','mortgage-calculator'); ?></label>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Loan Term','mortgage-calculator'); ?></th>
                        <td>
                            <label class="wmc_form_body">
                                <input type="number" id="default_loan_term" name="default_loan_term" value="<?php echo get_option('default_loan_term','5'); ?>"><label class="wmc_back_desc"><?php echo esc_html('Default Loan Term','mortgage-calculator'); ?></label>
                            </label>
                            <label class="wmc_form_body">
                                <input type="number" id="min_loan_term" name="min_loan_term" value="<?php echo get_option('min_loan_term','1'); ?>"><label class="wmc_back_desc"><?php echo esc_html('Minimum Loan Term','mortgage-calculator'); ?></label>
                            </label>
                            <label class="wmc_form_body">
                                <input type="number" id="max_loan_term" name="max_loan_term" value="<?php echo get_option('max_loan_term','30'); ?>"><label class="wmc_back_desc"><?php echo esc_html('Maximum Loan Term','mortgage-calculator'); ?></label>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="submit">
            <input type="hidden" name="action" value="wmc_save_option">
            <input type="submit" value="Save Changes" name="submit" class="button-primary">
        </p>
    </form>
    </div>
</div>

    <?php
}

add_action('init','wmc_add_option_type');

function wmc_add_option_type(){
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'wmc_save_option') {
            
        update_option('wmc_title_font',sanitize_text_field($_REQUEST['wmc_title_font']));
        update_option('mortt_calc_back_color',sanitize_text_field($_REQUEST['mortt_calc_back_color']));
        update_option('mortgage_title_color',sanitize_text_field($_REQUEST['mortgage_title_color']));
        update_option('mortt_border_color',sanitize_text_field($_REQUEST['mortt_border_color']));
        update_option('wmc_intfield_title_color',sanitize_text_field($_REQUEST['wmc_intfield_title_color']));
        update_option('cf_hover_color',sanitize_text_field($_REQUEST['cf_hover_color']));
        if(!empty($_REQUEST['wcf_enable_chart'])){
            update_option('wcf_enable_chart',sanitize_text_field($_REQUEST['wcf_enable_chart']));
        }else{
            update_option('wcf_enable_chart','');
        }
        update_option('wmc_chart_type',sanitize_text_field($_REQUEST['wmc_chart_type']));
        update_option('wmc_monthley_color',sanitize_text_field($_REQUEST['wmc_monthley_color']));
        update_option('wmc_totalpayment_color',sanitize_text_field($_REQUEST['wmc_totalpayment_color']));
        update_option('wmc_totalinterset_color',sanitize_text_field($_REQUEST['wmc_totalinterset_color']));
        update_option('wmc_result_title_color',sanitize_text_field($_REQUEST['wmc_result_title_color']));
        update_option('wmc_act_sch_btn_text_color',sanitize_text_field($_REQUEST['wmc_act_sch_btn_text_color']));
        update_option('wmc_act_sch_btn_bg_color',sanitize_text_field($_REQUEST['wmc_act_sch_btn_bg_color']));
        update_option('wmc_sch_btn_text_color',sanitize_text_field($_REQUEST['wmc_sch_btn_text_color']));
        update_option('wmc_sch_btn_bg_color',sanitize_text_field($_REQUEST['wmc_sch_btn_bg_color']));
        update_option('wmc_annu_tab_head_text_color',sanitize_text_field($_REQUEST['wmc_annu_tab_head_text_color']));
        update_option('wmc_annu_tab_body_text_color',sanitize_text_field($_REQUEST['wmc_annu_tab_body_text_color']));
        update_option('wmc_month_tab_head_text_color',sanitize_text_field($_REQUEST['wmc_month_tab_head_text_color']));
        update_option('wmc_month_tab_body_text_color',sanitize_text_field($_REQUEST['wmc_month_tab_body_text_color']));
        if(!empty($_REQUEST['wcf_enable_month_annual_schedule'])){
            update_option('wcf_enable_month_annual_schedule',sanitize_text_field($_REQUEST['wcf_enable_month_annual_schedule']));
        }else{
            update_option('wcf_enable_month_annual_schedule','');
        }
        if(!empty($_REQUEST['wcf_enable_annual_schedule'])){
            update_option('wcf_enable_annual_schedule',sanitize_text_field($_REQUEST['wcf_enable_annual_schedule']));
        }else{
            update_option('wcf_enable_annual_schedule','');
        }
        if(!empty($_REQUEST['wcf_enable_monthly_schedule'])){
            update_option('wcf_enable_monthly_schedule',sanitize_text_field($_REQUEST['wcf_enable_monthly_schedule']));
        }else{
            update_option('wcf_enable_monthly_schedule','');
        }

        update_option('mortgage_title',sanitize_text_field($_REQUEST['mortgage_title']));
        update_option('wmc_month_pay_text',sanitize_text_field($_REQUEST['wmc_month_pay_text']));
        update_option('wmc_total_pay_text',sanitize_text_field($_REQUEST['wmc_total_pay_text']));
        update_option('wmc_total_interest_text',sanitize_text_field($_REQUEST['wmc_total_interest_text']));
        update_option('wmc_chart_month_pay_text',sanitize_text_field($_REQUEST['wmc_chart_month_pay_text']));
        update_option('wmc_chart_total_pay_text',sanitize_text_field($_REQUEST['wmc_chart_total_pay_text']));
        update_option('wmc_chart_total_interest_text',sanitize_text_field($_REQUEST['wmc_chart_total_interest_text']));
        update_option('default_purchase_price',sanitize_text_field($_REQUEST['default_purchase_price']));
        update_option('min_purchase_price',sanitize_text_field($_REQUEST['min_purchase_price']));
        update_option('max_purchase_price',sanitize_text_field($_REQUEST['max_purchase_price']));
        update_option('default_roi',sanitize_text_field($_REQUEST['default_roi']));
        update_option('min_roi',sanitize_text_field($_REQUEST['min_roi']));
        update_option('max_roi',sanitize_text_field($_REQUEST['max_roi']));
        update_option('min_loan_term',sanitize_text_field($_REQUEST['min_loan_term']));
        update_option('max_loan_term',sanitize_text_field($_REQUEST['max_loan_term']));

        wp_redirect( admin_url( '/admin.php?page=mortgage_calculator_generator&succes=sucee' ));
    }
}

?>