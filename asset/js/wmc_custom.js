jQuery( document ).ready(function() {
    wmc_loadResult();

    // console.log( "mortgage-calc-ready!" );
    // console.log(wmc_frontend_ajax_object.mortgage_totalinterset_color);

    jQuery('ul.nav-tab-wrapper li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');
        jQuery('ul.nav-tab-wrapper li').removeClass('nav-tab-active');
        jQuery('.tab-content').removeClass('current');
        jQuery(this).addClass('nav-tab-active');
        jQuery("#"+tab_id).addClass('current');
    });
    

    var purchase_price = jQuery("#wmc_purchase_price");
    var intrest_rate = jQuery("#wmc_rate");
    var period_year = jQuery("#wmc_year");

    function wmc_chart(){
        var wmc_purchase_price = jQuery("#wmc_purchase_price").val();
        var wmc_rate_i = jQuery("#wmc_rate").val();
        rate = ((wmc_rate_i / 100) / 12);
        var wmc_year_nt = jQuery("#wmc_year").val();
        year = (wmc_year_nt * 12);
        
        var monthley_pay = (wmc_purchase_price * ((rate * (1 + rate) ** year) / (((1 + rate) ** year) -1))).toFixed(2);
        var total_payment = (monthley_pay * year).toFixed(2);
        var total_interset = (monthley_pay * year - wmc_purchase_price).toFixed(1);

        if(wmc_frontend_ajax_object.enable_chart == 'true'){
            var mortgage_chart_month_pay_text = wmc_frontend_ajax_object.mortgage_chart_month_pay_text
            var mortgage_chart_total_pay_text = wmc_frontend_ajax_object.mortgage_chart_total_pay_text
            var mortgage_chart_total_interest_text = wmc_frontend_ajax_object.mortgage_chart_total_interest_text
            if(wmc_frontend_ajax_object.mortgage_chart_type == 'doughnut_chart'){
                var ctx = document.getElementById('wmcChart').getContext('2d');
                mortgage_chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [mortgage_chart_month_pay_text, mortgage_chart_total_pay_text, mortgage_chart_total_interest_text],
                        datasets: [{
                            data: [monthley_pay, total_payment, total_interset],
                            backgroundColor: [
                                wmc_frontend_ajax_object.mortgage_monthley_color,
                                wmc_frontend_ajax_object.mortgage_totalpayment_color,
                                wmc_frontend_ajax_object.mortgage_totalinterset_color
                            ],
                            hoverOffset: 4,
                            borderColor: [
                                wmc_frontend_ajax_object.mortgage_monthley_color,
                                wmc_frontend_ajax_object.mortgage_totalpayment_color,
                                wmc_frontend_ajax_object.mortgage_totalinterset_color
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                      plugins: {
                            legend: {
                                labels: {
                                    font: {
                                        size: 14
                                    }
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout:90,
                    }
                });
            }else if(wmc_frontend_ajax_object.mortgage_chart_type == 'pie_chart'){

                var ctx = document.getElementById('wmcChart').getContext('2d');
                var wmcData = {
                    labels: [mortgage_chart_month_pay_text, mortgage_chart_total_pay_text, mortgage_chart_total_interest_text],
                    machineLabels: ["active", "progress", "expired", "never"],
                    datasets: [
                        {
                            data: [monthley_pay, total_payment, total_interset],
                            backgroundColor: [
                                wmc_frontend_ajax_object.mortgage_monthley_color,
                                wmc_frontend_ajax_object.mortgage_totalpayment_color,
                                wmc_frontend_ajax_object.mortgage_totalinterset_color
                            ],
                            borderColor: [
                                wmc_frontend_ajax_object.mortgage_monthley_color,
                                wmc_frontend_ajax_object.mortgage_totalpayment_color,
                                wmc_frontend_ajax_object.mortgage_totalinterset_color
                            ],
                            // borderWidth: [3,3]
                        }]
                };
                mortgage_chart = new Chart(ctx, {
                    type: 'pie',
                    data: wmcData,
                    options: {
                      plugins: {
                            legend: {
                                labels: {
                                    font: {
                                        size: 14
                                    }
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
            }else if(wmc_frontend_ajax_object.mortgage_chart_type == 'bar_chart'){
                var ctx = document.getElementById('wmcChart').getContext('2d');
                mortgage_chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [''],
                        datasets: [{
                            label: mortgage_chart_month_pay_text,
                            data: [monthley_pay],
                            backgroundColor: wmc_frontend_ajax_object.mortgage_monthley_color
                        },
                        {
                            label: mortgage_chart_total_pay_text,
                            data: [total_payment],
                            backgroundColor: wmc_frontend_ajax_object.mortgage_totalpayment_color
                        },
                        {
                            label: mortgage_chart_total_interest_text,
                            data: [total_interset],
                            backgroundColor: wmc_frontend_ajax_object.mortgage_totalinterset_color
                        }]
                    },
                    options: {
                      plugins: {
                            legend: {
                                labels: {
                                    font: {
                                        size: 14
                                    }
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
            }else if(wmc_frontend_ajax_object.mortgage_chart_type == 'polar_area_chart'){
                var ctx = document.getElementById('wmcChart').getContext('2d');
                var wmcpolarData = {
                    labels: [mortgage_chart_month_pay_text, mortgage_chart_total_pay_text, mortgage_chart_total_interest_text],
                    datasets: [{
                        data: [monthley_pay, total_payment, total_interset],
                        backgroundColor: [
                            wmc_frontend_ajax_object.mortgage_monthley_color,
                            wmc_frontend_ajax_object.mortgage_totalpayment_color,
                            wmc_frontend_ajax_object.mortgage_totalinterset_color
                        ],
                        borderColor: [
                            wmc_frontend_ajax_object.mortgage_monthley_color,
                            wmc_frontend_ajax_object.mortgage_totalpayment_color,
                            wmc_frontend_ajax_object.mortgage_totalinterset_color
                        ],
                    }]
                };

                mortgage_chart = new Chart(ctx, {
                    type: 'polarArea',
                    data: wmcpolarData,
                    options: {
                      plugins: {
                            legend: {
                                labels: {
                                    font: {
                                        size: 14
                                    }
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
            }
        }
    }
    
    function wmc_loadResult(){
        var wmc_purchase_price = jQuery("#wmc_purchase_price").val();
        var wmc_rate_i = jQuery("#wmc_rate").val();
        rate = ((wmc_rate_i / 100) / 12);
        var wmc_year_nt = jQuery("#wmc_year").val();
        year = (wmc_year_nt * 12);
            
        var monthley_pay = (wmc_purchase_price * ((rate * (1 + rate) ** year) / (((1 + rate) ** year) -1))).toFixed(2);
        var total_payment = (monthley_pay * year).toFixed(0);
        var total_interset = (monthley_pay * year - wmc_purchase_price).toFixed(0);

        
        if (wmc_purchase_price === "" || wmc_rate_i === "" || wmc_year_nt === "" || parseFloat(wmc_purchase_price) === 0 || parseFloat(wmc_rate_i) === 0 || parseFloat(wmc_year_nt) === 0) {
            jQuery("#wmc_monthley_result_table").html("Please enter valid values.");
            jQuery("#wmc_annual_result_table").html("Please enter valid values.");
        
            jQuery("#monthly_payment1").text("$0");
            jQuery("#monthly_payment2").text("$0");
            jQuery("#monthly_payment3").text("$0");
        }else{
            jQuery("#monthly_payment1").text("$" + parseFloat(monthley_pay).toLocaleString('en-IN'));
            jQuery("#monthly_payment2").text("$" + parseFloat(total_payment).toLocaleString('en-IN'));
            jQuery("#monthly_payment3").text("$" + parseFloat(total_interset).toLocaleString('en-IN'));

            if(wmc_frontend_ajax_object.mortgage_schedule_enable == 'true'){
                function formatNumberWithCommas(number) {
                    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }

                var numberFormatter = new Intl.NumberFormat('en-IN');

                if(wmc_frontend_ajax_object.mortgage_annual_schedule_enable == 'true'){

                    /* Annual Scheduale Start */

                    var balance = wmc_purchase_price;
                    var annualSchedule = [];

                    for (var i = 0; i < wmc_year_nt; i++) {
                        var yearObj = {
                            year: i + 1,
                            payment: 0,
                            principal: 0,
                            interest: 0,
                            balance: 0
                        };
                        for (var j = 0; j < 12; j++) {
                            var interest = balance * rate;
                            var principal = monthley_pay - interest;
                            balance = balance - principal;
                            yearObj.payment += parseFloat(monthley_pay);
                            yearObj.principal += parseFloat(principal);
                            yearObj.interest += parseFloat(interest);
                            yearObj.balance = balance;
                        }
                        annualSchedule.push(yearObj);
                    }

                    var annual_table = "<table class='mortgage_annual_schedule'><tr><th>Year</th><th>Payment</th><th>Principal</th><th>Interest</th><th>Balance</th></tr>";
                    for (var i = 0; i < annualSchedule.length; i++) {
                        var row = "<tr><td>" + annualSchedule[i].year + 
                        "</td><td>" + numberFormatter.format(annualSchedule[i].payment.toFixed(0)) + 
                        "</td><td>" + numberFormatter.format(annualSchedule[i].principal.toFixed(0)) + 
                        "</td><td>" + numberFormatter.format(annualSchedule[i].interest.toFixed(0)) + 
                        "</td><td>" + numberFormatter.format(annualSchedule[i].balance.toFixed(0)) + "</td></tr>";
                        annual_table += row;
                    }
                    annual_table += "</table>";

                    jQuery("#wmc_annual_result_table").html(annual_table);

                    /* Annual Scheduale End */
                }else{
                    jQuery("#wmc_display_annual").css("display", "none");
                    jQuery("#wmc-annual-schedule").css("display", "none");
                    jQuery(".nav-tab").addClass("nav-tab-active");
                    jQuery(".tab-content").addClass("current");
                }

                if(wmc_frontend_ajax_object.mortgage_monthly_schedule_enable == 'true'){
                    /* Monthley Scheduale start */
                    var balance = wmc_purchase_price;
                    var monthlySchedule = [];

                    for (var i = 0; i < year; i++) {
                        var interest = balance * rate;
                        var principal = monthley_pay - interest;
                        balance = balance - principal;
                          
                        monthlySchedule.push({
                            month: i + 1,
                            payment: monthley_pay,
                            principal: principal.toFixed(2),
                            interest: interest.toFixed(2),
                            balance: balance.toFixed(2)
                        });
                    }

                    // Display the monthly schedule in a table
                    var monthly_table = "<table class='mortgage_monthley_schedule'><tr><th>Month</th><th>Payment</th><th>Principal</th><th>Interest</th><th>Balance</th></tr>";
                    for (var i = 0; i < monthlySchedule.length; i++) {
                        var row = "<tr><td>" + monthlySchedule[i].month + 
                        "</td><td>" + numberFormatter.format(parseFloat(monthlySchedule[i].payment).toFixed(0)) + 
                        "</td><td>" + numberFormatter.format(parseFloat(monthlySchedule[i].principal).toFixed(0)) + 
                        "</td><td>" + numberFormatter.format(parseFloat(monthlySchedule[i].interest).toFixed(0)) + 
                        "</td><td>" + numberFormatter.format(parseFloat(monthlySchedule[i].balance).toFixed(0)) + "</td></tr>";
                        monthly_table += row;
                    }
                    monthly_table += "</table>";

                    jQuery("#wmc_monthley_result_table").html(monthly_table);

                    /* Monthley Scheduale End */
                }else{
                    jQuery("#wmc_display_month").css("display", "none");
                    jQuery("#wmc-month-schedule").css("display", "none");
                    jQuery(".nav-tab").addClass("nav-tab-active");
                    jQuery(".tab-content").addClass("current");
                }
                
            }
        }

      wmc_chart();
    }

    var wmc_purchase_price = jQuery("#wmc_purchase_price").val();
    var wmc_rate_i = jQuery("#wmc_rate").val();
    rate = ((wmc_rate_i / 100) / 12);
    var wmc_year_nt = jQuery("#wmc_year").val();
    year = (wmc_year_nt * 12);
    var monthley_pay = (wmc_purchase_price * ((rate * (1 + rate) ** year) / (((1 + rate) ** year) -1))).toFixed(2);
    var total_payment = (monthley_pay * year).toFixed(2);
    var total_interset = (monthley_pay * year - wmc_purchase_price).toFixed(1);

    jQuery(wmc_purchase_price).on('change', function(){
        if(wmc_frontend_ajax_object.enable_chart == 'true'){
          mortgage_chart.destroy();
        }
        wmc_loadResult();
    });

    jQuery(wmc_rate_i).on('change', function(){
        if(wmc_frontend_ajax_object.enable_chart == 'true'){
          mortgage_chart.destroy();
        }
        wmc_loadResult();
    });

    jQuery(wmc_year_nt).on('change', function(){
        if(wmc_frontend_ajax_object.enable_chart == 'true'){
          mortgage_chart.destroy();
        }
        wmc_loadResult();
    });

    var purchase_price = jQuery("#wmc_purchase_price");
    var intrest_rate = jQuery("#wmc_rate");
    var period_year = jQuery("#wmc_year");

    purchase_price.on('input', function() {
        var wmc_purchase = parseInt(this.value);
        var mortgage_min_purchase_price = parseFloat(wmc_frontend_ajax_object.mortgage_min_purchase_price);
        var mortgage_max_purchase_price = parseFloat(wmc_frontend_ajax_object.mortgage_max_purchase_price);
        // console.log(max_interest_rate);
        if (wmc_purchase < mortgage_min_purchase_price) {
            this.value = mortgage_min_purchase_price;
        }
        if (wmc_purchase > mortgage_max_purchase_price) {
            this.value = mortgage_max_purchase_price;
        }
        if (wmc_purchase) {
          purchase_price.val(this.value).change();
        }
        // purchase_price.val(this.value).change();
        if(wmc_frontend_ajax_object.enable_chart == 'true'){
          mortgage_chart.destroy();
        }
        wmc_loadResult();
    });

    intrest_rate.on('input', function() {
        var wmc_interest = parseInt(this.value);
        var mortgage_min_roi = parseFloat(wmc_frontend_ajax_object.mortgage_min_roi);
        var mortgage_max_roi = parseFloat(wmc_frontend_ajax_object.mortgage_max_roi);
        // console.log(max_interest_rate);
        if (wmc_interest < mortgage_min_roi) {
            this.value = mortgage_min_roi;
        }
        if (wmc_interest > mortgage_max_roi) {
            this.value = mortgage_max_roi;
        }
        if (wmc_interest) {
          intrest_rate.val(this.value).change();
        }
        // intrest_rate.val(this.value).change();
        if(wmc_frontend_ajax_object.enable_chart == 'true'){
          mortgage_chart.destroy();
        }
        wmc_loadResult();
    });

    period_year.on('input', function() {
        var wmc_period_year = parseInt(this.value);
        var mortgage_min_loan_term = parseFloat(wmc_frontend_ajax_object.mortgage_min_loan_term);
        var mortgage_max_loan_term = parseFloat(wmc_frontend_ajax_object.mortgage_max_loan_term);
        // console.log(max_interest_rate);
        if (wmc_period_year < mortgage_min_loan_term) {
            this.value = mortgage_min_loan_term;
        }
        if (wmc_period_year > mortgage_max_loan_term) {
            this.value = mortgage_max_loan_term;
        }
        if (wmc_period_year) {
          period_year.val(this.value).change();
        }
        // period_year.val(this.value).change();
        if(wmc_frontend_ajax_object.enable_chart == 'true'){
          mortgage_chart.destroy();
        }
        wmc_loadResult();
    });

});